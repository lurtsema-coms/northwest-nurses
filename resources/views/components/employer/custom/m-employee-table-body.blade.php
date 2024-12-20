<div class="mx-auto overflow-hidden overflow-x-auto rounded-md shadow-sm"w>
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Date Applied</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Date Hired</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Email</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Name</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Job Title</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Sex</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Birth Date</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Contact Number</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($applicants as $applicant)
            <tr >
                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">{{date('Y-m-d', strtotime($applicant->applied_at))}}</td>
                <td class="px-6 py-4 text-sm whitespace-nowrap">{{$applicant->hired_at}}</td>
                <td class="px-6 py-4 text-sm whitespace-nowrap">{{$applicant->email}}</td>
                <td class="px-6 py-4 text-sm whitespace-nowrap">{{"$applicant->first_name $applicant->last_name"}}</td>
                <td class="px-6 py-4 text-sm whitespace-nowrap">{{$applicant->job_title}}</td>
                <td class="px-6 py-4 text-sm whitespace-nowrap">{{$applicant->sex}}</td>
                <td class="px-6 py-4 text-sm whitespace-nowrap">{{$applicant->birthdate}}</td>
                <td class="px-6 py-4 text-sm whitespace-nowrap">{{$applicant->contact_number}}</td>
                <td class="px-6 py-4 text-sm whitespace-nowrap">
                    <div class="flex gap-2">
                        <a class="px-3 py-1 bg-red-500 rounded-md shadow-md text-gray-50 hover:bg-red-400"
                            href="{{ route('employer.m-employee-remove', $applicant->application_id) }}">
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