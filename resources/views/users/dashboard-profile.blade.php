<x-dashboardLayout>
    <div class="h-[720px]">
        {{-- Header --}}
        <div>
            <h1 class="text-white font-bold text-lg mb-3 bg-slate-600 px-3 py-1 rounded-lg shadow-lg">Profile</h1>
        </div>

        {{-- Content --}}
        <section>
            <div class="border-[0.5px] border-slate-300 shadow-lg px-5 py-5 rounded-lg">
                {{-- Image Profile --}}
                <div class="flex gap-x-10">
                    <div>
                        <img src="{{ asset('img/snorlax.png') }}" alt=""
                            class="bg-white p-2 h-[150px] w-[150px] rounded-full border border-slate-500">
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
