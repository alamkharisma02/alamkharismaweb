@extends('layouts.admin')

@section('content')
<div class="space-y-6 animate-fade-in">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Kelola Proyek</h1>
            <p class="text-sm text-slate-500">Tambahkan, ubah, atau hapus data portofolio konstruksi dan sipil Anda.</p>
        </div>
        <a href="{{ route('admin.projects.create') }}" 
           class="inline-flex items-center justify-center px-4 py-2.5 rounded-lg bg-brand-accent hover:bg-brand-accent-hover text-slate-950 font-bold text-sm transition-colors shadow">
            <i class="fa-solid fa-plus mr-2"></i> Tambah Proyek Baru
        </a>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
        <!-- Desktop Table View -->
        <div class="hidden md:block overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-50 text-slate-500 font-bold text-xs uppercase border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-4">Cover & Info Proyek</th>
                        <th class="px-6 py-4">Kategori</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($projects as $project)
                        <tr class="hover:bg-slate-50/50">
                            <!-- Cover & Title -->
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="w-14 h-10 rounded overflow-hidden flex-shrink-0 bg-slate-900 border border-slate-200">
                                        <img src="{{ $project->cover_image ?? 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&h=450&fit=crop' }}" 
                                             class="w-full h-full object-cover" alt="Cover">
                                    </div>
                                    <div>
                                        <div class="font-bold text-slate-900 leading-snug">{{ $project->title }}</div>
                                        <div class="text-xs text-slate-400 mt-1"><i class="fa-solid fa-map-marker-alt text-brand-accent mr-1"></i> {{ $project->location }}</div>
                                    </div>
                                </div>
                            </td>
                            <!-- Category -->
                            <td class="px-6 py-4 text-xs font-semibold text-slate-600">
                                {{ $project->category }}
                            </td>
                            <!-- Status -->
                            <td class="px-6 py-4">
                                <span class="inline-flex px-2 py-0.5 rounded text-[10px] font-bold border 
                                    {{ $project->status == 'Completed' ? 'bg-brand-primary/10 text-brand-primary border-emerald-200' : '' }}
                                    {{ $project->status == 'In Progress' ? 'bg-brand-primary/5 text-brand-primary border-brand-primary/20' : '' }}
                                    {{ $project->status == 'Planning' ? 'bg-slate-50 text-slate-700 border-slate-200' : '' }}
                                ">
                                    {{ $project->status }}
                                </span>
                            </td>
                            <!-- Actions -->
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end space-x-2.5">
                                     <!-- Edit -->
                                     <a href="{{ route('admin.projects.edit', $project->id) }}" 
                                        class="p-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-600 transition-colors text-xs flex items-center justify-center"
                                        title="Ubah Proyek">
                                         <i class="fa-solid fa-pen-to-square"></i>
                                     </a>
 
                                     <!-- Delete -->
                                     <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" 
                                           onsubmit="return confirm('Apakah Anda yakin ingin menghapus proyek ini? Seluruh gambar galeri terkait juga akan terhapus.')" 
                                           class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="p-1.5 rounded-lg bg-red-50 hover:bg-red-100 text-red-600 transition-colors text-xs flex items-center justify-center"
                                                title="Hapus Proyek">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-slate-400">
                                Belum ada data proyek konstruksi yang terdaftar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Mobile Card View -->
        <div class="grid grid-cols-1 gap-4 md:hidden p-4">
            @forelse($projects as $project)
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-4 flex flex-col space-y-3">
                    <div class="flex items-start space-x-3">
                        <div class="w-20 h-14 rounded-lg overflow-hidden flex-shrink-0 bg-slate-900 border border-slate-200">
                            <img src="{{ $project->cover_image ?? 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&h=450&fit=crop' }}" 
                                 class="w-full h-full object-cover" alt="Cover">
                        </div>
                        <div class="flex-1 min-w-0">
                            <h4 class="font-bold text-slate-900 text-xs sm:text-sm leading-snug break-words">{{ $project->title }}</h4>
                            <p class="text-[10px] sm:text-xs text-slate-400 mt-1 flex items-center">
                                <i class="fa-solid fa-map-marker-alt text-brand-accent mr-1"></i> {{ $project->location }}
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between pt-2 border-t border-slate-100">
                        <div class="flex items-center space-x-1.5">
                            <span class="text-[10px] font-semibold text-slate-500 bg-slate-100 px-2 py-0.5 rounded">{{ $project->category }}</span>
                            <span class="inline-flex px-2 py-0.5 rounded text-[9px] font-bold border 
                                {{ $project->status == 'Completed' ? 'bg-brand-primary/10 text-brand-primary border-emerald-200' : '' }}
                                {{ $project->status == 'In Progress' ? 'bg-brand-primary/5 text-brand-primary border-brand-primary/20' : '' }}
                                {{ $project->status == 'Planning' ? 'bg-slate-50 text-slate-700 border-slate-200' : '' }}
                            ">
                                {{ $project->status }}
                            </span>
                        </div>
                        
                        <div class="flex items-center space-x-2">
                            <!-- Edit -->
                            <a href="{{ route('admin.projects.edit', $project->id) }}" 
                               class="p-2 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-600 transition-colors text-xs flex items-center justify-center"
                               title="Ubah Proyek">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <!-- Delete -->
                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" 
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus proyek ini? Seluruh gambar galeri terkait juga akan terhapus.')" 
                                  class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="p-2 rounded-lg bg-red-50 hover:bg-red-100 text-red-600 transition-colors text-xs flex items-center justify-center"
                                        title="Hapus Proyek">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-8 text-slate-400 text-xs sm:text-sm">
                    Belum ada data proyek konstruksi yang terdaftar.
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($projects->hasPages())
            <div class="px-6 py-4 border-t border-slate-100">
                {{ $projects->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
