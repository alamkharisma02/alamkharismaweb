<!-- Multiple Video Showcase Section -->
@if($videoProjects->count() > 0)
    @php
        $formattedVideoProjects = $videoProjects->map(function($p) {
            $isLocal = $p->is_local;
            $videoUrl = $p->video_url;
            $embedUrl = $videoUrl;
            
            if (!$isLocal) {
                // Convert standard watch link to secure embed link
                if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $videoUrl, $match)) {
                    $embedUrl = "https://www.youtube.com/embed/" . $match[1];
                }
            } else {
                $embedUrl = $p->play_url;
            }
            
            return [
                'title' => $p->title,
                'description' => $p->description ?? '',
                'video_url' => $embedUrl,
                'is_local' => $isLocal,
            ];
        });
    @endphp
    
    <section class="py-24 bg-[#0A1E13] text-white relative overflow-hidden border-t border-[#C5A880]/15"
             x-data="{ 
                 activeIdx: 0,
                 projects: {{ json_encode($formattedVideoProjects) }}
             }">
        <!-- Luxury Grid Pattern & Ambient Light -->
        <div class="absolute inset-0 bg-[#0A1E13] z-0"></div>
        <div class="absolute -right-24 -top-24 w-96 h-96 bg-[#C5A880]/10 rounded-full blur-3xl z-0"></div>
        <div class="absolute -left-24 -bottom-24 w-96 h-96 bg-black/45 rounded-full blur-3xl z-0"></div>
        <div class="absolute inset-0 luxury-grid-pattern opacity-15 z-0"></div>
        
        <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 z-10 text-center space-y-6 reveal-on-scroll">
            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold bg-[#C5A880]/15 text-[#C5A880] border border-[#C5A880]/30 uppercase tracking-widest animate-pulse-gold">
                <i class="fa-solid fa-circle-play mr-2"></i> Dokumentasi Lapangan
            </span>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl xl:text-5xl font-extrabold text-white tracking-tight font-serif">
                Dokumentasi Proyek &amp; Hasil Kerja
            </h2>
            <div class="w-20 h-[2px] bg-[#C5A880] mx-auto"></div>
            <p class="text-slate-300 max-w-2xl mx-auto text-sm sm:text-base leading-relaxed font-light mt-4">
                Simak video footage hasil pembangunan dan pengerjaan konstruksi kami langsung dari lapangan. Geser slide untuk melihat video proyek lainnya.
            </p>

            <!-- Video Player and Slider -->
            <div class="relative max-w-4xl mx-auto pt-6 reveal-on-scroll delay-100">
                <!-- Decorative frame glow -->
                <div class="absolute -inset-1.5 rounded-[2.5rem] bg-gradient-to-r from-[#C5A880] to-[#0A1E13] opacity-25 blur-lg z-0"></div>
                
                <!-- Display Active Video Frame -->
                <div class="relative rounded-[2rem] overflow-hidden shadow-2xl border border-[#C5A880]/40 bg-black aspect-video w-full transition-all duration-500 z-10">
                    <template x-for="(proj, idx) in projects" :key="idx">
                        <div x-show="activeIdx === idx" class="w-full h-full">
                            <!-- Local Video Player -->
                            <template x-if="proj.is_local">
                                <video class="w-full h-full object-cover" 
                                       :src="proj.video_url" 
                                       controls 
                                       playsinline>
                                </video>
                            </template>
                            <!-- YouTube Embed - Clean Player -->
                            <template x-if="!proj.is_local">
                                <iframe class="w-full h-full border-0" 
                                        :src="proj.video_url + '?rel=0&showinfo=0&modestbranding=1&iv_load_policy=3&disablekb=0&fs=1&color=white'" 
                                        :title="proj.title" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                        allowfullscreen>
                                </iframe>
                            </template>
                        </div>
                    </template>
                </div>

                <!-- Left Navigation Arrow -->
                <button @click="activeIdx = activeIdx > 0 ? activeIdx - 1 : projects.length - 1"
                        x-show="projects.length > 1"
                        class="absolute -left-2 sm:-left-4 md:-left-6 top-1/2 -translate-y-1/2 w-9 h-9 sm:w-12 sm:h-12 rounded-full bg-[#0A1E13] text-white hover:text-[#C5A880] flex items-center justify-center shadow-2xl hover:scale-105 active:scale-95 transition-all duration-300 z-20 cursor-pointer border border-[#C5A880]/30 hover:border-[#C5A880]">
                    <i class="fa-solid fa-chevron-left text-lg"></i>
                </button>

                <!-- Right Navigation Arrow -->
                <button @click="activeIdx = activeIdx < projects.length - 1 ? activeIdx + 1 : 0"
                        x-show="projects.length > 1"
                        class="absolute -right-2 sm:-right-4 md:-right-6 top-1/2 -translate-y-1/2 w-9 h-9 sm:w-12 sm:h-12 rounded-full bg-[#0A1E13] text-white hover:text-[#C5A880] flex items-center justify-center shadow-2xl hover:scale-105 active:scale-95 transition-all duration-300 z-20 cursor-pointer border border-[#C5A880]/30 hover:border-[#C5A880]">
                    <i class="fa-solid fa-chevron-right text-lg"></i>
                </button>
            </div>

            <!-- Active Project Info & Thumbnail Indicators -->
            <div class="space-y-4 max-w-2xl mx-auto pt-6 reveal-on-scroll delay-200">
                <!-- Info of active video -->
                <div class="min-h-[80px]">
                    <h3 class="text-white font-serif font-bold text-xl sm:text-2xl tracking-wide" x-text="projects[activeIdx].title"></h3>
                    <p class="text-xs sm:text-sm text-slate-300 font-light mt-2" x-show="projects[activeIdx].description">
                        <i class="fa-solid fa-circle-info text-[#C5A880] mr-1.5"></i> <span x-text="projects[activeIdx].description"></span>
                    </p>
                </div>

                <!-- Indicators -->
                <div class="flex justify-center items-center gap-2" x-show="projects.length > 1">
                    <template x-for="(proj, idx) in projects" :key="idx">
                        <button @click="activeIdx = idx" 
                                :class="activeIdx === idx ? 'w-8 bg-[#C5A880]' : 'w-2 bg-white/20 hover:bg-white/40'"
                                class="h-2 rounded-full transition-all duration-300 cursor-pointer">
                        </button>
                    </template>
                </div>
            </div>

        </div>
    </section>
@endif
