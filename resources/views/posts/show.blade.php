<x-layout>
    <div class="my-5">
        @php
            $backRoute = request()->query('ref') === 'homepage' ? route('posts.index') : route('dashboard.posts');
        @endphp
        <a href="{{ $backRoute }}" class="text-blue-600 block my-5 font-semibold  hover:opacity-50 italic">&larr;
            Go back</a>
        <x-postCard :post="$post" readMore="{{ true }}" />
    </div>
</x-layout>
