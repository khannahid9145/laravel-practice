<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'summary',
        'status',
        'published_at',
        'author_id',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    // Many to Many
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    // Belongs To
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
