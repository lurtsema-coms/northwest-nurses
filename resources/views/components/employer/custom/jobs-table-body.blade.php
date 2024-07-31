<div class="mx-auto overflow-hidden overflow-x-auto rounded-md shadow-sm"w>
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Status</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Job Title</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Address</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Profession</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Openings</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Applied</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Start Date</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Pay</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($jobs as $job)
            <tr >
                <td class="px-6 py-4 text-sm font-medium text-green-500 whitespace-nowrap">{{$job->status}}</td>
                <td class="px-6 py-4 text-sm whitespace-nowrap">{{$job->job_title}}</td>
                <td class="px-6 py-4 text-sm whitespace-nowrap">{{ \Illuminate\Support\Str::limit($job->address, 25, '...') }}</td>
                <td class="px-6 py-4 text-sm whitespace-nowrap">{{$job->profession}}</td>
                <td class="px-6 py-4 text-sm whitespace-nowrap">{{$job->openings}}</td>
                <td class="px-6 py-4 text-sm whitespace-nowrap">{{$job->get_applicants_post_count}}</td>
                <td class="px-6 py-4 text-sm whitespace-nowrap">{{$job->start_date}}</td>
                <td class="px-6 py-4 text-sm whitespace-nowrap">{{$job->pay}}</td>
                <td class="px-6 py-4 text-sm whitespace-nowrap">
                    <div class="flex gap-2">
                        <button class="px-3 py-1 bg-green-500 rounded-md shadow-md text-gray-50 hover:bg-green-400"
                            hx-trigger="click" hx-get="{{ route('employer.job.edit', $job->id) }}" hx-target="#target-content" hx-push-url="true">
                            Edit
                        </button>
                        <button class="px-3 py-1 rounded-md shadow-md bg-sky-500 text-gray-50 hover:bg-sky-400" 
                            hx-trigger="click" hx-get="{{ route('employer.job.view', $job->id) }}" hx-target="#target-content" hx-push-url="true">
                            View
                        </button>
                        <button class="px-3 py-1 bg-yellow-500 rounded-md shadow-md text-gray-50 hover:bg-yellow-400"
                            hx-trigger="click" hx-get="{{ route('employer.job.applicants', $job->id) }}" hx-target="#target-content" hx-push-url="true" htmx-indicator="{{ 'spinner'.'-'.$job->id }}">
                            Applicants
                            <svg class="w-5 h-5 text-white animate-spin htmx-indicator" id="{{ 'spinner'.'-'.$job->id }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </button>
                        <button class="px-3 py-1 bg-red-500 rounded-md shadow-md text-gray-50 hover:bg-red-400 delete-btn" data-entry-id="{{ $job->id }}" data-href="{{ route('employer.job.delete-job', $job->id ) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="mt-5">
{{ $jobs->appends(request()->query())->links('vendor.pagination.custom-pagination-backend') }}
</div>

@php
    $firstItem = $jobs->firstItem();
    $lastItem = $jobs->lastItem();
    $total = $jobs->total();
    $page = (integer) request('page')
@endphp

@if (($jobs->count() < $paginate) && $page < 2 )
    <p class="mt-2 text-sm text-gray-700">
        Showing {{ $firstItem ?? 0 }} to {{ $lastItem ?? 0 }} of {{ $total }} results
    </p>
@endif

<script>
    $(document).ready(function() {
        $('.delete-btn').click(function(e) {
            e.preventDefault();
            const entryId = $(this).data('entry-id');
            const url = $(this).attr('href');
            let editUrl = "{{ route('employer.job.delete-job', 'entryId') }}";
            const newUrl = editUrl.replace('entryId', entryId);

            $('.modal-warning').removeClass('hidden');
            $('#modal-submit').focus();
            
            $('#modal-cancel').on('click', function(){
                $('.modal-warning').addClass('hidden');
            })
            
            $('#modal-submit').on('click', function(){
                $.ajax({
                        url: newUrl,   
                        dataType: 'json',
                        type: 'GET',
                        success: function(response) {
                            if (response.success) {
                                location.reload();
                            }
                        },
                        error: function(xhr, status, error) {
                            // Handle errors here
                            console.log('AJAX request failed:', error);
                        }
                    });
            })
        });
    })
</script>