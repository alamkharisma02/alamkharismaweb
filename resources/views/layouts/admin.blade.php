<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel - {{ \App\Models\Setting::get('site_name', 'Alam Kharisma Bersaudara') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS (Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
    @yield('styles')
</head>
<body class="bg-slate-100 text-slate-800">

    <div x-data="{ sidebarOpen: false }" class="flex h-screen overflow-hidden">
        
        <!-- Sidebar -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" 
               class="fixed inset-y-0 left-0 z-30 w-64 bg-slate-900 text-slate-400 border-r border-slate-800 transition-transform duration-300 transform md:translate-x-0 md:static md:inset-auto">
            
            <!-- Sidebar Header -->
            <div class="flex items-center justify-between px-6 py-5 border-b border-slate-800 bg-slate-950">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2">
                    <div class="w-8 h-8 rounded-lg bg-brand-primary flex items-center justify-center text-white font-extrabold text-base">
                        <i class="fa-solid fa-helmet-safety"></i>
                    </div>
                    <span class="font-extrabold text-base text-white tracking-tight">
                        AKB<span class="text-brand-accent text-brand-accent">ADMIN</span>
                    </span>
                </a>
                <button @click="sidebarOpen = false" class="md:hidden text-slate-400 hover:text-white">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
            </div>

            <!-- Sidebar Nav -->
            <nav class="px-4 py-6 space-y-1.5 overflow-y-auto h-[calc(100vh-73px)]">
                <p class="px-3 text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Main Menu</p>
                
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center px-3 py-2.5 rounded-lg text-sm font-semibold transition-colors {{ Route::is('admin.dashboard') ? 'bg-slate-800 text-white shadow' : 'hover:bg-slate-800/50 hover:text-slate-200' }}">
                    <i class="fa-solid fa-chart-line w-5 text-lg mr-3 text-brand-accent"></i>
                    Dashboard
                </a>

                <a href="{{ route('admin.projects.index') }}" 
                   class="flex items-center px-3 py-2.5 rounded-lg text-sm font-semibold transition-colors {{ Route::is('admin.projects.*') || Route::is('admin.projects.progress.*') ? 'bg-slate-800 text-white shadow' : 'hover:bg-slate-800/50 hover:text-slate-200' }}">
                    <i class="fa-solid fa-person-digging w-5 text-lg mr-3 text-brand-accent"></i>
                    Kelola Proyek
                </a>

                <a href="{{ route('admin.articles.index') }}" 
                   class="flex items-center px-3 py-2.5 rounded-lg text-sm font-semibold transition-colors {{ Route::is('admin.articles.*') ? 'bg-slate-800 text-white shadow' : 'hover:bg-slate-800/50 hover:text-slate-200' }}">
                    <i class="fa-solid fa-newspaper w-5 text-lg mr-3 text-brand-accent"></i>
                    Kelola Artikel
                </a>

                <a href="{{ route('admin.videos.index') }}" 
                   class="flex items-center px-3 py-2.5 rounded-lg text-sm font-semibold transition-colors {{ Route::is('admin.videos.*') ? 'bg-slate-800 text-white shadow' : 'hover:bg-slate-800/50 hover:text-slate-200' }}">
                    <i class="fa-solid fa-video w-5 text-lg mr-3 text-brand-accent"></i>
                    Kelola Video
                </a>

                <a href="{{ route('admin.testimonials.index') }}" 
                   class="flex items-center px-3 py-2.5 rounded-lg text-sm font-semibold transition-colors {{ Route::is('admin.testimonials.*') ? 'bg-slate-800 text-white shadow' : 'hover:bg-slate-800/50 hover:text-slate-200' }}">
                    <i class="fa-solid fa-comments w-5 text-lg mr-3 text-brand-accent"></i>
                    Kelola Testimoni
                </a>

                <a href="{{ route('admin.settings.edit') }}" 
                   class="flex items-center px-3 py-2.5 rounded-lg text-sm font-semibold transition-colors {{ Route::is('admin.settings.*') ? 'bg-slate-800 text-white shadow' : 'hover:bg-slate-800/50 hover:text-slate-200' }}">
                    <i class="fa-solid fa-sliders w-5 text-lg mr-3 text-brand-accent"></i>
                    Pengaturan Web
                </a>

                <div class="pt-6 mt-6 border-t border-slate-800">
                    <a href="{{ route('home') }}" target="_blank"
                       class="flex items-center px-3 py-2.5 rounded-lg text-sm font-semibold text-slate-400 hover:bg-slate-800/50 hover:text-slate-200 transition-colors">
                        <i class="fa-solid fa-globe w-5 text-lg mr-3 text-slate-500"></i>
                        Lihat Website
                    </a>

                    <form action="{{ route('admin.logout') }}" method="POST" class="mt-2">
                        @csrf
                        <button type="submit" 
                                class="w-full flex items-center px-3 py-2.5 rounded-lg text-sm font-semibold text-red-400 hover:bg-red-950/20 hover:text-red-300 transition-colors">
                            <i class="fa-solid fa-right-from-bracket w-5 text-lg mr-3 text-red-400/80"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </nav>
        </aside>

        <!-- Content Area -->
        <div class="flex-1 flex flex-col overflow-hidden">
            
            <!-- Navbar Header -->
            <header class="flex items-center justify-between px-6 py-4 bg-white border-b border-slate-200 shadow-sm">
                <div class="flex items-center space-x-4">
                    <!-- Hamburger Menu for Mobile -->
                    <button @click="sidebarOpen = true" class="md:hidden text-slate-600 hover:text-slate-900 focus:outline-none">
                        <i class="fa-solid fa-bars text-xl"></i>
                    </button>
                    <h2 class="text-lg font-bold text-slate-800">Panel Administrator</h2>
                </div>
                
                <!-- Admin Info -->
                <div class="flex items-center space-x-3">
                    <span class="text-sm font-semibold text-slate-600 hidden sm:inline">{{ Auth::user()->name ?? 'Administrator' }}</span>
                    <div class="w-9 h-9 rounded-full bg-slate-200 text-slate-700 flex items-center justify-center font-bold text-sm border border-slate-300">
                        {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                    </div>
                </div>
            </header>

            <!-- Main Content Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50 p-6">
                
                <!-- Flash Messages -->
                @if(session('success'))
                    <div x-data="{ show: true }" x-show="show" x-transition class="mb-6 p-4 rounded-lg bg-emerald-50 text-emerald-800 border border-emerald-200 flex items-center justify-between">
                        <div class="flex items-center">
                            <i class="fa-solid fa-circle-check text-xl mr-3 text-brand-primary"></i>
                            <span class="text-sm font-semibold">{{ session('success') }}</span>
                        </div>
                        <button @click="show = false" class="text-brand-accent hover:text-emerald-800"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                @endif

                @if(session('error'))
                    <div x-data="{ show: true }" x-show="show" x-transition class="mb-6 p-4 rounded-lg bg-rose-50 text-rose-800 border border-rose-200 flex items-center justify-between">
                        <div class="flex items-center">
                            <i class="fa-solid fa-circle-exclamation text-xl mr-3 text-rose-600"></i>
                            <span class="text-sm font-semibold">{{ session('error') }}</span>
                        </div>
                        <button @click="show = false" class="text-rose-500 hover:text-rose-800"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    @yield('scripts')
</body>
</html>
