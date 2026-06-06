@extends('layouts.app')

@section('title', 'Portofolio Proyek - ' . \App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara'))
@section('meta_description', 'Jelajahi portofolio pengerjaan interior mewah, perancangan eksterior modern, dan konstruksi sipil dari ' . \App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara') . '.')

@section('content')
    <!-- Banner Header -->
    <section class="relative bg-brand-primary pt-36 pb-20 overflow-hidden text-center">
        <!-- Background Overlay Image -->
        <div class="absolute inset-0 opacity-10">
            <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=1200&h=630&fit=crop" class="w-full h-full object-cover" alt="Background">
        </div>
        <div class="absolute inset-0 bg-gradient-to-t from-brand-primary via-brand-primary/80 to-transparent"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-brand-accent/5 rounded-full blur-3xl"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10 space-y-4">
            <span class="text-brand-accent text-xs font-bold uppercase tracking-widest px-3 py-1 rounded-full bg-brand-accent/10 border border-brand-accent/30">Hasil Karya</span>
            <h1 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight">Portofolio Konstruksi & Sipil</h1>
            <p class="text-slate-400 max-w-xl mx-auto text-sm sm:text-base">
                Bukti kualitas pengerjaan dan komitmen kami pada setiap struktur bangunan yang kami selesaikan.
            </p>
        </div>
    </section>

    <!-- Portfolio Listing Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Category Navigation Tabs -->
            <div class="flex flex-wrap items-center justify-center gap-2.5 mb-12">
                <a href="{{ route('projects.index') }}" 
                   class="px-5 py-2.5 rounded-full text-sm font-semibold transition-all duration-300 border {{ !$category ? 'bg-brand-primary text-white border-brand-primary shadow-md font-bold' : 'bg-slate-100 hover:bg-slate-200 text-brand-primary border-transparent' }}">
                    Semua Kategori
                </a>
                <a href="{{ route('projects.index', ['category' => 'Sipil']) }}" 
                   class="px-5 py-2.5 rounded-full text-sm font-semibold transition-all duration-300 border {{ $category === 'Sipil' ? 'bg-brand-primary text-white border-brand-primary shadow-md font-bold' : 'bg-slate-100 hover:bg-slate-200 text-brand-primary border-transparent' }}">
                    Pekerjaan Sipil
                </a>
                <a href="{{ route('projects.index', ['category' => 'Residensial']) }}" 
                   class="px-5 py-2.5 rounded-full text-sm font-semibold transition-all duration-300 border {{ $category === 'Residensial' ? 'bg-brand-primary text-white border-brand-primary shadow-md font-bold' : 'bg-slate-100 hover:bg-slate-200 text-brand-primary border-transparent' }}">
                    Residensial & Villa
                </a>
                <a href="{{ route('projects.index', ['category' => 'Komersial']) }}" 
                   class="px-5 py-2.5 rounded-full text-sm font-semibold transition-all duration-300 border {{ $category === 'Komersial' ? 'bg-brand-primary text-white border-brand-primary shadow-md font-bold' : 'bg-slate-100 hover:bg-slate-200 text-brand-primary border-transparent' }}">
                    Komersial & Gedung
                </a>
            </div>

            <!-- Portfolio Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($projects as $project)
                    <div class="group rounded-2xl overflow-hidden border border-slate-100 bg-white shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col relative">
                        <!-- Image Cover -->
                        <div class="relative aspect-[4/3] overflow-hidden bg-slate-905 bg-slate-900">
                            <img src="{{ $project->cover_image ?? 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&h=450&fit=crop' }}" 
                                 class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105" 
                                 alt="{{ $project->title }}">
                            
                            <!-- Minimal status badge -->
                            <div class="absolute top-4 left-4 z-10">
                                <span class="px-2.5 py-1 rounded text-[10px] font-bold tracking-wider uppercase {{ $project->status == 'Completed' ? 'bg-emerald-500 text-white' : 'bg-brand-accent text-slate-950' }}">
                                    {{ $project->status }}
                                </span>
                            </div>

                            <!-- Elegant play overlay if video exists -->
                            @if($project->video_url)
                                <div class="absolute inset-0 bg-slate-950/30 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <div class="w-12 h-12 rounded-full bg-brand-accent text-slate-950 flex items-center justify-center text-lg shadow-lg transform scale-90 group-hover:scale-100 transition-transform duration-300">
                                        <i class="fa-solid fa-play ml-0.5"></i>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Card Body -->
                        <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                            <div class="space-y-2">
                                <span class="text-brand-accent text-xs font-bold uppercase tracking-widest block">{{ $project->category }}</span>
                                <h3 class="text-slate-900 font-extrabold text-lg mt-1 group-hover:text-brand-primary transition-colors line-clamp-1">
                                    {{ $project->title }}
                                </h3>
                                <p class="text-slate-505 text-slate-500 text-xs sm:text-sm line-clamp-2 leading-relaxed">
                                    {{ $project->description }}
                                </p>
                            </div>

                            <div class="pt-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                                <span><i class="fa-solid fa-map-marker-alt text-brand-accent mr-1.5"></i> {{ $project->location }}</span>
                                <a href="{{ route('projects.show', $project->slug) }}" class="text-brand-primary hover:text-brand-accent font-bold inline-flex items-center transition-colors">
                                    Detail Proyek <i class="fa-solid fa-arrow-right-long ml-1.5 transition-transform group-hover:translate-x-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-16 text-slate-400">
                        <i class="fa-solid fa-folder-open text-5xl text-slate-300 mb-4 block"></i>
                        Belum ada portofolio proyek untuk kategori ini.
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
