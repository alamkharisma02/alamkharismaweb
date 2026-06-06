<!-- PLN-Inspired Cinematic Image Banner Section -->
<section class="relative h-[50vh] sm:h-[60vh] bg-[#0A1E13] overflow-hidden flex items-center justify-center"
         x-data="{ visible: false }"
         x-intersect:enter.half="visible = true">
    <!-- Parallax Background Image -->
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?w=1920&h=1080&fit=crop" 
             class="w-full h-full object-cover scale-110 transition-transform duration-[3s]"
             :class="visible ? 'scale-100' : 'scale-110'"
             alt="Proyek Konstruksi Besar">
    </div>
    
    <!-- Cinematic Dark Overlays -->
    <div class="absolute inset-0 bg-gradient-to-r from-[#0A1E13]/90 via-[#0A1E13]/60 to-[#0A1E13]/40"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-[#0A1E13]/80 via-transparent to-[#0A1E13]/30"></div>
    
    <!-- Content -->
    <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="space-y-5"
             :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
             style="transition: opacity 1.2s cubic-bezier(0.16, 1, 0.3, 1), transform 1.2s cubic-bezier(0.16, 1, 0.3, 1);">
            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold bg-white/10 text-[#C5A880] border border-[#C5A880]/30 uppercase tracking-widest backdrop-blur-sm">
                <i class="fa-solid fa-gem mr-2"></i> Komitmen Kualitas
            </span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight font-serif leading-tight">
                Membangun dengan <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#C5A880] via-[#E2D2BC] to-[#B4966B] italic">Presisi</span><br class="hidden sm:block">
                Menghasilkan <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#C5A880] via-[#E2D2BC] to-[#B4966B] italic">Kebanggaan</span>
            </h2>
            <p class="text-slate-300/80 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed font-light">
                Setiap proyek yang kami tangani dibangun dengan standar teknik sipil tertinggi, material pilihan berkualitas premium, dan pengawasan ketat dari tim engineer bersertifikat.
            </p>
        </div>
    </div>
    
    <!-- Decorative corner accents -->
    <div class="absolute top-6 left-6 w-16 h-16 border-t-2 border-l-2 border-[#C5A880]/30 rounded-tl-lg z-10"></div>
    <div class="absolute bottom-6 right-6 w-16 h-16 border-b-2 border-r-2 border-[#C5A880]/30 rounded-br-lg z-10"></div>
</section>
