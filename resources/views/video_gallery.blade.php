@extends('layouts.app')

@section('title', 'Galeri Video Proyek - ' . \App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara'))
@section('meta_description', 'Tonton video dokumentasi pengerjaan sipil berat, konstruksi, dan interior finishing dari ' . \App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara') . '.')

@section('content')
    <!-- Banner Space Filler -->
    <div class="h-20 bg-[#0A1E13]"></div>

    <!-- Header Section -->
    <section class="relative bg-cover bg-center bg-fixed py-28 border-b border-[#C5A880]/15 overflow-hidden"
             style="background-image: url('{{ \App\Models\Setting::get('banner_video_gallery_img', 'https://images.unsplash.com/photo-1492691527719-9d1e07e534b4?w=1920&q=80') }}')">
        <!-- High-contrast dark gradient overlays -->
        <div class="absolute inset-0 bg-[#0A1E13]/85 mix-blend-multiply z-0"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-[#0A1E13] via-[#0A1E13]/60 to-[#0A1E13]/85 z-0"></div>
        <!-- Accent Glow and Pattern -->
        <div class="absolute right-0 top-0 w-96 h-96 bg-[#C5A880]/10 rounded-full blur-3xl z-0"></div>
        <div class="absolute inset-0 luxury-grid-pattern opacity-15 z-0"></div>

         <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4 z-10 reveal-on-scroll">
            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold bg-[#C5A880]/15 text-[#C5A880] border border-[#C5A880]/30 uppercase tracking-widest animate-pulse-gold">
                <i class="fa-solid fa-circle-play mr-1.5"></i> Video Showcase
            </span>
            <h1 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight leading-tight font-serif drop-shadow-[0_4px_10px_rgba(0,0,0,0.7)]">
                Galeri Video Dokumentasi
            </h1>
            <div class="w-20 h-[2px] bg-[#C5A880] mx-auto mt-4"></div>
            <p class="text-slate-300 max-w-2xl mx-auto text-sm sm:text-base leading-relaxed font-light mt-4 drop-shadow-[0_2px_5px_rgba(0,0,0,0.6)]">
                Tonton kompilasi video rekaman lapangan, progres konstruksi, hingga hasil akhir pengerjaan interior.
            </p>
        </div>
    </section>

    @php
        $firstVideo = $videos->first();
        $defaultVideoUrl = '';
        $defaultVideoIsLocal = false;
        
        $featuredVideoUrl = \App\Models\Setting::get('featured_video_url');
        $featuredEmbedUrl = $featuredVideoUrl;
        if ($featuredVideoUrl && preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $featuredVideoUrl, $match)) {
            $featuredEmbedUrl = "https://www.youtube.com/embed/" . $match[1];
        }

        if ($firstVideo) {
            $defaultVideoIsLocal = $firstVideo->is_local;
            if ($defaultVideoIsLocal) {
                $defaultVideoUrl = $firstVideo->play_url;
            } else {
                $defaultVideoUrl = $firstVideo->video_url;
                if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $defaultVideoUrl, $match)) {
                    $defaultVideoUrl = "https://www.youtube.com/embed/" . $match[1];
                }
            }
            $defaultVideoTitle = $firstVideo->title;
            $defaultVideoSubtitle = $firstVideo->description;
        } else {
            $defaultVideoUrl = $featuredEmbedUrl;
            $defaultVideoTitle = \App\Models\Setting::get('featured_video_title', 'Video Utama Dokumentasi');
            $defaultVideoSubtitle = \App\Models\Setting::get('featured_video_subtitle', 'Dokumentasi komprehensif pengerjaan tim sipil.');
        }
    @endphp

    <!-- Main Video Section & Grid -->
    <section class="py-24 bg-[#0A1E13] relative overflow-hidden" x-data="{ 
        activeVideoUrl: '{{ $defaultVideoUrl }}',
        activeVideoTitle: '{{ addslashes($defaultVideoTitle) }}',
        activeVideoSubtitle: '{{ addslashes($defaultVideoSubtitle ?? '') }}',
        activeVideoIsLocal: {{ $defaultVideoIsLocal ? 'true' : 'false' }},
        
        playVideo(url, title, subtitle, isLocal) {
            this.activeVideoUrl = url;
            this.activeVideoTitle = title;
            this.activeVideoSubtitle = subtitle;
            this.activeVideoIsLocal = isLocal;
            window.scrollTo({
                top: document.getElementById('player-section').offsetTop - 100,
                behavior: 'smooth'
            });
        }
    }">
        <!-- Decorative Glow -->
        <div class="absolute right-0 top-1/3 w-[500px] h-[500px] bg-[#C5A880]/5 rounded-full blur-[120px]"></div>
        <div class="absolute inset-0 luxury-grid-pattern opacity-5"></div>
        
        <!-- Watermark background -->
        <div class="absolute inset-0 z-0 opacity-[0.03] pointer-events-none mix-blend-overlay">
            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=1920&h=1080&fit=crop" class="w-full h-full object-cover select-none" alt="Watermark bg">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20 relative z-10">
            
            <!-- Main Video Player Section -->
            <div id="player-section" class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center bg-white/5 backdrop-blur-md rounded-3xl border border-white/10 p-6 sm:p-10 shadow-2xl reveal-on-scroll">
                <!-- Video Player Frame -->
                <div class="lg:col-span-8">
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl shadow-[#C5A880]/15 border border-[#C5A880]/20 bg-black w-full aspect-video">
                        <template x-if="activeVideoUrl && activeVideoIsLocal">
                            <video class="absolute top-0 left-0 w-full h-full border-0 object-cover" 
                                   :src="activeVideoUrl" 
                                   controls 
                                   playsinline>
                            </video>
                        </template>
                        <template x-if="activeVideoUrl && !activeVideoIsLocal">
                            <iframe class="absolute top-0 left-0 w-full h-full border-0" 
                                    :src="activeVideoUrl" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen>
                            </iframe>
                        </template>
                        <template x-if="!activeVideoUrl">
                            <div class="absolute inset-0 flex flex-col items-center justify-center text-slate-400 bg-black/80 p-6">
                                <i class="fa-solid fa-play text-5xl mb-4 text-[#C5A880] animate-pulse"></i>
                                <span class="font-bold text-sm text-center">Pilih video di bawah untuk memutar dokumentasi proyek.</span>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Video Description Info -->
                <div class="lg:col-span-4 space-y-6">
                    <span class="px-3.5 py-1.5 rounded-full text-[10px] font-bold bg-[#C5A880]/15 text-[#C5A880] border border-[#C5A880]/30 inline-block uppercase tracking-widest animate-pulse-gold">Sedang Diputar</span>
                    <h3 class="text-2xl font-bold text-white font-serif leading-tight" x-text="activeVideoTitle"></h3>
                    <p class="text-slate-300 text-sm leading-relaxed font-light" x-text="activeVideoSubtitle"></p>
                    
                    <div class="pt-6 border-t border-white/10">
                        <a href="https://api.whatsapp.com/send?phone={{ \App\Models\Setting::get('contact_whatsapp') }}&text=Halo%2C%20saya%20menonton%20video%20dokumentasi%20Anda%20dan%20tertarik%20untuk%20berkonsultasi." 
                           target="_blank"
                           class="w-full inline-flex items-center justify-center px-6 py-4 rounded-xl bg-gradient-to-r from-[#C5A880] to-[#B4966B] hover:from-[#B4966B] hover:to-[#A3855A] text-[#0A1E13] font-bold text-xs transition-all duration-300 shadow-md shadow-[#C5A880]/15 cursor-pointer uppercase tracking-wider">
                            <i class="fa-brands fa-whatsapp text-lg mr-2 text-[#0A1E13]"></i> Tanya Detail Pengerjaan Ini
                        </a>
                    </div>
                </div>
            </div>

            <!-- Other Project Videos Grid -->
            <div class="space-y-8 reveal-on-scroll">
                <h3 class="text-2xl font-bold text-white border-b border-white/5 pb-4 font-serif flex items-center">
                    <i class="fa-solid fa-folder-open text-[#C5A880] mr-3"></i> Album Video Dokumentasi
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    
                    <!-- Setting/Featured Video Card (Always Available if set & no videos uploaded yet) -->
                    @if($featuredVideoUrl && $videos->isEmpty())
                        <div class="group bg-white/5 rounded-3xl border border-white/10 shadow-sm overflow-hidden flex flex-col justify-between hover:shadow-2xl hover:border-[#C5A880]/30 transition-all duration-350">
                            <div class="relative h-48 bg-black overflow-hidden cursor-pointer" 
                                 @click="playVideo('{{ $featuredEmbedUrl }}', '{{ \App\Models\Setting::get('featured_video_title', 'Video Utama Dokumentasi') }}', '{{ \App\Models\Setting::get('featured_video_subtitle') }}', false)">
                                <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=1200&h=630&fit=crop" class="w-full h-full object-cover opacity-60 group-hover:scale-105 transition-transform duration-500" alt="Video cover">
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="w-14 h-14 rounded-full bg-[#C5A880] text-[#0A1E13] flex items-center justify-center text-lg shadow-lg group-hover:scale-110 transition-transform">
                                        <i class="fa-solid fa-play ml-0.5"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6 space-y-2">
                                <span class="text-[10px] text-[#C5A880] font-bold uppercase tracking-widest block">Featured Video</span>
                                <h4 class="font-bold text-white text-base font-serif group-hover:text-[#C5A880] transition-colors cursor-pointer"
                                    @click="playVideo('{{ $featuredEmbedUrl }}', '{{ \App\Models\Setting::get('featured_video_title', 'Video Utama Dokumentasi') }}', '{{ \App\Models\Setting::get('featured_video_subtitle') }}', false)">
                                    {{ \App\Models\Setting::get('featured_video_title', 'Video Utama Dokumentasi') }}
                                </h4>
                            </div>
                        </div>
                    @endif

                    <!-- Dynamic videos from database -->
                    @forelse($videos as $v)
                        @php
                            $isLocal = $v->is_local;
                            $playUrl = $v->play_url;
                            $youtubeId = '';
                            if (!$isLocal) {
                                if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $playUrl, $match)) {
                                    $playUrl = "https://www.youtube.com/embed/" . $match[1];
                                    $youtubeId = $match[1];
                                }
                            }
                            $thumbnailUrl = $youtubeId ? "https://img.youtube.com/vi/{$youtubeId}/mqdefault.jpg" : 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&h=450&fit=crop';
                        @endphp
                        <div class="group bg-white/5 rounded-3xl border border-white/10 shadow-sm overflow-hidden flex flex-col justify-between hover:shadow-2xl hover:border-[#C5A880]/30 transition-all duration-350">
                            <div class="relative h-48 bg-black overflow-hidden cursor-pointer" 
                                 @click="playVideo('{{ $playUrl }}', '{{ addslashes($v->title) }}', '{{ addslashes($v->description ?? '') }}', {{ $isLocal ? 'true' : 'false' }})">
                                @if($isLocal)
                                    <div class="w-full h-full bg-black/40 flex flex-col items-center justify-center relative p-6">
                                        <i class="fa-solid fa-file-video text-[#C5A880] text-5xl mb-2 opacity-80 group-hover:scale-105 transition-transform duration-300"></i>
                                        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Video Terunggah</span>
                                        <div class="absolute inset-0 bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            <div class="w-14 h-14 rounded-full bg-[#C5A880] text-[#0A1E13] flex items-center justify-center text-lg shadow-lg">
                                                <i class="fa-solid fa-play ml-0.5"></i>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <img src="{{ $thumbnailUrl }}" 
                                         class="w-full h-full object-cover opacity-65 group-hover:scale-105 transition-transform duration-500" 
                                         alt="{{ $v->title }}">
                                    <div class="absolute inset-0 bg-black/20 group-hover:bg-black/50 transition-colors duration-300 flex items-center justify-center">
                                        <div class="w-14 h-14 rounded-full bg-[#C5A880] text-[#0A1E13] flex items-center justify-center text-lg shadow-lg group-hover:scale-110 transition-transform duration-300">
                                            <i class="fa-solid fa-play ml-0.5"></i>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="p-6 space-y-2">
                                <span class="text-[10px] text-[#C5A880] font-bold uppercase tracking-widest block">
                                    {{ $isLocal ? 'File Terunggah' : 'YouTube Video' }}
                                </span>
                                <h4 class="font-bold text-white text-base font-serif group-hover:text-[#C5A880] transition-colors cursor-pointer"
                                    @click="playVideo('{{ $playUrl }}', '{{ addslashes($v->title) }}', '{{ addslashes($v->description ?? '') }}', {{ $isLocal ? 'true' : 'false' }})">
                                    {{ $v->title }}
                                </h4>
                            </div>
                        </div>
                    @empty
                        <!-- Mock static items as fallback if none in DB -->
                        <div class="group bg-white/5 rounded-3xl border border-white/10 shadow-sm overflow-hidden flex flex-col justify-between hover:shadow-2xl hover:border-[#C5A880]/30 transition-all duration-350">
                            <div class="relative h-48 bg-black overflow-hidden cursor-pointer" 
                                 @click="playVideo('https://www.youtube.com/embed/dQw4w9WgXcQ', 'Pemasangan Kitchen Set Custom Granit', 'Video footage pengerjaan finishing detail interior.', false)">
                                <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=1200&h=630&fit=crop" class="w-full h-full object-cover opacity-60 group-hover:scale-105 transition-transform duration-500" alt="Video cover">
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="w-14 h-14 rounded-full bg-[#C5A880] text-[#0A1E13] flex items-center justify-center text-lg shadow-lg">
                                        <i class="fa-solid fa-play ml-0.5"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6 space-y-2">
                                <span class="text-[10px] text-[#C5A880] font-bold uppercase tracking-widest block">Interior | Residensial</span>
                                <h4 class="font-bold text-white text-base font-serif">Pemasangan Kitchen Set Custom Granit</h4>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </section>
@endsection
