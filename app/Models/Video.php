<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'video_url',
        'video_path',
        'description',
    ];

    /**
     * Get the absolute playing URL for the video (either YouTube embed/watch or local file URL).
     */
    public function getPlayUrlAttribute()
    {
        if ($this->video_path) {
            return asset('storage/' . $this->video_path);
        }
        return $this->video_url;
    }

    /**
     * Determine if the video is locally uploaded.
     */
    public function getIsLocalAttribute()
    {
        return !empty($this->video_path);
    }
}
