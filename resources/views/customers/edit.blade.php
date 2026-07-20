<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">Edit Customer: {{ $customer->name }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('customers.update', $customer) }}" method="POST">
                    @csrf 
                    @method('PUT') <div class="mb-4">
                        <label class="block font-medium text-gray-700">Name</label>
                        <input type="text" name="name" value="{{ old('name', $customer->name) }}" class="w-full border-gray-300 rounded-md text-gray-400" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ old('email', $customer->email) }}" class="w-full border-gray-300 rounded-md text-gray-400" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone', $customer->phone) }}" class="w-full border-gray-300 rounded-md text-gray-400">
                    </div>

                    <div class="flex space-x-4">
                        <button type="submit" class="bg-gray-900 text-[#ffffff] px-4 py-2 rounded transition hover:bg-gray-800">Update Customer</button>
                        <a href="{{ route('customers.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded">Cancel</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>