<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Proposal;
use App\Models\Invoice;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the workspace dashboard overview.
     */
    public function index()
    {
        $openInvoicesCount = Invoice::whereIn('status', ['unpaid', 'sent', 'partial'])->count();
        $pendingProposalsCount = Proposal::whereIn('status', ['draft', 'sent'])->count();
        $activeCustomersCount = Customer::where('is_active', true)->count();

        $totalCustomersCount = Customer::count();
        $totalProposalsCount = Proposal::count();
        $totalInvoicesCount = Invoice::count();
        $totalTransactionsCount = Transaction::count();

        $totalRevenue = Transaction::where('status', 'succeeded')->sum('amount');

        $recentTransactions = Transaction::with(['customer', 'invoice'])->latest()->limit(5)->get();
        $recentCustomers = Customer::latest()->limit(5)->get();
        $recentProposals = Proposal::with('customer')->latest()->limit(5)->get();
        $recentInvoices = Invoice::with('customer')->latest()->limit(5)->get();

        return view('dashboard', compact(
            'openInvoicesCount',
            'pendingProposalsCount',
            'activeCustomersCount',
            'totalCustomersCount',
            'totalProposalsCount',
            'totalInvoicesCount',
            'totalTransactionsCount',
            'totalRevenue',
            'recentTransactions',
            'recentCustomers',
            'recentProposals',
            'recentInvoices'
        ));
    }
}
