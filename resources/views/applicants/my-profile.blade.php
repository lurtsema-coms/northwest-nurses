@extends('layouts.applicant')
@section('title', 'My Profile')
@section('content')


<div class="modal-center change-password fixed inset-0 h-screen w-full bg-black bg-opacity-75  p-4 z-10 overflow-y-auto hidden">
	<div class="modal-box m-auto w-full max-w-lg bg-white shadow-lg rounded-lg animate-fade-in">
		<div class="modal-content flex flex-col p-3">
			<form method="POST" action="{{ route('applicant.update.password', auth()->user()->id) }}">
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
					<button class="btn-close-password">Cancel</button>
					<button class="font-semibold py-2 px-4 bg-cyan-800 text-white ">Confirm</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal-center change-email fixed inset-0 h-screen w-full bg-black bg-opacity-75  p-4 z-10 overflow-y-auto hidden ">
	<div class="modal-box m-auto w-full max-w-lg bg-white shadow-lg rounded-lg animate-fade-in">
		<div class="modal-content flex flex-col p-3">
			<form method="POST" action="{{ route('applicant.update.email', auth()->user()->id) }}">
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
					<button class="btn-close-email">Cancel</button>
					<button class="font-semibold py-2 px-4 bg-cyan-800 text-white ">Confirm</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="container mx-auto my-10 py-10">
	<h1 class="text-3xl text-center font-bold mb-10">My Profile</h1>
	<div class="mx-3 lg:mx-auto py-10 px-5 md:px-16 shadow-md max-w-screen-lg rounded-lg">
		<h3 class="font-bold text-2xl mb-5">Edit Profile</h3>
		<form method="POST" action="{{ route('applicant.profile.update', auth()->user()->id) }}" autocomplete="off">
			@csrf
			@method('PUT')
			<!-- Name -->
			<div class="flex flex-col sm:flex-row sm:gap-5">
				<div class="flex-grow">
					<x-input-label for="first_name" :value="__('First Name')" />
					<x-text-input value="{{ $first_name }}" id="first_name" class="block mt-1 w-full" type="text" name="first_name" required autofocus/>
					<x-input-error :messages="$errors->get('first_name')" class="mt-2" />
				</div>
				<div class="mt-4 sm:mt-0 flex-grow">
					<x-input-label for="last_name" :value="__(' Last Name')" />
					<x-text-input value="{{ $last_name }}" id="last_name" class="block mt-1 w-full" type="text" name="last_name"  required autofocus/>
					<x-input-error :messages="$errors->get('last_name')" class="mt-2" />
				</div>
			</div>

			<div class="flex flex-col sm:flex-row sm:gap-5">
				<div class="mt-4 flex-grow">
					<x-input-label for="contact_number" :value="__('Contact Number')" />
					<x-text-input value="{{ $contact_number }}" id="contact_number" class="block mt-1 w-full" type="text" name="contact_number" required/>
					<x-input-error :messages="$errors->get('contact_number')" class="mt-2" />
				</div>
				<div class="mt-4 flex-grow">
					<x-input-label for="email" :value="__('Email')" />
					<x-text-input value="{{ $email }}" id="email" class="block mt-1 w-full" type="email" name="email" readonly required/>
					<x-input-error :messages="$errors->get('email')" class="mt-2" />
				</div>
			</div>

			<div class="flex flex-col sm:flex-row sm:gap-5">
				<div class="mt-4 flex-grow">
					<x-input-label for="home_address" :value="__('Home Address')" />
					<x-text-input value="{{ $address }}" id="home_address" class="block mt-1 w-full" type="text" name="address"  required/>
					<x-input-error :messages="$errors->get('address')" class="mt-2" />
				</div>
			</div>
			<div class="flex flex-col sm:flex-row sm:gap-5">
				<div class="mt-4 flex-grow ">
						<x-input-label for="sex" :value="__('Sex')" />
						<select name="sex" id="sex" class="block mt-1 w-full border-cyan-600 focus:border-cyan-600 dark:focus:border-cyan-600 focus:ring-cyan-600 dark:focus:ring-cyan-600 rounded-md shadow-sm" required>
								<option disabled value="">None selected</option>
								<option value="male" {{ $sex === "male" ? "selected" : "" }}>Male</option>
								<option value="female" {{ $sex === "female" ? "selected" : "" }}>Female</option>
						</select>
						<x-input-error :messages="$errors->get('sex')" class="mt-2" />
				</div>
				<div class="mt-4 flex-grow ">
						<x-input-label for="birthdate" :value="__('Date of Birth')" />
						<x-text-input value="{{ $birthdate }}" id="birthdate" class="block mt-1 w-full" type="date" name="birthdate"  required/>
						<x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
				</div>
			</div>
			<div class="flex flex-col sm:flex-row sm:gap-5 mt-4 ">
				<div class="mt-4 flex-grow gap-4 flex">
					<button class="change-email-modal font-semibold py-2 px-4 bg-gray-50 border border-solid border-gray-400 rounded-md" type="button">Change Email</button>
					<button class="change-password-modal font-semibold py-2 px-4 bg-gray-50 border border-solid border-gray-400 rounded-md" type="button">Change Password</button>
				</div>
			</div>
			<div class="flex items-center justify-end mt-4">
				<x-primary-button class="ms-4 submit-applicant">
					{{ __('Save') }}
				</x-primary-button>
			</div>
		</form>
		@if (session('success'))
		<div class="max-w-xs bg-teal-500 text-sm text-white rounded-xl shadow-lg update-success" role="alert">
			<div class="flex p-4">
			{{ session('success') }}
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
</div>
@section('scripts')
	<script>

		$(document).ready(function(){
			$('.change-password-modal').on('click', function(){
				event.preventDefault();
				$('.change-password').show();
			});
			$('.btn-close-password').on('click', function(){
				$('.change-password').hide();
			});
			$('.change-email-modal').on('click', function(){
				event.preventDefault();
				$('.change-email').show();
			});
			$('.btn-close-email').on('click', function(){
				$('.change-email').hide();
			});

			function logoutWithDelay() {
				setTimeout(function(){
					const form = document.createElement('form');
					form.method = 'POST';
					form.action = "{{ route('logout') }}";
					// Include CSRF token for enhanced security
					const csrfInput = document.createElement('input');
					csrfInput.type = 'hidden';
					csrfInput.name = '_token';
					csrfInput.value = "{{ csrf_token() }}";
					form.appendChild(csrfInput);

					document.body.appendChild(form);
					form.submit();
				}, 2000);
			}

			if ("{{ session('successPassword') }}") {
				logoutWithDelay();
			}

			if ("{{ session('successEmail') }}") {
				logoutWithDelay();
			}
		});

	</script>
@endsection
@endsection