<x-layout>
    <div class="my-5">
        <a href="{{ route('posts.index') }}" class="text-blue-600 block my-5 font-semibold  hover:opacity-50 italic">&larr;
            Go back</a>
        <x-postCard :post="$post" readMore="{{ true }}" />
    </div>
</x-layout>
