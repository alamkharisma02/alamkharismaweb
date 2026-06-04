<!-- Dedicated Contact Section -->
<section id="kontak" class="py-20 bg-slate-50 text-slate-900 border-t border-slate-200 relative overflow-hidden">
    <div class="absolute right-0 top-0 w-80 h-80 bg-brand-accent/5 rounded-full blur-3xl"></div>
    <div class="absolute left-0 bottom-0 w-80 h-80 bg-blue-500/5 rounded-full blur-3xl"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            
            <!-- Left: Contact Information Cards -->
            <div class="lg:col-span-5 space-y-6">
                <div>
                    <span class="text-brand-accent text-sm font-bold tracking-widest uppercase">Hubungi Kami</span>
                    <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight mt-1">Mari Berdiskusi Mengenai Proyek Anda</h2>
                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed mt-3">
                        Tim ahli kami siap melayani kebutuhan desain interior mewah, pengerjaan fasad eksterior, maupun pembangunan konstruksi sipil skala kecil hingga besar.
                    </p>
                </div>

                <div class="space-y-4">
                    <!-- Alamat Card -->
                    <div class="p-4 rounded-xl border border-slate-200 bg-white shadow-sm flex items-start space-x-3.5">
                        <div class="w-9 h-9 rounded-lg bg-brand-accent/10 text-brand-primary flex items-center justify-center font-bold flex-shrink-0 text-base"><i class="fa-solid fa-map-location-dot"></i></div>
                        <div class="flex-1">
                            <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider block">Alamat Kantor</span>
                            <span class="text-slate-900 font-semibold text-xs sm:text-sm block mt-0.5 leading-relaxed">{{ \App\Models\Setting::get('contact_address') }}</span>
                        </div>
                    </div>

                    <!-- Telepon Card -->
                    <div class="p-4 rounded-xl border border-slate-200 bg-white shadow-sm flex items-start space-x-3.5">
                        <div class="w-9 h-9 rounded-lg bg-emerald-500/10 text-emerald-700 flex items-center justify-center font-bold flex-shrink-0 text-base"><i class="fa-solid fa-phone"></i></div>
                        <div class="flex-1">
                            <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider block">Telepon Kantor</span>
                            <span class="text-slate-900 font-semibold text-xs sm:text-sm block mt-0.5">{{ \App\Models\Setting::get('contact_phone') }}</span>
                        </div>
                    </div>

                    <!-- Email Card -->
                    <div class="p-4 rounded-xl border border-slate-200 bg-white shadow-sm flex items-start space-x-3.5">
                        <div class="w-9 h-9 rounded-lg bg-blue-500/10 text-blue-700 flex items-center justify-center font-bold flex-shrink-0 text-base"><i class="fa-solid fa-envelope"></i></div>
                        <div class="flex-1">
                            <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider block">Alamat Email</span>
                            <span class="text-slate-900 font-semibold text-xs sm:text-sm block mt-0.5">{{ \App\Models\Setting::get('contact_email') }}</span>
                        </div>
                    </div>

                    <!-- Legalitas Card -->
                    <div class="p-4 rounded-xl border border-slate-200 bg-white shadow-sm flex items-start space-x-3.5">
                        <div class="w-9 h-9 rounded-lg bg-indigo-500/10 text-indigo-700 flex items-center justify-center font-bold flex-shrink-0 text-base"><i class="fa-solid fa-scale-balanced"></i></div>
                        <div class="flex-1">
                            <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider block">Legalitas Perusahaan</span>
                            <span class="text-slate-600 text-xs block mt-0.5 leading-relaxed">
                                NIB: <span class="font-mono font-bold text-slate-900">{{ \App\Models\Setting::get('legal_nib') }}</span> | 
                                SIUJK: <span class="font-mono font-bold text-slate-900">{{ \App\Models\Setting::get('legal_siujk') }}</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Map Embed & Call-to-Action Card -->
            <div class="lg:col-span-7 space-y-6">
                <div class="bg-white rounded-3xl border border-slate-200 p-4 shadow-md space-y-4">
                    <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider block px-2">Lokasi Operasional Kantor</span>
                    <!-- Google Maps Frame -->
                    <div class="w-full h-80 rounded-2xl overflow-hidden border border-slate-100 bg-slate-100 relative">
                        <iframe class="w-full h-full border-0 grayscale opacity-85 hover:grayscale-0 hover:opacity-100 transition-all duration-300"
                            src="{{ \App\Models\Setting::get('contact_map_iframe', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126920.24580211756!2d106.74609139169922!3d-6.19658253139369!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1406e40994f%3A0x600585154340a6b!2sJakarta%20Barat%2C%20Kota%20Jakarta%20Barat%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid') }}"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    
                    <div class="p-2 flex flex-col sm:flex-row items-center justify-between gap-4">
                        <div class="text-xs text-slate-500 text-center sm:text-left leading-normal">
                            *Kami melayani konsultasi via Zoom/Google Meet dan kunjungan survei fisik secara gratis.
                        </div>
                        <a href="https://api.whatsapp.com/send?phone={{ \App\Models\Setting::get('contact_whatsapp', '628123456789') }}&text=Halo%20{{ urlencode(\App\Models\Setting::get('site_name')) }}%2C%20saya%20ingin%20berkonsultasi%20mengenai%20kebutuhan%20jasa%20saya."
                           target="_blank"
                           class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 bg-slate-950 text-white font-extrabold text-xs rounded-xl hover:bg-slate-900 transition-all shadow-md cursor-pointer">
                            <i class="fa-brands fa-whatsapp text-emerald-400 mr-2 text-base"></i> Hubungi Langsung WhatsApp
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
