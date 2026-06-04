@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto space-y-6 animate-fade-in">
    <!-- Header -->
    <div class="flex items-center space-x-3">
        <a href="{{ route('admin.projects.index') }}" class="p-2 rounded-lg bg-white border border-slate-200 text-slate-600 hover:text-slate-900 shadow-sm transition-colors">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Ubah Proyek</h1>
            <p class="text-sm text-slate-500">Sesuaikan informasi portofolio konstruksi "{{ $project->title }}".</p>
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
        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <!-- Title -->
                <div class="sm:col-span-2">
                    <label for="title" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Nama / Judul Proyek*</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}" required placeholder="Contoh: Pembangunan Villa Tropis Bali"
                           class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">
                </div>

                <!-- Location -->
                <div>
                    <label for="location" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Lokasi Proyek*</label>
                    <input type="text" name="location" id="location" value="{{ old('location', $project->location) }}" required placeholder="Contoh: Badung, Bali"
                           class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Category -->
                <div>
                    <label for="category" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Kategori*</label>
                    <select name="category" id="category" required class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">
                        <option value="Sipil" {{ old('category', $project->category) == 'Sipil' ? 'selected' : '' }}>Pekerjaan Sipil / Struktur</option>
                        <option value="Residensial" {{ old('category', $project->category) == 'Residensial' ? 'selected' : '' }}>Residensial / Villa</option>
                        <option value="Komersial" {{ old('category', $project->category) == 'Komersial' ? 'selected' : '' }}>Komersial / Gedung</option>
                    </select>
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Status Proyek*</label>
                    <select name="status" id="status" required class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">
                        <option value="Planning" {{ old('status', $project->status) == 'Planning' ? 'selected' : '' }}>Planning / Perencanaan</option>
                        <option value="In Progress" {{ old('status', $project->status) == 'In Progress' ? 'selected' : '' }}>In Progress / Sedang Dibangun</option>
                        <option value="Completed" {{ old('status', $project->status) == 'Completed' ? 'selected' : '' }}>Completed / Selesai</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Cover Image -->
                <div class="space-y-4">
                    <div>
                        <label for="cover_image_file" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Ganti Foto Utama (Cover)</label>
                        <input type="file" name="cover_image_file" id="cover_image_file" accept="image/*"
                               class="block w-full text-xs text-slate-500 border border-slate-300 rounded-xl cursor-pointer bg-slate-50 focus:outline-none file:mr-4 file:py-2.5 file:px-4 file:rounded-l-xl file:border-0 file:text-xs file:font-semibold file:bg-slate-900 file:text-white hover:file:bg-slate-800">
                    </div>
                    @if($project->cover_image)
                        <div class="space-y-1.5">
                            <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Cover Saat Ini:</span>
                            <div class="w-32 h-20 rounded-lg overflow-hidden border border-slate-200 bg-slate-100">
                                <img src="{{ $project->cover_image }}" class="w-full h-full object-cover" alt="Current Cover">
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Video Link -->
                <div>
                    <label for="video_url" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Link Iframe Video Footage (YouTube / Vimeo)</label>
                    <input type="url" name="video_url" id="video_url" value="{{ old('video_url', $project->video_url) }}" placeholder="Contoh: https://www.youtube.com/embed/dQw4w9WgXcQ"
                           class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">
                </div>
            </div>

            <!-- Existing Gallery Images Manager -->
            @if(!empty($project->gallery_images) && count($project->gallery_images) > 0)
                <div class="space-y-2">
                    <span class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Foto Galeri Saat Ini (Centang untuk menghapus)</span>
                    <div class="grid grid-cols-3 sm:grid-cols-6 gap-3">
                        @foreach($project->gallery_images as $img)
                            <label class="relative block rounded-lg overflow-hidden border border-slate-200 aspect-video bg-slate-100 cursor-pointer">
                                <input type="checkbox" name="remove_gallery_images[]" value="{{ $img }}" class="absolute top-2 left-2 z-10 w-4 h-4 text-red-600 bg-white border-slate-300 rounded focus:ring-red-500">
                                <img src="{{ $img }}" class="w-full h-full object-cover" alt="Gallery">
                            </label>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Add new Gallery Images -->
            <div>
                <label for="gallery_files" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Tambahkan Foto Galeri Baru</label>
                <input type="file" name="gallery_files[]" id="gallery_files" accept="image/*" multiple
                       class="block w-full text-xs text-slate-500 border border-slate-300 rounded-xl cursor-pointer bg-slate-50 focus:outline-none file:mr-4 file:py-2.5 file:px-4 file:rounded-l-xl file:border-0 file:text-xs file:font-semibold file:bg-slate-900 file:text-white hover:file:bg-slate-800">
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Deskripsi Lengkap Proyek</label>
                <textarea name="description" id="description" rows="5" placeholder="Tuliskan spesifikasi pengerjaan..."
                          class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent">{{ old('description', $project->description) }}</textarea>
            </div>

            <!-- Submit Buttons -->
            <div class="pt-4 border-t border-slate-100 flex justify-end space-x-3">
                <a href="{{ route('admin.projects.index') }}" 
                   class="px-5 py-3 rounded-xl border border-slate-300 text-slate-700 font-semibold text-sm hover:bg-slate-100 transition-colors">
                    Batalkan
                </a>
                <button type="submit" 
                        class="px-5 py-3 rounded-xl bg-brand-accent hover:bg-brand-accent-hover text-slate-950 font-bold text-sm transition-colors shadow">
                    Perbarui Proyek
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
