<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proposals = Proposal::with('customer')->paginate(10);
        return view('proposals.index', compact('proposals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::where('is_active',true)->get();
        return view('proposals.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:draft,sent,accepted,rejected',
            'notes' => 'nullable|string',
        ]);

        Proposal::create($validated);

        return redirect()->route('proposals.index')->with('success', 'Proposal created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proposal $proposal)
    {
        //
    }
    
    public function edit(Proposal $proposal)
    {
        $customers = Customer::where('is_active', true)->get();
        return view('proposals.edit', compact('proposal', 'customers'));
    }

    /*
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proposal $proposal)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:draft,sent,accepted,rejected',
            'notes' => 'nullable|string',
        ]);

        $proposal->update($validated);

        return redirect()->route('proposals.index')->with('success', 'Proposal updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proposal $proposal)
    {
        $proposal->delete();
        return redirect()->route("proposals.index")->with("success", "Proposal deleted successfully");
    }

    public function updateStatus(Request $request, Proposal $proposal)
    {
        $validated = $request->validate([
            'status' => 'required|in:draft,sent,accepted,rejected'
        ]);

        $proposal->update(['status' => $validated['status']]);

        return back()->with('success', 'Proposal status updated successfully!');
    }
}
