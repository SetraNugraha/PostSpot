<x-layout>
    <a href="{{ route('dashboard.posts') }}" class="text-blue-600 block my-5 font-semibold  hover:opacity-50 italic">&larr; Go
        back to your dashboard</a>

    {{-- Create New Post --}}
    <section>
        <div class="card-post my-5">
            <form action="{{ route('posts.store') }}" method="POST" class="form" enctype="multipart/form-data">
                @csrf

                <h1 class="font-bold text-lg ml-1">Create a new post</h1>

                {{-- Post Title --}}
                <div class="form-input">
                    <label for="title" class="label">Post Title</label>
                    <input type="text" name="title" value="{{ old('title') }}"
                        class="input @error('title') border-[0.5px] border-red-500 @enderror">

                    @error('title')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Post Content/Body --}}
                <div class="form-input">
                    <label for="body" class="label">Post Content</label>
                    <textarea name="body" rows="5" class="input-newpost @error('body') border-[0.5px] border-red-500 @enderror">{{ old('body') }}</textarea>

                    @error('body')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Post Image  --}}
                <div class="form-input">
                    <label for="image" class="label">Choose Image</label>
                    <input type="file" name="image"
                        class="ml-1 @error('image') border-[0.5px] border-red-500 @enderror">

                    @error('image')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Button --}}
                <div class="flex flex-col items-center gap-y-5">
                    <button class="btn">Create Post</button>
                </div>
            </form>
        </div>
    </section>
</x-layout>
