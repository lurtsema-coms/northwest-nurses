<div class="fixed overflow-hidden top-0 left-0 min-h-screen min-w-screen inset-0 bg-black bg-opacity-20 transition-all" id="applicant-content" x-data="{ isOpen: true }" x-show="isOpen" x-transition>
    <div class="text-slate-700 p-7">
        <div class="m-auto w-full h-full max-w-4xl bg-white relative shadow-xl rounded-lg py-7 px-5" @click.outside="isOpen = false">
            <div class="max-h-[40rem] overflow-auto px-5">
                <div class="mb-5 font-bold">
                    <p>Job Title: <span class="text-slate-500">{{ $job_posts->job_title }}</span></p>
                    <p>Job ID: <span class="text-slate-500">{{ $job_posts->job_id }}</span></p>
                </div>
                <div class="mb-3 font-medium">
                    Applicants
                </div>
                <div class="space-y-7">
                    @for ($i=0; $i<count($applicants); $i++)
                    <div class="relative p-[1px] bg-gradient-to-r from-blue-300 via-cyan-500 to-teal-500 rounded-lg hover:shadow-lg">
                        <div class="bg-white rounded-lg py-3 px-5 text-sm space-y-3">
                            <p class="text-md font-medium">{{ $applicants[$i]->created_at }}</p>
                            <div>
                                <div class="flex flex-wrap">
                                    <div class="flex-1 basis-52"><span class="text-slate-600 font-medium">Name: </span><span class="">{{ $applicant_information[$i]->first_name." ".$applicant_information[$i]->last_name }}</span></div>
                                    <div class="flex-1 basis-52"><span class="text-slate-600 font-medium">Birthday: </span><span class="">{{ \DateTime::createFromFormat('Y-m-d', $applicant_information[$i]->birthdate)->format('M j, Y') }}</span></div>
                                </div> 
                                <div class="flex flex-wrap">
                                    <div class="flex-1 basis-52"><span class="text-slate-600 font-medium">Contact: </span><span class="">{{ $applicant_information[$i]->contact_number }}</span></div>
                                    <div class="flex-1 basis-52"><span class="text-slate-600 font-medium">Sex: </span><span class="capitalize">{{ $applicant_information[$i]->sex }}</span></div>
                                </div>
                            </div>
                            <div>
                                <p class="text-slate-600 font-medium">Question 1</p>
                                <p class="text-slate-500">{{ $job_posts->question_1 }}</p>
                                <p>Answer: {{ $applicants[$i]->answer_1 }}</p>
                            </div>
                            <div>
                                <p class="text-slate-600 font-medium">Question 2</p>
                                <p class="text-slate-500">{{ $job_posts->question_2 }}</p>
                                <p>Answer: {{ $applicants[$i]->answer_2 }}</p>
                            </div>
                            <div>
                                <p class="text-slate-600 font-medium">Question 3</p>
                                <p class="text-slate-500">{{ $job_posts->question_3 }}</p>
                                <p>Answer: {{ $applicants[$i]->answer_3 }}</p>
                            </div>
                            <div class="flex justify-end">
                                <button class="bg-red-400 text-gray-50 px-4 py-2 rounded-md hover:bg-red-500 mr-2 cursor-pointer">Reject</button>
                                <button class="bg-green-500 text-gray-50 px-4 py-2 rounded-md shadow-md hover:bg-green-600 cursor-pointer">Hire</button>
                            </div>
                        </div>
                    </div>
                    @endfor
                    <div>
                        <button class="text-sm text-slate-600 h-10 px-5 rounded-md shadow-sm border bg-white hover:bg-gray-50" id="btn-close" @click="isOpen = false;">
                            Back
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // $(document).ready(function(){
    //     $('#btn-close').on('click', function(){
    //         $('#applicant-content').addClass('hidden');
    //     })
    // })
</script>