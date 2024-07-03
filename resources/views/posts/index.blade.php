<x-layout>

    <div class="h-[850px] flex flex-col justify-between">
        <div>
            {{-- Header --}}
            <div class="py-5 px-4 rounded-lg my-5 bg-slate-500">
                <h1 class="font-bold text-3xl text-white">PostSpot Homepage</h1>
                <p class="font-semibold text-white my-2">On this page, you can see all the Posts from People around the
                    World
                    !</p>
            </div>

            {{-- Post --}}
            @if ($posts->isEmpty())
                @guest
                    <p class="text-center font-semibold text-lg py-2 px-5 rounded-xl bg-slate-200">No one has made a post yet
                    </p>
                @endguest
                @auth
                    <p class="text-center font-semibold text-lg py-2 px-5 rounded-xl bg-slate-200">No one has made a post yet
                    </p>
                @endauth
            @else
                <div class="grid grid-cols-2 gap-5 justify-center">
                    @foreach ($posts as $post)
                        <x-postCard :post="$post" ref="homepage" />
                    @endforeach
                </div>
            @endif
        </div>

        {{-- Pagination Button --}}
        <div class="my-10 w-[90%] mx-auto">
            {{ $posts->links() }}
        </div>
    </div>

</x-layout>
