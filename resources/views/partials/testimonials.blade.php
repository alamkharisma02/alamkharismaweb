<!-- Testimonials Section -->
@php
    $chunks = $testimonials->chunk(3);
@endphp

<section class="py-24 bg-white relative"
         x-data="{ 
             activeSlide: 0,
             totalSlides: {{ $chunks->count() }}
         }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto space-y-3 mb-16">
            <span class="text-brand-accent text-sm font-bold tracking-widest uppercase">Testimoni Klien</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">Apa Kata Mereka Tentang Kami?</h2>
            <p class="text-slate-600">
                Kepercayaan dan kepuasan pemilik proyek adalah motivasi utama dari kualitas pengerjaan kami.
            </p>
        </div>

        <!-- Testimonials Slides -->
        <div class="relative">
            @forelse($chunks as $index => $chunk)
                <div x-show="activeSlide === {{ $index }}" 
                     x-transition:enter="transition ease-out duration-500"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     class="grid grid-cols-1 md:grid-cols-3 gap-8"
                     style="{{ $index > 0 ? 'display: none;' : '' }}">
                    @foreach($chunk as $t)
                        <div class="bg-slate-50 rounded-2xl p-8 border border-slate-200 shadow-sm relative flex flex-col justify-between hover:shadow-md transition-shadow">
                            <div>
                                <!-- Quote Icon -->
                                <div class="text-brand-accent text-3xl mb-4"><i class="fa-solid fa-quote-left"></i></div>
                                <p class="text-slate-600 text-sm leading-relaxed italic mb-6">
                                    "{{ $t->content }}"
                                </p>
                            </div>
                            <div class="flex items-center space-x-3.5 border-t border-slate-200/60 pt-4">
                                <div class="w-10 h-10 rounded-full bg-brand-accent/10 text-brand-primary font-extrabold flex items-center justify-center text-sm border border-brand-accent/20">
                                    {{ $t->avatar ?? 'AKB' }}
                                </div>
                                <div>
                                    <h4 class="text-slate-950 font-bold text-sm">{{ $t->name }}</h4>
                                    <p class="text-slate-400 text-xs">{{ $t->company }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @empty
                <div class="text-center py-12 text-slate-400">
                    Belum ada testimoni klien.
                </div>
            @endforelse

            <!-- Navigation Controls -->
            @if($chunks->count() > 1)
                <!-- Indicators & Dots -->
                <div class="flex justify-center items-center gap-2 mt-10">
                    <button @click="activeSlide = activeSlide > 0 ? activeSlide - 1 : totalSlides - 1"
                            class="w-8 h-8 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-700 flex items-center justify-center transition-colors cursor-pointer mr-2">
                        <i class="fa-solid fa-chevron-left text-xs"></i>
                    </button>
                    
                    <template x-for="i in totalSlides" :key="i-1">
                        <button @click="activeSlide = i-1"
                                :class="activeSlide === i-1 ? 'bg-brand-primary' : 'bg-slate-300 hover:bg-slate-400'"
                                class="w-2 h-2 rounded-full transition-all duration-300 cursor-pointer">
                        </button>
                    </template>

                    <button @click="activeSlide = activeSlide < totalSlides - 1 ? activeSlide + 1 : 0"
                            class="w-8 h-8 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-700 flex items-center justify-center transition-colors cursor-pointer ml-2">
                        <i class="fa-solid fa-chevron-right text-xs"></i>
                    </button>
                </div>
            @endif
        </div>
    </div>
</section>
