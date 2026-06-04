@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto space-y-6 animate-fade-in">
    <!-- Header -->
    <div class="flex items-center space-x-3">
        <a href="{{ route('admin.testimonials.index') }}" class="p-2 rounded-lg bg-white border border-slate-200 text-slate-600 hover:text-slate-900 shadow-sm transition-colors">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Tambah Testimoni</h1>
            <p class="text-sm text-slate-500">Berikan detail ulasan kepuasan dari klien Anda.</p>
        </div>
    </div>

    <!-- Errors Banner -->
    @if($errors->any())
        <div class="p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs space-y-1">
            @foreach($errors->all() as $err)
                <p><i class="fa-solid fa-circle-exclamation mr-1"></i> {{ $err }}</p>
            @endforeach
        </div>
    @endif

    <!-- Form -->
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8">
        <form action="{{ route('admin.testimonials.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Nama Klien*</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required placeholder="Contoh: David Miller"
                           class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent bg-slate-50 text-slate-900 font-semibold">
                </div>
                
                <div>
                    <label for="company" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Proyek / Instansi*</label>
                    <input type="text" name="company" id="company" value="{{ old('company') }}" required placeholder="Contoh: Pemilik Villa Canggu"
                           class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent bg-slate-50 text-slate-900 font-semibold">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="rating" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Bintang Rating (1-5)*</label>
                    <select name="rating" id="rating" required
                            class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent bg-slate-50 text-slate-900 font-semibold">
                        <option value="5" {{ old('rating') == '5' ? 'selected' : '' }}>⭐⭐⭐⭐⭐ (5 Bintang)</option>
                        <option value="4" {{ old('rating') == '4' ? 'selected' : '' }}>⭐⭐⭐⭐ (4 Bintang)</option>
                        <option value="3" {{ old('rating') == '3' ? 'selected' : '' }}>⭐⭐⭐ (3 Bintang)</option>
                        <option value="2" {{ old('rating') == '2' ? 'selected' : '' }}>⭐⭐ (2 Bintang)</option>
                        <option value="1" {{ old('rating') == '1' ? 'selected' : '' }}>⭐ (1 Bintang)</option>
                    </select>
                </div>

                <div>
                    <label for="avatar" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Inisial Avatar (2-3 Karakter, Opsional)</label>
                    <input type="text" name="avatar" id="avatar" value="{{ old('avatar') }}" placeholder="Contoh: DM" max="10"
                           class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent bg-slate-50 text-slate-900 font-semibold">
                    <p class="text-[10px] text-slate-400 mt-1">*Jika dikosongkan, sistem akan membuat inisial otomatis dari nama klien.</p>
                </div>
            </div>

            <div>
                <label for="content" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Isi Ulasan Testimoni Klien*</label>
                <textarea name="content" id="content" rows="5" required placeholder="Tuliskan ulasan kepuasan klien di sini..."
                          class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent bg-slate-50 text-slate-900 leading-relaxed">{{ old('content') }}</textarea>
            </div>

            <div class="flex justify-end pt-2">
                <button type="submit" 
                        class="px-8 py-3.5 rounded-xl bg-brand-accent hover:bg-brand-accent-hover text-slate-950 font-extrabold text-sm transition-all shadow-md shadow-brand-accent/10 cursor-pointer">
                    Simpan Testimoni
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
