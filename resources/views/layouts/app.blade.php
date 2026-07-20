<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body { font-family: 'Inter', sans-serif; }
            
            @keyframes float {
                0% { transform: translate(0, 0) scale(1); }
                50% { transform: translate(5%, 10%) scale(1.1); }
                100% { transform: translate(-5%, -5%) scale(0.9); }
            }
            .animate-float {
                animation: float 20s infinite ease-in-out alternate;
            }
            .animate-float-delayed {
                animation: float 20s infinite ease-in-out alternate;
                animation-delay: -5s;
            }
        </style>
    </head>
    <body class="font-sans antialiased text-slate-200 bg-[#09090b] overflow-hidden">
        <div class="flex h-screen bg-[#09090b] relative">
            
            <!-- Ambient Background Glow -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none z-0">
                <div class="absolute -top-[10%] -left-[10%] w-[50vw] h-[50vw] rounded-full blur-[100px] opacity-35 animate-float bg-[radial-gradient(circle,#6366f1_0%,transparent_70%)]"></div>
                <div class="absolute -bottom-[10%] -right-[10%] w-[40vw] h-[40vw] rounded-full blur-[100px] opacity-35 animate-float-delayed bg-[radial-gradient(circle,#8b5cf6_0%,transparent_70%)]"></div>
            </div>

            <!-- Sidebar -->
            <aside class="hidden lg:flex w-64 bg-[#09090b]/80 backdrop-blur-md flex-col border-r border-white/5 relative z-10">
                <!-- Logo Area -->
                <div class="h-16 flex items-center px-6 border-b border-white/5">
                    <a href="/" class="text-2xl font-bold tracking-tight bg-gradient-to-r from-white to-indigo-200 bg-clip-text text-transparent">NexaCRM</a>
                </div>

                <!-- Navigation Links -->
                <nav class="flex-1 px-4 py-6 space-y-2">
                    <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded transition-colors {{ request()->routeIs('dashboard') ? 'bg-white/10 text-indigo-400' : 'text-slate-300 hover:bg-white/5 hover:text-indigo-400' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('customers.index') }}" class="block px-4 py-2 rounded transition-colors {{ request()->routeIs('customers.*') ? 'bg-white/10 text-indigo-400' : 'text-slate-300 hover:bg-white/5 hover:text-indigo-400' }}">
                        Customers
                    </a>
                    <a href="{{ route('proposals.index') }}" class="block px-4 py-2 rounded transition-colors {{ request()->routeIs('proposals.*') ? 'bg-white/10 text-indigo-400' : 'text-slate-300 hover:bg-white/5 hover:text-indigo-400' }}">
                        Proposal
                    </a>
                    <a href="{{ route('invoices.index') }}" class="block px-4 py-2 rounded transition-colors {{ request()->routeIs('invoices.*') ? 'bg-white/10 text-indigo-400' : 'text-slate-300 hover:bg-white/5 hover:text-indigo-400' }}">
                        Invoices
                    </a>
                    <a href="{{ route('transactions.index') }}" class="block px-4 py-2 rounded transition-colors {{ request()->routeIs('transactions.*') ? 'bg-white/10 text-indigo-400' : 'text-slate-300 hover:bg-white/5 hover:text-indigo-400' }}">Transactions</a>
                </nav>
            </aside>

            <!-- Main Content Wrapper -->
            <div class="flex-1 flex flex-col overflow-hidden relative z-10">
                
                <!-- Topbar (Breeze's existing navigation for profile/logout) -->
                @include('layouts.navigation')

                <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-[#09090b]/40 backdrop-blur-md border-b border-white/5">
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
