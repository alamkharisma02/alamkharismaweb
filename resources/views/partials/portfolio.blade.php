<!-- Portfolio Showcase (Daftar Hasil Kerja) -->
<section class="py-24 bg-[#0A1E13] text-white relative overflow-hidden border-t border-[#C5A880]/15">
    <!-- Ambient luxury background glow -->
    <div class="absolute -right-24 -bottom-24 w-96 h-96 bg-[#C5A880]/10 rounded-full blur-3xl z-0"></div>
    <div class="absolute -left-24 -top-24 w-96 h-96 bg-black/45 rounded-full blur-3xl z-0"></div>
    <div class="absolute inset-0 luxury-grid-pattern opacity-15 z-0"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6 reveal-on-scroll">
            <div class="max-w-2xl space-y-3">
                <span class="text-[#C5A880] text-sm font-bold tracking-widest uppercase block">Portofolio Kerja</span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight font-serif">Karya Konstruksi Unggulan Kami</h2>
                <div class="w-20 h-[2px] bg-[#C5A880] mt-3"></div>
                <p class="text-slate-350 text-slate-300 text-sm sm:text-base font-light mt-4">
                    Berikut adalah dokumentasi foto dan video dari hasil pengerjaan konstruksi arsitektur sipil kami.
                </p>
            </div>
            <div>
                <a href="{{ route('projects.index') }}" 
                   class="inline-flex items-center px-6 py-3.5 rounded-xl bg-gradient-to-r from-[#C5A880] to-[#B4966B] hover:from-[#B4966B] hover:to-[#A3855A] text-[#0A1E13] font-bold text-sm transition-all duration-300 transform hover:-translate-y-1 active:translate-y-0 shadow-lg hover:shadow-[#C5A880]/20 tracking-wider uppercase">
                    <span>Lihat Seluruh Portofolio</span>
                    <i class="fa-solid fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>

        <!-- Portfolio Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($featuredProjects as $idx => $project)
                <div class="reveal-on-scroll group rounded-3xl overflow-hidden border border-[#C5A880]/25 bg-[#0A1E13]/80 shadow-2xl hover:border-[#C5A880]/60 hover:-translate-y-2 transition-all duration-500 flex flex-col relative"
                     style="transition-delay: {{ $idx * 100 }}ms">
                    <!-- Image Cover -->
                    <div class="relative aspect-[4/3] overflow-hidden bg-slate-950">
                        <img src="{{ $project->cover_image ?? 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&h=600&fit=crop' }}" 
                             class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105" 
                             alt="{{ $project->title }}">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0A1E13]/90 to-transparent"></div>
                        
                        <!-- Minimal status badge -->
                        <div class="absolute top-4 left-4 z-10">
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold tracking-wider uppercase bg-[#C5A880] text-[#0A1E13]">
                                {{ $project->status }}
                            </span>
                        </div>

                        <!-- Elegant play overlay if video exists -->
                        @if($project->video_url)
                            <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="w-12 h-12 rounded-full bg-[#C5A880] text-[#0A1E13] flex items-center justify-center text-lg shadow-lg transform scale-90 group-hover:scale-100 transition-transform duration-300 animate-pulse">
                                    <i class="fa-solid fa-play ml-0.5"></i>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Card Body -->
                    <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                        <div class="space-y-2">
                            <span class="text-[#C5A880] text-xs font-bold uppercase tracking-widest block">{{ $project->category }}</span>
                            <h3 class="text-white font-serif font-bold text-lg mt-1 group-hover:text-[#C5A880] transition-colors duration-300 line-clamp-1">
                                {{ $project->title }}
                            </h3>
                            <p class="text-slate-350 text-slate-300 text-xs sm:text-sm font-light line-clamp-2 leading-relaxed">
                                {{ $project->description }}
                            </p>
                        </div>

                        <div class="pt-4 border-t border-white/10 flex items-center justify-between text-xs text-slate-400">
                            <span><i class="fa-solid fa-map-marker-alt text-[#C5A880] mr-1.5"></i> {{ $project->location }}</span>
                            <a href="{{ route('projects.show', $project->slug) }}" class="text-white hover:text-[#C5A880] font-bold inline-flex items-center transition-colors group-hover:underline">
                                Detail Proyek <i class="fa-solid fa-arrow-right-long ml-1.5 transition-transform group-hover:translate-x-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-12 text-slate-400">
                    Belum ada portofolio proyek unggulan.
                </div>
            @endforelse
        </div>
    </div>
</section>
