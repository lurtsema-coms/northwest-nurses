<div class="bg-white mx-auto max-w-3xl p-10 rounded-xl shadow-sm text-slate-600">
    <p class="font-bold mb-5">Edit Profile</p>
    <div id="error-messages">
    </div>
    <form hx-post="{{ route('employer.profile.update', auth()->user()->id) }}" hx-target="#error-messages" hx-swap="innerHTML" hx-on::after-request="$('#password').val(''); $('#password_confirmation').val('')" autocomplete="off">
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
                    <input class="h-10 text-sm px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" id="password" type="password" name="password">
                </div>
                <div class="flex flex-col flex-1 space-y-2">
                    <span class="font-medium">Confirm Password</span>
                    <input class="h-10 text-sm px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" id="password_confirmation" type="password" name="password_confirmation">
                </div>
            </div>
            <div class="text-end">
                <button class="bg-cyan-600 text-white text-sm border h-10 px-4 rounded-md hover:opacity-70">Save</button>
            </div>
        </div>
    </form>
</div>

<div class="success-toast">

</div>

@section('script')
<script>
    $("#password_confirmation").on('input', function(){
        if ($(this).val() != ''){
            $("#password").attr('required', true);
        } else {
            $("#password").attr('required', false);
        }
    });
</script>
@endsection