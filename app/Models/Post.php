<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'excerpt', 'body'];

    // default lazy loading
    //  protected $with = ['category', 'author'];

    // Call this function like this ( Post::fetchSmt()->filter()->get() )
    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['search'])) {
            $query
                ->where('title', 'like', '%' . $filters['search'] . '%')
                ->orWhere('body', 'like', '%' . $filters['search'] . '%');
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

        // $query->when($filters['search'] ?? false, function ($query, $category){
        //     $query->whereHas('category', fn ($query) => $query->where('slug', $category)
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
}
