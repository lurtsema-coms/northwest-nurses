<div class="mx-auto overflow-x-auto overflow-hidden rounded-md shadow-sm"w>
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date Applied</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date Hired</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Job Title</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sex</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Birth Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact Number</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($applicants as $applicant)
            <tr >
                <td class="px-6 py-4 text-sm whitespace-nowrap font-medium">{{date('Y-m-d', strtotime($applicant->applied_at))}}</td>
                <td class="px-6 py-4 text-sm whitespace-nowrap">{{$applicant->hired_at}}</td>
                <td class="px-6 py-4 text-sm whitespace-nowrap">{{$applicant->email}}</td>
                <td class="px-6 py-4 text-sm whitespace-nowrap">{{"$applicant->first_name $applicant->last_name"}}</td>
                <td class="px-6 py-4 text-sm whitespace-nowrap">{{$applicant->job_title}}</td>
                <td class="px-6 py-4 text-sm whitespace-nowrap">{{$applicant->sex}}</td>
                <td class="px-6 py-4 text-sm whitespace-nowrap">{{$applicant->birthdate}}</td>
                <td class="px-6 py-4 text-sm whitespace-nowrap">{{$applicant->contact_number}}</td>
                <td class="px-6 py-4 text-sm whitespace-nowrap">
                    <div class="flex gap-2">
                        <a class="bg-red-500 text-gray-50 px-3 py-1 rounded-md shadow-md hover:bg-red-400"
                            href="{{ route('employer.m-employee-remove', $applicant->id) }}">
                            Remove
                    </a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="mt-5">
{{ $applicants->appends(request()->query())->links('vendor.pagination.custom-pagination-backend') }}
</div>

@php
    $firstItem = $applicants->firstItem();
    $lastItem = $applicants->lastItem();
    $total = $applicants->total();
    $page = (integer) request('page')
@endphp

@if (($applicants->count() < $paginate) && $page < 2 )
    <p class="text-sm text-gray-700 mt-2">
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