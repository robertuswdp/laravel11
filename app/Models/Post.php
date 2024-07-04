<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model // pewarisan yang menghubungkan table posts
    {

        use HasFactory;
        // protected $guarded = [];
        protected $fillable = ['title', 'author', 'slug', 'body'];

        protected $with = ['category', 'author']; //lazy loading default

        public function author(): BelongsTo
        {
            return $this->belongsTo(User::class);
        }

        public function category(): BelongsTo
        {
            return $this->belongsTo(Category::class);
        }

        public function scopeFilter(Builder $query, array $filters): void
        {
            $query->when($filters['search'] ?? false, fn ($query, $search) =>
                $query->where('title', 'like', '%' . $search . '%')
            );

            $query->when($filters['category'] ?? false,
            fn ($query, $category) =>
            $query->whereHas('category', fn ($query) =>
                $query->where('slug', $category))
            );

            $query->when($filters['author'] ?? false,
            fn ($query, $author) =>
            $query->whereHas('author', fn ($query) =>
                $query->where('username', $author))
            );
        }
}