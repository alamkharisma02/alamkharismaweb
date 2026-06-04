@extends('layouts.admin')

@section('content')
<div class="space-y-8 animate-fade-in">
    <!-- Header -->
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Dashboard Ringkasan</h1>
        <p class="text-sm text-slate-500">Selamat datang kembali! Berikut adalah status digitalisasi operasional kontraktor Anda hari ini.</p>
    </div>

    <!-- Quick Stats Grid -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Stat 1 -->
        <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm flex items-center space-x-4">
            <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl flex-shrink-0">
                <i class="fa-solid fa-folder-open"></i>
            </div>
            <div>
                <span class="text-xs text-slate-400 font-bold uppercase tracking-wider block">Total Proyek</span>
                <span class="text-2xl font-extrabold text-slate-800">{{ $stats['total_projects'] }}</span>
            </div>
        </div>

        <!-- Stat 2 -->
        <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm flex items-center space-x-4">
            <div class="w-12 h-12 rounded-xl bg-emerald-50 text-brand-primary flex items-center justify-center text-xl flex-shrink-0">
                <i class="fa-solid fa-circle-check"></i>
            </div>
            <div>
                <span class="text-xs text-slate-400 font-bold uppercase tracking-wider block">Selesai</span>
                <span class="text-2xl font-extrabold text-slate-800">{{ $stats['projects_completed'] }}</span>
            </div>
        </div>

        <!-- Stat 3 -->
        <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm flex items-center space-x-4">
            <div class="w-12 h-12 rounded-xl bg-brand-primary/5 text-brand-accent flex items-center justify-center text-xl flex-shrink-0">
                <i class="fa-solid fa-spinner animate-spin"></i>
            </div>
            <div>
                <span class="text-xs text-slate-400 font-bold uppercase tracking-wider block">In Progress</span>
                <span class="text-2xl font-extrabold text-slate-800">{{ $stats['projects_in_progress'] }}</span>
            </div>
        </div>

        <!-- Stat 4 (Artikel) -->
        <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm flex items-center space-x-4">
            <div class="w-12 h-12 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-xl flex-shrink-0">
                <i class="fa-solid fa-newspaper"></i>
            </div>
            <div>
                <span class="text-xs text-slate-400 font-bold uppercase tracking-wider block">Artikel</span>
                <span class="text-2xl font-extrabold text-slate-800">{{ $stats['total_articles'] }}</span>
            </div>
        </div>
    </div>

    <!-- Details Tables Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Left: Recent Articles (Artikel Terbaru) -->
        <div class="lg:col-span-7 bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden flex flex-col justify-between">
            <div>
                <!-- Header -->
                <div class="px-6 py-5 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                    <h3 class="font-bold text-slate-800 text-sm uppercase tracking-wide">Artikel Terbaru</h3>
                    <a href="{{ route('admin.articles.index') }}" class="text-xs text-brand-accent hover:text-brand-accent font-bold">Kelola Artikel <i class="fa-solid fa-chevron-right ml-1"></i></a>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-slate-50 text-slate-500 font-bold text-xs uppercase border-b border-slate-100">
                            <tr>
                                <th class="px-6 py-3">Judul Artikel</th>
                                <th class="px-6 py-3">Kategori</th>
                                <th class="px-6 py-3">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse($recentArticles as $article)
                                <tr class="hover:bg-slate-50/50">
                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-slate-900 truncate max-w-[250px]" title="{{ $article->title }}">{{ $article->title }}</div>
                                        <div class="text-xs text-slate-400 mt-0.5">{{ $article->published_at ? $article->published_at->format('d M Y') : 'Draft' }}</div>
                                    </td>
                                    <td class="px-6 py-4 text-xs font-semibold text-slate-600">
                                        {{ $article->category }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex px-2 py-0.5 rounded text-[10px] font-bold border 
                                            {{ $article->is_published ? 'bg-brand-primary/10 text-brand-primary border-emerald-200' : 'bg-slate-50 text-slate-500 border-slate-200' }}
                                        ">
                                            {{ $article->is_published ? 'Terbit' : 'Draft' }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-12 text-center text-slate-400">
                                        Belum ada artikel yang ditulis.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Right: Recent Projects -->
        <div class="lg:col-span-5 bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden flex flex-col justify-between">
            <div>
                <!-- Header -->
                <div class="px-6 py-5 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                    <h3 class="font-bold text-slate-800 text-sm uppercase tracking-wide">Daftar Proyek Aktif</h3>
                    <a href="{{ route('admin.projects.index') }}" class="text-xs text-brand-accent hover:text-brand-accent font-bold">Kelola Proyek <i class="fa-solid fa-chevron-right ml-1"></i></a>
                </div>

                <!-- Projects list -->
                <div class="divide-y divide-slate-100">
                    @forelse($recentProjects as $project)
                        <div class="px-6 py-4 flex items-center justify-between hover:bg-slate-50/50">
                            <div class="space-y-1 pr-4">
                                <h4 class="font-semibold text-slate-900 text-xs sm:text-sm truncate max-w-[200px] sm:max-w-xs">{{ $project->title }}</h4>
                                <div class="flex items-center space-x-2 text-[10px] text-slate-400 font-mono">
                                    <span>{{ $project->category }}</span>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3 flex-shrink-0">
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold 
                                    {{ $project->status == 'Completed' ? 'bg-brand-primary/10 text-brand-primary border border-emerald-200' : '' }}
                                    {{ $project->status == 'In Progress' ? 'bg-brand-primary/5 text-brand-primary border border-brand-primary/20' : '' }}
                                    {{ $project->status == 'Planning' ? 'bg-slate-100 text-slate-600 border border-slate-200' : '' }}
                                ">
                                    {{ $project->status }}
                            </div>
                        </div>
                    @empty
                        <div class="px-6 py-12 text-center text-slate-400">
                            Belum ada proyek yang terdaftar.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
