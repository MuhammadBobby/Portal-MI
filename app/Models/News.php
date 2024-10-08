<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;
    // Menentukan bahwa slug yang digunakan untuk pencarian rute
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // fillable
    protected $fillable = ['title', 'content', 'content_2', 'content_3', 'content_4', 'content_5', 'location', 'slug', 'category_id', 'author_id', 'image'];
    // eager loading by deafult
    protected $with = ['author', 'category'];

    // relation
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
