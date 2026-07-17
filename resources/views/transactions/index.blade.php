<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Transactions</h2>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            
            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
            @endif

            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b">
                        <th class="py-2 text-sm text-gray-500 font-semibold uppercase">TRANSACTION ID</th>
                        <th class="py-2 text-sm text-gray-500 font-semibold uppercase">CUSTOMER</th>
                        <th class="py-2 text-sm text-gray-500 font-semibold uppercase">INVOICE</th>
                        <th class="py-2 text-sm text-gray-500 font-semibold uppercase">STRIPE SESSION ID</th>
                        <th class="py-2 text-sm text-gray-500 font-semibold uppercase">AMOUNT</th>
                        <th class="py-2 text-sm text-gray-500 font-semibold uppercase">STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $transaction)
                    <tr class="border-b">
                        <td class="py-2 text-sm text-gray-900 font-medium">#{{ $transaction->id }}</td>
                        <td class="py-2 text-sm text-gray-600">{{ $transaction->customer->name ?? 'N/A' }}</td>
                        <td class="py-2 text-sm text-gray-600">{{ $transaction->invoice->invoice_number ?? $transaction->invoice_id ?? 'N/A' }}</td>
                        <td class="py-2 text-sm text-gray-500 truncate max-w-xs" title="{{ $transaction->stripe_session_id }}">{{ $transaction->stripe_session_id ?? 'N/A' }}</td>
                        <td class="py-2 text-sm text-gray-600">${{ number_format($transaction->amount, 2) }}</td>
                        <td class="py-2 text-sm">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $transaction->status === 'successful' || $transaction->status === 'paid' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ ucfirst($transaction->status) }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="mt-4">
                {{ $transactions->links() }}
            </div>

        </div>
    </div>
</x-app-layout>