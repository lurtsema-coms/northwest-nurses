@foreach ($applied_applicants as $applied_applicant)
<div class="p-2 pl-4 hover:bg-gray-100">
    <div hx-trigger="click" hx-get="{{ route('employer.job.applicants', $applied_applicant->application_id) }}" hx-target="#target-content" hx-push-url="true">
        <span><strong>{{$applied_applicant->email}}</strong> applied to your job post</span>
        <p class="max-w-[400px] whitespace-nowrap overflow-hidden text-ellipsis">"{{$applied_applicant->answer_1}}"</p>
        <p>Job Post: <strong>{{$applied_applicant->job_title}}</strong></p>
        <div class="w-full">
            <span class="timeago text-cyan-600 text-sm " datetime="{{ $applied_applicant->applied_at }} {{ config('app.timezone') }}"></span>
        </div>
    </div>
</div>
@endforeach

<script>
    $(document).ready(function() {
        const timeagoNodes = document.querySelectorAll('.timeago');
        if (timeagoNodes.length) {
            timeago.render(timeagoNodes);
        }
    });
</script>