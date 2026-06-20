<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- SEO Meta Tags -->
    <title>@yield('title', \App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara') . ' - ' . \App\Models\Setting::get('site_tagline', 'Interior, Eksterior, dan Kontraktor Konstruksi'))</title>
    <meta name="description" content="@yield('meta_description', \App\Models\Setting::get('hero_subtitle', 'PT Alam Kharisma Bersaudara menyediakan jasa kontraktor eksterior, interior mewah, dan konstruksi sipil berstandar tinggi secara profesional.'))">
    <meta name="keywords" content="kontraktor sipil, jasa interior, eksterior rumah, bangun rumah, renovasi gedung, PT Alam Kharisma Bersaudara, RAB transparan">
    <meta name="author" content="{{ \App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara') }}">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title', \App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara') . ' - ' . \App\Models\Setting::get('site_tagline', 'Interior, Eksterior, dan Kontraktor Konstruksi'))">
    <meta property="og:description" content="@yield('meta_description', \App\Models\Setting::get('hero_subtitle', 'PT Alam Kharisma Bersaudara menyediakan jasa kontraktor eksterior, interior mewah, dan konstruksi sipil berstandar tinggi secara profesional.'))">
    <meta property="og:image" content="@yield('meta_image', 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=1200&h=630&fit=crop')">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&family=Outfit:wght@300;400;500;600;700;800;900&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,450&display=swap" rel="stylesheet">

    <!-- Tailwind CSS (Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Alpine.js for Micro-interactions -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        :root {
            --color-brand-primary: {{ \App\Models\Setting::get('color_brand_primary', '#113F27') }};
            --color-brand-primary-hover: {{ \App\Models\Setting::get('color_brand_primary_hover', '#0C2B1B') }};
            --color-brand-accent: {{ \App\Models\Setting::get('color_brand_accent', '#C5A880') }};
            --color-brand-accent-hover: {{ \App\Models\Setting::get('color_brand_accent_hover', '#B4966B') }};
        }
        body {
            font-family: 'Plus Jakarta Sans', 'Outfit', sans-serif;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Plus Jakarta Sans', 'Outfit', sans-serif;
            font-weight: 700;
        }
        .font-serif {
            font-family: 'Cormorant Garamond', Georgia, serif;
        }
    </style>
    <!-- Plyr Video Player CSS & JS -->
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css">
    <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
    <style>
        .plyr {
            --plyr-color-main: var(--color-brand-accent, #C5A880);
            --plyr-video-background: #000;
            border-radius: 1.5rem;
        }
        /* Disable pointer events on the iframe itself so users can't click to reveal YT watermark */
        .plyr__video-embed iframe {
            pointer-events: none;
        }
    </style>
    @yield('styles')
</head>
<body class="bg-[#F9F7F3] text-emerald-900 selection:bg-brand-primary selection:text-white overflow-x-hidden">

    <!-- Luxury Preloader Screen -->
    <div id="preloader" class="fixed inset-0 z-[100] flex flex-col items-center justify-center bg-[#0A1E13] transition-all duration-700 ease-in-out">
        <div class="relative flex flex-col items-center">
            <!-- Helmet Logo Pulsing -->
            <div class="relative mb-6 flex h-24 w-24 items-center justify-center rounded-full border border-[#C5A880]/30 bg-black/40 shadow-xl">
                <i class="fa-solid fa-helmet-safety text-4xl text-[#C5A880] animate-pulse"></i>
                <div class="absolute inset-0 rounded-full border border-dashed border-[#C5A880]/40 animate-[spin_12s_linear_infinite]"></div>
            </div>
            
            <!-- Company Name -->
            <h2 class="text-xl font-bold uppercase tracking-wider text-white font-serif mb-2">PT Alam Kharisma Bersaudara</h2>
            <p class="text-xs tracking-[0.3em] uppercase text-[#C5A880]/80 mb-6">High-End Construction & Interior</p>
            
            <!-- Custom Progress Bar -->
            <div class="h-[2px] w-48 overflow-hidden rounded bg-white/10">
                <div id="preloader-bar" class="h-full w-0 bg-[#C5A880] transition-all duration-300 ease-out"></div>
            </div>
        </div>
    </div>

    <!-- Header / Full-width Sticky Navbar -->
    <header x-data="{ mobileMenuOpen: false, isScrolled: false }" 
            x-init="window.addEventListener('scroll', () => { isScrolled = window.scrollY > 10 })"
            :class="isScrolled ? 'bg-[#0A1E13]/95 border-b border-[#C5A880]/20 shadow-xl py-3' : 'bg-[#0A1E13] border-b border-white/5 py-4.5'"
            class="sticky top-0 w-full z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center group gap-2.5">
                    <img src="{{ asset('images/logo.png') }}" 
                         class="h-10 sm:h-12 md:h-14 w-auto transition-all duration-300" 
                         alt="PT Alam Kharisma Bersaudara">
                    <div class="flex flex-col leading-none">
                        <span class="font-extrabold text-xs sm:text-sm md:text-base tracking-wider uppercase text-white">PT ALAM KHARISMA</span>
                        <span class="font-bold text-[10px] sm:text-xs md:text-sm tracking-[0.25em] uppercase text-[#C5A880]">BERSAUDARA</span>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <nav class="hidden md:flex items-center space-x-8" x-data="{ openTentang: false }">
                    <a href="{{ route('home') }}" class="text-sm font-semibold transition-colors duration-300 hover:text-brand-accent {{ Route::is('home') ? 'text-[#C5A880]' : 'text-white/90' }}">BERANDA</a>
                    <a href="{{ route('services') }}" class="text-sm font-semibold transition-colors duration-300 hover:text-brand-accent {{ Route::is('services') ? 'text-[#C5A880]' : 'text-white/90' }}">LAYANAN KAMI</a>
                    
                    <!-- Dropdown Tentang Kami -->
                    <div class="relative" @mouseenter="openTentang = true" @mouseleave="openTentang = false">
                        <button class="inline-flex items-center text-sm font-semibold transition-colors duration-300 hover:text-brand-accent focus:outline-none cursor-pointer {{ Route::is('profile') || Route::is('video_gallery') || Route::is('testimonials') ? 'text-[#C5A880]' : 'text-white/90' }}">
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
                             class="absolute left-0 mt-2 w-48 rounded-xl bg-[#0A1E13] border border-emerald-950 shadow-2xl py-2 z-50"
                             style="display: none;">
                            <a href="{{ route('profile') }}" class="block px-4 py-2 text-xs sm:text-sm font-medium text-white/90 hover:bg-emerald-950 hover:text-[#C5A880] transition-colors">Profil Kami</a>
                            <a href="{{ route('video_gallery') }}" class="block px-4 py-2 text-xs sm:text-sm font-medium text-white/90 hover:bg-emerald-950 hover:text-[#C5A880] transition-colors">Video Gallery</a>
                        </div>
                    </div>

                    <a href="{{ route('projects.index') }}" class="text-sm font-semibold transition-colors duration-300 hover:text-brand-accent {{ Route::is('projects.index') || Route::is('projects.show') ? 'text-[#C5A880]' : 'text-white/90' }}">PROYEK</a>
                    <a href="{{ route('articles.index') }}" class="text-sm font-semibold transition-colors duration-300 hover:text-brand-accent {{ Route::is('articles.index') || Route::is('articles.show') ? 'text-[#C5A880]' : 'text-white/90' }}">BERITA</a>
                    <a href="{{ route('contact') }}" class="text-sm font-semibold transition-colors duration-300 hover:text-brand-accent {{ Route::is('contact') ? 'text-[#C5A880]' : 'text-white/90' }}">KONTAK</a>
                </nav>

                <!-- CTA Button -->
                <div class="hidden md:block">
                    <a href="https://api.whatsapp.com/send?phone={{ \App\Models\Setting::get('contact_whatsapp', '628123456789') }}&text=Halo%20{{ urlencode(\App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara')) }}%2C%20saya%20tertarik%20dengan%20layanan%20Anda.%20Bisa%20berdiskusi%20lebih%20lanjut%3F" 
                       target="_blank"
                       class="inline-flex items-center justify-center px-5 py-2.5 rounded-lg font-bold text-sm bg-gradient-to-r from-[#C5A880] to-[#B4966B] hover:from-[#B4966B] hover:to-[#A3855A] text-[#0A1E13] hover:scale-105 active:scale-95 transition-all duration-300 shadow-md shadow-[#C5A880]/15 border border-[#C5A880]/20">
                        <i class="fa-brands fa-whatsapp text-lg mr-2 text-[#0A1E13]"></i>
                        Konsultasi Gratis
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" 
                            class="text-white hover:text-[#C5A880] focus:outline-none transition-colors duration-300"
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
             class="md:hidden bg-[#0A1E13] border-b border-emerald-950/80 absolute top-full left-0 right-0 py-4 shadow-2xl"
             x-data="{ mobTentangOpen: false }">
            <div class="px-4 space-y-3">
                <a href="{{ route('home') }}" class="block px-3 py-2 rounded-lg text-base font-semibold hover:bg-emerald-950/60 hover:text-[#C5A880] transition-colors {{ Route::is('home') ? 'text-[#C5A880] bg-emerald-950/40' : 'text-white/90' }}">BERANDA</a>
                <a href="{{ route('services') }}" class="block px-3 py-2 rounded-lg text-base font-semibold hover:bg-emerald-950/60 hover:text-[#C5A880] transition-colors {{ Route::is('services') ? 'text-[#C5A880] bg-emerald-950/40' : 'text-white/90' }}">LAYANAN KAMI</a>
                
                <!-- Mobile Dropdown Trigger -->
                <div>
                    <button @click="mobTentangOpen = !mobTentangOpen" 
                            class="w-full flex justify-between items-center px-3 py-2 rounded-lg text-base font-semibold hover:bg-emerald-950/60 hover:text-[#C5A880] transition-colors text-white/90">
                        <span>TENTANG KAMI</span>
                        <i class="fa-solid fa-chevron-down text-sm transition-transform duration-200" :class="mobTentangOpen ? 'rotate-180' : ''"></i>
                    </button>
                    <!-- Mobile Submenu -->
                    <div x-show="mobTentangOpen" x-collapse class="pl-6 space-y-2 mt-2" style="display: none;">
                        <a href="{{ route('profile') }}" class="block px-3 py-1.5 rounded-lg text-sm font-semibold hover:bg-emerald-950/40 hover:text-[#C5A880] transition-colors text-white/70">Profil Kami</a>
                        <a href="{{ route('video_gallery') }}" class="block px-3 py-1.5 rounded-lg text-sm font-semibold hover:bg-emerald-950/40 hover:text-[#C5A880] transition-colors text-white/70">Video Gallery</a>
                    </div>
                </div>

                <a href="{{ route('projects.index') }}" class="block px-3 py-2 rounded-lg text-base font-semibold hover:bg-emerald-950/60 hover:text-[#C5A880] transition-colors {{ Route::is('projects.index') ? 'text-[#C5A880] bg-emerald-950/40' : 'text-white/90' }}">PROYEK</a>
                <a href="{{ route('articles.index') }}" class="block px-3 py-2 rounded-lg text-base font-semibold hover:bg-emerald-950/60 hover:text-[#C5A880] transition-colors {{ Route::is('articles.index') ? 'text-[#C5A880] bg-emerald-950/40' : 'text-white/90' }}">BERITA</a>
                <a href="{{ route('contact') }}" @click="mobileMenuOpen = false" class="block px-3 py-2 rounded-lg text-base font-semibold hover:bg-emerald-950/60 hover:text-[#C5A880] transition-colors {{ Route::is('contact') ? 'text-[#C5A880] bg-emerald-950/40' : 'text-white/90' }}">KONTAK</a>
                
                <div class="pt-4 border-t border-emerald-950/80">
                    <a href="https://api.whatsapp.com/send?phone={{ \App\Models\Setting::get('contact_whatsapp', '628123456789') }}&text=Halo%20{{ urlencode(\App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara')) }}%2C%20saya%20tertarik%20dengan%20layanan%20Anda.%20Bisa%20berdiskusi%20lebih%20lanjut%3F" 
                       target="_blank"
                       class="w-full inline-flex items-center justify-center px-4 py-3 rounded-lg bg-gradient-to-r from-[#C5A880] to-[#B4966B] hover:from-[#B4966B] hover:to-[#A3855A] text-[#0A1E13] font-bold text-base transition-colors shadow-md shadow-[#C5A880]/15">
                        <i class="fa-brands fa-whatsapp text-xl mr-2 text-[#0A1E13]"></i>
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
                        <img src="{{ asset('images/logo.png') }}" class="h-14 md:h-16 w-auto" alt="PT Alam Kharisma Bersaudara">
                        <div class="flex flex-col leading-none">
                            <span class="text-white font-extrabold text-base md:text-lg tracking-wider uppercase">PT ALAM KHARISMA</span>
                            <span class="text-[#C5A880] font-bold text-xs md:text-sm tracking-[0.25em] uppercase">BERSAUDARA</span>
                        </div>
                    </a>
                    <p class="text-sm leading-relaxed text-slate-400">
                        Kami melayani jasa pengerjaan interior mewah, perancangan eksterior modern, dan konstruksi sipil umum (kontraktor) dengan standar mutu teratas sejak 2018.
                    </p>
                    <div class="flex space-x-4 pt-2">
                        @if(\App\Models\Setting::get('social_facebook'))
                            <a href="{{ \App\Models\Setting::get('social_facebook') }}" target="_blank" rel="noopener" class="w-8 h-8 rounded-full bg-white/10 hover:bg-brand-accent hover:text-[#0A1E13] flex items-center justify-center text-slate-300 shadow hover:scale-110 transition-all duration-300"><i class="fa-brands fa-facebook-f text-sm"></i></a>
                        @endif
                        @if(\App\Models\Setting::get('social_instagram'))
                            <a href="{{ \App\Models\Setting::get('social_instagram') }}" target="_blank" rel="noopener" class="w-8 h-8 rounded-full bg-white/10 hover:bg-brand-accent hover:text-[#0A1E13] flex items-center justify-center text-slate-300 shadow hover:scale-110 transition-all duration-300"><i class="fa-brands fa-instagram text-sm"></i></a>
                        @endif
                        @if(\App\Models\Setting::get('social_twitter'))
                            <a href="{{ \App\Models\Setting::get('social_twitter') }}" target="_blank" rel="noopener" class="w-8 h-8 rounded-full bg-white/10 hover:bg-brand-accent hover:text-[#0A1E13] flex items-center justify-center text-slate-300 shadow hover:scale-110 transition-all duration-300"><i class="fa-brands fa-x-twitter text-sm"></i></a>
                        @endif
                        @if(\App\Models\Setting::get('social_tiktok'))
                            <a href="{{ \App\Models\Setting::get('social_tiktok') }}" target="_blank" rel="noopener" class="w-8 h-8 rounded-full bg-white/10 hover:bg-brand-accent hover:text-[#0A1E13] flex items-center justify-center text-slate-300 shadow hover:scale-110 transition-all duration-300"><i class="fa-brands fa-tiktok text-sm"></i></a>
                        @endif
                        @if(\App\Models\Setting::get('social_youtube'))
                            <a href="{{ \App\Models\Setting::get('social_youtube') }}" target="_blank" rel="noopener" class="w-8 h-8 rounded-full bg-white/10 hover:bg-brand-accent hover:text-[#0A1E13] flex items-center justify-center text-slate-300 shadow hover:scale-110 transition-all duration-300"><i class="fa-brands fa-youtube text-sm"></i></a>
                        @endif
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

    <!-- Preloader & Scroll Reveal Scripts -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Preloader logic
            const bar = document.getElementById('preloader-bar');
            const preloader = document.getElementById('preloader');
            
            if (bar && preloader) {
                let progress = 0;
                const interval = setInterval(() => {
                    progress += Math.floor(Math.random() * 15) + 5;
                    if (progress >= 100) {
                        progress = 100;
                        clearInterval(interval);
                        bar.style.width = '100%';
                        
                        setTimeout(() => {
                            preloader.classList.add('opacity-0', 'pointer-events-none');
                            setTimeout(() => {
                                preloader.style.display = 'none';
                            }, 700);
                        }, 250);
                    } else {
                        bar.style.width = progress + '%';
                    }
                }, 40);
            }

            // Scroll Reveal Observer
            const revealElements = document.querySelectorAll('.reveal-on-scroll');
            if (revealElements.length > 0) {
                const observer = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('active');
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.15,
                    rootMargin: '0px 0px -50px 0px'
                });
                
                revealElements.forEach(el => observer.observe(el));
            }
        });
    </script>

    @yield('scripts')
</body>
</html>
