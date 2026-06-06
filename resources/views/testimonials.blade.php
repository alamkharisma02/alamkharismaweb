@extends('layouts.app')

@section('title', 'Testimoni Klien - ' . \App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara'))
@section('meta_description', 'Baca ulasan kepuasan, rating, dan testimoni langsung dari klien yang telah menggunakan jasa bangun, renovasi, dan interior ' . \App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara') . '.')

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
                <i class="fa-solid fa-comments mr-1.5"></i> Testimonials
            </span>
            <h1 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight leading-tight font-serif">
                Ulasan & Testimoni Klien
            </h1>
            <div class="w-20 h-[2px] bg-[#C5A880] mx-auto mt-4"></div>
            <p class="text-slate-300 max-w-2xl mx-auto text-sm sm:text-base leading-relaxed font-light mt-4">
                Ulasan kepuasan hasil akhir, ketepatan waktu pengerjaan, dan keterbukaan Rencana Anggaran Biaya dari penuturan klien kami.
            </p>
        </div>
    </section>

    <!-- Testimonials Grid -->
    <section class="py-24 bg-[#0A1E13] relative overflow-hidden">
        <!-- Decorative Glow -->
        <div class="absolute left-1/2 bottom-1/4 w-[500px] h-[500px] bg-[#C5A880]/5 rounded-full blur-[120px] -translate-x-1/2"></div>
        <div class="absolute inset-0 luxury-grid-pattern opacity-5"></div>
        
        <!-- Watermark background -->
        <div class="absolute inset-0 z-0 opacity-[0.03] pointer-events-none mix-blend-overlay">
            <img src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?w=1920&h=1080&fit=crop" class="w-full h-full object-cover select-none" alt="Watermark bg">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20 relative z-10">
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($testimonials as $t)
                    <div class="reveal-on-scroll bg-white/5 rounded-3xl p-8 border border-white/10 shadow-sm relative flex flex-col justify-between hover:shadow-2xl hover:border-[#C5A880]/35 transition-all duration-350 group">
                        
                        <!-- Glow effect in card background -->
                        <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-[#C5A880]/2 rounded-full blur-xl group-hover:bg-[#C5A880]/8 transition-all duration-500"></div>

                        <div class="space-y-4 relative z-10">
                            <!-- Rating Stars -->
                            <div class="flex text-[#C5A880] gap-0.5 text-xs">
                                @for($i = 1; $i <= $t->rating; $i++)
                                    <i class="fa-solid fa-star"></i>
                                @endfor
                                @for($i = $t->rating + 1; $i <= 5; $i++)
                                    <i class="fa-regular fa-star text-white/20"></i>
                                @endfor
                            </div>
                            
                            <!-- Quote Icon & Content -->
                            <div class="space-y-2">
                                <div class="text-[#C5A880]/20 text-3xl"><i class="fa-solid fa-quote-left"></i></div>
                                <p class="text-slate-300 text-sm sm:text-base leading-relaxed italic font-light">
                                    "{{ $t->content }}"
                                </p>
                            </div>
                        </div>

                        <!-- User Info -->
                        <div class="flex items-center space-x-3.5 border-t border-white/5 pt-5 mt-6 relative z-10">
                            <div class="w-12 h-12 rounded-full bg-[#C5A880]/15 text-[#C5A880] font-black flex items-center justify-center text-sm border border-[#C5A880]/30 shadow-lg">
                                {{ $t->avatar ?? 'AKB' }}
                            </div>
                            <div>
                                <h4 class="text-white font-bold text-sm font-serif">{{ $t->name }}</h4>
                                <p class="text-slate-400 text-xs mt-0.5">{{ $t->company }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-20 text-slate-450">
                        <i class="fa-solid fa-comments text-5xl mb-4 block text-[#C5A880]/30 animate-pulse"></i>
                        <span class="text-slate-400">Belum ada ulasan testimoni klien saat ini.</span>
                    </div>
                @endforelse
            </div>

            <!-- CTA leave feedback / talk -->
            <div class="reveal-on-scroll rounded-3xl border border-white/10 p-8 sm:p-12 bg-white/5 backdrop-blur-md flex flex-col sm:flex-row justify-between items-center gap-8 max-w-5xl mx-auto">
                <div class="space-y-2 text-center sm:text-left">
                    <h4 class="font-extrabold text-white text-xl font-serif">Ingin Menjadi Bagian Dari Klien Puas Kami?</h4>
                    <p class="text-xs sm:text-sm text-slate-400 font-light">Konsultasikan kebutuhan desain interior, eksterior fasad, atau sipil bangunan Anda gratis.</p>
                </div>
                <a href="https://api.whatsapp.com/send?phone={{ \App\Models\Setting::get('contact_whatsapp') }}&text=Halo%20PT%20Alam%252520Kharisma%252520Bersaudara%25252C%252520saya%252520ingin%252520berkonsultasi%252520mengenai%252520proyek%25252520saya." 
                   target="_blank"
                   class="inline-flex items-center justify-center px-6 py-4 rounded-xl bg-gradient-to-r from-[#C5A880] to-[#B4966B] hover:from-[#B4966B] hover:to-[#A3855A] text-[#0A1E13] font-bold text-sm shadow-lg shadow-[#C5A880]/15 hover:scale-105 active:scale-95 transition-all duration-300 uppercase tracking-wider">
                    <i class="fa-brands fa-whatsapp text-lg mr-2 text-[#0A1E13]"></i>
                    Hubungi via WhatsApp
                </a>
            </div>

        </div>
    </section>
@endsection
