<!-- Dedicated Contact Section -->
<section id="kontak" class="py-24 bg-[#0A1E13] text-white relative overflow-hidden border-t border-[#C5A880]/15">
    <!-- Ambient luxury background glow -->
    <div class="absolute -right-24 -top-24 w-96 h-96 bg-[#C5A880]/10 rounded-full blur-3xl z-0"></div>
    <div class="absolute -left-24 -bottom-24 w-96 h-96 bg-black/45 rounded-full blur-3xl z-0"></div>
    <div class="absolute inset-0 luxury-grid-pattern opacity-15 z-0"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            
            <!-- Left: Contact Information Cards -->
            <div class="lg:col-span-5 space-y-6 reveal-on-scroll">
                <div>
                    <span class="text-[#C5A880] text-sm font-bold tracking-widest uppercase block">Hubungi Kami</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight font-serif mt-2">Mari Berdiskusi Mengenai Proyek Anda</h2>
                    <div class="w-20 h-[2px] bg-[#C5A880] mt-3"></div>
                    <p class="text-slate-300 text-sm sm:text-base leading-relaxed font-light mt-4">
                        Tim ahli kami siap melayani kebutuhan desain interior mewah, pengerjaan fasad eksterior, maupun pembangunan konstruksi sipil skala kecil hingga besar.
                    </p>
                </div>

                <div class="space-y-4">
                    <!-- Alamat Card -->
                    <div class="p-5 rounded-2xl border border-[#C5A880]/20 bg-black/20 shadow-xl flex items-start space-x-4 hover:border-[#C5A880]/40 transition-colors duration-350">
                        <div class="w-10 h-10 rounded-xl bg-[#C5A880]/10 text-[#C5A880] flex items-center justify-center font-bold flex-shrink-0 text-lg border border-[#C5A880]/20"><i class="fa-solid fa-map-location-dot"></i></div>
                        <div class="flex-1">
                            <span class="text-[10px] text-[#C5A880] font-bold uppercase tracking-wider block">Alamat Kantor</span>
                            <span class="text-slate-200 font-semibold text-xs sm:text-sm block mt-1 leading-relaxed">{{ \App\Models\Setting::get('contact_address', 'Kharisma Plaza Lt. 3, Jl. Kebon Jeruk No. 45, Jakarta Barat') }}</span>
                        </div>
                    </div>

                    <!-- Telepon Card -->
                    <div class="p-5 rounded-2xl border border-[#C5A880]/20 bg-black/20 shadow-xl flex items-start space-x-4 hover:border-[#C5A880]/40 transition-colors duration-350">
                        <div class="w-10 h-10 rounded-xl bg-[#C5A880]/10 text-[#C5A880] flex items-center justify-center font-bold flex-shrink-0 text-lg border border-[#C5A880]/20"><i class="fa-solid fa-phone"></i></div>
                        <div class="flex-1">
                            <span class="text-[10px] text-[#C5A880] font-bold uppercase tracking-wider block">Telepon Kantor</span>
                            <span class="text-slate-200 font-semibold text-xs sm:text-sm block mt-1 leading-relaxed">{{ \App\Models\Setting::get('contact_phone', '+62 21-8889-9900') }}</span>
                        </div>
                    </div>

                    <!-- Email Card -->
                    <div class="p-5 rounded-2xl border border-[#C5A880]/20 bg-black/20 shadow-xl flex items-start space-x-4 hover:border-[#C5A880]/40 transition-colors duration-350">
                        <div class="w-10 h-10 rounded-xl bg-[#C5A880]/10 text-[#C5A880] flex items-center justify-center font-bold flex-shrink-0 text-lg border border-[#C5A880]/20"><i class="fa-solid fa-envelope"></i></div>
                        <div class="flex-1">
                            <span class="text-[10px] text-[#C5A880] font-bold uppercase tracking-wider block">Alamat Email</span>
                            <span class="text-slate-200 font-semibold text-xs sm:text-sm block mt-1 leading-relaxed">{{ \App\Models\Setting::get('contact_email', 'info@alamkharisma.co.id') }}</span>
                        </div>
                    </div>

                    <!-- Legalitas Card -->
                    <div class="p-5 rounded-2xl border border-[#C5A880]/20 bg-black/20 shadow-xl flex items-start space-x-4 hover:border-[#C5A880]/40 transition-colors duration-350">
                        <div class="w-10 h-10 rounded-xl bg-[#C5A880]/10 text-[#C5A880] flex items-center justify-center font-bold flex-shrink-0 text-lg border border-[#C5A880]/20"><i class="fa-solid fa-scale-balanced"></i></div>
                        <div class="flex-1">
                            <span class="text-[10px] text-[#C5A880] font-bold uppercase tracking-wider block">Legalitas Perusahaan</span>
                            <span class="text-slate-350 text-slate-300 text-xs block mt-1 leading-relaxed">
                                NIB: <span class="font-mono font-bold text-white">{{ \App\Models\Setting::get('legal_nib', '1234567890123') }}</span> | 
                                SIUJK: <span class="font-mono font-bold text-white">{{ \App\Models\Setting::get('legal_siujk', '912/SIUJK/2024') }}</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Map Embed & Call-to-Action Card -->
            <div class="lg:col-span-7 space-y-6 reveal-on-scroll delay-100">
                <div class="bg-black/25 rounded-[2rem] border border-[#C5A880]/20 p-5 shadow-2xl space-y-5 backdrop-blur-md">
                    <span class="text-[10px] text-[#C5A880] font-bold uppercase tracking-wider block px-2">Lokasi Operasional Kantor</span>
                    <!-- Google Maps Frame -->
                    <div class="w-full h-80 rounded-2xl overflow-hidden border border-[#C5A880]/30 bg-slate-900 relative">
                        <iframe class="w-full h-full border-0 opacity-80 hover:opacity-100 transition-opacity duration-300"
                            src="{{ \App\Models\Setting::get('contact_map_iframe', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126920.24580211756!2d106.74609139169922!3d-6.19658253139369!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1406e40994f%3A0x600585154340a6b!2sJakarta%20Barat%2C%20Kota%20Jakarta%20Barat%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid') }}"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    
                    <div class="p-2 flex flex-col sm:flex-row items-center justify-between gap-5">
                        <div class="text-xs text-slate-400 text-center sm:text-left leading-normal font-light">
                            *Kami melayani konsultasi via Zoom/Google Meet dan kunjungan survei fisik secara gratis.
                        </div>
                        <a href="https://api.whatsapp.com/send?phone={{ \App\Models\Setting::get('contact_whatsapp', '628123456789') }}&text=Halo%20{{ urlencode(\App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara')) }}%2C%20saya%20tertarik%20dengan%2520layanan%20Anda.%20Bisa%20berdiskusi%20lebih%20lanjut%3F"
                           target="_blank"
                           class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3.5 bg-gradient-to-r from-[#C5A880] to-[#B4966B] hover:from-[#B4966B] hover:to-[#A3855A] text-[#0A1E13] font-bold text-xs rounded-xl hover:shadow-lg hover:shadow-[#C5A880]/20 transition-all duration-300 cursor-pointer uppercase tracking-wider">
                            <i class="fa-brands fa-whatsapp text-lg mr-2"></i> Hubungi via WhatsApp
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
