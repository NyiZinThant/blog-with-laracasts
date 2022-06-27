@auth
    <x-card>
        <form action="/posts/{{ $post->id }}/comments" method="post">
            @csrf
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->user()->id }}" height="40" width="40" alt="avatar"
                    class="rounded-full">
                <h2 class="ml-4">Want to participate?</h2>
            </header>
            <div class="mt-7">
                <textarea name="body" class="w-full text-sm focus:ring focus:outline-none" rows="5"
                    placeholder="Comment something!"></textarea>
                @error('body')
                    <span class="text-xs text-red-500">Your comment is empty!</span>
                @enderror
            </div>
            <div class="flex justify-end mt-2 pt-2 border-t border-gray-200">
                <button type="submit"
                    class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">Submit</button>
            </div>
        </form>
    </x-card>
@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline">Register</a> Or <a href="/login" class="hover:underline">Login</a> to
        leave a comment.
    </p>
@endauth
