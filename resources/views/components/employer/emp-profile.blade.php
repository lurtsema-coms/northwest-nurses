<div class="absolute top-0 flex items-center h-16 text-xl left-16">
    {{ $module_title }}
</div>
<div class="fixed inset-0 z-10 hidden w-full h-screen p-4 overflow-y-auto bg-black bg-opacity-75 modal-center change-password">
	<div class="w-full max-w-lg m-auto bg-white rounded-lg shadow-lg modal-box animate-fade-in">
		<div class="flex flex-col p-3 modal-content">
			<form method="POST" action="{{ route('employer.update.password', auth()->user()->id) }}">
				@csrf
				<div>
					<img src="{{ asset('img/change.png') }}" alt="" class="object-contain mx-auto  w-80">
				</div>
				<div class="mb-4">
					<h1 class="mb-2 text-xl font-bold text-center">Change Account Password</h1>
					<p class="p-2 text-center"> To change your account password, type your current password and the password you want to change. Ensure that your new password is more than "8 characters". </p>
					<p class="p-2 italic text-center text-gray-400"> You will be logged out after changing password. </p>
				</div>
				<div class="p-5">
					<div class="flex-grow">
						<x-input-label for="current_password" :value="__('Current Password:')"/>
						<x-text-input  id="current_password" class="block w-full mt-1" type="password" name="current_password" required/>
					</div>
					<div class="flex-grow mt-4">
						<x-input-label for="new_password" :value="__('New Password:')" />
						<x-text-input  id="new_password" class="block w-full mt-1" type="password" name="new_password" required/>
					</div>
					<div class="flex-grow mt-4">
						<x-input-label for="confirmation_password" :value="__('Confirm New Password:')"/>
						<x-text-input  id="confirmation_password" class="block w-full mt-1" type="password" name="confirmation_password" required/>
					</div>
				</div>
				<div class="flex flex-row justify-center gap-10 p-2 ">
					<button type="button" class="btn-close-password">Cancel</button>
					<button class="px-4 py-2 font-semibold text-white bg-cyan-800 ">Confirm</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="fixed inset-0 z-10 hidden w-full h-screen p-4 overflow-y-auto bg-black bg-opacity-75 modal-center change-email ">
	<div class="w-full max-w-lg m-auto bg-white rounded-lg shadow-lg modal-box animate-fade-in">
		<div class="flex flex-col p-3 modal-content">
			<form method="POST" action="{{ route('employer.update.email', auth()->user()->id) }}">
				@csrf
				<div>
					<img src="{{ asset('img/username.png') }}" alt="" class="object-contain mx-auto  w-60">
				</div>
				<div class="mb-4">
					<h1 class="mb-2 text-xl font-bold text-center">Change Account Email</h1>
					<p class="p-2 text-center"> To change your account email, type your new email and type your current account password for verification.</p>
					<p class="p-2 italic text-center text-gray-400"> Note: You will be logged out and an email verification will be sent to the new email after changing email. </p>
				</div>
				<div class="p-5">
					<div class="flex-grow">
						<x-input-label for="new_email" :value="__('New Email:')"/>
						<x-text-input  id="new_email" class="block w-full mt-1" type="email" name="new_email" required/>
					</div>
					<div class="flex-grow mt-4">
						<x-input-label for="confirm_new_email" :value="__('Re-Type New Email:')"/>
						<x-text-input  id="confirm_new_email" class="block w-full mt-1" type="email" name="confirm_new_email" required/>
					</div>
					<div class="flex-grow mt-4">
						<x-input-label for="email_confirmation_password" :value="__('Current Password:')"/>
						<x-text-input  id="email_confirmation_password" class="block w-full mt-1" type="password" name="email_confirmation_password" required/>
					</div>
				</div>
				<div class="flex flex-row justify-center gap-10 p-2 ">
					<button  type="button" class="btn-close-email">Cancel</button>
					<button class="px-4 py-2 font-semibold text-white bg-cyan-800 ">Logout And Verify Email</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="max-w-3xl p-10 mx-auto bg-white shadow-sm rounded-xl text-slate-600">
    <p class="mb-5 font-bold">Edit Profile</p>
    <div id="error-messages">
    </div>
    <div class="mb-5">
        @if (session('successPassword'))
		<div class="max-w-xs text-sm text-white bg-teal-500 shadow-lg rounded-xl update-success" role="alert">
			<div class="flex p-4">
			{{ session('successPassword') }}
			<div class="ms-auto">
				<button type="button" class="inline-flex items-center justify-center flex-shrink-0 text-white rounded-lg opacity-50 size-5 hover:text-white hover:opacity-100 focus:outline-none focus:opacity-100" data-hs-remove-element=".update-success">
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
		<div class="max-w-xs text-sm text-white bg-teal-500 shadow-lg rounded-xl update-success" role="alert">
			<div class="flex p-4">
			{{ session('successEmail') }}
			<div class="ms-auto">
				<button type="button" class="inline-flex items-center justify-center flex-shrink-0 text-white rounded-lg opacity-50 size-5 hover:text-white hover:opacity-100 focus:outline-none focus:opacity-100" data-hs-remove-element=".update-success">
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
		<div class="max-w-xs text-sm text-white bg-red-500 shadow-lg rounded-xl update-success" role="alert">
			<div class="flex p-4">
			{{ session('error') }}
			<div class="ms-auto">
				<button type="button" class="inline-flex items-center justify-center flex-shrink-0 text-white rounded-lg opacity-50 size-5 hover:text-white hover:opacity-100 focus:outline-none focus:opacity-100" data-hs-remove-element=".update-success">
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
		<div class="max-w-xs text-sm text-white bg-red-500 shadow-lg rounded-xl update-success" role="alert">
			<div class="flex p-4">
			{{$errors->first('new_password') }}
			<div class="ms-auto">
				<button type="button" class="inline-flex items-center justify-center flex-shrink-0 text-white rounded-lg opacity-50 size-5 hover:text-white hover:opacity-100 focus:outline-none focus:opacity-100" data-hs-remove-element=".update-success">
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
		<div class="max-w-xs text-sm text-white bg-red-500 shadow-lg rounded-xl update-success" role="alert">
			<div class="flex p-4">
			{{ $errors->first('confirmation_password') }}
			<div class="ms-auto">
				<button type="button" class="inline-flex items-center justify-center flex-shrink-0 text-white rounded-lg opacity-50 size-5 hover:text-white hover:opacity-100 focus:outline-none focus:opacity-100" data-hs-remove-element=".update-success">
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
		<div class="max-w-xs text-sm text-white bg-red-500 shadow-lg rounded-xl update-success" role="alert">
			<div class="flex p-4">
			{{$errors->first('new_email') }}
			<div class="ms-auto">
				<button type="button" class="inline-flex items-center justify-center flex-shrink-0 text-white rounded-lg opacity-50 size-5 hover:text-white hover:opacity-100 focus:outline-none focus:opacity-100" data-hs-remove-element=".update-success">
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
		<div class="max-w-xs text-sm text-white bg-red-500 shadow-lg rounded-xl update-success" role="alert">
			<div class="flex p-4">
			{{ $errors->first('confirm_new_email') }}
			<div class="ms-auto">
				<button type="button" class="inline-flex items-center justify-center flex-shrink-0 text-white rounded-lg opacity-50 size-5 hover:text-white hover:opacity-100 focus:outline-none focus:opacity-100" data-hs-remove-element=".update-success">
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
                    <input class="h-10 px-2 text-sm border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="text" name="company_name" value="{{ $user->company_name }}" required>
                </div>
                <div class="flex flex-col flex-1 space-y-2">
                    <span class="font-medium">Company Website</span>
                    <input class="h-10 px-2 text-sm border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="text" name="company_website" value="{{ $user->company_website }}">
                </div>
            </div>
            <div class="flex flex-wrap gap-5">
                <div class="flex flex-col flex-1 space-y-2">
                    <span class="font-medium">Contact Number</span>
                    <input class="h-10 px-2 text-sm border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="text" name="company_contact_number" value="{{ $user->contact_number }}" required>
                </div>
                <div class="flex flex-col flex-1 space-y-2">
                    <span class="font-medium">Email</span>
                    <input class="h-10 px-2 text-sm border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="text" name="company_email" value="{{ $user->email }}" readonly>
                </div>
            </div>
            <div class="flex flex-wrap gap-5">
                <div class="flex flex-col flex-1 space-y-2">
                    <span class="font-medium">Home Address</span>
                    <input class="h-10 px-2 text-sm border border-gray-300 rounded-md focus:border-1 focus:border-cyan-600 focus:ring-0 focus:outline-none" type="text" name="company_address" value="{{ $user->address }}" required>
                </div>
            </div>
            <div class="flex flex-wrap gap-5 mt-2">
                <div class="flex flex-col flex-1 space-y-2">
					<button class="px-4 py-2 font-semibold border border-gray-400 border-solid rounded-md change-email-modal bg-gray-50" type="button">Change Email</button>
                </div>
                <div class="flex flex-col flex-1 space-y-2">
					<button class="px-4 py-2 font-semibold border border-gray-400 border-solid rounded-md change-password-modal bg-gray-50" type="button">Change Password</button>
                </div>
            </div>
            <div class="text-end">
                <button class="h-10 px-4 text-sm text-white border rounded-md bg-cyan-600 hover:opacity-70">Save</button>
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