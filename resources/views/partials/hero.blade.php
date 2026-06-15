<!-- Hero Section - Waskita-Inspired Fullscreen Image Slideshow with Content Below -->
@php
    $heroSlides = [
        [
            'image' => asset('images/projects/pertamina-ep-zona4.jpg'),
            'alt' => 'Pertamina EP Zona 4 - Proyek Eksterior Gedung',
            'label' => 'Proyek Unggulan',
            'title' => 'Pertamina EP Zona 4',
            'desc' => 'Pembangunan Gedung Kantor & Fasad Eksterior Modern',
        ],
        [
            'image' => asset('images/projects/interior-office-1.jpg'),
            'alt' => 'Interior Kantor WOPOM - Desain Premium',
            'label' => 'Interior Premium',
            'title' => 'Kantor WOPOM Interior',
            'desc' => 'Desain Interior Kantor Mezzanine & Workspace Modern',
        ],
        [
            'image' => asset('images/projects/lapangan-miring.jpg'),
            'alt' => 'Lapangan Miring SKK Migas - Infrastruktur',
            'label' => 'Infrastruktur',
            'title' => 'Lapangan Miring SKK Migas',
            'desc' => 'Pembangunan Monumen & Infrastruktur Area',
        ],
        [
            'image' => asset('images/projects/interior-office-2.jpg'),
            'alt' => 'Interior Office Premium Finishing',
            'label' => 'Fit-Out Interior',
            'title' => 'Office Interior Finishing',
            'desc' => 'Wall Mural, Pencahayaan Dramatis & Workspace Premium',
        ],
    ];
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
                 }, 6000);
             },
             goTo(i) {
                 this.currentSlide = i;
                 clearInterval(this.interval);
                 this.interval = setInterval(() => {
                     if (!this.paused) this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
                 }, 6000);
             }
         }"
         x-init="init()">

    <!-- ==================================================== -->
    <!-- 1. FULLSCREEN SLIDESHOW BANNER (Visual Only)          -->
    <!-- ==================================================== -->
    <div class="relative h-[65vh] sm:h-[75vh] md:h-[80vh] w-full overflow-hidden bg-black">
        
        <!-- Slideshow Images with Slow Dynamic Sharp Zoom -->
        <div class="absolute inset-0 z-0">
            @foreach($heroSlides as $idx => $slide)
            <div class="absolute inset-0 transition-opacity duration-[2000ms] ease-in-out"
                 :class="currentSlide === {{ $idx }} ? 'opacity-100' : 'opacity-0'">
                <img src="{{ $slide['image'] }}"
                     class="w-full h-full object-cover transition-transform duration-[12000ms] ease-out"
                     :class="currentSlide === {{ $idx }} ? 'scale-[1.03]' : 'scale-100'"
                     alt="{{ $slide['alt'] }}"
                     style="image-rendering: auto;"
                     loading="{{ $idx === 0 ? 'eager' : 'lazy' }}">
            </div>
            @endforeach
        </div>

        <!-- Overlays to Make Images Pop & Blend Muls dengan Section Bawah -->
        <div class="absolute inset-x-0 bottom-0 h-40 bg-gradient-to-t from-[#0A1E13] via-[#0A1E13]/30 to-transparent z-[1]"></div>
        <div class="absolute inset-x-0 top-0 h-32 bg-gradient-to-b from-black/40 to-transparent z-[1]"></div>

        <!-- Background Video Overlay (if hero_video_url is active) -->
        @if(\App\Models\Setting::get('hero_video_url'))
            @php
                $heroVideoUrl = \App\Models\Setting::get('hero_video_url');
                $videoId = '';
                if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $heroVideoUrl, $match)) {
                    $videoId = $match[1];
                }
            @endphp
            @if($videoId)
                <div class="absolute inset-0 w-full h-full overflow-hidden pointer-events-none opacity-10 z-[2] mix-blend-luminosity">
                    <iframe class="absolute top-1/2 left-1/2 w-[100vw] h-[56.25vw] min-h-[100vh] min-w-[177.77vh] -translate-x-1/2 -translate-y-1/2"
                            src="https://www.youtube.com/embed/{{ $videoId }}?autoplay=1&mute=1&loop=1&playlist={{ $videoId }}&controls=0&showinfo=0&rel=0&enablejsapi=1" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                    </iframe>
                </div>
            @else
                <video autoplay loop muted playsinline class="absolute inset-0 w-full h-full object-cover opacity-10 object-center z-[2] mix-blend-luminosity">
                    <source src="{{ $heroVideoUrl }}" type="video/mp4">
                </video>
            @endif
        @endif

        <!-- ===== BOTTOM SLIDE INFO BAR (Waskita/WIKA-Inspired Ticker) ===== -->
        <div class="absolute bottom-0 left-0 right-0 z-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-6 sm:pb-8">
                <div class="flex items-end justify-between gap-4">
                    <!-- Active Slide Info -->
                    <div class="hidden sm:block space-y-1 drop-shadow-[0_2px_8px_rgba(0,0,0,0.8)]">
                        @foreach($heroSlides as $idx => $slide)
                        <div x-show="currentSlide === {{ $idx }}" 
                             x-transition:enter="transition ease-out duration-500"
                             x-transition:enter-start="opacity-0 translate-y-2"
                             x-transition:enter-end="opacity-100 translate-y-0">
                            <span class="text-[#C5A880] text-[10px] font-bold tracking-[0.3em] uppercase">{{ $slide['label'] }}</span>
                            <h4 class="text-white font-bold text-sm sm:text-base">{{ $slide['title'] }}</h4>
                            <p class="text-slate-300 text-[10px] sm:text-xs font-light">{{ $slide['desc'] }}</p>
                        </div>
                        @endforeach
                    </div>

                    <!-- Slide Navigation (Waskita-style progress indicators) -->
                    <div class="flex items-center gap-3">
                        <!-- Slide Counter -->
                        <div class="text-white/60 text-xs font-mono tracking-wider mr-2 hidden sm:block">
                            <span class="text-[#C5A880] font-bold text-base" x-text="String(currentSlide + 1).padStart(2, '0')">01</span>
                            <span class="mx-1">/</span>
                            <span>{{ str_pad($totalSlides, 2, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        @foreach($heroSlides as $idx => $slide)
                        <button @click="goTo({{ $idx }})"
                                class="relative cursor-pointer group h-8 flex items-center">
                            <div class="w-10 sm:w-14 h-[3px] rounded-full overflow-hidden transition-colors"
                                 :class="currentSlide === {{ $idx }} ? 'bg-[#C5A880]/30' : 'bg-white/15 group-hover:bg-white/25'">
                                <div class="h-full bg-[#C5A880] rounded-full transition-all duration-300"
                                     :class="currentSlide === {{ $idx }} ? 'w-full' : 'w-0'"
                                     :style="currentSlide === {{ $idx }} ? 'animation: slideProgress 6s linear forwards' : ''">
                                </div>
                            </div>
                        </button>
                        @endforeach
                    </div>
                </div>
            </div>
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
                        $heroTitle = \App\Models\Setting::get('hero_title', 'Mewujudkan Interior Mewah & Konstruksi Sipil Terbaikkkk');
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