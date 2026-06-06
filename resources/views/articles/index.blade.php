@extends('layouts.app')

@section('title', 'Artikel & Informasi Konstruksi - ' . \App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara'))
@section('meta_description', 'Baca artikel terbaru seputar tips sipil, teknologi material bangunan, panduan RAB, dan perkembangan arsitektur pembangunan.')

@section('content')
    <!-- Banner Space Filler -->
    <div class="h-20 bg-[#0A1E13]"></div>

    <!-- Banner Header -->
    <section class="relative bg-gradient-to-b from-[#0A1E13] via-[#050F09] to-[#0A1E13] py-24 border-b border-[#C5A880]/10 overflow-hidden text-center">
        <!-- Background subtle glow shapes -->
        <div class="absolute right-0 top-0 w-96 h-96 bg-[#C5A880]/8 rounded-full blur-3xl -mr-20 -mt-20"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-emerald-500/5 rounded-full blur-3xl -ml-20 -mb-20"></div>
        <div class="absolute inset-0 luxury-grid-pattern opacity-10"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10 space-y-4 reveal-on-scroll">
            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold bg-[#C5A880]/15 text-[#C5A880] border border-[#C5A880]/30 uppercase tracking-widest animate-pulse-gold">
                <i class="fa-solid fa-newspaper mr-1.5"></i> Edukasi & Info
            </span>
            <h1 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight leading-tight font-serif">
                Artikel & Tips Konstruksi
            </h1>
            <div class="w-20 h-[2px] bg-[#C5A880] mx-auto mt-4"></div>
            <p class="text-slate-300 max-w-2xl mx-auto text-sm sm:text-base leading-relaxed font-light mt-4">
                Wawasan mendalam dari para insinyur sipil kami untuk membantu Anda merencanakan konstruksi yang kokoh, efisien, dan modern.
            </p>
        </div>
    </section>

    <!-- Articles Section -->
    <section class="py-24 bg-[#0A1E13] relative overflow-hidden">
        <!-- Decorative Glow -->
        <div class="absolute left-1/2 bottom-1/4 w-[500px] h-[500px] bg-[#C5A880]/5 rounded-full blur-[120px] -translate-x-1/2"></div>
        <div class="absolute inset-0 luxury-grid-pattern opacity-5"></div>
        
        <!-- Watermark background -->
        <div class="absolute inset-0 z-0 opacity-[0.03] pointer-events-none mix-blend-overlay">
            <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?w=1920&h=1080&fit=crop" class="w-full h-full object-cover select-none" alt="Watermark bg">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            <!-- Filters & Search bar -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-16 pb-6 border-b border-white/5 reveal-on-scroll">
                <!-- Categories -->
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('articles.index', ['search' => $search]) }}" 
                       class="px-5 py-2.5 rounded-xl text-xs font-bold transition-all duration-300 border border-transparent tracking-wider uppercase {{ !$category ? 'bg-[#C5A880] text-[#0A1E13] shadow-md shadow-[#C5A880]/20' : 'bg-white/5 text-white/80 border-white/10 hover:bg-white/10 hover:text-white' }}">
                        Semua Kategori
                    </a>
                    @foreach($categories as $cat)
                        <a href="{{ route('articles.index', ['category' => $cat, 'search' => $search]) }}" 
                           class="px-5 py-2.5 rounded-xl text-xs font-bold transition-all duration-300 border border-transparent tracking-wider uppercase {{ $category === $cat ? 'bg-[#C5A880] text-[#0A1E13] shadow-md shadow-[#C5A880]/20' : 'bg-white/5 text-white/80 border-white/10 hover:bg-white/10 hover:text-white' }}">
                            {{ $cat }}
                        </a>
                    @endforeach
                </div>

                <!-- Search Input -->
                <div class="w-full md:w-80">
                    <form action="{{ route('articles.index') }}" method="GET" class="relative">
                        @if($category)
                            <input type="hidden" name="category" value="{{ $category }}">
                        @endif
                        <input type="text" name="search" value="{{ $search }}" placeholder="Cari artikel..." 
                               class="w-full pl-5 pr-12 py-3.5 bg-white/5 border border-white/10 rounded-xl text-sm text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-[#C5A880] focus:border-transparent font-light font-sans">
                        <button type="submit" class="absolute right-4 top-4 text-slate-400 hover:text-[#C5A880] transition-colors">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Articles Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($articles as $article)
                    <article class="reveal-on-scroll bg-white/5 rounded-3xl overflow-hidden border border-white/10 shadow-sm hover:shadow-2xl hover:border-[#C5A880]/35 transition-all duration-350 flex flex-col">
                        <!-- Cover -->
                        <div class="h-52 overflow-hidden bg-black relative">
                            <img src="{{ $article->cover_image ?? 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=800&h=450&fit=crop' }}" 
                                 class="w-full h-full object-cover transition-transform duration-700 hover:scale-105" 
                                 alt="{{ $article->title }}">
                            <!-- Category badge -->
                            <span class="absolute top-4 left-4 bg-[#0A1E13]/85 backdrop-blur-md text-[#C5A880] text-xs font-bold px-3.5 py-1.5 rounded-lg border border-[#C5A880]/20 uppercase tracking-widest">
                                {{ $article->category }}
                            </span>
                        </div>

                        <!-- Content -->
                        <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                            <div>
                                <div class="flex items-center text-xs text-slate-400 space-x-3 mb-2 font-semibold font-mono">
                                    <span><i class="fa-solid fa-calendar mr-2 text-[#C5A880]"></i> {{ $article->published_at ? $article->published_at->format('d M Y') : $article->created_at->format('d M Y') }}</span>
                                </div>
                                <h3 class="text-white font-bold text-lg font-serif line-clamp-2 hover:text-[#C5A880] transition-colors leading-snug">
                                    <a href="{{ $article->external_link ?? route('articles.show', $article->slug) }}" @if($article->external_link) target="_blank" rel="noopener" @endif>{{ $article->title }}</a>
                                </h3>
                                <p class="text-slate-400 text-xs sm:text-sm line-clamp-3 mt-3 leading-relaxed font-light">
                                    {{ strip_tags($article->content) }}
                                </p>
                            </div>
 
                            <div class="pt-5 border-t border-white/5 flex items-center justify-between text-xs text-slate-450">
                                <span class="text-slate-400 font-light font-sans">Oleh: Admin Sipil</span>
                                <a href="{{ $article->external_link ?? route('articles.show', $article->slug) }}" @if($article->external_link) target="_blank" rel="noopener" @endif class="text-[#C5A880] hover:text-[#B4966B] font-bold inline-flex items-center uppercase tracking-wider">
                                    Baca Selengkapnya <i class="fa-solid fa-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-3 text-center py-20 text-slate-455">
                        <i class="fa-solid fa-newspaper text-5xl mb-4 block text-[#C5A880]/30 animate-pulse"></i>
                        <span class="text-slate-400">Tidak ada artikel yang cocok dengan pencarian atau kategori Anda.</span>
                    </div>
                @endforelse
            </div>

            <!-- Pagination Links -->
            <div class="mt-16">
                {{ $articles->links() }}
            </div>
        </div>
    </section>
@endsection
