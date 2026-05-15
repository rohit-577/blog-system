<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'content',
        'category',
        'image_path',
    ];

    public function getImageUrlAttribute(): string
    {
        if ($this->image_path) {
            return asset('storage/' . $this->image_path);
        }
        return asset('images/default-blog.jpg');
    }

    public function getFormattedDateAttribute(): string
    {
        return $this->created_at->format('d M Y');
    }

    public static function getCategories(): array
    {
        return ['Admit Card', 'Answer Key', 'Calendar', 'Exam Date Information', 'Result'];
    }
}
