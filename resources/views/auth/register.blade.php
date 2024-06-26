<x-layout>
    <h1 class="title">Register New Account </h1>

    <div class="mx-auto w-[30%] my-5">
        <form action="{{ route('register') }}" method="POST" class="form">
            @csrf

            {{-- Username --}}
            <div class="form-input">
                <label for="username" class="label">Username</label>
                <input type="text" name="username" value="{{ old('username') }}"
                    class="input @error('username') border-[0.5px] border-red-500 @enderror">

                @error('username')
                    <p class="text-red-500 mt-[-10px] text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div class="form-input">
                <label for="email" class="label">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="input @error('email') border-[0.5px] border-red-500 @enderror"">

                @error('email')
                    <p class="text-red-500 mt-[-10px] text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="form-input">
                <label for="password" class="label">Password</label>
                <input type="password" name="password"
                    class="input @error('password') border-[0.5px] border-red-500 @enderror"">

                @error('password')
                    <p class="text-red-500 mt-[-10px] text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="form-input">
                <label for="password_confirmation" class="label">Confirm Password</label>
                <input type="password" name="password_confirmation"
                    class="input @error('password_confirmation') border-[0.5px] border-red-500 @enderror"">

                @error('password_confirmation')
                    <p class="text-red-500 mt-[-10px] text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Button --}}
            <div class="flex flex-col items-center gap-y-5">
                <button class="btn">Register</button>
                <a href="{{ route('login') }}" class="text-blue-500 underline text-xs">Already have Account ? Login Here</a>
            </div>

        </form>
    </div>
</x-layout>
