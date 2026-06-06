@extends('layouts.app')

@section('title', 'Galeri Proyek - ' . \App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara'))
@section('meta_description', 'Lihat galeri dokumentasi foto proyek pembangunan, pengerjaan interior mewah, dan renovasi dari ' . \App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara') . '.')

@section('content')
    <!-- Banner Space Filler -->
    <div class="h-20 bg-[#0A1E13]"></div>

    <!-- Header Section -->
    <section class="relative bg-gradient-to-b from-[#0A1E13] via-[#050F09] to-[#0A1E13] py-24 border-b border-[#C5A880]/10 overflow-hidden">
        <!-- Background subtle glow shapes -->
        <div class="absolute right-0 top-0 w-96 h-96 bg-[#C5A880]/8 rounded-full blur-3xl -mr-20 -mt-20"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-emerald-500/5 rounded-full blur-3xl -ml-20 -mb-20"></div>
        <div class="absolute inset-0 luxury-grid-pattern opacity-10"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4 reveal-on-scroll">
            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold bg-[#C5A880]/15 text-[#C5A880] border border-[#C5A880]/30 uppercase tracking-widest animate-pulse-gold">
                <i class="fa-solid fa-images mr-1.5"></i> Gallery Showcase
            </span>
            <h1 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight leading-tight font-serif">
                Galeri Hasil Kerja
            </h1>
            <div class="w-20 h-[2px] bg-[#C5A880] mx-auto mt-4"></div>
            <p class="text-slate-300 max-w-2xl mx-auto text-sm sm:text-base leading-relaxed font-light mt-4">
                Dokumentasi visual proyek-proyek fisik sipil, interior mewah, dan lanskap eksterior yang dikerjakan oleh tim kami.
            </p>
        </div>
    </section>

    <!-- Gallery Section (Alpine Filtered) -->
    <section class="py-24 bg-[#0A1E13] relative overflow-hidden" x-data="{ 
        filter: 'all',
        selectedProject: null,
        selectedImages: [],
        currentImageIndex: 0,
        openModal(project) {
            this.selectedProject = project;
            let imgs = [project.cover_image];
            if (project.gallery_images && Array.isArray(project.gallery_images)) {
                imgs = imgs.concat(project.gallery_images);
            }
            this.selectedImages = imgs.filter(Boolean);
            this.currentImageIndex = 0;
            document.body.classList.add('overflow-hidden');
        },
        closeModal() {
            this.selectedProject = null;
            this.selectedImages = [];
            document.body.classList.remove('overflow-hidden');
        },
        nextImg() {
            if (this.currentImageIndex < this.selectedImages.length - 1) {
                this.currentImageIndex++;
            } else {
                this.currentImageIndex = 0;
            }
        },
        prevImg() {
            if (this.currentImageIndex > 0) {
                this.currentImageIndex--;
            } else {
                this.currentImageIndex = this.selectedImages.length - 1;
            }
        }
    }">
        <!-- Decorative Glow -->
        <div class="absolute left-1/2 bottom-1/4 w-[500px] h-[500px] bg-[#C5A880]/5 rounded-full blur-[120px] -translate-x-1/2"></div>
        <div class="absolute inset-0 luxury-grid-pattern opacity-5"></div>
        
        <!-- Watermark background -->
        <div class="absolute inset-0 z-0 opacity-[0.03] pointer-events-none mix-blend-overlay">
            <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=1920&h=1080&fit=crop" class="w-full h-full object-cover select-none" alt="Watermark bg">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            <!-- Category Filters -->
            <div class="flex flex-wrap justify-center items-center gap-3 mb-16 reveal-on-scroll">
                <button @click="filter = 'all'" 
                        :class="filter === 'all' ? 'bg-[#C5A880] text-[#0A1E13] font-bold shadow-lg shadow-[#C5A880]/20' : 'bg-white/5 text-white/80 border border-white/10 hover:bg-white/10 hover:text-white'"
                        class="px-6 py-3 rounded-xl text-xs sm:text-sm font-semibold transition-all duration-300 cursor-pointer focus:outline-none tracking-wider uppercase border border-transparent">
                    Semua Kategori
                </button>
                <button @click="filter = 'Interior'" 
                        :class="filter === 'Interior' ? 'bg-[#C5A880] text-[#0A1E13] font-bold shadow-lg shadow-[#C5A880]/20' : 'bg-white/5 text-white/80 border border-white/10 hover:bg-white/10 hover:text-white'"
                        class="px-6 py-3 rounded-xl text-xs sm:text-sm font-semibold transition-all duration-300 cursor-pointer focus:outline-none tracking-wider uppercase border border-transparent">
                    Interior
                </button>
                <button @click="filter = 'Komersial'" 
                        :class="filter === 'Komersial' ? 'bg-[#C5A880] text-[#0A1E13] font-bold shadow-lg shadow-[#C5A880]/20' : 'bg-white/5 text-white/80 border border-white/10 hover:bg-white/10 hover:text-white'"
                        class="px-6 py-3 rounded-xl text-xs sm:text-sm font-semibold transition-all duration-300 cursor-pointer focus:outline-none tracking-wider uppercase border border-transparent">
                    Komersial
                </button>
                <button @click="filter = 'Residensial'" 
                        :class="filter === 'Residensial' ? 'bg-[#C5A880] text-[#0A1E13] font-bold shadow-lg shadow-[#C5A880]/20' : 'bg-white/5 text-white/80 border border-white/10 hover:bg-white/10 hover:text-white'"
                        class="px-6 py-3 rounded-xl text-xs sm:text-sm font-semibold transition-all duration-300 cursor-pointer focus:outline-none tracking-wider uppercase border border-transparent">
                    Residensial
                </button>
                <button @click="filter = 'Sipil'" 
                        :class="filter === 'Sipil' ? 'bg-[#C5A880] text-[#0A1E13] font-bold shadow-lg shadow-[#C5A880]/20' : 'bg-white/5 text-white/80 border border-white/10 hover:bg-white/10 hover:text-white'"
                        class="px-6 py-3 rounded-xl text-xs sm:text-sm font-semibold transition-all duration-300 cursor-pointer focus:outline-none tracking-wider uppercase border border-transparent">
                    Sipil
                </button>
            </div>

            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($projects as $p)
                    <div x-show="filter === 'all' || '{{ $p->category }}' === filter"
                         x-transition:enter="transition ease-out duration-300"
                         class="reveal-on-scroll group bg-white/5 rounded-3xl border border-white/10 shadow-sm overflow-hidden flex flex-col justify-between hover:shadow-2xl hover:border-[#C5A880]/30 transition-all duration-300">
                        
                        <!-- Image Container -->
                        <div class="relative h-64 bg-black overflow-hidden cursor-pointer" @click="openModal({{ json_encode($p) }})">
                            <img src="{{ $p->cover_image ?? 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&h=450&fit=crop' }}" 
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" 
                                 alt="{{ $p->title }}">
                            <!-- Hover Overlay -->
                            <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <div class="w-14 h-14 rounded-full bg-[#C5A880] text-[#0A1E13] flex items-center justify-center shadow-lg transform scale-90 group-hover:scale-100 transition-transform duration-300">
                                    <i class="fa-solid fa-magnifying-glass-plus text-xl"></i>
                                </div>
                            </div>
                            <!-- Category Badge -->
                            <span class="absolute top-4 left-4 bg-[#0A1E13]/85 backdrop-blur text-[#C5A880] text-[10px] font-bold px-3.5 py-1.5 rounded-lg border border-[#C5A880]/20 uppercase tracking-widest">
                                {{ $p->category }}
                            </span>
                        </div>

                        <!-- Card Info -->
                        <div class="p-6 space-y-4">
                            <div class="space-y-2">
                                <h3 class="font-bold text-white text-lg font-serif group-hover:text-[#C5A880] transition-colors cursor-pointer" @click="openModal({{ json_encode($p) }})">
                                    {{ $p->title }}
                                </h3>
                                <p class="text-slate-400 text-xs sm:text-sm flex items-center"><i class="fa-solid fa-location-dot text-[#C5A880] mr-2"></i> {{ $p->location }}</p>
                            </div>
                            
                            <div class="pt-4 border-t border-white/5 flex items-center justify-between">
                                <span class="px-2.5 py-1 rounded text-[10px] font-bold uppercase tracking-wider {{ $p->status == 'Completed' ? 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/20' : 'bg-[#C5A880]/10 text-[#C5A880] border border-[#C5A880]/20' }}">
                                    {{ $p->status }}
                                </span>
                                <button @click="openModal({{ json_encode($p) }})" class="text-[#C5A880] hover:text-[#B4966B] font-bold text-xs inline-flex items-center cursor-pointer tracking-wider uppercase">
                                    Lihat Album Foto <i class="fa-solid fa-arrow-right ml-1.5"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                @empty
                    <div class="col-span-3 text-center py-20 text-slate-400">
                        <i class="fa-solid fa-images text-5xl mb-4 block text-[#C5A880]/30 animate-pulse"></i>
                        Belum ada data portofolio foto proyek.
                    </div>
                @endforelse
            </div>

        </div>

        <!-- Lightbox Modal (Alpine.js powered) -->
        <div x-show="selectedProject" 
             class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/95 backdrop-blur-md"
             style="display: none;"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0">
             
             <!-- Close Area -->
             <div class="absolute inset-0 cursor-default" @click="closeModal()"></div>

             <div class="relative w-full max-w-4xl bg-[#0A1E13] border border-white/10 rounded-3xl overflow-hidden shadow-2xl z-10 flex flex-col justify-between max-h-[90vh]">
                 <!-- Modal Header -->
                 <div class="px-6 py-4 border-b border-white/5 flex items-center justify-between">
                     <div>
                         <h3 class="font-bold text-white text-lg font-serif" x-text="selectedProject ? selectedProject.title : ''"></h3>
                         <p class="text-slate-400 text-xs flex items-center mt-1"><i class="fa-solid fa-location-dot text-[#C5A880] mr-1.5"></i> <span x-text="selectedProject ? selectedProject.location : ''"></span></p>
                     </div>
                     <button @click="closeModal()" class="p-2.5 rounded-xl bg-white/5 hover:bg-white/10 text-slate-300 hover:text-white transition-colors cursor-pointer border border-white/10">
                         <i class="fa-solid fa-xmark text-lg"></i>
                     </button>
                 </div>

                 <!-- Modal Content (Image Slider) -->
                 <div class="flex-1 p-6 flex flex-col justify-center items-center bg-black/40 relative min-h-[300px]">
                     <!-- Image Frame -->
                     <div class="relative max-w-full max-h-[50vh] rounded-2xl overflow-hidden shadow-2xl border border-white/5">
                          <img :src="selectedImages[currentImageIndex]" 
                               class="object-contain max-h-[50vh] mx-auto rounded-2xl" 
                               alt="Gallery Slide">
                     </div>

                     <!-- Left Arrow -->
                     <button @click="prevImg()" 
                             x-show="selectedImages.length > 1"
                             class="absolute left-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/5 hover:bg-[#C5A880] text-white hover:text-[#0A1E13] border border-white/10 hover:border-transparent flex items-center justify-center shadow-lg hover:scale-105 active:scale-95 transition-all cursor-pointer">
                         <i class="fa-solid fa-chevron-left text-lg"></i>
                     </button>

                     <!-- Right Arrow -->
                     <button @click="nextImg()" 
                             x-show="selectedImages.length > 1"
                             class="absolute right-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/5 hover:bg-[#C5A880] text-white hover:text-[#0A1E13] border border-white/10 hover:border-transparent flex items-center justify-center shadow-lg hover:scale-105 active:scale-95 transition-all cursor-pointer">
                         <i class="fa-solid fa-chevron-right text-lg"></i>
                     </button>
                 </div>

                 <!-- Modal Footer (Thumbnails & Details) -->
                 <div class="px-6 py-4 border-t border-white/5 space-y-4">
                     <!-- Thumbnail Navigation -->
                     <div class="flex justify-center items-center gap-2 overflow-x-auto py-1 max-w-full" x-show="selectedImages.length > 1">
                         <template x-for="(img, idx) in selectedImages" :key="idx">
                             <button @click="currentImageIndex = idx" 
                                     :class="currentImageIndex === idx ? 'border-[#C5A880] scale-105 shadow-md shadow-[#C5A880]/10' : 'border-transparent opacity-50 hover:opacity-100'"
                                     class="w-16 h-12 rounded-xl overflow-hidden border-2 flex-shrink-0 transition-all cursor-pointer">
                                 <img :src="img" class="w-full h-full object-cover" alt="Thumb">
                             </button>
                         </template>
                     </div>

                     <!-- Image Counter & CTA -->
                     <div class="flex flex-col sm:flex-row justify-between items-center gap-4 text-xs">
                         <span class="text-slate-400 font-semibold" x-text="`Foto ${currentImageIndex + 1} dari ${selectedImages.length}`"></span>
                         <a :href="`https://api.whatsapp.com/send?phone=${selectedProject ? '{{ \App\Models\Setting::get('contact_whatsapp') }}' : ''}&text=Halo%2C%20saya%20tertarik%20dengan%20proyek%20${selectedProject ? encodeURIComponent(selectedProject.title) : ''}%20dan%20ingin%20berkonsultasi.`" 
                            target="_blank"
                            class="inline-flex items-center px-5 py-3 rounded-xl bg-gradient-to-r from-[#C5A880] to-[#B4966B] hover:from-[#B4966B] hover:to-[#A3855A] text-[#0A1E13] font-bold transition-all shadow-md shadow-[#C5A880]/15 cursor-pointer uppercase tracking-wider">
                             <i class="fa-brands fa-whatsapp text-base mr-2 text-[#0A1E13]"></i> Tanya Layanan Proyek Ini
                         </a>
                     </div>
                 </div>
             </div>
        </div>

     </section>
@endsection
