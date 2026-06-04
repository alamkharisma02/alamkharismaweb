<!-- Articles / News Section -->
<section class="py-24 bg-slate-50 border-t border-slate-200 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
            <div class="max-w-2xl space-y-3">
                <span class="text-brand-accent text-sm font-bold tracking-widest uppercase">Artikel & Edukasi</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">Informasi Terbaru Dari Dunia Sipil</h2>
                <p class="text-slate-600">
                    Dapatkan wawasan seputar tips arsitektur, perhitungan material bangunan, dan berita dunia sipil secara berkala.
                </p>
            </div>
            <div>
                <a href="{{ route('articles.index') }}" 
                   class="inline-flex items-center px-6 py-3 rounded-xl bg-slate-900 text-white font-bold hover:bg-slate-800 transition-colors shadow">
                    <span>Lihat Semua Artikel</span>
                    <i class="fa-solid fa-arrow-right ml-2 text-brand-accent"></i>
                </a>
            </div>
        </div>

        <!-- Articles Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($latestArticles as $article)
                <article class="bg-white rounded-2xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col">
                    <!-- Cover -->
                    <div class="h-48 overflow-hidden bg-slate-900 relative">
                        <img src="{{ $article->cover_image ?? 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=800&h=450&fit=crop' }}" 
                             class="w-full h-full object-cover transition-transform duration-500 hover:scale-105" 
                             alt="{{ $article->title }}">
                        <!-- Category badge -->
                        <span class="absolute top-4 left-4 bg-slate-900/85 backdrop-blur-md text-white text-xs font-bold px-3 py-1 rounded-full border border-slate-700">
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
                            <a href="{{ $article->external_link ?? route('articles.show', $article->slug) }}" @if($article->external_link) target="_blank" rel="noopener" @endif class="text-brand-accent hover:text-brand-accent font-bold text-xs inline-flex items-center">
                                Baca Selengkapnya <i class="fa-solid fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-3 text-center py-12 text-slate-400">
                    Belum ada artikel terbaru.
                </div>
            @endforelse
        </div>
    </div>
</section>
