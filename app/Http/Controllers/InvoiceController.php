<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Customer;
use App\Models\Transaction;
use App\Mail\InvoiceMail;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::with('customer')->paginate(10);
        return view('invoices.index', compact('invoices')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::where('is_active', true)->get();
        return view('invoices.create', compact('customers')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id', 
            'invoice_number' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:paid,partial,unpaid,sent',
            'notes' => 'nullable|string',
        ]);

        $invoice = Invoice::create($validated);
        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully!');        
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        $customers = Customer::where('is_active', true)->get();
        return view('invoices.edit', compact('invoice', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id', 
            'invoice_number' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:paid,partial,unpaid,sent',
            'notes' => 'nullable|string',
        ]);

        $invoice->update($validated);
        return redirect()->route('invoices.index')->with('success', 'Invoice updated successfully!'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully!'); 
    }

    public function send(Invoice $invoice)
    {
        // Send email to the linked customer
        Mail::to($invoice->customer->email)->send(new InvoiceMail($invoice));
        
        // Update status to 'sent'
        $invoice->update(['status' => 'sent']);
        
        return back()->with('success', 'Invoice sent to ' . $invoice->customer->email);
    }

    public function pay(Invoice $invoice)
    {
        if ($invoice->status === 'paid') {
            return "This invoice is already paid.";
        }

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $checkout_session = Session::create([
            'payment_method_types'=> ['card'],
            'line_items'=> [[
                'price_data' => [
                    'currency' => 'usd',
                    'unit_amount'=> $invoice->amount*100,
                    'product_data' => [
                        'name' => 'Invoice #' . $invoice->invoice_number,
                        'description' => 'Payment from ' . $invoice->customer->name,
                    ],
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url'=> route('checkout.success',['invoice'=>$invoice->id]).'&session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout.cancel'),

        ]);

        return redirect($checkout_session->url);
    }

    public function success(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        
        $sessionId = $request->get('session_id');
        $invoiceId = $request->get('invoice');

        try {
            $session = Session::retrieve($sessionId);
            
            if ($session->payment_status === 'paid') {
                $invoice = Invoice::findOrFail($invoiceId);
                
                $invoice->update(['status' => 'paid']);
                
                Transaction::firstOrCreate(
                    ['stripe_session_id' => $sessionId], 
                    [
                        'invoice_id' => $invoice->id,
                        'customer_id' => $invoice->customer_id,
                        'amount' => $invoice->amount,
                        'status' => 'succeeded',
                    ]
                );

                return "Payment successful! Thank you.";
            }
        } catch (\Exception $e) {
            return "Unable to verify payment.";
        }

        return "Payment not completed.";
    }

    public function cancel()
    {
        return "Payment was cancelled. You can try again later.";
    }
}
