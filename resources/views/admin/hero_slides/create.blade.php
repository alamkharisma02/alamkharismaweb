@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto space-y-6 animate-fade-in">
    <!-- Header -->
    <div class="flex items-center space-x-3">
        <a href="{{ route('admin.hero_slides.index') }}" class="p-2 rounded-lg bg-white border border-slate-200 text-slate-600 hover:text-slate-900 shadow-sm transition-colors">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Tambah Slide Baru</h1>
            <p class="text-sm text-slate-500">Unggah foto hero dan berikan judul tampilan.</p>
        </div>
    </div>

    <!-- Error check -->
    @if($errors->any())
        <div class="p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs space-y-1">
            @foreach($errors->all() as $err)
                <p><i class="fa-solid fa-circle-exclamation mr-1"></i> {{ $err }}</p>
            @endforeach
        </div>
    @endif

    <!-- Form Card -->
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8">
        <form action="{{ route('admin.hero_slides.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <!-- Title -->
            <div>
                <label for="title" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Judul Slide*</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required placeholder="Contoh: Pertamina EP Zona 4"
                       class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">
                <p class="text-[10px] text-slate-400 mt-1">*Teks ini akan muncul di kotak putih pojok kiri bawah slideshow hero.</p>
            </div>

            <!-- Image Upload -->
            <div>
                <label for="image_file" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Foto Slideshow*</label>
                <input type="file" name="image_file" id="image_file" accept="image/*" required
                       onchange="previewImage(this, 'preview-container', 'preview-img')"
                       class="block w-full text-xs text-slate-500 border border-slate-300 rounded-xl cursor-pointer bg-slate-50 focus:outline-none file:mr-4 file:py-2.5 file:px-4 file:rounded-l-xl file:border-0 file:text-xs file:font-semibold file:bg-slate-900 file:text-white hover:file:bg-slate-800">
                <p class="text-[10px] text-slate-400 mt-1">*Format gambar landscape resolusi tinggi (HD) disarankan (min. 1920x1080px).</p>
                
                <!-- Preview Container -->
                <div id="preview-container" class="mt-3.5 hidden">
                    <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider block mb-1">Preview Gambar:</span>
                    <div class="w-full aspect-[21/9] max-w-md rounded-lg overflow-hidden border border-slate-200 bg-slate-100">
                        <img id="preview-img" class="w-full h-full object-cover" alt="Image Preview">
                    </div>
                </div>
            </div>

            <!-- Order -->
            <div>
                <label for="order" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Urutan Tampil*</label>
                <input type="number" name="order" id="order" value="{{ old('order', 1) }}" required min="0"
                       class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent font-mono">
                <p class="text-[10px] text-slate-400 mt-1">*Angka terkecil akan tampil paling awal (misal: 1, 2, 3, dst).</p>
            </div>

            <!-- Submit Buttons -->
            <div class="pt-4 border-t border-slate-100 flex justify-end space-x-3">
                <a href="{{ route('admin.hero_slides.index') }}" 
                   class="px-5 py-3 rounded-xl border border-slate-300 text-slate-700 font-semibold text-sm hover:bg-slate-100 transition-colors">
                    Batalkan
                </a>
                <button type="submit" 
                        class="px-5 py-3 rounded-xl bg-brand-accent hover:bg-brand-accent-hover text-slate-950 font-bold text-sm transition-colors shadow">
                    Simpan Slide
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function previewImage(input, containerId, imgId) {
        const container = document.getElementById(containerId);
        const img = document.getElementById(imgId);
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                img.src = e.target.result;
                container.classList.remove('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            container.classList.add('hidden');
        }
    }
</script>
@endsection
