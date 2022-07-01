@props(['name', 'type' => 'text'])

<x-form.template>
    <x-form.label :name="$name" />
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="border border-gray-200 w-full rounded p-2"
        value="{{ old($name) }}" required>
    <x-form.error :name="$name" />
</x-form.template>