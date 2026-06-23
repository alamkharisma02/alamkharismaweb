@extends('layouts.app')

@section('title', 'Hubungi Kami - ' . \App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara'))
@section('meta_description', 'Hubungi tim arsitek dan sipil PT Alam Kharisma Bersaudara. Dapatkan konsultasi gratis, perhitungan estimasi RAB transparan, dan kunjungan survei fisik.')

@section('content')
    <!-- Banner Space Filler -->
    <div class="h-20 bg-[#0A1E13]"></div>

    <!-- Header Section (Parallax Background) -->
    <section class="relative bg-cover bg-center py-20 border-b border-[#C5A880]/15 overflow-hidden text-center"
             style="background-image: url('{{ \App\Models\Setting::get('banner_contact_img', 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=1920&q=80') }}')">
        <!-- High-contrast dark gradient overlays -->
        <div class="absolute inset-0 bg-[#0A1E13]/85 mix-blend-multiply z-0"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-[#0A1E13] via-[#0A1E13]/60 to-[#0A1E13]/85 z-0"></div>
        <!-- Accent Glow and Pattern -->
        <div class="absolute right-0 top-0 w-96 h-96 bg-[#C5A880]/10 rounded-full blur-3xl z-0"></div>
        <div class="absolute inset-0 luxury-grid-pattern opacity-15 z-0"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10 space-y-4 reveal-on-scroll">
            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold bg-[#C5A880]/15 text-[#C5A880] border border-[#C5A880]/30 uppercase tracking-widest animate-pulse-gold">
                <i class="fa-solid fa-envelope mr-1.5"></i> Hubungi Kami
            </span>
            <h1 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight leading-tight font-serif drop-shadow-[0_4px_10px_rgba(0,0,0,0.7)]">
                Mari Berdiskusi Mengenai Proyek Anda
            </h1>
            <div class="w-20 h-[2px] bg-[#C5A880] mx-auto mt-4"></div>
            <p class="text-slate-350 text-slate-300 max-w-2xl mx-auto text-sm sm:text-base leading-relaxed font-light mt-4 drop-shadow-[0_2px_5px_rgba(0,0,0,0.6)]">
                Kami siap membantu Anda merencanakan konstruksi sipil berpresisi tinggi, perancangan fasad eksterior, maupun pengerjaan interior mewah.
            </p>
        </div>
    </section>

    <!-- Main Content Section -->
    <section class="py-24 bg-[#0A1E13] relative overflow-hidden">
        <!-- Watermark background texture -->
        <div class="absolute inset-0 z-0 opacity-[0.03] pointer-events-none mix-blend-overlay">
            <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?w=1920&h=1080&fit=crop" class="w-full h-full object-cover select-none" alt="Watermark bg">
        </div>
        <div class="absolute left-1/2 top-1/4 w-[500px] h-[500px] bg-[#C5A880]/5 rounded-full blur-[120px] -translate-x-1/2"></div>
        <div class="absolute inset-0 luxury-grid-pattern opacity-5"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-16">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                
                <!-- Left Column: Contact Cards -->
                <div class="lg:col-span-5 space-y-6 reveal-on-scroll">
                    <div class="space-y-2">
                        <span class="text-[#C5A880] text-xs font-bold uppercase tracking-widest block">Informasi Kontak</span>
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-white font-serif">Kantor & Layanan Resmi</h2>
                        <p class="text-xs sm:text-sm text-slate-400 font-light leading-relaxed">
                            Hubungi perwakilan kantor kami atau silakan kirimkan inquiry konsultasi Anda melalui formulir di samping.
                        </p>
                    </div>

                    <div class="space-y-4 pt-4">
                        <!-- Alamat Card -->
                        <div class="p-5 rounded-2xl border border-white/10 bg-white/5 backdrop-blur-md shadow-xl flex items-start space-x-4 hover:border-[#C5A880]/30 transition-all duration-300">
                            <div class="w-10 h-10 rounded-xl bg-[#C5A880]/10 text-[#C5A880] flex items-center justify-center font-bold flex-shrink-0 text-lg border border-[#C5A880]/20"><i class="fa-solid fa-map-location-dot"></i></div>
                            <div class="flex-1">
                                <span class="text-[10px] text-[#C5A880] font-bold uppercase tracking-wider block">Alamat Kantor</span>
                                <span class="text-slate-200 font-semibold text-xs sm:text-sm block mt-1 leading-relaxed">{{ \App\Models\Setting::get('contact_address') }}</span>
                            </div>
                        </div>

                        <!-- Telepon Card -->
                        <div class="p-5 rounded-2xl border border-white/10 bg-white/5 backdrop-blur-md shadow-xl flex items-start space-x-4 hover:border-[#C5A880]/30 transition-all duration-300">
                            <div class="w-10 h-10 rounded-xl bg-[#C5A880]/10 text-[#C5A880] flex items-center justify-center font-bold flex-shrink-0 text-lg border border-[#C5A880]/20"><i class="fa-solid fa-phone"></i></div>
                            <div class="flex-1">
                                <span class="text-[10px] text-[#C5A880] font-bold uppercase tracking-wider block">Telepon Kantor</span>
                                <span class="text-slate-200 font-semibold text-xs sm:text-sm block mt-1 leading-relaxed">{{ \App\Models\Setting::get('contact_phone') }}</span>
                            </div>
                        </div>

                        <!-- Email Card -->
                        <div class="p-5 rounded-2xl border border-white/10 bg-white/5 backdrop-blur-md shadow-xl flex items-start space-x-4 hover:border-[#C5A880]/30 transition-all duration-300">
                            <div class="w-10 h-10 rounded-xl bg-[#C5A880]/10 text-[#C5A880] flex items-center justify-center font-bold flex-shrink-0 text-lg border border-[#C5A880]/20"><i class="fa-solid fa-envelope"></i></div>
                            <div class="flex-1">
                                <span class="text-[10px] text-[#C5A880] font-bold uppercase tracking-wider block">Alamat Email</span>
                                <span class="text-slate-200 font-semibold text-xs sm:text-sm block mt-1 leading-relaxed">{{ \App\Models\Setting::get('contact_email') }}</span>
                            </div>
                        </div>

                        <!-- Legalitas Card -->
                        <div class="p-5 rounded-2xl border border-white/10 bg-white/5 backdrop-blur-md shadow-xl flex items-start space-x-4 hover:border-[#C5A880]/30 transition-all duration-300">
                            <div class="w-10 h-10 rounded-xl bg-[#C5A880]/10 text-[#C5A880] flex items-center justify-center font-bold flex-shrink-0 text-lg border border-[#C5A880]/20"><i class="fa-solid fa-scale-balanced"></i></div>
                            <div class="flex-1">
                                <span class="text-[10px] text-[#C5A880] font-bold uppercase tracking-wider block">Legalitas Resmi Perusahaan</span>
                                <span class="text-slate-300 text-xs block mt-1 leading-relaxed">
                                    NIB: <span class="font-mono font-bold text-white">{{ \App\Models\Setting::get('legal_nib') }}</span> | 
                                    SIUJK: <span class="font-mono font-bold text-white">{{ \App\Models\Setting::get('legal_siujk') }}</span>
                                </span>
                            </div>
                        </div>

                        <!-- Media Sosial Card -->
                        <div class="p-5 rounded-2xl border border-white/10 bg-white/5 backdrop-blur-md shadow-xl flex flex-col space-y-4 hover:border-[#C5A880]/30 transition-all duration-300">
                            <span class="text-[10px] text-[#C5A880] font-bold uppercase tracking-wider block">Kunjungi Media Sosial Resmi Kami</span>
                            <div class="flex flex-wrap gap-3.5 pt-1">
                                @if(\App\Models\Setting::get('social_instagram', 'https://instagram.com'))
                                    <a href="{{ \App\Models\Setting::get('social_instagram', 'https://instagram.com') }}" target="_blank" rel="noopener" class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 hover:bg-[#C5A880] hover:text-[#0A1E13] flex items-center justify-center text-slate-300 hover:scale-110 hover:-translate-y-0.5 transition-all duration-300">
                                        <i class="fa-brands fa-instagram text-lg"></i>
                                    </a>
                                @endif
                                @if(\App\Models\Setting::get('social_tiktok', 'https://tiktok.com'))
                                    <a href="{{ \App\Models\Setting::get('social_tiktok', 'https://tiktok.com') }}" target="_blank" rel="noopener" class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 hover:bg-[#C5A880] hover:text-[#0A1E13] flex items-center justify-center text-slate-300 hover:scale-110 hover:-translate-y-0.5 transition-all duration-300">
                                        <i class="fa-brands fa-tiktok text-lg"></i>
                                    </a>
                                @endif
                                @if(\App\Models\Setting::get('social_twitter', 'https://twitter.com'))
                                    <a href="{{ \App\Models\Setting::get('social_twitter', 'https://twitter.com') }}" target="_blank" rel="noopener" class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 hover:bg-[#C5A880] hover:text-[#0A1E13] flex items-center justify-center text-slate-300 hover:scale-110 hover:-translate-y-0.5 transition-all duration-300">
                                        <i class="fa-brands fa-x-twitter text-lg"></i>
                                    </a>
                                @endif
                                @if(\App\Models\Setting::get('social_facebook', 'https://facebook.com'))
                                    <a href="{{ \App\Models\Setting::get('social_facebook', 'https://facebook.com') }}" target="_blank" rel="noopener" class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 hover:bg-[#C5A880] hover:text-[#0A1E13] flex items-center justify-center text-slate-300 hover:scale-110 hover:-translate-y-0.5 transition-all duration-300">
                                        <i class="fa-brands fa-facebook-f text-lg"></i>
                                    </a>
                                @endif
                                @if(\App\Models\Setting::get('social_youtube', 'https://youtube.com'))
                                    <a href="{{ \App\Models\Setting::get('social_youtube', 'https://youtube.com') }}" target="_blank" rel="noopener" class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 hover:bg-[#C5A880] hover:text-[#0A1E13] flex items-center justify-center text-slate-300 hover:scale-110 hover:-translate-y-0.5 transition-all duration-300">
                                        <i class="fa-brands fa-youtube text-lg"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Glassmorphic Inquiry Form -->
                <div class="lg:col-span-7 reveal-on-scroll delay-100">
                    <div class="p-6 sm:p-10 rounded-[2rem] border border-white/10 bg-white/5 backdrop-blur-md shadow-2xl space-y-6">
                        <div class="space-y-1">
                            <h3 class="font-extrabold text-white text-lg sm:text-xl font-serif">Kirimkan Inquiry Rencana Pembangunan</h3>
                            <p class="text-xs text-slate-400 font-light">Isi detail di bawah ini agar analis RAB & arsitek kami dapat menyusun estimasi awal gratis.</p>
                        </div>

                        <!-- Success / Error Message -->
                        @if(session('success'))
                            <div class="p-4 rounded-xl border border-[#C5A880]/30 bg-[#C5A880]/10 text-slate-200 text-xs sm:text-sm flex items-start space-x-2.5 animate-fade-in">
                                <i class="fa-solid fa-circle-check text-[#C5A880] text-lg mt-0.5"></i>
                                <span>{{ session('success') }}</span>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="p-4 rounded-xl border border-rose-500/20 bg-rose-500/10 text-rose-350 text-xs space-y-1 animate-fade-in">
                                @foreach($errors->all() as $err)
                                    <p><i class="fa-solid fa-circle-exclamation mr-1.5"></i> {{ $err }}</p>
                                @endforeach
                            </div>
                        @endif

                        <!-- Form -->
                        <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4 text-slate-300">
                            @csrf
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label for="name" class="block text-[10px] font-bold text-[#C5A880] uppercase tracking-wider mb-1.5">Nama Lengkap*</label>
                                    <input type="text" name="name" id="name" value="{{ old('name') }}" required placeholder="Contoh: Budi Santoso"
                                           class="block w-full px-4 py-3 bg-black/20 border border-white/10 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#C5A880]/50 focus:border-transparent text-white placeholder-slate-500 font-light">
                                </div>
                                <div>
                                    <label for="phone" class="block text-[10px] font-bold text-[#C5A880] uppercase tracking-wider mb-1.5">Nomor WA / Telepon*</label>
                                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required placeholder="Contoh: 081234567890"
                                           class="block w-full px-4 py-3 bg-black/20 border border-white/10 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#C5A880]/50 focus:border-transparent text-white placeholder-slate-500 font-light font-mono">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label for="email" class="block text-[10px] font-bold text-[#C5A880] uppercase tracking-wider mb-1.5">Alamat Email (Opsional)</label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Contoh: budi@gmail.com"
                                           class="block w-full px-4 py-3 bg-black/20 border border-white/10 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#C5A880]/50 focus:border-transparent text-white placeholder-slate-500 font-light">
                                </div>
                                <div>
                                    <label for="project_type" class="block text-[10px] font-bold text-[#C5A880] uppercase tracking-wider mb-1.5">Tipe Pekerjaan Proyek</label>
                                    <select name="project_type" id="project_type"
                                            class="block w-full px-4 py-3 bg-black/20 border border-white/10 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#C5A880]/50 focus:border-transparent text-white font-light">
                                        <option value="Bangun Baru" class="bg-[#0A1E13]">Bangun Baru Properti</option>
                                        <option value="Renovasi" class="bg-[#0A1E13]">Renovasi / Pembangunan Ulang</option>
                                        <option value="Desain Interior" class="bg-[#0A1E13]">Desain Interior & Custom Fit-Out</option>
                                        <option value="Eksterior & Lanskap" class="bg-[#0A1E13]">Fasad Eksterior & Lanskap</option>
                                        <option value="Sipil / Infrastruktur" class="bg-[#0A1E13]">Konstruksi Sipil & Jalan</option>
                                        <option value="Lainnya" class="bg-[#0A1E13]">Lainnya</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label for="estimated_budget" class="block text-[10px] font-bold text-[#C5A880] uppercase tracking-wider mb-1.5">Estimasi Alokasi Anggaran (Rupiah)</label>
                                <input type="number" name="estimated_budget" id="estimated_budget" value="{{ old('estimated_budget') }}" placeholder="Contoh: 500000000 (Tanpa titik/koma)"
                                       class="block w-full px-4 py-3 bg-black/20 border border-white/10 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#C5A880]/50 focus:border-transparent text-white placeholder-slate-500 font-light font-mono">
                            </div>

                            <div>
                                <label for="message" class="block text-[10px] font-bold text-[#C5A880] uppercase tracking-wider mb-1.5">Catatan Rencana / Kebutuhan Bangunan</label>
                                <textarea name="message" id="message" rows="4" placeholder="Jelaskan kebutuhan Anda secara singkat (misal: luas lahan, jumlah kamar tidur, estimasi waktu serah terima, dll.)"
                                          class="block w-full px-4 py-3 bg-black/20 border border-white/10 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#C5A880]/50 focus:border-transparent text-white placeholder-slate-500 font-light leading-relaxed">{{ old('message') }}</textarea>
                            </div>

                            <div class="pt-2">
                                <button type="submit" 
                                        class="w-full inline-flex items-center justify-center px-6 py-4 bg-gradient-to-r from-[#C5A880] to-[#B4966B] hover:from-[#B4966B] hover:to-[#A3855A] text-[#0A1E13] font-bold text-xs rounded-xl hover:shadow-lg hover:shadow-[#C5A880]/20 hover:scale-[1.02] active:scale-95 transition-all duration-300 uppercase tracking-wider cursor-pointer shadow-md shadow-[#C5A880]/10 border border-[#C5A880]/20">
                                    <i class="fa-solid fa-paper-plane mr-2 text-[#0A1E13]"></i> Kirim Pesan Inquiry Konsultasi
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

            <!-- Full Width Google Map Iframe -->
            <div class="reveal-on-scroll">
                <div class="bg-black/25 rounded-[2rem] border border-white/15 p-5 shadow-2xl space-y-4 backdrop-blur-md">
                    <span class="text-[10px] text-[#C5A880] font-bold uppercase tracking-wider block px-2"><i class="fa-solid fa-map-location-dot mr-1"></i> Lokasi Fisik Operasional Kantor Kami</span>
                    <div class="w-full h-96 rounded-2xl overflow-hidden border border-[#C5A880]/20 bg-slate-900 relative">
                        <iframe class="w-full h-full border-0 opacity-85 hover:opacity-100 transition-opacity duration-300"
                            src="{{ \App\Models\Setting::get('contact_map_iframe', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126920.24580211756!2d106.74609139169922!3d-6.19658253139369!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1406e40994f%3A0x600585154340a6b!2sJakarta%20Barat%2C%20Kota%20Jakarta%20Barat%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid') }}"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
