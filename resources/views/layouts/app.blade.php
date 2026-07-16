<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-gray-900">
        <div class="flex h-screen bg-[#FAF8F3]">
            
            <!-- Sidebar -->
            <aside class="w-64 bg-gray-900 text-white flex flex-col border-r border-gray-800">
                <!-- Logo Area -->
                <div class="h-16 flex items-center px-6 border-b border-gray-800">
                    <h1 class="text-xl font-bold tracking-wider text-[#C9A66B]">CRM SYSTEM</h1>
                </div>

                <!-- Navigation Links -->
                <nav class="flex-1 px-4 py-6 space-y-2">
                    <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded transition-colors {{ request()->routeIs('dashboard') ? 'bg-gray-800 text-[#C9A66B]' : 'hover:bg-gray-800 hover:text-[#C9A66B]' }}">
                        Dashboard
                    </a>
                    
                    <!-- Placeholders for future routes -->
                    <a href="#" class="block px-4 py-2 rounded transition-colors hover:bg-gray-800 hover:text-[#C9A66B]">Customers</a>
                    <a href="#" class="block px-4 py-2 rounded transition-colors hover:bg-gray-800 hover:text-[#C9A66B]">Proposals</a>
                    <a href="#" class="block px-4 py-2 rounded transition-colors hover:bg-gray-800 hover:text-[#C9A66B]">Invoices</a>
                    <a href="#" class="block px-4 py-2 rounded transition-colors hover:bg-gray-800 hover:text-[#C9A66B]">Transactions</a>
                </nav>
            </aside>

            <!-- Main Content Wrapper -->
            <div class="flex-1 flex flex-col overflow-hidden">
                
                <!-- Topbar (Breeze's existing navigation for profile/logout) -->
                @include('layouts.navigation')

                <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-white shadow-sm">
                        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <!-- Page Content -->
                <main class="flex-1 overflow-y-auto p-6">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
