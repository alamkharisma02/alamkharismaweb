@extends('layouts.admin')

@section('content')
<div class="space-y-6 animate-fade-in">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Kelola Testimoni</h1>
            <p class="text-sm text-slate-500">Kelola ulasan dan testimoni kepuasan klien yang ditampilkan di halaman beranda dan halaman testimoni.</p>
        </div>
        <a href="{{ route('admin.testimonials.create') }}" 
           class="inline-flex items-center px-4 py-2.5 bg-brand-accent hover:bg-brand-accent-hover text-slate-950 font-bold text-xs rounded-xl shadow-sm transition-all duration-200">
            <i class="fa-solid fa-plus mr-2"></i> Tambah Testimoni
        </a>
    </div>

    <!-- Alert Success -->
    @if(session('success'))
        <div class="p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs flex items-center">
            <i class="fa-solid fa-circle-check mr-2 text-sm text-brand-primary"></i>
            {{ session('success') }}
        </div>
    @endif

    <!-- Testimonials List Table -->
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100 text-slate-400 font-bold uppercase tracking-wider">
                        <th class="p-5 w-16">Inisial</th>
                        <th class="p-5">Nama Klien</th>
                        <th class="p-5">Proyek / Instansi</th>
                        <th class="p-5">Isi Ulasan</th>
                        <th class="p-5 w-24">Rating</th>
                        <th class="p-5 w-32 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-semibold text-slate-700">
                    @forelse($testimonials as $t)
                        <tr class="hover:bg-slate-50/55 transition-colors">
                            <td class="p-5">
                                <div class="w-8 h-8 rounded-full bg-brand-primary/10 text-brand-primary flex items-center justify-center font-extrabold text-[10px] border border-brand-accent/20">
                                    {{ $t->avatar ?? 'AKB' }}
                                </div>
                            </td>
                            <td class="p-5 text-slate-900 font-bold">{{ $t->name }}</td>
                            <td class="p-5">{{ $t->company }}</td>
                            <td class="p-5 text-slate-500 font-normal leading-relaxed max-w-sm truncate" title="{{ $t->content }}">
                                {{ $t->content }}
                            </td>
                            <td class="p-5">
                                <div class="flex text-brand-accent gap-0.5 text-[10px]">
                                    @for ($i = 1; $i <= $t->rating; $i++)
                                        <i class="fa-solid fa-star"></i>
                                    @endfor
                                </div>
                            </td>
                            <td class="p-5 text-right space-x-1.5 whitespace-nowrap">
                                <a href="{{ route('admin.testimonials.edit', $t->id) }}" 
                                   class="inline-flex p-2 rounded-lg border border-slate-200 hover:border-brand-accent text-slate-500 hover:text-brand-accent transition-colors shadow-sm bg-white"
                                   title="Ubah Testimoni">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('admin.testimonials.destroy', $t->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus testimoni ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="inline-flex p-2 rounded-lg border border-slate-200 hover:border-rose-500 text-slate-500 hover:text-rose-600 transition-colors shadow-sm bg-white cursor-pointer"
                                            title="Hapus Testimoni">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-10 text-center text-slate-400 font-medium">
                                <i class="fa-solid fa-comments text-2xl mb-2 block"></i>
                                Belum ada testimoni klien. Silakan tambahkan baru.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($testimonials->hasPages())
            <div class="px-5 py-4 border-t border-slate-100 bg-slate-50/50">
                {{ $testimonials->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
