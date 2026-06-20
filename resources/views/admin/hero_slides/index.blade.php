@extends('layouts.admin')

@section('content')
<div class="space-y-6 animate-fade-in">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Kelola Slideshow Hero</h1>
            <p class="text-sm text-slate-500">Unggah foto, edit judul, dan atur urutan tampilan banner slideshow halaman utama.</p>
        </div>
        <a href="{{ route('admin.hero_slides.create') }}" 
           class="inline-flex items-center justify-center px-4 py-2.5 rounded-lg bg-brand-accent hover:bg-brand-accent-hover text-slate-950 font-bold text-sm transition-colors shadow">
            <i class="fa-solid fa-plus mr-2"></i> Tambah Slide Baru
        </a>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
        <!-- Desktop Table View -->
        <div class="hidden md:block overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-50 text-slate-500 font-bold text-xs uppercase border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-4">Foto Slide</th>
                        <th class="px-6 py-4">Judul Slide (Teks Kiri Bawah)</th>
                        <th class="px-6 py-4">Urutan Tampil</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($slides as $slide)
                        <tr class="hover:bg-slate-50/50">
                            <!-- Cover Image -->
                            <td class="px-6 py-4">
                                <div class="w-24 h-14 rounded-lg overflow-hidden border border-slate-200 bg-slate-950 flex-shrink-0">
                                    <img src="{{ $slide->image }}" class="w-full h-full object-cover" alt="Slide">
                                </div>
                            </td>
                            <!-- Title -->
                            <td class="px-6 py-4 font-bold text-slate-900">
                                {{ $slide->title }}
                            </td>
                            <!-- Order -->
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center justify-center px-3 py-1 rounded-full text-xs font-bold bg-[#C5A880]/15 text-[#C5A880] border border-[#C5A880]/30 font-mono">
                                    {{ $slide->order }}
                                </span>
                            </td>
                            <!-- Actions -->
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end space-x-2.5">
                                     <!-- Edit -->
                                     <a href="{{ route('admin.hero_slides.edit', $slide->id) }}" 
                                        class="p-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-600 transition-colors text-xs flex items-center justify-center"
                                        title="Ubah Slide">
                                         <i class="fa-solid fa-pen-to-square"></i>
                                     </a>
 
                                     <!-- Delete -->
                                     <form action="{{ route('admin.hero_slides.destroy', $slide->id) }}" method="POST" 
                                           onsubmit="return confirm('Apakah Anda yakin ingin menghapus slide hero ini?')" 
                                           class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="p-1.5 rounded-lg bg-red-50 hover:bg-red-100 text-red-600 transition-colors text-xs flex items-center justify-center"
                                                title="Hapus Slide">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-slate-400">
                                Belum ada data slideshow hero yang ditambahkan. Sistem akan menampilkan slide default.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Mobile Card View -->
        <div class="grid grid-cols-1 gap-4 md:hidden p-4">
            @forelse($slides as $slide)
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-4 flex flex-col space-y-3">
                    <div class="flex items-start space-x-3">
                        <div class="w-24 h-14 rounded-lg overflow-hidden border border-slate-200 bg-slate-950 flex-shrink-0">
                            <img src="{{ $slide->image }}" class="w-full h-full object-cover" alt="Slide">
                        </div>
                        <div class="flex-1 min-w-0">
                            <h4 class="font-bold text-slate-900 text-xs sm:text-sm leading-snug break-words">
                                {{ $slide->title }}
                            </h4>
                            <p class="text-[10px] sm:text-xs text-slate-400 mt-1 flex items-center">
                                Urutan: <span class="ml-1 text-[#C5A880] font-bold font-mono">{{ $slide->order }}</span>
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-end pt-2 border-t border-slate-100 space-x-2">
                        <!-- Edit -->
                        <a href="{{ route('admin.hero_slides.edit', $slide->id) }}" 
                           class="p-2 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-600 transition-colors text-xs flex items-center justify-center"
                           title="Ubah Slide">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <!-- Delete -->
                        <form action="{{ route('admin.hero_slides.destroy', $slide->id) }}" method="POST" 
                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus slide hero ini?')" 
                              class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="p-2 rounded-lg bg-red-50 hover:bg-red-100 text-red-600 transition-colors text-xs flex items-center justify-center"
                                    title="Hapus Slide">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="text-center py-8 text-slate-400 text-xs sm:text-sm">
                    Belum ada data slideshow hero yang ditambahkan. Sistem akan menampilkan slide default.
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
