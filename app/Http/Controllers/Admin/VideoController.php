<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::latest()->paginate(15);
        return view('admin.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.videos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'video_url' => 'nullable|url|max:255',
            'video_file' => 'nullable|file|mimes:mp4,mov,ogg,qt,webm|max:102400', // max 100MB
            'description' => 'nullable|string',
        ]);

        if (!$request->video_url && !$request->hasFile('video_file')) {
            return back()->withErrors(['video_url' => 'Anda harus mengisi URL YouTube atau mengunggah file video lokal.'])->withInput();
        }

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('video_file')) {
            $path = $request->file('video_file')->store('videos', 'public');
            $data['video_path'] = $path;
            $data['video_url'] = null;
        } else {
            $data['video_url'] = $request->video_url;
            $data['video_path'] = null;
        }

        Video::create($data);

        return redirect()->route('admin.videos.index')->with('success', 'Video berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        return view('admin.videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $video)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'video_url' => 'nullable|url|max:255',
            'video_file' => 'nullable|file|mimes:mp4,mov,ogg,qt,webm|max:102400', // max 100MB
            'description' => 'nullable|string',
        ]);

        if (!$request->video_url && !$request->hasFile('video_file') && !$video->video_path) {
            return back()->withErrors(['video_url' => 'Anda harus mengisi URL YouTube atau mengunggah file video lokal.'])->withInput();
        }

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('video_file')) {
            // Delete old file if exists
            if ($video->video_path) {
                Storage::disk('public')->delete($video->video_path);
            }
            $path = $request->file('video_file')->store('videos', 'public');
            $data['video_path'] = $path;
            $data['video_url'] = null;
        } elseif ($request->video_url) {
            // YouTube link provided, delete old file if exists
            if ($video->video_path) {
                Storage::disk('public')->delete($video->video_path);
            }
            $data['video_path'] = null;
            $data['video_url'] = $request->video_url;
        }

        $video->update($data);

        return redirect()->route('admin.videos.index')->with('success', 'Video berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        if ($video->video_path) {
            Storage::disk('public')->delete($video->video_path);
        }
        
        $video->delete();

        return redirect()->route('admin.videos.index')->with('success', 'Video berhasil dihapus.');
    }
}
