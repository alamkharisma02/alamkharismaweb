@extends('layouts.app')

@section('title', 'Profil Perusahaan - ' . \App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara'))
@section('meta_description', 'Kenali profil, sejarah singkat, visi misi, dan legalitas resmi dari ' . \App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara') . '.')

@section('content')
    <!-- Banner Space Filler -->
    <div class="h-20 bg-[#0A1E13]"></div>

    <!-- Header Section -->
    <section class="relative bg-cover bg-center py-20 border-b border-[#C5A880]/15 overflow-hidden"
             style="background-image: url('{{ \App\Models\Setting::get('banner_profile_img', 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=1920&q=80') }}')">
        <!-- High-contrast dark gradient overlays -->
        <div class="absolute inset-0 bg-[#0A1E13]/85 mix-blend-multiply z-0"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-[#0A1E13] via-[#0A1E13]/60 to-[#0A1E13]/85 z-0"></div>
        <!-- Accent Glow and Pattern -->
        <div class="absolute right-0 top-0 w-96 h-96 bg-[#C5A880]/10 rounded-full blur-3xl z-0"></div>
        <div class="absolute inset-0 luxury-grid-pattern opacity-15 z-0"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4 z-10 reveal-on-scroll">
            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold bg-[#C5A880]/15 text-[#C5A880] border border-[#C5A880]/30 uppercase tracking-widest animate-pulse-gold">
                <i class="fa-solid fa-building mr-1.5"></i> Company Profile
            </span>
            <h1 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight leading-tight font-serif drop-shadow-[0_4px_10px_rgba(0,0,0,0.7)]">
                Profil Perusahaan
            </h1>
            <div class="w-20 h-[2px] bg-[#C5A880] mx-auto mt-4"></div>
            <p class="text-slate-300 max-w-2xl mx-auto text-sm sm:text-base leading-relaxed font-light mt-4 drop-shadow-[0_2px_5px_rgba(0,0,0,0.6)]">
                Mengenal sejarah berdiri, legalitas, serta visi dan misi utama {{ \App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara') }}.
            </p>
        </div>
    </section>

    <!-- Main Content Section -->
    <section class="py-24 bg-[#0A1E13] relative overflow-hidden">
        <!-- Background subtle glow shapes -->
        <div class="absolute left-1/2 top-1/4 w-[500px] h-[500px] bg-[#C5A880]/5 rounded-full blur-[120px] -translate-x-1/2"></div>
        <div class="absolute inset-0 luxury-grid-pattern opacity-5"></div>
        
        <!-- Watermark background -->
        <div class="absolute inset-0 z-0 opacity-[0.03] pointer-events-none mix-blend-overlay">
            <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?w=1920&h=1080&fit=crop" class="w-full h-full object-cover select-none" alt="Watermark bg">
        </div>

        <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
            
            <!-- About Us (Narrative) -->
            <div class="grid grid-cols-1 md:grid-cols-12 gap-12 items-center reveal-on-scroll">
                <div class="md:col-span-7 space-y-6">
                    <span class="text-[#C5A880] text-xs font-bold uppercase tracking-wider block">Tentang Kami</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-white leading-tight font-serif">
                        {{ \App\Models\Setting::get('company_about_us_title', 'Membangun dengan Hati, Merancang dengan Presisi') }}
                    </h2>
                    <p class="text-slate-300 text-sm sm:text-base leading-relaxed text-justify font-light">
                        {{ \App\Models\Setting::get('company_about_us_text') }}
                    </p>
                </div>
                
                <!-- Established Year Visual -->
                <div class="md:col-span-5 bg-gradient-to-br from-[#0A1E13] to-[#050F09] text-white rounded-3xl p-8 shadow-2xl relative overflow-hidden border border-[#C5A880]/20 flex flex-col justify-center min-h-[240px] group hover:border-[#C5A880]/50 transition-colors duration-500">
                    <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-[#C5A880]/10 rounded-full blur-2xl"></div>
                    <span class="text-xs uppercase font-extrabold tracking-widest text-[#C5A880]/80">Tahun Berdiri</span>
                    <span class="text-6xl font-black mt-2 tracking-tight text-white font-serif">{{ \App\Models\Setting::get('company_established_year', '2018') }}</span>
                    <p class="text-slate-300 text-xs sm:text-sm mt-4 leading-relaxed font-light">
                        Sejak tahun {{ \App\Models\Setting::get('company_established_year', '2018') }}, kami telah melayani pengerjaan bidang Interior, Eksterior, dan Kontraktor Sipil secara transparan dan berintegritas.
                    </p>
                </div>
            </div>

            <!-- Corporate Stats & Legals -->
            <div class="bg-white/5 border border-white/10 backdrop-blur-md rounded-3xl p-8 sm:p-10 space-y-8 reveal-on-scroll">
                <h3 class="font-extrabold text-white text-lg sm:text-xl uppercase tracking-wide border-b border-white/10 pb-4 font-serif flex items-center">
                    <i class="fa-solid fa-file-shield text-[#C5A880] mr-3"></i> Data Legalitas Perusahaan
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-xs sm:text-sm">
                    <div class="space-y-4">
                        <div class="py-3 flex justify-between border-b border-white/5">
                            <span class="text-slate-400 font-medium">Nama Legal Perusahaan</span>
                            <span class="text-white font-bold text-right">{{ \App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara') }}</span>
                        </div>
                        <div class="py-3 flex justify-between border-b border-white/5">
                            <span class="text-slate-400 font-medium">Tahun Pendirian Resmi</span>
                            <span class="text-white font-bold">{{ \App\Models\Setting::get('company_established_year', '2018') }}</span>
                        </div>
                        <div class="py-3 flex justify-between border-b border-white/5 md:border-none">
                            <span class="text-slate-400 font-medium">Bidang Usaha</span>
                            <span class="text-white font-bold text-right max-w-[200px] sm:max-w-xs truncate">{{ \App\Models\Setting::get('site_tagline', 'Interior, Eksterior, dan Kontraktor Konstruksi') }}</span>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="py-3 flex justify-between border-b border-white/5">
                            <span class="text-slate-400 font-medium">Nomor NIB</span>
                            <span class="text-[#C5A880] font-mono font-bold">{{ \App\Models\Setting::get('legal_nib', '1234567890123') }}</span>
                        </div>
                        <div class="py-3 flex justify-between border-b border-white/5">
                            <span class="text-slate-400 font-medium">No. Izin SIUJK</span>
                            <span class="text-[#C5A880] font-mono font-bold">{{ \App\Models\Setting::get('legal_siujk', '912/SIUJK/2024') }}</span>
                        </div>
                        <div class="py-3 flex justify-between">
                            <span class="text-slate-400 font-medium">Wilayah Layanan</span>
                            <span class="text-white font-bold">Nasional / Seluruh Indonesia</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Vision & Mission -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-stretch reveal-on-scroll">
                <!-- Vision -->
                <div class="p-8 sm:p-10 rounded-3xl bg-white/5 border border-white/10 backdrop-blur-md flex flex-col justify-between space-y-6 group hover:border-[#C5A880]/30 transition-all duration-300">
                    <div class="space-y-4">
                        <div class="w-14 h-14 rounded-2xl bg-[#C5A880]/15 text-[#C5A880] flex items-center justify-center text-2xl font-bold shadow-lg shadow-[#C5A880]/5"><i class="fa-solid fa-eye"></i></div>
                        <h4 class="font-extrabold text-[#C5A880] text-xl uppercase tracking-wider font-serif">Visi Perusahaan</h4>
                        <p class="text-slate-300 text-sm sm:text-base leading-relaxed font-light">
                            Menjadi mitra terpercaya dalam bidang jasa desain interior, eksterior, dan kontraktor sipil dengan mengedepankan kualitas konstruksi tinggi, transparansi anggaran, serta ketepatan waktu demi kepuasan penuh klien.
                        </p>
                    </div>
                </div>
                
                <!-- Mission -->
                <div class="p-8 sm:p-10 rounded-3xl bg-white/5 border border-white/10 backdrop-blur-md flex flex-col justify-between space-y-6 group hover:border-[#C5A880]/30 transition-all duration-300">
                    <div class="space-y-4">
                        <div class="w-14 h-14 rounded-2xl bg-[#C5A880]/15 text-[#C5A880] flex items-center justify-center text-2xl font-bold shadow-lg shadow-[#C5A880]/5"><i class="fa-solid fa-bullseye"></i></div>
                        <h4 class="font-extrabold text-[#C5A880] text-xl uppercase tracking-wider font-serif">Misi Perusahaan</h4>
                        <ul class="text-slate-300 text-xs sm:text-sm leading-relaxed space-y-3 font-light">
                            <li class="flex items-start"><i class="fa-solid fa-check-circle text-[#C5A880] mt-1 mr-3 flex-shrink-0 text-sm"></i> <span>Menyediakan rancangan desain yang estetis, fungsional, dan inovatif sesuai tren arsitektur terkini.</span></li>
                            <li class="flex items-start"><i class="fa-solid fa-check-circle text-[#C5A880] mt-1 mr-3 flex-shrink-0 text-sm"></i> <span>Menerapkan supervisi tim insinyur berlisensi harian serta penggunaan material berstandar SNI.</span></li>
                            <li class="flex items-start"><i class="fa-solid fa-check-circle text-[#C5A880] mt-1 mr-3 flex-shrink-0 text-sm"></i> <span>Menyusun rencana anggaran biaya (RAB) yang transparan dan mengikat tanpa pembengkakan.</span></li>
                            <li class="flex items-start"><i class="fa-solid fa-check-circle text-[#C5A880] mt-1 mr-3 flex-shrink-0 text-sm"></i> <span>Memberikan garansi pemeliharaan tertulis yang tepercaya pasca konstruksi.</span></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Focus Divisions -->
            <div class="space-y-8 reveal-on-scroll">
                <div class="text-center max-w-2xl mx-auto space-y-3">
                    <h3 class="text-3xl font-extrabold text-white font-serif">Bidang Pekerjaan</h3>
                    <p class="text-xs sm:text-sm text-slate-400 font-light">PT Alam Kharisma Bersaudara melayani tiga lingkup bidang utama:</p>
                    <div class="w-16 h-[2px] bg-[#C5A880] mx-auto mt-2"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Division 1 -->
                    <div class="p-8 rounded-3xl border border-white/10 bg-white/5 backdrop-blur-md text-center space-y-4 group hover:border-[#C5A880]/30 transition-all duration-300">
                        <div class="w-14 h-14 rounded-full bg-[#C5A880]/15 text-[#C5A880] flex items-center justify-center text-xl mx-auto shadow-lg"><i class="fa-solid fa-couch"></i></div>
                        <h4 class="font-bold text-white text-base font-serif">Interior Design & Fit-Out</h4>
                        <p class="text-xs sm:text-sm text-slate-400 leading-relaxed font-light">Pembuatan kitchen set custom, interior kamar utama mewah, partisi dinding modern, dan plafon drop-ceiling.</p>
                    </div>
                    <!-- Division 2 -->
                    <div class="p-8 rounded-3xl border border-white/10 bg-white/5 backdrop-blur-md text-center space-y-4 group hover:border-[#C5A880]/30 transition-all duration-300">
                        <div class="w-14 h-14 rounded-full bg-[#C5A880]/15 text-[#C5A880] flex items-center justify-center text-xl mx-auto shadow-lg"><i class="fa-solid fa-hotel"></i></div>
                        <h4 class="font-bold text-white text-base font-serif">Eksterior Fasad & Lanskap</h4>
                        <p class="text-xs sm:text-sm text-slate-400 leading-relaxed font-light">Perancangan fasad ACP minimalis modern, pengerjaan batu alam dinding luar, taman minimalis, dan carport lantai beton.</p>
                    </div>
                    <!-- Division 3 -->
                    <div class="p-8 rounded-3xl border border-white/10 bg-white/5 backdrop-blur-md text-center space-y-4 group hover:border-[#C5A880]/30 transition-all duration-300">
                        <div class="w-14 h-14 rounded-full bg-[#C5A880]/15 text-[#C5A880] flex items-center justify-center text-xl mx-auto shadow-lg"><i class="fa-solid fa-helmet-safety"></i></div>
                        <h4 class="font-bold text-white text-base font-serif">Kontraktor Struktur & Sipil</h4>
                        <p class="text-xs sm:text-sm text-slate-400 leading-relaxed font-light">Pembangunan fisik ruko, villa beton bertulang, jembatan, jalan rigid beton, hingga renovasi pembongkaran struktural.</p>
                    </div>
                </div>
            </div>

            <!-- Call To Action -->
            <div class="rounded-3xl border border-white/10 p-8 sm:p-12 bg-white/5 backdrop-blur-md flex flex-col sm:flex-row justify-between items-center gap-8 reveal-on-scroll">
                <div class="space-y-2 text-center sm:text-left">
                    <h4 class="font-extrabold text-white text-xl font-serif">Tertarik Bekerja Sama dengan Kami?</h4>
                    <p class="text-xs sm:text-sm text-slate-400 font-light">Mulai diskusi konsep desain Anda bersama tim ahli sipil dan arsitek profesional kami.</p>
                </div>
                <a href="https://api.whatsapp.com/send?phone={{ \App\Models\Setting::get('contact_whatsapp', '628123456789') }}&text=Halo%20PT%20Alam%20Kharisma%20Bersaudara%2C%20saya%2520tertarik%2520bekerja%252520sama%252520mengenai%25252520proyek%2525252520saya." 
                   target="_blank"
                   class="inline-flex items-center justify-center px-6 py-4 rounded-xl bg-gradient-to-r from-[#C5A880] to-[#B4966B] hover:from-[#B4966B] hover:to-[#A3855A] text-[#0A1E13] font-bold text-sm shadow-lg shadow-[#C5A880]/15 hover:scale-105 active:scale-95 transition-all duration-300 tracking-wider uppercase">
                    <i class="fa-brands fa-whatsapp text-lg mr-2 text-[#0A1E13]"></i>
                    Konsultasi Sekarang
                </a>
            </div>

        </div>
    </section>
@endsection
