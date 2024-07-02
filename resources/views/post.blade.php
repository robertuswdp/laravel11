<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <article class="py-8 max-w-screen-md">
        <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-750">{{ $post['title'] }}</h2>
        <div>
            By
            <a class="hover:underline text-base text-gray-500 " href="/authors/{{ $post->author->username }}">
                {{ $post->author->name }}</a>
            in <a class="hover:underline text-base text-gray-500 " href="/categories/{{ $post->category->slug }}">
                {{ $post->category->name }} </a> |
            {{ $post->created_at->diffForHumans() }}
        </div>
        <p class="my-4 font-light">{{ $post['body'] }}</p>
        {{-- str:limit mellimit tulisan yang ada pada body sesuai angka yang di tulis --}}
        <a href="/posts" class="font-medium text-blue-500 hover:underline">&laquo; Back to Posts</a>

    </article>
</x-layout>
