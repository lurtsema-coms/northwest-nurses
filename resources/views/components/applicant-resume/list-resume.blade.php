<div class="relative flex items-center justify-center w-full sm:w-2/3 overflow-hidden mt-5 " data-id="{{ $my_resume->id }}">
    <label  class="flex items-center w-full justify-between h-[8rem] border-2 border-gray-300 rounded-lg bg-gray-50 py-5 px-5 lg:px-16	">
        <div class="hidden lg:block">
            <svg class="w-8 h-8 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M64 464l48 0 0 48-48 0c-35.3 0-64-28.7-64-64L0 64C0 28.7 28.7 0 64 0L229.5 0c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3L384 304l-48 0 0-144-80 0c-17.7 0-32-14.3-32-32l0-80L64 48c-8.8 0-16 7.2-16 16l0 384c0 8.8 7.2 16 16 16zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z"/>
            </svg>
        </div>
        <div class="">
            @if ($my_resume->default == 1)
                <span class="m-auto py-2 px-4 text-sm font-semibold bg-gray-200 rounded text-black">Default</span>
            @endif
            <div>
                <h1 class="max-w-[200px] sm:max-w-[300px] whitespace-nowrap overflow-hidden text-ellipsis text-lg font-semibold my-1">{{basename($my_resume->file_path)}}</h1>
                <span class="text-gray-500">Added about</span>
                <span class="timeago text-gray-500 " datetime="{{ $my_resume->created_at }} {{ config('app.timezone') }}"></span>
            </div>
        </div>
        <div class="relative p-1 rounded-3xl hover:bg-gray-200 cursor-pointer dropdown">
            <svg class="w-8 h-8 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 512">
                <path fill="currentColor" d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/>
            </svg>
            <div class="bg-white absolute right-[44px] top-[-44px] py-1 z-10 hidden dropdown-menu rounded-xl shadow-md">
                @if ($my_resume->default == 0)
                <div class="text-lg w-full cursor-pointer px-3 py-1 hover:bg-gray-100 flex mb-1 font-semibold text-gray-800 default-btn"
                hx-trigger="click" hx-get="{{ route('applicant.default.resume', $my_resume->id) }}" hx-target="[data-id='{{ $my_resume->id }}']" hx-swap="outerHTML">
                        <svg class="w-8 h-5 text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path fill="currentColor" d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"/>
                        </svg>
                        Default
                </div>
                @endif
                <a class="text-lg w-full cursor-pointer px-3 py-1 hover:bg-gray-100 flex mb-1 font-semibold text-gray-800 ">
                    <svg class="w-8 h-5 text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 242.7-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7 288 32zM64 352c-35.3 0-64 28.7-64 64l0 32c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-32c0-35.3-28.7-64-64-64l-101.5 0-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352 64 352zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/>
                    </svg>
                    Download
                </a>
                <div class="text-lg w-full cursor-pointer px-3 py-1 hover:bg-gray-100 flex font-semibold text-red-500 delete-btn" data-entry-id="{{ $my_resume->id }}" data-href="{{ route('applicant.profile.delete-resume', $my_resume->id ) }}">
                    <svg class="w-8 h-6 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="currentColor" d="M64 80c-8.8 0-16 7.2-16 16l0 320c0 8.8 7.2 16 16 16l320 0c8.8 0 16-7.2 16-16l0-320c0-8.8-7.2-16-16-16L64 80zM0 96C0 60.7 28.7 32 64 32l320 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64L0 96zM152 232l144 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-144 0c-13.3 0-24-10.7-24-24s10.7-24 24-24z"/>
                    </svg>
                    Delete
                </div>
            </div>
        </div>
    </label>
</div>