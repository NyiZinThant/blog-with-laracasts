<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    // default lazy loading
    //  protected $with = ['category', 'author'];

    // Call this function like this ( Post::fetchSmt()->filter()->get() )
    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['search'])) {
            $query->where(function ($query) use ($filters) {
                $query->where('title', 'like', '%' . $filters['search'] . '%')
                ->orWhere('body', 'like', '%' . $filters['search'] . '%');
            });
        }

        // Alt method

        // $query->when($filters['search'] ?? false, function ($query, $search){
        //     $query
        //     ->where('title', 'like', '%' . $search . '%')
        //     ->orWhere('body', 'like', '%' . $search . '%');
        // });

        if (isset($filters['category'])) {
            $query->whereHas('category', fn ($query) => 
                $query->where('slug', $filters['category'])
            );
        }

        // Alt method

        // $query->when($filters['category'] ?? false, function ($query, $category){
        //     $query->whereHas('category', fn ($query) => $query->where('slug', $category)
        // });

        if (isset($filters['author'])) {
            $query->whereHas('author', fn ($query) => 
                $query->where('username', $filters['author'])
            );
        }

        // Alt method

        // $query->when($filters['author'] ?? false, function ($query, $author){
        //     $query->whereHas('author', fn ($query) => $query->where('username', $author)
        // });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
