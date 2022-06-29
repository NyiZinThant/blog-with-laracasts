@props(['name'])

<x-form.template>
    <x-form.label :name="$name" />
    <textarea name="{{ $name }}" id="{{ $name }}" class="border border-gray-400 w-full p-2"
        value="{{ old($name) }}" required></textarea>
    <x-form.error :name="$name" />
</x-form.template>
