<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">Add New Customer</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('customers.store') }}" method="POST">
                    @csrf <div class="mb-4">
                        <label class="block font-medium text-gray-700">Name</label>
                        <input type="text" name="name" class="w-full border-gray-300 rounded-md text-gray-400" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Email</label>
                        <input type="email" name="email" class="w-full border-gray-300 rounded-md text-gray-400" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Phone</label>
                        <input type="text" name="phone" class="w-full border-gray-300 rounded-md text-gray-400">
                    </div>

                    <button type="submit" class="bg-gray-900 text-[#ffffff] px-4 py-2 rounded transition hover:bg-gray-800">Save Customer</button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>