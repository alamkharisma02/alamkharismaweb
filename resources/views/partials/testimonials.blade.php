<!-- Testimonials Section -->
@php
    $chunks = $testimonials->chunk(3);
@endphp

<section class="py-24 bg-[#F9F7F3] relative overflow-hidden border-t border-[#C5A880]/10"
         x-data="{ 
             activeSlide: 0,
             totalSlides: {{ $chunks->count() }}
         }">
    <!-- Ambient luxury background glow -->
    <div class="absolute -right-24 -top-24 w-96 h-96 bg-[#C5A880]/5 rounded-full blur-3xl"></div>
    <div class="absolute -left-24 -bottom-24 w-96 h-96 bg-[#0A1E13]/5 rounded-full blur-3xl"></div>
    <div class="absolute inset-0 luxury-grid-pattern opacity-10"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto space-y-3 mb-16 reveal-on-scroll">
            <span class="text-[#C5A880] text-sm font-bold tracking-widest uppercase block">Testimoni Klien</span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#0A1E13] tracking-tight font-serif">Apa Kata Mereka Tentang Kami?</h2>
            <div class="w-20 h-[2px] bg-[#C5A880] mx-auto mt-4"></div>
            <p class="text-slate-650 text-slate-600 leading-relaxed text-sm sm:text-base font-light mt-4">
                Kepercayaan dan kepuasan pemilik proyek adalah motivasi utama dari kualitas pengerjaan kami.
            </p>
        </div>

        <!-- Testimonials Slides -->
        <div class="relative reveal-on-scroll delay-100">
            @forelse($chunks as $index => $chunk)
                <div x-show="activeSlide === {{ $index }}" 
                     x-transition:enter="transition ease-out duration-500"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     class="grid grid-cols-1 md:grid-cols-3 gap-8"
                     style="{{ $index > 0 ? 'display: none;' : '' }}">
                    @foreach($chunk as $t)
                        <div class="bg-white rounded-3xl p-8 border border-[#C5A880]/20 shadow-sm relative flex flex-col justify-between hover:shadow-2xl hover:border-[#C5A880]/60 hover:-translate-y-1 transition-all duration-500 group">
                            <!-- Hover gold line decoration -->
                            <div class="absolute top-0 left-0 right-0 h-[3px] bg-gradient-to-r from-[#C5A880] to-transparent transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                            
                            <div>
                                <!-- Star Rating -->
                                <div class="flex text-[#C5A880] text-xs gap-1 mb-4">
                                    @for($i = 0; $i < ($t->rating ?? 5); $i++)
                                        <i class="fa-solid fa-star"></i>
                                    @endfor
                                </div>
                                
                                <!-- Quote Icon -->
                                <div class="text-[#C5A880] text-3xl mb-4 opacity-50"><i class="fa-solid fa-quote-left"></i></div>
                                <p class="text-slate-650 text-slate-650 text-sm leading-relaxed italic mb-6 font-light">
                                    "{{ $t->content }}"
                                </p>
                            </div>
                            
                            <div class="flex items-center space-x-3.5 border-t border-slate-100 pt-4">
                                <div class="w-10 h-10 rounded-full bg-[#C5A880]/15 text-[#0A1E13] font-bold flex items-center justify-center text-sm border border-[#C5A880]/30 shadow-sm">
                                    {{ $t->avatar ?? 'AKB' }}
                                </div>
                                <div>
                                    <h4 class="text-[#0A1E13] font-serif font-bold text-sm tracking-wide">{{ $t->name }}</h4>
                                    <p class="text-slate-400 text-xs mt-0.5">{{ $t->company }}</p>
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
                            class="w-10 h-10 rounded-full bg-white border border-[#C5A880]/20 hover:border-[#C5A880]/60 text-[#0A1E13] hover:text-[#C5A880] flex items-center justify-center shadow-sm hover:scale-105 transition-all duration-300 cursor-pointer mr-2">
                        <i class="fa-solid fa-chevron-left text-xs"></i>
                    </button>
                    
                    <template x-for="i in totalSlides" :key="i-1">
                        <button @click="activeSlide = i-1"
                                :class="activeSlide === i-1 ? 'bg-[#C5A880] w-6' : 'bg-slate-350 bg-slate-300 hover:bg-slate-400 w-2'"
                                class="h-2 rounded-full transition-all duration-350 cursor-pointer">
                        </button>
                    </template>

                    <button @click="activeSlide = activeSlide < totalSlides - 1 ? activeSlide + 1 : 0"
                            class="w-10 h-10 rounded-full bg-white border border-[#C5A880]/20 hover:border-[#C5A880]/60 text-[#0A1E13] hover:text-[#C5A880] flex items-center justify-center shadow-sm hover:scale-105 transition-all duration-300 cursor-pointer ml-2">
                        <i class="fa-solid fa-chevron-right text-xs"></i>
                    </button>
                </div>
            @endif
        </div>
    </div>
</section>
