<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroSlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slides = HeroSlide::orderBy('order', 'asc')->get();
        return view('admin.hero_slides.index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.hero_slides.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image_file' => 'required|image|max:4096',
            'order' => 'required|integer',
        ]);

        // Upload slideshow image
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('slideshows', 'public');
            $validated['image'] = '/storage/' . $path;
        }

        HeroSlide::create($validated);

        return redirect()->route('admin.hero_slides.index')->with('success', 'Slide hero baru berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HeroSlide $heroSlide)
    {
        return view('admin.hero_slides.edit', compact('heroSlide'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HeroSlide $heroSlide)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image_file' => 'nullable|image|max:4096',
            'order' => 'required|integer',
        ]);

        if ($request->hasFile('image_file')) {
            // Delete old file
            if ($heroSlide->image && strpos($heroSlide->image, '/storage/') === 0) {
                $oldPath = str_replace('/storage/', '', $heroSlide->image);
                Storage::disk('public')->delete($oldPath);
            }

            // Upload new file
            $path = $request->file('image_file')->store('slideshows', 'public');
            $validated['image'] = '/storage/' . $path;
        }

        $heroSlide->update($validated);

        return redirect()->route('admin.hero_slides.index')->with('success', 'Slide hero berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HeroSlide $heroSlide)
    {
        // Delete image file from disk
        if ($heroSlide->image && strpos($heroSlide->image, '/storage/') === 0) {
            $oldPath = str_replace('/storage/', '', $heroSlide->image);
            Storage::disk('public')->delete($oldPath);
        }

        $heroSlide->delete();

        return redirect()->route('admin.hero_slides.index')->with('success', 'Slide hero berhasil dihapus.');
    }
}
