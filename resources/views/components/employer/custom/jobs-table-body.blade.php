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
                <td class="px-6 py-4 text-sm">
                    <div class="flex gap-2 flex-wrap">
                        <button class="bg-green-500 text-gray-50 px-3 py-1 rounded-md shadow-md hover:bg-green-400"
                            hx-trigger="click" hx-get="{{ route('employer.job.edit', $job->id) }}" hx-target="#target-content" hx-push-url="true">
                            Edit
                        </button>
                        <button class="bg-sky-500 text-gray-50 px-3 py-1 rounded-md shadow-md hover:bg-sky-400" 
                            hx-trigger="click" hx-get="{{ route('employer.job.view', $job->id) }}" hx-target="#target-content" hx-push-url="true">
                        View
                        </button>
                        <button class="bg-yellow-500 text-gray-50 px-3 py-1 rounded-md shadow-md hover:bg-yellow-400 delete-btn" data-entry-id="{{ $job->id }}" data-href="{{ route('employer.job.delete-job', $job->id ) }}">Applicants</button>
                        <button class="bg-red-500 text-gray-50 px-3 py-1 rounded-md shadow-md hover:bg-red-400 delete-btn" data-entry-id="{{ $job->id }}" data-href="{{ route('employer.job.delete-job', $job->id ) }}">Delete</button>
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