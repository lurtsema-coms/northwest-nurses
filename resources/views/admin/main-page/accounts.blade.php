<div class="absolute top-0 flex items-center h-16 text-xl select-none left-16">
    {{ $module_title }}
</div>
<div>
    <div class="flex flex-wrap justify-between gap-3 mb-5">
        <div class="flex items-center space-x-3">
            <select class="h-10 border border-gray-200 rounded-md outline-none focus:border-slate-400 focus:ring-0 focus:outline-none" name="paginate"
                hx-trigger="change" 
                hx-post="{{ route('admin.accounts.search') }}" 
                hx-include="[name='search'], [name='role']"
                hx-target="#accounts-table"
                hx-swap="innerHTML"
            >
                <option value="10" selected>10</option>
                <option value="25">25</option>
                <option value="50">50</option>
            </select>
            <select class="h-10 border border-gray-200 rounded-md outline-none focus:border-slate-400 focus:ring-0 focus:outline-none" name="role"
                hx-trigger="change" 
                hx-post="{{ route('admin.accounts.search') }}" 
                hx-include="[name='search'], [name='paginate']"
                hx-target="#accounts-table"
                hx-swap="innerHTML"
            >
                <option value="" selected>Default</option>
                <option value="employer">Employer</option>
                <option value="applicant">Applicant</option>
            </select>
        </div>
        <div class="flex flex-wrap gap-3">
            <input class="h-10 border border-gray-200 rounded-lg max-w-72 focus:border-slate-400 focus:ring-0 focus:outline-none placeholder:text-slate-400" id="search-btn" type="text" placeholder="Search..."
                name="search"
                hx-trigger="keyup changed delay:500ms" 
                hx-post="{{ route('admin.accounts.search') }}" 
                hx-include="[name='paginate'], [name='role']"
                hx-target="#accounts-table"
                hx-swap="innerHTML"
            >
        </div>
    </div>
    <div id="accounts-table">
        @include('admin.custom.accounts-table')
    </div>
</div>