@foreach ($applied_applicants as $applied_applicant)
<div class="p-2 pl-4 hover:bg-gray-100">
    <a href="">
        <span><strong>{{$applied_applicant->email}}</strong> applied to your job post</span>
        <p class="max-w-[400px] whitespace-nowrap overflow-hidden text-ellipsis">"{{$applied_applicant->answer_1}}"</p>
        <p>Job Post: <strong>{{$applied_applicant->job_title}}</strong></p>
        <div class="w-full">
            <span class="text-cyan-600 text-sm ">10m ago</span>
        </div>
    </a>
</div>
@endforeach
