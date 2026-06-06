<!-- Tahapan Kerja Konstruksi (Contractor Workflow Section) -->
<section class="py-24 bg-[#0A1E13] relative overflow-hidden" x-data="{ activeStep: 1 }">
    <!-- Decorative Ambient Light -->
    <div class="absolute right-0 top-1/4 w-96 h-96 bg-[#C5A880]/10 rounded-full blur-3xl"></div>
    <div class="absolute left-0 bottom-1/4 w-96 h-96 bg-black/40 rounded-full blur-3xl"></div>
    <div class="absolute inset-0 luxury-grid-pattern opacity-15"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto space-y-3 mb-16 reveal-on-scroll">
            <span class="text-[#C5A880] text-sm font-bold tracking-widest uppercase block">Prosedur & Alur Kerja</span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight font-serif">
                Tahapan Kerja Pembangunan Bersama Kami
            </h2>
            <div class="w-20 h-[2px] bg-[#C5A880] mx-auto mt-4"></div>
            <p class="text-slate-300 leading-relaxed text-sm sm:text-base font-light mt-4">
                Kami menerapkan standar pengerjaan konstruksi terstruktur dan transparan demi memberikan jaminan kualitas terbaik di setiap fase pembangunan bangunan Anda.
            </p>
        </div>

        <!-- Interactive Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            <!-- Left Side: Interactive Step Selectors -->
            <div class="lg:col-span-5 space-y-4 reveal-on-scroll">
                <!-- Step 1 Button -->
                <button @click="activeStep = 1" 
                        :class="activeStep === 1 ? 'border-[#C5A880] bg-black/45 shadow-xl text-white scale-[1.02]' : 'border-white/10 bg-black/15 hover:bg-black/25 text-slate-400 hover:text-white'"
                        class="w-full text-left p-5 rounded-2xl border border-l-4 transition-all duration-300 flex items-center space-x-4 cursor-pointer focus:outline-none">
                    <div :class="activeStep === 1 ? 'bg-gradient-to-r from-[#C5A880] to-[#B4966B] text-[#0A1E13]' : 'bg-white/5 text-slate-400'" 
                         class="w-12 h-12 rounded-xl flex items-center justify-center font-extrabold text-lg flex-shrink-0 transition-all duration-300 font-serif">
                        01
                    </div>
                    <div class="flex-1">
                        <span class="text-[10px] uppercase font-bold tracking-wider text-[#C5A880] block">Tahap Awal</span>
                        <h4 class="font-bold text-sm sm:text-base tracking-wide">Konsultasi & Survey Lahan</h4>
                    </div>
                    <div class="text-[#C5A880] transition-transform duration-300" :class="activeStep === 1 ? 'translate-x-1' : ''">
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                </button>

                <!-- Step 2 Button -->
                <button @click="activeStep = 2" 
                        :class="activeStep === 2 ? 'border-[#C5A880] bg-black/45 shadow-xl text-white scale-[1.02]' : 'border-white/10 bg-black/15 hover:bg-black/25 text-slate-400 hover:text-white'"
                        class="w-full text-left p-5 rounded-2xl border border-l-4 transition-all duration-300 flex items-center space-x-4 cursor-pointer focus:outline-none">
                    <div :class="activeStep === 2 ? 'bg-gradient-to-r from-[#C5A880] to-[#B4966B] text-[#0A1E13]' : 'bg-white/5 text-slate-400'" 
                         class="w-12 h-12 rounded-xl flex items-center justify-center font-extrabold text-lg flex-shrink-0 transition-all duration-300 font-serif">
                        02
                    </div>
                    <div class="flex-1">
                        <span class="text-[10px] uppercase font-bold tracking-wider text-[#C5A880] block">Desain & Biaya</span>
                        <h4 class="font-bold text-sm sm:text-base tracking-wide">Perancangan Arsitektur & RAB</h4>
                    </div>
                    <div class="text-[#C5A880] transition-transform duration-300" :class="activeStep === 2 ? 'translate-x-1' : ''">
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                </button>

                <!-- Step 3 Button -->
                <button @click="activeStep = 3" 
                        :class="activeStep === 3 ? 'border-[#C5A880] bg-black/45 shadow-xl text-white scale-[1.02]' : 'border-white/10 bg-black/15 hover:bg-black/25 text-slate-400 hover:text-white'"
                        class="w-full text-left p-5 rounded-2xl border border-l-4 transition-all duration-300 flex items-center space-x-4 cursor-pointer focus:outline-none">
                    <div :class="activeStep === 3 ? 'bg-gradient-to-r from-[#C5A880] to-[#B4966B] text-[#0A1E13]' : 'bg-white/5 text-slate-400'" 
                         class="w-12 h-12 rounded-xl flex items-center justify-center font-extrabold text-lg flex-shrink-0 transition-all duration-300 font-serif">
                        03
                    </div>
                    <div class="flex-1">
                        <span class="text-[10px] uppercase font-bold tracking-wider text-[#C5A880] block">Perjanjian</span>
                        <h4 class="font-bold text-sm sm:text-base tracking-wide">Kesepakatan Kontrak (SPK)</h4>
                    </div>
                    <div class="text-[#C5A880] transition-transform duration-300" :class="activeStep === 3 ? 'translate-x-1' : ''">
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                </button>

                <!-- Step 4 Button -->
                <button @click="activeStep = 4" 
                        :class="activeStep === 4 ? 'border-[#C5A880] bg-black/45 shadow-xl text-white scale-[1.02]' : 'border-white/10 bg-black/15 hover:bg-black/25 text-slate-400 hover:text-white'"
                        class="w-full text-left p-5 rounded-2xl border border-l-4 transition-all duration-300 flex items-center space-x-4 cursor-pointer focus:outline-none">
                    <div :class="activeStep === 4 ? 'bg-gradient-to-r from-[#C5A880] to-[#B4966B] text-[#0A1E13]' : 'bg-white/5 text-slate-400'" 
                         class="w-12 h-12 rounded-xl flex items-center justify-center font-extrabold text-lg flex-shrink-0 transition-all duration-300 font-serif">
                        04
                    </div>
                    <div class="flex-1">
                        <span class="text-[10px] uppercase font-bold tracking-wider text-[#C5A880] block">Pembangunan</span>
                        <h4 class="font-bold text-sm sm:text-base tracking-wide">Pelaksanaan Konstruksi Fisik</h4>
                    </div>
                    <div class="text-[#C5A880] transition-transform duration-300" :class="activeStep === 4 ? 'translate-x-1' : ''">
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                </button>

                <!-- Step 5 Button -->
                <button @click="activeStep = 5" 
                        :class="activeStep === 5 ? 'border-[#C5A880] bg-black/45 shadow-xl text-white scale-[1.02]' : 'border-white/10 bg-black/15 hover:bg-black/25 text-slate-400 hover:text-white'"
                        class="w-full text-left p-5 rounded-2xl border border-l-4 transition-all duration-300 flex items-center space-x-4 cursor-pointer focus:outline-none">
                    <div :class="activeStep === 5 ? 'bg-gradient-to-r from-[#C5A880] to-[#B4966B] text-[#0A1E13]' : 'bg-white/5 text-slate-400'" 
                         class="w-12 h-12 rounded-xl flex items-center justify-center font-extrabold text-lg flex-shrink-0 transition-all duration-300 font-serif">
                        05
                    </div>
                    <div class="flex-1">
                        <span class="text-[10px] uppercase font-bold tracking-wider text-[#C5A880] block">Serah Terima</span>
                        <h4 class="font-bold text-sm sm:text-base tracking-wide">QC Akhir, Handover & Garansi</h4>
                    </div>
                    <div class="text-[#C5A880] transition-transform duration-300" :class="activeStep === 5 ? 'translate-x-1' : ''">
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                </button>
            </div>

            <!-- Right Side: Detailed Tab Contents -->
            <div class="lg:col-span-7 bg-[#0A1E13]/85 rounded-3xl border border-[#C5A880]/30 shadow-2xl p-6 sm:p-8 relative min-h-[500px] flex flex-col justify-between backdrop-blur-md reveal-on-scroll delay-200">
                
                <!-- Tab 1 Details -->
                <div x-show="activeStep === 1" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-4"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="space-y-6">
                    <div class="rounded-2xl overflow-hidden aspect-[16/9] bg-slate-900 border border-[#C5A880]/20 relative group">
                        <img src="{{ \App\Models\Setting::get('workflow_step1_img', 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&h=450&fit=crop') }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-700" 
                             alt="Konsultasi & Survey Lahan">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    </div>
                    <div class="space-y-2">
                        <span class="px-3 py-1 rounded-full text-[10px] font-bold bg-[#C5A880]/15 text-[#C5A880] border border-[#C5A880]/30 inline-block uppercase tracking-wider">Tahap 1</span>
                        <h3 class="text-xl sm:text-2xl font-serif font-bold text-white">Konsultasi Desain & Survey Lokasi Fisik</h3>
                        <p class="text-slate-300 text-sm leading-relaxed font-light">
                            Sesi bertukar pikiran awal untuk memetakan kebutuhan tata ruang, tipe arsitektur, dan budget Anda. Selanjutnya, tim surveyor kami terjun ke lapangan untuk mengukur kontur tanah secara presisi dan mengecek kondisi lingkungan untuk fondasi terbaik.
                        </p>
                    </div>
                    <div class="border-t border-white/10 pt-5">
                        <h5 class="font-bold text-[#C5A880] text-xs uppercase tracking-wider mb-3">Apa yang Anda peroleh?</h5>
                        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 text-xs sm:text-sm text-slate-350 text-slate-300">
                            <li class="flex items-center space-x-2.5"><i class="fa-solid fa-circle-check text-[#C5A880]"></i> <span>Free survey lokasi proyek</span></li>
                            <li class="flex items-center space-x-2.5"><i class="fa-solid fa-circle-check text-[#C5A880]"></i> <span>Diskusi konsep & tata ruang</span></li>
                            <li class="flex items-center space-x-2.5"><i class="fa-solid fa-circle-check text-[#C5A880]"></i> <span>Analisis topografi tanah</span></li>
                            <li class="flex items-center space-x-2.5"><i class="fa-solid fa-circle-check text-[#C5A880]"></i> <span>Estimasi budget kasar awal</span></li>
                        </ul>
                    </div>
                </div>

                <!-- Tab 2 Details -->
                <div x-show="activeStep === 2" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-4"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="space-y-6"
                     style="display: none;">
                    <div class="rounded-2xl overflow-hidden aspect-[16/9] bg-slate-900 border border-[#C5A880]/20 relative group">
                        <img src="{{ \App\Models\Setting::get('workflow_step2_img', 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?w=800&h=450&fit=crop') }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-700" 
                             alt="Perancangan Arsitektur & RAB">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    </div>
                    <div class="space-y-2">
                        <span class="px-3 py-1 rounded-full text-[10px] font-bold bg-[#C5A880]/15 text-[#C5A880] border border-[#C5A880]/30 inline-block uppercase tracking-wider">Tahap 2</span>
                        <h3 class="text-xl sm:text-2xl font-serif font-bold text-white">Desain Arsitektur 3D & Penyusunan RAB</h3>
                        <p class="text-slate-300 text-sm leading-relaxed font-light">
                            Tim arsitek kami merancang rendering 3D visual eksterior-interior yang realistis. Setelah desain disepakati, estimator menyusun Rencana Anggaran Biaya (RAB) yang transparan dan terperinci untuk setiap pos pekerjaan, lengkap dengan spesifikasi material.
                        </p>
                    </div>
                    <div class="border-t border-white/10 pt-5">
                        <h5 class="font-bold text-[#C5A880] text-xs uppercase tracking-wider mb-3">Apa yang Anda peroleh?</h5>
                        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 text-xs sm:text-sm text-slate-305 text-slate-300">
                            <li class="flex items-center space-x-2.5"><i class="fa-solid fa-circle-check text-[#C5A880]"></i> <span>Gambar Rendering 3D Realistis</span></li>
                            <li class="flex items-center space-x-2.5"><i class="fa-solid fa-circle-check text-[#C5A880]"></i> <span>Gambar Kerja DED Lengkap</span></li>
                            <li class="flex items-center space-x-2.5"><i class="fa-solid fa-circle-check text-[#C5A880]"></i> <span>RAB Detail Per Item Pekerjaan</span></li>
                            <li class="flex items-center space-x-2.5"><i class="fa-solid fa-circle-check text-[#C5A880]"></i> <span>Spesifikasi Material Terkunci</span></li>
                        </ul>
                    </div>
                </div>

                <!-- Tab 3 Details -->
                <div x-show="activeStep === 3" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-4"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="space-y-6"
                     style="display: none;">
                    <div class="rounded-2xl overflow-hidden aspect-[16/9] bg-slate-900 border border-[#C5A880]/20 relative group">
                        <img src="{{ \App\Models\Setting::get('workflow_step3_img', 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=800&h=450&fit=crop') }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-700" 
                             alt="Kesepakatan Kontrak Kerja">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    </div>
                    <div class="space-y-2">
                        <span class="px-3 py-1 rounded-full text-[10px] font-bold bg-[#C5A880]/15 text-[#C5A880] border border-[#C5A880]/30 inline-block uppercase tracking-wider">Tahap 3</span>
                        <h3 class="text-xl sm:text-2xl font-serif font-bold text-white">Penandatanganan Kontrak Kerja Resmi</h3>
                        <p class="text-slate-300 text-sm leading-relaxed font-light">
                            Pengikatan kontrak kerja tertulis (SPK) resmi yang menjamin keabsahan hukum proyek. Seluruh total nilai kontrak, material spesifikasi, denda keterlambatan, dan timeline kerja (Kurva S) terkunci mutlak demi menghindari pembengkakan biaya di kemudian hari.
                        </p>
                    </div>
                    <div class="border-t border-white/10 pt-5">
                        <h5 class="font-bold text-[#C5A880] text-xs uppercase tracking-wider mb-3">Apa yang Anda peroleh?</h5>
                        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 text-xs sm:text-sm text-slate-305 text-slate-300">
                            <li class="flex items-center space-x-2.5"><i class="fa-solid fa-circle-check text-[#C5A880]"></i> <span>Kontrak SPK Bergaransi Hukum</span></li>
                            <li class="flex items-center space-x-2.5"><i class="fa-solid fa-circle-check text-[#C5A880]"></i> <span>Kepastian Harga Tanpa Tambahan</span></li>
                            <li class="flex items-center space-x-2.5"><i class="fa-solid fa-circle-check text-[#C5A880]"></i> <span>Jadwal Kurva S Terstruktur</span></li>
                            <li class="flex items-center space-x-2.5"><i class="fa-solid fa-circle-check text-[#C5A880]"></i> <span>Keamanan Berkas & Perjanjian</span></li>
                        </ul>
                    </div>
                </div>

                <!-- Tab 4 Details -->
                <div x-show="activeStep === 4" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-4"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="space-y-6"
                     style="display: none;">
                    <div class="rounded-2xl overflow-hidden aspect-[16/9] bg-slate-900 border border-[#C5A880]/20 relative group">
                        <img src="{{ \App\Models\Setting::get('workflow_step4_img', 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&h=450&fit=crop') }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-700" 
                             alt="Konstruksi Fisik Proyek">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    </div>
                    <div class="space-y-2">
                        <span class="px-3 py-1 rounded-full text-[10px] font-bold bg-[#C5A880]/15 text-[#C5A880] border border-[#C5A880]/30 inline-block uppercase tracking-wider">Tahap 4</span>
                        <h3 class="text-xl sm:text-2xl font-serif font-bold text-white">Pelaksanaan Konstruksi Sipil & MEP</h3>
                        <p class="text-slate-300 text-sm leading-relaxed font-light">
                            Pengerjaan konstruksi fisik di site dikawal penuh oleh Site Engineer dan Project Manager berlisensi teknik sipil. Kami menjamin struktur beton berkualitas tinggi, material sesuai kesepakatan, dan kepatuhan penuh terhadap standar mutu teknik.
                        </p>
                    </div>
                    <div class="border-t border-white/10 pt-5">
                        <h5 class="font-bold text-[#C5A880] text-xs uppercase tracking-wider mb-3">Apa yang Anda peroleh?</h5>
                        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 text-xs sm:text-sm text-slate-305 text-slate-300">
                            <li class="flex items-center space-x-2.5"><i class="fa-solid fa-circle-check text-[#C5A880]"></i> <span>Supervisi Site Engineer harian</span></li>
                            <li class="flex items-center space-x-2.5"><i class="fa-solid fa-circle-check text-[#C5A880]"></i> <span>Material bermutu standar SNI</span></li>
                            <li class="flex items-center space-x-2.5"><i class="fa-solid fa-circle-check text-[#C5A880]"></i> <span>Penerapan standar K3 keselamatan</span></li>
                            <li class="flex items-center space-x-2.5"><i class="fa-solid fa-circle-check text-[#C5A880]"></i> <span>Dokumentasi progres berkala</span></li>
                        </ul>
                    </div>
                </div>

                <!-- Tab 5 Details -->
                <div x-show="activeStep === 5" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-4"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="space-y-6"
                     style="display: none;">
                    <div class="rounded-2xl overflow-hidden aspect-[16/9] bg-slate-900 border border-[#C5A880]/20 relative group">
                        <img src="{{ \App\Models\Setting::get('workflow_step5_img', 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=800&h=450&fit=crop') }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-700" 
                             alt="QC Akhir & Serah Terima Kunci">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    </div>
                    <div class="space-y-2">
                        <span class="px-3 py-1 rounded-full text-[10px] font-bold bg-[#C5A880]/15 text-[#C5A880] border border-[#C5A880]/30 inline-block uppercase tracking-wider">Tahap 5</span>
                        <h3 class="text-xl sm:text-2xl font-serif font-bold text-white">QC, Serah Terima Kunci & Garansi</h3>
                        <p class="text-slate-300 text-sm leading-relaxed font-light">
                            Setelah konstruksi selesai, tim Quality Control (QC) internal kami menguji setiap fungsi kelistrikan, kebocoran air, kerapian cat, dan presisi keramik sebelum penandatanganan Berita Acara Serah Terima (BAST). Kami menyertakan jaminan garansi pemeliharaan tertulis.
                        </p>
                    </div>
                    <div class="border-t border-white/10 pt-5">
                        <h5 class="font-bold text-[#C5A880] text-xs uppercase tracking-wider mb-3">Apa yang Anda peroleh?</h5>
                        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 text-xs sm:text-sm text-slate-305 text-slate-300">
                            <li class="flex items-center space-x-2.5"><i class="fa-solid fa-circle-check text-[#C5A880]"></i> <span>Inspeksi QC menyeluruh (100+)</span></li>
                            <li class="flex items-center space-x-2.5"><i class="fa-solid fa-circle-check text-[#C5A880]"></i> <span>Pembersihan akhir pasca konstruksi</span></li>
                            <li class="flex items-center space-x-2.5"><i class="fa-solid fa-circle-check text-[#C5A880]"></i> <span>Berita Acara & Handover Kunci</span></li>
                            <li class="flex items-center space-x-2.5"><i class="fa-solid fa-circle-check text-[#C5A880]"></i> <span>Garansi pemeliharaan 3-6 Bulan</span></li>
                        </ul>
                    </div>
                </div>

                <!-- Bottom CTA -->
                <div class="pt-6 mt-6 border-t border-white/10 flex items-center justify-between">
                    <div class="text-xs text-slate-400 italic">
                        *Tahapan dapat disesuaikan dengan skala proyek Anda.
                    </div>
                    <a href="https://api.whatsapp.com/send?phone={{ \App\Models\Setting::get('contact_whatsapp', '628123456789') }}&text=Halo%20{{ urlencode(\App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara')) }}%2C%20saya%20tertarik%20dengan%20layanan%20Anda.%20Bisa%20berdiskusi%20lebih%20lanjut%3F"
                       target="_blank"
                       class="inline-flex items-center space-x-2 px-5 py-2.5 bg-gradient-to-r from-[#C5A880] to-[#B4966B] hover:from-[#B4966B] hover:to-[#A3855A] text-[#0A1E13] rounded-xl transition-all duration-300 font-bold text-xs shadow-lg cursor-pointer uppercase tracking-wider">
                        <i class="fa-brands fa-whatsapp text-lg"></i>
                        <span>Bahas Proyek Anda</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
