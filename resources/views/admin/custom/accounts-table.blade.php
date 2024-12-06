<div class="mx-auto overflow-hidden overflow-x-auto rounded-md shadow-sm"w>
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Role</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Name</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Contact Number</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Email</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Date Joined</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @php
                use Carbon\Carbon;
            @endphp
            @foreach ($users as $user)
                <tr>
                    <td 
                        class="px-6 py-4 text-sm font-medium whitespace-nowrap
                            {{ $user->role === 'employer' ? 'text-orange-500' : '' }}
                            {{ $user->role === 'applicant' ? 'text-cyan-500' : '' }}"
                    >
                        {{ ucfirst($user->role) }}
                    </td>
                    <td class="px-6 py-4 text-sm whitespace-nowrap">
                        @if ($user->role === 'employer')
                            {{ $user->employerDetail->name }}
                        @else
                            {{ $user->applicantDetail->first_name.' '.$user->applicantDetail->last_name }}
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm whitespace-nowrap">{{ $user->contact_number }}</td>
                    <td class="px-6 py-4 text-sm whitespace-nowrap">{{ $user->email }}</td>
                    <td class="px-6 py-4 text-sm whitespace-nowrap">
                        {{ $user->created_at ? Carbon::parse($user->created_at)->format('D, F j, Y') : 'N/A' }}
                    </td>
                    <td class="px-6 py-4 text-sm whitespace-nowrap">
                        <button class="px-3 py-1 rounded-md shadow-md bg-sky-500 text-gray-50 hover:bg-sky-400" 
                            hx-trigger="click" hx-get="{{ route('admin.accounts.show', $user->id) }}" hx-target="#target-content" hx-push-url="true"
                        >
                            View
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-5">
    {{ $users->appends(request()->query())->links('vendor.pagination.custom-pagination-backend') }}
</div>
    
@php
    $firstItem = $users->firstItem();
    $lastItem = $users->lastItem();
    $total = $users->total();
    $page = (integer) request('page')
@endphp

@if (($users->count() < $paginate) && $page < 2 )
    <p class="mt-2 text-sm text-gray-700">
        Showing {{ $firstItem ?? 0 }} to {{ $lastItem ?? 0 }} of {{ $total }} results
    </p>
@endif