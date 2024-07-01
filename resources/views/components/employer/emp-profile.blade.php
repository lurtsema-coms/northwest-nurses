<div class="h-16 flex items-center absolute top-0 left-16 text-xl">
    {{ $module_title }}
</div>
<div class="modal-center change-password fixed inset-0 h-screen w-full bg-black bg-opacity-75  p-4 z-10 overflow-y-auto hidden">
	<div class="modal-box m-auto w-full max-w-lg bg-white shadow-lg rounded-lg animate-fade-in">
		<div class="modal-content flex flex-col p-3">
			<form method="POST" action="{{ route('employer.update.password', auth()->user()->id) }}">
				@csrf
				<div>
					<img src="{{ asset('img/change.png') }}" alt="" class=" w-80 object-contain mx-auto ">
				</div>
				<div class="mb-4">
					<h1 class="text-xl font-bold text-center mb-2">Change Account Password</h1>
					<p class="p-2 text-center"> To change your account password, type your current password and the password you want to change. Ensure that your new password is more than "8 characters". </p>
					<p class="p-2 text-center italic text-gray-400"> You will be logged out after changing password. </p>
				</div>
				<div class="p-5">
					<div class="flex-grow">
						<x-input-label for="current_password" :value="__('Current Password:')"/>
						<x-text-input  id="current_password" class="block mt-1 w-full" type="password" name="current_password" required/>
					</div>
					<div class="flex-grow mt-4">
						<x-input-label for="new_password" :value="__('New Password:')" />
						<x-text-input  id="new_password" class="block mt-1 w-full" type="password" name="new_password" required/>
					</div>
					<div class="flex-grow mt-4">
						<x-input-label for="confirmation_password" :value="__('Confirm New Password:')"/>
						<x-text-input  id="confirmation_password" class="block mt-1 w-full" type="password" name="confirmation_password" required/>
					</div>
				</div>
				<div class="flex flex-row gap-10 justify-center p-2 ">
					<button type="button" class="btn-close-password">Cancel</button>
					<button class="font-semibold py-2 px-4 bg-cyan-800 text-white ">Confirm</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal-center change-email fixed inset-0 h-screen w-full bg-black bg-opacity-75  p-4 z-10 overflow-y-auto hidden ">
	<div class="modal-box m-auto w-full max-w-lg bg-white shadow-lg rounded-lg animate-fade-in">
		<div class="modal-content flex flex-col p-3">
			<form method="POST" action="{{ route('employer.update.email', auth()->user()->id) }}">
				@csrf
				<div>
					<img src="{{ asset('img/username.png') }}" alt="" class=" w-60 object-contain mx-auto ">
				</div>
				<div class="mb-4">
					<h1 class="text-xl font-bold text-center mb-2">Change Account Email</h1>
					<p class="p-2 text-center"> To change your account email, type your new email and type your current account password for verification.</p>
					<p class="p-2 text-center italic text-gray-400"> Note: You will be logged out and an email verification will be sent to the new email after changing email. </p>
				</div>
				<div class="p-5">
					<div class="flex-grow">
						<x-input-label for="new_email" :value="__('New Email:')"/>
						<x-text-input  id="new_email" class="block mt-1 w-full" type="email" name="new_email" required/>
					</div>
					<div class="flex-grow mt-4">
						<x-input-label for="confirm_new_email" :value="__('Re-Type New Email:')"/>
						<x-text-input  id="confirm_new_email" class="block mt-1 w-full" type="email" name="confirm_new_email" required/>
					</div>
					<div class="flex-grow mt-4">
						<x-input-label for="email_confirmation_password" :value="__('Current Password:')"/>
						<x-text-input  id="email_confirmation_password" class="block mt-1 w-full" type="password" name="email_confirmation_password" required/>
					</div>
				</div>
				<div class="flex flex-row gap-10 justify-center p-2 ">
					<button  type="button" class="btn-close-email">Cancel</button>
					<button class="font-semibold py-2 px-4 bg-cyan-800 text-white ">Logout And Verify Email</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="bg-white mx-auto max-w-3xl p-10 rounded-xl shadow-sm text-slate-600">
    <p class="font-bold mb-5">Edit Profile</p>
    <div id="error-messages">
    </div>
    <div class="mb-5">
        @if (session('successPassword'))
		<div class="max-w-xs bg-teal-500 text-sm text-white rounded-xl shadow-lg update-success" role="alert">
			<div class="flex p-4">
			{{ session('successPassword') }}
			<div class="ms-auto">
				<button type="button" class="inline-flex flex-shrink-0 justify-center items-center size-5 rounded-lg text-white hover:text-white opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100" data-hs-remove-element=".update-success">
				<span class="sr-only">Close</span>
				<svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
					<path d="M18 6 6 18"></path>
					<path d="m6 6 12 12"></path>
				</svg>
				</button>
			</div>
			</div>
		</div>
		@endif
		@if (session('successEmail'))
		<div class="max-w-xs bg-teal-500 text-sm text-white rounded-xl shadow-lg update-success" role="alert">
			<div class="flex p-4">
			{{ session('successEmail') }}
			<div class="ms-auto">
				<button type="button" class="inline-flex flex-shrink-0 justify-center items-center size-5 rounded-lg text-white hover:text-white opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100" data-hs-remove-element=".update-success">
				<span class="sr-only">Close</span>
				<svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
					<path d="M18 6 6 18"></path>
					<path d="m6 6 12 12"></path>
				</svg>
				</button>
			</div>
			</div>
		</div>
		@endif
		@if (session('error'))
		<div class="max-w-xs bg-red-500 text-sm text-white rounded-xl shadow-lg update-success" role="alert">
			<div class="flex p-4">
			{{ session('error') }}
			<div class="ms-auto">
				<button type="button" class="inline-flex flex-shrink-0 justify-center items-center size-5 rounded-lg text-white hover:text-white opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100" data-hs-remove-element=".update-success">
				<span class="sr-only">Close</span>
				<svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
					<path d="M18 6 6 18"></path>
					<path d="m6 6 12 12"></path>
				</svg>
				</button>
			</div>
			</div>
		</div>
		@endif
		@if ($errors->has('new_password'))
		<div class="max-w-xs bg-red-500 text-sm text-white rounded-xl shadow-lg update-success" role="alert">
			<div class="flex p-4">
			{{$errors->first('new_password') }}
			<div class="ms-auto">
				<button type="button" class="inline-flex flex-shrink-0 justify-center items-center size-5 rounded-lg text-white hover:text-white opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100" data-hs-remove-element=".update-success">
				<span class="sr-only">Close</span>
				<svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
					<path d="M18 6 6 18"></path>
					<path d="m6 6 12 12"></path>
				</svg>
				</button>
			</div>
			</div>
		</div>
		@endif
		@if ($errors->has('confirmation_password'))
		<div class="max-w-xs bg-red-500 text-sm text-white rounded-xl shadow-lg update-success" role="alert">
			<div class="flex p-4">
			{{ $errors->first('confirmation_password') }}
			<div class="ms-auto">
				<button type="button" class="inline-flex flex-shrink-0 justify-center items-center size-5 rounded-lg text-white hover:text-white opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100" data-hs-remove-element=".update-success">
				<span class="sr-only">Close</span>
				<svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
					<path d="M18 6 6 18"></path>
					<path d="m6 6 12 12"></path>
				</svg>
				</button>
			</div>
			</div>
		</div>
		@endif
		@if ($errors->has('new_email'))
		<div class="max-w-xs bg-red-500 text-sm text-white rounded-xl shadow-lg update-success" role="alert">
			<div class="flex p-4">
			{{$errors->first('new_email') }}
			<div class="ms-auto">
				<button type="button" class="inline-flex flex-shrink-0 justify-center items-center size-5 rounded-lg text-white hover:text-white opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100" data-hs-remove-element=".update-success">
				<span class="sr-only">Close</span>
				<svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
					<path d="M18 6 6 18"></path>
					<path d="m6 6 12 12"></path>
				</svg>
				</button>
			</div>
			</div>
		</div>
		@endif
		@if ($errors->has('confirm_new_email'))
		<div class="max-w-xs bg-red-500 text-sm text-white rounded-xl shadow-lg update-success" role="alert">
			<div class="flex p-4">
			{{ $errors->first('confirm_new_email') }}
			<div class="ms-auto">
				<button type="button" class="inline-flex flex-shrink-0 justify-center items-center size-5 rounded-lg text-white hover:text-white opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100" data-hs-remove-element=".update-success">
				<span class="sr-only">Close</span>
				<svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
					<path d="M18 6 6 18"></path>
					<path d="m6 6 12 12"></path>
				</svg>
				</button>
			</div>
			</div>
		</div>
		@endif
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
                    <input class="h-10 text-sm px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="text" name="company_email" value="{{ $user->email }}" readonly>
                </div>
            </div>
            <div class="flex flex-wrap gap-5">
                <div class="flex flex-col flex-1 space-y-2">
                    <span class="font-medium">Home Address</span>
                    <input class="h-10 text-sm px-2 border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="text" name="company_address" value="{{ $user->address }}" required>
                </div>
            </div>
            <div class="flex flex-wrap gap-5 mt-2">
                <div class="flex flex-col flex-1 space-y-2">
					<button class="change-email-modal font-semibold py-2 px-4 bg-gray-50 border border-solid border-gray-400 rounded-md" type="button">Change Email</button>
                </div>
                <div class="flex flex-col flex-1 space-y-2">
					<button class="change-password-modal font-semibold py-2 px-4 bg-gray-50 border border-solid border-gray-400 rounded-md" type="button">Change Password</button>
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

</script>
@endsection