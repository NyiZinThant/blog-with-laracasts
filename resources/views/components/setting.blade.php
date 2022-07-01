@props(['heading'])
<section class="py-8 max-w-4xl mx-auto">
    <h1 class="font-bold text-lg mb-4 mb-8 pb-2 border-b">
        {{ ucwords($heading) }}
    </h1>
    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <h4 class="font-semibold mb-4">
                Links
            </h4>
            <ul>
                <li class="{{ request()->is('admin/posts') ? 'text-blue-500': '' }}">
                    <a href="/admin/posts">
                        Manage Post
                    </a>
                </li>
                <li class="{{ request()->is('admin/post/create') ? 'text-blue-500': '' }}">
                    <a href="/admin/post/create">
                        New Post
                    </a>
                </li>
            </ul>
        </aside>
        <main class="flex-1">
            <x-card>
                {{ $slot }}
            </x-card>
        </main>
    </div>
</section>
