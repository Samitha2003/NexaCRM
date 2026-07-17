<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Proposals</h2>
            <a href="{{ route('proposals.create') }}" class="bg-gray-900 text-[#C9A66B] px-4 py-2 rounded transition hover:bg-gray-800">Create Proposal</a>
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
                            <th class="py-3 px-4">Title</th>
                            <th class="py-3 px-4">Customer</th>
                            <th class="py-3 px-4">Amount</th>
                            <th class="py-3 px-4">Status</th>
                            <th class="py-3 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($proposals as $proposal)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-3 px-4 font-medium text-gray-900">{{ $proposal->title }}</td>
                            <td class="py-3 px-4 text-gray-600">{{ $proposal->customer->name ?? 'N/A' }}</td>
                            <td class="py-3 px-4 text-gray-900 font-semibold">${{ number_format($proposal->amount, 0) }}</td>
                            <td class="py-3 px-4">
                                <form action="{{ route('proposals.update-status', $proposal) }}" method="POST" class="flex items-center gap-2">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" class="text-sm border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 py-1 px-2 bg-white" onchange="this.form.submit()">
                                        <option value="draft" {{ $proposal->status === 'draft' ? 'selected' : '' }}>Draft</option>
                                        <option value="sent" {{ $proposal->status === 'sent' ? 'selected' : '' }}>Sent</option>
                                        <option value="accepted" {{ $proposal->status === 'accepted' ? 'selected' : '' }}>Accepted</option>
                                        <option value="rejected" {{ $proposal->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    </select>
                                </form>
                            </td>
                            <td class="py-3 px-4">
                                <div class="flex items-center space-x-3">
                                    <!-- Edit Link -->
                                    <a href="{{ route('proposals.edit', $proposal) }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-900 transition">Edit</a>
                                    <!-- Delete Form -->
                                    <form action="{{ route('proposals.destroy', $proposal) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this proposal?');" class="inline">
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
                                No proposals found. <a href="{{ route('proposals.create') }}" class="text-indigo-600 hover:underline">Create your first proposal</a>.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($proposals->hasPages())
                <div class="mt-6 border-t border-gray-100 pt-4">
                    {{ $proposals->links() }}
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
