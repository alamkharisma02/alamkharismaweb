<!-- Key Advantages (Keunggulan) -->
<section class="py-24 bg-white text-slate-900 relative overflow-hidden border-t border-slate-200">
    <div class="absolute inset-0 opacity-5">
        <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=1920&h=1080&fit=crop" class="w-full h-full object-cover" alt="Background">
    </div>
    <div class="absolute -right-24 bottom-0 w-96 h-96 bg-brand-accent/5 rounded-full blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <!-- Left: Title -->
            <div class="lg:col-span-5 space-y-4">
                <span class="text-brand-accent text-sm font-bold tracking-widest uppercase">Mengapa Memilih Kami</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight leading-snug text-slate-900">
                    Keunggulan Utama Kami
                </h2>
                <p class="text-slate-600 text-base leading-relaxed">
                    Kami menggabungkan metode konstruksi berlisensi sipil dengan teknologi modern untuk memberikan hasil terbaik yang dapat Anda pertanggungjawabkan.
                </p>
                <div class="pt-4">
                    <a href="https://api.whatsapp.com/send?phone={{ \App\Models\Setting::get('contact_whatsapp', '628123456789') }}&text=Halo%20{{ urlencode(\App\Models\Setting::get('site_name')) }}%2C%20bisa%20saya%20melihat%20legalitas%20dan%20proposal%20jasa%20Anda%3F" 
                       target="_blank"
                       class="inline-flex items-center space-x-2 text-brand-accent font-bold hover:text-brand-accent transition-colors">
                        <span>Hubungi Tim Legal Kami</span>
                        <i class="fa-solid fa-circle-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Right: Accordion/Grid of values -->
            <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Value 1 -->
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200/80 shadow-sm space-y-3 hover:shadow-md transition-shadow">
                    <div class="w-10 h-10 rounded-lg bg-brand-accent/10 text-brand-accent flex items-center justify-center text-lg font-bold">
                        <i class="fa-solid fa-file-invoice-dollar"></i>
                    </div>
                    <h4 class="font-bold text-slate-900 text-lg">...</h4>
                    <p class="text-slate-500 text-sm">...</p>
                </div>

                <!-- Value 2 -->
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200/80 shadow-sm space-y-3 hover:shadow-md transition-shadow">
                    <div class="w-10 h-10 rounded-lg bg-brand-accent/10 text-brand-accent flex items-center justify-center text-lg font-bold">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <h4 class="font-bold text-slate-900 text-lg">...</h4>
                    <p class="text-slate-500 text-sm">...</p>
                </div>

                <!-- Value 3 -->
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200/80 shadow-sm space-y-3 hover:shadow-md transition-shadow">
                    <div class="w-10 h-10 rounded-lg bg-brand-accent/10 text-brand-accent flex items-center justify-center text-lg font-bold">
                        <i class="fa-solid fa-clock"></i>
                    </div>
                    <h4 class="font-bold text-slate-900 text-lg">...</h4>
                    <p class="text-slate-500 text-sm">...</p>
                </div>

                <!-- Value 4 -->
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200/80 shadow-sm space-y-3 hover:shadow-md transition-shadow">
                    <div class="w-10 h-10 rounded-lg bg-brand-accent/10 text-brand-accent flex items-center justify-center text-lg font-bold">
                        <i class="fa-solid fa-user-tie"></i>
                    </div>
                    <h4 class="font-bold text-slate-900 text-lg">...</h4>
                    <p class="text-slate-500 text-sm">...</p>
                </div>
            </div>
        </div>
    </div>
</section>
