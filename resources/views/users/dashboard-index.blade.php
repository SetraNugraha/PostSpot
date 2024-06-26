<x-dashboardLayout>
    <div class="h-[720px]">
        {{-- Header --}}
        <div>
            <h1 class="text-white font-bold text-lg mb-3 bg-slate-600 px-3 py-1 rounded-lg shadow-lg">Dashboard</h1>
        </div>

        {{-- Content --}}
        <section>
            <div class="grid grid-cols-4 gap-5">
                <div
                    class="flex justify-between items-center gap-x-3 px-4 h-[100px] bg-yellow-500 rounded-lg shadow-lg border-[0.5px] border-slate-200">
                    <h1 class="text-white text-5xl font-bold w-[20%] -mt-2">3</h1>
                    <p class="w-[80%] flex flex-col text-white font-bold text-xl text-end"><span>DAILY</span>NEW POST</p>
                </div>
                <div
                    class="flex justify-between items-center gap-x-3 px-4 h-[100px] bg-blue-500 rounded-lg shadow-lg border-[0.5px] border-slate-200">
                    <h1 class="text-white text-5xl font-bold w-[20%] -mt-2">9</h1>
                    <p class="w-[80%] flex flex-col text-white font-bold text-xl text-end"><span>WEEKLY</span>NEW POST</p>
                </div>
                <div
                    class="flex justify-between items-center gap-x-3 px-4 h-[100px] bg-green-500 rounded-lg shadow-lg border-[0.5px] border-slate-200">
                    <h1 class="text-white text-5xl font-bold w-[20%] -mt-2">23</h1>
                    <p class="w-[80%] flex flex-col text-white font-bold text-xl text-end"><span>MONTHLY</span>NEW POST</p>
                </div>
                <div
                    class="flex flex-shrink-0 justify-between items-center gap-x-3 px-4 h-[100px] bg-stone-500 rounded-lg shadow-lg border-[0.5px] border-slate-200">
                    <h1 class="text-white text-5xl font-bold w-[20%] -mt-2">103</h1>
                    <p class="w-[80%] flex flex-col text-white font-bold text-xl text-end"><span>ALL</span>POST</p>
                </div>
            </div>
        </section>
    </div>
</x-dashboardLayout>
