@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto space-y-6 animate-fade-in">
    <!-- Header -->
    <div class="flex items-center space-x-3">
        <a href="{{ route('admin.articles.index') }}" class="p-2 rounded-lg bg-white border border-slate-200 text-slate-600 hover:text-slate-900 shadow-sm transition-colors">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Tulis Artikel Baru</h1>
            <p class="text-sm text-slate-500">Tuliskan konten informatif seputar material bangunan, RAB, atau tips arsitektur.</p>
        </div>
    </div>

    <!-- Errors -->
    @if($errors->any())
        <div class="p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs space-y-1">
            @foreach($errors->all() as $err)
                <p><i class="fa-solid fa-circle-exclamation mr-1"></i> {{ $err }}</p>
            @endforeach
        </div>
    @endif

    <!-- Form Card -->
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8">
        <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Judul Artikel*</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required placeholder="Contoh: Mengenal Mutu Beton ReadyMix vs SiteMix"
                           class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">
                </div>

                <!-- Category -->
                <div>
                    <label for="category" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Kategori*</label>
                    <select name="category" id="category" required class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">
                        <option value="Tips & Panduan" {{ old('category') == 'Tips & Panduan' ? 'selected' : '' }}>Tips & Panduan</option>
                        <option value="Teknologi Material" {{ old('category') == 'Teknologi Material' ? 'selected' : '' }}>Teknologi Material</option>
                        <option value="Info Sipil" {{ old('category') == 'Info Sipil' ? 'selected' : '' }}>Info Sipil</option>
                        <option value="Inspirasi Desain" {{ old('category') == 'Inspirasi Desain' ? 'selected' : '' }}>Inspirasi Desain</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Cover Image -->
                <div>
                    <label for="cover_file" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Gambar Sampul (Cover)*</label>
                    <input type="file" name="cover_file" id="cover_file" accept="image/*"
                           class="block w-full text-xs text-slate-500 border border-slate-300 rounded-xl cursor-pointer bg-slate-50 focus:outline-none file:mr-4 file:py-2.5 file:px-4 file:rounded-l-xl file:border-0 file:text-xs file:font-semibold file:bg-slate-900 file:text-white hover:file:bg-slate-800">
                </div>

                <!-- Publication Status checkbox -->
                <div class="flex items-center sm:pt-8">
                    <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', true) ? 'checked' : '' }}
                           class="w-4 h-4 text-brand-accent border-slate-300 rounded focus:ring-brand-accent">
                    <label for="is_published" class="ml-2 text-sm font-semibold text-slate-700 cursor-pointer">Terbitkan Langsung ke Website</label>
                </div>
            </div>

            <!-- Link Artikel Luar (Opsional) -->
            <div>
                <label for="external_link" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Link Artikel Luar (Opsional)</label>
                <input type="url" name="external_link" id="external_link" value="{{ old('external_link') }}" placeholder="Contoh: https://example.com/artikel (Jika diisi, pembaca akan langsung diarahkan ke link ini)"
                       class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">
            </div>

            <!-- Content Body -->
            <div>
                <label for="content" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Isi Artikel (Opsional)</label>
                <textarea name="content" id="content" rows="10" placeholder="Tuliskan isi pembahasan artikel di sini..."
                          class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">{{ old('content') }}</textarea>
            </div>

            <!-- Submit Buttons -->
            <div class="pt-4 border-t border-slate-100 flex justify-end space-x-3">
                <a href="{{ route('admin.articles.index') }}" 
                   class="px-5 py-3 rounded-xl border border-slate-300 text-slate-700 font-semibold text-sm hover:bg-slate-100 transition-colors">
                    Batalkan
                </a>
                <button type="submit" 
                        class="px-5 py-3 rounded-xl bg-brand-accent hover:bg-brand-accent-hover text-slate-950 font-bold text-sm transition-colors shadow">
                    Simpan Artikel
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
