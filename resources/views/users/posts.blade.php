<x-layout>
    <div class="my-2 mx-2">
        <div class="py-5 px-4 rounded-lg my-5 bg-slate-500">
            <h1 class="font-bold text-3xl text-white">You Spotted <span class="px-2 pb-1 bg-white text-slate-500 rounded-lg text-2xl font-semibold">{{ $user->username }}</span> Posts !</h1>
            <p class="font-semibold text-white my-2">Have {{ $totalPost }} Total Post</p>
        </div>

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
