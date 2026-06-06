@extends('layouts.app')

@section('title', 'Layanan Kami - ' . \App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara'))
@section('meta_description', 'Jelajahi detail layanan konstruksi sipil, interior mewah, fasad eksterior, dan RAB transparan dari ' . \App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara') . '.')

@section('content')
    <!-- Banner Space Filler -->
    <div class="h-20 bg-[#0A1E13]"></div>

    <!-- Banner Header -->
    <section class="relative bg-gradient-to-b from-[#0A1E13] via-[#050F09] to-[#0A1E13] py-24 border-b border-[#C5A880]/10 overflow-hidden text-center">
        <!-- Background subtle glow shapes -->
        <div class="absolute right-0 top-0 w-96 h-96 bg-[#C5A880]/8 rounded-full blur-3xl -mr-20 -mt-20 text-white"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-emerald-500/5 rounded-full blur-3xl -ml-20 -mb-20"></div>
        <div class="absolute inset-0 luxury-grid-pattern opacity-10"></div>
        
        <!-- Watermark background -->
        <div class="absolute inset-0 z-0 opacity-[0.03] pointer-events-none mix-blend-overlay">
            <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?w=1920&h=1080&fit=crop" class="w-full h-full object-cover" alt="Watermark bg">
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10 space-y-4 reveal-on-scroll">
            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold bg-[#C5A880]/15 text-[#C5A880] border border-[#C5A880]/30 uppercase tracking-widest animate-pulse-gold">
                <i class="fa-solid fa-gears mr-1.5"></i> Layanan Kami
            </span>
            <h1 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight leading-tight font-serif">
                Layanan Konstruksi & Interior Mewah
            </h1>
            <div class="w-20 h-[2px] bg-[#C5A880] mx-auto mt-4"></div>
            <p class="text-slate-300 max-w-2xl mx-auto text-sm sm:text-base leading-relaxed font-light mt-4 font-sans">
                PT Alam Kharisma Bersaudara menyediakan solusi kontraktor bangunan, pengerjaan interior mewah, dan rekayasa sipil berstandar mutu teratas.
            </p>
        </div>
    </section>

    <!-- Services Details Section -->
    <section class="py-24 bg-[#0A1E13] relative overflow-hidden">
        <!-- Decorative Glow -->
        <div class="absolute left-1/2 top-1/4 w-[500px] h-[500px] bg-[#C5A880]/5 rounded-full blur-[120px] -translate-x-1/2"></div>
        <div class="absolute inset-0 luxury-grid-pattern opacity-5"></div>
        
        <!-- Watermark background -->
        <div class="absolute inset-0 z-0 opacity-[0.03] pointer-events-none mix-blend-overlay">
            <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=1920&h=1080&fit=crop" class="w-full h-full object-cover" alt="Watermark bg">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-28 relative z-10">
            
            <!-- Service 1: Interior Design -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center reveal-on-scroll">
                <div class="lg:col-span-7 space-y-6">
                    <span class="text-[#C5A880] text-sm font-bold uppercase tracking-widest block font-sans"><i class="fa-solid fa-couch mr-2"></i> Divisi Interior</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-white leading-tight font-serif">
                        Interior Design & Custom Fit-Out
                    </h2>
                    <p class="text-slate-300 text-sm sm:text-base leading-relaxed font-light text-justify font-sans">
                        Kami menghadirkan keindahan visual dan kenyamanan fungsional di dalam properti Anda. Tim kami melayani perancangan tata ruang 3D realistis berkelas tinggi, produksi furniture kustom presisi (fit-out) dari workshop mandiri, pengerjaan wall paneling dekoratif, drop ceiling dinamis, hingga pemilihan perabot berkualitas tinggi.
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2 font-sans text-xs sm:text-sm text-slate-300">
                        <div class="flex items-center"><i class="fa-solid fa-circle-check text-[#C5A880] mr-2.5"></i> Custom Kitchen Set Mewah</div>
                        <div class="flex items-center"><i class="fa-solid fa-circle-check text-[#C5A880] mr-2.5"></i> Plafon Drop-Ceiling Modern</div>
                        <div class="flex items-center"><i class="fa-solid fa-circle-check text-[#C5A880] mr-2.5"></i> Wardrobe & Cabinet Terintegrasi</div>
                        <div class="flex items-center"><i class="fa-solid fa-circle-check text-[#C5A880] mr-2.5"></i> Desain Visual 3D Realistis</div>
                    </div>
                </div>
                <div class="lg:col-span-5">
                    <div class="rounded-3xl overflow-hidden shadow-2xl border border-white/10 relative group bg-black">
                        <img src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?w=800&h=600&fit=crop" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" 
                             alt="Interior Design">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    </div>
                </div>
            </div>

            <!-- Service 2: Exterior Fasad -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center reveal-on-scroll">
                <div class="lg:col-span-5 order-last lg:order-first">
                    <div class="rounded-3xl overflow-hidden shadow-2xl border border-white/10 relative group bg-black">
                        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800&h=600&fit=crop" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" 
                             alt="Exterior Facade">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    </div>
                </div>
                <div class="lg:col-span-7 space-y-6">
                    <span class="text-[#C5A880] text-sm font-bold uppercase tracking-widest block font-sans"><i class="fa-solid fa-hotel mr-2"></i> Divisi Eksterior</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-white leading-tight font-serif">
                        Eksterior Fasad & Penataan Lanskap
                    </h2>
                    <p class="text-slate-300 text-sm sm:text-base leading-relaxed font-light text-justify font-sans">
                        Fasad adalah identitas terdepan bangunan Anda. Kami merancang kulit luar bangunan (cladding) menggunakan material tangguh cuaca seperti Aluminium Composite Panel (ACP), struktur kaca curtain wall mewah, carport beton berpola, kanopi estetis dengan rangka besi kokoh, serta taman hijau lanskap minimalis yang mempercantik suasana lingkungan sekitar.
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2 font-sans text-xs sm:text-sm text-slate-300">
                        <div class="flex items-center"><i class="fa-solid fa-circle-check text-[#C5A880] mr-2.5"></i> Fasad ACP Minimalis Modern</div>
                        <div class="flex items-center"><i class="fa-solid fa-circle-check text-[#C5A880] mr-2.5"></i> Kanopi Carport Tempa & Kaca</div>
                        <div class="flex items-center"><i class="fa-solid fa-circle-check text-[#C5A880] mr-2.5"></i> Batu Alam & Cladding Elegan</div>
                        <div class="flex items-center"><i class="fa-solid fa-circle-check text-[#C5A880] mr-2.5"></i> Lanskap Taman Hijau Asri</div>
                    </div>
                </div>
            </div>

            <!-- Service 3: Konstruksi Sipil -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center reveal-on-scroll">
                <div class="lg:col-span-7 space-y-6">
                    <span class="text-[#C5A880] text-sm font-bold uppercase tracking-widest block font-sans"><i class="fa-solid fa-helmet-safety mr-2"></i> Divisi Sipil</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-white leading-tight font-serif">
                        Kontraktor Konstruksi Sipil & Jalan
                    </h2>
                    <p class="text-slate-300 text-sm sm:text-base leading-relaxed font-light text-justify font-sans">
                        Kami mengerjakan proyek infrastruktur fisik sipil umum dengan jaminan kekuatan struktural jangka panjang. Pelayanan kami mencakup pembangunan rumah mewah, villa eksklusif, gedung perkantoran bertingkat, gudang baja bentang lebar, perkerasan rigid jalan beton, pondasi bore pile berukuran besar, hingga dinding penahan tanah retaining wall kokoh.
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2 font-sans text-xs sm:text-sm text-slate-300">
                        <div class="flex items-center"><i class="fa-solid fa-circle-check text-[#C5A880] mr-2.5"></i> Struktur Beton Bertulang SNI</div>
                        <div class="flex items-center"><i class="fa-solid fa-circle-check text-[#C5A880] mr-2.5"></i> Pengecoran Rigid Jalan Beton</div>
                        <div class="flex items-center"><i class="fa-solid fa-circle-check text-[#C5A880] mr-2.5"></i> Gudang Struktur Baja Ringan/Berat</div>
                        <div class="flex items-center"><i class="fa-solid fa-circle-check text-[#C5A880] mr-2.5"></i> Pondasi Borepile & Cakar Ayam</div>
                    </div>
                </div>
                <div class="lg:col-span-5">
                    <div class="rounded-3xl overflow-hidden shadow-2xl border border-white/10 relative group bg-black">
                        <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&h=600&fit=crop" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" 
                             alt="Civil Construction">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Workflow / Our Process Section -->
    <section class="py-24 bg-[#050F09] relative overflow-hidden border-y border-[#C5A880]/10">
        <div class="absolute inset-0 luxury-grid-pattern opacity-10"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Header -->
            <div class="text-center max-w-3xl mx-auto space-y-3 mb-20 reveal-on-scroll">
                <span class="text-[#C5A880] text-sm font-bold tracking-widest uppercase block">Alur Kerja Kami</span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight font-serif">Proses Pelaksanaan Proyek</h2>
                <div class="w-16 h-[2px] bg-[#C5A880] mx-auto mt-3"></div>
                <p class="text-slate-400 text-sm sm:text-base leading-relaxed font-light mt-4 font-sans">
                    Kami mengadopsi standar alur kerja transparan untuk memastikan proyek berjalan tepat waktu, hemat anggaran, dan presisi.
                </p>
            </div>

            <!-- Workflow Timeline -->
            <div class="grid grid-cols-1 md:grid-cols-5 gap-8 font-sans">
                <!-- Step 1 -->
                <div class="text-center space-y-4 reveal-on-scroll relative group">
                    <div class="w-16 h-16 rounded-2xl bg-[#C5A880]/15 text-[#C5A880] border border-[#C5A880]/30 flex items-center justify-center text-xl mx-auto font-black shadow-lg shadow-[#C5A880]/5 group-hover:bg-[#C5A880] group-hover:text-[#0A1E13] transition-all duration-300">1</div>
                    <h4 class="font-bold text-white text-base font-serif">Konsultasi & Survei</h4>
                    <p class="text-xs text-slate-400 leading-relaxed font-light">Kunjungan lapangan survei gratis dan diskusi awal konsep tata ruang serta kebutuhan fisik bangunan.</p>
                </div>
                <!-- Step 2 -->
                <div class="text-center space-y-4 reveal-on-scroll delay-100 relative group">
                    <div class="w-16 h-16 rounded-2xl bg-[#C5A880]/15 text-[#C5A880] border border-[#C5A880]/30 flex items-center justify-center text-xl mx-auto font-black shadow-lg shadow-[#C5A880]/5 group-hover:bg-[#C5A880] group-hover:text-[#0A1E13] transition-all duration-300">2</div>
                    <h4 class="font-bold text-white text-base font-serif">Estimasi & RAB</h4>
                    <p class="text-xs text-slate-400 leading-relaxed font-light">Penyusunan Rencana Anggaran Biaya (RAB) yang terinci secara transparan tanpa manipulasi harga.</p>
                </div>
                <!-- Step 3 -->
                <div class="text-center space-y-4 reveal-on-scroll delay-200 relative group">
                    <div class="w-16 h-16 rounded-2xl bg-[#C5A880]/15 text-[#C5A880] border border-[#C5A880]/30 flex items-center justify-center text-xl mx-auto font-black shadow-lg shadow-[#C5A880]/5 group-hover:bg-[#C5A880] group-hover:text-[#0A1E13] transition-all duration-300">3</div>
                    <h4 class="font-bold text-white text-base font-serif">Desain 3D Realistis</h4>
                    <p class="text-xs text-slate-400 leading-relaxed font-light">Visualisasi gambar 3D interior & eksterior premium agar klien memiliki gambaran fisik sebelum pengerjaan.</p>
                </div>
                <!-- Step 4 -->
                <div class="text-center space-y-4 reveal-on-scroll delay-300 relative group">
                    <div class="w-16 h-16 rounded-2xl bg-[#C5A880]/15 text-[#C5A880] border border-[#C5A880]/30 flex items-center justify-center text-xl mx-auto font-black shadow-lg shadow-[#C5A880]/5 group-hover:bg-[#C5A880] group-hover:text-[#0A1E13] transition-all duration-300">4</div>
                    <h4 class="font-bold text-white text-base font-serif">Konstruksi Fisik</h4>
                    <p class="text-xs text-slate-400 leading-relaxed font-light">Eksekusi pembangunan fisik dipandu tim insinyur berlisensi dengan pengawasan mutu harian yang ketat.</p>
                </div>
                <!-- Step 5 -->
                <div class="text-center space-y-4 reveal-on-scroll delay-400 relative group">
                    <div class="w-16 h-16 rounded-2xl bg-[#C5A880]/15 text-[#C5A880] border border-[#C5A880]/30 flex items-center justify-center text-xl mx-auto font-black shadow-lg shadow-[#C5A880]/5 group-hover:bg-[#C5A880] group-hover:text-[#0A1E13] transition-all duration-300">5</div>
                    <h4 class="font-bold text-white text-base font-serif">Serah Terima & Garansi</h4>
                    <p class="text-xs text-slate-400 leading-relaxed font-light">Serah terima kunci bangunan bersama jaminan garansi pemeliharaan tertulis untuk kepuasan total.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us / Advantage Section -->
    <section class="py-24 bg-[#0A1E13] relative overflow-hidden">
        <div class="absolute inset-0 luxury-grid-pattern opacity-5"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16 relative z-10">
            <!-- Header -->
            <div class="text-center max-w-3xl mx-auto space-y-3 mb-16 reveal-on-scroll">
                <span class="text-[#C5A880] text-sm font-bold tracking-widest uppercase block">Keunggulan Kami</span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight font-serif">Mengapa Mempercayai Kami?</h2>
                <div class="w-16 h-[2px] bg-[#C5A880] mx-auto mt-3"></div>
            </div>

            <!-- Advantages Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 font-sans">
                <!-- Adv 1 -->
                <div class="reveal-on-scroll p-8 rounded-3xl border border-white/10 bg-white/5 backdrop-blur-md space-y-4 group hover:border-[#C5A880]/30 transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-[#C5A880]/15 text-[#C5A880] flex items-center justify-center text-lg shadow-lg"><i class="fa-solid fa-file-invoice-dollar"></i></div>
                    <h4 class="font-bold text-white text-lg font-serif">RAB Transparan 100%</h4>
                    <p class="text-xs sm:text-sm text-slate-400 leading-relaxed font-light">Semua rincian anggaran biaya material dan upah disusun terperinci tanpa ada biaya terselubung atau pembengkakan di tengah jalan.</p>
                </div>
                <!-- Adv 2 -->
                <div class="reveal-on-scroll delay-100 p-8 rounded-3xl border border-white/10 bg-white/5 backdrop-blur-md space-y-4 group hover:border-[#C5A880]/30 transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-[#C5A880]/15 text-[#C5A880] flex items-center justify-center text-lg shadow-lg"><i class="fa-solid fa-user-shield"></i></div>
                    <h4 class="font-bold text-white text-lg font-serif">Tim Insinyur Profesional</h4>
                    <p class="text-xs sm:text-sm text-slate-400 leading-relaxed font-light">Proyek Anda diawasi langsung setiap hari oleh arsitek dan site engineer sipil berlisensi demi menjaga presisi konstruksi.</p>
                </div>
                <!-- Adv 3 -->
                <div class="reveal-on-scroll delay-200 p-8 rounded-3xl border border-white/10 bg-white/5 backdrop-blur-md space-y-4 group hover:border-[#C5A880]/30 transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-[#C5A880]/15 text-[#C5A880] flex items-center justify-center text-lg shadow-lg"><i class="fa-solid fa-shield-halved"></i></div>
                    <h4 class="font-bold text-white text-lg font-serif">Garansi Kualitas Tertulis</h4>
                    <p class="text-xs sm:text-sm text-slate-400 leading-relaxed font-light">Kami memberikan jaminan sertifikat garansi pemeliharaan tertulis pasca konstruksi selesai sebagai bukti integritas mutu kerja kami.</p>
                </div>
            </div>
            
            <!-- Call To Action -->
            <div class="rounded-3xl border border-white/10 p-8 sm:p-12 bg-white/5 backdrop-blur-md flex flex-col sm:flex-row justify-between items-center gap-8 reveal-on-scroll max-w-5xl mx-auto pt-6">
                <div class="space-y-2 text-center sm:text-left">
                    <h4 class="font-extrabold text-white text-xl font-serif">Konsultasikan Desain & Konstruksi Anda Gratis</h4>
                    <p class="text-xs sm:text-sm text-slate-400 font-light">Hubungi tim teknik dan arsitektur kami untuk penawaran RAB transparan yang mengikat.</p>
                </div>
                <a href="https://api.whatsapp.com/send?phone={{ \App\Models\Setting::get('contact_whatsapp', '628123456789') }}&text=Halo%20PT%20Alam%20Kharisma%20Bersaudara%2C%20saya%2520tertarik%2520berdiskusi%252520mengenai%25252520layanan%25252520konstruksi/interior." 
                   target="_blank"
                   class="inline-flex items-center justify-center px-6 py-4 rounded-xl bg-gradient-to-r from-[#C5A880] to-[#B4966B] hover:from-[#B4966B] hover:to-[#A3855A] text-[#0A1E13] font-bold text-sm shadow-lg shadow-[#C5A880]/15 hover:scale-105 active:scale-95 transition-all duration-300 tracking-wider uppercase font-sans">
                    <i class="fa-brands fa-whatsapp text-lg mr-2 text-[#0A1E13]"></i>
                    Hubungi via WhatsApp
                </a>
            </div>
        </div>
    </section>
@endsection
