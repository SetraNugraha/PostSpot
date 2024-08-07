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
                            class="px-2 py-1 flex items-center gap-x-2 rounded-lg hover:text-black hover:bg-white {{ request()->routeIs('dashboard.index') ? 'bg-white text-black' : '' }}"><span>

                                <img src="{{ asset('img/icon-dashboard.svg') }}" alt=""
                                    class="w-[19px] h-[19px] fill-current text-black">
                            </span>
                            Dashboard
                        </a>
                        <a href="{{ route('dashboard.posts') }}"
                            class="px-2 py-1 flex items-center gap-x-2 rounded-lg hover:text-black hover:bg-white {{ request()->routeIs('dashboard.posts') ? 'bg-white text-black' : '' }}">
                            <span>
                                <img src="{{ asset('img/icon-post.svg') }}" alt=""
                                    class="w-[20px] h-[20px] fill-current text-black">
                            </span>
                            Posts</a>
                        <a href="{{ route('dashboard.profile') }}"
                            class="px-2 py-1 flex items-center gap-x-2 rounded-lg hover:text-black hover:bg-white {{ request()->routeIs('dashboard.profile') ? 'bg-white text-black' : '' }}">
                            <span>
                                <img src="{{ asset('img/icon-profile.svg') }}" alt=""
                                    class="w-[20px] h-[20px] fill-current text-black">
                            </span>Profile</a>
                    </div>
                </div>
            </section>

            {{-- Dashboard Content --}}
            <section class="w-[80%]">
                {{ $slot }}
            </section>
        </div>
    </div>

    <script>
        function confirmationDelete(event) {
            event.preventDefault()
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.closest('form').submit(); // Submit form jika user mengonfirmasi
                }
            });
        }
    </script>
</x-layout>
