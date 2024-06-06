<div class="mx-auto overflow-x-auto overflow-hidden rounded-md shadow-sm">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Job Title</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Address</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Profession</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Openings</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Start Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pay</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($jobs as $job)
            <tr >
                <td class="px-6 py-4 text-sm whitespace-nowrap font-medium text-green-500">{{$job->status}}</td>
                <td class="px-6 py-4 text-sm whitespace-nowrap">{{$job->job_title}}</td>
                <td class="px-6 py-4 text-sm whitespace-nowrap">{{$job->address}}</td>
                <td class="px-6 py-4 text-sm whitespace-nowrap">{{$job->profession}}</td>
                <td class="px-6 py-4 text-sm whitespace-nowrap">{{$job->openings}}</td>
                <td class="px-6 py-4 text-sm whitespace-nowrap">{{$job->start_date}}</td>
                <td class="px-6 py-4 text-sm whitespace-nowrap">{{$job->pay}}</td>
                <td class="px-6 py-4 text-sm whitespace-nowrap">
                    <div class="flex gap-2">
                        <button class="bg-green-500 text-gray-50 px-3 py-1 rounded-md shadow-md hover:bg-green-400"
                            hx-trigger="click" hx-get="{{ route('employer.job.edit', $job->id) }}" hx-target="#target-content" hx-push-url="true">
                            Edit
                        </button>
                        <button class="bg-sky-500 text-gray-50 px-3 py-1 rounded-md shadow-md hover:bg-sky-400" 
                            hx-trigger="click" hx-get="{{ route('employer.job.view', $job->id) }}" hx-target="#target-content" hx-push-url="true">
                        View
                        </button>
                        <button class="bg-yellow-500 text-gray-50 px-3 py-1 rounded-md shadow-md hover:bg-yellow-400 delete-btn" data-entry-id="{{ $job->id }}" data-href="{{ route('employer.job.delete-job', $job->id ) }}">Applicants</button>
                        <button class="bg-red-500 text-gray-50 px-3 py-1 rounded-md shadow-md hover:bg-red-400 delete-btn" data-entry-id="{{ $job->id }}" data-href="{{ route('employer.job.delete-job', $job->id ) }}">
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
    {{  $jobs->links()}}
</div>

<script>
    $(document).ready(function() {

        $('.delete-btn').click(function(e) {
            e.preventDefault();
            const entryId = $(this).data('entry-id');
            console.log(entryId);
            const url = $(this).attr('href');
            let editUrl = "{{ route('employer.job.delete-job', 'entryId') }}";
            const newUrl = editUrl.replace('entryId', entryId);
            console.log(newUrl);

            $('#modal-warning').show();
            $('#modal-submit').focus();
            
            $('#modal-cancel').on('click', function(){
                $('#modal-warning').hide();
            })
            
            $('#modal-submit').on('click', function(){
                $.ajax({
                        url: newUrl,   
                        dataType: 'json',
                        type: 'GET',
                        success: function(response) {
                            // Reload the browser
                            location.reload();
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