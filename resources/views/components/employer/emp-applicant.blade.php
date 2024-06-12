<div class="h-auto mx-auto max-w-5xl relative text-slate-600 bg-white py-7 px-10 shadow-sm border rounded-2xl">
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
            <form action="{{ route('employer.job.edit-applicant', $applicants[$i]->id) }}" method="POST">
                @csrf
                <input type="hidden" name="action-btn">
                <div class="relative p-[1px] bg-gray-300 rounded-lg hover:shadow-lg">
                    <div class="bg-white rounded-lg p-5 sm:p-8">
                        <p class="timeago text-md text-green-500 font-bold mb-3" datetime="{{ $applicants[$i]->created_at }} {{ config('app.timezone') }}" ></p>
                        <div class="space-y-1">
                            <div class="flex flex-wrap">
                                <div class="flex-1 basis-52"><span class="text-slate-600 font-medium">Name: </span><span class="">{{ $applicant_information[$i]->first_name." ".$applicant_information[$i]->last_name }}</span></div>
                                <div class="flex-1 basis-52"><span class="text-slate-600 font-medium">Birthday: </span><span class="">{{ \DateTime::createFromFormat('Y-m-d', $applicant_information[$i]->birthdate)->format('M j, Y') }}</span></div>
                            </div> 
                            <div class="flex flex-wrap">
                                <div class="flex-1 basis-52"><span class="text-slate-600 font-medium">Contact: </span><span class="">{{ $applicant_information[$i]->contact_number }}</span></div>
                                <div class="flex-1 basis-52"><span class="text-slate-600 font-medium">Sex: </span><span class="capitalize">{{ $applicant_information[$i]->sex }}</span></div>
                            </div>
                            <div class="flex flex-wrap">
                                <div class="flex-1 basis-52"><span class="text-slate-600 font-medium">Email: </span><span class="">{{ $applicant_information[$i]->email }}</span></div>
                            </div>
                        </div>
                        <div class="mt-5 space-y-3">
                            <div>
                                <p class="text-slate-600 font-medium">Question 1</p>
                                <p class="text-slate-500">{{ $job_posts->question_1 }}</p>
                                <p>Answer: {{ $applicants[$i]->answer_1 }}</p>
                            </div>
                            @if ($job_posts->question_2)                              
                            <div>
                                <p class="text-slate-600 font-medium">Question 2</p>
                                <p class="text-slate-500">{{ $job_posts->question_2 }}</p>
                                <p>Answer: {{ $applicants[$i]->answer_2 }}</p>
                            </div>
                            @endif
                            @if ($job_posts->question_3)
                            <div>
                                <p class="text-slate-600 font-medium">Question 3</p>
                                <p class="text-slate-500">{{ $job_posts->question_3 }}</p>
                                <p>Answer: {{ $applicants[$i]->answer_3 }}</p>
                            </div>
                            @endif
                            <p class="!mt-10 text-center font-bold {{ $applicants[$i]->status == 'FOR REVIEW' ? 'text-yellow-500' : '' }} {{ $applicants[$i]->status == 'REJECTED' ? 'text-red-500' : '' }} {{ $applicants[$i]->status == 'APPROVED' ? 'text-green-500' : '' }}">
                                STATUS: {{ $applicants[$i]->status }}
                            </p>
                            @if ($applicants[$i]->status != 'REJECTED' && $applicants[$i]->status != 'APPROVED')
                            <div class="!mt-5 flex gap-2 flex-wrap sm:justify-center ">
                                @if ($applicants[$i]->status != 'FOR REVIEW')                         
                                <button class="bg-yellow-500 text-gray-50 px-4 py-2 rounded-md shadow-md hover:bg-yellow-600 cursor-pointer">For Review</button>
                                @endif
                                <button class="bg-red-500 text-gray-50 px-4 py-2 rounded-md shadow-md hover:bg-red-600 cursor-pointer">Reject</button>
                                <button class="bg-green-500 text-gray-50 px-4 py-2 rounded-md shadow-md hover:bg-green-600 cursor-pointer">Hire</button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
            @endfor
            
            @else
            <p class="text-center text-slate-500 font-medium">No applicants have applied yet..</p>
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

        $('form').on('submit', function(event){
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
    });
</script>
