<!-- Hero Section - PLN-Inspired Fullscreen Cinematic Slideshow -->
<section class="relative min-h-screen bg-[#0A1E13] flex items-center justify-center overflow-hidden"
         x-data="{
             currentSlide: 0,
             totalSlides: 4,
             interval: null,
             init() {
                 this.interval = setInterval(() => {
                     this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
                 }, 6000);
             }
         }"
         x-init="init()">

    <!-- ===== FULLSCREEN BACKGROUND IMAGE SLIDESHOW ===== -->
    <div class="absolute inset-0 z-0">
        <!-- Slide 0: Construction Site -->
        <div class="absolute inset-0 transition-opacity duration-[2000ms] ease-in-out"
             :class="currentSlide === 0 ? 'opacity-100' : 'opacity-0'">
            <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=1920&h=1080&fit=crop"
                 class="w-full h-full object-cover animate-[ken-burns-zoom_20s_ease-in-out_infinite_alternate]"
                 alt="Proyek Konstruksi Sipil Berat">
        </div>
        <!-- Slide 1: Luxury Villa -->
        <div class="absolute inset-0 transition-opacity duration-[2000ms] ease-in-out"
             :class="currentSlide === 1 ? 'opacity-100' : 'opacity-0'">
            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=1920&h=1080&fit=crop"
                 class="w-full h-full object-cover animate-[ken-burns-zoom_20s_ease-in-out_infinite_alternate]"
                 alt="Villa Mewah Modern">
        </div>
        <!-- Slide 2: Interior Luxury -->
        <div class="absolute inset-0 transition-opacity duration-[2000ms] ease-in-out"
             :class="currentSlide === 2 ? 'opacity-100' : 'opacity-0'">
            <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=1920&h=1080&fit=crop"
                 class="w-full h-full object-cover animate-[ken-burns-zoom_20s_ease-in-out_infinite_alternate]"
                 alt="Interior Premium Finishing">
        </div>
        <!-- Slide 3: Modern Architecture -->
        <div class="absolute inset-0 transition-opacity duration-[2000ms] ease-in-out"
             :class="currentSlide === 3 ? 'opacity-100' : 'opacity-0'">
            <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=1920&h=1080&fit=crop"
                 class="w-full h-full object-cover animate-[ken-burns-zoom_20s_ease-in-out_infinite_alternate]"
                 alt="Gedung Arsitektur Modern">
        </div>
    </div>

    <!-- ===== CINEMATIC OVERLAY GRADIENTS ===== -->
    <div class="absolute inset-0 bg-gradient-to-t from-[#0A1E13] via-[#0A1E13]/85 to-[#0A1E13]/55 z-[1]"></div>
    <div class="absolute inset-y-0 left-0 w-3/4 bg-gradient-to-r from-[#0A1E13]/95 via-[#0A1E13]/75 to-transparent hidden lg:block z-[1]"></div>
    <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-[#0A1E13] to-transparent z-[1]"></div>

    <!-- ===== BACKGROUND VIDEO OVERLAY (if hero_video_url set) ===== -->
    @if(\App\Models\Setting::get('hero_video_url'))
        @php
            $heroVideoUrl = \App\Models\Setting::get('hero_video_url');
            $videoId = '';
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $heroVideoUrl, $match)) {
                $videoId = $match[1];
            }
        @endphp
        @if($videoId)
            <div class="absolute inset-0 w-full h-full overflow-hidden pointer-events-none opacity-15 z-[2] mix-blend-luminosity">
                <iframe class="absolute top-1/2 left-1/2 w-[100vw] h-[56.25vw] min-h-[100vh] min-w-[177.77vh] -translate-x-1/2 -translate-y-1/2"
                        src="https://www.youtube.com/embed/{{ $videoId }}?autoplay=1&mute=1&loop=1&playlist={{ $videoId }}&controls=0&showinfo=0&rel=0&enablejsapi=1" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen>
                </iframe>
            </div>
        @else
            <video autoplay loop muted playsinline class="absolute inset-0 w-full h-full object-cover opacity-15 object-center z-[2] mix-blend-luminosity">
                <source src="{{ $heroVideoUrl }}" type="video/mp4">
            </video>
        @endif
    @endif

    <!-- ===== AMBIENT DECORATIVE ELEMENTS ===== -->
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-[#C5A880]/8 rounded-full blur-[100px] -mr-40 -mt-40 z-[2]"></div>
    <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-emerald-950/15 rounded-full blur-[80px] -ml-40 -mb-40 z-[2]"></div>

    <!-- ===== HERO CONTENT ===== -->
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10 w-full pt-24 sm:pt-32 pb-20 sm:pb-24">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <!-- Left: Main Text Content -->
            <div class="lg:col-span-7 space-y-7 text-center lg:text-left">
                <!-- Animated Badge -->
                <div class="overflow-hidden">
                    <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold bg-[#C5A880]/15 text-[#C5A880] border border-[#C5A880]/30 uppercase tracking-widest animate-pulse-gold backdrop-blur-sm">
                        <i class="fa-solid fa-helmet-safety mr-2"></i> KONTRAKTOR & ARCHITECTURE
                    </span>
                </div>
                
                <!-- Main Heading with Typewriter Reveal -->
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-[3.5rem] xl:text-6xl font-extrabold text-white tracking-tight leading-[1.1] drop-shadow-[0_4px_12px_rgba(0,0,0,0.6)]">
                    @php
                        $heroTitle = \App\Models\Setting::get('hero_title', 'Mewujudkan Interior Mewah & Konstruksi Sipil Presisi');
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
                        <span class="block font-serif opacity-0 animate-[fadeInUp_1s_0.3s_cubic-bezier(0.16,1,0.3,1)_forwards]">{{ $mainPart }}</span>
                        <span class="block text-transparent bg-clip-text bg-gradient-to-r from-[#C5A880] via-[#E2D2BC] to-[#B4966B] font-serif italic opacity-0 animate-[fadeInUp_1s_0.6s_cubic-bezier(0.16,1,0.3,1)_forwards]">{{ $highlightPart }}</span>
                    @else
                        <span class="block font-serif opacity-0 animate-[fadeInUp_1s_0.3s_cubic-bezier(0.16,1,0.3,1)_forwards]">{{ $mainPart }}</span>
                    @endif
                </h1>
                
                <!-- Subtitle -->
                <p class="text-slate-300/90 text-sm sm:text-base lg:text-lg max-w-2xl mx-auto lg:mx-0 leading-relaxed font-sans font-light opacity-0 animate-[fadeInUp_1s_0.9s_cubic-bezier(0.16,1,0.3,1)_forwards]">
                    {{ \App\Models\Setting::get('hero_subtitle', 'PT Alam Kharisma Bersaudara menghadirkan rancangan konstruksi sipil premium, interior mewah, dan eksterior ikonik dengan keahlian presisi serta komitmen RAB transparan.') }}
                </p>
                
                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2 opacity-0 animate-[fadeInUp_1s_1.2s_cubic-bezier(0.16,1,0.3,1)_forwards]">
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

                <!-- Trust Stats -->
                <div class="grid grid-cols-3 gap-4 sm:gap-6 pt-6 sm:pt-8 border-t border-white/10 max-w-lg mx-auto lg:mx-0 opacity-0 animate-[fadeInUp_1s_1.5s_cubic-bezier(0.16,1,0.3,1)_forwards]">
                    <div class="text-center lg:text-left">
                        @php $projectCount = (int) \App\Models\Setting::get('stat_completed_projects', 130); @endphp
                        <p class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-[#C5A880] font-serif" x-data="{ count: 0 }" x-intersect.once="let i = setInterval(() => { count++; if(count >= {{ $projectCount }}) clearInterval(i) }, 12)">
                            <span x-text="count">{{ $projectCount }}</span>+
                        </p>
                        <p class="text-[10px] sm:text-xs text-slate-400 uppercase tracking-widest mt-1">Proyek Selesai</p>
                    </div>
                    <div class="text-center lg:text-left">
                        <p class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-[#C5A880] font-serif">100%</p>
                        <p class="text-[10px] sm:text-xs text-slate-400 uppercase tracking-widest mt-1">RAB Transparan</p>
                    </div>
                    <div class="text-center lg:text-left">
                        <p class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-[#C5A880] font-serif">{{ date('Y') - \App\Models\Setting::get('company_established_year', 2018) }}+</p>
                        <p class="text-[10px] sm:text-xs text-slate-400 uppercase tracking-widest mt-1">Tahun Pengalaman</p>
                    </div>
                </div>
            </div>

            <!-- Right: Floating Project Card -->
            <div class="lg:col-span-5 hidden lg:block opacity-0 animate-[scaleUp_1.2s_1s_cubic-bezier(0.16,1,0.3,1)_forwards]">
                <div class="relative group">
                    <!-- Glow Ring -->
                    <div class="absolute -inset-2 rounded-3xl bg-gradient-to-br from-[#C5A880]/30 via-transparent to-[#C5A880]/15 opacity-0 group-hover:opacity-100 blur-xl transition-opacity duration-1000"></div>
                    
                    <div class="relative rounded-3xl overflow-hidden border border-[#C5A880]/25 bg-black/30 backdrop-blur-lg shadow-2xl">
                        <!-- Image with parallax-like zoom -->
                        <div class="h-80 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800&h=600&fit=crop" 
                                 class="w-full h-full object-cover transition duration-[1.5s] group-hover:scale-110" 
                                 alt="Premium Architecture Project">
                        </div>
                             
                        <!-- Frosted info panel -->
                        <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/90 via-black/60 to-transparent">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="w-2 h-2 rounded-full bg-[#C5A880] animate-pulse"></span>
                                <span class="text-[#C5A880] text-[10px] font-bold tracking-widest uppercase">Signature Project</span>
                            </div>
                            <h3 class="text-white font-serif font-bold text-xl">Modern Luxury Villa</h3>
                            <p class="text-slate-300/80 text-xs mt-1 flex items-center gap-1.5">
                                <i class="fa-solid fa-map-pin text-[#C5A880]"></i> Residensial Premium & Landscape
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- ===== SLIDE INDICATORS (PLN Style) ===== -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10 flex items-center gap-3">
        <template x-for="i in totalSlides" :key="i">
            <button @click="currentSlide = i - 1; clearInterval(interval); interval = setInterval(() => { currentSlide = (currentSlide + 1) % totalSlides }, 6000)"
                    class="relative cursor-pointer group h-8 flex items-center">
                <!-- Background track -->
                <div class="w-8 h-[3px] rounded-full bg-white/20 overflow-hidden group-hover:bg-white/30 transition-colors">
                    <!-- Active fill with progress animation -->
                    <div class="h-full bg-[#C5A880] rounded-full transition-all duration-300"
                         :class="currentSlide === i - 1 ? 'w-full' : 'w-0'"
                         :style="currentSlide === i - 1 ? 'animation: slideProgress 6s linear forwards' : ''">
                    </div>
                </div>
            </button>
        </template>
    </div>

    <!-- ===== SCROLL DOWN INDICATOR ===== -->
    <div class="absolute bottom-8 right-8 z-10 hidden lg:flex flex-col items-center gap-2 text-white/40 hover:text-white/80 transition-colors duration-500 cursor-pointer">
        <span class="text-[9px] tracking-[0.4em] uppercase font-light writing-mode-vertical" style="writing-mode: vertical-rl;">Scroll</span>
        <div class="w-px h-12 bg-gradient-to-b from-[#C5A880] to-transparent"></div>
    </div>
</section>
