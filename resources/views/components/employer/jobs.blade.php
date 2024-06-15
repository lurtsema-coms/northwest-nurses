<div class="h-16 flex items-center absolute top-0 left-16 text-xl">
    {{ $module_title }}
</div>
<div>
    <div class="mb-5 flex justify-between flex-wrap">
        <div class="space-x-3 flex items-center">
            <select class="h-10 outline-none border border-gray-200 rounded-md focus:border-slate-400 focus:ring-0 focus:outline-none" name="paginate" id
                hx-trigger="change" 
                hx-post="{{ route('employer.job.search') }}" 
                hx-include="[name='search']"
                hx-target="#table-jobs"
                hx-swap="innerHTML"
            >
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="500">500</option>
                <option value="1000">1000</option>
            </select>
            <button hx-trigger="click" hx-get="{{ route('employer.job.add') }}" hx-target="#target-content" hx-push-url="true">  
                <div class="bg-cyan-600 text-white text-sm border h-10 flex items-center justify-center px-4 rounded-md hover:opacity-70">
                Add Job
                </div>
            </button>
        </div>
        <div>
            <input class="h-10 w-72 rounded-lg border border-gray-200 focus:border-slate-400 focus:ring-0 focus:outline-none placeholder:text-slate-400" type="text" placeholder="Search..."
                name="search"
                hx-trigger="keyup changed delay:500ms" 
                hx-post="{{ route('employer.job.search') }}" 
                hx-include="[name='paginate']"
                hx-target="#table-jobs"
                hx-swap="innerHTML"
            >
        </div>
    </div>
    <div id="table-jobs">
        @include('components.employer.custom.jobs-table-body')
    </div>
</div>

@include('components.dialog', ['title' => 'Are You Sure?', 'text_content' => 'This action will submit the form', 'class' => 'modal-warning', 'icon' => 'warning', 'isHxSwap' => false])

<div id="emp-applicant">
</div>

<script>
    document.body.addEventListener('htmx:configRequest', (event) => {
        event.detail.headers['X-CSRF-TOKEN'] = '{{ csrf_token() }}';
    });

    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.querySelector('input[name="search"]');
        
        searchInput.addEventListener('input', function() {
            const searchValue = this.value.trim();
            const currentState = history.state || {};
            const newUrl = new URL(window.location.href);
            
            if (searchValue) {
                newUrl.searchParams.set('search', searchValue);
            } else {
                newUrl.searchParams.delete('search');
            }
            
            history.replaceState(currentState, '', newUrl.toString());
        });
    });
</script>