@extends('layouts.app')

@section('title', $project->title . ' - Portofolio ' . \App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara'))
@section('meta_description', Str::limit(strip_tags($project->description), 150))

@section('content')
    <!-- Banner Space Filler -->
    <div class="h-20 bg-[#0A1E13]"></div>

    <!-- Project Header Hero -->
    <section class="relative bg-cover bg-center bg-fixed pt-28 pb-20 overflow-hidden border-b border-[#C5A880]/15"
             style="background-image: url('{{ $project->cover_image ?? 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=1920&q=80' }}')">
        <!-- Dark gradient overlays for high text readability -->
        <div class="absolute inset-0 bg-[#0A1E13]/85 mix-blend-multiply z-0"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-[#0A1E13] via-[#0A1E13]/60 to-[#0A1E13]/80 z-0"></div>
        <div class="absolute inset-0 luxury-grid-pattern opacity-15 z-0"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10 reveal-on-scroll">
            <div class="space-y-6">
                <div class="flex items-center space-x-2">
                    <a href="{{ route('projects.index') }}" class="text-[#C5A880] hover:text-[#B4966B] transition-colors text-xs font-semibold uppercase tracking-wider">Portofolio</a>
                    <span class="text-white/40 text-xs">/</span>
                    <span class="text-white/80 text-xs font-semibold uppercase tracking-wider">{{ $project->category }}</span>
                </div>
                <h1 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight leading-tight max-w-4xl font-serif">
                    {{ $project->title }}
                </h1>
                
                <!-- Quick Meta Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 pt-6 max-w-3xl">
                    <div class="p-4 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm">
                        <span class="text-[10px] text-slate-400 uppercase tracking-widest font-mono block">Kategori</span>
                        <span class="text-[#C5A880] font-bold text-sm block mt-1 font-serif">{{ $project->category }}</span>
                    </div>
                    <div class="p-4 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm">
                        <span class="text-[10px] text-slate-400 uppercase tracking-widest font-mono block">Status Proyek</span>
                        <span class="font-bold text-sm block mt-1 font-serif {{ $project->status == 'Completed' ? 'text-emerald-400' : 'text-[#C5A880]' }}">{{ $project->status }}</span>
                    </div>
                    <div class="p-4 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm">
                        <span class="text-[10px] text-slate-400 uppercase tracking-widest font-mono block">Lokasi</span>
                        <span class="text-white font-bold text-sm block mt-1 truncate font-serif"><i class="fa-solid fa-location-dot text-[#C5A880] mr-1.5"></i> {{ $project->location }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Project Content Section -->
    <section class="py-24 bg-[#0A1E13] relative overflow-hidden">
        <!-- Decorative Glow -->
        <div class="absolute left-1/2 bottom-1/4 w-[500px] h-[500px] bg-[#C5A880]/5 rounded-full blur-[120px] -translate-x-1/2"></div>
        <div class="absolute inset-0 luxury-grid-pattern opacity-5"></div>
        
        <!-- Watermark background -->
        <div class="absolute inset-0 z-0 opacity-[0.03] pointer-events-none mix-blend-overlay">
            <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?w=1920&h=1080&fit=crop" class="w-full h-full object-cover select-none" alt="Watermark bg">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                <!-- Left: Description, Video & Gallery -->
                <div class="lg:col-span-8 space-y-16">
                    
                    <!-- Cover image -->
                    <div class="reveal-on-scroll rounded-3xl overflow-hidden shadow-2xl border border-white/10 bg-black">
                        <img src="{{ $project->cover_image ?? 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=1200&h=630&fit=crop' }}" 
                             class="w-full h-auto max-h-[500px] object-cover" 
                             alt="{{ $project->title }}">
                    </div>

                    <!-- Description -->
                    <div class="space-y-4 reveal-on-scroll">
                        <h2 class="text-2xl font-bold text-white border-b border-white/5 pb-4 font-serif flex items-center">
                            <i class="fa-solid fa-circle-info text-[#C5A880] mr-3"></i> Tentang Proyek
                        </h2>
                        <p class="text-slate-300 leading-relaxed text-base sm:text-lg font-light text-justify">
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
                        <div class="space-y-4 reveal-on-scroll">
                            <h2 class="text-2xl font-bold text-white border-b border-white/5 pb-4 font-serif flex items-center">
                                <i class="fa-solid fa-video text-[#C5A880] mr-3"></i> Footage Video Lapangan
                            </h2>
                            <div class="relative rounded-3xl overflow-hidden shadow-2xl shadow-[#C5A880]/15 border border-white/10 w-full aspect-video bg-black">
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
                        <div x-data="{ lightbox: false, activeImage: '' }" class="space-y-4 reveal-on-scroll">
                            <h2 class="text-2xl font-bold text-white border-b border-white/5 pb-4 font-serif flex items-center">
                                <i class="fa-solid fa-images text-[#C5A880] mr-3"></i> Galeri Foto Konstruksi
                            </h2>
                            
                            <!-- Grid -->
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-6">
                                @foreach($project->gallery_images as $img)
                                    <div @click="lightbox = true; activeImage = '{{ $img }}'" 
                                         class="aspect-[4/3] rounded-2xl overflow-hidden border border-white/10 cursor-pointer group relative shadow-md hover:border-[#C5A880]/30 transition-all duration-300">
                                        <img src="{{ $img }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Galeri Proyek">
                                        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center text-[#C5A880] text-xl duration-300">
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
                                 class="fixed inset-0 z-50 bg-black/95 backdrop-blur-sm flex items-center justify-center p-4"
                                 style="display: none;">
                                
                                <button @click="lightbox = false" class="absolute top-6 right-6 text-white text-3xl hover:text-[#C5A880] transition-colors cursor-pointer p-2.5 bg-white/5 rounded-xl border border-white/10">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                                
                                <div class="max-w-4xl max-h-[85vh] overflow-hidden rounded-2xl border border-white/10 shadow-2xl">
                                    <img :src="activeImage" class="w-full h-auto max-h-[80vh] object-contain mx-auto rounded-2xl" alt="Lightbox animate">
                                </div>
                            </div>
                        </div>
                    @endif

                </div>

                <!-- Right: Project Progress Tracker & Client info -->
                <div class="lg:col-span-4 space-y-8 reveal-on-scroll">
                    
                    <!-- Client Specifications Card -->
                    <div class="p-8 rounded-3xl bg-white/5 border border-white/10 space-y-6 shadow-2xl backdrop-blur-md">
                        <h3 class="text-white font-bold text-base uppercase tracking-wider border-b border-white/5 pb-3 font-serif flex items-center">
                            <i class="fa-solid fa-table-list text-[#C5A880] mr-2.5"></i> Spesifikasi Proyek
                        </h3>
                        
                        <div class="space-y-4 text-xs sm:text-sm">
                            <div class="flex justify-between py-2 border-b border-white/5">
                                <span class="text-slate-400">Kategori Pekerjaan</span>
                                <span class="text-white font-semibold font-serif">{{ $project->category }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-white/5">
                                <span class="text-slate-400">Lokasi Proyek</span>
                                <span class="text-white font-semibold font-serif">{{ $project->location }}</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-slate-400">Status</span>
                                <span class="text-white font-semibold font-serif">{{ $project->status }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- WhatsApp Contact CTA -->
                    <div class="p-8 rounded-3xl bg-white/5 text-white space-y-6 shadow-2xl border border-white/10 backdrop-blur-md relative overflow-hidden group hover:border-[#C5A880]/30 transition-all duration-300">
                        <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-[#C5A880]/2 rounded-full blur-xl group-hover:bg-[#C5A880]/8 transition-all duration-500"></div>
                        <h3 class="font-extrabold text-white text-lg tracking-tight uppercase font-serif">Tertarik Dengan Proyek Seperti Ini?</h3>
                        <p class="text-xs sm:text-sm leading-relaxed text-slate-300 font-light">
                            Bahas rencana bangunan Anda sekarang bersama Site Engineer kami dan dapatkan estimasi RAB awal gratis.
                        </p>
                        <a href="https://api.whatsapp.com/send?phone={{ \App\Models\Setting::get('contact_whatsapp', '628123456789') }}&text=Halo%20{{ urlencode(\App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara')) }}%2C%20saya%20melihat%20detail%20proyek%20{{ urlencode($project->title) }}.%20Bisa%20berdiskusi%20lebih%20lanjut%20mengenai%20layanan%20kategori%20ini%3F" 
                           target="_blank"
                           class="w-full inline-flex items-center justify-center px-6 py-4 bg-gradient-to-r from-[#C5A880] to-[#B4966B] hover:from-[#B4966B] hover:to-[#A3855A] text-[#0A1E13] font-bold text-xs rounded-xl transition-all duration-300 shadow-md shadow-[#C5A880]/10 hover:scale-105 active:scale-95 uppercase tracking-wider">
                            <i class="fa-brands fa-whatsapp text-lg mr-2 text-[#0A1E13]"></i>
                            Konsultasikan Proyek Serupa
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
