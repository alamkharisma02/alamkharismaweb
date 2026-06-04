<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicArticleController extends Controller
{
    /**
     * Display a listing of the articles.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $category = $request->query('category');

        $query = Article::where('is_published', true);

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        if ($category) {
            $query->where('category', $category);
        }

        $articles = $query->latest('published_at')->paginate(9)->withQueryString();
        
        // Get all unique categories for filter
        $categories = Article::where('is_published', true)
            ->distinct()
            ->pluck('category');

        return view('articles.index', compact('articles', 'categories', 'search', 'category'));
    }

    /**
     * Display the specified article.
     */
    public function show($slug)
    {
        $article = Article::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        if ($article->external_link) {
            $article->increment('views');
            return redirect()->away($article->external_link);
        }

        // Increment views safely
        $article->increment('views');

        // Get related articles
        $relatedArticles = Article::where('is_published', true)
            ->where('id', '!=', $article->id)
            ->where('category', $article->category)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('articles.show', compact('article', 'relatedArticles'));
    }
}
