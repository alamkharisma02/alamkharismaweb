<!-- Portfolio Showcase (Daftar Hasil Kerja) -->
<section class="py-24 bg-white relative border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
            <div class="max-w-2xl space-y-3">
                <span class="text-brand-accent text-sm font-bold tracking-widest uppercase">Portofolio Kerja</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">Karya Konstruksi Unggulan Kami</h2>
                <p class="text-slate-600">
                    Berikut adalah dokumentasi foto and video dari hasil pengerjaan konstruksi arsitektur sipil kami.
                </p>
            </div>
            <div>
                <a href="{{ route('projects.index') }}" 
                   class="inline-flex items-center px-6 py-3 rounded-xl bg-slate-900 text-white font-bold hover:bg-slate-800 transition-colors shadow">
                    <span>Lihat Seluruh Portofolio</span>
                    <i class="fa-solid fa-arrow-right ml-2 text-brand-accent"></i>
                </a>
            </div>
        </div>

        <!-- Portfolio Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($featuredProjects as $project)
                <div class="group rounded-2xl overflow-hidden border border-slate-100 bg-white shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col relative">
                    <!-- Image Cover -->
                    <div class="relative aspect-[4/3] overflow-hidden bg-slate-900">
                        <img src="{{ $project->cover_image ?? 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&h=600&fit=crop' }}" 
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
                            <p class="text-slate-500 text-xs sm:text-sm line-clamp-2 leading-relaxed">
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
                <div class="col-span-3 text-center py-12 text-slate-400">
                    Belum ada portofolio proyek unggulan.
                </div>
            @endforelse
        </div>
    </div>
</section>
