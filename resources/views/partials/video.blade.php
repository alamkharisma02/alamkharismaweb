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
    
    <section class="py-24 bg-slate-50 text-slate-900 relative overflow-hidden border-t border-slate-200"
             x-data="{ 
                 activeIdx: 0,
                 projects: {{ json_encode($formattedVideoProjects) }}
             }">
        <!-- Ambient background glow -->
        <div class="absolute inset-0 opacity-5">
            <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=1920&h=1080&fit=crop" class="w-full h-full object-cover" alt="Video Background">
        </div>
        
        <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 z-10 text-center space-y-6 animate-fade-in">
            <span class="inline-flex items-center px-3.5 py-1 rounded-full text-xs font-bold bg-brand-accent/10 text-brand-primary border border-brand-accent/20 uppercase tracking-widest">
                <i class="fa-solid fa-circle-play mr-2"></i> Dokumentasi Lapangan
            </span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                Dokumentasi Proyek & Hasil Kerja
            </h2>
            <p class="text-slate-600 max-w-2xl mx-auto text-sm sm:text-base leading-relaxed">
                Simak video footage hasil pembangunan dan pengerjaan konstruksi kami langsung dari lapangan. Geser slide untuk melihat video proyek lainnya.
            </p>

            <!-- Video Player and Slider -->
            <div class="relative max-w-4xl mx-auto">
                
                <!-- Display Active Video Frame -->
                <div class="relative rounded-3xl overflow-hidden shadow-2xl border border-slate-200 bg-slate-950 aspect-video w-full transition-all duration-300">
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
                            <!-- YouTube Embed -->
                            <template x-if="!proj.is_local">
                                <iframe class="w-full h-full border-0" 
                                        :src="proj.video_url" 
                                        :title="proj.title" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                        allowfullscreen>
                                </iframe>
                            </template>
                        </div>
                    </template>
                </div>

                <!-- Left Navigation Arrow -->
                <button @click="activeIdx = activeIdx > 0 ? activeIdx - 1 : projects.length - 1"
                        x-show="projects.length > 1"
                        class="absolute -left-4 sm:-left-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white text-slate-800 hover:text-brand-primary flex items-center justify-center shadow-lg hover:scale-105 active:scale-95 transition-all z-20 cursor-pointer border border-slate-200">
                    <i class="fa-solid fa-chevron-left text-lg"></i>
                </button>

                <!-- Right Navigation Arrow -->
                <button @click="activeIdx = activeIdx < projects.length - 1 ? activeIdx + 1 : 0"
                        x-show="projects.length > 1"
                        class="absolute -right-4 sm:-right-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white text-slate-800 hover:text-brand-primary flex items-center justify-center shadow-lg hover:scale-105 active:scale-95 transition-all z-20 cursor-pointer border border-slate-200">
                    <i class="fa-solid fa-chevron-right text-lg"></i>
                </button>
            </div>

            <!-- Active Project Info & Thumbnail Indicators -->
            <div class="space-y-4 max-w-2xl mx-auto pt-4">
                <!-- Info of active video -->
                <div class="min-h-[70px]">
                    <h3 class="text-slate-900 font-extrabold text-lg sm:text-xl" x-text="projects[activeIdx].title"></h3>
                    <p class="text-xs sm:text-sm text-slate-500 font-semibold mt-1" x-show="projects[activeIdx].description">
                        <i class="fa-solid fa-circle-info text-brand-accent mr-1"></i> <span x-text="projects[activeIdx].description"></span>
                    </p>
                </div>

                <!-- Indicators -->
                <div class="flex justify-center items-center gap-2" x-show="projects.length > 1">
                    <template x-for="(proj, idx) in projects" :key="idx">
                        <button @click="activeIdx = idx" 
                                :class="activeIdx === idx ? 'w-8 bg-brand-primary' : 'w-2 bg-slate-300 hover:bg-slate-400'"
                                class="h-2 rounded-full transition-all duration-300 cursor-pointer">
                        </button>
                    </template>
                </div>
            </div>

        </div>
    </section>
@endif
