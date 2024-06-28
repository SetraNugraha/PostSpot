<x-dashboardLayout>
    <div class="h-[720px]">
        {{-- Header --}}
        <div>
            <h1 class="text-white font-bold text-lg mb-3 bg-yellow-600 px-3 py-1 rounded-lg shadow-lg">Edit Your Profile
            </h1>
        </div>

        {{-- Content --}}
        <section>
            <div class="border-[0.5px] border-slate-300 shadow-lg px-5 pt-5 pb-3 rounded-lg">
                {{-- Image Profile --}}
                <div>
                    <form action="{{ route('dashboard.updateProfile', Auth::user()->id) }}" method="POST"
                        enctype="multipart/form-data" class="flex gap-x-5 items-start">
                        @csrf
                        @method('PATCH')

                        {{-- Profile Image --}}
                        <div class="flex flex-col items-center gap-y-5 h-[200px] w-[250px]">
                            <img src="{{ asset('img/snorlax.png') }}" alt=""
                                class="bg-white p-2 rounded-full border border-slate-500 w-[150px] h-[150px]">
                            <input type="file" name="profile_image" class="block w-full text-sm text-slate-500
                            file:mr-4 file:py-1 file:px-4
                            file:rounded-full file:border-0
                            file:text-sm file:font-semibold
                            file:bg-violet-50 file:text-violet-700
                            hover:file:bg-violet-100">
                        </div>


                        <div class="flex flex-col gap-y-5">
                            {{-- username --}}
                            <div class="flex flex-col gap-y-2">
                                <label for=""
                                    class="text-slate-500 ml-1 font-semibold opacity-90">username</label>
                                <input type="text" name="username" value="{{ Auth::user()->username }}"
                                    class="border-[1px] border-slate-300 px-3 py-1 rounded-lg font-semibold">
                            </div>

                            {{-- Button --}}
                            <div>
                                <button type="submit"
                                    class="px-2 py-1 bg-blue-600 text-white font-semibold text-start rounded-lg hover:opacity-70">Update
                                    Profile</button>
                            </div>
                        </div>


                    </form>

                </div>
            </div>
        </section>
    </div>
</x-dashboardLayout>
