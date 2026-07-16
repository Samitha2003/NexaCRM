<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Customers</h2>
            <a href="{{ route('customers.create') }}" class="bg-gray-900 text-[#C9A66B] px-4 py-2 rounded">Add Customer</a>
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
                        <th class="py-2">Name</th>
                        <th class="py-2">Email</th>
                        <th class="py-2">Status</th>
                        <th class="py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                    <tr class="border-b">
                        <td class="py-2">{{ $customer->name }}</td>
                        <td class="py-2">{{ $customer->email }}</td>
                        <td class="py-2">
                            <span class="px-2 py-1 text-sm rounded {{ $customer->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $customer->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="py-2 flex space-x-2">
                            <div class="flex items-center space-x-4">
                                <!-- Edit Link -->
                                <a href="{{ route('customers.edit', $customer) }}" class="text-sm underline text-blue-600 hover:text-blue-900">Edit</a>
                                <!-- Toggle Status Form -->
                                <form action="{{ route('customers.toggle-status', $customer) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="text-sm underline text-gray-600 hover:text-gray-900">Toggle Status</button>
                                </form>
                                <!-- Delete Form -->
                                <form action="{{ route('customers.destroy', $customer) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this customer?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm underline text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="mt-4">
                {{ $customers->links() }}
            </div>

        </div>
    </div>
</x-app-layout>