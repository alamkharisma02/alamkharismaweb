<!-- Simplified Homepage Contact / Social Media Connect Section -->
<section id="kontak" class="py-24 bg-[#0A1E13] text-white relative overflow-hidden border-t border-[#C5A880]/15">
    <!-- Ambient luxury background glow -->
    <div class="absolute -right-24 -top-24 w-96 h-96 bg-[#C5A880]/10 rounded-full blur-3xl z-0"></div>
    <div class="absolute -left-24 -bottom-24 w-96 h-96 bg-black/45 rounded-full blur-3xl z-0"></div>
    <div class="absolute inset-0 luxury-grid-pattern opacity-15 z-0"></div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-10 reveal-on-scroll">
        <!-- Title and description -->
        <div class="space-y-4">
            <span class="text-[#C5A880] text-sm font-bold tracking-widest uppercase block">Hubungi Kami</span>
            <h2 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight font-serif">Mari Terhubung di Media Sosial Kami</h2>
            <div class="w-20 h-[2px] bg-[#C5A880] mx-auto"></div>
            <p class="text-slate-300 text-sm sm:text-base leading-relaxed font-light max-w-2xl mx-auto">
                Ikuti akun resmi kami untuk melihat dokumentasi video pengerjaan proyek terbaru, tips desain tata ruang, dan info edukasi arsitektur terupdate setiap hari.
            </p>
        </div>

        <!-- Social Media Buttons -->
        <div class="flex flex-wrap items-center justify-center gap-6 pt-4">
            @if(\App\Models\Setting::get('social_facebook', 'https://facebook.com'))
                <a href="{{ \App\Models\Setting::get('social_facebook', 'https://facebook.com') }}" target="_blank" rel="noopener" 
                   class="flex items-center space-x-3 px-6 py-4 rounded-2xl bg-white/5 border border-white/10 hover:bg-[#C5A880] hover:text-[#0A1E13] hover:scale-105 hover:-translate-y-1 transition-all duration-350 shadow-xl group">
                    <i class="fa-brands fa-facebook-f text-xl text-[#C5A880] group-hover:text-[#0A1E13] transition-colors duration-300"></i>
                    <span class="text-xs sm:text-sm font-bold uppercase tracking-wider">Facebook</span>
                </a>
            @endif

            @if(\App\Models\Setting::get('social_instagram', 'https://instagram.com'))
                <a href="{{ \App\Models\Setting::get('social_instagram', 'https://instagram.com') }}" target="_blank" rel="noopener" 
                   class="flex items-center space-x-3 px-6 py-4 rounded-2xl bg-white/5 border border-white/10 hover:bg-[#C5A880] hover:text-[#0A1E13] hover:scale-105 hover:-translate-y-1 transition-all duration-350 shadow-xl group">
                    <i class="fa-brands fa-instagram text-xl text-[#C5A880] group-hover:text-[#0A1E13] transition-colors duration-300"></i>
                    <span class="text-xs sm:text-sm font-bold uppercase tracking-wider">Instagram</span>
                </a>
            @endif

            @if(\App\Models\Setting::get('social_tiktok', 'https://tiktok.com'))
                <a href="{{ \App\Models\Setting::get('social_tiktok', 'https://tiktok.com') }}" target="_blank" rel="noopener" 
                   class="flex items-center space-x-3 px-6 py-4 rounded-2xl bg-white/5 border border-white/10 hover:bg-[#C5A880] hover:text-[#0A1E13] hover:scale-105 hover:-translate-y-1 transition-all duration-350 shadow-xl group">
                    <i class="fa-brands fa-tiktok text-xl text-[#C5A880] group-hover:text-[#0A1E13] transition-colors duration-300"></i>
                    <span class="text-xs sm:text-sm font-bold uppercase tracking-wider">TikTok</span>
                </a>
            @endif

            @if(\App\Models\Setting::get('social_twitter', 'https://twitter.com'))
                <a href="{{ \App\Models\Setting::get('social_twitter', 'https://twitter.com') }}" target="_blank" rel="noopener" 
                   class="flex items-center space-x-3 px-6 py-4 rounded-2xl bg-white/5 border border-white/10 hover:bg-[#C5A880] hover:text-[#0A1E13] hover:scale-105 hover:-translate-y-1 transition-all duration-350 shadow-xl group">
                    <i class="fa-brands fa-x-twitter text-xl text-[#C5A880] group-hover:text-[#0A1E13] transition-colors duration-300"></i>
                    <span class="text-xs sm:text-sm font-bold uppercase tracking-wider">Twitter / X</span>
                </a>
            @endif

            @if(\App\Models\Setting::get('social_youtube', 'https://youtube.com'))
                <a href="{{ \App\Models\Setting::get('social_youtube', 'https://youtube.com') }}" target="_blank" rel="noopener" 
                   class="flex items-center space-x-3 px-6 py-4 rounded-2xl bg-white/5 border border-white/10 hover:bg-[#C5A880] hover:text-[#0A1E13] hover:scale-105 hover:-translate-y-1 transition-all duration-350 shadow-xl group">
                    <i class="fa-brands fa-youtube text-xl text-[#C5A880] group-hover:text-[#0A1E13] transition-colors duration-300"></i>
                    <span class="text-xs sm:text-sm font-bold uppercase tracking-wider">YouTube</span>
                </a>
            @endif
        </div>

        <!-- Call To Actions -->
        <div class="pt-8 flex flex-col sm:flex-row items-center justify-center gap-5 max-w-lg mx-auto">
            <a href="{{ route('contact') }}"
               class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 bg-transparent border border-[#C5A880] text-[#C5A880] hover:bg-[#C5A880]/10 font-bold text-xs rounded-xl transition-all duration-300 uppercase tracking-wider">
                <i class="fa-solid fa-map-location-dot text-base mr-2"></i> Info Lengkap Kontak
            </a>
            
            <a href="https://api.whatsapp.com/send?phone={{ \App\Models\Setting::get('contact_whatsapp', '628123456789') }}&text=Halo%20{{ urlencode(\App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara')) }}%2C%20saya%20tertarik%20dengan%20layanan%20Anda.%20Bisa%20berdiskusi%20lebih%20lanjut%3F"
               target="_blank"
               class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-[#C5A880] to-[#B4966B] hover:from-[#B4966B] hover:to-[#A3855A] text-[#0A1E13] font-bold text-xs rounded-xl hover:shadow-lg hover:shadow-[#C5A880]/20 hover:scale-105 active:scale-95 transition-all duration-300 uppercase tracking-wider">
                <i class="fa-brands fa-whatsapp text-base mr-2"></i> Chat Via WhatsApp
            </a>
        </div>
    </div>
</section>
