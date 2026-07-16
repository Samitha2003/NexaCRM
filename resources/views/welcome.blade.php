<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NexaCRM - Customer Relationship Management</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
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
<body class="bg-[#09090b] text-slate-50 antialiased overflow-x-hidden relative">
    
    <!-- Ambient Background Glow -->
    <div class="fixed inset-0 overflow-hidden z-[-1] pointer-events-none">
        <div class="absolute -top-[10%] -left-[10%] w-[60vw] h-[60vw] rounded-full blur-[120px] opacity-40 animate-float bg-[radial-gradient(circle,#6366f1_0%,transparent_70%)]"></div>
        <div class="absolute -bottom-[20%] -right-[10%] w-[50vw] h-[50vw] rounded-full blur-[120px] opacity-40 animate-float-delayed bg-[radial-gradient(circle,#8b5cf6_0%,transparent_70%)]"></div>
    </div>

    <!-- Header -->
    <header class="fixed top-0 w-full px-[5%] py-6 flex justify-between items-center bg-[#09090b]/70 backdrop-blur-md border-b border-white/5 z-50">
        <a href="/" class="text-2xl font-bold tracking-tight bg-gradient-to-r from-white to-indigo-200 bg-clip-text text-transparent">NexaCRM</a>
        
        <nav class="hidden md:flex items-center gap-8">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm font-medium text-slate-100 hover:text-indigo-400 transition-colors">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-medium text-slate-100 hover:text-indigo-400 transition-colors">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-5 py-2.5 rounded-lg font-semibold text-white bg-gradient-to-br from-indigo-500 to-violet-500 hover:from-indigo-600 hover:to-violet-600 shadow-[0_4px_15px_rgba(99,102,241,0.3)] hover:-translate-y-0.5 hover:shadow-[0_6px_20px_rgba(99,102,241,0.4)] transition-all">Get Started</a>
                    @endif
                @endauth
            @endif
        </nav>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="min-h-screen flex flex-col justify-center items-center text-center px-[5%] pt-20">
            <h1 class="text-[clamp(3rem,6vw,5rem)] font-bold leading-tight mb-6 max-w-[800px] bg-gradient-to-br from-white to-indigo-300 bg-clip-text text-transparent">
                Elevate Your Customer Relationships
            </h1>
            <p class="text-xl text-slate-400 max-w-[600px] mb-10">
                NexaCRM provides the intelligent tools you need to manage leads, automate workflows, and close deals faster—all from one beautiful interface.
            </p>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-8 py-4 text-lg rounded-lg font-semibold text-white bg-gradient-to-br from-indigo-500 to-violet-500 hover:from-indigo-600 hover:to-violet-600 shadow-[0_4px_15px_rgba(99,102,241,0.3)] hover:-translate-y-0.5 hover:shadow-[0_6px_20px_rgba(99,102,241,0.4)] transition-all">
                    Start Free Trial
                </a>
            @else
                <a href="{{ url('/dashboard') }}" class="inline-flex items-center justify-center px-8 py-4 text-lg rounded-lg font-semibold text-white bg-gradient-to-br from-indigo-500 to-violet-500 hover:from-indigo-600 hover:to-violet-600 shadow-[0_4px_15px_rgba(99,102,241,0.3)] hover:-translate-y-0.5 hover:shadow-[0_6px_20px_rgba(99,102,241,0.4)] transition-all">
                    Go to Dashboard
                </a>
            @endif
        </section>

        <!-- Features Section -->
        <section class="py-24 px-[5%] max-w-7xl mx-auto">
            <h2 class="text-center text-4xl font-semibold mb-16">Everything you need to grow</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <div class="group relative bg-white/5 border border-white/5 rounded-2xl p-10 backdrop-blur-sm transition-all duration-300 hover:-translate-y-2 hover:border-indigo-500/30 hover:shadow-[0_20px_40px_rgba(0,0,0,0.4)] overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-white/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none"></div>
                    <div class="w-12 h-12 bg-indigo-500/10 rounded-xl flex items-center justify-center mb-6 text-indigo-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-4 relative z-10">Lead Tracking</h3>
                    <p class="text-slate-400 text-sm leading-relaxed relative z-10">Never lose track of a potential customer. Monitor every interaction and move leads seamlessly through your customized sales pipeline.</p>
                </div>

                <div class="group relative bg-white/5 border border-white/5 rounded-2xl p-10 backdrop-blur-sm transition-all duration-300 hover:-translate-y-2 hover:border-indigo-500/30 hover:shadow-[0_20px_40px_rgba(0,0,0,0.4)] overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-white/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none"></div>
                    <div class="w-12 h-12 bg-indigo-500/10 rounded-xl flex items-center justify-center mb-6 text-indigo-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-4 relative z-10">Smart Analytics</h3>
                    <p class="text-slate-400 text-sm leading-relaxed relative z-10">Make data-driven decisions with real-time dashboards and comprehensive reports on your team's performance and revenue projections.</p>
                </div>

                <div class="group relative bg-white/5 border border-white/5 rounded-2xl p-10 backdrop-blur-sm transition-all duration-300 hover:-translate-y-2 hover:border-indigo-500/30 hover:shadow-[0_20px_40px_rgba(0,0,0,0.4)] overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-white/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none"></div>
                    <div class="w-12 h-12 bg-indigo-500/10 rounded-xl flex items-center justify-center mb-6 text-indigo-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-4 relative z-10">Seamless Integration</h3>
                    <p class="text-slate-400 text-sm leading-relaxed relative z-10">Connect NexaCRM with your favorite email providers, calendars, and other essential tools to keep all your operations in perfect sync.</p>
                </div>

            </div>
        </section>
    </main>

    <footer class="text-center py-12 px-[5%] border-t border-white/5 text-slate-500 text-sm mt-10">
        <p>&copy; {{ date('Y') }} NexaCRM. All rights reserved.</p>
    </footer>
</body>
</html>
