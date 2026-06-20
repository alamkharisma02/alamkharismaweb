<!-- Useful Links Section (Waskita-Inspired Quick Access Portfolio & Services) -->
<section class="py-16 bg-white border-b border-slate-150 relative overflow-hidden">
    <!-- Subtle Ambient Decoration -->
    <div class="absolute -right-24 top-1/2 -translate-y-1/2 w-96 h-96 bg-[#C5A880]/5 rounded-full blur-3xl z-0 pointer-events-none"></div>
    <div class="absolute -left-24 top-0 w-80 h-80 bg-[#113F27]/5 rounded-full blur-3xl z-0 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Section Title -->
        <div class="text-center space-y-3 mb-12">
            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-[10px] font-bold bg-[#113F27]/10 text-[#113F27] border border-[#113F27]/20 uppercase tracking-[0.2em]">
                <i class="fa-solid fa-link mr-1.5"></i> Useful Links
            </span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#0A1E13] tracking-tight font-serif">
                Akses Cepat Portofolio &amp; Layanan
            </h2>
            <div class="w-16 h-[2px] bg-[#C5A880] mx-auto mt-2"></div>
        </div>

        <!-- 3x2 Responsive Button Grid (Waskita-Inspired Solid Colors with White Text) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-5xl mx-auto">
            <!-- 1. Interior Portfolio -->
            <a href="{{ route('projects.index', ['category' => 'Interior']) }}" 
               class="group relative flex flex-col items-center justify-center p-8 rounded-2xl bg-[#113F27] hover:bg-[#0C2B1B] text-white transition-all duration-300 shadow-md hover:shadow-xl hover:-translate-y-1 border border-emerald-950/20 cursor-pointer overflow-hidden min-h-[180px]">
                <div class="absolute inset-0 bg-black/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <div class="w-16 h-16 mb-3 flex items-center justify-center text-4xl text-white transition-transform duration-300 group-hover:scale-110">
                    <i class="fa-solid fa-couch"></i>
                </div>
                <span class="text-base sm:text-lg font-bold tracking-wide uppercase text-center drop-shadow-sm">Portofolio Interior</span>
            </a>

            <!-- 2. Exterior Portfolio -->
            <a href="{{ route('projects.index', ['category' => 'Eksterior']) }}" 
               class="group relative flex flex-col items-center justify-center p-8 rounded-2xl bg-[#7A6344] hover:bg-[#685235] text-white transition-all duration-300 shadow-md hover:shadow-xl hover:-translate-y-1 border border-amber-950/20 cursor-pointer overflow-hidden min-h-[180px]">
                <div class="absolute inset-0 bg-black/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <div class="w-16 h-16 mb-3 flex items-center justify-center text-4xl text-white transition-transform duration-300 group-hover:scale-110">
                    <i class="fa-solid fa-house-chimney-window"></i>
                </div>
                <span class="text-base sm:text-lg font-bold tracking-wide uppercase text-center drop-shadow-sm">Portofolio Eksterior</span>
            </a>

            <!-- 3. Civil Portfolio -->
            <a href="{{ route('projects.index', ['category' => 'Sipil']) }}" 
               class="group relative flex flex-col items-center justify-center p-8 rounded-2xl bg-[#113F27] hover:bg-[#0C2B1B] text-white transition-all duration-300 shadow-md hover:shadow-xl hover:-translate-y-1 border border-emerald-950/20 cursor-pointer overflow-hidden min-h-[180px]">
                <div class="absolute inset-0 bg-black/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <div class="w-16 h-16 mb-3 flex items-center justify-center text-4xl text-white transition-transform duration-300 group-hover:scale-110">
                    <i class="fa-solid fa-bridge"></i>
                </div>
                <span class="text-base sm:text-lg font-bold tracking-wide uppercase text-center drop-shadow-sm">Portofolio Sipil</span>
            </a>

            <!-- 4. Layanan Kami -->
            <a href="{{ route('services') }}" 
               class="group relative flex flex-col items-center justify-center p-8 rounded-2xl bg-[#7A6344] hover:bg-[#685235] text-white transition-all duration-300 shadow-md hover:shadow-xl hover:-translate-y-1 border border-amber-950/20 cursor-pointer overflow-hidden min-h-[180px]">
                <div class="absolute inset-0 bg-black/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <div class="w-16 h-16 mb-3 flex items-center justify-center text-4xl text-white transition-transform duration-300 group-hover:scale-110">
                    <i class="fa-solid fa-helmet-safety"></i>
                </div>
                <span class="text-base sm:text-lg font-bold tracking-wide uppercase text-center drop-shadow-sm">Layanan Jasa</span>
            </a>

            <!-- 5. Galeri Video Dokumentasi -->
            <a href="{{ route('video_gallery') }}" 
               class="group relative flex flex-col items-center justify-center p-8 rounded-2xl bg-[#113F27] hover:bg-[#0C2B1B] text-white transition-all duration-300 shadow-md hover:shadow-xl hover:-translate-y-1 border border-emerald-950/20 cursor-pointer overflow-hidden min-h-[180px]">
                <div class="absolute inset-0 bg-black/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <div class="w-16 h-16 mb-3 flex items-center justify-center text-4xl text-white transition-transform duration-300 group-hover:scale-110">
                    <i class="fa-solid fa-clapperboard"></i>
                </div>
                <span class="text-base sm:text-lg font-bold tracking-wide uppercase text-center drop-shadow-sm">Dokumentasi Video</span>
            </a>

            <!-- 6. Hubungi Kontak Kami -->
            <a href="{{ route('contact') }}" 
               class="group relative flex flex-col items-center justify-center p-8 rounded-2xl bg-[#7A6344] hover:bg-[#685235] text-white transition-all duration-300 shadow-md hover:shadow-xl hover:-translate-y-1 border border-amber-950/20 cursor-pointer overflow-hidden min-h-[180px]">
                <div class="absolute inset-0 bg-black/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <div class="w-16 h-16 mb-3 flex items-center justify-center text-4xl text-white transition-transform duration-300 group-hover:scale-110">
                    <i class="fa-solid fa-phone-volume"></i>
                </div>
                <span class="text-base sm:text-lg font-bold tracking-wide uppercase text-center drop-shadow-sm">Kontak &amp; Alamat</span>
            </a>
        </div>
    </div>
</section>
