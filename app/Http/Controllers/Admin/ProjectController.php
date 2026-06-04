<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::latest()->paginate(15);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'category' => 'required|string|in:Sipil,Residensial,Komersial',
            'status' => 'required|string|in:Planning,In Progress,Completed',
            'video_url' => 'nullable|url',
            'cover_image_file' => 'nullable|image|max:4096',
            'gallery_files.*' => 'nullable|image|max:4096',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        
        // Handle cover image
        if ($request->hasFile('cover_image_file')) {
            $path = $request->file('cover_image_file')->store('projects/covers', 'public');
            $validated['cover_image'] = Storage::url($path);
        }

        // Handle gallery images
        $gallery = [];
        if ($request->hasFile('gallery_files')) {
            foreach ($request->file('gallery_files') as $file) {
                $path = $file->store('projects/gallery', 'public');
                $gallery[] = Storage::url($path);
            }
        }
        $validated['gallery_images'] = $gallery;

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'category' => 'required|string|in:Sipil,Residensial,Komersial',
            'status' => 'required|string|in:Planning,In Progress,Completed',
            'video_url' => 'nullable|url',
            'cover_image_file' => 'nullable|image|max:4096',
            'gallery_files.*' => 'nullable|image|max:4096',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        // Handle cover image
        if ($request->hasFile('cover_image_file')) {
            // Delete old cover if exists
            if ($project->cover_image) {
                $oldPath = str_replace('/storage/', '', $project->cover_image);
                Storage::disk('public')->delete($oldPath);
            }
            
            $path = $request->file('cover_image_file')->store('projects/covers', 'public');
            $validated['cover_image'] = Storage::url($path);
        }

        // Handle gallery images
        $gallery = $project->gallery_images ?? [];
        
        // Remove selected gallery images
        if ($request->has('remove_gallery_images')) {
            $removeImages = $request->input('remove_gallery_images');
            foreach ($removeImages as $img) {
                if (($key = array_search($img, $gallery)) !== false) {
                    unset($gallery[$key]);
                    $oldPath = str_replace('/storage/', '', $img);
                    Storage::disk('public')->delete($oldPath);
                }
            }
            $gallery = array_values($gallery); // reindex
        }

        // Add new gallery images
        if ($request->hasFile('gallery_files')) {
            foreach ($request->file('gallery_files') as $file) {
                $path = $file->store('projects/gallery', 'public');
                $gallery[] = Storage::url($path);
            }
        }
        $validated['gallery_images'] = $gallery;

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // Delete cover
        if ($project->cover_image) {
            $path = str_replace('/storage/', '', $project->cover_image);
            Storage::disk('public')->delete($path);
        }

        // Delete gallery images
        if ($project->gallery_images) {
            foreach ($project->gallery_images as $img) {
                $path = str_replace('/storage/', '', $img);
                Storage::disk('public')->delete($path);
            }
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil dihapus.');
    }
}
