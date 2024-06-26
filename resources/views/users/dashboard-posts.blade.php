<x-dashboardLayout>
    <div class="h-[720px]">
        {{-- Latest post --}}
        <section>
            <div class="flex justify-between items-center gap-x-2">
                <h1 class="text-white font-bold text-lg mb-3 bg-slate-600 px-3 py-1 rounded-lg w-[80%] shadow-lg">
                    Your
                    Latest Post</h1>
                <a href="{{ route('posts.create') }}"
                    class="text-white text-md text-center font-bold mb-3 bg-green-600 px-3 py-1 rounded-lg w-[20%] hover:opacity-70 shadow-lg">
                    Create New Post</a>
            </div>

            @if ($posts->isEmpty())
                <p class="text-center">You haven't made a post yet</p>
            @else
                <div class="grid grid-cols-2 gap-5 mt-3">
                    @foreach ($posts as $post)
                        <x-postCard :post="$post">
                            {{-- Button Action --}}
                            <div x-data="{ postAction: false }">
                                <div class="relative left-5">
                                    <button type="button" @click="postAction = !postAction">
                                        <img src="{{ asset('img/menu.png') }}"
                                            class="w-[20px] h-[20px] hover:opacity-60" alt="">
                                    </button>
                                </div>

                                <div x-show="postAction" @click.outside="postAction= false"
                                    class="absolute ml-[-50px] bg-white flex flex-col justify-center items-center gap-y-2 mt-3 px-3 border-[0.5px] border-slate-300 rounded-md shadow-xl">
                                    {{-- Update Post --}}
                                    <a href="{{ route('posts.edit', $post->id) }}"
                                        class="px-2 py-1 mt-3 rounded-lg bg-green-600 text-white font-semibold text-xs hover:opacity-50 hover:cursor-pointer">
                                        Update
                                    </a>
                                    {{-- Delete Post --}}
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="px-2 py-1 rounded-lg bg-red-600 text-white font-semibold text-xs hover:opacity-50 hover:cursor-pointer">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </x-postCard>
                    @endforeach
                </div>
            @endif
        </section>

        {{-- Pagination Button --}}
        <div class="mt-10 w-[90%] mx-auto">
            {{ $posts->links() }}
        </div>
    </div>
</x-dashboardLayout>
