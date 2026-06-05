@extends('layouts.admin')

@section('content')
<div class="space-y-6 animate-fade-in">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Kelola Video Dokumentasi</h1>
            <p class="text-sm text-slate-500">Kelola video footage pengerjaan proyek dan konstruksi sipil yang ditampilkan di beranda dan galeri video.</p>
        </div>
        <a href="{{ route('admin.videos.create') }}" 
           class="inline-flex items-center px-4 py-2.5 bg-brand-accent hover:bg-brand-accent-hover text-slate-950 font-bold text-xs rounded-xl shadow-sm transition-all duration-200">
            <i class="fa-solid fa-plus mr-2"></i> Tambah Video Baru
        </a>
    </div>

    <!-- Videos List Table -->
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
        <!-- Desktop Table View -->
        <div class="hidden md:block overflow-x-auto">
            <table class="w-full text-left text-xs border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100 text-slate-400 font-bold uppercase tracking-wider">
                        <th class="p-5 w-24">Media</th>
                        <th class="p-5">Judul Video</th>
                        <th class="p-5">Tipe / Sumber Video</th>
                        <th class="p-5">Deskripsi</th>
                        <th class="p-5 w-32 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-semibold text-slate-700">
                    @forelse($videos as $video)
                        @php
                            $isLocal = $video->is_local;
                            $youtubeId = '';
                            if (!$isLocal) {
                                if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video->video_url, $match)) {
                                    $youtubeId = $match[1];
                                }
                            }
                            $thumbnailUrl = $youtubeId ? "https://img.youtube.com/vi/{$youtubeId}/mqdefault.jpg" : null;
                        @endphp
                        <tr class="hover:bg-slate-50/55 transition-colors">
                            <td class="p-5">
                                @if($isLocal)
                                    <div class="w-20 h-12 rounded-lg bg-slate-900 flex flex-col items-center justify-center border border-slate-200 shadow-sm relative group">
                                        <i class="fa-solid fa-file-video text-brand-accent text-lg"></i>
                                        <span class="text-[8px] text-slate-400 font-bold tracking-wider mt-0.5">LOCAL MP4</span>
                                        <div class="absolute inset-0 bg-black/45 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity rounded-lg">
                                            <a href="{{ $video->play_url }}" target="_blank" class="text-white text-[9px] font-bold hover:underline">Putar</a>
                                        </div>
                                    </div>
                                @else
                                    <div class="w-20 h-12 rounded-lg bg-slate-950 overflow-hidden border border-slate-200 shadow-sm relative group">
                                        <img src="{{ $thumbnailUrl ?? 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=120&h=90&fit=crop' }}" class="w-full h-full object-cover" alt="Thumbnail">
                                        <div class="absolute inset-0 bg-black/45 flex items-center justify-center opacity-70 group-hover:opacity-100 transition-opacity">
                                            <i class="fa-solid fa-play text-white text-xs"></i>
                                        </div>
                                    </div>
                                @endif
                            </td>
                            <td class="p-5 text-slate-900 font-bold max-w-xs truncate" title="{{ $video->title }}">
                                {{ $video->title }}
                            </td>
                            <td class="p-5 font-mono text-slate-500 max-w-xs truncate">
                                @if($isLocal)
                                    <a href="{{ $video->play_url }}" target="_blank" class="hover:text-brand-primary flex items-center gap-1.5 text-slate-800 font-bold">
                                        <i class="fa-solid fa-arrow-up-from-bracket text-emerald-600 text-sm"></i>
                                        File Lokal (Unduh)
                                    </a>
                                @else
                                    <a href="{{ $video->video_url }}" target="_blank" class="hover:text-brand-primary flex items-center gap-1">
                                        <i class="fa-brands fa-youtube text-rose-600 text-sm"></i>
                                        YouTube Link
                                    </a>
                                @endif
                            </td>
                            <td class="p-5 text-slate-500 font-normal leading-relaxed max-w-sm truncate" title="{{ $video->description }}">
                                {{ $video->description ?? '-' }}
                            </td>
                            <td class="p-5 text-right space-x-1.5 whitespace-nowrap">
                                <a href="{{ route('admin.videos.edit', $video->id) }}" 
                                   class="inline-flex p-2 rounded-lg border border-slate-200 hover:border-brand-accent text-slate-500 hover:text-brand-accent transition-colors shadow-sm bg-white"
                                   title="Ubah Video">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('admin.videos.destroy', $video->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus video ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="inline-flex p-2 rounded-lg border border-slate-200 hover:border-rose-500 text-slate-500 hover:text-rose-600 transition-colors shadow-sm bg-white cursor-pointer"
                                            title="Hapus Video">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-10 text-center text-slate-400 font-medium">
                                <i class="fa-solid fa-video text-2xl mb-2 block"></i>
                                Belum ada video dokumentasi. Silakan tambahkan baru.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Mobile Card View -->
        <div class="grid grid-cols-1 gap-4 md:hidden p-4">
            @forelse($videos as $video)
                @php
                    $isLocal = $video->is_local;
                    $youtubeId = '';
                    if (!$isLocal) {
                        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video->video_url, $match)) {
                            $youtubeId = $match[1];
                        }
                    }
                    $thumbnailUrl = $youtubeId ? "https://img.youtube.com/vi/{$youtubeId}/mqdefault.jpg" : null;
                @endphp
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-4 flex flex-col space-y-3">
                    <div class="flex items-start space-x-3">
                        <div class="w-20 h-12 rounded-lg bg-slate-900 overflow-hidden flex-shrink-0 border border-slate-200 shadow-sm relative">
                            @if($isLocal)
                                <div class="w-full h-full flex flex-col items-center justify-center">
                                    <i class="fa-solid fa-file-video text-brand-accent text-lg"></i>
                                    <span class="text-[8px] text-slate-400 font-bold tracking-wider mt-0.5">LOCAL MP4</span>
                                </div>
                            @else
                                <img src="{{ $thumbnailUrl ?? 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=120&h=90&fit=crop' }}" class="w-full h-full object-cover" alt="Thumbnail">
                                <div class="absolute inset-0 bg-black/45 flex items-center justify-center">
                                    <i class="fa-solid fa-play text-white text-xs"></i>
                                </div>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <h4 class="font-bold text-slate-900 text-xs sm:text-sm leading-snug break-words">{{ $video->title }}</h4>
                            <p class="text-[10px] sm:text-xs text-slate-400 mt-1 truncate">{{ $video->description ?? '-' }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between pt-2 border-t border-slate-100">
                        <div class="flex items-center space-x-1.5">
                            @if($isLocal)
                                <span class="text-[10px] font-semibold text-slate-500 bg-slate-100 px-2 py-0.5 rounded flex items-center gap-1">
                                    <i class="fa-solid fa-hard-drive text-emerald-600 text-[10px]"></i> Lokal
                                </span>
                            @else
                                <span class="text-[10px] font-semibold text-slate-500 bg-slate-100 px-2 py-0.5 rounded flex items-center gap-1">
                                    <i class="fa-brands fa-youtube text-rose-600 text-[10px]"></i> YouTube
                                </span>
                            @endif
                        </div>
                        
                        <div class="flex items-center space-x-2">
                            @if($isLocal)
                                <a href="{{ $video->play_url }}" target="_blank" class="p-2 rounded-lg bg-slate-100 text-slate-600 text-xs flex items-center justify-center" title="Unduh Video">
                                    <i class="fa-solid fa-download"></i>
                                </a>
                            @else
                                <a href="{{ $video->video_url }}" target="_blank" class="p-2 rounded-lg bg-slate-100 text-slate-600 text-xs flex items-center justify-center" title="Buka YouTube">
                                    <i class="fa-brands fa-youtube"></i>
                                </a>
                            @endif
                            <a href="{{ route('admin.videos.edit', $video->id) }}" 
                               class="p-2 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-600 transition-colors text-xs flex items-center justify-center"
                               title="Ubah Video">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('admin.videos.destroy', $video->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus video ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="p-2 rounded-lg bg-red-50 hover:bg-red-100 text-red-600 transition-colors text-xs flex items-center justify-center cursor-pointer"
                                        title="Hapus Video">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-8 text-slate-400 text-xs sm:text-sm">
                    Belum ada video dokumentasi.
                </div>
            @endforelse
        </div>
        
        @if($videos->hasPages())
            <div class="px-5 py-4 border-t border-slate-100 bg-slate-50/50">
                {{ $videos->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
