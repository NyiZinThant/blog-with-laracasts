<x-layout>
    <x-setting :heading="'Edit Post: ' . $post->title">
        <form action="/admin/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PATCH")
            <x-form.input name='title' :value="old('title', $post->title)" />
            <x-form.input name='slug' :value="old('slug', $post->slug)" />
            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name='thumbnail' type="file" />
                </div>
                <img src="{{ asset('storage/' . $post->thumbnail) }}" width="100" class="rounded-xl ml-6">

            </div>
            <x-form.textarea name='excerpt'>
                {{ $post->excerpt }}
            </x-form.textarea>
            <x-form.textarea name='body'>
                {{ $post->body }}
            </x-form.textarea>
            <x-form.dropdown name='category' :categories="$categories" :category_id="$post->category_id" />
            <x-form.button>Update</x-form.button>
        </form>
    </x-setting>
</x-layout>
