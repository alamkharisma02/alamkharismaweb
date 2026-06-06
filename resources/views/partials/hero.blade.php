<!-- Hero Section (Background Video & CTA) -->
<section class="relative min-h-screen bg-[#0A1E13] flex items-center justify-center pt-32 pb-16 overflow-hidden">
    <!-- Background Cinematic Video Loop -->
    @if(\App\Models\Setting::get('hero_video_url'))
        @php
            $heroVideoUrl = \App\Models\Setting::get('hero_video_url');
            $videoId = '';
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $heroVideoUrl, $match)) {
                $videoId = $match[1];
            }
        @endphp
        @if($videoId)
            <div class="absolute inset-0 w-full h-full overflow-hidden pointer-events-none opacity-25 z-0">
                <iframe class="absolute top-1/2 left-1/2 w-[100vw] h-[56.25vw] min-h-[100vh] min-w-[177.77vh] -translate-x-1/2 -translate-y-1/2"
                        src="https://www.youtube.com/embed/{{ $videoId }}?autoplay=1&mute=1&loop=1&playlist={{ $videoId }}&controls=0&showinfo=0&rel=0&enablejsapi=1" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen>
                </iframe>
            </div>
        @else
            <video autoplay loop muted playsinline class="absolute inset-0 w-full h-full object-cover opacity-25 object-center z-0">
                <source src="{{ $heroVideoUrl }}" type="video/mp4">
            </video>
        @endif
    @else
        <!-- Background Fallback Image -->
        <div class="absolute inset-0 opacity-25 z-0">
            <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=1920&h=1080&fit=crop" 
                 class="w-full h-full object-cover" 
                 alt="Background Konstruksi Pembangunan">
        </div>
    @endif
    
    <!-- Luxury Dark Forest Gradient overlays for readability -->
    <div class="absolute inset-0 bg-gradient-to-t from-[#0A1E13] via-[#0A1E13]/90 to-[#0A1E13]/60 z-0"></div>
    <div class="absolute inset-y-0 left-0 w-2/3 bg-gradient-to-r from-[#0A1E13]/95 via-[#0A1E13]/70 to-transparent hidden lg:block z-0"></div>

    <!-- Animated Construction/Aesthetic Lines -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-[#C5A880]/10 rounded-full blur-3xl -mr-20 -mt-20 z-0"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-emerald-950/20 rounded-full blur-3xl -ml-20 -mb-20 z-0"></div>
    <div class="absolute inset-0 luxury-grid-pattern opacity-30 z-0"></div>

    <!-- Hero Content -->
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <!-- Left: Typography -->
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left reveal-on-scroll active">
                <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold bg-[#C5A880]/15 text-[#C5A880] border border-[#C5A880]/30 uppercase tracking-widest animate-pulse-gold">
                    <i class="fa-solid fa-helmet-safety mr-2"></i> KONTRAKTOR & ARCHITECTURE
                </span>
                
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white tracking-tight leading-tight">
                    @php
                        $heroTitle = \App\Models\Setting::get('hero_title', 'Mewujudkan Interior Mewah & Konstruksi Sipil Presisi');
                        // Split highlight part
                        $parts = explode('&', $heroTitle, 2);
                        $mainPart = $parts[0] ?? 'Mewujudkan Interior Mewah ';
                        $highlightPart = isset($parts[1]) ? '& ' . $parts[1] : 'Konstruksi Sipil Presisi';
                    @endphp
                    <span class="block font-serif">{{ $mainPart }}</span>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#C5A880] via-[#E2D2BC] to-[#B4966B] font-serif italic">{{ $highlightPart }}</span>
                </h1>
                
                <p class="text-slate-300 text-base sm:text-lg max-w-2xl mx-auto lg:mx-0 leading-relaxed font-sans font-light">
                    {{ \App\Models\Setting::get('hero_subtitle', 'PT Alam Kharisma Bersaudara menghadirkan rancangan konstruksi sipil premium, interior mewah, dan eksterior ikonik dengan keahlian presisi serta komitmen RAB transparan.') }}
                </p>
                
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-4">
                    <a href="https://api.whatsapp.com/send?phone={{ \App\Models\Setting::get('contact_whatsapp', '628123456789') }}&text=Halo%20{{ urlencode(\App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara')) }}%2C%20saya%20tertarik%20dengan%20layanan%20Anda.%20Bisa%20berdiskusi%20lebih%20lanjut%3F" target="_blank" 
                       class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 rounded-xl bg-gradient-to-r from-[#C5A880] to-[#B4966B] hover:from-[#B4966B] hover:to-[#A3855A] text-[#0A1E13] font-bold text-base transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg hover:shadow-[#C5A880]/20 active:translate-y-0 cursor-pointer tracking-wider uppercase">
                        <i class="fa-brands fa-whatsapp text-xl mr-2"></i>
                        Konsultasi WhatsApp
                    </a>
                    <a href="{{ route('projects.index') }}" 
                       class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 rounded-xl bg-[#0A1E13]/90 text-white font-bold text-base hover:bg-[#0A1E13] border border-[#C5A880]/40 hover:border-[#C5A880] transition-all duration-300 transform hover:-translate-y-1 active:translate-y-0 cursor-pointer tracking-wider uppercase">
                        <i class="fa-solid fa-briefcase mr-2 text-[#C5A880]"></i>
                        Lihat Portofolio
                    </a>
                </div>

                <!-- Trust Stats -->
                <div class="grid grid-cols-3 gap-6 pt-10 border-t border-white/10 max-w-lg mx-auto lg:mx-0">
                    <div class="text-center lg:text-left">
                        <p class="text-3xl sm:text-4xl font-extrabold text-[#C5A880] font-serif">250+</p>
                        <p class="text-xs text-slate-400 uppercase tracking-widest mt-1">Proyek Selesai</p>
                    </div>
                    <div class="text-center lg:text-left">
                        <p class="text-3xl sm:text-4xl font-extrabold text-[#C5A880] font-serif">100%</p>
                        <p class="text-xs text-slate-400 uppercase tracking-widest mt-1">RAB Transparan</p>
                    </div>
                    <div class="text-center lg:text-left">
                        <p class="text-3xl sm:text-4xl font-extrabold text-[#C5A880] font-serif">{{ date('Y') - \App\Models\Setting::get('company_established_year', 2018) }} Thn</p>
                        <p class="text-xs text-slate-400 uppercase tracking-widest mt-1">Pengalaman</p>
                    </div>
                </div>
            </div>

            <!-- Right: Premium Floating Architecture Card -->
            <div class="lg:col-span-5 hidden lg:block reveal-on-scroll active delay-200">
                <div class="relative group">
                    <!-- Glow effect -->
                    <div class="absolute -inset-1 rounded-2xl bg-gradient-to-r from-[#C5A880] to-[#0A1E13] opacity-25 group-hover:opacity-40 blur-lg transition duration-1000"></div>
                    
                    <div class="relative rounded-2xl overflow-hidden border border-[#C5A880]/30 bg-[#0A1E13]/85 p-3 shadow-2xl backdrop-blur-md">
                        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800&h=600&fit=crop" 
                             class="w-full h-80 object-cover rounded-xl transition duration-700 group-hover:scale-105" 
                             alt="Premium Architecture Project">
                             
                        <div class="absolute bottom-6 left-6 right-6 p-5 rounded-xl bg-[#0A1E13]/90 border border-[#C5A880]/40 backdrop-blur-md">
                            <span class="text-[#C5A880] text-xs font-bold tracking-widest uppercase">Signature Project</span>
                            <h3 class="text-white font-serif font-bold text-lg mt-1">Modern Luxury Villa</h3>
                            <p class="text-slate-300 text-xs mt-1 flex items-center gap-1.5">
                                <i class="fa-solid fa-map-pin text-[#C5A880]"></i> Residensial Premium & Landscape
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Elegant Scroll Down Indicator -->
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-10 flex flex-col items-center gap-2 text-white/50 hover:text-white transition-colors duration-300 cursor-pointer">
        <span class="text-[10px] tracking-[0.35em] uppercase font-light">Scroll Down</span>
        <div class="w-[20px] h-[35px] rounded-full border border-white/30 flex justify-center p-1">
            <div class="w-1 h-2 bg-[#C5A880] rounded-full animate-bounce"></div>
        </div>
    </div>
</section>
