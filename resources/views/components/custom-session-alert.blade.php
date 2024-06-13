@if (session('success'))
    <div class="fixed bottom-5 right-5 max-w-xs bg-white border border-gray-200 rounded-xl shadow-md alert z-10">
        <div class="flex p-4">
        <div class="flex-shrink-0">
            <svg class="flex-shrink-0 size-4 text-teal-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
            </svg>
        </div>
        <div class="ms-3">
            <p class="text-sm text-gray-700">
                {{ session('success') }}
            </p>
        </div>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="fixed bottom-5 right-5 max-w-xs bg-white border border-gray-200 rounded-xl shadow-md alert z-10">
        <div class="flex p-4">
        <div class="flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="flex-shrink-0 size-4 text-red-500 mt-0.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>

        </div>
        <div class="ms-3">
            <p class="text-sm text-gray-700">
                {{ session('error') }}
            </p>
        </div>
        </div>
    </div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            $('.alert').addClass('hidden');
        }, 5000);
    });
</script>