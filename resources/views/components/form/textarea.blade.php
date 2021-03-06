@props(['name'])

<x-form.template>
    <x-form.label :name="$name" />
    <textarea name="{{ $name }}" id="{{ $name }}" class="border border-gray-200 rounded w-full p-2" required>
        {{ $slot ?? old($name) }}
    </textarea>
    <x-form.error :name="$name" />
</x-form.template>
