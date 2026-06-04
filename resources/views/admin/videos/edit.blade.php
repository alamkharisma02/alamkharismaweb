@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto space-y-6 animate-fade-in">
    <!-- Header -->
    <div class="flex items-center space-x-3">
        <a href="{{ route('admin.videos.index') }}" class="p-2 rounded-lg bg-white border border-slate-200 text-slate-600 hover:text-slate-900 shadow-sm transition-colors">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Ubah Video Dokumentasi</h1>
            <p class="text-sm text-slate-500">Sesuaikan informasi detail video dokumentasi Anda.</p>
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
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8" x-data="{ videoSource: '{{ old('video_file') ? 'upload' : ($video->is_local ? 'upload' : 'youtube') }}' }">
        <form action="{{ route('admin.videos.update', $video->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Judul Video*</label>
                <input type="text" name="title" id="title" value="{{ old('title', $video->title) }}" required placeholder="Contoh: Proses Pengecoran Dak Beton Lantai 2"
                       class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent bg-slate-50 text-slate-900 font-semibold">
            </div>

            <!-- Current Video Information -->
            @if($video->is_local)
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200 flex items-center justify-between text-xs">
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-file-video text-emerald-600 text-base"></i>
                        <div>
                            <p class="font-bold text-slate-800">Video Terunggah Saat Ini</p>
                            <p class="text-[10px] text-slate-400 font-mono mt-0.5">{{ basename($video->video_path) }}</p>
                        </div>
                    </div>
                    <a href="{{ $video->play_url }}" target="_blank" class="px-3 py-1.5 bg-white border border-slate-200 text-slate-700 font-bold rounded-lg hover:bg-slate-50 shadow-sm transition-colors">
                        <i class="fa-solid fa-arrow-up-right-from-square mr-1"></i> Putar Video
                    </a>
                </div>
            @else
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200 flex items-center justify-between text-xs">
                    <div class="flex items-center gap-2">
                        <i class="fa-brands fa-youtube text-rose-600 text-base"></i>
                        <div>
                            <p class="font-bold text-slate-800">Link YouTube Terpasang Saat Ini</p>
                            <p class="text-[10px] text-slate-400 mt-0.5 truncate max-w-xs sm:max-w-md font-mono">{{ $video->video_url }}</p>
                        </div>
                    </div>
                    <a href="{{ $video->video_url }}" target="_blank" class="px-3 py-1.5 bg-white border border-slate-200 text-slate-700 font-bold rounded-lg hover:bg-slate-50 shadow-sm transition-colors">
                        <i class="fa-solid fa-arrow-up-right-from-square mr-1"></i> Lihat YouTube
                    </a>
                </div>
            @endif

            <!-- Tab Selector for Video Source -->
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Ubah / Ganti Sumber Video</label>
                <div class="grid grid-cols-2 gap-3 p-1 bg-slate-100 rounded-xl border border-slate-200">
                    <button type="button" @click="videoSource = 'youtube'"
                            :class="videoSource === 'youtube' ? 'bg-white text-slate-900 shadow-sm' : 'text-slate-500 hover:text-slate-800'"
                            class="py-2.5 rounded-lg text-xs font-bold transition-all cursor-pointer">
                        <i class="fa-brands fa-youtube text-rose-600 mr-1.5 text-sm"></i> Link YouTube
                    </button>
                    <button type="button" @click="videoSource = 'upload'"
                            :class="videoSource === 'upload' ? 'bg-white text-slate-900 shadow-sm' : 'text-slate-500 hover:text-slate-800'"
                            class="py-2.5 rounded-lg text-xs font-bold transition-all cursor-pointer">
                        <i class="fa-solid fa-cloud-arrow-up text-emerald-600 mr-1.5 text-sm"></i> Unggah File Video
                    </button>
                </div>
            </div>
            
            <!-- YouTube URL Input -->
            <div x-show="videoSource === 'youtube'" x-transition>
                <label for="video_url" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">URL Video YouTube*</label>
                <input type="url" name="video_url" id="video_url" value="{{ old('video_url', $video->video_url) }}" placeholder="Contoh: https://www.youtube.com/watch?v=yGcwSC8Z6_c"
                       class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent bg-slate-50 text-slate-900 font-semibold">
                <p class="text-[10px] text-slate-400 mt-1">*Mendukung tautan YouTube biasa, tautan embed, maupun shortener (youtu.be).</p>
            </div>

            <!-- Local Video File Input -->
            <div x-show="videoSource === 'upload'" x-transition style="display: none;">
                <label for="video_file" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Pilih File Video Baru (MP4/WebM/QuickTime)</label>
                <input type="file" name="video_file" id="video_file" accept="video/*"
                       class="block w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-slate-900 file:text-white hover:file:bg-slate-850 cursor-pointer bg-slate-50 border border-slate-300 rounded-xl p-2 font-semibold">
                <p class="text-[10px] text-slate-400 mt-1">*Maksimum ukuran berkas: 100MB. Biarkan kosong jika tidak ingin mengubah video file lokal.</p>
            </div>

            <div>
                <label for="description" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Deskripsi Singkat (Opsional)</label>
                <textarea name="description" id="description" rows="4" placeholder="Tuliskan deskripsi singkat mengenai aktivitas proyek pada video ini..."
                          class="block w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-brand-accent bg-slate-50 text-slate-900 leading-relaxed">{{ old('description', $video->description) }}</textarea>
            </div>

            <div class="flex justify-end pt-2">
                <button type="submit" 
                        class="px-8 py-3.5 rounded-xl bg-brand-accent hover:bg-brand-accent-hover text-slate-950 font-extrabold text-sm transition-all shadow-md shadow-brand-accent/10 cursor-pointer">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
