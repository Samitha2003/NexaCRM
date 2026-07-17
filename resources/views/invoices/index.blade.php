<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Invoices</h2>
            <a href="{{ route('invoices.create') }}" class="bg-gray-900 text-[#C9A66B] px-4 py-2 rounded transition hover:bg-gray-800">Create Invoice</a>   
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
                        <tr class="border-b border-gray-200 bg-gray-50 text-gray-700 uppercase text-xs font-semibold">
                            <th class="py-3 px-4">Invoice Number</th>
                            <th class="py-3 px-4">Customer</th>
                            <th class="py-3 px-4">Amount</th>
                            <th class="py-3 px-4">Status</th>
                            <th class="py-3 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($invoices as $invoice)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-3 px-4 font-medium text-gray-900">{{ $invoice->invoice_number }}</td>
                            <td class="py-3 px-4 text-gray-600">{{ $invoice->customer->name ?? 'N/A' }}</td>
                            <td class="py-3 px-4 text-gray-900 font-semibold">${{ number_format($invoice->amount, 0) }}</td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-1 text-xs font-medium rounded-full 
                                    {{ $invoice->status === 'paid' ? 'bg-green-100 text-green-800' : 
                                    ($invoice->status === 'partial' ? 'bg-yellow-100 text-yellow-800' : 
                                    'bg-red-100 text-red-800') }}">
                                    {{ ucfirst($invoice->status) }}
                                </span>
                            </td>
                            <td class="py-3 px-4">
                                <div class="flex items-center space-x-3">
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