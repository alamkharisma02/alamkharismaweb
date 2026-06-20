@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto space-y-6 animate-fade-in">
    <!-- Header -->
    <div class="flex items-center space-x-3">
        <a href="{{ route('admin.hero_slides.index') }}" class="p-2 rounded-lg bg-white border border-slate-200 text-slate-600 hover:text-slate-900 shadow-sm transition-colors">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Ubah Slide Hero</h1>
            <p class="text-sm text-slate-500">Ubah foto hero atau ganti judul tampilannya.</p>
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
        <form action="{{ route('admin.hero_slides.update', $heroSlide->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            
            <!-- Title -->
            <div>
                <label for="title" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Judul Slide*</label>
                <input type="text" name="title" id="title" value="{{ old('title', $heroSlide->title) }}" required placeholder="Contoh: Pertamina EP Zona 4"
                       class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">
                <p class="text-[10px] text-slate-400 mt-1">*Teks ini akan muncul di kotak putih pojok kiri bawah slideshow hero.</p>
            </div>

            <!-- Image Upload & Preview -->
            <div class="space-y-4">
                <div>
                    <label for="image_file" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Ganti Foto Slideshow</label>
                    <input type="file" name="image_file" id="image_file" accept="image/*"
                           onchange="previewImage(this, 'new-preview-container', 'new-preview-img'); if (this.files && this.files[0]) { document.getElementById('current-image-container')?.classList.add('hidden'); } else { document.getElementById('current-image-container')?.classList.remove('hidden'); }"
                           class="block w-full text-xs text-slate-500 border border-slate-300 rounded-xl cursor-pointer bg-slate-50 focus:outline-none file:mr-4 file:py-2.5 file:px-4 file:rounded-l-xl file:border-0 file:text-xs file:font-semibold file:bg-slate-900 file:text-white hover:file:bg-slate-800">
                    <p class="text-[10px] text-slate-400 mt-1">*Biarkan kosong jika tidak ingin mengubah foto slideshow saat ini.</p>
                </div>

                <!-- New Selected Image Preview -->
                <div id="new-preview-container" class="space-y-1.5 hidden">
                    <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider block">Preview Foto Baru:</span>
                    <div class="w-full aspect-[21/9] max-w-md rounded-lg overflow-hidden border border-slate-200 bg-slate-100">
                        <img id="new-preview-img" class="w-full h-full object-cover" alt="New Image Preview">
                    </div>
                </div>

                <!-- Current Image -->
                @if($heroSlide->image)
                    <div id="current-image-container" class="space-y-1.5">
                        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider block">Foto Saat Ini:</span>
                        <div class="w-full aspect-[21/9] max-w-md rounded-lg overflow-hidden border border-slate-200 bg-slate-100">
                            <img src="{{ $heroSlide->image }}" class="w-full h-full object-cover" alt="Current Image">
                        </div>
                    </div>
                @endif
            </div>

            <!-- Order -->
            <div>
                <label for="order" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Urutan Tampil*</label>
                <input type="number" name="order" id="order" value="{{ old('order', $heroSlide->order) }}" required min="0"
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
                    Perbarui Slide
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
