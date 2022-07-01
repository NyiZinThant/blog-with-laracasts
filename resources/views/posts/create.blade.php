<x-layout>
    <x-setting heading="Publish New Post">
        <form action="/admin/post" method="POST" enctype="multipart/form-data">
            @csrf
            <x-form.input name='title' />
            <x-form.input name='slug' />
            <x-form.input name='thumbnail' type="file" />
            <x-form.textarea name='excerpt' />
            <x-form.textarea name='body' />
            <x-form.dropdown name='category' :categories="$categories" />
            <x-form.button>Submit</x-form.button>
        </form>
    </x-setting>
</x-layout>
