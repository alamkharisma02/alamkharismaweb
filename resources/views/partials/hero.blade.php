<!-- Hero Section - Waskita-Inspired Fullscreen Image Slideshow with Content Below -->
@php
    // Fetch slides from hero_slides table ordered by order
    $featuredSlides = \App\Models\HeroSlide::orderBy('order', 'asc')->get();
    
    $heroSlides = [];
    if ($featuredSlides->count() > 0) {
        foreach ($featuredSlides as $s) {
            $heroSlides[] = [
                'image' => $s->image,
                'alt' => $s->title,
                'title' => $s->title,
            ];
        }
    } else {
        // Fallback default slides
        $heroSlides = [
            [
                'image' => asset('images/projects/pertamina-ep-zona4.jpg'),
                'alt' => 'Pertamina EP Zona 4',
                'title' => 'Pertamina EP Zona 4',
            ],
            [
                'image' => asset('images/projects/interior-office-1.jpg'),
                'alt' => 'Kantor WOPOM Interior',
                'title' => 'Kantor WOPOM Interior',
            ],
            [
                'image' => asset('images/projects/lapangan-miring.jpg'),
                'alt' => 'Lapangan Miring SKK Migas',
                'title' => 'Lapangan Miring SKK Migas',
            ],
            [
                'image' => asset('images/projects/interior-office-2.jpg'),
                'alt' => 'Office Interior Finishing',
                'title' => 'Office Interior Finishing',
            ],
        ];
    }
    $totalSlides = count($heroSlides);
@endphp

<section class="relative bg-[#0A1E13] overflow-hidden"
         x-data="{
             currentSlide: 0,
             totalSlides: {{ $totalSlides }},
             interval: null,
             paused: false,
             init() {
                 this.interval = setInterval(() => {
                     if (!this.paused) this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
                 }, 10000);
             },
             goTo(i) {
                 this.currentSlide = i;
                 clearInterval(this.interval);
                 this.interval = setInterval(() => {
                     if (!this.paused) this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
                 }, 10000);
             }
         }"
         x-init="init()">

    <!-- ==================================================== -->
    <!-- 1. FULLSCREEN SLIDESHOW BANNER (Visual Only)          -->
    <!-- ==================================================== -->
    <style>
        .hero-slideshow-aspect {
            aspect-ratio: 4 / 3;
            max-height: 50vh;
        }
        @media (min-width: 640px) {
            .hero-slideshow-aspect {
                aspect-ratio: 16 / 10;
                max-height: 55vh;
            }
        }
        @media (min-width: 768px) {
            .hero-slideshow-aspect {
                aspect-ratio: 16 / 9;
                max-height: 60vh;
            }
        }
        @media (min-width: 1024px) {
            .hero-slideshow-aspect {
                aspect-ratio: 16 / 9;
                max-height: 55vh;
            }
        }
    </style>
    <div class="relative w-full hero-slideshow-aspect overflow-hidden bg-black">
        
        <!-- Slideshow Images with Slow Dynamic Sharp Zoom -->
        <div class="absolute inset-0 z-0">
            @foreach($heroSlides as $idx => $slide)
            <div class="absolute inset-0 transition-opacity duration-[1000ms] ease-in-out"
                 :class="currentSlide === {{ $idx }} ? 'opacity-100' : 'opacity-0'">
                <img src="{{ $slide['image'] }}"
                     class="w-full h-full object-cover"
                     alt="{{ $slide['alt'] }}"
                     style="image-rendering: auto;"
                     loading="{{ $idx === 0 ? 'eager' : 'lazy' }}">
            </div>
            @endforeach
        </div>

        <!-- Overlays to Make Images Pop (Top gradient stays for header contrast) -->
        <div class="absolute inset-x-0 top-0 h-32 bg-gradient-to-b from-black/45 to-transparent z-[1]"></div>

        <!-- Navigation Arrows (Waskita style manual control) -->
        <button @click="currentSlide = (currentSlide - 1 + totalSlides) % totalSlides; goTo(currentSlide)"
                class="absolute left-4 top-1/2 -translate-y-1/2 z-30 bg-black/45 hover:bg-black/70 border border-white/10 text-white rounded-full w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center transition-all cursor-pointer backdrop-blur-sm shadow-lg">
            <i class="fa-solid fa-chevron-left text-sm sm:text-base"></i>
        </button>
        <button @click="currentSlide = (currentSlide + 1) % totalSlides; goTo(currentSlide)"
                class="absolute right-4 top-1/2 -translate-y-1/2 z-30 bg-black/45 hover:bg-black/70 border border-white/10 text-white rounded-full w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center transition-all cursor-pointer backdrop-blur-sm shadow-lg">
            <i class="fa-solid fa-chevron-right text-sm sm:text-base"></i>
        </button>

        <!-- Project Name Box (Bottom Left, solid light/white matching Waskita) -->
        <div class="absolute bottom-6 left-6 sm:left-12 z-20">
            @foreach($heroSlides as $idx => $slide)
            <div x-show="currentSlide === {{ $idx }}" 
                 x-transition:enter="transition ease-out duration-500"
                 x-transition:enter-start="opacity-0 -translate-x-4"
                 x-transition:enter-end="opacity-100 translate-x-0"
                 class="bg-white/95 border border-slate-200 border-l-4 border-l-[#C5A880] px-4 py-2.5 sm:px-5 sm:py-3.5 shadow-2xl rounded-r-xl max-w-[80vw] sm:max-w-md backdrop-blur-md">
                <h4 class="text-[#0A1E13] font-bold text-sm sm:text-base md:text-lg tracking-wide leading-snug font-sans">
                    {{ $slide['title'] }}
                </h4>
            </div>
            @endforeach
        </div>

        <!-- Slide Counter & Ticker lines (Bottom Right) -->
        <div class="absolute bottom-6 right-6 sm:right-12 z-20 flex items-center gap-3">
            <!-- Slide Counter -->
            <div class="text-white/80 text-xs font-mono tracking-wider mr-1 hidden sm:block drop-shadow">
                <span class="text-[#C5A880] font-bold text-base" x-text="String(currentSlide + 1).padStart(2, '0')">01</span>
                <span class="mx-1">/</span>
                <span>{{ str_pad($totalSlides, 2, '0', STR_PAD_LEFT) }}</span>
            </div>
            @foreach($heroSlides as $idx => $slide)
            <button @click="goTo({{ $idx }})"
                    class="relative cursor-pointer group h-6 flex items-center">
                <div class="w-8 sm:w-12 h-[3px] rounded-full overflow-hidden transition-colors bg-white/20 group-hover:bg-white/40">
                    <div class="h-full bg-[#C5A880] rounded-full transition-all duration-300"
                         :class="currentSlide === {{ $idx }} ? 'w-full' : 'w-0'"
                         :style="currentSlide === {{ $idx }} ? 'animation: slideProgress 10s linear forwards' : ''">
                    </div>
                </div>
            </button>
            @endforeach
        </div>

        <!-- ===== SCROLL DOWN INDICATOR ===== -->
        <div class="absolute bottom-16 right-8 z-10 hidden lg:flex flex-col items-center gap-2 text-white/40 hover:text-white/80 transition-colors duration-500 cursor-pointer">
            <span class="text-[9px] tracking-[0.4em] uppercase font-light writing-mode-vertical" style="writing-mode: vertical-rl;">Scroll</span>
            <div class="w-px h-12 bg-gradient-to-b from-[#C5A880] to-transparent"></div>
        </div>
    </div>

    <!-- ==================================================== -->
    <!-- 2. HERO CONTENT SECTION (Underneath the Slide Image) -->
    <!-- ==================================================== -->
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10 w-full pt-16 pb-20 sm:pb-24">
        <!-- Ambient Decorative Glow -->
        <div class="absolute top-0 right-0 w-[400px] h-[400px] bg-[#C5A880]/4 rounded-full blur-[100px] -mr-20 -mt-20 z-0"></div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start relative z-10">
            <!-- Left: Main Text Content -->
            <div class="lg:col-span-8 space-y-6 text-center lg:text-left">
                <!-- Animated Badge -->
                <div class="overflow-hidden">
                    <span class="inline-flex items-center px-4 py-1.5 rounded-full text-[10px] sm:text-xs font-bold bg-[#C5A880]/15 text-[#C5A880] border border-[#C5A880]/30 uppercase tracking-[0.2em] backdrop-blur-sm">
                        <i class="fa-solid fa-helmet-safety mr-2"></i> KONTRAKTOR & ARCHITECTURE
                    </span>
                </div>
                
                <!-- Main Heading (Modern Sans-Serif Plus Jakarta Sans with Gold Gradient & Large Font Size) -->
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black text-white tracking-tight leading-[1.08] lg:leading-[1.05]">
                    @php
                        $heroTitle = \App\Models\Setting::get('hero_title', 'Mewujudkan Interior Mewah & Konstruksi Sipil Terbaik');
                        $hasAmp = strpos($heroTitle, '&') !== false;
                        if ($hasAmp) {
                            $parts = explode('&', $heroTitle, 2);
                            $mainPart = trim($parts[0]);
                            $highlightPart = '& ' . trim($parts[1]);
                        } else {
                            $mainPart = $heroTitle;
                            $highlightPart = '';
                        }
                    @endphp
                    @if($highlightPart)
                        <span class="block">{{ $mainPart }}</span>
                        <span class="block text-transparent bg-clip-text bg-gradient-to-r from-[#C5A880] via-[#E2D2BC] to-[#B4966B]">{{ $highlightPart }}</span>
                    @else
                        <span class="block">{{ $mainPart }}</span>
                    @endif
                </h1>
                
                <!-- Subtitle -->
                <p class="text-slate-300 text-base sm:text-lg leading-relaxed font-light max-w-2xl mx-auto lg:mx-0">
                    {{ \App\Models\Setting::get('hero_subtitle', 'PT Alam Kharisma Bersaudara menghadirkan rancangan konstruksi sipil premium, interior mewah, dan eksterior ikonik dengan keahlian presisi serta komitmen RAB transparan.') }}
                </p>
                
                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-3 sm:gap-4 pt-2">
                    <a href="https://api.whatsapp.com/send?phone={{ \App\Models\Setting::get('contact_whatsapp', '628123456789') }}&text=Halo%20{{ urlencode(\App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara')) }}%2C%20saya%20tertarik%20dengan%20layanan%20Anda.%20Bisa%20berdiskusi%20lebih%20lanjut%3F" target="_blank" 
                       class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 sm:px-8 sm:py-4 rounded-xl bg-gradient-to-r from-[#C5A880] to-[#B4966B] hover:from-[#B4966B] hover:to-[#A3855A] text-[#0A1E13] font-bold text-sm sm:text-base transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl hover:shadow-[#C5A880]/25 active:translate-y-0 cursor-pointer tracking-wider uppercase">
                        <i class="fa-brands fa-whatsapp text-xl mr-2"></i>
                        Konsultasi Gratis
                    </a>
                    <a href="{{ route('projects.index') }}" 
                       class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 sm:px-8 sm:py-4 rounded-xl bg-white/5 text-white font-bold text-sm sm:text-base hover:bg-white/10 border border-white/20 hover:border-[#C5A880]/60 transition-all duration-300 transform hover:-translate-y-1 active:translate-y-0 cursor-pointer tracking-wider uppercase backdrop-blur-sm">
                        <i class="fa-solid fa-briefcase mr-2 text-[#C5A880]"></i>
                        Lihat Portofolio
                    </a>
                </div>
            </div>
 
            <!-- Right: Stats (Premium Dashboard Cards with Custom Observer) -->
            <div class="lg:col-span-4 lg:pt-4 flex flex-col sm:flex-row lg:flex-col gap-6 w-full text-left">
                <!-- Trust Stats 1 (Proyek Selesai) -->
                @php $completedProjects = (int)\App\Models\Setting::get('stat_completed_projects', 130); @endphp
                <div class="flex-1 bg-white/[0.03] border border-white/10 rounded-2xl p-6 backdrop-blur-md transition-all duration-300 hover:border-[#C5A880]/30 hover:bg-white/[0.05] group"
                     x-data="{ count: {{ $completedProjects }}, target: {{ $completedProjects }} }"
                     x-init="
                        const observer = new IntersectionObserver((entries) => {
                            if (entries[0].isIntersecting) {
                                let current = 0;
                                const interval = setInterval(() => {
                                    current += 5;
                                    if (current >= target) {
                                        count = target;
                                        clearInterval(interval);
                                    } else {
                                        count = current;
                                    }
                                }, 30);
                                observer.disconnect();
                            }
                        }, { threshold: 0.1 });
                        observer.observe($el);
                     }">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-3xl sm:text-4xl md:text-5xl font-black text-[#C5A880] tracking-tight">
                            <span x-text="count">{{ $completedProjects }}</span>+
                        </span>
                        <div class="w-10 h-10 rounded-xl bg-[#C5A880]/10 flex items-center justify-center text-[#C5A880] group-hover:scale-110 transition-transform">
                            <i class="fa-solid fa-helmet-safety text-lg"></i>
                        </div>
                    </div>
                    <p class="text-[11px] sm:text-xs text-white font-bold uppercase tracking-widest">Proyek Selesai</p>
                    <p class="text-[11px] text-slate-400 font-light mt-1.5 leading-relaxed">Menyelesaikan berbagai proyek konstruksi sipil & interior mewah.</p>
                </div>

                <!-- Trust Stats 2 (Tahun Pengalaman) -->
                <div class="flex-1 bg-white/[0.03] border border-white/10 rounded-2xl p-6 backdrop-blur-md transition-all duration-300 hover:border-[#C5A880]/30 hover:bg-white/[0.05] group"
                     x-data="{ count: {{ date('Y') - \App\Models\Setting::get('company_established_year', 2018) }}, target: {{ date('Y') - \App\Models\Setting::get('company_established_year', 2018) }} }"
                     x-init="
                        const observer = new IntersectionObserver((entries) => {
                            if (entries[0].isIntersecting) {
                                let current = 0;
                                const interval = setInterval(() => {
                                    current += 1;
                                    if (current >= target) {
                                        count = target;
                                        clearInterval(interval);
                                    } else {
                                        count = current;
                                    }
                                }, 100);
                                observer.disconnect();
                            }
                        }, { threshold: 0.1 });
                        observer.observe($el);
                     }">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-3xl sm:text-4xl md:text-5xl font-black text-[#C5A880] tracking-tight">
                            <span x-text="count">{{ date('Y') - \App\Models\Setting::get('company_established_year', 2018) }}</span>+
                        </span>
                        <div class="w-10 h-10 rounded-xl bg-[#C5A880]/10 flex items-center justify-center text-[#C5A880] group-hover:scale-110 transition-transform">
                            <i class="fa-solid fa-award text-lg"></i>
                        </div>
                    </div>
                    <p class="text-[11px] sm:text-xs text-white font-bold uppercase tracking-widest">Tahun Pengalaman</p>
                    <p class="text-[11px] text-slate-400 font-light mt-1.5 leading-relaxed">Berkomitmen melayani sejak tahun 2018 dengan standar mutu teratas.</p>
                </div>
            </div>
        </div>
    </div>

</section>