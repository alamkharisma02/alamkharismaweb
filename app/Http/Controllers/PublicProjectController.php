<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class PublicProjectController extends Controller
{
    /**
     * Display a listing of the portfolio.
     */
    public function index(Request $request)
    {
        $category = $request->query('category');
        
        $query = Project::query();

        if ($category) {
            $query->where('category', $category);
        }

        $projects = $query->latest()->paginate(9)->withQueryString();

        return view('projects.index', compact('projects', 'category'));
    }

    /**
     * Display the specified project.
     */
    public function show($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();

        return view('projects.show', compact('project'));
    }
}
