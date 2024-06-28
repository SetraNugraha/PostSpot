<x-layout>
    <div class="my-5 mx-2">
        <div class="">
            <h1 class="font-bold text-3xl text-slate-600 ml-1 my-2">Dashboard </h1>
        </div>

        {{-- Session Message --}}
        @if (Session::has('success'))
            <x-flashMsg msg="{{ Session('success') }}" />
        @elseif (Session::has('error'))
            <x-flashMsg msg="{{ Session('error') }}" icon="error" />
        @elseif (Session::has('delete'))
            <x-flashMsg msg="{{ Session('delete') }}" />
        @endif

        <div class="flex gap-x-5">
            {{-- Sidebar --}}
            <section class="w-[20%] shadow-xl">
                <div class="bg-slate-600 rounded-lg h-[720px]">
                    <div class="flex flex-col gap-y-3 font-semibold text-white px-3 py-5">
                        <a href="{{ route('dashboard.index') }}"
                            class="px-2 py-1 rounded-lg hover:text-black hover:bg-white {{ request()->routeIs('dashboard.index') ? 'bg-white text-black' : '' }}">Dashboard</a>
                        <a href="{{ route('dashboard.posts') }}"
                            class="px-2 py-1 rounded-lg hover:text-black hover:bg-white {{ request()->routeIs('dashboard.posts') ? 'bg-white text-black' : '' }}">Posts</a>
                        <a href="{{ route('dashboard.profile') }}"
                            class="px-2 py-1 rounded-lg hover:text-black hover:bg-white {{ request()->routeIs('dashboard.profile') ? 'bg-white text-black' : '' }}">Profile</a>
                    </div>
                </div>
            </section>

            {{-- Dashboard Content --}}
            <section class="w-[80%]">
                {{ $slot }}
            </section>
        </div>
    </div>
</x-layout>
