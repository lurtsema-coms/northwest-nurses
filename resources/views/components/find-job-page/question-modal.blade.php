<form 
    id="job-application-form" 
    method="POST" 
    action="{{ route('applicant.apply-job', $jobPost->id) }}" 
    hx-target="#job-info-section"
    hx-post="{{ route('applicant.apply-job', $jobPost->id) }}"
    hx-disabled-elt="textarea, button"
    hx-indicator="#question-modal-apply-btn .htmx-indicator"
    enctype="multipart/form-data"
>
    @csrf
    <div class="w-full max-w-3xl px-3 py-5 m-auto bg-white rounded-lg shadow-lg modal-box animate-fade-in">
        <div class="flex flex-col p-3 modal-content">
            <div class="mb-4">
                <h1 class="mb-2 text-xl font-bold text-center">Want to apply to this job?</h1>
                <p class="p-2 text-center">The employer wants to know more about you.</p>
                <p class="p-2 italic text-center text-gray-400">Please answer the questions with honesty to the best of your knowledge and belief.</p>
            </div>
            <div class="flex flex-col gap-10">
            @if ($jobPost->question_1)
                <div class="space-y-3">
                    <label for="answer_1">{{ $jobPost->question_1 }}</label>
                    <textarea name="answer_1" id="answer_1" class="block w-full px-4 py-3 border-gray-200 rounded-lg focus:border-primary focus:ring-primary disabled:opacity-50 disabled:pointer-events-none" rows="3" placeholder="Answer..." required></textarea>
                </div>
            @endif
            @if ($jobPost->question_2)
                <div class="space-y-3">
                    <label for="answer_2">{{ $jobPost->question_2 }}</label>
                    <textarea name="answer_2" id="answer_2" class="block w-full px-4 py-3 border-gray-200 rounded-lg focus:border-primary focus:ring-primary disabled:opacity-50 disabled:pointer-events-none" rows="3" placeholder="Answer..." required></textarea>
                </div>
            @endif
            @if ($jobPost->question_3)
                <div class="space-y-3">
                    <label for="answer_3">{{ $jobPost->question_3 }}</label>
                    <textarea name="answer_3" id="answer_3" class="block w-full px-4 py-3 border-gray-200 rounded-lg focus:border-primary focus:ring-primary disabled:opacity-50 disabled:pointer-events-none" rows="3" placeholder="Answer..." required></textarea>
                </div>
            @endif
            <div class="space-y-4 max-w-96">
                <p class="font-bold" for="">File Attachment</p>
                <div class="space-y-2">
                    <label for="">Resume</label>
                    <select class="w-full px-2 border border-gray-200 rounded-lg" name="resume_id" id="selected-resume">
                        @foreach ($my_resumes as $resume)
                            @php
                                $item = explode('/', $resume->file_path);
                                $resume_name = $item[count($item) - 1];
                            @endphp
                            <option value="{{ $resume->id }}" {{ $resume->default ? 'selected' : '' }}>
                                {{ $resume_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center w-full gap-4 px-6 bg-gray-100 border rounded-lg min-h-24">
                    <svg class="w-8 h-8 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M64 464l48 0 0 48-48 0c-35.3 0-64-28.7-64-64L0 64C0 28.7 28.7 0 64 0L229.5 0c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3L384 304l-48 0 0-144-80 0c-17.7 0-32-14.3-32-32l0-80L64 48c-8.8 0-16 7.2-16 16l0 384c0 8.8 7.2 16 16 16zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z"/>
                    </svg>
                    <div>
                        <p id="resume-title">Resume Title</p>
                        <p id="resume-created-at">Date Uploaded</p>
                    </div>
                </div>
                @if (!empty($jobPost->requiredAttachment))   
                    @foreach (explode(',', $jobPost->requiredAttachment->label) as $ra)    
                        @php
                            $normalizedRa = strtolower(str_replace(' ', '_', $ra));
                        @endphp             
                        <div class="space-y-2">
                            <label for="">{{ ucwords($ra) }}</label>
                            <input class="w-full p-1 bg-white border rounded-lg disabled:pointer-events-none" name="attachments[{{ $normalizedRa }}]" type="file" required>
                        </div>
                        @endforeach          
                    @endif
                </div>
            </div>
            <div class="flex flex-row justify-center gap-10 p-2 mt-5">
                <button class="hover:opacity-75 cancel-btn" type="button" onclick="$('#modal-center').addClass('hidden'); $('body').removeClass('overflow-hidden').addClass('overflow-auto')">Cancel</button>
                <button id="question-modal-apply-btn" class="px-5 py-2 font-semibold text-white rounded-full hover:opacity-75 submit-applicant-btn bg-cyan-800" type="submit" onclick="$('body').removeClass('overflow-hidden').addClass('overflow-auto')">
                    Apply
                    <svg class="w-5 h-5 text-white animate-spin htmx-indicator" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                </button>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        // Parse the JSON data and assign it to the variable
        var data_resume = {!! json_encode($my_resumes) !!};

        // Get the selected id from the dropdown
        var id = $('#selected-resume').val();

        $('#selected-resume').on('change', function() {
            getResume($(this).val());
        });

        getResume(id);

        function getResume(id) {
            // Find the resume by id
            let resume = data_resume.find((item) => item.id == id);

            // Check if the resume exists before proceeding
            if (resume) {
                let title = resume.file_path.split('/').pop();
                $('#resume-title').text(title);
                $('#resume-created-at').text(new Date(resume.created_at).toLocaleDateString());
            } else {
                // Handle case where resume is not found, if needed
                $('#resume-title').text('No resume found');
                $('#resume-created-at').text('');
            }
        }
    });
</script>

