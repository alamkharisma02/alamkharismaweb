<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Article;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display admin dashboard overview.
     */
    public function index()
    {
        $stats = [
            'total_projects' => Project::count(),
            'projects_completed' => Project::where('status', 'Completed')->count(),
            'projects_in_progress' => Project::where('status', 'In Progress')->count(),
            'total_articles' => Article::count(),
            'total_leads' => \App\Models\Lead::count(),
        ];

        $recentArticles = Article::latest()->take(5)->get();
        $recentProjects = Project::latest()->take(5)->get();
        $recentLeads = \App\Models\Lead::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentArticles', 'recentProjects', 'recentLeads'));
    }
}
