<div>
    <div class="mb-5 flex justify-between flex-wrap">
        <div class="space-x-3 flex items-center">
            <select class="h-10 outline-none border border-gray-200 rounded-md focus:border-slate-400 focus:ring-0 focus:outline-none" name="" id="">
                <option value="">5</option>
                <option value="">10</option>
                <option value="">25</option>
                <option value="">50</option>
                <option value="">100</option>
                <option value="">500</option>
                <option value="">1000</option>
            </select>
            <button hx-trigger="click" hx-get="{{ route('employer.job.add') }}" hx-target="#target-content" hx-push-url="true">  
                <div class="bg-cyan-600 text-white text-sm border h-10 flex items-center justify-center px-4 rounded-md hover:opacity-70">
                Add Job
                </div>
            </button>
        </div>
        <div class="">
            <input class="h-10 w-72 rounded-lg border border-gray-200 focus:border-slate-400 focus:ring-0 focus:outline-none placeholder:text-slate-400" type="text" placeholder="Search...">
        </div>
    </div>
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
                    <tr>
                        <td class="px-6 py-4 text-sm whitespace-nowrap font-medium text-green-500">{{$job->status}}</td>
                        <td class="px-6 py-4 text-sm whitespace-nowrap">{{$job->job_title}}</td>
                        <td class="px-6 py-4 text-sm whitespace-nowrap">{{$job->address}}</td>
                        <td class="px-6 py-4 text-sm whitespace-nowrap">{{$job->profession}}</td>
                        <td class="px-6 py-4 text-sm whitespace-nowrap">{{$job->openings}}</td>
                        <td class="px-6 py-4 text-sm whitespace-nowrap">{{$job->start_date}}</td>
                        <td class="px-6 py-4 text-sm whitespace-nowrap">{{$job->pay}}</td>
                        <td class="px-6 py-4 text-sm whitespace-nowrap space-x-2">
                            <button class="bg-green-500 text-gray-50 px-3 py-1 rounded-md shadow-md hover:bg-green-400"
                            hx-trigger="click" hx-get="{{ route('employer.job.edit', $job->id) }}" hx-target="#target-content" hx-push-url="true"
                            >Edit
                            </button>
                            <button class="bg-sky-500 text-gray-50 px-3 py-1 rounded-md shadow-md hover:bg-sky-400">View</button>
                            <button class="bg-red-500 text-gray-50 px-3 py-1 rounded-md shadow-md hover:bg-red-400 delete-btn" data-entry-id="{{ $job->id }}" data-href="{{ route('employer.job.delete-job', $job->id ) }}">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-5">
        {{  $jobs->links()}}
    </div>
</div>

@include('components.dialog', ['title' => 'Are You Sure?', 'text_content' => 'This action will submit the form', 'id' => 'modal-warning', 'icon' => 'warning'])


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