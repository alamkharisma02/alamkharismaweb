<!-- Useful Links Section (Waskita-Inspired Quick Access Portfolio & Services) -->
<section class="py-16 bg-[#F9F7F3] border-b border-slate-200 relative overflow-hidden">
    <!-- Subtle Ambient Decoration -->
    <div class="absolute -right-24 top-1/2 -translate-y-1/2 w-96 h-96 bg-[#C5A880]/5 rounded-full blur-3xl z-0 pointer-events-none"></div>
    <div class="absolute -left-24 top-0 w-80 h-80 bg-[#113F27]/5 rounded-full blur-3xl z-0 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Section Title -->
        <div class="text-center space-y-3 mb-12">
            <span class="inline-flex items-center px-4 py-1 rounded-full text-[10px] font-bold bg-[#113F27]/10 text-[#113F27] border border-[#113F27]/20 uppercase tracking-[0.2em]">
                <i class="fa-solid fa-link mr-1.5"></i> Useful Links
            </span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#0A1E13] tracking-tight font-serif">
                Akses Cepat Portofolio &amp; Layanan
            </h2>
            <div class="w-16 h-[2px] bg-[#C5A880] mx-auto mt-2"></div>
        </div>

        <!-- 3x2 Responsive Button Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 max-w-5xl mx-auto">
            <!-- 1. Interior Portfolio -->
            <a href="{{ route('projects.index', ['category' => 'Residensial']) }}" 
               class="group relative flex flex-col items-center justify-center p-8 rounded-2xl bg-[#113F27] hover:bg-[#0C2B1B] text-white transition-all duration-350 shadow-md hover:shadow-xl hover:-translate-y-1.5 border border-emerald-900 cursor-pointer overflow-hidden min-h-[200px]">
                <div class="absolute inset-0 bg-black/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <div class="w-16 h-16 mb-4 flex items-center justify-center text-4xl text-[#C5A880] transition-transform duration-300 group-hover:scale-110">
                    <i class="fa-solid fa-couch"></i>
                </div>
                <span class="text-base sm:text-lg font-bold tracking-wide uppercase text-center">Portofolio Interior</span>
                <p class="text-xs text-slate-300/80 text-center mt-1.5 font-light">Desain interior mewah &amp; furniture kustom</p>
            </a>

            <!-- 2. Exterior Portfolio -->
            <a href="{{ route('projects.index', ['category' => 'Komersial']) }}" 
               class="group relative flex flex-col items-center justify-center p-8 rounded-2xl bg-[#C5A880] hover:bg-[#B4966B] text-[#0A1E13] transition-all duration-350 shadow-md hover:shadow-xl hover:-translate-y-1.5 border border-[#C5A880]/20 cursor-pointer overflow-hidden min-h-[200px]">
                <div class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <div class="w-16 h-16 mb-4 flex items-center justify-center text-4xl text-[#113F27] transition-transform duration-300 group-hover:scale-110">
                    <i class="fa-solid fa-house-chimney-window"></i>
                </div>
                <span class="text-base sm:text-lg font-bold tracking-wide uppercase text-center">Portofolio Eksterior</span>
                <p class="text-xs text-[#0A1E13]/70 text-center mt-1.5 font-light">Konstruksi fasad modern &amp; arsitektur</p>
            </a>

            <!-- 3. Civil Portfolio -->
            <a href="{{ route('projects.index', ['category' => 'Sipil']) }}" 
               class="group relative flex flex-col items-center justify-center p-8 rounded-2xl bg-[#113F27] hover:bg-[#0C2B1B] text-white transition-all duration-350 shadow-md hover:shadow-xl hover:-translate-y-1.5 border border-emerald-900 cursor-pointer overflow-hidden min-h-[200px]">
                <div class="absolute inset-0 bg-black/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <div class="w-16 h-16 mb-4 flex items-center justify-center text-4xl text-[#C5A880] transition-transform duration-300 group-hover:scale-110">
                    <i class="fa-solid fa-bridge"></i>
                </div>
                <span class="text-base sm:text-lg font-bold tracking-wide uppercase text-center">Portofolio Sipil</span>
                <p class="text-xs text-slate-300/80 text-center mt-1.5 font-light">Pekerjaan infrastruktur &amp; beton struktur</p>
            </a>

            <!-- 4. Layanan Kami -->
            <a href="{{ route('services') }}" 
               class="group relative flex flex-col items-center justify-center p-8 rounded-2xl bg-[#C5A880] hover:bg-[#B4966B] text-[#0A1E13] transition-all duration-350 shadow-md hover:shadow-xl hover:-translate-y-1.5 border border-[#C5A880]/20 cursor-pointer overflow-hidden min-h-[200px]">
                <div class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <div class="w-16 h-16 mb-4 flex items-center justify-center text-4xl text-[#113F27] transition-transform duration-300 group-hover:scale-110">
                    <i class="fa-solid fa-helmet-safety"></i>
                </div>
                <span class="text-base sm:text-lg font-bold tracking-wide uppercase text-center">Layanan Jasa</span>
                <p class="text-xs text-[#0A1E13]/70 text-center mt-1.5 font-light">Estimasi RAB, rancang desain, &amp; supervisi</p>
            </a>

            <!-- 5. Galeri Video Dokumentasi -->
            <a href="{{ route('video_gallery') }}" 
               class="group relative flex flex-col items-center justify-center p-8 rounded-2xl bg-[#113F27] hover:bg-[#0C2B1B] text-white transition-all duration-350 shadow-md hover:shadow-xl hover:-translate-y-1.5 border border-emerald-900 cursor-pointer overflow-hidden min-h-[200px]">
                <div class="absolute inset-0 bg-black/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <div class="w-16 h-16 mb-4 flex items-center justify-center text-4xl text-[#C5A880] transition-transform duration-300 group-hover:scale-110">
                    <i class="fa-solid fa-clapperboard"></i>
                </div>
                <span class="text-base sm:text-lg font-bold tracking-wide uppercase text-center">Dokumentasi Video</span>
                <p class="text-xs text-slate-300/80 text-center mt-1.5 font-light">Footage live progres pengerjaan di lapangan</p>
            </a>

            <!-- 6. Hubungi Kontak Kami -->
            <a href="{{ route('contact') }}" 
               class="group relative flex flex-col items-center justify-center p-8 rounded-2xl bg-[#C5A880] hover:bg-[#B4966B] text-[#0A1E13] transition-all duration-350 shadow-md hover:shadow-xl hover:-translate-y-1.5 border border-[#C5A880]/20 cursor-pointer overflow-hidden min-h-[200px]">
                <div class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <div class="w-16 h-16 mb-4 flex items-center justify-center text-4xl text-[#113F27] transition-transform duration-300 group-hover:scale-110">
                    <i class="fa-solid fa-phone-volume"></i>
                </div>
                <span class="text-base sm:text-lg font-bold tracking-wide uppercase text-center">Kontak &amp; Alamat</span>
                <p class="text-xs text-[#0A1E13]/70 text-center mt-1.5 font-light">Konsultasikan kebutuhan konstruksi Anda sekarang</p>
            </a>
        </div>
    </div>
</section>
