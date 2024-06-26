@props(['post', 'readMore' => false])

{{-- Card Posts --}}
<section class="card-posts {{ $readMore ? 'w-full' : '' }}">
    {{-- title --}}
    <div class="flex justify-between items-start ">
        <div class="w-[90%]">
            <h1 class="text-lg font-bold ">{{ $post->title }}</h1>
        </div>
        {{-- Button Action --}}
        <div class="w-[10%]">
            {{ $slot }}
        </div>
    </div>

    {{-- author --}}
    <div>
        <p class="text-sm">
            Posted
            <span class="font-semibold">{{ $post->created_at->diffForHumans() }}</span>
            By
            <a href="{{ route('posts.user', $post->author) }}" class="text-blue-500">{{ $post->author->username }}</a>
        </p>
    </div>

    {{-- body --}}
    @if ($readMore)
    {{-- Expand --}}
        <div class="my-5 flex flex-col gap-y-5">
            <span class="text-justify">{{ $post->body }}</span>
            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="" class="max-h-[500px] max-w-[500px]">
            @endif
        </div>
    @else
    {{-- No Expand --}}
        <div class="my-2 flex justify-between items-center">
            <div class="w-[80%] text-justify">
                <span class="text-sm">{{ Str::words($post->body, 15) }}</span>
                <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 ml-2">Read More &rarr;</a>
            </div>

            @if ($post->image)
                <div class="w-[20%]">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="" class="w-[70px] h-[70px] ml-5">
                </div>
            @endif
        </div>
    @endif


</section>
