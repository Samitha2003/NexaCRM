<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">Edit Proposal</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if ($errors->any())
                    <div class="bg-red-50 text-red-800 p-3 rounded mb-4">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('proposals.update', $proposal) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label for="customer_id" class="block font-medium text-gray-700">Customer</label>
                        <select name="customer_id" id="customer_id" class="w-full border-gray-300 rounded-md shadow-sm text-gray-400" required>
                            <option value="">Select Customer</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}" {{ old('customer_id', $proposal->customer_id) == $customer->id ? 'selected' : '' }}>
                                    {{ $customer->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="title" class="block font-medium text-gray-700">Proposal Title</label>
                        <input type="text" name="title" id="title" class="w-full border-gray-300 rounded-md shadow-sm text-gray-400" value="{{ old('title', $proposal->title) }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="amount" class="block font-medium text-gray-700">Amount ($)</label>
                        <input type="number" name="amount" id="amount" step="0.01" min="0" class="w-full border-gray-300 rounded-md shadow-sm text-gray-400" value="{{ old('amount', $proposal->amount) }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="status" class="block font-medium text-gray-700">Status</label>
                        <select name="status" id="status" class="w-full border-gray-300 rounded-md shadow-sm text-gray-400" required>
                            <option value="draft" {{ old('status', $proposal->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="sent" {{ old('status', $proposal->status) === 'sent' ? 'selected' : '' }}>Sent</option>
                            <option value="accepted" {{ old('status', $proposal->status) === 'accepted' ? 'selected' : '' }}>Accepted</option>
                            <option value="rejected" {{ old('status', $proposal->status) === 'rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="notes" class="block font-medium text-gray-700">Notes / Details</label>
                        <textarea name="notes" id="notes" rows="4" class="w-full border-gray-300 rounded-md shadow-sm text-gray-400">{{ old('notes', $proposal->notes) }}</textarea>
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="bg-gray-900 text-[#ffffff] px-4 py-2 rounded transition hover:bg-gray-800">
                            Update Proposal
                        </button>
                        <a href="{{ route('proposals.index') }}" class="text-sm text-gray-600 hover:underline">Cancel</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
