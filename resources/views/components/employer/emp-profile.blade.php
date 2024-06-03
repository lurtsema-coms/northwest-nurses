<div class="bg-white mx-auto max-w-3xl p-10 rounded-xl shadow-sm text-slate-600">
    <p class="font-bold mb-5">Edit</p>
    <form hx-post="{{ route('employer.profile.update', auth()->user()->id) }}">
        @csrf
        <div class="space-y-5 text-slate-500">
            <div class="flex flex-wrap gap-5">
                <div class="flex flex-col flex-1 space-y-2">
                    <span class="font-medium">Company Name</span>
                    <input class="h-10 text-sm px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="text" name="company_name" value="{{ $user->company_name }}" required>
                </div>
                <div class="flex flex-col flex-1 space-y-2">
                    <span class="font-medium">Company Website</span>
                    <input class="h-10 text-sm px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="text" name="company_website" value="{{ $user->company_website }}" required>
                </div>
            </div>
            <div class="flex flex-wrap gap-5">
                <div class="flex flex-col flex-1 space-y-2">
                    <span class="font-medium">Contact Number</span>
                    <input class="h-10 text-sm px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="text" name="company_contact_number" value="{{ $user->contact_number }}" required>
                </div>
                <div class="flex flex-col flex-1 space-y-2">
                    <span class="font-medium">Email</span>
                    <input class="h-10 text-sm px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="text" name="company_email" value="{{ $user->email }}" required>
                </div>
            </div>
            <div class="flex flex-wrap gap-5">
                <div class="flex flex-col flex-1 space-y-2">
                    <span class="font-medium">Home Address</span>
                    <input class="h-10 text-sm px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="text" name="company_address" value="{{ $user->address }}" required>
                </div>
            </div>
            <div class="flex flex-wrap gap-5">
                <div class="flex flex-col flex-1 space-y-2">
                    <span class="font-medium">Change Password</span>
                    <input class="h-10 text-sm px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="text" name="password" name="">
                </div>
                <div class="flex flex-col flex-1 space-y-2">
                    <span class="font-medium">Confirm Password</span>
                    <input class="h-10 text-sm px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="password" name="password_confirmation">
                </div>
            </div>
            <div class="text-end">
                <button class="bg-cyan-600 text-white text-sm border h-10 px-4 rounded-md hover:opacity-70">Save</button>
            </div>
        </div>
    </form>
</div>
