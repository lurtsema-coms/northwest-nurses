<div class="fixed top-0 left-0 min-h-screen min-w-screen inset-0 bg-gray-600 bg-opacity-75 transition-opacity">
    <div class="flex h-full w-full text-black">
        <div class="m-auto w-full max-w-lg bg-white relative shadow-xl rounded-lg py-10 px-6">
            {{-- Icon --}}
            <div class="text-center">
                <span class="mb-4 inline-flex justify-center items-center w-[62px] h-[62px] rounded-full border-4 border-yellow-50 bg-yellow-100 text-yellow-500">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
                    </svg>
                </span>
            </div>
            {{-- Content --}}
            <div class="text-center">
                {{-- Title --}}
                <div class="space-y-3">
                    <p class="text-xl text-slate-600 font-medium" id="m-title">Are You Sure?</p>
                    <p class="text-slate-500" id="m-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat, quae.</p>
                </div>
                <div class="flex justify-center items-center mt-7 space-x-5">
                    <button class="text-sm text-slate-600 h-10 px-5 rounded-md shadow-sm border bg-white hover:bg-gray-50">Cancel</button>
                    <button class="text-sm text-white h-10 px-5 rounded-md shadow-sm border bg-sky-600 hover:bg-sky-500">Yes</button>
                </div>
            </div>
        </div>
    </div>
</div>