<x-layout>

    <a href="{{ route('dashboard.posts') }}" class="text-blue-600 block my-5 font-semibold  hover:opacity-50 italic">&larr; Go
        back to your dashboard</a>

    {{-- Update Post --}}
    <section>
        <div class="card-post my-5">
            <form action="{{ route('posts.update', $post->id) }}" method="POST" class="form" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <h1 class="font-bold text-lg ml-1">Update your post</h1>

                {{-- Session Message --}}
                @if (Session('success'))
                    <x-flashMsg msg="{{ Session('success') }}" />
                @elseif (Session('delete'))
                    <x-flashMsg msg="{{ Session('delete') }}" bg="bg-red-500" />
                @endif

                {{-- Post Title --}}
                <div class="form-input">
                    <label for="title" class="label">Post Title</label>
                    <input type="text" name="title" value="{{ $post->title }}"
                        class="input font-normal @error('title') border-[0.5px] border-red-500 @enderror">

                    @error('title')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Post Content / Body --}}
                <div class="form-input">
                    <label for="body" class="label">Post Content</label>
                    <textarea name="body" rows="7"
                        class="input-newpost font-normal @error('body') border-[0.5px] border-red-500 @enderror">{{ $post->body }}</textarea>

                    @error('body')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Current Post Image If Exists --}}
                {{-- Post Image  --}}
                <div class="form-input">
                    <label for="image" class="label">Current Image</label>
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt=""
                            class="ml-1 max-w-[80px] max-h-[80px]">
                    @else
                        <p class="ml-1 text-red-500 font-semibold">This post does not have any image before</p>
                    @endif
                    <input type="file" name="image"
                        class="ml-1 @error('image') border-[0.5px] border-red-500 @enderror">

                    @error('image')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Button --}}
                <div class="flex flex-col items-center gap-y-5">
                    <button class="btn">Update Post</button>
                </div>
            </form>
        </div>
    </section>
</x-layout>
