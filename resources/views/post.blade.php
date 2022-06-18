<x-layout>
    <h1>{{ $post->title }}</h1>
    <p>
        By <a href="/users/{{ $post->user->name }}">{{ $post->user->name }}</a> in
        <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
    </p>
    <div>
        {!! $post->body !!}
    </div>
    <a href="/">back</a>
</x-layout>