@extends('layouts.app')

@section('title', $article->title . ' - Artikel ' . \App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara'))
@section('meta_description', Str::limit(strip_tags($article->content), 150))

@section('content')
    <!-- Banner Space Filler -->
    <div class="h-20 bg-[#0A1E13]"></div>

    <section class="py-24 bg-[#0A1E13] relative overflow-hidden">
        <!-- Decorative Glow -->
        <div class="absolute right-0 top-1/4 w-[500px] h-[500px] bg-[#C5A880]/5 rounded-full blur-[120px]"></div>
        <div class="absolute inset-0 luxury-grid-pattern opacity-5"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                <!-- Left: Article Content -->
                <article class="lg:col-span-8 space-y-8 reveal-on-scroll">
                    <!-- Category & Meta -->
                    <div class="flex items-center space-x-3 text-xs text-slate-400 font-semibold font-mono">
                        <span class="px-3.5 py-1.5 rounded-lg bg-[#C5A880]/15 text-[#C5A880] border border-[#C5A880]/20 uppercase tracking-widest font-bold">
                            {{ $article->category }}
                        </span>
                        <span>•</span>
                        <span><i class="fa-solid fa-calendar mr-2 text-[#C5A880]"></i> {{ $article->published_at ? $article->published_at->format('d M Y') : $article->created_at->format('d M Y') }}</span>
                    </div>

                    <!-- Title -->
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white leading-tight font-serif">
                        {{ $article->title }}
                    </h1>

                    <!-- Author Info -->
                    <div class="flex items-center space-x-4 py-4 border-y border-white/5 bg-white/5 rounded-2xl px-6 border border-white/10 backdrop-blur-md">
                        <div class="w-12 h-12 rounded-full bg-[#C5A880]/15 text-[#C5A880] flex items-center justify-center font-bold text-base border border-[#C5A880]/30 shadow-lg">
                            AKB
                        </div>
                        <div>
                            <span class="block text-sm font-bold text-white font-serif">Ditulis oleh: Tim Insinyur {{ \App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara') }}</span>
                            <span class="block text-xs text-slate-400 mt-0.5">Tim Ahli Sipil & Arsitektur</span>
                        </div>
                    </div>

                    <!-- Cover Image -->
                    <div class="rounded-3xl overflow-hidden shadow-2xl border border-white/10 bg-black">
                        <img src="{{ $article->cover_image ?? 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=1200&h=630&fit=crop' }}" 
                             class="w-full h-auto max-h-[460px] object-cover" 
                             alt="{{ $article->title }}">
                    </div>

                    <!-- Article Content Text -->
                    <div class="text-slate-200 text-base sm:text-lg leading-relaxed space-y-6 pt-4 font-light text-justify font-sans">
                        {!! nl2br(e($article->content)) !!}
                    </div>

                    <!-- Share buttons -->
                    <div class="pt-8 border-t border-white/5 flex flex-wrap items-center gap-4">
                        <span class="text-sm font-bold text-slate-400 font-serif">Bagikan Artikel:</span>
                        <a href="https://api.whatsapp.com/send?text={{ urlencode($article->title . ' - ' . request()->url()) }}" target="_blank"
                           class="w-10 h-10 rounded-full bg-emerald-500 text-white flex items-center justify-center hover:bg-emerald-400 hover:scale-105 active:scale-95 transition-all shadow-md">
                            <i class="fa-brands fa-whatsapp text-lg"></i>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank"
                           class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center hover:bg-blue-500 hover:scale-105 active:scale-95 transition-all shadow-md">
                            <i class="fa-brands fa-facebook-f text-sm"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($article->title) }}&url={{ urlencode(request()->url()) }}" target="_blank"
                           class="w-10 h-10 rounded-full bg-sky-500 text-white flex items-center justify-center hover:bg-sky-400 hover:scale-105 active:scale-95 transition-all shadow-md">
                            <i class="fa-brands fa-twitter text-sm"></i>
                        </a>
                    </div>

                </article>

                <!-- Right: Related Articles & Side CTA -->
                <div class="lg:col-span-4 space-y-8 reveal-on-scroll">
                    
                    <!-- Search Widget -->
                    <div class="p-6 sm:p-8 rounded-3xl bg-white/5 border border-white/10 shadow-2xl space-y-4 backdrop-blur-md">
                        <h3 class="font-bold text-white text-sm uppercase tracking-wider font-serif">Cari Artikel Lain</h3>
                        <form action="{{ route('articles.index') }}" method="GET" class="relative">
                            <input type="text" name="search" placeholder="Ketik kata kunci..." 
                                   class="w-full pl-5 pr-12 py-3.5 bg-[#0A1E13] border border-white/10 rounded-xl text-sm text-white focus:outline-none focus:ring-2 focus:ring-[#C5A880] focus:border-transparent font-light font-sans">
                            <button type="submit" class="absolute right-4 top-4 text-slate-400 hover:text-[#C5A880] transition-colors">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                    </div>

                    <!-- Related Articles Widget -->
                    @if($relatedArticles->count() > 0)
                        <div class="p-6 sm:p-8 rounded-3xl bg-white/5 border border-white/10 shadow-2xl space-y-6 backdrop-blur-md">
                            <h3 class="font-bold text-white text-sm uppercase tracking-wider border-b border-white/5 pb-3 font-serif">Artikel Terkait</h3>
                            <div class="space-y-5">
                                @foreach($relatedArticles as $rel)
                                    <div class="flex items-start space-x-4 group">
                                        <div class="w-16 h-12 rounded-xl overflow-hidden flex-shrink-0 bg-black border border-white/5">
                                            <img src="{{ $rel->cover_image ?? 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=800&h=450&fit=crop' }}" 
                                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" alt="Related Cover">
                                        </div>
                                        <div class="flex-1 space-y-1">
                                            <h4 class="text-xs font-bold text-white leading-snug line-clamp-2 group-hover:text-[#C5A880] transition-colors font-serif">
                                                <a href="{{ $rel->external_link ?? route('articles.show', $rel->slug) }}" @if($rel->external_link) target="_blank" rel="noopener" @endif>{{ $rel->title }}</a>
                                            </h4>
                                            <span class="text-[10px] text-slate-400 font-mono">{{ $rel->published_at ? $rel->published_at->format('d M Y') : $rel->created_at->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Consultation WA CTA -->
                    <div class="p-8 rounded-3xl bg-white/5 text-white space-y-6 shadow-2xl border border-white/10 backdrop-blur-md relative overflow-hidden group hover:border-[#C5A880]/30 transition-all duration-300">
                        <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-[#C5A880]/2 rounded-full blur-xl group-hover:bg-[#C5A880]/8 transition-all duration-500"></div>
                        <div class="w-12 h-12 rounded-2xl bg-[#C5A880]/15 text-[#C5A880] flex items-center justify-center text-xl font-bold shadow-lg border border-[#C5A880]/30">
                            <i class="fa-brands fa-whatsapp text-xl"></i>
                        </div>
                        <h3 class="font-bold text-white text-lg font-serif">Konsultasi Rencana Anggaran Biaya (RAB) Gratis</h3>
                        <p class="text-xs sm:text-sm text-slate-300 leading-relaxed font-light font-sans">
                            Hubungi tim insinyur sipil dan arsitek kami via WhatsApp untuk penyusunan estimasi RAB yang transparan dan terperinci.
                        </p>
                        <a href="https://api.whatsapp.com/send?phone={{ \App\Models\Setting::get('contact_whatsapp') }}&text=Halo%20PT%20Alam%2520Kharisma%2520Bersaudara%252C%2520saya%2520ingin%2520berkonsultasi%2520mengenai%2520RAB%252520dan%252520rencana%252520pembangunan%252520proyek%25252520saya." 
                           target="_blank"
                           class="w-full inline-flex items-center justify-center px-5 py-3.5 bg-gradient-to-r from-[#C5A880] to-[#B4966B] hover:from-[#B4966B] hover:to-[#A3855A] text-[#0A1E13] hover:text-[#0A1E13] font-bold text-xs rounded-xl shadow transition-all duration-300 uppercase tracking-wider">
                            <span>Hubungi via WhatsApp</span>
                            <i class="fa-solid fa-chevron-right ml-2 text-[10px]"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
