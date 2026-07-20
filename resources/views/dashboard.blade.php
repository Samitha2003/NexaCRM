<x-app-layout>
    <x-slot name="title">
        Dashboard - NexaCRM
    </x-slot>

    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div class="flex flex-col gap-1">
                <h2 class="font-bold text-3xl text-white leading-tight tracking-tight">
                    {{ __('Dashboard') }}
                </h2>
                <p class="text-sm text-slate-400">Real-time workspace intelligence and client operations overview.</p>
            </div>
            <div class="flex items-center gap-3">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-500/10 px-3 py-1.5 text-xs font-semibold text-emerald-400 border border-emerald-500/20">
                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                    Live Data Connected
                </span>
            </div>
        </div>
    </x-slot>

    <div class="space-y-8">
        <!-- Top Stats Row (Gradients & Micro-Animations) -->
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <!-- Revenue Card -->
            <article class="relative group overflow-hidden rounded-2xl border border-white/5 bg-[#09090b]/40 p-6 transition-all duration-300 hover:border-indigo-500/30 hover:shadow-[0_0_30px_-10px_rgba(99,102,241,0.2)]">
                <div class="absolute -right-6 -bottom-6 w-24 h-24 rounded-full bg-indigo-500/10 blur-xl group-hover:bg-indigo-500/25 transition-colors duration-300"></div>
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Total Revenue</p>
                <div class="mt-4 flex items-baseline justify-between">
                    <span class="text-3xl font-extrabold tracking-tight text-white">${{ number_format($totalRevenue, 2) }}</span>
                    <span class="rounded-full bg-indigo-500/10 px-2 py-0.5 text-[10px] font-semibold tracking-wider uppercase text-indigo-300 border border-indigo-500/20">Revenue</span>
                </div>
                <p class="mt-3 text-xs text-slate-400">Succeeded Stripe transactions</p>
            </article>

            <!-- Customers Card -->
            <article class="relative group overflow-hidden rounded-2xl border border-white/5 bg-[#09090b]/40 p-6 transition-all duration-300 hover:border-emerald-500/30 hover:shadow-[0_0_30px_-10px_rgba(16,185,129,0.2)]">
                <div class="absolute -right-6 -bottom-6 w-24 h-24 rounded-full bg-emerald-500/10 blur-xl group-hover:bg-emerald-500/25 transition-colors duration-300"></div>
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Customers</p>
                <div class="mt-4 flex items-baseline justify-between">
                    <span class="text-3xl font-extrabold tracking-tight text-white">{{ $totalCustomersCount }}</span>
                    <span class="text-xs font-medium text-emerald-400">{{ $activeCustomersCount }} Active</span>
                </div>
                <p class="mt-3 text-xs text-slate-400">Customer base and contact directory</p>
            </article>

            <!-- Proposals Card -->
            <article class="relative group overflow-hidden rounded-2xl border border-white/5 bg-[#09090b]/40 p-6 transition-all duration-300 hover:border-amber-500/30 hover:shadow-[0_0_30px_-10px_rgba(245,158,11,0.2)]">
                <div class="absolute -right-6 -bottom-6 w-24 h-24 rounded-full bg-amber-500/10 blur-xl group-hover:bg-amber-500/25 transition-colors duration-300"></div>
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Proposals</p>
                <div class="mt-4 flex items-baseline justify-between">
                    <span class="text-3xl font-extrabold tracking-tight text-white">{{ $totalProposalsCount }}</span>
                    <span class="text-xs font-medium text-amber-400">{{ $pendingProposalsCount }} Pending</span>
                </div>
                <p class="mt-3 text-xs text-slate-400">Deals in pipelines and drafts</p>
            </article>

            <!-- Invoices Card -->
            <article class="relative group overflow-hidden rounded-2xl border border-white/5 bg-[#09090b]/40 p-6 transition-all duration-300 hover:border-sky-500/30 hover:shadow-[0_0_30px_-10px_rgba(14,165,233,0.2)]">
                <div class="absolute -right-6 -bottom-6 w-24 h-24 rounded-full bg-sky-500/10 blur-xl group-hover:bg-sky-500/25 transition-colors duration-300"></div>
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Invoices</p>
                <div class="mt-4 flex items-baseline justify-between">
                    <span class="text-3xl font-extrabold tracking-tight text-white">{{ $totalInvoicesCount }}</span>
                    <span class="text-xs font-medium text-sky-400">{{ $openInvoicesCount }} Unpaid</span>
                </div>
                <p class="mt-3 text-xs text-slate-400">Issued and sent invoices</p>
            </article>
        </div>

        <!-- Main Workspace Block: Overview & Today Status -->
        <div class="grid gap-6 lg:grid-cols-[2.5fr_1fr]">
            <!-- Overview & Quick Access -->
            <section class="rounded-2xl border border-white/10 bg-white/5 p-6 backdrop-blur-md relative overflow-hidden flex flex-col justify-between">
                <div class="absolute inset-0 bg-gradient-to-r from-indigo-500/5 via-transparent to-transparent pointer-events-none"></div>
                
                <div class="relative space-y-4">
                    <span class="inline-flex items-center rounded-full border border-indigo-400/20 bg-indigo-400/5 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-indigo-300">
                        Workspace Overview
                    </span>
                    <h1 class="text-3xl font-extrabold tracking-tight text-white">Welcome back to NexaCRM</h1>
                    <p class="max-w-xl text-sm leading-relaxed text-slate-300">
                        Keep track of customers, proposals, invoices, and transactions from a single place. View live data aggregated directly from your CRM workspace database.
                    </p>
                </div>

                <div class="mt-8 flex flex-wrap gap-4 relative">
                    <a href="{{ route('customers.create') }}" class="inline-flex items-center justify-center rounded-xl bg-indigo-500 hover:bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-lg transition-all duration-200 hover:-translate-y-0.5">
                        Add Customer
                    </a>
                    <a href="{{ route('invoices.create') }}" class="inline-flex items-center justify-center rounded-xl border border-white/10 bg-white/10 hover:bg-white/15 px-5 py-3 text-sm font-semibold text-slate-100 transition-all duration-200 hover:-translate-y-0.5">
                        Create Invoice
                    </a>
                    <a href="{{ route('proposals.create') }}" class="inline-flex items-center justify-center rounded-xl border border-white/10 bg-white/10 hover:bg-white/15 px-5 py-3 text-sm font-semibold text-slate-100 transition-all duration-200 hover:-translate-y-0.5">
                        New Proposal
                    </a>
                </div>
            </section>

            <!-- Today's Checklist Summaries -->
            <section class="rounded-2xl border border-white/10 bg-[#0c0c10]/80 p-6 flex flex-col justify-between">
                <div>
                    <h3 class="text-sm font-bold uppercase tracking-[0.2em] text-slate-400 flex items-center gap-2">
                        <span class="h-2 w-2 rounded-full bg-indigo-400"></span>
                        Today
                    </h3>
                    <div class="mt-5 space-y-4">
                        <div class="flex items-center justify-between rounded-xl border border-white/5 bg-white/5 px-4 py-3">
                            <span class="text-sm text-slate-300">Open invoices</span>
                            <span class="text-lg font-bold text-white">{{ $openInvoicesCount }}</span>
                        </div>
                        <div class="flex items-center justify-between rounded-xl border border-white/5 bg-white/5 px-4 py-3">
                            <span class="text-sm text-slate-300">Pending proposals</span>
                            <span class="text-lg font-bold text-white">{{ $pendingProposalsCount }}</span>
                        </div>
                        <div class="flex items-center justify-between rounded-xl border border-white/5 bg-white/5 px-4 py-3">
                            <span class="text-sm text-slate-300">Active customers</span>
                            <span class="text-lg font-bold text-white">{{ $activeCustomersCount }}</span>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Recent Activities Feed Grid -->
        <div class="grid gap-6 lg:grid-cols-2">
            <!-- Recent Transactions Table -->
            <section class="rounded-2xl border border-white/10 bg-white/5 p-6 backdrop-blur-md flex flex-col">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-lg font-bold text-white">Recent Transactions</h3>
                        <p class="text-xs text-slate-400">Latest successful Stripe checkout operations.</p>
                    </div>
                    <a href="{{ route('transactions.index') }}" class="text-xs font-semibold text-indigo-400 hover:text-indigo-300 transition">View All &rarr;</a>
                </div>

                <div class="flex-1 overflow-x-auto">
                    @if ($recentTransactions->isEmpty())
                        <div class="flex flex-col items-center justify-center py-8 text-center h-full">
                            <span class="text-3xl">💰</span>
                            <p class="mt-2 text-sm text-slate-400">No transaction logs available yet.</p>
                        </div>
                    @else
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b border-white/5 text-[10px] uppercase tracking-wider text-slate-400 font-bold">
                                    <th class="py-3">Customer</th>
                                    <th class="py-3">Invoice</th>
                                    <th class="py-3">Date</th>
                                    <th class="py-3 text-right">Amount</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5 text-sm text-slate-300">
                                @foreach ($recentTransactions as $tx)
                                    <tr class="hover:bg-white/5 transition-colors">
                                        <td class="py-3 font-medium text-white">
                                            {{ $tx->customer->name ?? 'N/A' }}
                                        </td>
                                        <td class="py-3 text-slate-400 text-xs">
                                            #{{ $tx->invoice->invoice_number ?? 'N/A' }}
                                        </td>
                                        <td class="py-3 text-xs text-slate-400">
                                            {{ $tx->created_at->diffForHumans() }}
                                        </td>
                                        <td class="py-3 text-right font-bold text-emerald-400">
                                            ${{ number_format($tx->amount, 2) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </section>

            <!-- Recent Invoices Table -->
            <section class="rounded-2xl border border-white/10 bg-white/5 p-6 backdrop-blur-md flex flex-col">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-lg font-bold text-white">Recent Invoices</h3>
                        <p class="text-xs text-slate-400">Status logs of newly issued client invoices.</p>
                    </div>
                    <a href="{{ route('invoices.index') }}" class="text-xs font-semibold text-indigo-400 hover:text-indigo-300 transition">View All &rarr;</a>
                </div>

                <div class="flex-1 overflow-x-auto">
                    @if ($recentInvoices->isEmpty())
                        <div class="flex flex-col items-center justify-center py-8 text-center h-full">
                            <span class="text-3xl">📄</span>
                            <p class="mt-2 text-sm text-slate-400">No invoices have been created yet.</p>
                        </div>
                    @else
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b border-white/5 text-[10px] uppercase tracking-wider text-slate-400 font-bold">
                                    <th class="py-3">Number</th>
                                    <th class="py-3">Customer</th>
                                    <th class="py-3">Status</th>
                                    <th class="py-3 text-right">Amount</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5 text-sm text-slate-300">
                                @foreach ($recentInvoices as $invoice)
                                    <tr class="hover:bg-white/5 transition-colors">
                                        <td class="py-3 font-medium text-white">
                                            #{{ $invoice->invoice_number }}
                                        </td>
                                        <td class="py-3 text-slate-400 text-xs">
                                            {{ $invoice->customer->name ?? 'N/A' }}
                                        </td>
                                        <td class="py-3">
                                            @if ($invoice->status === 'paid')
                                                <span class="inline-flex items-center rounded-full bg-emerald-500/10 px-2.5 py-0.5 text-xs font-semibold text-emerald-400 border border-emerald-500/20">Paid</span>
                                            @elseif ($invoice->status === 'partial')
                                                <span class="inline-flex items-center rounded-full bg-amber-500/10 px-2.5 py-0.5 text-xs font-semibold text-amber-400 border border-amber-500/20">Partial</span>
                                            @elseif ($invoice->status === 'sent')
                                                <span class="inline-flex items-center rounded-full bg-sky-500/10 px-2.5 py-0.5 text-xs font-semibold text-sky-400 border border-sky-500/20">Sent</span>
                                            @else
                                                <span class="inline-flex items-center rounded-full bg-rose-500/10 px-2.5 py-0.5 text-xs font-semibold text-rose-400 border border-rose-500/20">Unpaid</span>
                                            @endif
                                        </td>
                                        <td class="py-3 text-right font-bold text-white">
                                            ${{ number_format($invoice->amount, 2) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </section>
        </div>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-[1.5fr_1fr]">
            <!-- Quick Actions Grid -->
            <section class="rounded-2xl border border-white/10 bg-white/5 p-6 shadow-sm backdrop-blur-md">
                <div>
                    <h3 class="text-lg font-bold text-white">Quick Actions</h3>
                    <p class="text-xs text-slate-400">Direct shortcuts to workspace records.</p>
                </div>

                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                    <a href="{{ route('customers.index') }}" class="group rounded-xl border border-white/5 bg-[#0c0c10]/80 p-4 transition-all duration-300 hover:border-indigo-500/30 hover:bg-white/5">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <h4 class="text-sm font-semibold text-white group-hover:text-indigo-300">Manage customers</h4>
                                <p class="mt-1 text-xs text-slate-400">Review your accounts and contact records.</p>
                            </div>
                            <span class="text-slate-500 transition-all duration-300 group-hover:translate-x-1 group-hover:text-indigo-300">&rarr;</span>
                        </div>
                    </a>

                    <a href="{{ route('proposals.index') }}" class="group rounded-xl border border-white/5 bg-[#0c0c10]/80 p-4 transition-all duration-300 hover:border-indigo-500/30 hover:bg-white/5">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <h4 class="text-sm font-semibold text-white group-hover:text-indigo-300">Review proposals</h4>
                                <p class="mt-1 text-xs text-slate-400">Track drafts, approvals, and follow-ups.</p>
                            </div>
                            <span class="text-slate-500 transition-all duration-300 group-hover:translate-x-1 group-hover:text-indigo-300">&rarr;</span>
                        </div>
                    </a>

                    <a href="{{ route('invoices.index') }}" class="group rounded-xl border border-white/5 bg-[#0c0c10]/80 p-4 transition-all duration-300 hover:border-indigo-500/30 hover:bg-white/5">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <h4 class="text-sm font-semibold text-white group-hover:text-indigo-300">Handle invoices</h4>
                                <p class="mt-1 text-xs text-slate-400">Create, send, and manage billing status.</p>
                            </div>
                            <span class="text-slate-500 transition-all duration-300 group-hover:translate-x-1 group-hover:text-indigo-300">&rarr;</span>
                        </div>
                    </a>

                    <a href="{{ route('transactions.index') }}" class="group rounded-xl border border-white/5 bg-[#0c0c10]/80 p-4 transition-all duration-300 hover:border-indigo-500/30 hover:bg-white/5">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <h4 class="text-sm font-semibold text-white group-hover:text-indigo-300">View transactions</h4>
                                <p class="mt-1 text-xs text-slate-400">Keep an eye on received payments.</p>
                            </div>
                            <span class="text-slate-500 transition-all duration-300 group-hover:translate-x-1 group-hover:text-indigo-300">&rarr;</span>
                        </div>
                    </a>
                </div>
            </section>

            <!-- Getting Started Checklist -->
            <aside class="rounded-2xl border border-white/10 bg-[#0c0c10]/80 p-6 flex flex-col justify-between">
                <div>
                    <h3 class="text-lg font-bold text-white">Getting started</h3>
                    <p class="text-xs text-slate-400">A simple checklist for when you begin using the CRM.</p>

                    <div class="mt-6 space-y-4">
                        <div class="flex gap-3 rounded-xl border border-white/5 bg-white/5 p-3 hover:bg-white/10 transition-colors">
                            <div class="mt-0.5 h-2.5 w-2.5 rounded-full bg-indigo-400 shrink-0"></div>
                            <div>
                                <p class="text-xs font-semibold text-white">Add your first customer</p>
                                <p class="mt-0.5 text-[11px] text-slate-400">Start building a clean account list for follow-up.</p>
                            </div>
                        </div>
                        <div class="flex gap-3 rounded-xl border border-white/5 bg-white/5 p-3 hover:bg-white/10 transition-colors">
                            <div class="mt-0.5 h-2.5 w-2.5 rounded-full bg-emerald-400 shrink-0"></div>
                            <div>
                                <p class="text-xs font-semibold text-white">Create a proposal</p>
                                <p class="mt-0.5 text-[11px] text-slate-400">Turn estimates into a repeatable sales workflow.</p>
                            </div>
                        </div>
                        <div class="flex gap-3 rounded-xl border border-white/5 bg-white/5 p-3 hover:bg-white/10 transition-colors">
                            <div class="mt-0.5 h-2.5 w-2.5 rounded-full bg-sky-400 shrink-0"></div>
                            <div>
                                <p class="text-xs font-semibold text-white">Send an invoice</p>
                                <p class="mt-0.5 text-[11px] text-slate-400">Track sent and paid statuses in one place.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</x-app-layout>
