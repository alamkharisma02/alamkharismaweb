@extends('layouts.app')

@section('title', 'Galeri Proyek - ' . \App\Models\Setting::get('site_name', 'Alam Kharisma Bersaudara'))
@section('meta_description', 'Lihat galeri dokumentasi foto proyek pembangunan, pengerjaan interior mewah, dan renovasi dari ' . \App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara') . '.')

@section('content')
    <!-- Banner Space Filler -->
    <div class="h-20 bg-slate-950"></div>

    <!-- Header Section -->
    <section class="relative bg-slate-50 py-16 border-b border-slate-200 overflow-hidden">
        <!-- Background subtle shapes -->
        <div class="absolute right-0 top-0 w-96 h-96 bg-brand-accent/5 rounded-full blur-3xl -mr-20 -mt-20"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-indigo-500/5 rounded-full blur-3xl -ml-20 -mb-20"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
            <span class="inline-flex items-center px-3.5 py-1 rounded-full text-xs font-bold bg-brand-accent/10 text-brand-primary border border-brand-accent/20 uppercase tracking-widest">
                <i class="fa-solid fa-images mr-1.5"></i> Gallery Showcase
            </span>
            <h1 class="text-3xl sm:text-5xl font-extrabold text-slate-900 tracking-tight leading-tight">
                Galeri Hasil Kerja
            </h1>
            <p class="text-slate-600 max-w-2xl mx-auto text-sm sm:text-base leading-relaxed">
                Dokumentasi visual proyek-proyek fisik sipil, interior mewah, dan lanskap eksterior yang dikerjakan oleh tim kami.
            </p>
        </div>
    </section>

    <!-- Gallery Section (Alpine Filtered) -->
    <section class="py-16 bg-white" x-data="{ 
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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Category Filters -->
            <div class="flex flex-wrap justify-center items-center gap-2.5 mb-12">
                <button @click="filter = 'all'" 
                        :class="filter === 'all' ? 'bg-brand-primary text-slate-950 font-bold shadow' : 'bg-slate-50 text-slate-600 hover:bg-slate-100'"
                        class="px-5 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition-all duration-200 cursor-pointer focus:outline-none">
                    Semua Kategori
                </button>
                <button @click="filter = 'Interior'" 
                        :class="filter === 'Interior' ? 'bg-brand-primary text-slate-950 font-bold shadow' : 'bg-slate-50 text-slate-600 hover:bg-slate-100'"
                        class="px-5 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition-all duration-200 cursor-pointer focus:outline-none">
                    Interior
                </button>
                <button @click="filter = 'Komersial'" 
                        :class="filter === 'Komersial' ? 'bg-brand-primary text-slate-950 font-bold shadow' : 'bg-slate-50 text-slate-600 hover:bg-slate-100'"
                        class="px-5 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition-all duration-200 cursor-pointer focus:outline-none">
                    Komersial
                </button>
                <button @click="filter = 'Residensial'" 
                        :class="filter === 'Residensial' ? 'bg-brand-primary text-slate-950 font-bold shadow' : 'bg-slate-50 text-slate-600 hover:bg-slate-100'"
                        class="px-5 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition-all duration-200 cursor-pointer focus:outline-none">
                    Residensial
                </button>
                <button @click="filter = 'Sipil'" 
                        :class="filter === 'Sipil' ? 'bg-brand-primary text-slate-950 font-bold shadow' : 'bg-slate-50 text-slate-600 hover:bg-slate-100'"
                        class="px-5 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition-all duration-200 cursor-pointer focus:outline-none">
                    Sipil
                </button>
            </div>

            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($projects as $p)
                    <div x-show="filter === 'all' || '{{ $p->category }}' === filter"
                         x-transition:enter="transition ease-out duration-300"
                         class="group bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden flex flex-col justify-between hover:shadow-xl transition-all duration-300">
                        
                        <!-- Image Container -->
                        <div class="relative h-64 bg-slate-950 overflow-hidden cursor-pointer" @click="openModal({{ json_encode($p) }})">
                            <img src="{{ $p->cover_image ?? 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&h=450&fit=crop' }}" 
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" 
                                 alt="{{ $p->title }}">
                            <!-- Hover Overlay -->
                            <div class="absolute inset-0 bg-slate-950/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <div class="w-12 h-12 rounded-full bg-white/90 text-slate-950 flex items-center justify-center shadow-lg transform scale-95 group-hover:scale-100 transition-transform duration-300">
                                    <i class="fa-solid fa-magnifying-glass-plus text-lg"></i>
                                </div>
                            </div>
                            <!-- Category Badge -->
                            <span class="absolute top-4 left-4 bg-slate-900/80 backdrop-blur text-white text-[10px] font-bold px-3 py-1 rounded-lg border border-slate-700 uppercase tracking-wider">
                                {{ $p->category }}
                            </span>
                        </div>

                        <!-- Card Info -->
                        <div class="p-6 space-y-4">
                            <div class="space-y-1">
                                <h3 class="font-extrabold text-slate-900 text-base sm:text-lg group-hover:text-brand-primary transition-colors cursor-pointer" @click="openModal({{ json_encode($p) }})">
                                    {{ $p->title }}
                                </h3>
                                <p class="text-slate-500 text-xs sm:text-sm"><i class="fa-solid fa-location-dot text-brand-accent mr-1.5"></i> {{ $p->location }}</p>
                            </div>
                            
                            <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold {{ $p->status == 'Completed' ? 'bg-emerald-500/10 text-emerald-600' : 'bg-brand-primary/10 text-brand-primary' }}">
                                    {{ $p->status }}
                                </span>
                                <button @click="openModal({{ json_encode($p) }})" class="text-brand-primary hover:text-brand-accent font-bold text-xs inline-flex items-center cursor-pointer">
                                    Lihat Album Foto <i class="fa-solid fa-arrow-right ml-1"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                @empty
                    <div class="col-span-3 text-center py-16 text-slate-400">
                        <i class="fa-solid fa-images text-4xl mb-3 block"></i>
                        Belum ada data portofolio foto proyek.
                    </div>
                @endforelse
            </div>

        </div>

        <!-- Lightbox Modal (Alpine.js powered) -->
        <div x-show="selectedProject" 
             class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/90 backdrop-blur-sm"
             style="display: none;"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0">
             
             <!-- Close Area -->
             <div class="absolute inset-0 cursor-default" @click="closeModal()"></div>

             <div class="relative w-full max-w-4xl bg-white rounded-3xl overflow-hidden shadow-2xl z-10 flex flex-col justify-between max-h-[90vh]">
                 <!-- Modal Header -->
                 <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                     <div>
                         <h3 class="font-extrabold text-slate-900 text-base sm:text-lg" x-text="selectedProject ? selectedProject.title : ''"></h3>
                         <p class="text-slate-500 text-xs"><i class="fa-solid fa-location-dot text-brand-accent mr-1"></i> <span x-text="selectedProject ? selectedProject.location : ''"></span></p>
                     </div>
                     <button @click="closeModal()" class="p-2 rounded-lg bg-slate-50 hover:bg-slate-100 text-slate-500 hover:text-slate-800 transition-colors cursor-pointer">
                         <i class="fa-solid fa-xmark text-lg"></i>
                     </button>
                 </div>

                 <!-- Modal Content (Image Slider) -->
                 <div class="flex-1 p-6 flex flex-col justify-center items-center bg-slate-50 relative min-h-[300px]">
                     <!-- Image Frame -->
                     <div class="relative max-w-full max-h-[50vh] rounded-2xl overflow-hidden shadow-md">
                         <img :src="selectedImages[currentImageIndex]" 
                              class="object-contain max-h-[50vh] mx-auto rounded-2xl" 
                              alt="Gallery Slide">
                     </div>

                     <!-- Left Arrow -->
                     <button @click="prevImg()" 
                             x-show="selectedImages.length > 1"
                             class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/80 hover:bg-white text-slate-800 flex items-center justify-center shadow hover:scale-105 active:scale-95 transition-all cursor-pointer">
                         <i class="fa-solid fa-chevron-left"></i>
                     </button>

                     <!-- Right Arrow -->
                     <button @click="nextImg()" 
                             x-show="selectedImages.length > 1"
                             class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/80 hover:bg-white text-slate-800 flex items-center justify-center shadow hover:scale-105 active:scale-95 transition-all cursor-pointer">
                         <i class="fa-solid fa-chevron-right"></i>
                     </button>
                 </div>

                 <!-- Modal Footer (Thumbnails & Details) -->
                 <div class="px-6 py-4 border-t border-slate-100 space-y-4">
                     <!-- Thumbnail Navigation -->
                     <div class="flex justify-center items-center gap-2 overflow-x-auto py-1 max-w-full" x-show="selectedImages.length > 1">
                         <template x-for="(img, idx) in selectedImages" :key="idx">
                             <button @click="currentImageIndex = idx" 
                                     :class="currentImageIndex === idx ? 'border-brand-primary scale-105' : 'border-transparent opacity-60 hover:opacity-100'"
                                     class="w-14 h-10 rounded-lg overflow-hidden border-2 flex-shrink-0 transition-all cursor-pointer">
                                 <img :src="img" class="w-full h-full object-cover" alt="Thumb">
                             </button>
                         </template>
                     </div>

                     <!-- Image Counter & CTA -->
                     <div class="flex flex-col sm:flex-row justify-between items-center gap-3 text-xs">
                         <span class="text-slate-500 font-semibold" x-text="`Foto ${currentImageIndex + 1} dari ${selectedImages.length}`"></span>
                         <a :href="`https://api.whatsapp.com/send?phone=${selectedProject ? '{{ \App\Models\Setting::get('contact_whatsapp') }}' : ''}&text=Halo%2C%20saya%20tertarik%20dengan%20proyek%20${selectedProject ? encodeURIComponent(selectedProject.title) : ''}%20dan%20ingin%20berkonsultasi.`" 
                            target="_blank"
                            class="inline-flex items-center px-4 py-2 rounded-xl bg-brand-primary hover:bg-brand-accent text-slate-950 font-bold transition-all shadow-sm shadow-brand-accent/10 cursor-pointer">
                             <i class="fa-brands fa-whatsapp text-sm mr-1.5"></i> Tanya Layanan Proyek Ini
                         </a>
                     </div>
                 </div>
             </div>
        </div>

    </section>
@endsection
