<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add New Customer</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('customers.store') }}" method="POST">
                    @csrf <div class="mb-4">
                        <label class="block font-medium">Name</label>
                        <input type="text" name="name" class="w-full border-gray-300 rounded-md" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Email</label>
                        <input type="email" name="email" class="w-full border-gray-300 rounded-md" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Phone</label>
                        <input type="text" name="phone" class="w-full border-gray-300 rounded-md">
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save Customer</button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>