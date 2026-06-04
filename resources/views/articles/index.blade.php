@extends('layouts.app')

@section('title', 'Artikel & Informasi Konstruksi - ' . \App\Models\Setting::get('site_name', 'Alam Kharisma Bersaudara'))
@section('meta_description', 'Baca artikel terbaru seputar tips sipil, teknologi material bangunan, panduan RAB, dan perkembangan arsitektur pembangunan.')

@section('content')
    <!-- Banner Header -->
    <section class="relative bg-slate-950 pt-36 pb-20 overflow-hidden text-center">
        <!-- Background Overlay Image -->
        <div class="absolute inset-0 opacity-10">
            <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=1200&h=630&fit=crop" class="w-full h-full object-cover" alt="Background">
        </div>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/80 to-transparent"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-brand-accent/5 rounded-full blur-3xl"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10 space-y-4">
            <span class="text-brand-accent text-xs font-bold uppercase tracking-widest px-3 py-1 rounded-full bg-brand-accent/5 border border-brand-accent/30">Edukasi & Info</span>
            <h1 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight">Artikel & Tips Konstruksi</h1>
            <p class="text-slate-400 max-w-xl mx-auto text-sm sm:text-base">
                Wawasan mendalam dari para insinyur sipil kami untuk membantu Anda merencanakan konstruksi yang kokoh, efisien, dan modern.
            </p>
        </div>
    </section>

    <!-- Articles Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Filters & Search bar -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12 pb-6 border-b border-slate-100">
                <!-- Categories -->
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('articles.index', ['search' => $search]) }}" 
                       class="px-4 py-2 rounded-xl text-xs font-bold transition-all duration-300 {{ !$category ? 'bg-brand-primary text-white border-brand-primary shadow-sm' : 'bg-slate-100 hover:bg-slate-200 text-brand-primary' }}">
                        Semua Kategori
                    </a>
                    @foreach($categories as $cat)
                        <a href="{{ route('articles.index', ['category' => $cat, 'search' => $search]) }}" 
                           class="px-4 py-2 rounded-xl text-xs font-bold transition-all duration-300 {{ $category === $cat ? 'bg-brand-primary text-white border-brand-primary shadow-sm' : 'bg-slate-100 hover:bg-slate-200 text-brand-primary' }}">
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
                               class="w-full pl-4 pr-10 py-2.5 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent focus:border-transparent">
                        <button type="submit" class="absolute right-3 top-3 text-slate-400 hover:text-slate-600">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Articles Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($articles as $article)
                    <article class="bg-white rounded-2xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col">
                        <!-- Cover -->
                        <div class="h-48 overflow-hidden bg-slate-900 relative">
                            <img src="{{ $article->cover_image ?? 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=800&h=450&fit=crop' }}" 
                                 class="w-full h-full object-cover transition-transform duration-500 hover:scale-105" 
                                 alt="{{ $article->title }}">
                            <!-- Category badge -->
                            <span class="absolute top-4 left-4 bg-slate-900/80 backdrop-blur-md text-white text-xs font-bold px-3 py-1 rounded-full border border-slate-700">
                                {{ $article->category }}
                            </span>
                        </div>

                        <!-- Content -->
                        <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                            <div>
                                <div class="flex items-center text-xs text-slate-400 space-x-3 mb-2 font-semibold">
                                    <span><i class="fa-solid fa-calendar mr-1"></i> {{ $article->published_at ? $article->published_at->format('d M Y') : $article->created_at->format('d M Y') }}</span>
                                </div>
                                <h3 class="text-slate-900 font-bold text-base line-clamp-2 hover:text-brand-accent transition-colors">
                                    <a href="{{ $article->external_link ?? route('articles.show', $article->slug) }}" @if($article->external_link) target="_blank" rel="noopener" @endif>{{ $article->title }}</a>
                                </h3>
                                <p class="text-slate-500 text-xs line-clamp-3 mt-2 leading-relaxed">
                                    {{ strip_tags($article->content) }}
                                </p>
                            </div>
 
                            <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                                <span class="text-xs text-slate-400 font-semibold">Oleh: Admin Sipil</span>
                                <a href="{{ $article->external_link ?? route('articles.show', $article->slug) }}" @if($article->external_link) target="_blank" rel="noopener" @endif class="text-brand-primary hover:text-brand-accent font-bold text-xs inline-flex items-center">
                                    Baca Selengkapnya <i class="fa-solid fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-3 text-center py-16 text-slate-400">
                        <i class="fa-solid fa-newspaper text-5xl text-slate-300 mb-4 block"></i>
                        Tidak ada artikel yang cocok dengan pencarian atau kategori Anda.
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
