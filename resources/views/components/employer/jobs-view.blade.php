<div class="min-h-96 relative bg-white p-5 shadow-sm border rounded-2xl">
    <div class="font-medium text-sm text-sky-600 flex absolute -top-9 left-0">
        <span class="flex items-center space-x-2 hover:opacity-70 cursor-pointer"
            hx-get="{{ route('employer.job') }}" hx-target="#target-content" hx-push-url="true"
        >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <span>Back to Jobs</span>
        </span>
    </div>
    <form action="">
        <div class="w-full max-w-[45.5rem]">
            <div class="font-medium text-slate-600 mb-3">Upload Image</div>
            
            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600" draggable="true">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6" id="img-content">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, and JPG (MAX. 600x400)</p>
                    </div>
                    <input id="dropzone-file" type="file" class="hidden" />
                </label>
            </div> 
        </div>
    </form>
</div>

<script>
    const dropzone = document.getElementById('dropzone-file').parentElement;

    dropzone.addEventListener('dragover', (event) => {
        event.preventDefault();
    });

    dropzone.addEventListener('drop', (event) => {
        event.preventDefault();

        const files = event.dataTransfer.files;
        updateImgFile(files);
    });


    $('#dropzone-file').on('change', function(event){
        const files = event.target.files;
        
        updateImgFile(files);
    });

    function updateImgFile(files){
        if (files && files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
            const uploadedFileContainer = $('#img-content');
            uploadedFileContainer.empty();
            
            const img = document.createElement('img');
            img.classList.add('h-52', 'w-full', 'max-w-80', 'object-contain'); 
            img.src = e.target.result;
            
            uploadedFileContainer.append(img);
            };

            reader.readAsDataURL(files[0]);
        }
    }
</script>