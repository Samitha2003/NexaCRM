<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Invoice</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if ($errors->any())
                    <div class="bg-red-50 text-red-700 p-4 rounded mb-4 border border-red-200">
                        <ul class="list-disc pl-5 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('invoices.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="customer_id" class="block font-medium text-gray-700">Customer</label>
                        <select name="customer_id" id="customer_id" class="w-full border-gray-300 rounded-md shadow-sm" required>
                            <option value="">-- Select Customer --</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                    {{ $customer->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-4">
                        <label for="invoice_number" class="block font-medium text-gray-700">Invoice Number</label>
                        <input type="text" name="invoice_number" id="invoice_number" class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('invoice_number') }}" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="amount" class="block font-medium text-gray-700">Amount ($)</label>
                        <input type="number" name="amount" id="amount" step="1" min="0" class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('amount') }}" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="status" class="block font-medium text-gray-700">Status</label>
                        <select name="status" id="status" class="w-full border-gray-300 rounded-md shadow-sm" required>
                            <option value="unpaid" {{ old('status', 'unpaid') === 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                            <option value="partial" {{ old('status') === 'partial' ? 'selected' : '' }}>Partial</option>
                            <option value="paid" {{ old('status') === 'paid' ? 'selected' : '' }}>Paid</option>
                        </select>
                    </div>
                    
                    <div class="mb-4">
                        <label for="notes" class="block font-medium text-gray-700">Notes / Details</label>
                        <textarea name="notes" id="notes" rows="4" class="w-full border-gray-300 rounded-md shadow-sm">{{ old('notes') }}</textarea>
                    </div>
                    
                    <div class="flex items-center gap-4">
                        <button type="submit" class="bg-gray-900 text-[#C9A66B] px-4 py-2 rounded transition hover:bg-gray-800">
                            Save Invoice
                        </button>
                        <a href="{{ route('invoices.index') }}" class="text-sm text-gray-600 hover:underline">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>  
</x-app-layout>