<x-app-layout>
    <x-slot name="title">
        Dashboard - NexaCRM
    </x-slot>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-100 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/5 border border-white/5 backdrop-blur-md overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-slate-300">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
