<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel - {{ \App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara') }}</title>
    
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
        
        <!-- Sidebar Backdrop for Mobile -->
        <div x-show="sidebarOpen" 
             @click="sidebarOpen = false" 
             class="fixed inset-0 z-20 bg-emerald-900/60 backdrop-blur-sm transition-opacity md:hidden"
             style="display: none;"></div>
        
        <!-- Sidebar -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" 
               class="fixed inset-y-0 left-0 z-30 w-64 bg-[#0A1E13] text-slate-300 border-r border-emerald-950/80 transition-transform duration-300 transform md:translate-x-0 md:static md:inset-auto">
            
            <!-- Sidebar Header -->
            <div class="flex items-center justify-between px-6 py-5 border-b border-emerald-950/80 bg-[#050F09]">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2.5">
                    <div class="w-8 h-8 rounded-lg bg-gradient-to-r from-[#C5A880] to-[#B4966B] flex items-center justify-center text-[#0A1E13] font-black text-base shadow-sm">
                        <i class="fa-solid fa-helmet-safety"></i>
                    </div>
                    <span class="font-extrabold text-base text-white tracking-tight uppercase">
                        AKB<span class="text-[#C5A880]">ADMIN</span>
                    </span>
                </a>
                <button @click="sidebarOpen = false" class="md:hidden text-slate-400 hover:text-white">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
            </div>

            <!-- Sidebar Nav -->
            <nav class="px-4 py-6 space-y-2 overflow-y-auto h-[calc(100vh-73px)]">
                <p class="px-3 text-[10px] font-bold text-emerald-700/60 uppercase tracking-widest mb-3">Main Menu</p>
                
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center px-3 py-2.5 rounded-lg text-xs sm:text-sm font-semibold transition-all duration-300 transform hover:translate-x-1 {{ Route::is('admin.dashboard') ? 'bg-[#C5A880] text-[#0A1E13] shadow-lg shadow-[#C5A880]/15' : 'hover:bg-emerald-950/40 hover:text-[#C5A880]' }}">
                    <i class="fa-solid fa-chart-line w-5 text-base mr-3 {{ Route::is('admin.dashboard') ? 'text-[#0A1E13]' : 'text-[#C5A880]' }}"></i>
                    Dashboard
                </a>

                <a href="{{ route('admin.projects.index') }}" 
                   class="flex items-center px-3 py-2.5 rounded-lg text-xs sm:text-sm font-semibold transition-all duration-300 transform hover:translate-x-1 {{ Route::is('admin.projects.*') || Route::is('admin.projects.progress.*') ? 'bg-[#C5A880] text-[#0A1E13] shadow-lg shadow-[#C5A880]/15' : 'hover:bg-emerald-950/40 hover:text-[#C5A880]' }}">
                    <i class="fa-solid fa-person-digging w-5 text-base mr-3 {{ Route::is('admin.projects.*') || Route::is('admin.projects.progress.*') ? 'text-[#0A1E13]' : 'text-[#C5A880]' }}"></i>
                    Kelola Proyek
                </a>

                <a href="{{ route('admin.articles.index') }}" 
                   class="flex items-center px-3 py-2.5 rounded-lg text-xs sm:text-sm font-semibold transition-all duration-300 transform hover:translate-x-1 {{ Route::is('admin.articles.*') ? 'bg-[#C5A880] text-[#0A1E13] shadow-lg shadow-[#C5A880]/15' : 'hover:bg-emerald-950/40 hover:text-[#C5A880]' }}">
                    <i class="fa-solid fa-newspaper w-5 text-base mr-3 {{ Route::is('admin.articles.*') ? 'text-[#0A1E13]' : 'text-[#C5A880]' }}"></i>
                    Kelola Artikel
                </a>

                <a href="{{ route('admin.videos.index') }}" 
                   class="flex items-center px-3 py-2.5 rounded-lg text-xs sm:text-sm font-semibold transition-all duration-300 transform hover:translate-x-1 {{ Route::is('admin.videos.*') ? 'bg-[#C5A880] text-[#0A1E13] shadow-lg shadow-[#C5A880]/15' : 'hover:bg-emerald-950/40 hover:text-[#C5A880]' }}">
                    <i class="fa-solid fa-video w-5 text-base mr-3 {{ Route::is('admin.videos.*') ? 'text-[#0A1E13]' : 'text-[#C5A880]' }}"></i>
                    Kelola Video
                </a>

                <a href="{{ route('admin.settings.edit') }}" 
                   class="flex items-center px-3 py-2.5 rounded-lg text-xs sm:text-sm font-semibold transition-all duration-300 transform hover:translate-x-1 {{ Route::is('admin.settings.*') ? 'bg-[#C5A880] text-[#0A1E13] shadow-lg shadow-[#C5A880]/15' : 'hover:bg-emerald-950/40 hover:text-[#C5A880]' }}">
                    <i class="fa-solid fa-sliders w-5 text-base mr-3 {{ Route::is('admin.settings.*') ? 'text-[#0A1E13]' : 'text-[#C5A880]' }}"></i>
                    Pengaturan Web
                </a>

                <div class="pt-6 mt-6 border-t border-emerald-950/80 space-y-2">
                    <a href="{{ route('home') }}" target="_blank"
                       class="flex items-center px-3 py-2.5 rounded-lg text-xs sm:text-sm font-semibold text-slate-300 hover:bg-emerald-950/40 hover:text-[#C5A880] transition-colors">
                        <i class="fa-solid fa-globe w-5 text-base mr-3 text-[#C5A880]"></i>
                        Lihat Website
                    </a>

                    <form action="{{ route('admin.logout') }}" method="POST" class="mt-2">
                        @csrf
                        <button type="submit" 
                                class="w-full flex items-center px-3 py-2.5 rounded-lg text-xs sm:text-sm font-semibold text-rose-400 hover:bg-rose-955 hover:bg-rose-950/20 hover:text-rose-350 transition-colors">
                            <i class="fa-solid fa-right-from-bracket w-5 text-base mr-3 text-rose-455"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </nav>
        </aside>

        <!-- Content Area -->
        <div class="flex-1 flex flex-col overflow-hidden">
            
            <!-- Navbar Header -->
            <header class="flex items-center justify-between px-6 py-4 bg-[#0A1E13] border-b border-emerald-950/60 shadow-md">
                <div class="flex items-center space-x-4">
                    <!-- Hamburger Menu for Mobile -->
                    <button @click="sidebarOpen = true" class="md:hidden text-white hover:text-[#C5A880] focus:outline-none transition-colors">
                        <i class="fa-solid fa-bars text-xl"></i>
                    </button>
                    <h2 class="text-sm sm:text-base font-extrabold text-white uppercase tracking-wider">Panel Administrator</h2>
                </div>
                
                <!-- Admin Info -->
                <div class="flex items-center space-x-3.5">
                    <span class="text-xs sm:text-sm font-bold text-slate-350 hidden sm:inline">{{ Auth::user()->name ?? 'Administrator' }}</span>
                    <div class="w-9 h-9 rounded-full bg-emerald-950 text-[#C5A880] flex items-center justify-center font-bold text-sm border border-emerald-900/60 shadow-inner">
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

    <script>
        function previewImage(input, containerId, imageId) {
            const container = document.getElementById(containerId);
            const img = document.getElementById(imageId);
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    img.src = e.target.result;
                    container.classList.remove('hidden');
                    container.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                container.classList.add('hidden');
                container.style.display = 'none';
            }
        }

        function previewMultipleImages(input, containerId, gridId) {
            const container = document.getElementById(containerId);
            const grid = document.getElementById(gridId);
            grid.innerHTML = '';
            
            if (input.files && input.files.length > 0) {
                container.classList.remove('hidden');
                container.style.display = 'block';
                Array.from(input.files).forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const wrapper = document.createElement('div');
                        wrapper.className = 'rounded-lg overflow-hidden border border-slate-200 aspect-video bg-slate-100';
                        
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'w-full h-full object-cover';
                        
                        wrapper.appendChild(img);
                        grid.appendChild(wrapper);
                    }
                    reader.readAsDataURL(file);
                });
            } else {
                container.classList.add('hidden');
                container.style.display = 'none';
            }
        }
    </script>

    @yield('scripts')
</body>
</html>
