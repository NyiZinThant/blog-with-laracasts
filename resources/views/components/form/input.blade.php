@props(['name'])

<x-form.template>
    <x-form.label :name="$name" />
    <input name="{{ $name }}" id="{{ $name }}" class="border border-gray-200 w-full rounded p-2" 
    {{ $attributes(['value' => old($name), 'type' => 'text']) }}>
    <x-form.error :name="$name" />
</x-form.template>