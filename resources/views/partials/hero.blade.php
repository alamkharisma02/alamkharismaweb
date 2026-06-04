<!-- Hero Section (Background Video & CTA) -->
<section class="relative min-h-screen bg-slate-950 flex items-center justify-center pt-36 pb-16 overflow-hidden">
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
            <div class="absolute inset-0 w-full h-full overflow-hidden pointer-events-none opacity-40">
                <iframe class="absolute top-1/2 left-1/2 w-[100vw] h-[56.25vw] min-h-[100vh] min-w-[177.77vh] -translate-x-1/2 -translate-y-1/2"
                        src="https://www.youtube.com/embed/{{ $videoId }}?autoplay=1&mute=1&loop=1&playlist={{ $videoId }}&controls=0&showinfo=0&rel=0&enablejsapi=1" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen>
                </iframe>
            </div>
        @else
            <video autoplay loop muted playsinline class="absolute inset-0 w-full h-full object-cover opacity-40 object-center">
                <source src="{{ $heroVideoUrl }}" type="video/mp4">
            </video>
        @endif
    @else
        <!-- Background Fallback Image -->
        <div class="absolute inset-0 opacity-40">
            <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=1920&h=1080&fit=crop" 
                 class="w-full h-full object-cover" 
                 alt="Background Konstruksi Pembangunan">
        </div>
    @endif
    
    <!-- Premium Dark Gradient overlays for readability and prominent construction BG -->
    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/85 to-slate-950/50"></div>
    <div class="absolute inset-y-0 left-0 w-2/3 bg-gradient-to-r from-slate-950/90 via-slate-950/65 to-transparent hidden lg:block"></div>

    <!-- Animated Construction lines -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-brand-accent/10 rounded-full blur-3xl -mr-20 -mt-20"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-indigo-500/10 rounded-full blur-3xl -ml-20 -mb-20"></div>

    <!-- Hero Content -->
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <!-- Left: Typography -->
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                <span class="inline-flex items-center px-3.5 py-1 rounded-full text-xs font-bold bg-brand-accent/10 text-brand-accent border border-brand-accent/30 uppercase tracking-widest animate-pulse">
                    <i class="fa-solid fa-helmet-safety mr-1.5"></i> Kontraktor & Interior-Eksterior
                </span>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white tracking-tight leading-tight">
                    @php
                        $heroTitle = \App\Models\Setting::get('hero_title', 'Mewujudkan Interior Mewah & Konstruksi Sipil Presisi');
                        // Split highlight part
                        $parts = explode('&', $heroTitle, 2);
                        $mainPart = $parts[0] ?? 'Mewujudkan Interior Mewah ';
                        $highlightPart = isset($parts[1]) ? '& ' . $parts[1] : 'Konstruksi Sipil Presisi';
                    @endphp
                    {{ $mainPart }} <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-accent to-brand-accent-hover">{{ $highlightPart }}</span>
                </h1>
                <p class="text-slate-300 text-base sm:text-lg max-w-2xl mx-auto lg:mx-0 leading-relaxed">
                    {{ \App\Models\Setting::get('hero_subtitle') }}
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-4">
                    <a href="https://api.whatsapp.com/send?phone={{ \App\Models\Setting::get('contact_whatsapp') }}&text=Halo%20{{ urlencode(\App\Models\Setting::get('site_name')) }}%2C%20saya%20ingin%20berkonsultasi%20mengenai%20layanan%20Anda." target="_blank" 
                       class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 rounded-xl bg-brand-accent hover:bg-brand-accent-hover text-slate-950 font-extrabold text-base transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg hover:shadow-brand-accent/20 active:translate-y-0 cursor-pointer">
                        <i class="fa-brands fa-whatsapp text-lg mr-2"></i>
                        Konsultasi WhatsApp
                    </a>
                    <a href="{{ route('projects.index') }}" 
                       class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 rounded-xl bg-slate-900 text-white font-bold text-base hover:bg-slate-800 transition-colors transform hover:-translate-y-1 active:translate-y-0 cursor-pointer">
                        <i class="fa-solid fa-briefcase mr-2 text-brand-accent"></i>
                        Lihat Portofolio
                    </a>
                </div>

                <!-- Trust Stats -->
                <div class="grid grid-cols-3 gap-6 pt-10 border-t border-slate-800 max-w-lg mx-auto lg:mx-0">
                    <div>
                        <p class="text-3xl sm:text-4xl font-extrabold text-white">250+</p>
                        <p class="text-xs sm:text-sm text-slate-400">Proyek Selesai</p>
                    </div>
                    <div>
                        <p class="text-3xl sm:text-4xl font-extrabold text-white">100%</p>
                        <p class="text-xs sm:text-sm text-slate-400">RAB Transparan</p>
                    </div>
                    <div>
                        <p class="text-3xl sm:text-4xl font-extrabold text-white">{{ date('Y') - \App\Models\Setting::get('company_established_year', 2018) }} Tahun</p>
                        <p class="text-xs sm:text-sm text-slate-400">Pengalaman Kerja</p>
                    </div>
                </div>
            </div>

            <!-- Right: High Quality Construction Visual Card -->
            <div class="lg:col-span-5 hidden lg:block">
                <div class="relative group">
                    <div class="absolute -inset-1 rounded-2xl bg-gradient-to-r from-brand-primary to-brand-primary-hover opacity-20 group-hover:opacity-40 blur transition duration-1000"></div>
                    <div class="relative rounded-2xl overflow-hidden border border-slate-200 bg-white p-3 shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800&h=600&fit=crop" 
                             class="w-full h-full object-cover rounded-xl transition duration-500 group-hover:scale-105" 
                             alt="Featured Project">
                        <div class="absolute bottom-6 left-6 right-6 p-4 rounded-xl bg-white/85 backdrop-blur-md border border-slate-200">
                            <span class="text-brand-accent text-xs font-bold tracking-widest uppercase">Proyek Desain & Bangun</span>
                            <h3 class="text-slate-900 font-extrabold text-base mt-1">Interior & Eksterior Modern</h3>
                            <p class="text-slate-600 text-xs mt-0.5"><i class="fa-solid fa-map-pin text-brand-accent mr-1"></i> Residensial & Komersial</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
