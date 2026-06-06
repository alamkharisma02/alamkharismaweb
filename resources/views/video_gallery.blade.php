@extends('layouts.app')

@section('title', 'Galeri Video Proyek - ' . \App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara'))
@section('meta_description', 'Tonton video dokumentasi pengerjaan sipil berat, konstruksi, dan interior finishing dari ' . \App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara') . '.')

@section('content')
    <!-- Banner Space Filler -->
    <div class="h-20 bg-[#0A1E13]"></div>

    <!-- Header Section -->
    <section class="relative bg-slate-50 py-16 border-b border-slate-200 overflow-hidden">
        <!-- Background subtle shapes -->
        <div class="absolute right-0 top-0 w-96 h-96 bg-brand-accent/5 rounded-full blur-3xl -mr-20 -mt-20"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-indigo-500/5 rounded-full blur-3xl -ml-20 -mb-20"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
            <span class="inline-flex items-center px-3.5 py-1 rounded-full text-xs font-bold bg-brand-accent/10 text-brand-primary border border-brand-accent/20 uppercase tracking-widest">
                <i class="fa-solid fa-circle-play mr-1.5"></i> Video Showcase
            </span>
            <h1 class="text-3xl sm:text-5xl font-extrabold text-slate-900 tracking-tight leading-tight">
                Galeri Video Dokumentasi
            </h1>
            <p class="text-slate-600 max-w-2xl mx-auto text-sm sm:text-base leading-relaxed">
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
    <section class="py-16 bg-white" x-data="{ 
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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            
            <!-- Main Video Player Section -->
            <div id="player-section" class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center bg-slate-50 rounded-3xl border border-slate-200 p-6 sm:p-8 shadow-sm">
                <!-- Video Player Frame -->
                <div class="lg:col-span-8">
                    <div class="relative rounded-2xl overflow-hidden shadow-lg border border-slate-250 bg-slate-950 w-full aspect-video">
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
                            <div class="absolute inset-0 flex flex-col items-center justify-center text-slate-400 bg-slate-900 p-6">
                                <i class="fa-solid fa-play text-4xl mb-3"></i>
                                <span class="font-bold text-sm">Pilih video di bawah untuk memutar dokumentasi proyek.</span>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Video Description Info -->
                <div class="lg:col-span-4 space-y-4">
                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-brand-primary/10 text-brand-primary inline-block uppercase tracking-wider">Sedang Diputar</span>
                    <h3 class="text-xl sm:text-2xl font-extrabold text-slate-950 leading-tight" x-text="activeVideoTitle"></h3>
                    <p class="text-slate-600 text-xs sm:text-sm leading-relaxed" x-text="activeVideoSubtitle"></p>
                    
                    <div class="pt-4 border-t border-slate-200">
                        <a href="https://api.whatsapp.com/send?phone={{ \App\Models\Setting::get('contact_whatsapp') }}&text=Halo%2C%20saya%20menonton%20video%20dokumentasi%20Anda%20dan%20tertarik%20untuk%20berkonsultasi." 
                           target="_blank"
                           class="w-full inline-flex items-center justify-center px-5 py-3 rounded-xl bg-slate-950 hover:bg-slate-900 text-white font-bold text-xs shadow-sm transition-all duration-200 cursor-pointer">
                            <i class="fa-brands fa-whatsapp text-emerald-400 text-base mr-2"></i> Tanya Detail Pengerjaan Ini
                        </a>
                    </div>
                </div>
            </div>

            <!-- Other Project Videos Grid -->
            <div class="space-y-6">
                <h3 class="text-xl font-extrabold text-slate-950 border-b border-slate-100 pb-3"><i class="fa-solid fa-folder-open text-brand-accent mr-2"></i> Album Video Dokumentasi</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    
                    <!-- Setting/Featured Video Card (Always Available if set & no videos uploaded yet) -->
                    @if($featuredVideoUrl && $videos->isEmpty())
                        <div class="group bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden flex flex-col justify-between hover:shadow-md transition-all duration-300">
                            <div class="relative h-48 bg-slate-950 overflow-hidden cursor-pointer" 
                                 @click="playVideo('{{ $featuredEmbedUrl }}', '{{ \App\Models\Setting::get('featured_video_title', 'Video Utama Dokumentasi') }}', '{{ \App\Models\Setting::get('featured_video_subtitle') }}', false)">
                                <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=1200&h=630&fit=crop" class="w-full h-full object-cover opacity-70 group-hover:scale-105 transition-transform duration-500" alt="Video cover">
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="w-12 h-12 rounded-full bg-brand-accent/90 text-slate-950 flex items-center justify-center text-lg shadow-lg group-hover:scale-110 transition-transform">
                                        <i class="fa-solid fa-play ml-0.5"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="p-5 space-y-1">
                                <span class="text-[10px] text-brand-accent font-bold uppercase tracking-wider block">Featured Video</span>
                                <h4 class="font-bold text-slate-900 text-sm group-hover:text-brand-accent transition-colors cursor-pointer"
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
                        <div class="group bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden flex flex-col justify-between hover:shadow-md transition-all duration-300">
                            <div class="relative h-48 bg-slate-950 overflow-hidden cursor-pointer" 
                                 @click="playVideo('{{ $playUrl }}', '{{ addslashes($v->title) }}', '{{ addslashes($v->description ?? '') }}', {{ $isLocal ? 'true' : 'false' }})">
                                @if($isLocal)
                                    <div class="w-full h-full bg-slate-900 flex flex-col items-center justify-center relative p-6">
                                        <i class="fa-solid fa-file-video text-brand-accent text-5xl mb-2 opacity-80 group-hover:scale-105 transition-transform duration-300"></i>
                                        <span class="text-[10px] text-slate-450 font-bold uppercase tracking-wider">Video Terunggah</span>
                                        <div class="absolute inset-0 bg-black/30 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                            <div class="w-12 h-12 rounded-full bg-brand-accent/90 text-slate-950 flex items-center justify-center text-lg shadow-lg">
                                                <i class="fa-solid fa-play ml-0.5"></i>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <img src="{{ $thumbnailUrl }}" 
                                         class="w-full h-full object-cover opacity-70 group-hover:scale-105 transition-transform duration-500" 
                                         alt="{{ $v->title }}">
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <div class="w-12 h-12 rounded-full bg-brand-accent/90 text-slate-950 flex items-center justify-center text-lg shadow-lg group-hover:scale-110 transition-transform">
                                            <i class="fa-solid fa-play ml-0.5"></i>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="p-5 space-y-1">
                                <span class="text-[10px] text-brand-primary font-bold uppercase tracking-wider block">
                                    {{ $isLocal ? 'File Terunggah' : 'YouTube Video' }}
                                </span>
                                <h4 class="font-bold text-slate-900 text-sm group-hover:text-brand-accent transition-colors cursor-pointer"
                                    @click="playVideo('{{ $playUrl }}', '{{ addslashes($v->title) }}', '{{ addslashes($v->description ?? '') }}', {{ $isLocal ? 'true' : 'false' }})">
                                    {{ $v->title }}
                                </h4>
                            </div>
                        </div>
                    @empty
                        <!-- Mock static items as fallback if none in DB -->
                        <div class="group bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden flex flex-col justify-between hover:shadow-md transition-all duration-300">
                            <div class="relative h-48 bg-slate-950 overflow-hidden cursor-pointer" 
                                 @click="playVideo('https://www.youtube.com/embed/dQw4w9WgXcQ', 'Pemasangan Kitchen Set Custom Granit', 'Video footage pengerjaan finishing detail interior.', false)">
                                <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=1200&h=630&fit=crop" class="w-full h-full object-cover opacity-70 group-hover:scale-105 transition-transform duration-500" alt="Video cover">
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="w-12 h-12 rounded-full bg-brand-accent/90 text-slate-950 flex items-center justify-center text-lg shadow-lg">
                                        <i class="fa-solid fa-play ml-0.5"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="p-5 space-y-1">
                                <span class="text-[10px] text-slate-450 font-bold uppercase tracking-wider block">Interior | Residensial</span>
                                <h4 class="font-bold text-slate-900 text-sm">Pemasangan Kitchen Set Custom Granit</h4>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </section>
@endsection
