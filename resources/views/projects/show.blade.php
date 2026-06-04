@extends('layouts.app')

@section('title', $project->title . ' - Portofolio ' . \App\Models\Setting::get('site_name', 'Alam Kharisma Bersaudara'))
@section('meta_description', Str::limit(strip_tags($project->description), 150))

@section('content')
    <!-- Project Header Hero -->
    <section class="relative bg-brand-primary pt-36 pb-20 overflow-hidden">
        <!-- Background Cover Image Blurry -->
        <div class="absolute inset-0 opacity-10">
            <img src="{{ $project->cover_image ?? 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=1200&h=630&fit=crop' }}" 
                 class="w-full h-full object-cover blur-sm" alt="Background Blur">
        </div>
        <div class="absolute inset-0 bg-gradient-to-t from-brand-primary via-brand-primary/80 to-transparent"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10">
            <div class="space-y-4">
                <div class="flex items-center space-x-2">
                    <a href="{{ route('projects.index') }}" class="text-slate-400 hover:text-brand-accent transition-colors text-xs font-semibold">Portofolio</a>
                    <span class="text-slate-600 text-xs">/</span>
                    <span class="text-slate-300 text-xs font-semibold">{{ $project->category }}</span>
                </div>
                <h1 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight leading-tight max-w-4xl">
                    {{ $project->title }}
                </h1>
                
                <!-- Quick Meta Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-6 max-w-2xl">
                    <div class="p-3.5 rounded-xl bg-slate-900 border border-slate-800">
                        <span class="text-[10px] text-slate-500 uppercase tracking-widest font-mono block">Kategori</span>
                        <span class="text-white font-bold text-sm block mt-1">{{ $project->category }}</span>
                    </div>
                    <div class="p-3.5 rounded-xl bg-slate-900 border border-slate-800">
                        <span class="text-[10px] text-slate-500 uppercase tracking-widest font-mono block">Status Proyek</span>
                        <span class="font-bold text-sm block mt-1 {{ $project->status == 'Completed' ? 'text-emerald-400' : 'text-brand-accent' }}">{{ $project->status }}</span>
                    </div>
                    <div class="p-3.5 rounded-xl bg-slate-900 border border-slate-800">
                        <span class="text-[10px] text-slate-500 uppercase tracking-widest font-mono block">Lokasi</span>
                        <span class="text-white font-bold text-sm block mt-1 truncate"><i class="fa-solid fa-location-dot text-brand-accent mr-1"></i> {{ $project->location }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Project Content Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                <!-- Left: Description, Video & Gallery -->
                <div class="lg:col-span-8 space-y-12">
                    
                    <!-- Cover image -->
                    <div class="rounded-2xl overflow-hidden shadow-md border border-slate-200">
                        <img src="{{ $project->cover_image ?? 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=1200&h=630&fit=crop' }}" 
                             class="w-full h-auto max-h-[480px] object-cover" 
                             alt="{{ $project->title }}">
                    </div>

                    <!-- Description -->
                    <div class="space-y-4">
                        <h2 class="text-2xl font-extrabold text-slate-950 border-b border-slate-100 pb-3">Tentang Proyek</h2>
                        <p class="text-slate-600 leading-relaxed text-base sm:text-lg">
                            {!! nl2br(e($project->description)) !!}
                        </p>
                    </div>

                    <!-- Video Footage Embed -->
                    @if($project->video_url)
                        @php
                            $projectVideoUrl = $project->video_url;
                            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $projectVideoUrl, $match)) {
                                $projectVideoUrl = "https://www.youtube.com/embed/" . $match[1];
                            }
                        @endphp
                        <div class="space-y-4">
                            <h2 class="text-2xl font-extrabold text-slate-950 border-b border-slate-100 pb-3">Footage Video Lapangan</h2>
                            <div class="relative rounded-2xl overflow-hidden shadow-lg border border-slate-200 w-full aspect-video">
                                <iframe class="absolute top-0 left-0 w-full h-full border-0" 
                                        src="{{ $projectVideoUrl }}" 
                                        title="Project Video Footage" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                        allowfullscreen>
                                </iframe>
                            </div>
                        </div>
                    @endif

                    <!-- Photo Gallery Section -->
                    @if(!empty($project->gallery_images) && count($project->gallery_images) > 0)
                        <div x-data="{ lightbox: false, activeImage: '' }" class="space-y-4">
                            <h2 class="text-2xl font-extrabold text-slate-950 border-b border-slate-100 pb-3">Galeri Foto Konstruksi</h2>
                            
                            <!-- Grid -->
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                                @foreach($project->gallery_images as $img)
                                    <div @click="lightbox = true; activeImage = '{{ $img }}'" 
                                         class="aspect-[4/3] rounded-xl overflow-hidden border border-slate-200 cursor-pointer group relative shadow-sm hover:shadow-md">
                                        <img src="{{ $img }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" alt="Galeri Proyek">
                                        <div class="absolute inset-0 bg-slate-950/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center text-white text-lg">
                                            <i class="fa-solid fa-magnifying-glass-plus"></i>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Lightbox Modal -->
                            <div x-show="lightbox" 
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 scale-95"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-200"
                                 x-transition:leave-start="opacity-100 scale-100"
                                 x-transition:leave-end="opacity-0 scale-95"
                                 class="fixed inset-0 z-50 bg-slate-950/95 backdrop-blur-sm flex items-center justify-center p-4"
                                 style="display: none;">
                                
                                <button @click="lightbox = false" class="absolute top-6 right-6 text-white text-3xl hover:text-brand-accent transition-colors">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                                
                                <div class="max-w-4xl max-h-[85vh] overflow-hidden rounded-xl">
                                    <img :src="activeImage" class="w-full h-auto max-h-[80vh] object-contain mx-auto" alt="Lightbox">
                                </div>
                            </div>
                        </div>
                    @endif

                </div>

                <!-- Right: Project Progress Tracker & Client info -->
                <div class="lg:col-span-4 space-y-8">
                    
                    <!-- Client Specifications Card -->
                    <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200 space-y-4 shadow-sm">
                        <h3 class="text-slate-950 font-bold text-base uppercase tracking-wide border-b border-slate-200 pb-2">Spesifikasi Proyek</h3>
                        
                        <div class="space-y-3.5 text-sm">
                            <div class="flex justify-between">
                                <span class="text-slate-500">Kategori Pekerjaan</span>
                                <span class="text-slate-950 font-semibold">{{ $project->category }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-500">Lokasi Proyek</span>
                                <span class="text-slate-950 font-semibold">{{ $project->location }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-500">Status</span>
                                <span class="text-slate-950 font-semibold">{{ $project->status }}</span>
                            </div>
                        </div>
                    </div>



                     <!-- WhatsApp Contact CTA -->
                    <div class="p-6 rounded-2xl bg-brand-primary text-white space-y-4 shadow-lg border border-brand-accent/20">
                        <h3 class="font-extrabold text-base tracking-tight uppercase">Tertarik Dengan Proyek Seperti Ini?</h3>
                        <p class="text-xs font-semibold leading-relaxed text-slate-300">
                            Bahas rencana bangunan Anda sekarang bersama Site Engineer kami dan dapatkan estimasi RAB awal gratis.
                        </p>
                        <a href="https://api.whatsapp.com/send?phone={{ \App\Models\Setting::get('contact_whatsapp', '628123456789') }}&text=Halo%20{{ urlencode(\App\Models\Setting::get('site_name', 'Alam Kharisma Bersaudara')) }}%2C%20saya%20melihat%20detail%20proyek%20{{ urlencode($project->title) }}.%20Bisa%20berdiskusi%20lebih%20lanjut%20mengenai%20layanan%20kategori%20ini%3F" 
                           target="_blank"
                           class="w-full inline-flex items-center justify-center px-4 py-3 bg-brand-accent text-slate-950 font-bold text-xs rounded-xl hover:bg-brand-accent-hover transition-colors shadow">
                            <i class="fa-brands fa-whatsapp text-lg mr-2 text-brand-primary"></i>
                            Konsultasikan Proyek Serupa
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
