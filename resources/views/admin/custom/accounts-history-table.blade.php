@php
    use Carbon\Carbon;
@endphp

@foreach ($job_applications as $job_application)
<div class="mt-4">
    <!-- Job Title -->
    <p class="font-medium">{{ $job_application->details->job_title }}</p>
    
    <!-- Status History -->
    <ul class="pl-10 mt-2 space-y-2 list-disc">
        @php
            $status_history = json_decode($job_application->status_history, true); // Decode JSON string into an array
        @endphp
        @if (!empty($status_history))
            @foreach ($status_history as $status)
                <li class="text-sm text-gray-600">
                    <strong>{{ $status[key($status)] }}</strong>: {{ Carbon::parse(key($status))->format('D, F j, Y') }}
                </li>
            @endforeach
        @else
            <li class="text-sm text-gray-600">No status history available.</li>
        @endif
    </ul>
</div>
@endforeach

<div class="mt-5">
    {{ $job_applications->appends(request()->query())->links('vendor.pagination.custom-pagination-backend') }}
</div>