<x-layout>
    <div class="my-2 mx-2">
        <p class="title">{{ $user->username }} Post</p>

        <div class="grid grid-cols-2 gap-5">
            @foreach ($posts as $post)
                <x-postCard :post="$post" />
            @endforeach
        </div>

        {{-- Pagination Button --}}
        <div class="my-10 w-[90%] mx-auto">
            {{ $posts->links() }}
        </div>
    </div>
</x-layout>
