<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'category',
        'role',
        'thumbnail_path',
        'gallery_images',
        'short_description',
        'detailed_description',
        'tech_stack',
        'github_url',
        'demo_url',
        'is_featured',
        'order_column',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'gallery_images' => 'array',
        'tech_stack' => 'array',
        'is_featured' => 'boolean',
        'order_column' => 'integer',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'gallery_images' => 'array',
            'tech_stack' => 'array',
            'is_featured' => 'boolean',
            'order_column' => 'integer',
        ];
    }
}
