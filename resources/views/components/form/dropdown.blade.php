@props(['name', 'categories'])

<x-form.template>
    <x-form.label :name="$name" />
    <select name="category_id" id="category" class="w-full">
        <option value="0" selected disabled>Select</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
        @endforeach
    </select>
    <x-form.error :name="$name" />
</x-form.template>
