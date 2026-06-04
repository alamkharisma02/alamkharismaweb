<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'location',
        'category',
        'status',
        'video_url',
        'cover_image',
        'gallery_images',
    ];

    protected $casts = [
        'gallery_images' => 'array',
    ];


}
