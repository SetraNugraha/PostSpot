<div>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        {{-- Alpine JS --}}
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        {{-- Sweetalert2 --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <title>{{ env('APP_NAME') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>
        <header>
            <nav class="flex items-center justify-between py-3 px-[20%] bg-slate-700">
                <a href="{{ route('posts.index') }}" class="nav-link">PostSpot</a>

                @auth
                    <div x-data="{ open: false }">
                        <button @click="open = !open" type="button" class="bg-white rounded-full p-1">
                            <img src="{{ asset('img/user-icon.png') }}" alt="user-icon"
                                class="w-[30px] h-[30px] rounded-full hover:opacity-70">
                        </button>

                        {{-- Container After User Button Click --}}
                        <div x-show="open" @click.outside="open = false"
                            class="fixed ml-[-60px] border-[1px] border-slate-600 rounded-lg my-2 shadow-lg flex flex-col gap-y-3 bg-white py-2">
                            <p class="font-semibold mt-[-10px] border-b-[1px] px-2 py-2">Hello,
                                {{ Auth::user()->username }}</p>

                            <div class="flex flex-col gap-y-3 px-5">
                                <a href="{{ route('dashboard.index') }}" class="menu-user">Dashboard</a>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="menu-user hover:bg-red-600 hover:text-white">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>


                @endauth

                @guest
                    <div class="flex gap-x-5">
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                        <a href="{{ route('view_register') }}" class="nav-link">Register</a>
                    </div>
                @endguest
            </nav>
        </header>

        <main class="px-[20%]">
            {{ $slot }}
        </main>
    </body>

    </html>

</div>
