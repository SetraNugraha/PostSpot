<x-layout>
    <h1 class="title">Login to Your Account </h1>

    <div class="mx-auto w-[30%] my-5">
        <form action="{{ route('login') }}" method="POST" class="form">
            @csrf

            {{-- Email --}}
            <div class="form-input">
                <label for="email" class="label">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="input @error('email') border-[0.5px] border-red-500 @enderror">
            </div>

            {{-- Password --}}
            <div class="form-input">
                <label for="password" class="label">Password</label>
                <input type="password" name="password"
                    class="input @error('password') border-[0.5px] border-red-500 @enderror">

                @error('failed')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Button --}}
            <div class="flex flex-col items-center gap-y-5">
                <button class="btn">Login</button>
                <a href="{{ route('register') }}" class="text-blue-500 underline text-xs">Don't have an Account ? Signup
                    Here</a>
            </div>

        </form>
    </div>
</x-layout>
