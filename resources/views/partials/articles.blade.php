<!-- Articles / News Section -->
<section class="py-24 bg-[#F9F7F3] border-t border-[#C5A880]/10 relative overflow-hidden">
    <!-- Ambient luxury background glow -->
    <div class="absolute -right-24 bottom-0 w-96 h-96 bg-[#C5A880]/5 rounded-full blur-3xl"></div>
    <div class="absolute inset-0 luxury-grid-pattern opacity-10"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6 reveal-on-scroll">
            <div class="max-w-2xl space-y-3">
                <span class="text-[#C5A880] text-sm font-bold tracking-widest uppercase block">Artikel &amp; Edukasi</span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#0A1E13] tracking-tight font-serif">Informasi Terbaru Dari Dunia Sipil</h2>
                <div class="w-20 h-[2px] bg-[#C5A880] mt-3"></div>
                <p class="text-slate-650 text-slate-600 text-sm sm:text-base font-light mt-4">
                    Dapatkan wawasan seputar tips arsitektur, perhitungan material bangunan, dan berita dunia sipil secara berkala.
                </p>
            </div>
            <div>
                <a href="{{ route('articles.index') }}" 
                   class="inline-flex items-center px-6 py-3.5 rounded-xl bg-gradient-to-r from-[#C5A880] to-[#B4966B] hover:from-[#B4966B] hover:to-[#A3855A] text-[#0A1E13] font-bold text-sm transition-all duration-300 transform hover:-translate-y-1 active:translate-y-0 shadow-lg hover:shadow-[#C5A880]/20 tracking-wider uppercase">
                    <span>Lihat Semua Artikel</span>
                    <i class="fa-solid fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>

        <!-- Articles Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($latestArticles as $idx => $article)
                <article class="reveal-on-scroll bg-white rounded-3xl overflow-hidden border border-[#C5A880]/20 shadow-sm hover:shadow-2xl hover:border-[#C5A880]/60 hover:-translate-y-2 transition-all duration-500 flex flex-col group relative"
                         style="transition-delay: {{ $idx * 100 }}ms">
                    <!-- Hover gold line decoration -->
                    <div class="absolute top-0 left-0 right-0 h-[3px] bg-gradient-to-r from-[#C5A880] to-transparent transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left z-20"></div>
                    
                    <!-- Cover -->
                    <div class="h-52 overflow-hidden bg-slate-900 relative">
                        <img src="{{ $article->cover_image ?? 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=800&h=450&fit=crop' }}" 
                             class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105" 
                             alt="{{ $article->title }}">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                        <!-- Category badge -->
                        <span class="absolute top-4 left-4 bg-[#0A1E13]/90 backdrop-blur-md text-white text-[10px] font-bold px-3 py-1 rounded-full border border-[#C5A880]/30 tracking-widest uppercase">
                            {{ $article->category }}
                        </span>
                    </div>

                    <!-- Content -->
                    <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                        <div>
                            <div class="flex items-center text-xs text-slate-400 space-x-3 mb-2 font-light">
                                <span><i class="fa-solid fa-calendar text-[#C5A880] mr-1.5"></i> {{ $article->published_at ? $article->published_at->format('d M Y') : $article->created_at->format('d M Y') }}</span>
                            </div>
                            <h3 class="text-[#0A1E13] font-serif font-bold text-lg leading-snug line-clamp-2 hover:text-[#C5A880] transition-colors duration-300">
                                <a href="{{ $article->external_link ?? route('articles.show', $article->slug) }}" @if($article->external_link) target="_blank" rel="noopener" @endif>{{ $article->title }}</a>
                            </h3>
                            <p class="text-slate-650 text-slate-600 text-xs sm:text-sm font-light line-clamp-3 mt-2 leading-relaxed">
                                {{ strip_tags($article->content) }}
                            </p>
                        </div>
 
                        <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-xs text-slate-400 font-light">Oleh: Admin Sipil</span>
                            <a href="{{ $article->external_link ?? route('articles.show', $article->slug) }}" @if($article->external_link) target="_blank" rel="noopener" @endif class="text-[#C5A880] hover:text-[#B4966B] font-bold text-xs inline-flex items-center group-hover:underline">
                                Baca Selengkapnya <i class="fa-solid fa-arrow-right ml-1 transition-transform group-hover:translate-x-1"></i>
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
