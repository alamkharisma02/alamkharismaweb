<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->paginate(15);
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'category' => 'required|string|max:255',
            'is_published' => 'nullable|boolean',
            'cover_file' => 'nullable|image|max:4096',
            'external_link' => 'nullable|string|max:1000',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_published'] = $request->has('is_published');
        $validated['published_at'] = $validated['is_published'] ? now() : null;

        if ($request->hasFile('cover_file')) {
            $path = $request->file('cover_file')->store('articles/covers', 'public');
            $validated['cover_image'] = '/storage/' . $path;
        }

        Article::create($validated);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'category' => 'required|string|max:255',
            'is_published' => 'nullable|boolean',
            'cover_file' => 'nullable|image|max:4096',
            'external_link' => 'nullable|string|max:1000',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        
        $wasPublished = $article->is_published;
        $nowPublished = $request->has('is_published');
        
        $validated['is_published'] = $nowPublished;
        
        if ($nowPublished && !$wasPublished) {
            $validated['published_at'] = now();
        } elseif (!$nowPublished) {
            $validated['published_at'] = null;
        }

        if ($request->hasFile('cover_file')) {
            // Delete old cover
            if ($article->cover_image) {
                $oldPath = str_replace('/storage/', '', $article->cover_image);
                Storage::disk('public')->delete($oldPath);
            }
            
            $path = $request->file('cover_file')->store('articles/covers', 'public');
            $validated['cover_image'] = '/storage/' . $path;
        }

        $article->update($validated);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if ($article->cover_image) {
            $path = str_replace('/storage/', '', $article->cover_image);
            Storage::disk('public')->delete($path);
        }

        $article->delete();

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
