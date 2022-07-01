<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::orderBy('id', 'desc')->paginate(50),
        ]);
    }

    public function create()
    {
        return view('admin.posts.create', ['categories' => Category::all()]);
    }

    public function store()
    {
        $this->requestValidation(new Post());

        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        $attributes['user_id'] = auth()->user()->id;

        Post::create($attributes);

        return redirect("/")->with('success', 'Your post has been published.');
    }

    public function edit(Post $post)
    {
        return view('admin/posts/edit', [
            'post' => $post,
            'categories' => Category::all(),
        ]);
    }

    public function update(Post $post)
    {
        $attributes = $this->requestValidation($post);

        if (isset($attrubutes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', "Post Updated!");
    }

    public function destory(Post $post)
    {
        $post->delete();

        return back()->with('success', "Post Deleted!");
    }

    protected function requestValidation(?Post $post = null)
    {
        $post ??= new Post();
        return request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
    }
}


// 09264188529