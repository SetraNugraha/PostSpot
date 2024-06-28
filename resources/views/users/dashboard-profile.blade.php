<x-dashboardLayout>
    <div class="h-[720px]">
        {{-- Header --}}
        <div class="flex justify-between items-center gap-x-2">
            <h1 class="text-white font-bold text-lg mb-3 bg-slate-600 px-3 py-1 rounded-lg w-[80%] shadow-lg">
                Your Profile</h1>
            <a href="{{ route('dashboard.editProfile', Auth::user()->id) }}"
                class="text-white text-md text-center font-bold mb-3 bg-blue-500 px-3 py-1 rounded-lg w-[20%] hover:opacity-70 shadow-lg">
                Update Profile</a>
        </div>

        {{-- Content --}}
        <section>
            <div class="border-[0.5px] border-slate-300 shadow-lg px-5 pt-5 pb-3 rounded-lg">
                {{-- Image Profile --}}
                <div class="flex gap-x-10">
                    <div class="flex flex-col gap-y-5 justify-center items-center">
                        @if (Auth::user()->profile_image)
                            <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt=""
                                class="bg-white p-2 h-[150px] w-[150px] rounded-full border border-slate-500">
                        @else
                            <img src="{{ asset('img/user-icon.png') }}" alt=""
                                class="bg-white p-2 h-[150px] w-[150px] rounded-full border border-slate-500">
                        @endif

                        {{-- Delete Image Profile --}}
                        <form action="{{ route('dashboard.deleteProfileImage', Auth::user()->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="px-2 py-1 rounded-lg text-white font-semibold bg-red-500 border-[0.5px] border-slate-400 shadow-lg hover:opacity-70">Delete
                                Image</button>
                        </form>
                    </div>

                    {{-- Email & Name User --}}
                    <div class="flex flex-col gap-y-4 mt-1">
                        {{-- Email --}}
                        <div>
                            <label for="" class="text-slate-500 font-semibold opacity-90">email</label>
                            <h3 class="text-xl font-bold">{{ Auth::user()->email }}</h3>
                        </div>

                        {{-- username --}}
                        <div>
                            <label for="" class="text-slate-500 font-semibold opacity-90">username</label>
                            <h1 class="text-xl font-bold text-slate-600">{{ Auth::user()->username }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-dashboardLayout>
