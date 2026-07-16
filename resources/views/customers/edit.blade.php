<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Customer: {{ $customer->name }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('customers.update', $customer) }}" method="POST">
                    @csrf 
                    @method('PUT') <div class="mb-4">
                        <label class="block font-medium">Name</label>
                        <input type="text" name="name" value="{{ old('name', $customer->name) }}" class="w-full border-gray-300 rounded-md" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Email</label>
                        <input type="email" name="email" value="{{ old('email', $customer->email) }}" class="w-full border-gray-300 rounded-md" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone', $customer->phone) }}" class="w-full border-gray-300 rounded-md">
                    </div>

                    <div class="flex space-x-4">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update Customer</button>
                        <a href="{{ route('customers.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded">Cancel</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>