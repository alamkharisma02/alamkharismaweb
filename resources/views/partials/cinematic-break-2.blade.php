<!-- PLN-Inspired Cinematic Image Banner 2 - Interior Focus -->
<section class="relative h-[50vh] sm:h-[60vh] bg-[#0A1E13] overflow-hidden flex items-center justify-center"
         x-data="{ visible: false }"
         x-intersect:enter.half="visible = true">
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=1920&h=1080&fit=crop" 
             class="w-full h-full object-cover scale-110 transition-transform duration-[3s]"
             :class="visible ? 'scale-100' : 'scale-110'"
             alt="Interior Mewah Premium">
    </div>
    
    <!-- Cinematic Overlays -->
    <div class="absolute inset-0 bg-gradient-to-l from-[#0A1E13]/90 via-[#0A1E13]/60 to-[#0A1E13]/40"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-[#0A1E13]/30 via-transparent to-[#0A1E13]/80"></div>
    
    <!-- Content -->
    <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-xl ml-auto text-right"
             :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
             style="transition: opacity 1.2s cubic-bezier(0.16, 1, 0.3, 1) 0.2s, transform 1.2s cubic-bezier(0.16, 1, 0.3, 1) 0.2s;">
            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold bg-white/10 text-[#C5A880] border border-[#C5A880]/30 uppercase tracking-widest backdrop-blur-sm">
                <i class="fa-solid fa-star mr-2"></i> Interior & Eksterior
            </span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight font-serif leading-tight mt-4">
                Ruang yang <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#C5A880] via-[#E2D2BC] to-[#B4966B] italic">Menginspirasi</span>
            </h2>
            <p class="text-slate-300/80 text-sm sm:text-base leading-relaxed font-light mt-4">
                Interior mewah dan eksterior modern yang dirancang untuk mencerminkan gaya hidup berkelas. Setiap elemen dipilih dengan cermat untuk menghadirkan harmoni estetika dan fungsionalitas.
            </p>
            <a href="{{ route('gallery') }}" 
               class="inline-flex items-center mt-6 px-6 py-3 rounded-xl bg-white/10 text-white font-bold text-sm hover:bg-[#C5A880]/20 border border-white/20 hover:border-[#C5A880]/50 transition-all duration-300 backdrop-blur-sm tracking-wider uppercase">
                <i class="fa-solid fa-images mr-2 text-[#C5A880]"></i>
                Lihat Gallery
            </a>
        </div>
    </div>
    
    <!-- Decorative corner accents -->
    <div class="absolute top-6 right-6 w-16 h-16 border-t-2 border-r-2 border-[#C5A880]/30 rounded-tr-lg z-10"></div>
    <div class="absolute bottom-6 left-6 w-16 h-16 border-b-2 border-l-2 border-[#C5A880]/30 rounded-bl-lg z-10"></div>
</section>
