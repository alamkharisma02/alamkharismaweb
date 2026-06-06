<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Article;
use App\Models\Testimonial;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the landing page.
     */
    public function index()
    {
        // Get featured projects (completed or in progress)
        $featuredProjects = Project::whereIn('status', ['Completed', 'In Progress'])
            ->latest()
            ->take(3)
            ->get();

        // Get latest articles
        $latestArticles = Article::where('is_published', true)
            ->latest('published_at')
            ->take(3)
            ->get();

        // Get testimonials dynamically
        $testimonials = Testimonial::latest()->get();

        // Get all videos for home slider
        $videoProjects = Video::latest()->get();

        return view('home', compact('featuredProjects', 'latestArticles', 'testimonials', 'videoProjects'));
    }

    /**
     * Display the company profile page.
     */
    public function profile()
    {
        return view('profile');
    }

    /**
     * Display the gallery page.
     */
    public function gallery()
    {
        // Get all project images
        $projects = Project::latest()->get();

        return view('gallery', compact('projects'));
    }

    /**
     * Display the video gallery page.
     */
    public function videoGallery()
    {
        $videos = Video::latest()->get();

        return view('video_gallery', compact('videos'));
    }

    /**
     * Display the testimonials page.
     */
    public function testimonials()
    {
        $testimonials = Testimonial::latest()->get();

        return view('testimonials', compact('testimonials'));
    }

    /**
     * Display the services page.
     */
    public function services()
    {
        return view('services');
    }

    /**
     * Display the contact page.
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * Handle client contact/inquiry form submission.
     */
    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'project_type' => 'nullable|string|max:255',
            'estimated_budget' => 'nullable|numeric|min:0',
            'message' => 'nullable|string',
        ]);

        $validated['status'] = 'New';

        \App\Models\Lead::create($validated);

        return back()->with('success', 'Terima kasih! Pesan inquiry Anda berhasil dikirim. Tim kami akan segera meninjau kebutuhan Anda dan menghubungi Anda kembali.');
    }
}
