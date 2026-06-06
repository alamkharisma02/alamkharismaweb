@extends('layouts.app')

@section('title', $article->title . ' - Artikel ' . \App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara'))
@section('meta_description', Str::limit(strip_tags($article->content), 150))

@section('content')
    <!-- Banner Space Filler -->
    <div class="h-20 bg-slate-950"></div>

    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                <!-- Left: Article Content -->
                <article class="lg:col-span-8 space-y-6">
                    <!-- Category & Meta -->
                    <div class="flex items-center space-x-3 text-xs text-slate-500 font-semibold">
                        <span class="px-3 py-1 rounded-full bg-brand-accent/10 text-brand-accent border border-brand-accent/20 uppercase tracking-wider font-bold">
                            {{ $article->category }}
                        </span>
                        <span>•</span>
                        <span><i class="fa-solid fa-calendar mr-1"></i> {{ $article->published_at ? $article->published_at->format('d M Y') : $article->created_at->format('d M Y') }}</span>
                    </div>

                    <!-- Title -->
                    <h1 class="text-2xl sm:text-4xl font-extrabold text-slate-950 leading-tight">
                        {{ $article->title }}
                    </h1>

                    <!-- Author Info -->
                    <div class="flex items-center space-x-3 py-3 border-y border-slate-100">
                        <div class="w-10 h-10 rounded-full bg-slate-200 text-slate-700 flex items-center justify-center font-bold text-sm">
                            AKB
                        </div>
                        <div>
                            <span class="block text-sm font-bold text-slate-900">Ditulis oleh: Tim Insinyur {{ \App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara') }}</span>
                            <span class="block text-xs text-slate-400">Tim Ahli Sipil & Arsitektur</span>
                        </div>
                    </div>

                    <!-- Cover Image -->
                    <div class="rounded-2xl overflow-hidden shadow-sm border border-slate-200 bg-slate-100">
                        <img src="{{ $article->cover_image ?? 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=1200&h=630&fit=crop' }}" 
                             class="w-full h-auto max-h-[420px] object-cover" 
                             alt="{{ $article->title }}">
                    </div>

                    <!-- Article Content Text -->
                    <div class="text-slate-700 text-base sm:text-lg leading-relaxed space-y-6 pt-4">
                        {!! nl2br(e($article->content)) !!}
                    </div>

                    <!-- Share buttons -->
                    <div class="pt-8 border-t border-slate-100 flex flex-wrap items-center gap-4">
                        <span class="text-sm font-bold text-slate-500">Bagikan Artikel:</span>
                        <a href="https://api.whatsapp.com/send?text={{ urlencode($article->title . ' - ' . request()->url()) }}" target="_blank"
                           class="w-8 h-8 rounded-full bg-emerald-500 text-white flex items-center justify-center hover:bg-emerald-400 hover:scale-105 transition-all">
                            <i class="fa-brands fa-whatsapp text-sm"></i>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank"
                           class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center hover:bg-blue-500 hover:scale-105 transition-all">
                            <i class="fa-brands fa-facebook-f text-xs"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($article->title) }}&url={{ urlencode(request()->url()) }}" target="_blank"
                           class="w-8 h-8 rounded-full bg-sky-500 text-white flex items-center justify-center hover:bg-sky-400 hover:scale-105 transition-all">
                            <i class="fa-brands fa-twitter text-xs"></i>
                        </a>
                    </div>

                </article>

                <!-- Right: Related Articles & Side CTA -->
                <div class="lg:col-span-4 space-y-8">
                    
                    <!-- Search Widget -->
                    <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200 shadow-sm space-y-4">
                        <h3 class="font-bold text-slate-900 text-sm uppercase tracking-wide">Cari Artikel Lain</h3>
                        <form action="{{ route('articles.index') }}" method="GET" class="relative">
                            <input type="text" name="search" placeholder="Ketik kata kunci..." 
                                   class="w-full pl-4 pr-10 py-2.5 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent focus:border-transparent">
                            <button type="submit" class="absolute right-3 top-3 text-slate-400 hover:text-slate-600">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                    </div>

                    <!-- Related Articles Widget -->
                    @if($relatedArticles->count() > 0)
                        <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200 shadow-sm space-y-4">
                            <h3 class="font-bold text-slate-900 text-sm uppercase tracking-wide border-b border-slate-200 pb-2">Artikel Terkait</h3>
                            <div class="space-y-4">
                                @foreach($relatedArticles as $rel)
                                    <div class="flex items-start space-x-3.5 group">
                                        <div class="w-16 h-12 rounded overflow-hidden flex-shrink-0 bg-slate-900">
                                            <img src="{{ $rel->cover_image ?? 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=800&h=450&fit=crop' }}" 
                                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" alt="Related Cover">
                                        </div>
                                        <div class="flex-1 space-y-1">
                                            <h4 class="text-xs font-bold text-slate-900 line-clamp-2 group-hover:text-brand-accent transition-colors">
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
                    <div class="p-6 rounded-2xl bg-slate-900 text-white space-y-4 shadow-md border border-slate-800">
                        <div class="w-10 h-10 rounded-lg bg-emerald-500/10 text-emerald-500 flex items-center justify-center text-lg font-bold">
                            <i class="fa-brands fa-whatsapp"></i>
                        </div>
                        <h3 class="font-bold text-white text-base">Konsultasi Rencana Anggaran Biaya (RAB) Gratis</h3>
                        <p class="text-xs text-slate-400 leading-relaxed">
                            Hubungi tim insinyur sipil dan arsitek kami via WhatsApp untuk penyusunan estimasi RAB yang transparan dan terperinci.
                        </p>
                        <a href="https://api.whatsapp.com/send?phone={{ \App\Models\Setting::get('contact_whatsapp') }}&text=Halo%20PT%20Alam%20Kharisma%20Bersaudara%2C%20saya%20ingin%20berkonsultasi%20mengenai%20RAB%20dan%20rencana%20pembangunan%20proyek%20saya." 
                           target="_blank"
                           class="w-full inline-flex items-center justify-center px-4 py-2.5 bg-brand-accent text-slate-950 hover:bg-brand-accent-hover font-bold text-xs rounded-xl shadow transition-colors">
                            <span>Hubungi via WhatsApp</span>
                            <i class="fa-solid fa-chevron-right ml-1.5 text-[10px]"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
