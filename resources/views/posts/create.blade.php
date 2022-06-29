<x-layout>
    <section class="py-8 max-w-md mx-auto">
        <h1 class="font-bold text-lg mb-4">
            Publish New Post
        </h1>
        <x-card>
            <form action="/admin/post" method="POST" enctype="multipart/form-data">
                @csrf
                <x-form.input name='title'/>
                <x-form.input name='slug' />
                <x-form.input name='thumbnail' type="file" />
                <x-form.textarea name='excerpt' />
                <x-form.textarea name='body' />
                <x-form.dropdown name='category' :categories="$categories" />
                <x-form.button>Submit</x-form.button>
            </form>
        </x-card>
    </section>
</x-layout>
