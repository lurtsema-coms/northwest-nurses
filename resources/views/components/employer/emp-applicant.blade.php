<div class="absolute top-0 flex items-center h-16 text-xl left-16">
    {{ $module_title }}
</div>
<div class="relative h-auto max-w-5xl px-5 mx-auto bg-white border shadow-sm text-slate-600 py-7 sm:px-10 rounded-2xl">
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
    {{-- View Resume --}}
    <div class="fixed inset-0 z-10 hidden w-full h-screen p-4 overflow-y-auto bg-black bg-opacity-75 modal-center show-resume">
        <div class="w-full max-w-4xl m-auto bg-white rounded-lg shadow-lg modal-box animate-fade-in">
            <div class="flex flex-col p-3 modal-content">
                <div class="">
                    <embed src="" id="pdfShow" width="100%" height="700px"></embed>
                </div>
                <div class="flex flex-row justify-center gap-10 p-2 ">
                    <button type="button" class="px-4 py-2 font-semibold text-white bg-cyan-800 btn-close-resume">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-5 font-medium text-center">
        <p>Job Title: <span class="">{{ $job_posts->job_title }}</span></p>
        <p>Job ID: <span class="">{{ $job_posts->job_id }}</span></p>
    </div>
    <div class="mb-3 font-medium">
        Applicants
    </div>
    <div class="space-y-7">
        @if (count($applicants) > 0)
            @for ($i=0; $i<count($applicants); $i++)
            <form action="{{ route('employer.job.edit-applicant', $applicants[$i]->id) }}" method="POST" id="edit-form">
                @csrf
                <input type="hidden" name="action-btn">
                <div class="relative p-[1px] bg-gray-300 rounded-lg hover:shadow-lg">
                    <div class="p-5 bg-white rounded-lg sm:p-8">
                        <p class="mb-3 font-bold text-green-500 timeago text-md" datetime="{{ $applicants[$i]->created_at }} {{ config('app.timezone') }}" ></p>
                        <div class="space-y-1">
                            <div class="flex flex-wrap">
                                <div class="flex-1 basis-52"><span class="font-medium text-slate-600">Name: </span><span class="">{{ $applicant_information[$i]->first_name." ".$applicant_information[$i]->last_name }}</span></div>
                                <div class="flex-1 basis-52"><span class="font-medium text-slate-600">Birthday: </span><span class="">{{ \DateTime::createFromFormat('Y-m-d', $applicant_information[$i]->birthdate)->format('M j, Y') }}</span></div>
                            </div> 
                            <div class="flex flex-wrap">
                                <div class="flex-1 basis-52"><span class="font-medium text-slate-600">Contact: </span><span class="">{{ $applicant_information[$i]->contact_number }}</span></div>
                                <div class="flex-1 basis-52"><span class="font-medium text-slate-600">Sex: </span><span class="capitalize">{{ $applicant_information[$i]->sex }}</span></div>
                            </div>
                            <div class="flex flex-wrap">
                                <div class="flex-1 basis-52"><span class="font-medium text-slate-600">Email: </span><span class="">{{ $applicant_information[$i]->email }}</span></div>
                            </div>
                        </div>
                        <div class="mt-5 space-y-3">
                            <div>
                                <p class="font-medium text-slate-600">Question 1</p>
                                <p class="text-slate-500">{{ $job_posts->question_1 }}</p>
                                <p>Answer: {{ $applicants[$i]->answer_1 }}</p>
                            </div>
                            @if ($job_posts->question_2)                              
                            <div>
                                <p class="font-medium text-slate-600">Question 2</p>
                                <p class="text-slate-500">{{ $job_posts->question_2 }}</p>
                                <p>Answer: {{ $applicants[$i]->answer_2 }}</p>
                            </div>
                            @endif
                            @if ($job_posts->question_3)
                            <div>
                                <p class="font-medium text-slate-600">Question 3</p>
                                <p class="text-slate-500">{{ $job_posts->question_3 }}</p>
                                <p>Answer: {{ $applicants[$i]->answer_3 }}</p>
                            </div>
                            @endif
                            <div x-data="{ showModal: false, currentAttachment: '' }" x-init="console.log(showModal)">
                                <p class="font-medium text-slate-600">Attachments:</p>
                                @if ($job_posts->getApplicantsPost[$i]->jobApplicationAttachments->first())                                    
                                    @php
                                        $resume = $job_posts->getApplicantsPost[$i]->jobApplicationAttachments->first()->resume->file_path;
                                    @endphp
                                    <p>Resume: <a data-file-path="{{ $resume }}" href="#" class="text-blue-600 cursor-pointer view-resume hover:underline">View Resume</a></p>
                                @endif
                                {{-- @if ($job_posts->getApplicantsPost[$i]->jobApplicationAttachments->isNotEmpty())
                                    @php
                                        $attachment = explode(',', $job_posts->getApplicantsPost[$i]->jobApplicationAttachments->first()->file_paths);
                                    @endphp
                                    @if ($job_posts->requiredAttachment)
                                        @foreach (explode(',', $job_posts->requiredAttachment->label) as $index => $ra)
                                            <p>{{ $ra }}:
                                                <a href="{{ $attachment[$index] }}" download="{{ basename($attachment[$index]) }}" class="text-blue-600 hover:underline">
                                                    Download Attached File
                                                </a>
                                            </p>
                                        @endforeach
                                    @endif
                                @else
                                    <p>No attachments available.</p>
                                @endif --}}
                                @if ($job_posts->getApplicantsPost[$i]->jobApplicationAttachments->isNotEmpty())
                                    @php
                                        $attachment = explode(',', $job_posts->getApplicantsPost[$i]->jobApplicationAttachments->first()->file_paths);
                                    @endphp
                                    @if ($job_posts->requiredAttachment)
                                        @foreach (explode(',', $job_posts->requiredAttachment->label) as $index => $ra)
                                            <p>{{ $ra }}:
                                                <a href="#" @click.prevent="showModal = true; currentAttachment = '{{ $attachment[$index] }}'" class="text-blue-600 hover:underline">
                                                    View Attachment
                                                </a>
                                            </p>
                                        @endforeach
                                    @endif
                                @else
                                    <p>No attachments available.</p>
                                @endif

                                <!-- Modal -->
                                <div class="fixed inset-0 z-20 overflow-y-auto bg-black bg-opacity-50" x-show="showModal">
                                    <div class="flex items-center justify-center min-h-screen py-10">
                                        <button type="button" class="absolute top-10 right-10" @click="showModal = false">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-red-500 hover:text-red-600 size-10">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                        <template x-if="currentAttachment.endsWith('.pdf')">
                                        <div class="w-full max-w-6xl p-10 m-auto shadow-lg rounded-2xl bg-blue-50">
                                            <embed x-bind:src="currentAttachment" width="100%" height="700px"></embed>
                                        </div>
                                        </template>
                                        <template x-if="!currentAttachment.endsWith('.pdf')">
                                        <div class="max-w-6xl p-10 m-auto shadow-lg rounded-2xl bg-blue-50">
                                            <img x-bind:src="currentAttachment" class="object-contain w-full max-h-[700px]"/>
                                            <a x-bind:href="currentAttachment" x-bind:download="currentAttachment" class="text-blue-600 hover:underline">
                                                Download Image
                                            </a>
                                        </div>
                                        </template>
                                    </div>
                                </div>
                            </div>
                            <p class="!mt-10 text-center font-bold {{ $applicants[$i]->status == 'FOR REVIEW' ? 'text-yellow-500' : '' }} {{ $applicants[$i]->status == 'REJECTED' || $applicants[$i]->status == 'REMOVED' ? 'text-red-500' : '' }}  {{ $applicants[$i]->status == 'APPROVED' ? 'text-green-500' : '' }}">
                                STATUS: {{ $applicants[$i]->status }}
                            </p>
                            @if ($applicants[$i]->status != 'REJECTED' && $applicants[$i]->status != 'APPROVED' && $applicants[$i]->status != 'REMOVED')
                            <div class="!mt-5 flex gap-2 flex-wrap sm:justify-center ">
                                @if ($applicants[$i]->status != 'FOR REVIEW')                         
                                <button class="px-4 py-2 bg-yellow-500 rounded-md shadow-md cursor-pointer text-gray-50 hover:bg-yellow-600">For Review</button>
                                @endif
                                <button class="px-4 py-2 bg-red-500 rounded-md shadow-md cursor-pointer text-gray-50 hover:bg-red-600">Reject</button>
                                <button class="px-4 py-2 bg-green-500 rounded-md shadow-md cursor-pointer text-gray-50 hover:bg-green-600">Hire</button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
            @endfor
            
            @else
            <p class="font-medium text-center text-slate-500">No applicants have applied yet..</p>
        @endif
    </div>
</div>

@include('components.dialog', ['title' => 'Are You Sure?', 'text_content' => 'This action will submit the form', 'class' => 'modal-warning', 'icon' => 'warning', 'isHxSwap' => false])

<script>
    $(document).ready(function() {
        const timeagoNodes = document.querySelectorAll('.timeago');
        if (timeagoNodes.length) {
            timeago.render(timeagoNodes);
        }

        $('#edit-form').on('submit', function(event){
            event.preventDefault();
            const form = $(this);

            const buttonClicked = form.find('button:focus');
            let buttonText = buttonClicked.text();
            if(buttonText == 'For Review'){
                buttonText = 'FOR REVIEW'
            }else if(buttonText == 'Reject'){
                buttonText = 'REJECTED'
            }else{
                buttonText = 'APPROVED'
            }

            form.find('input[name="action-btn"]').val(buttonText);

            if (buttonText.trim() !== '') { // Check if buttonText is not empty
                $('.modal-warning').removeClass('hidden');
                $('#modal-submit').focus();
                
                $('#modal-cancel').on('click', function(){
                    $('.modal-warning').addClass('hidden');
                });

                $('#modal-submit').on('click', function(){
                    $(this).attr('disabled', true);
                    form.off('submit').submit();
                });
            }
        });

        $('.view-resume').on('click', function(){
            const resumePath = $(this).data('file-path');
            const route = `{{ route('showResume') }}?file_path=${resumePath}`;
            $('#pdfShow').attr('src', route);
            console.log(resumePath);
            $('.show-resume').show();
        });

        $('.btn-close-resume').on('click', function(){
            $('.show-resume').hide();
            $('#pdfShow').attr('src', '');
        });
    });
</script>
