<!-- Key Advantages (Keunggulan) -->
<section class="py-24 bg-[#F9F7F3] text-slate-900 relative overflow-hidden border-t border-[#C5A880]/10">
    <!-- Ambient luxury background glow -->
    <div class="absolute -right-24 bottom-0 w-96 h-96 bg-[#C5A880]/5 rounded-full blur-3xl"></div>
    <div class="absolute inset-0 luxury-grid-pattern opacity-10"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <!-- Left: Title -->
            <div class="lg:col-span-5 space-y-4 reveal-on-scroll">
                <span class="text-[#C5A880] text-sm font-bold tracking-widest uppercase block">Mengapa Memilih Kami</span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-tight text-[#0A1E13] font-serif">
                    Keunggulan Utama Kami
                </h2>
                <div class="w-20 h-[2px] bg-[#C5A880]"></div>
                <p class="text-slate-650 text-slate-600 text-sm sm:text-base leading-relaxed font-light mt-4">
                    Kami menggabungkan metode konstruksi berlisensi sipil dengan teknologi modern untuk memberikan hasil terbaik yang dapat Anda pertanggungjawabkan.
                </p>
                <div class="pt-4">
                    <a href="https://api.whatsapp.com/send?phone={{ \App\Models\Setting::get('contact_whatsapp', '628123456789') }}&text=Halo%20{{ urlencode(\App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara')) }}%2C%20bisa%20saya%20melihat%2520legalitas%20dan%20proposal%20jasa%20Anda%3F" 
                       target="_blank"
                       class="inline-flex items-center space-x-2 text-[#C5A880] font-bold hover:text-[#B4966B] transition-colors group">
                        <span class="text-sm uppercase tracking-wider">Hubungi Tim Legal Kami</span>
                        <i class="fa-solid fa-circle-arrow-right transition-transform group-hover:translate-x-1"></i>
                    </a>
                </div>
            </div>

            <!-- Right: Accordion/Grid of values -->
            <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Value 1 -->
                <div class="reveal-on-scroll p-6 rounded-3xl bg-white border border-[#C5A880]/20 shadow-sm space-y-4 hover:shadow-2xl hover:border-[#C5A880]/60 hover:-translate-y-1 transition-all duration-500 group">
                    <div class="w-12 h-12 rounded-2xl bg-[#C5A880]/10 text-[#C5A880] flex items-center justify-center text-xl font-bold group-hover:bg-[#C5A880] group-hover:text-[#0A1E13] transition-all duration-500 shadow-sm">
                        <i class="fa-solid fa-file-invoice-dollar"></i>
                    </div>
                    <h4 class="font-serif font-bold text-[#0A1E13] text-lg">RAB Transparan &amp; Terkunci</h4>
                    <p class="text-slate-650 text-slate-600 text-xs sm:text-sm font-light leading-relaxed">
                        Anggaran belanja dirinci per item pekerjaan dan dikunci pasca tanda tangan kontrak, bebas dari biaya siluman di tengah jalan.
                    </p>
                </div>

                <!-- Value 2 -->
                <div class="reveal-on-scroll delay-100 p-6 rounded-3xl bg-white border border-[#C5A880]/20 shadow-sm space-y-4 hover:shadow-2xl hover:border-[#C5A880]/60 hover:-translate-y-1 transition-all duration-500 group">
                    <div class="w-12 h-12 rounded-2xl bg-[#C5A880]/10 text-[#C5A880] flex items-center justify-center text-xl font-bold group-hover:bg-[#C5A880] group-hover:text-[#0A1E13] transition-all duration-500 shadow-sm">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <h4 class="font-serif font-bold text-[#0A1E13] text-lg">Legalitas &amp; Garansi Resmi</h4>
                    <p class="text-slate-650 text-slate-600 text-xs sm:text-sm font-light leading-relaxed">
                        Berbadan hukum PT resmi dengan NIB dan SIUJK lengkap. Memberikan jaminan garansi pemeliharaan tertulis selama 3-6 bulan pasca handover.
                    </p>
                </div>

                <!-- Value 3 -->
                <div class="reveal-on-scroll delay-200 p-6 rounded-3xl bg-white border border-[#C5A880]/20 shadow-sm space-y-4 hover:shadow-2xl hover:border-[#C5A880]/60 hover:-translate-y-1 transition-all duration-500 group">
                    <div class="w-12 h-12 rounded-2xl bg-[#C5A880]/10 text-[#C5A880] flex items-center justify-center text-xl font-bold group-hover:bg-[#C5A880] group-hover:text-[#0A1E13] transition-all duration-500 shadow-sm">
                        <i class="fa-solid fa-clock"></i>
                    </div>
                    <h4 class="font-serif font-bold text-[#0A1E13] text-lg">Ketepatan Waktu (Kurva S)</h4>
                    <p class="text-slate-650 text-slate-600 text-xs sm:text-sm font-light leading-relaxed">
                        Manajemen proyek profesional dengan monitoring Kurva S harian agar durasi pengerjaan selesai sesuai timeline kesepakatan.
                    </p>
                </div>

                <!-- Value 4 -->
                <div class="reveal-on-scroll delay-300 p-6 rounded-3xl bg-white border border-[#C5A880]/20 shadow-sm space-y-4 hover:shadow-2xl hover:border-[#C5A880]/60 hover:-translate-y-1 transition-all duration-500 group">
                    <div class="w-12 h-12 rounded-2xl bg-[#C5A880]/10 text-[#C5A880] flex items-center justify-center text-xl font-bold group-hover:bg-[#C5A880] group-hover:text-[#0A1E13] transition-all duration-500 shadow-sm">
                        <i class="fa-solid fa-user-tie"></i>
                    </div>
                    <h4 class="font-serif font-bold text-[#0A1E13] text-lg">Tim Sipil &amp; Arsitek Ahli</h4>
                    <p class="text-slate-650 text-slate-600 text-xs sm:text-sm font-light leading-relaxed">
                        Pengawasan ketat harian dipimpin langsung oleh Project Manager dan Site Engineer berlisensi teknik sipil bersertifikasi resmi.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
