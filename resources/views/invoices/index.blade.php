<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-slate-100 leading-tight">Invoices</h2>
            <a href="{{ route('invoices.create') }}" class="inline-flex items-center rounded-md border border-white/10 bg-white/10 px-4 py-2 text-sm font-medium text-indigo-300 shadow-sm backdrop-blur transition hover:bg-white/15 hover:text-white focus:outline-none focus:ring-2 focus:ring-indigo-400/60 focus:ring-offset-2 focus:ring-offset-[#09090b]">Create Invoice</a>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            
            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-3 rounded mb-4 shadow-sm">{{ session('success') }}</div>
            @endif

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b">
                            <th class="py-2 px-3 text-sm text-gray-500 font-semibold uppercase">Customer</th>
                            <th class="py-2 px-3 text-sm text-gray-500 font-semibold uppercase">Amount</th>
                            <th class="py-2 px-3 text-sm text-gray-500 font-semibold uppercase">Invoice Number</th>
                            <th class="py-2 px-3 text-sm text-gray-500 font-semibold uppercase">Status</th>
                            <th class="py-2 px-3 text-sm text-gray-500 font-semibold uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($invoices as $invoice)
                        <tr class="border-b">
                            <td class="py-3 px-4 text-sm text-gray-900">{{ $invoice->invoice_number }}</td>
                            <td class="py-3 px-4 text-sm text-gray-600">{{ $invoice->customer->name ?? 'N/A' }}</td>
                            <td class="py-3 px-4 text-sm text-gray-900 ">${{ number_format($invoice->amount, 2) }}</td>
                            <td class="py-3 px-4 text-sm">
                                <span class="px-2 py-1 text-xs font-medium rounded-full 
                                    {{ $invoice->status === 'paid' ? 'bg-green-100 text-green-800' : 
                                    ($invoice->status === 'partial' ? 'bg-yellow-100 text-yellow-800' : 
                                    'bg-red-100 text-red-800') }}">
                                    {{ ucfirst($invoice->status) }}
                                </span>
                            </td>
                            <td class="py-3 px-4">
                                <div class="flex items-center space-x-3">
                                    <!-- Send Invoice -->
                                    @if($invoice->status !== 'paid' && $invoice->status !== 'sent')
                                    <form action="{{ route('invoices.send', $invoice) }}" method="POST" onsubmit="return confirm('Send this invoice to {{ $invoice->customer->email }}?');" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-sm font-medium text-green-600 hover:text-green-900 transition">Send</button>
                                    </form>
                                    @endif
                                    <!-- Edit Link -->
                                    <a href="{{ route('invoices.edit', $invoice) }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-900 transition">Edit</a>
                                    <!-- Delete Form -->
                                    <form action="{{ route('invoices.destroy', $invoice) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this invoice?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-900 transition">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="py-8 text-center text-gray-500">
                                No invoices found. <a href="{{ route('invoices.create') }}" class="text-indigo-600 hover:underline">Create your first invoice</a>.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($invoices->hasPages())
                <div class="mt-6 border-t border-gray-100 pt-4">
                    {{ $invoices->links() }}
                </div>
            @endif

        </div>
    </div>
</x-app-layout>