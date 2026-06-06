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
    <div class="absolute inset-0 bg-gradient-to-t from-[#0A1E13] via-[#0A1E13]/90 to-[#0A1E13]/65 z-[1]"></div>
    <div class="absolute inset-y-0 left-0 w-full lg:w-2/3 bg-gradient-to-r from-[#0A1E13]/95 via-[#0A1E13]/80 to-transparent hidden sm:block z-[1]"></div>
    <div class="absolute bottom-0 left-0 right-0 h-40 bg-gradient-to-t from-[#0A1E13] to-transparent z-[1]"></div>

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
            <div class="absolute inset-0 w-full h-full overflow-hidden pointer-events-none opacity-[0.12] z-[2] mix-blend-luminosity">
                <iframe class="absolute top-1/2 left-1/2 w-[100vw] h-[56.25vw] min-h-[100vh] min-w-[177.77vh] -translate-x-1/2 -translate-y-1/2"
                        src="https://www.youtube.com/embed/{{ $videoId }}?autoplay=1&mute=1&loop=1&playlist={{ $videoId }}&controls=0&showinfo=0&rel=0&enablejsapi=1" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen>
                </iframe>
            </div>
        @else
            <video autoplay loop muted playsinline class="absolute inset-0 w-full h-full object-cover opacity-[0.12] object-center z-[2] mix-blend-luminosity">
                <source src="{{ $heroVideoUrl }}" type="video/mp4">
            </video>
        @endif
    @endif

    <!-- ===== AMBIENT DECORATIVE ELEMENTS ===== -->
    <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-[#C5A880]/5 rounded-full blur-[120px] -mr-40 -mt-40 z-[2]"></div>
    <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-emerald-900/10 rounded-full blur-[100px] -ml-40 -mb-40 z-[2]"></div>

    <!-- ===== HERO CONTENT ===== -->
    <!-- PERBAIKAN UTAMA: Mengubah pt-24 menjadi pt-36 lg:pt-44 untuk memberikan ruang aman agar tidak menabrak Navbar -->
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10 w-full pt-36 sm:pt-40 lg:pt-44 pb-24 sm:pb-28">
        <!-- PERBAIKAN: Menggunakan gap-16 pada layar besar agar layout tidak terasa berhimpitan -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center">
            
            <!-- Left: Main Text Content -->
            <div class="lg:col-span-7 space-y-8 text-center lg:text-left">
                <!-- Animated Badge -->
                <div class="overflow-hidden inline-block">
                    <span class="inline-flex items-center px-4 py-1.5 rounded-full text-[11px] font-bold bg-[#C5A880]/10 text-[#E2D2BC] border border-[#C5A880]/25 uppercase tracking-[0.2em] shadow-inner backdrop-blur-md animate-[fadeInUp_1s_0.1s_ease-out_forwards]">
                        <i class="fa-solid fa-helmet-safety mr-2 text-[#C5A880]"></i> KONTRAKTOR & ARCHITECTURE
                    </span>
                </div>
                
                <!-- Main Heading with Typewriter Reveal -->
                <!-- PERBAIKAN: Penyesuaian line-height (leading) dan margin spacing agar teks mewah & elegan terlihat harmonis -->
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-[3.25rem] xl:text-6xl font-extrabold text-white tracking-tight leading-[1.15] drop-shadow-[0_4px_24px_rgba(0,0,0,0.7)]">
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
                        <span class="block font-serif font-normal opacity-0 animate-[fadeInUp_1s_0.3s_cubic-bezier(0.16,1,0.3,1)_forwards]">{{ $mainPart }}</span>
                        <span class="block text-transparent bg-clip-text bg-gradient-to-r from-[#C5A880] via-[#E2D2BC] to-[#B4966B] font-serif italic font-normal mt-2 opacity-0 animate-[fadeInUp_1s_0.6s_cubic-bezier(0.16,1,0.3,1)_forwards]">{{ $highlightPart }}</span>
                    @else
                        <span class="block font-serif font-normal opacity-0 animate-[fadeInUp_1s_0.3s_cubic-bezier(0.16,1,0.3,1)_forwards]">{{ $mainPart }}</span>
                    @endif
                </h1>
                
                <!-- Subtitle -->
                <p class="text-slate-300/85 text-sm sm:text-base lg:text-[17px] max-w-2xl mx-auto lg:mx-0 leading-relaxed font-sans font-light opacity-0 animate-[fadeInUp_1s_0.9s_cubic-bezier(0.16,1,0.3,1)_forwards]">
                    {{ \App\Models\Setting::get('hero_subtitle', 'PT Alam Kharisma Bersaudara menghadirkan rancangan konstruksi sipil premium, interior mewah, dan eksterior ikonik dengan keahlian presisi serta komitmen RAB transparan.') }}
                </p>
                
                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-3 opacity-0 animate-[fadeInUp_1s_1.2s_cubic-bezier(0.16,1,0.3,1)_forwards]">
                    <a href="https://api.whatsapp.com/send?phone={{ \App\Models\Setting::get('contact_whatsapp', '628123456789') }}&text=Halo%20{{ urlencode(\App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara')) }}%2C%20saya%20tertarik%20dengan%20layanan%20Anda.%20Bisa%20berdiskusi%20lebih%20lanjut%3F" target="_blank" 
                       class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 rounded-xl bg-gradient-to-r from-[#C5A880] to-[#B4966B] hover:from-[#B4966B] hover:to-[#A3855A] text-[#0A1E13] font-bold text-sm transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl hover:shadow-[#C5A880]/20 active:translate-y-0 cursor-pointer tracking-wider uppercase">
                        <i class="fa-brands fa-whatsapp text-lg mr-2"></i>
                        Konsultasi Gratis
                    </a>
                    <a href="{{ route('projects.index') }}" 
                       class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 rounded-xl bg-white/5 text-white font-bold text-sm hover:bg-white/10 border border-white/15 hover:border-[#C5A880]/50 transition-all duration-300 transform hover:-translate-y-1 active:translate-y-0 cursor-pointer tracking-wider uppercase backdrop-blur-sm">
                        <i class="fa-solid fa-briefcase mr-2 text-[#C5A880]"></i>
                        Lihat Portofolio
                    </a>
                </div>

                <!-- Trust Stats -->
                <!-- PERBAIKAN: Meningkatkan layout border dan penataan counter stat agar terlihat rapi dan proporsional -->
                <div class="grid grid-cols-3 gap-6 pt-8 border-t border-white/10 max-w-xl mx-auto lg:mx-0 opacity-0 animate-[fadeInUp_1s_1.5s_cubic-bezier(0.16,1,0.3,1)_forwards]">
                    <div class="text-center lg:text-left">
                        @php $projectCount = (int) \App\Models\Setting::get('stat_completed_projects', 130); @endphp
                        <p class="text-2xl sm:text-3xl font-bold text-[#C5A880] font-serif tracking-tight" x-data="{ count: 0 }" x-intersect.once="let i = setInterval(() => { if(count >= {{ $projectCount }}) { count = {{ $projectCount }}; clearInterval(i); } else { count += Math.ceil({{ $projectCount }} / 30); if(count > {{ $projectCount }}) count = {{ $projectCount }}; } }, 25)">
                            <span x-text="count">0</span>+
                        </p>
                        <p class="text-[10px] sm:text-xs text-slate-400 uppercase tracking-widest mt-1.5 font-medium">Proyek Selesai</p>
                    </div>
                    <div class="text-center lg:text-left border-x border-white/5 px-2">
                        <p class="text-2xl sm:text-3xl font-bold text-[#C5A880] font-serif tracking-tight">100%</p>
                        <p class="text-[10px] sm:text-xs text-slate-400 uppercase tracking-widest mt-1.5 font-medium">RAB Transparan</p>
                    </div>
                    <div class="text-center lg:text-left">
                        <p class="text-2xl sm:text-3xl font-bold text-[#C5A880] font-serif tracking-tight">{{ date('Y') - \App\Models\Setting::get('company_established_year', 2018) }}+</p>
                        <p class="text-[10px] sm:text-xs text-slate-400 uppercase tracking-widest mt-1.5 font-medium">Tahun Pengalaman</p>
                    </div>
                </div>
            </div>

            <!-- Right: Floating Project Card -->
            <!-- PERBAIKAN: Mengubah span grid menjadi lg:col-span-5 untuk porsi ruang seimbang, penambahan efek bayangan dan border emas tipis yang konsisten -->
            <div class="lg:col-span-5 hidden lg:block opacity-0 animate-[scaleUp_1.2s_1s_cubic-bezier(0.16,1,0.3,1)_forwards]">
                <div class="relative group select-none">
                    <!-- Glow Ring behind card -->
                    <div class="absolute -inset-2 rounded-3xl bg-gradient-to-br from-[#C5A880]/20 via-transparent to-emerald-500/10 opacity-40 group-hover:opacity-70 blur-2xl transition-opacity duration-1000"></div>
                    
                    <div class="relative rounded-2xl overflow-hidden border border-white/10 bg-[#0A1E13]/40 backdrop-blur-xl shadow-2xl transition-all duration-500 group-hover:border-[#C5A880]/30 group-hover:shadow-[#C5A880]/5">
                        <!-- Image with luxury zoom effect -->
                        <div class="h-80 sm:h-96 lg:h-80 xl:h-92 overflow-hidden relative">
                            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800&h=600&fit=crop" 
                                 class="w-full h-full object-cover transition duration-[2s] ease-[cubic-bezier(0.16,1,0.3,1)] group-hover:scale-105" 
                                 alt="Premium Architecture Project">
                            <!-- Elegant Thin Inner Border Vignette -->
                            <div class="absolute inset-0 border border-white/10 rounded-t-2xl pointer-events-none"></div>
                        </div>
                             
                        <!-- Frosted luxury info panel -->
                        <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-[#0A1E13] via-[#0A1E13]/80 to-transparent">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#C5A880] animate-pulse"></span>
                                <span class="text-[#C5A880] text-[10px] font-bold tracking-[0.2em] uppercase">Signature Project</span>
                            </div>
                            <h3 class="text-white font-serif font-normal text-xl tracking-wide">Modern Luxury Villa</h3>
                            <p class="text-slate-300/80 text-xs mt-1.5 flex items-center gap-1.5 font-light">
                                <i class="fa-solid fa-map-pin text-[#C5A880] text-[11px]"></i> Residensial Premium & Landscape
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- ===== SLIDE INDICATORS (PLN Style) ===== -->
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-10 flex items-center gap-3">
        <template x-for="i in totalSlides" :key="i">
            <button @click="currentSlide = i - 1; clearInterval(interval); interval = setInterval(() => { currentSlide = (currentSlide + 1) % totalSlides }, 6000)"
                    class="relative cursor-pointer group h-8 flex items-center">
                <!-- Background track -->
                <div class="w-8 h-[3px] rounded-full bg-white/20 overflow-hidden group-hover:bg-white/40 transition-colors">
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
    <div class="absolute bottom-10 right-8 z-10 hidden lg:flex flex-col items-center gap-3 text-white/30 hover:text-[#C5A880] transition-colors duration-500 cursor-pointer group">
        <span class="text-[9px] tracking-[0.4em] uppercase font-light writing-mode-vertical" style="writing-mode: vertical-rl;">Scroll</span>
        <div class="w-px h-14 bg-gradient-to-b from-[#C5A880] to-transparent opacity-50 group-hover:opacity-100 transition-opacity"></div>
    </div>
</section>