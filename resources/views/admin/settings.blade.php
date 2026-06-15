@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto space-y-6 animate-fade-in">
    <!-- Header -->
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Pengaturan Website</h1>
        <p class="text-sm text-slate-500">Sesuaikan seluruh teks statis, kontak, legalitas, dan tautan footage media secara dinamis.</p>
    </div>

    <!-- Errors -->
    @if($errors->any())
        <div class="p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs space-y-1">
            @foreach($errors->all() as $err)
                <p><i class="fa-solid fa-circle-exclamation mr-1"></i> {{ $err }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Card 1: Branding & Identitas -->
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 space-y-6"
             x-data="{ 
                colorPrimary: '{{ old('color_brand_primary', $settings['color_brand_primary'] ?? '#113F27') }}',
                colorPrimaryHover: '{{ old('color_brand_primary_hover', $settings['color_brand_primary_hover'] ?? '#0C2B1B') }}',
                colorAccent: '{{ old('color_brand_accent', $settings['color_brand_accent'] ?? '#C5A880') }}',
                colorAccentHover: '{{ old('color_brand_accent_hover', $settings['color_brand_accent_hover'] ?? '#B4966B') }}'
             }">
            <h3 class="font-bold text-slate-800 text-sm uppercase tracking-wide border-b border-slate-100 pb-2.5">
                <i class="fa-solid fa-address-card text-brand-accent mr-2"></i> Identitas Website & Tagline
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="site_name" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Nama Perusahaan*</label>
                    <input type="text" name="site_name" id="site_name" value="{{ old('site_name', $settings['site_name']) }}" required
                           class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">
                </div>
                <div>
                    <label for="site_tagline" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Tagline Perusahaan*</label>
                    <input type="text" name="site_tagline" id="site_tagline" value="{{ old('site_tagline', $settings['site_tagline']) }}" required
                           class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">
                </div>
            </div>

            <!-- Custom Brand Colors Picker Section -->
            <div class="border-t border-slate-100 pt-5 mt-4 space-y-4">
                <div class="flex flex-col">
                    <h4 class="font-bold text-slate-700 text-xs uppercase tracking-wider">Skema Warna Kustom Perusahaan</h4>
                    <p class="text-[11px] text-slate-400">Atur skema warna utama website secara dinamis (warna default: Hijau Pine #113F27 dan Emas #C5A880).</p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                    <div>
                        <label for="color_brand_primary" class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">Warna Utama (Hijau)*</label>
                        <div class="flex gap-2 items-center">
                            <input type="color" name="color_brand_primary" id="color_brand_primary" x-model="colorPrimary" required
                                   class="h-10 w-12 rounded-xl border border-slate-300 cursor-pointer p-0.5 bg-white">
                            <input type="text" :value="colorPrimary" readonly
                                   class="block w-full px-3 py-2 border border-slate-200 bg-slate-50 text-xs rounded-xl font-mono text-slate-600 focus:outline-none">
                        </div>
                    </div>
                    <div>
                        <label for="color_brand_primary_hover" class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">Warna Utama Hover*</label>
                        <div class="flex gap-2 items-center">
                            <input type="color" name="color_brand_primary_hover" id="color_brand_primary_hover" x-model="colorPrimaryHover" required
                                   class="h-10 w-12 rounded-xl border border-slate-300 cursor-pointer p-0.5 bg-white">
                            <input type="text" :value="colorPrimaryHover" readonly
                                   class="block w-full px-3 py-2 border border-slate-200 bg-slate-50 text-xs rounded-xl font-mono text-slate-600 focus:outline-none">
                        </div>
                    </div>
                    <div>
                        <label for="color_brand_accent" class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">Warna Aksen (Emas)*</label>
                        <div class="flex gap-2 items-center">
                            <input type="color" name="color_brand_accent" id="color_brand_accent" x-model="colorAccent" required
                                   class="h-10 w-12 rounded-xl border border-slate-300 cursor-pointer p-0.5 bg-white">
                            <input type="text" :value="colorAccent" readonly
                                   class="block w-full px-3 py-2 border border-slate-200 bg-slate-50 text-xs rounded-xl font-mono text-slate-600 focus:outline-none">
                        </div>
                    </div>
                    <div>
                        <label for="color_brand_accent_hover" class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">Warna Aksen Hover*</label>
                        <div class="flex gap-2 items-center">
                            <input type="color" name="color_brand_accent_hover" id="color_brand_accent_hover" x-model="colorAccentHover" required
                                   class="h-10 w-12 rounded-xl border border-slate-300 cursor-pointer p-0.5 bg-white">
                            <input type="text" :value="colorAccentHover" readonly
                                   class="block w-full px-3 py-2 border border-slate-200 bg-slate-50 text-xs rounded-xl font-mono text-slate-600 focus:outline-none">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 1.5: Profil Perusahaan (Tentang Kami) -->
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 space-y-4">
            <h3 class="font-bold text-slate-800 text-sm uppercase tracking-wide border-b border-slate-100 pb-2.5">
                <i class="fa-solid fa-building text-brand-accent mr-2"></i> Profil Perusahaan (Tentang Kami)
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-4 gap-6">
                <div class="sm:col-span-1">
                    <label for="company_established_year" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Tahun Berdiri*</label>
                    <input type="number" name="company_established_year" id="company_established_year" value="{{ old('company_established_year', $settings['company_established_year']) }}" required min="1900" max="2100"
                           class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">
                </div>
                <div class="sm:col-span-1">
                    <label for="stat_completed_projects" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Jumlah Proyek Selesai*</label>
                    <input type="number" name="stat_completed_projects" id="stat_completed_projects" value="{{ old('stat_completed_projects', $settings['stat_completed_projects'] ?? '130') }}" required min="0"
                           class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">
                    <p class="text-[10px] text-slate-400 mt-1">*Angka ini tampil di hero beranda (misal: 130+).</p>
                </div>
                <div class="sm:col-span-2">
                    <label for="company_about_us_title" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Judul Utama Profil*</label>
                    <input type="text" name="company_about_us_title" id="company_about_us_title" value="{{ old('company_about_us_title', $settings['company_about_us_title']) }}" required
                           class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">
                </div>
            </div>
            <div>
                <label for="company_about_us_text" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Deskripsi / Narasi Tentang Kami*</label>
                <textarea name="company_about_us_text" id="company_about_us_text" rows="4" required
                          class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">{{ old('company_about_us_text', $settings['company_about_us_text']) }}</textarea>
            </div>
        </div>

        <!-- Card 2: Seksi Hero Beranda -->
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 space-y-4">
            <h3 class="font-bold text-slate-800 text-sm uppercase tracking-wide border-b border-slate-100 pb-2.5">
                <i class="fa-solid fa-desktop text-brand-accent mr-2"></i> Teks & Latar Belakang Hero Beranda
            </h3>
            <div class="space-y-4">
                <div>
                    <label for="hero_title" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Judul Utama Hero*</label>
                    <input type="text" name="hero_title" id="hero_title" value="{{ old('hero_title', $settings['hero_title']) }}" required
                           class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">
                </div>
                <div>
                    <label for="hero_subtitle" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Sub-judul / Deskripsi Hero*</label>
                    <textarea name="hero_subtitle" id="hero_subtitle" rows="3" required
                              class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">{{ old('hero_subtitle', $settings['hero_subtitle']) }}</textarea>
                </div>
                <div>
                    <label for="hero_video_url" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Tautan Video Background Hero (Format MP4 Langsung)</label>
                    <input type="url" name="hero_video_url" id="hero_video_url" value="{{ old('hero_video_url', $settings['hero_video_url']) }}" placeholder="https://domain.com/loop-video.mp4"
                           class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent font-mono">
                    <p class="text-[10px] text-slate-400 mt-1">*Disarankan video cinematic durasi 15-30 detik tanpa suara untuk background loop.</p>
                </div>
            </div>
        </div>

        <!-- Card 3: Seksi Video Utama -->
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 space-y-4">
            <h3 class="font-bold text-slate-800 text-sm uppercase tracking-wide border-b border-slate-100 pb-2.5">
                <i class="fa-solid fa-play text-brand-accent mr-2"></i> Seksi Video Utama (Antara Layanan & Portofolio)
            </h3>
            <div class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="featured_video_title" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Judul Seksi Video*</label>
                        <input type="text" name="featured_video_title" id="featured_video_title" value="{{ old('featured_video_title', $settings['featured_video_title']) }}" required
                               class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">
                    </div>
                    <div>
                        <label for="featured_video_url" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Tautan Iframe Video Utama (YouTube Embed)*</label>
                        <input type="url" name="featured_video_url" id="featured_video_url" value="{{ old('featured_video_url', $settings['featured_video_url']) }}" required placeholder="https://www.youtube.com/embed/code"
                               class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent font-mono">
                    </div>
                </div>
                <div>
                    <label for="featured_video_subtitle" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Deskripsi Seksi Video</label>
                    <textarea name="featured_video_subtitle" id="featured_video_subtitle" rows="2"
                              class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">{{ old('featured_video_subtitle', $settings['featured_video_subtitle']) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Card 4: Kontak & Alamat -->
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 space-y-4">
            <h3 class="font-bold text-slate-800 text-sm uppercase tracking-wide border-b border-slate-100 pb-2.5">
                <i class="fa-solid fa-phone text-brand-accent mr-2"></i> Informasi Kontak & Media Sosial
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div>
                    <label for="contact_whatsapp" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">WhatsApp Penerima Leads (Angka Saja)*</label>
                    <input type="text" name="contact_whatsapp" id="contact_whatsapp" value="{{ old('contact_whatsapp', $settings['contact_whatsapp']) }}" required placeholder="Contoh: 628123456789"
                           class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent font-semibold">
                    <p class="text-[10px] text-slate-400 mt-1">*Gunakan kode negara (62) di depan, tanpa spasi atau strip.</p>
                </div>
                <div>
                    <label for="contact_phone" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Nomor Telepon Kantor*</label>
                    <input type="text" name="contact_phone" id="contact_phone" value="{{ old('contact_phone', $settings['contact_phone']) }}" required placeholder="+62 21-8889-9900"
                           class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">
                </div>
                <div>
                    <label for="contact_email" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Alamat Email Kantor*</label>
                    <input type="email" name="contact_email" id="contact_email" value="{{ old('contact_email', $settings['contact_email']) }}" required placeholder="info@apex.co.id"
                           class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">
                </div>
            </div>
            <div>
                <label for="contact_address" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Alamat Kantor Lengkap*</label>
                <textarea name="contact_address" id="contact_address" rows="2.5" required
                          class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">{{ old('contact_address', $settings['contact_address']) }}</textarea>
            </div>
            <div>
                <label for="contact_map_iframe" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Link Embed Google Maps (Iframe Src)*</label>
                <textarea name="contact_map_iframe" id="contact_map_iframe" rows="2.5" required placeholder="Contoh: https://www.google.com/maps/embed?pb=..."
                          class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">{{ old('contact_map_iframe', $settings['contact_map_iframe']) }}</textarea>
                <p class="text-[10px] text-slate-400 mt-1">*Salin hanya link URL di dalam atribut 'src="..."' dari kode embed Google Maps.</p>
            </div>
        </div>

        <!-- Card 4.5: Media Sosial Resmi -->
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 space-y-4">
            <h3 class="font-bold text-slate-800 text-sm uppercase tracking-wide border-b border-slate-100 pb-2.5">
                <i class="fa-solid fa-share-nodes text-brand-accent mr-2"></i> Tautan Media Sosial Resmi
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="social_facebook" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Facebook URL</label>
                    <input type="url" name="social_facebook" id="social_facebook" value="{{ old('social_facebook', $settings['social_facebook'] ?? '') }}" placeholder="https://facebook.com/username"
                           class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">
                </div>
                <div>
                    <label for="social_instagram" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Instagram URL</label>
                    <input type="url" name="social_instagram" id="social_instagram" value="{{ old('social_instagram', $settings['social_instagram'] ?? '') }}" placeholder="https://instagram.com/username"
                           class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">
                </div>
                <div>
                    <label for="social_twitter" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Twitter / X URL</label>
                    <input type="url" name="social_twitter" id="social_twitter" value="{{ old('social_twitter', $settings['social_twitter'] ?? '') }}" placeholder="https://twitter.com/username"
                           class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">
                </div>
                <div>
                    <label for="social_tiktok" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">TikTok URL</label>
                    <input type="url" name="social_tiktok" id="social_tiktok" value="{{ old('social_tiktok', $settings['social_tiktok'] ?? '') }}" placeholder="https://tiktok.com/@username"
                           class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">
                </div>
                <div class="sm:col-span-2">
                    <label for="social_youtube" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">YouTube Channel URL</label>
                    <input type="url" name="social_youtube" id="social_youtube" value="{{ old('social_youtube', $settings['social_youtube'] ?? '') }}" placeholder="https://youtube.com/c/channelname"
                           class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">
                </div>
            </div>
        </div>

        <!-- Card 5: Kredibilitas & Legalitas -->
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 space-y-4">
            <h3 class="font-bold text-slate-800 text-sm uppercase tracking-wide border-b border-slate-100 pb-2.5">
                <i class="fa-solid fa-scale-balanced text-brand-accent mr-2"></i> Legalitas Hukum & Kredibilitas
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="legal_nib" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Nomor NIB*</label>
                    <input type="text" name="legal_nib" id="legal_nib" value="{{ old('legal_nib', $settings['legal_nib']) }}" required
                           class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">
                </div>
                <div>
                    <label for="legal_siujk" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Nomor SIUJK*</label>
                    <input type="text" name="legal_siujk" id="legal_siujk" value="{{ old('legal_siujk', $settings['legal_siujk']) }}" required
                           class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">
                </div>
            </div>
        </div>

        <!-- Card 5.5: Background Gambar Banner Halaman -->
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 space-y-6">
            <h3 class="font-bold text-slate-800 text-sm uppercase tracking-wide border-b border-slate-100 pb-2.5">
                <i class="fa-solid fa-image text-brand-accent mr-2"></i> Gambar Latar Belakang Banner Halaman Publik
            </h3>
            <p class="text-xs text-slate-500">Unggah berkas gambar (Maks 4MB) atau masukkan tautan URL eksternal untuk melapis banner judul di atas halaman publik.</p>
            
            <div class="space-y-6 divide-y divide-slate-100">
                @php
                    $pagesList = [
                        'profile' => 'Halaman Profil Perusahaan',
                        'services' => 'Halaman Layanan Kami',
                        'projects' => 'Halaman Portofolio Proyek',
                        'gallery' => 'Halaman Galeri Foto',
                        'video_gallery' => 'Halaman Galeri Video',
                        'testimonials' => 'Halaman Testimoni Klien',
                        'articles' => 'Halaman Artikel & Berita',
                        'contact' => 'Halaman Kontak Hubungi Kami',
                    ];
                @endphp
                @foreach ($pagesList as $pKey => $pLabel)
                    @php
                        $dbImg = $settings["banner_{$pKey}_img"] ?? '';
                        $dbUrl = $settings["banner_{$pKey}_url"] ?? '';
                    @endphp
                    <div class="pt-6 first:pt-0 grid grid-cols-1 md:grid-cols-12 gap-6 items-start">
                        <!-- Step Label and Preview -->
                        <div class="md:col-span-4 space-y-2">
                            <span class="text-xs font-bold text-slate-700 uppercase tracking-wider block">{{ $pLabel }}</span>
                            
                            <!-- Current Image Container -->
                            <div id="current-banner-{{ $pKey }}-container" class="space-y-1.5">
                                @if($dbImg)
                                    <div class="w-32 h-20 rounded-lg overflow-hidden border border-slate-200 bg-slate-100">
                                        <img src="{{ $dbImg }}" class="w-full h-full object-cover" alt="Preview">
                                    </div>
                                    <span class="text-[10px] text-slate-400 block truncate max-w-[200px]" title="{{ $dbImg }}">URL: {{ basename($dbImg) }}</span>
                                @else
                                    <div class="w-32 h-20 rounded-lg border border-dashed border-slate-300 bg-slate-50 flex items-center justify-center text-slate-400 text-xs">
                                        Belum ada gambar
                                    </div>
                                @endif
                            </div>

                            <!-- New Image Preview Container -->
                            <div id="preview-banner-{{ $pKey }}-container" class="space-y-1.5 hidden">
                                <span class="text-[10px] text-brand-primary font-bold uppercase tracking-wider block">Preview Baru:</span>
                                <div class="w-32 h-20 rounded-lg overflow-hidden border border-slate-200 bg-slate-100">
                                    <img id="preview-banner-{{ $pKey }}-img" class="w-full h-full object-cover" alt="Selected Preview">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Inputs -->
                        <div class="md:col-span-8 grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="banner_{{ $pKey }}_file" class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Unggah Gambar Baru (Maks 4MB)</label>
                                <input type="file" name="banner_{{ $pKey }}_file" id="banner_{{ $pKey }}_file" accept="image/*"
                                       onchange="previewImage(this, 'preview-banner-{{ $pKey }}-container', 'preview-banner-{{ $pKey }}-img'); if (this.files && this.files[0]) { document.getElementById('current-banner-{{ $pKey }}-container')?.classList.add('hidden'); } else { document.getElementById('current-banner-{{ $pKey }}-container')?.classList.remove('hidden'); }"
                                       class="block w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-brand-primary/5 file:text-brand-primary hover:file:bg-brand-primary/10">
                            </div>
                            <div>
                                <label for="banner_{{ $pKey }}_url" class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Atau Masukkan Tautan URL Gambar</label>
                                <input type="url" name="banner_{{ $pKey }}_url" id="banner_{{ $pKey }}_url" value="{{ old("banner_{$pKey}_url", $dbUrl) }}" placeholder="https://unsplash.com/... atau https://domain.com/img.jpg"
                                       class="block w-full px-3 py-2 rounded-xl border border-slate-300 text-xs focus:outline-none focus:ring-2 focus:ring-brand-accent">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Card 6: Gambar Tahapan Kerja Konstruksi (Workflow) -->
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 space-y-6">
            <h3 class="font-bold text-slate-800 text-sm uppercase tracking-wide border-b border-slate-100 pb-2.5">
                <i class="fa-solid fa-images text-brand-accent mr-2"></i> Gambar Tahapan Kerja Pembangunan (Workflow)
            </h3>
            
            <p class="text-xs text-slate-500">Pilih salah satu metode: Unggah file gambar baru ATAU tempelkan tautan URL gambar eksternal.</p>

            <div class="space-y-6 divide-y divide-slate-100">
                @for ($i = 1; $i <= 5; $i++)
                    @php
                        $stepNames = [
                            1 => 'Langkah 1: Konsultasi & Survey Lahan',
                            2 => 'Langkah 2: Perancangan Arsitektur & RAB',
                            3 => 'Langkah 3: Kesepakatan Kontrak (SPK)',
                            4 => 'Langkah 4: Pelaksanaan Konstruksi Fisik',
                            5 => 'Langkah 5: QC Akhir, Handover & Garansi',
                        ];
                        $dbImg = $settings["workflow_step{$i}_img"];
                    @endphp
                    <div class="pt-6 first:pt-0 grid grid-cols-1 md:grid-cols-12 gap-6 items-start">
                        <!-- Step Label and Preview -->
                        <div class="md:col-span-4 space-y-2">
                            <span class="text-xs font-bold text-slate-700 uppercase tracking-wider block">{{ $stepNames[$i] }}</span>
                            
                            <!-- Current Image Container -->
                            <div id="current-workflow-{{ $i }}-container" class="space-y-1.5">
                                @if($dbImg)
                                    <div class="w-32 h-20 rounded-lg overflow-hidden border border-slate-200 bg-slate-100">
                                        <img src="{{ $dbImg }}" class="w-full h-full object-cover" alt="Preview">
                                    </div>
                                    <span class="text-[10px] text-slate-400 block truncate" title="{{ $dbImg }}">URL Saat Ini: {{ basename($dbImg) }}</span>
                                @else
                                    <div class="w-32 h-20 rounded-lg border border-dashed border-slate-300 bg-slate-50 flex items-center justify-center text-slate-400 text-xs">
                                        Belum ada gambar
                                    </div>
                                @endif
                            </div>

                            <!-- New Image Preview Container -->
                            <div id="preview-workflow-{{ $i }}-container" class="space-y-1.5 hidden">
                                <span class="text-[10px] text-brand-primary font-bold uppercase tracking-wider block">Preview Gambar Baru:</span>
                                <div class="w-32 h-20 rounded-lg overflow-hidden border border-slate-200 bg-slate-100">
                                    <img id="preview-workflow-{{ $i }}-img" class="w-full h-full object-cover" alt="Selected Preview">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Inputs -->
                        <div class="md:col-span-8 grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="workflow_step{{ $i }}_file" class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Unggah Gambar Baru (Maks 4MB)</label>
                                <input type="file" name="workflow_step{{ $i }}_file" id="workflow_step{{ $i }}_file" accept="image/*"
                                       onchange="previewImage(this, 'preview-workflow-{{ $i }}-container', 'preview-workflow-{{ $i }}-img'); if (this.files && this.files[0]) { document.getElementById('current-workflow-{{ $i }}-container')?.classList.add('hidden'); } else { document.getElementById('current-workflow-{{ $i }}-container')?.classList.remove('hidden'); }"
                                       class="block w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-brand-primary/5 file:text-brand-primary hover:file:bg-brand-primary/10">
                            </div>
                            <div>
                                <label for="workflow_step{{ $i }}_url" class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Atau Masukkan Tautan URL Gambar</label>
                                <input type="url" name="workflow_step{{ $i }}_url" id="workflow_step{{ $i }}_url" value="{{ old("workflow_step{$i}_url", $settings["workflow_step{$i}_url"]) }}" placeholder="https://unsplash.com/... atau https://domain.com/img.jpg"
                                       class="block w-full px-3 py-2 rounded-xl border border-slate-300 text-xs focus:outline-none focus:ring-2 focus:ring-brand-accent">
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        <!-- Form Submit -->
        <div class="flex justify-end pt-2">
            <button type="submit" 
                    class="px-8 py-4 rounded-xl bg-gradient-to-r from-[#C5A880] to-[#B4966B] hover:from-[#B4966B] hover:to-[#A3855A] text-[#0A1E13] font-black text-sm uppercase tracking-wider hover:scale-105 active:scale-95 transition-all duration-300 shadow-md shadow-[#C5A880]/20 cursor-pointer">
                Simpan Semua Pengaturan
            </button>
        </div>
    </form>
</div>
@endsection

