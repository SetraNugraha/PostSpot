<x-layout>
    <div class="my-5">
        @php
            $backRoute = request()->query('ref');
        @endphp
        @if ($backRoute === 'homepage')
            <a href="{{ route('posts.index') }}"
                class="text-blue-600 block my-5 font-semibold  hover:opacity-50 italic">&larr;
                Go back</a>
        @elseif ($backRoute === 'dashboard')
            <a href="{{ route('dashboard.posts') }}"
                class="text-blue-600 block my-5 font-semibold  hover:opacity-50 italic">&larr;
                Go back</a>
        @elseif ($backRoute === 'userPost')
            <a href="{{ route('showUserPost', $post->user->id) }}"
                class="text-blue-600 block my-5 font-semibold  hover:opacity-50 italic">&larr;
                Go back</a>
        @endif
        <x-postCard :post="$post" readMore="{{ true }}" />
    </div>
</x-layout>
