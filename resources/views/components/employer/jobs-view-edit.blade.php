<div class="absolute top-0 flex items-center h-16 text-xl left-16">
    {{ $module_title }}
</div>
<div class="h-[50rem] mx-auto max-w-5xl relative bg-white py-7 shadow-sm border rounded-2xl">
    <div class="h-full px-5 overflow-auto sm:px-10"">
        <div class="absolute left-0 flex font-medium text-sky-600 -top-9">
            <span class="flex items-center space-x-2 cursor-pointer hover:opacity-70"
                hx-get="{{ route('employer.job') }}" hx-target="#target-content" hx-push-url="true" hx-on::after-request="$('input').val()"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span>Back to Jobs</span>
            </span>
        </div>
        <form id="job-edit-form" action="{{ route('employer.job.edit-jobs', $id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="w-full">
                <div class="mb-3 font-medium text-slate-600">Upload Image</div>
                
                <div class="relative flex items-center justify-center w-full overflow-hidden">
                    <label for="dropzone-file" id="dropzone-parent" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 draggable="true">
                        <input id="dropzone-file" type="file" class="absolute -z-10" accept="image/*" name="img_link">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6" id="img-content">
                            @if($job_post->img_link)
                            <img class="object-contain w-full h-52 max-w-80" src="{{ $job_post->img_link }}?v={{ time() }}" alt="">
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
                        @error('job_title')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="font-medium">
                    Job Details
                </div>
                <div class="flex flex-wrap gap-5">
                    <div class="flex flex-col flex-1 space-y-2">
                        <span class="font-medium">Profession</span>
                        <input class="h-10 px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="text" name="profession" value="{{ $job_post->profession }}" required>
                        @error('profession')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex flex-col flex-1 space-y-2">
                        <span class="font-medium">Pay</span>
                        <input class="h-10 px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="text" name="pay" value="{{ $job_post->pay }}" required>
                        @error('pay')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex flex-col flex-1 space-y-2">
                        <span class="font-medium">Assignment Length</span>
                        <input class="h-10 px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="text" name="assignment_length" value="{{ $job_post->assignment_length }}" required>
                        @error('assignment_length')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-wrap gap-5">
                    <div class="flex flex-col flex-1 space-y-2">
                        <span class="font-medium">Schedule</span>
                        <input class="h-10 px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="text" name="schedule" value="{{ $job_post->schedule }}" required>
                        @error('schedule')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex flex-col flex-1 space-y-2">
                        <span class="font-medium">Openings</span>
                        <input class="h-10 px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="number" name="openings" value="{{ $job_post->openings }}" required>
                        @error('openings')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex flex-col flex-1 space-y-2">
                        <span class="font-medium">Start Date</span>
                        <input class="h-10 px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="date" name="start_date" value="{{ $job_post->start_date }}" required>
                        @error('start_date')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-wrap gap-5">
                    <div class="flex flex-col flex-1 space-y-2">
                        <span class="font-medium">Experience</span>
                        <input class="h-10 px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="text" name="experience" value="{{ $job_post->experience }}" required>
                        @error('experience')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex flex-col flex-1 space-y-2">
                        <span class="font-medium">Address</span>
                        <input class="h-10 px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="text" name="address" value="{{ $job_post->address }}" required>
                        @error('address')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-wrap gap-5">
                    <div class="flex flex-col flex-1 space-y-2">
                        <span class="font-medium">Question 1</span>
                        <input class="h-10 px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="text" name="question_1" value="{{ $job_post->question_1 }}" required>
                        @error('question_1')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
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
                        @error('job_description')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-wrap gap-5">
                    <div class="flex flex-col flex-1 space-y-2">
                        <span class="font-medium">Responsibilities</span>
                        <textarea class="px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" name="responsibilities" id="" rows="7" required>{{ $job_post->responsibilities }}</textarea>
                        @error('responsibilities')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-wrap gap-5">
                    <div class="flex flex-col flex-1 space-y-2">
                        <span class="font-medium">Requirements</span>
                        <textarea class="px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" name="requirements" id="" rows="7" required>{{ $job_post->requirements }}</textarea>
                        @error('requirements')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-wrap gap-5">
                    <div class="flex flex-col flex-1 space-y-2">
                        <span class="font-medium">Resume</span>
                        <div class="flex items-center w-full max-w-lg gap-4 p-10 rounded-lg min-h-24 bg-slate-300">
                            <svg class="w-8 h-8 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor" d="M64 464l48 0 0 48-48 0c-35.3 0-64-28.7-64-64L0 64C0 28.7 28.7 0 64 0L229.5 0c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3L384 304l-48 0 0-144-80 0c-17.7 0-32-14.3-32-32l0-80L64 48c-8.8 0-16 7.2-16 16l0 384c0 8.8 7.2 16 16 16zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z"/>
                            </svg>
                            <div>
                                <div class="inline-block p-1 bg-white rounded-lg">
                                    Default
                                </div>
                                <p>Resume Title</p>
                                <p>Date Uploaded</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap gap-5">
                    <div class="flex flex-col flex-1 space-y-2">
                        <span class="font-medium">Add Attachments <span class="text-red-400">(Optional)</span></span>
                        <div class="flex">                                
                            <button type="button" id="add-attachment">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </button>
                        </div>
                        <div class="flex flex-col gap-5 " id="attachment-input">
                            @if (!empty($job_post->requiredAttachment) && $job_post->requiredAttachment->label)
                                @foreach (explode(',', $job_post->requiredAttachment->label) as $ra)
                                <div class="mb-2 space-x-2 required-attachment-container tems-center aflex">                                
                                    <input class="w-full h-10 px-2 border border-gray-300 rounded-md max-w-80 focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="text" name="attachments[]" value="{{ $ra }}" required>
                                    <button class="px-2 py-1 ml-2 text-white bg-red-500 rounded-md delete-attachment" type="button">
                                        Delete
                                    </button>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="text-end">
                    <button class="h-10 px-4 text-white border rounded-md bg-cyan-600 hover:opacity-70" type="submit">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

@include('components.dialog', ['title' => 'Are You Sure?', 'text_content' => 'This action will submit the form', 'class' => 'modal-warning', 'icon' => 'warning', 'isHxSwap' => false])


<script>

    $(document).ready(function() {

        $('#job-edit-form').on('keydown', 'input', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
            }
        })

        if("{{ $hasAnyApplicantApplied > 0 }}"){
            $('#job-edit-form').find('input, textarea, button').attr('disabled', true);
            $('#job-edit-form').find('input:disabled, textarea:disabled, button:disabled').addClass('bg-slate-300 opacity-80');
        }

        $('#job-edit-form').on('submit', function(e){
            e.preventDefault();
            const form = this;

            $('.modal-warning').show();
            $('#modal-submit').focus();
            
            $('#modal-cancel').on('click', function(){
                $('.modal-warning').hide();
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

        $('#add-attachment').on('click', function() {
            // Create a new input element with the desired attributes
            const input = $('<input>').attr({
                type: 'text',
                name: 'attachments[]',
                required: true,
                placeholder: 'e.g., License ID or Attachments'
            }).addClass('w-full max-w-80 h-10 px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none');

            // Create a delete button
            const deleteButton = $('<button>').text('Delete').addClass('ml-2 px-2 py-1 bg-red-500 text-white rounded-md');

            const container = $('<div>').addClass('flex items-center space-x-2 mb-2').append(input).append(deleteButton);

            $('#attachment-input').append(container);

            deleteButton.on('click', function() {
                container.remove();
            });
        });

        $(document).on('click', '.delete-attachment', function() {
            $(this).closest('.required-attachment-container').remove();
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