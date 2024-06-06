<div class="h-auto min-h-96 mx-auto max-w-5xl relative bg-white py-7 px-10 shadow-sm border rounded-2xl">
    <div class="font-medium text-sky-600 flex absolute -top-9 left-0">
        <span class="flex items-center space-x-2 hover:opacity-70 cursor-pointer"
            hx-get="{{ route('employer.job') }}" hx-target="#target-content" hx-push-url="true" hx-on::after-request="$('input').val()"
        >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <span>Back to Jobs</span>
        </span>
    </div>
    <form id="add-form" action="{{ route('employer.job.edit-jobs', $id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="w-full">
            <div class="font-medium text-slate-600 mb-3">Upload Image</div>
            
            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file" id="dropzone-parent" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 draggable="true">
                    <input id="dropzone-file" type="file" class="absolute -z-10" name="img_link">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6" id="img-content">
                        @if($job_post->img_link)
                        <img class="h-52 w-full max-w-80 object-contain" src="{{ $job_post->img_link }}?v={{ time() }}" alt="">
                        @else
                        <svg class="w-8 h-8 mb-4 text-gray-500 aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <p class="mb-2 text-gray-500><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500">SVG, PNG, and JPG (MAX. 600x400)</p>
                        @endif
                    </label>
                </div>
            </div> 
        </div>
        <div class="mt-10 space-y-5 text-slate-500">
            <div class="flex flex-wrap gap-5">
                <div class="flex flex-col w-full max-w-[28.9rem] space-y-2">
                    <span class="font-medium">Job Title</span>
                    <input class="h-10 px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="text" name="job_title" value="{{ $job_post->job_title }}" required>
                </div>
            </div>
            <div class="font-medium">
                Job Details
            </div>
            <div class="flex flex-wrap gap-5">
                <div class="flex flex-col flex-1 space-y-2">
                    <span class="font-medium">Profession</span>
                    <input class="h-10 px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="text" name="profession" value="{{ $job_post->profession }}" required>
                </div>
                <div class="flex flex-col flex-1 space-y-2">
                    <span class="font-medium">Pay</span>
                    <input class="h-10 px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="text" name="pay" value="{{ $job_post->pay }}" required>
                </div>
                <div class="flex flex-col flex-1 space-y-2">
                    <span class="font-medium">Assignment Length</span>
                    <input class="h-10 px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="text" name="assignment_length" value="{{ $job_post->assignment_length }}" required>
                </div>
            </div>
            <div class="flex flex-wrap gap-5">
                <div class="flex flex-col flex-1 space-y-2">
                    <span class="font-medium">Schedule</span>
                    <input class="h-10 px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="text" name="schedule" value="{{ $job_post->schedule }}" required>
                </div>
                <div class="flex flex-col flex-1 space-y-2">
                    <span class="font-medium">Openings</span>
                    <input class="h-10 px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="number" name="openings" value="{{ $job_post->openings }}" required>
                </div>
                <div class="flex flex-col flex-1 space-y-2">
                    <span class="font-medium">Start Date</span>
                    <input class="h-10 px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="date" name="start_date" value="{{ $job_post->start_date }}" required>
                </div>
            </div>
            <div class="flex flex-wrap gap-5">
                <div class="flex flex-col flex-1 space-y-2">
                    <span class="font-medium">Experience</span>
                    <input class="h-10 px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="text" name="experience" value="{{ $job_post->experience }}" required>
                </div>
                <div class="flex flex-col flex-1 space-y-2">
                    <span class="font-medium">Address</span>
                    <input class="h-10 px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="text" name="address" value="{{ $job_post->address }}" required>
                </div>
            </div>
            <div class="flex flex-wrap gap-5">
                <div class="flex flex-col flex-1 space-y-2">
                    <span class="font-medium">Question 1</span>
                    <input class="h-10 px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="text" name="question_1" value="{{ $job_post->question_1 }}" required>
                </div>
                <div class="flex flex-col flex-1 space-y-2">
                    <span class="font-medium">Question 2 (Optional)</span>
                    <input class="h-10 px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="text" name="question_2" value="{{ $job_post->question_2 }}">
                </div>
                <div class="flex flex-col flex-1 space-y-2">
                    <span class="font-medium">Question 3 (Optional)</span>
                    <input class="h-10 px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="text" name="question_3" value="{{ $job_post->question_3 }}">
                </div>
            </div>
            <div class="flex flex-wrap gap-5">
                <div class="flex flex-col flex-1 space-y-2">
                    <span class="font-medium">Job Description</span>
                    <textarea class="px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" name="job_description" id="" rows="7" required>{{ $job_post->job_description }}</textarea>
                </div>
            </div>
            <div class="flex flex-wrap gap-5">
                <div class="flex flex-col flex-1 space-y-2">
                    <span class="font-medium">Responsibilities</span>
                    <textarea class="px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" name="responsibilities" id="" rows="7" required>{{ $job_post->responsibilities }}</textarea>
                </div>
            </div>
            <div class="flex flex-wrap gap-5">
                <div class="flex flex-col flex-1 space-y-2">
                    <span class="font-medium">Requirements</span>
                    <textarea class="px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" name="requirements" id="" rows="7" required>{{ $job_post->requirements }}</textarea>
                </div>
            </div>
            <div class="text-end">
                <button class="bg-cyan-600 text-white border h-10 px-4 rounded-md hover:opacity-70" type="submit">Save</button>
            </div>
        </div>
    </form>
</div>

@include('components.dialog', ['title' => 'Are You Sure?', 'text_content' => 'This action will submit the form', 'id' => 'modal-warning', 'icon' => 'warning'])


<script>

    $(document).ready(function() {

        // $('input,textarea').attr('required', false);

        $('#add-form').on('submit', function(e){
            e.preventDefault();
            const form = this;

            $('#modal-warning').show();
            $('#modal-submit').focus();
            
            $('#modal-cancel').on('click', function(){
                $('#modal-warning').hide();
            })

            $('#modal-submit').on('click', function(){
                $(this).attr('disabled', true);
                form.submit();
            })
        })

        let dropzone = document.getElementById('dropzone-parent');
        
        dropzone.addEventListener('dragover', (event) => {
            event.preventDefault();
        });

        dropzone.addEventListener('drop', (event) => {
            event.preventDefault();

            let files = event.dataTransfer.files;
            // Update the file input's value
            $('#dropzone-file')[0].files = files;
            updateImgFile(files);
        });


        $(document).on('change', '#dropzone-file', function(event){
            let files = event.target.files;
            updateImgFile(files);

        });

        function updateImgFile(files){
            if (files && files[0]) {
                let reader = new FileReader();

                reader.onload = function(e) {
                    let uploadedFileContainer = $('#img-content');
                    uploadedFileContainer.empty();
                    
                    let img = document.createElement('img');
                    img.classList.add('h-52', 'w-full', 'max-w-80', 'object-contain'); 
                    img.src = e.target.result;
                    
                    uploadedFileContainer.append(img);
                };

                reader.readAsDataURL(files[0]);
            }
        }

    })
</script>