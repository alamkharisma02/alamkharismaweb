@extends('layouts.app')

@section('title', 'Profil Perusahaan - ' . \App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara'))
@section('meta_description', 'Kenali profil, sejarah singkat, visi misi, dan legalitas resmi dari ' . \App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara') . '.')

@section('content')
    <!-- Banner Space Filler -->
    <div class="h-20 bg-slate-950"></div>

    <!-- Header Section -->
    <section class="relative bg-slate-50 py-20 border-b border-slate-200 overflow-hidden">
        <!-- Background subtle shapes -->
        <div class="absolute right-0 top-0 w-96 h-96 bg-brand-accent/5 rounded-full blur-3xl -mr-20 -mt-20"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-indigo-500/5 rounded-full blur-3xl -ml-20 -mb-20"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
            <span class="inline-flex items-center px-3.5 py-1 rounded-full text-xs font-bold bg-brand-accent/10 text-brand-primary border border-brand-accent/20 uppercase tracking-widest">
                <i class="fa-solid fa-building mr-1.5"></i> Company Profile
            </span>
            <h1 class="text-4xl sm:text-5xl font-extrabold text-slate-900 tracking-tight leading-tight">
                Profil Perusahaan
            </h1>
            <p class="text-slate-600 max-w-2xl mx-auto text-sm sm:text-base leading-relaxed">
                Mengenal sejarah berdiri, legalitas, serta visi dan misi utama {{ \App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara') }}.
            </p>
        </div>
    </section>

    <!-- Main Content Section -->
    <section class="py-20 bg-white relative">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            
            <!-- About Us (Narrative) -->
            <div class="grid grid-cols-1 md:grid-cols-12 gap-10 items-start">
                <div class="md:col-span-7 space-y-4">
                    <span class="text-brand-accent text-xs font-bold uppercase tracking-wider">Tentang Kami</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 leading-tight">
                        {{ \App\Models\Setting::get('company_about_us_title', 'Membangun dengan Hati, Merancang dengan Presisi') }}
                    </h2>
                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed text-justify">
                        {{ \App\Models\Setting::get('company_about_us_text') }}
                    </p>
                </div>
                
                <!-- Established Year Visual -->
                <div class="md:col-span-5 bg-gradient-to-br from-brand-primary to-brand-primary-hover text-slate-950 rounded-3xl p-8 shadow-xl relative overflow-hidden flex flex-col justify-center min-h-[220px]">
                    <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-white/10 rounded-full blur-2xl"></div>
                    <span class="text-xs uppercase font-extrabold tracking-widest text-slate-900/60">Tahun Berdiri</span>
                    <span class="text-6xl font-black mt-2 tracking-tight">{{ \App\Models\Setting::get('company_established_year', '2018') }}</span>
                    <p class="text-slate-950/80 text-xs sm:text-sm font-semibold mt-4 leading-relaxed">
                        Sejak tahun {{ \App\Models\Setting::get('company_established_year', '2018') }}, kami telah melayani pengerjaan bidang Interior, Eksterior, dan Kontraktor Sipil secara transparan dan berintegritas.
                    </p>
                </div>
            </div>

            <!-- Corporate Stats & Legals -->
            <div class="bg-slate-50 border border-slate-200 rounded-3xl p-6 sm:p-8 space-y-6">
                <h3 class="font-extrabold text-slate-950 text-base sm:text-lg uppercase tracking-wide border-b border-slate-200 pb-3"><i class="fa-solid fa-file-shield text-brand-accent mr-2"></i> Data Legalitas Perusahaan</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-xs sm:text-sm">
                    <div class="divide-y divide-slate-200/80">
                        <div class="py-3 flex justify-between">
                            <span class="text-slate-500 font-semibold">Nama Legal Perusahaan</span>
                            <span class="text-slate-900 font-extrabold">{{ \App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara') }}</span>
                        </div>
                        <div class="py-3 flex justify-between">
                            <span class="text-slate-500 font-semibold">Tahun Pendirian Resmi</span>
                            <span class="text-slate-900 font-extrabold">{{ \App\Models\Setting::get('company_established_year', '2018') }}</span>
                        </div>
                        <div class="py-3 flex justify-between">
                            <span class="text-slate-500 font-semibold">Bidang Usaha</span>
                            <span class="text-slate-900 font-extrabold">{{ \App\Models\Setting::get('site_tagline', 'Interior, Eksterior, dan Kontraktor Konstruksi') }}</span>
                        </div>
                    </div>
                    <div class="divide-y divide-slate-200/80">
                        <div class="py-3 flex justify-between">
                            <span class="text-slate-500 font-semibold">Nomor NIB</span>
                            <span class="text-slate-900 font-mono font-extrabold">{{ \App\Models\Setting::get('legal_nib', '1234567890123') }}</span>
                        </div>
                        <div class="py-3 flex justify-between">
                            <span class="text-slate-500 font-semibold">No. Izin SIUJK</span>
                            <span class="text-slate-900 font-mono font-extrabold">{{ \App\Models\Setting::get('legal_siujk', '912/SIUJK/2024') }}</span>
                        </div>
                        <div class="py-3 flex justify-between">
                            <span class="text-slate-500 font-semibold">Wilayah Layanan</span>
                            <span class="text-slate-900 font-extrabold">Nasional / Seluruh Indonesia</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Vision & Mission -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-stretch">
                <!-- Vision -->
                <div class="p-8 rounded-3xl bg-brand-accent/5 border border-brand-accent/20 flex flex-col justify-between space-y-4">
                    <div class="space-y-3">
                        <div class="w-12 h-12 rounded-xl bg-brand-accent/10 text-brand-primary flex items-center justify-center text-xl font-bold"><i class="fa-solid fa-eye"></i></div>
                        <h4 class="font-extrabold text-brand-primary text-lg uppercase tracking-wider">Visi Perusahaan</h4>
                        <p class="text-slate-650 text-sm sm:text-base leading-relaxed">
                            Menjadi mitra terpercaya dalam bidang jasa desain interior, eksterior, dan kontraktor sipil dengan mengedepankan kualitas konstruksi tinggi, transparansi anggaran, serta ketepatan waktu demi kepuasan penuh klien.
                        </p>
                    </div>
                </div>
                
                <!-- Mission -->
                <div class="p-8 rounded-3xl bg-indigo-500/5 border border-indigo-500/20 flex flex-col justify-between space-y-4">
                    <div class="space-y-3">
                        <div class="w-12 h-12 rounded-xl bg-indigo-500/10 text-indigo-700 flex items-center justify-center text-xl font-bold"><i class="fa-solid fa-bullseye"></i></div>
                        <h4 class="font-extrabold text-indigo-900 text-lg uppercase tracking-wider">Misi Perusahaan</h4>
                        <ul class="list-disc list-inside text-slate-650 text-xs sm:text-sm leading-relaxed space-y-2">
                            <li>Menyediakan rancangan desain yang estetis, fungsional, dan inovatif sesuai tren arsitektur terkini.</li>
                            <li>Menerapkan supervisi tim insinyur berlisensi harian serta penggunaan material berstandar SNI.</li>
                            <li>Menyusun rencana anggaran biaya (RAB) yang transparan dan mengikat tanpa pembengkakan.</li>
                            <li>Memberikan garansi pemeliharaan tertulis yang tepercaya pasca konstruksi.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Focus Divisions -->
            <div class="space-y-6">
                <div class="text-center max-w-2xl mx-auto space-y-2">
                    <h3 class="text-2xl font-extrabold text-slate-900">Bidang Pekerjaan</h3>
                    <p class="text-xs sm:text-sm text-slate-500">PT Alam Kharisma Bersaudara melayani tiga lingkup bidang utama:</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="p-6 rounded-2xl border border-slate-200 bg-white text-center space-y-3">
                        <div class="w-12 h-12 rounded-full bg-brand-primary/10 text-brand-primary flex items-center justify-center text-lg mx-auto"><i class="fa-solid fa-couch"></i></div>
                        <h4 class="font-bold text-slate-900 text-sm">Interior Design & Fit-Out</h4>
                        <p class="text-xs text-slate-500 leading-relaxed">Pembuatan kitchen set custom, interior kamar utama mewah, partisi dinding modern, dan plafon drop-ceiling.</p>
                    </div>
                    <div class="p-6 rounded-2xl border border-slate-200 bg-white text-center space-y-3">
                        <div class="w-12 h-12 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-lg mx-auto"><i class="fa-solid fa-hotel"></i></div>
                        <h4 class="font-bold text-slate-900 text-sm">Eksterior Fasad & Lanskap</h4>
                        <p class="text-xs text-slate-500 leading-relaxed">Perancangan fasad ACP minimalis modern, pengerjaan batu alam dinding luar, taman minimalis, dan carport lantai beton.</p>
                    </div>
                    <div class="p-6 rounded-2xl border border-slate-200 bg-white text-center space-y-3">
                        <div class="w-12 h-12 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center text-lg mx-auto"><i class="fa-solid fa-helmet-safety"></i></div>
                        <h4 class="font-bold text-slate-900 text-sm">Kontraktor Struktur & Sipil</h4>
                        <p class="text-xs text-slate-500 leading-relaxed">Pembangunan fisik ruko, villa beton bertulang, jembatan, jalan rigid beton, hingga renovasi pembongkaran struktural.</p>
                    </div>
                </div>
            </div>

            <!-- Call To Action -->
            <div class="rounded-3xl border border-slate-200 p-8 sm:p-10 bg-slate-50 flex flex-col sm:flex-row justify-between items-center gap-6">
                <div class="space-y-1.5 text-center sm:text-left">
                    <h4 class="font-extrabold text-slate-900 text-lg sm:text-xl">Tertarik Bekerja Sama dengan Kami?</h4>
                    <p class="text-xs sm:text-sm text-slate-500">Mulai diskusi konsep desain Anda bersama tim ahli sipil dan arsitek profesional kami.</p>
                </div>
                <a href="https://api.whatsapp.com/send?phone={{ \App\Models\Setting::get('contact_whatsapp', '628123456789') }}&text=Halo%20PT%20Alam%20Kharisma%20Bersaudara%2C%20saya%2520tertarik%2520bekerja%252520sama%252520mengenai%25252520proyek%2525252520saya." 
                   target="_blank"
                   class="inline-flex items-center justify-center px-6 py-3.5 rounded-xl bg-brand-accent hover:bg-brand-accent-hover text-slate-950 font-extrabold text-sm shadow-md shadow-brand-accent/10 hover:scale-105 active:scale-95 transition-all duration-300">
                    <i class="fa-brands fa-whatsapp text-lg mr-2"></i>
                    Konsultasi Sekarang
                </a>
            </div>

        </div>
    </section>
@endsection
