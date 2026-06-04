@extends('layouts.app')

@section('title', 'Testimoni Klien - ' . \App\Models\Setting::get('site_name', 'Alam Kharisma Bersaudara'))
@section('meta_description', 'Baca ulasan kepuasan, rating, dan testimoni langsung dari klien yang telah menggunakan jasa bangun, renovasi, dan interior ' . \App\Models\Setting::get('site_name', 'PT Alam Kharisma Bersaudara') . '.')

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
                <i class="fa-solid fa-comments mr-1.5"></i> Testimonials
            </span>
            <h1 class="text-3xl sm:text-5xl font-extrabold text-slate-900 tracking-tight leading-tight">
                Ulasan & Testimoni Klien
            </h1>
            <p class="text-slate-600 max-w-2xl mx-auto text-sm sm:text-base leading-relaxed">
                Ulasan kepuasan hasil akhir, ketepatan waktu pengerjaan, dan keterbukaan Rencana Anggaran Biaya dari penuturan klien kami.
            </p>
        </div>
    </section>

    <!-- Testimonials Grid -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($testimonials as $t)
                    <div class="bg-slate-50 rounded-3xl p-8 border border-slate-200 shadow-sm relative flex flex-col justify-between hover:shadow-xl transition-all duration-300">
                        <div class="space-y-4">
                            <!-- Rating Stars -->
                            <div class="flex text-brand-accent gap-0.5 text-xs">
                                @for($i = 1; $i <= $t->rating; $i++)
                                    <i class="fa-solid fa-star"></i>
                                @endfor
                                @for($i = $t->rating + 1; $i <= 5; $i++)
                                    <i class="fa-regular fa-star text-slate-300"></i>
                                @endfor
                            </div>
                            
                            <!-- Quote Icon & Content -->
                            <div class="space-y-2">
                                <div class="text-brand-accent/30 text-2xl"><i class="fa-solid fa-quote-left"></i></div>
                                <p class="text-slate-655 text-xs sm:text-sm leading-relaxed italic">
                                    "{{ $t->content }}"
                                </p>
                            </div>
                        </div>

                        <!-- User Info -->
                        <div class="flex items-center space-x-3.5 border-t border-slate-200/60 pt-4 mt-6">
                            <div class="w-10 h-10 rounded-full bg-brand-accent/10 text-brand-primary font-extrabold flex items-center justify-center text-sm border border-brand-accent/20">
                                {{ $t->avatar ?? 'AKB' }}
                            </div>
                            <div>
                                <h4 class="text-slate-950 font-bold text-sm">{{ $t->name }}</h4>
                                <p class="text-slate-400 text-xs">{{ $t->company }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-16 text-slate-400">
                        <i class="fa-solid fa-comments text-4xl mb-3 block"></i>
                        Belum ada ulasan testimoni klien saat ini.
                    </div>
                @endforelse
            </div>

            <!-- CTA leave feedback / talk -->
            <div class="rounded-3xl border border-slate-200 p-8 sm:p-10 bg-slate-50 flex flex-col sm:flex-row justify-between items-center gap-6 max-w-5xl mx-auto">
                <div class="space-y-1.5 text-center sm:text-left">
                    <h4 class="font-extrabold text-slate-900 text-lg sm:text-xl">Ingin Menjadi Bagian Dari Klien Puas Kami?</h4>
                    <p class="text-xs sm:text-sm text-slate-500">Konsultasikan kebutuhan desain interior, eksterior fasad, atau sipil bangunan Anda gratis.</p>
                </div>
                <a href="https://api.whatsapp.com/send?phone={{ \App\Models\Setting::get('contact_whatsapp') }}&text=Halo%20PT%20Alam%252520Kharisma%252520Bersaudara%25252C%252520saya%252520ingin%252520berkonsultasi%252520mengenai%252520proyek%25252520saya." 
                   target="_blank"
                   class="inline-flex items-center justify-center px-6 py-3.5 rounded-xl bg-brand-accent hover:bg-brand-accent-hover text-slate-950 font-extrabold text-sm shadow-md shadow-brand-accent/10 hover:scale-105 active:scale-95 transition-all duration-300">
                    <i class="fa-brands fa-whatsapp text-lg mr-2"></i>
                    Hubungi via WhatsApp
                </a>
            </div>

        </div>
    </section>
@endsection
