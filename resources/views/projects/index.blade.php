@extends('layouts.app')

@section('title', 'Portofolio Proyek - ' . \App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara'))
@section('meta_description', 'Jelajahi portofolio pengerjaan interior mewah, perancangan eksterior modern, dan konstruksi sipil dari ' . \App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara') . '.')

@section('content')
    <!-- Banner Space Filler -->
    <div class="h-20 bg-[#0A1E13]"></div>

    <!-- Banner Header -->
    <section class="relative bg-cover bg-center bg-fixed py-28 border-b border-[#C5A880]/15 overflow-hidden text-center"
             style="background-image: url('{{ \App\Models\Setting::get('banner_projects_img', 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?w=1920&q=80') }}')">
        <!-- High-contrast dark gradient overlays -->
        <div class="absolute inset-0 bg-[#0A1E13]/85 mix-blend-multiply z-0"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-[#0A1E13] via-[#0A1E13]/60 to-[#0A1E13]/85 z-0"></div>
        <!-- Accent Glow and Pattern -->
        <div class="absolute right-0 top-0 w-96 h-96 bg-[#C5A880]/10 rounded-full blur-3xl z-0"></div>
        <div class="absolute inset-0 luxury-grid-pattern opacity-15 z-0"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10 space-y-4 reveal-on-scroll">
            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold bg-[#C5A880]/15 text-[#C5A880] border border-[#C5A880]/30 uppercase tracking-widest animate-pulse-gold">
                <i class="fa-solid fa-briefcase mr-1.5"></i> Hasil Karya
            </span>
            <h1 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight leading-tight font-serif drop-shadow-[0_4px_10px_rgba(0,0,0,0.7)]">
                Portofolio Konstruksi & Sipil
            </h1>
            <div class="w-20 h-[2px] bg-[#C5A880] mx-auto mt-4"></div>
            <p class="text-slate-300 max-w-2xl mx-auto text-sm sm:text-base leading-relaxed font-light mt-4 drop-shadow-[0_2px_5px_rgba(0,0,0,0.6)]">
                Bukti kualitas pengerjaan dan komitmen kami pada setiap struktur bangunan yang kami selesaikan.
            </p>
        </div>
    </section>

    <!-- Portfolio Listing Section -->
    <section class="py-24 bg-[#0A1E13] relative overflow-hidden">
        <!-- Decorative Glow -->
        <div class="absolute left-1/2 bottom-1/4 w-[500px] h-[500px] bg-[#C5A880]/5 rounded-full blur-[120px] -translate-x-1/2"></div>
        <div class="absolute inset-0 luxury-grid-pattern opacity-5"></div>
        
        <!-- Watermark background -->
        <div class="absolute inset-0 z-0 opacity-[0.03] pointer-events-none mix-blend-overlay">
            <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=1920&h=1080&fit=crop" class="w-full h-full object-cover select-none" alt="Watermark bg">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Category Navigation Tabs -->
            <div class="flex flex-wrap items-center justify-center gap-3 mb-16 reveal-on-scroll">
                <a href="{{ route('projects.index') }}" 
                   class="px-6 py-3 rounded-xl text-xs sm:text-sm font-semibold transition-all duration-300 border border-transparent tracking-wider uppercase {{ !$category ? 'bg-[#C5A880] text-[#0A1E13] font-bold shadow-lg shadow-[#C5A880]/20' : 'bg-white/5 text-white/80 border-white/10 hover:bg-white/10 hover:text-white' }}">
                    Semua Kategori
                </a>
                <a href="{{ route('projects.index', ['category' => 'Sipil']) }}" 
                   class="px-6 py-3 rounded-xl text-xs sm:text-sm font-semibold transition-all duration-300 border border-transparent tracking-wider uppercase {{ $category === 'Sipil' ? 'bg-[#C5A880] text-[#0A1E13] font-bold shadow-lg shadow-[#C5A880]/20' : 'bg-white/5 text-white/80 border-white/10 hover:bg-white/10 hover:text-white' }}">
                    Pekerjaan Sipil
                </a>
                <a href="{{ route('projects.index', ['category' => 'Residensial']) }}" 
                   class="px-6 py-3 rounded-xl text-xs sm:text-sm font-semibold transition-all duration-300 border border-transparent tracking-wider uppercase {{ $category === 'Residensial' ? 'bg-[#C5A880] text-[#0A1E13] font-bold shadow-lg shadow-[#C5A880]/20' : 'bg-white/5 text-white/80 border-white/10 hover:bg-white/10 hover:text-white' }}">
                    Residensial & Villa
                </a>
                <a href="{{ route('projects.index', ['category' => 'Komersial']) }}" 
                   class="px-6 py-3 rounded-xl text-xs sm:text-sm font-semibold transition-all duration-300 border border-transparent tracking-wider uppercase {{ $category === 'Komersial' ? 'bg-[#C5A880] text-[#0A1E13] font-bold shadow-lg shadow-[#C5A880]/20' : 'bg-white/5 text-white/80 border-white/10 hover:bg-white/10 hover:text-white' }}">
                    Komersial & Gedung
                </a>
            </div>

            <!-- Portfolio Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($projects as $project)
                    <div class="reveal-on-scroll group rounded-3xl overflow-hidden border border-white/10 bg-white/5 shadow-sm hover:shadow-2xl hover:border-[#C5A880]/35 transition-all duration-350 flex flex-col relative">
                        <!-- Image Cover -->
                        <div class="relative aspect-[4/3] overflow-hidden bg-black">
                            <img src="{{ $project->cover_image ?? 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&h=450&fit=crop' }}" 
                                 class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105" 
                                 alt="{{ $project->title }}">
                            
                            <!-- Minimal status badge -->
                            <div class="absolute top-4 left-4 z-10">
                                <span class="px-2.5 py-1 rounded text-[10px] font-bold tracking-widest uppercase {{ $project->status == 'Completed' ? 'bg-emerald-500 text-white' : 'bg-[#C5A880] text-[#0A1E13]' }}">
                                    {{ $project->status }}
                                </span>
                            </div>

                            <!-- Elegant play overlay if video exists -->
                            @if($project->video_url)
                                <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <div class="w-12 h-12 rounded-full bg-[#C5A880] text-[#0A1E13] flex items-center justify-center text-lg shadow-lg transform scale-90 group-hover:scale-100 transition-transform duration-300">
                                        <i class="fa-solid fa-play ml-0.5"></i>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Card Body -->
                        <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                            <div class="space-y-2">
                                <span class="text-[#C5A880] text-xs font-bold uppercase tracking-widest block">{{ $project->category }}</span>
                                <h3 class="text-white font-bold text-lg font-serif mt-1 group-hover:text-[#C5A880] transition-colors line-clamp-1">
                                    {{ $project->title }}
                                </h3>
                                <p class="text-slate-400 text-xs sm:text-sm line-clamp-2 leading-relaxed font-light">
                                    {{ $project->description }}
                                </p>
                            </div>

                            <div class="pt-4 border-t border-white/5 flex items-center justify-between text-xs text-slate-400">
                                <span class="flex items-center"><i class="fa-solid fa-location-dot text-[#C5A880] mr-2"></i> {{ $project->location }}</span>
                                <a href="{{ route('projects.show', $project->slug) }}" class="text-[#C5A880] hover:text-[#B4966B] font-bold inline-flex items-center transition-colors uppercase tracking-wider">
                                    Detail Proyek <i class="fa-solid fa-arrow-right-long ml-2 transition-transform group-hover:translate-x-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-20 text-slate-450">
                        <i class="fa-solid fa-folder-open text-5xl mb-4 block text-[#C5A880]/30 animate-pulse"></i>
                        <span class="text-slate-400">Belum ada portofolio proyek untuk kategori ini.</span>
                    </div>
                @endforelse
            </div>

            <!-- Pagination Links -->
            <div class="mt-16">
                {{ $projects->links() }}
            </div>
        </div>
    </section>
@endsection
