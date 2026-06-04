@extends('layouts.admin')

@section('content')
<div class="space-y-6 animate-fade-in">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Kelola Artikel</h1>
            <p class="text-sm text-slate-500">Tulis dan terbitkan artikel edukatif, berita sipil, atau tips konstruksi.</p>
        </div>
        <a href="{{ route('admin.articles.create') }}" 
           class="inline-flex items-center justify-center px-4 py-2.5 rounded-lg bg-brand-accent hover:bg-brand-accent-hover text-slate-950 font-bold text-sm transition-colors shadow">
            <i class="fa-solid fa-plus mr-2"></i> Tambah Artikel Baru
        </a>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-50 text-slate-500 font-bold text-xs uppercase border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-4">Cover & Judul Artikel</th>
                        <th class="px-6 py-4">Kategori</th>
                        <th class="px-6 py-4">Tanggal Terbit</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($articles as $article)
                        <tr class="hover:bg-slate-50/50">
                            <!-- Cover & Title -->
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="w-14 h-10 rounded overflow-hidden flex-shrink-0 bg-slate-900 border border-slate-200">
                                        <img src="{{ $article->cover_image ?? 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=800&h=450&fit=crop' }}" 
                                             class="w-full h-full object-cover" alt="Cover">
                                    </div>
                                    <div class="font-bold text-slate-900 leading-snug truncate max-w-xs sm:max-w-md" title="{{ $article->title }}">
                                        {{ $article->title }}
                                    </div>
                                </div>
                            </td>
                            <!-- Category -->
                            <td class="px-6 py-4 text-xs font-semibold text-slate-600">
                                {{ $article->category }}
                            </td>

                            <!-- Date Published -->
                            <td class="px-6 py-4 text-xs text-slate-600">
                                {{ $article->published_at ? $article->published_at->format('d M Y H:i') : '-' }}
                            </td>
                            <!-- Status -->
                            <td class="px-6 py-4">
                                <span class="inline-flex px-2 py-0.5 rounded text-[10px] font-bold border 
                                    {{ $article->is_published ? 'bg-brand-primary/10 text-brand-primary border-emerald-200' : 'bg-slate-50 text-slate-500 border-slate-200' }}
                                ">
                                    {{ $article->is_published ? 'Terbit' : 'Draft' }}
                                </span>
                            </td>
                            <!-- Actions -->
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    <!-- Edit -->
                                    <a href="{{ route('admin.articles.edit', $article->id) }}" 
                                       class="p-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-600 transition-colors text-xs flex items-center justify-center"
                                       title="Ubah Artikel">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <!-- Delete -->
                                    <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" 
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')" 
                                          class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="p-1.5 rounded-lg bg-red-50 hover:bg-red-100 text-red-600 transition-colors text-xs flex items-center justify-center"
                                                title="Hapus Artikel">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-slate-400">
                                Belum ada artikel yang ditulis.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($articles->hasPages())
            <div class="px-6 py-4 border-t border-slate-100">
                {{ $articles->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
