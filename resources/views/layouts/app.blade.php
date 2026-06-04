<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- SEO Meta Tags -->
    <title>@yield('title', \App\Models\Setting::get('site_name', 'Alam Kharisma Bersaudara') . ' - ' . \App\Models\Setting::get('site_tagline', 'Interior, Eksterior, dan Kontraktor Konstruksi'))</title>
    <meta name="description" content="@yield('meta_description', \App\Models\Setting::get('hero_subtitle', 'PT Alam Kharisma Bersaudara menyediakan jasa kontraktor eksterior, interior mewah, dan konstruksi sipil berstandar tinggi secara profesional.'))">
    <meta name="keywords" content="kontraktor sipil, jasa interior, eksterior rumah, bangun rumah, renovasi gedung, PT Alam Kharisma Bersaudara, RAB transparan">
    <meta name="author" content="{{ \App\Models\Setting::get('site_name', 'Alam Kharisma Bersaudara') }}">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title', \App\Models\Setting::get('site_name', 'Alam Kharisma Bersaudara') . ' - ' . \App\Models\Setting::get('site_tagline', 'Interior, Eksterior, dan Kontraktor Konstruksi'))">
    <meta property="og:description" content="@yield('meta_description', \App\Models\Setting::get('hero_subtitle', 'PT Alam Kharisma Bersaudara menyediakan jasa kontraktor eksterior, interior mewah, dan konstruksi sipil berstandar tinggi secara profesional.'))">
    <meta property="og:image" content="@yield('meta_image', 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=1200&h=630&fit=crop')">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS (Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Alpine.js for Micro-interactions -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', 'Instrument Sans', sans-serif;
        }
    </style>
    @yield('styles')
</head>
<body class="bg-slate-50 text-slate-900 selection:bg-brand-primary selection:text-white overflow-x-hidden">

    <!-- Header / Sticky Glassmorphism Navbar -->
    <header x-data="{ mobileMenuOpen: false, isScrolled: false }" 
            x-init="window.addEventListener('scroll', () => { isScrolled = window.scrollY > 20 })"
            :class="isScrolled ? 'bg-white/95 backdrop-blur-md shadow-md border-b border-slate-200/80 py-3' : 'bg-white/90 backdrop-blur-md py-4 shadow-sm border-b border-slate-200/40'"
            class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center group gap-3">
                    <img src="{{ asset('images/logo.png') }}" 
                         class="h-14 sm:h-16 md:h-20 w-auto transition-transform duration-300 mix-blend-multiply" 
                         alt="PT Alam Kharisma Bersaudara">
                    <div class="flex flex-col leading-tight">
                        <span class="text-brand-primary font-extrabold text-base sm:text-lg md:text-xl tracking-wide uppercase">Alam Kharisma</span>
                        <span class="text-brand-primary font-bold text-xs sm:text-sm md:text-base tracking-[0.2em] uppercase">Bersaudara</span>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <nav class="hidden md:flex items-center space-x-8" x-data="{ openTentang: false }">
                    <a href="{{ route('home') }}" class="text-sm font-semibold hover:text-brand-accent transition-colors duration-300 {{ Route::is('home') ? 'text-brand-accent' : 'text-brand-primary' }}">BERANDA</a>
                    
                    <!-- Dropdown Tentang Kami -->
                    <div class="relative" @mouseenter="openTentang = true" @mouseleave="openTentang = false">
                        <button class="inline-flex items-center text-sm font-semibold hover:text-brand-accent transition-colors duration-300 focus:outline-none cursor-pointer {{ Route::is('profile') || Route::is('gallery') || Route::is('video_gallery') || Route::is('testimonials') ? 'text-brand-accent' : 'text-brand-primary' }}">
                            TENTANG KAMI
                            <i class="fa-solid fa-chevron-down ml-1 text-xs transition-transform duration-200" :class="openTentang ? 'rotate-180' : ''"></i>
                        </button>
                        
                        <div x-show="openTentang"
                             x-transition:enter="transition ease-out duration-150"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-100"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             class="absolute left-0 mt-2 w-48 rounded-xl bg-white border border-slate-200 shadow-xl py-2 z-50"
                             style="display: none;">
                            <a href="{{ route('profile') }}" class="block px-4 py-2 text-xs sm:text-sm font-medium text-brand-primary hover:bg-slate-50 hover:text-brand-accent transition-colors">Profil Kami</a>
                            <a href="{{ route('gallery') }}" class="block px-4 py-2 text-xs sm:text-sm font-medium text-brand-primary hover:bg-slate-50 hover:text-brand-accent transition-colors">Gallery</a>
                            <a href="{{ route('video_gallery') }}" class="block px-4 py-2 text-xs sm:text-sm font-medium text-brand-primary hover:bg-slate-50 hover:text-brand-accent transition-colors">Video Gallery</a>
                            <a href="{{ route('testimonials') }}" class="block px-4 py-2 text-xs sm:text-sm font-medium text-brand-primary hover:bg-slate-50 hover:text-brand-accent transition-colors">Testimonial</a>
                        </div>
                    </div>

                    <a href="{{ route('projects.index') }}" class="text-sm font-semibold hover:text-brand-accent transition-colors duration-300 {{ Route::is('projects.index') || Route::is('projects.show') ? 'text-brand-accent' : 'text-brand-primary' }}">PROYEK</a>
                    <a href="{{ route('articles.index') }}" class="text-sm font-semibold hover:text-brand-accent transition-colors duration-300 {{ Route::is('articles.index') || Route::is('articles.show') ? 'text-brand-accent' : 'text-brand-primary' }}">BERITA</a>
                    <a href="{{ route('home') }}#kontak" class="text-sm font-semibold hover:text-brand-accent transition-colors duration-300 text-brand-primary">KONTAK</a>
                </nav>

                <!-- CTA Button -->
                <div class="hidden md:block">
                    <a href="https://api.whatsapp.com/send?phone={{ \App\Models\Setting::get('contact_whatsapp', '628123456789') }}&text=Halo%20{{ urlencode(\App\Models\Setting::get('site_name', 'Alam Kharisma Bersaudara')) }}%2C%20saya%20tertarik%20dengan%20layanan%20Anda.%20Bisa%20berdiskusi%20lebih%20lanjut%3F" 
                       target="_blank"
                       class="inline-flex items-center justify-center px-5 py-2.5 rounded-lg bg-brand-primary text-white font-bold text-sm hover:bg-brand-primary-hover hover:scale-105 active:scale-95 transition-all duration-300 shadow-md shadow-brand-primary/10 border border-brand-accent/25">
                        <i class="fa-brands fa-whatsapp text-lg mr-2 text-brand-accent"></i>
                        Konsultasi Gratis
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" 
                            class="text-brand-primary hover:text-brand-accent focus:outline-none transition-colors duration-300"
                            aria-label="Toggle menu">
                        <i class="fa-solid text-2xl" :class="mobileMenuOpen ? 'fa-xmark' : 'fa-bars'"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="md:hidden bg-white border-b border-slate-200 absolute top-full left-0 right-0 py-4 shadow-xl"
             x-data="{ mobTentangOpen: false }">
            <div class="px-4 space-y-3">
                <a href="{{ route('home') }}" class="block px-3 py-2 rounded-lg text-base font-semibold hover:bg-slate-50 hover:text-brand-accent transition-colors {{ Route::is('home') ? 'text-brand-accent bg-slate-50' : 'text-brand-primary' }}">BERANDA</a>
                
                <!-- Mobile Dropdown Trigger -->
                <div>
                    <button @click="mobTentangOpen = !mobTentangOpen" 
                            class="w-full flex justify-between items-center px-3 py-2 rounded-lg text-base font-semibold hover:bg-slate-50 hover:text-brand-accent transition-colors text-brand-primary">
                        <span>TENTANG KAMI</span>
                        <i class="fa-solid fa-chevron-down text-sm transition-transform duration-200" :class="mobTentangOpen ? 'rotate-180' : ''"></i>
                    </button>
                    <!-- Mobile Submenu -->
                    <div x-show="mobTentangOpen" x-collapse class="pl-6 space-y-2 mt-2" style="display: none;">
                        <a href="{{ route('profile') }}" class="block px-3 py-1.5 rounded-lg text-sm font-semibold hover:bg-slate-50 hover:text-brand-accent transition-colors text-brand-primary/80">Profil Kami</a>
                        <a href="{{ route('gallery') }}" class="block px-3 py-1.5 rounded-lg text-sm font-semibold hover:bg-slate-50 hover:text-brand-accent transition-colors text-brand-primary/80">Gallery</a>
                        <a href="{{ route('video_gallery') }}" class="block px-3 py-1.5 rounded-lg text-sm font-semibold hover:bg-slate-50 hover:text-brand-accent transition-colors text-brand-primary/80">Video Gallery</a>
                        <a href="{{ route('testimonials') }}" class="block px-3 py-1.5 rounded-lg text-sm font-semibold hover:bg-slate-50 hover:text-brand-accent transition-colors text-brand-primary/80">Testimonial</a>
                    </div>
                </div>

                <a href="{{ route('projects.index') }}" class="block px-3 py-2 rounded-lg text-base font-semibold hover:bg-slate-50 hover:text-brand-accent transition-colors {{ Route::is('projects.index') ? 'text-brand-accent bg-slate-50' : 'text-brand-primary' }}">PROYEK</a>
                <a href="{{ route('articles.index') }}" class="block px-3 py-2 rounded-lg text-base font-semibold hover:bg-slate-50 hover:text-brand-accent transition-colors {{ Route::is('articles.index') ? 'text-brand-accent bg-slate-50' : 'text-brand-primary' }}">BERITA</a>
                <a href="{{ route('home') }}#kontak" @click="mobileMenuOpen = false" class="block px-3 py-2 rounded-lg text-base font-semibold hover:bg-slate-50 hover:text-brand-accent transition-colors text-brand-primary">KONTAK</a>
                
                <div class="pt-4 border-t border-slate-200">
                    <a href="https://api.whatsapp.com/send?phone={{ \App\Models\Setting::get('contact_whatsapp', '628123456789') }}&text=Halo%20{{ urlencode(\App\Models\Setting::get('site_name', 'Alam Kharisma Bersaudara')) }}%2C%20saya%20tertarik%20dengan%20layanan%20Anda.%20Bisa%20berdiskusi%20lebih%20lanjut%3F" 
                       target="_blank"
                       class="w-full inline-flex items-center justify-center px-4 py-3 rounded-lg bg-brand-primary text-white font-bold text-base hover:bg-brand-primary-hover transition-colors shadow-md">
                        <i class="fa-brands fa-whatsapp text-xl mr-2 text-brand-accent"></i>
                        Konsultasi WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content Layout -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-brand-primary text-slate-300 pt-16 pb-8 border-t border-brand-primary-hover">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mb-12">
                <!-- Info Kolom 1 -->
                <div class="space-y-4">
                    <a href="{{ route('home') }}" class="flex items-center group gap-3">
                        <img src="{{ asset('images/logo.png') }}" class="h-14 md:h-16 w-auto brightness-0 invert" alt="PT Alam Kharisma Bersaudara">
                        <div class="flex flex-col leading-tight">
                            <span class="text-white font-extrabold text-base md:text-lg tracking-wide uppercase">Alam Kharisma</span>
                            <span class="text-slate-300 font-bold text-xs md:text-sm tracking-[0.2em] uppercase">Bersaudara</span>
                        </div>
                    </a>
                    <p class="text-sm leading-relaxed text-slate-400">
                        Kami melayani jasa pengerjaan interior mewah, perancangan eksterior modern, dan konstruksi sipil umum (kontraktor) dengan standar mutu teratas sejak 2018.
                    </p>
                    <div class="flex space-x-4 pt-2">
                        <a href="#" class="w-8 h-8 rounded-full bg-white/10 hover:bg-brand-accent hover:text-brand-primary flex items-center justify-center text-slate-300 shadow transition-all duration-300"><i class="fa-brands fa-facebook-f text-sm"></i></a>
                        <a href="#" class="w-8 h-8 rounded-full bg-white/10 hover:bg-brand-accent hover:text-brand-primary flex items-center justify-center text-slate-300 shadow transition-all duration-300"><i class="fa-brands fa-instagram text-sm"></i></a>
                        <a href="#" class="w-8 h-8 rounded-full bg-white/10 hover:bg-brand-accent hover:text-brand-primary flex items-center justify-center text-slate-300 shadow transition-all duration-300"><i class="fa-brands fa-linkedin-in text-sm"></i></a>
                        <a href="#" class="w-8 h-8 rounded-full bg-white/10 hover:bg-brand-accent hover:text-brand-primary flex items-center justify-center text-slate-300 shadow transition-all duration-300"><i class="fa-brands fa-youtube text-sm"></i></a>
                    </div>
                </div>

                <!-- Kolom 2: Layanan -->
                <div>
                    <h3 class="text-white font-bold text-base mb-4 tracking-wide uppercase">Layanan Kami</h3>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('projects.index', ['category' => 'Komersial']) }}" class="hover:text-brand-accent transition-colors">Pembangunan Gedung & Ruko</a></li>
                        <li><a href="{{ route('projects.index', ['category' => 'Residensial']) }}" class="hover:text-brand-accent transition-colors">Rumah Mewah & Villa</a></li>
                        <li><a href="{{ route('projects.index', ['category' => 'Sipil']) }}" class="hover:text-brand-accent transition-colors">Struktur Sipil & Jalan</a></li>
                        <li><a href="{{ route('projects.index') }}" class="hover:text-brand-accent transition-colors">Desain Interior & Eksterior</a></li>
                    </ul>
                </div>

                <!-- Kolom 3: Navigasi Cepat -->
                <div>
                    <h3 class="text-white font-bold text-base mb-4 tracking-wide uppercase">Navigasi Cepat</h3>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('home') }}" class="hover:text-brand-accent transition-colors">Halaman Utama</a></li>
                        <li><a href="{{ route('profile') }}" class="hover:text-brand-accent transition-colors">Profil Perusahaan</a></li>
                        <li><a href="{{ route('projects.index') }}" class="hover:text-brand-accent transition-colors">Portofolio Kerja</a></li>
                        <li><a href="{{ route('articles.index') }}" class="hover:text-brand-accent transition-colors">Artikel & Tips Konstruksi</a></li>
                    </ul>
                </div>
            </div>

            <!-- Hak Cipta -->
            <div class="border-t border-white/10 pt-8 mt-8 flex flex-col sm:flex-row justify-between items-center text-xs">
                <p class="text-slate-405 text-slate-400">&copy; {{ date('Y') }} {{ \App\Models\Setting::get('site_name') }}. Seluruh Hak Cipta Dilindungi Undang-Undang.</p>
                <div class="flex space-x-6 mt-4 sm:mt-0 text-slate-400">
                    <a href="#" class="hover:text-brand-accent transition-colors">Kebijakan Privasi</a>
                    <a href="#" class="hover:text-brand-accent transition-colors">Syarat & Ketentuan</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp Widget -->
    <a href="https://api.whatsapp.com/send?phone={{ \App\Models\Setting::get('contact_whatsapp', '628123456789') }}&text=Halo%20{{ urlencode(\App\Models\Setting::get('site_name')) }}%2C%20saya%20ingin%20berkonsultasi%20mengenai%20layanan%20pembangunan%20atau%20interior.%20Bisa%20dibantu%3F" 
       target="_blank"
       class="fixed bottom-6 right-6 z-40 bg-emerald-500 text-white w-14 h-14 rounded-full flex items-center justify-center text-3xl shadow-lg hover:bg-emerald-400 hover:scale-110 active:scale-95 transition-all duration-300"
       aria-label="Chat WhatsApp">
         <i class="fa-brands fa-whatsapp"></i>
         <!-- Ripple effect -->
         <span class="absolute -z-10 w-full h-full rounded-full bg-emerald-500/40 animate-ping"></span>
    </a>

    @yield('scripts')
</body>
</html>
