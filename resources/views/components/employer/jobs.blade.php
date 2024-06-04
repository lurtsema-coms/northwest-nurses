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
            <button hx-trigger="click" hx-get="{{ route('employer.job.add') }}" hx-target="#target-content" hx-push-url="true" hx-on::after-request="initializeJobForm()">  
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
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Job Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Address</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Profession</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Opening</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Start Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pay</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 text-sm whitespace-nowrap">1</td>
                    <td class="px-6 py-4 text-sm whitespace-nowrap font-medium text-green-500">Active</td>
                    <td class="px-6 py-4 text-sm whitespace-nowrap">Hospital De Luna</td>
                    <td class="px-6 py-4 text-sm whitespace-nowrap">Alaska</td>
                    <td class="px-6 py-4 text-sm whitespace-nowrap">Doctor</td>
                    <td class="px-6 py-4 text-sm whitespace-nowrap">1</td>
                    <td class="px-6 py-4 text-sm whitespace-nowrap">8 - 9 hrs</td>
                    <td class="px-6 py-4 text-sm whitespace-nowrap">2500$ - 3500$</td>
                    <td class="px-6 py-4 text-sm whitespace-nowrap space-x-2">
                        <button class="bg-green-500 text-gray-50 px-3 py-1 rounded-md shadow-md hover:bg-green-400">Edit</button>
                        <button class="bg-sky-500 text-gray-50 px-3 py-1 rounded-md shadow-md hover:bg-sky-400">View</button>
                        <button class="bg-red-500 text-gray-50 px-3 py-1 rounded-md shadow-md hover:bg-red-400">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>