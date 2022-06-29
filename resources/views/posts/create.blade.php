<x-layout>
    <section class="px-6 py-8">
        <x-card class="max-w-sm mx-auto">
            <form action="/admin/post" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Title
                    </label>
                    <input type="text" name="title" id="title" class="border border-gray-400 w-full p-2"
                        value="{{ old('title') }}" required>
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="slug" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Slug
                    </label>
                    <input type="text" name="slug" id="slug" class="border border-gray-400 w-full p-2"
                        value="{{ old('slug') }}" required>
                    @error('slug')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="excerpt" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Excerpt
                    </label>
                    <textarea name="excerpt" id="excerpt" class="border border-gray-400 w-full p-2" value="{{ old('excerpt') }}"
                        required></textarea>
                    @error('excerpt')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Body
                    </label>
                    <textarea name="body" id="body" class="border border-gray-400 w-full p-2" value="{{ old('body') }}" required></textarea>
                    @error('body')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="category" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Category
                    </label>
                    <select name="category_id" id="category" class="w-full">
                        <option value="0" selected disabled>Select</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit"
                    class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 rounded-full text-xs font-semibold text-white uppercase py-2 px-8">
                    Submit
                </button>
            </form>
        </x-card>
    </section>
</x-layout>
