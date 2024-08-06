@extends('layouts.applicant')
@section('title', 'My Profile')
@section('content')


<div class="fixed inset-0 z-10 hidden w-full h-screen p-4 overflow-y-auto bg-black bg-opacity-75 modal-center change-password">
	<div class="w-full max-w-lg m-auto bg-white rounded-lg shadow-lg modal-box animate-fade-in">
		<div class="flex flex-col p-3 modal-content">
			<form method="POST" action="{{ route('applicant.update.password', auth()->user()->id) }}">
				@csrf
				<div>
					<img src="{{ asset('img/change.png') }}" alt="" class="object-contain mx-auto w-80">
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
<div class="fixed inset-0 z-10 hidden w-full h-screen p-4 overflow-y-auto bg-black bg-opacity-75 modal-center show-resume">
	<div class="w-full max-w-4xl m-auto bg-white rounded-lg shadow-lg modal-box animate-fade-in">
		<div class="flex flex-col p-10 modal-content">
			<div class="">
				<embed src="" id="pdfShow" width="100%" height="700px"></embed>
			</div>
			<div class="mt-5">
				<button type="button" class="px-4 py-2 border rounded-lg hover:bg-gray-200 hover:cursor-pointer btn-close-resume">
					Close
				</button>
			</div>
		</div>
	</div>
</div>
<div class="fixed inset-0 z-10 hidden w-full h-screen p-4 overflow-y-auto bg-black bg-opacity-75 modal-center privacy-policy">
	<div class="w-full max-w-lg m-auto bg-white rounded-lg shadow-lg modal-box animate-fade-in">
		<div class="flex flex-col p-3 modal-content">
			<div class="flex flex-row justify-center gap-10 p-2 ">
				<button type="button" class="px-4 py-2 font-semibold text-white bg-cyan-800 btn-close-policy">Close</button>
			</div>
		</div>
	</div>
</div>
<div class="fixed inset-0 z-10 hidden w-full h-screen p-4 overflow-y-auto bg-black bg-opacity-75 modal-center change-email ">
	<div class="w-full max-w-lg m-auto bg-white rounded-lg shadow-lg modal-box animate-fade-in">
		<div class="flex flex-col p-3 modal-content">
			<form method="POST" action="{{ route('applicant.update.email', auth()->user()->id) }}">
				@csrf
				<div>
					<img src="{{ asset('img/username.png') }}" alt="" class="object-contain mx-auto w-60">
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
					<button type="button" class="btn-close-email">Cancel</button>
					<button class="px-4 py-2 font-semibold text-white bg-cyan-800 ">Logout And Verify Email</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="container py-10 mx-auto my-5">
	<h1 class="mb-10 text-3xl font-bold text-center">My Profile</h1>
	<div class="max-w-screen-lg px-5 py-10 mx-3 rounded-lg shadow-md lg:mx-auto md:px-16">
		<h3 class="mb-5 text-2xl font-bold">Edit Profile</h3>
		<form method="POST" action="{{ route('applicant.profile.update', auth()->user()->id) }}" autocomplete="off">
			@csrf
			@method('PUT')
			<!-- Name -->
			<div class="flex flex-col sm:flex-row sm:gap-5">
				<div class="flex-grow">
					<x-input-label for="first_name" :value="__('First Name')" />
					<x-text-input value="{{ $first_name }}" id="first_name" class="block w-full mt-1" type="text" name="first_name" required autofocus/>
					<x-input-error :messages="$errors->get('first_name')" class="mt-2" />
				</div>
				<div class="flex-grow mt-4 sm:mt-0">
					<x-input-label for="last_name" :value="__(' Last Name')" />
					<x-text-input value="{{ $last_name }}" id="last_name" class="block w-full mt-1" type="text" name="last_name"  required autofocus/>
					<x-input-error :messages="$errors->get('last_name')" class="mt-2" />
				</div>
			</div>

			<div class="flex flex-col sm:flex-row sm:gap-5">
				<div class="flex-grow mt-4">
					<x-input-label for="contact_number" :value="__('Contact Number')" />
					<x-text-input value="{{ $contact_number }}" id="contact_number" class="block w-full mt-1" type="text" name="contact_number" required/>
					<x-input-error :messages="$errors->get('contact_number')" class="mt-2" />
				</div>
				<div class="flex-grow mt-4">
					<x-input-label for="email" :value="__('Email')" />
					<x-text-input value="{{ $email }}" id="email" class="block w-full mt-1" type="email" name="email" readonly required/>
					<x-input-error :messages="$errors->get('email')" class="mt-2" />
				</div>
			</div>

			<div class="flex flex-col sm:flex-row sm:gap-5">
				<div class="flex-grow mt-4">
					<x-input-label for="home_address" :value="__('Home Address')" />
					<x-text-input value="{{ $address }}" id="home_address" class="block w-full mt-1" type="text" name="address"  required/>
					<x-input-error :messages="$errors->get('address')" class="mt-2" />
				</div>
			</div>
			<div class="flex flex-col sm:flex-row sm:gap-5">
				<div class="flex-grow mt-4 ">
						<x-input-label for="sex" :value="__('Sex')" />
						<select name="sex" id="sex" class="block w-full mt-1 rounded-md shadow-sm border-cyan-600 focus:border-cyan-600 dark:focus:border-cyan-600 focus:ring-cyan-600 dark:focus:ring-cyan-600" required>
								<option disabled value="">None selected</option>
								<option value="male" {{ $sex === "male" ? "selected" : "" }}>Male</option>
								<option value="female" {{ $sex === "female" ? "selected" : "" }}>Female</option>
						</select>
						<x-input-error :messages="$errors->get('sex')" class="mt-2" />
				</div>
				<div class="flex-grow mt-4 ">
						<x-input-label for="birthdate" :value="__('Date of Birth')" />
						<x-text-input value="{{ $birthdate }}" id="birthdate" class="block w-full mt-1" type="date" name="birthdate"  required/>
						<x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
				</div>
			</div>
			<div class="flex flex-col mt-4 sm:flex-row sm:gap-5 ">
				<div class="flex flex-grow gap-4 mt-4">
					<button class="px-4 py-2 font-semibold border border-gray-400 border-solid rounded-md change-email-modal bg-gray-50" type="button">Change Email</button>
					<button class="px-4 py-2 font-semibold border border-gray-400 border-solid rounded-md change-password-modal bg-gray-50" type="button">Change Password</button>
				</div>
			</div>
			<div class="flex items-center justify-end mt-4">
				<x-primary-button class="ms-4 submit-applicant">
					{{ __('Save') }}
				</x-primary-button>
			</div>
		</form>
		@if (session('success'))
		<div id="toast-success" class="flex items-center w-full p-4 mt-10 mb-4 text-gray-500 bg-white rounded-lg shadow" role="alert">
      <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
          </svg>
          <span class="sr-only">Check icon</span>
      </div>
      <div class="text-sm font-semibold ms-3">{{ session('success') }}</div>
      <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-success" aria-label="Close">
        <span class="sr-only">Close</span>
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
          </svg>
      </button>
    </div>
		@endif
		@if (session('successPassword'))
		<div id="toast-success" class="flex items-center w-full p-4 mt-10 mb-4 text-gray-500 bg-white rounded-lg shadow" role="alert">
      <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
          </svg>
          <span class="sr-only">Check icon</span>
      </div>
      <div class="text-sm font-semibold ms-3">{{ session('successPassword') }}</div>
      <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-success" aria-label="Close">
        <span class="sr-only">Close</span>
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
          </svg>
      </button>
    </div>
		@endif
		@if (session('successEmail'))
		<div id="toast-success" class="flex items-center w-full p-4 mt-10 mb-4 text-gray-500 bg-white rounded-lg shadow" role="alert">
      <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
          </svg>
          <span class="sr-only">Check icon</span>
      </div>
      <div class="text-sm font-semibold ms-3">{{ session('successEmail') }}</div>
      <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-success" aria-label="Close">
        <span class="sr-only">Close</span>
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
          </svg>
      </button>
    </div>
		@endif
		@if (session('error'))
		<div id="toast-danger" class="flex items-center w-full p-4 mt-10 mb-4 text-gray-500 bg-white rounded-lg shadow " role="alert">
			<div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg ">
					<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
							<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
					</svg>
					<span class="sr-only">Error icon</span>
			</div>
			<div class="text-sm font-normal ms-3">{{ session('error') }}</div>
			<button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-danger" aria-label="Close">
					<span class="sr-only">Close</span>
					<svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
							<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
					</svg>
			</button>
		</div>  
		@endif
		@if ($errors->has('new_password'))
		<div id="toast-danger" class="flex items-center w-full p-4 mt-10 mb-4 text-gray-500 bg-white rounded-lg shadow " role="alert">
			<div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg ">
					<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
							<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
					</svg>
					<span class="sr-only">Error icon</span>
			</div>
			<div class="text-sm font-normal ms-3">{{ $errors->first('new_password') }}</div>
			<button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-danger" aria-label="Close">
					<span class="sr-only">Close</span>
					<svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
							<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
					</svg>
			</button>
		</div>  
		@endif
		@if ($errors->has('confirmation_password'))
		<div id="toast-danger" class="flex items-center w-full p-4 mt-10 mb-4 text-gray-500 bg-white rounded-lg shadow " role="alert">
			<div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg ">
					<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
							<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
					</svg>
					<span class="sr-only">Error icon</span>
			</div>
			<div class="text-sm font-normal ms-3">{{ $errors->first('confirmation_password') }}</div>
			<button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-danger" aria-label="Close">
					<span class="sr-only">Close</span>
					<svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
							<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
					</svg>
			</button>
		</div>  
		@endif
		@if ($errors->has('new_email'))
		<div id="toast-danger" class="flex items-center w-full p-4 mt-10 mb-4 text-gray-500 bg-white rounded-lg shadow " role="alert">
			<div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg ">
					<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
							<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
					</svg>
					<span class="sr-only">Error icon</span>
			</div>
			<div class="text-sm font-normal ms-3">{{ $errors->first('new_email') }}</div>
			<button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-danger" aria-label="Close">
					<span class="sr-only">Close</span>
					<svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
							<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
					</svg>
			</button>
		</div>  
		@endif
		@if ($errors->has('confirm_new_email'))
		<div id="toast-danger" class="flex items-center w-full p-4 mt-10 mb-4 text-gray-500 bg-white rounded-lg shadow " role="alert">
			<div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg ">
					<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
							<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
					</svg>
					<span class="sr-only">Error icon</span>
			</div>
			<div class="text-sm font-normal ms-3">{{ $errors->first('confirm_new_email') }}</div>
			<button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-danger" aria-label="Close">
					<span class="sr-only">Close</span>
					<svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
							<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
					</svg>
			</button>
		</div>  
		@endif
	</div>
</div>

<div class="container py-10 mx-auto my-5">
    <div class="max-w-screen-lg px-5 py-10 mx-3 rounded-lg shadow-md lg:mx-auto md:px-16">
		<div>
			<form method="POST" action="{{ route('applicant.profile.add-resume', auth()->user()->id) }}" enctype="multipart/form-data" autocomplete="off">
				@csrf
				@method('PUT')
					<h3 class="mb-5 text-2xl font-bold">Add Resume</h3>
					<p class="mb-5">Add up to 10 resumés. Accepted file types: PDF (2MB limit).</p>
					<div class="relative flex items-center justify-center w-full overflow-hidden">
						<label for="dropzone-file" id="dropzone-parent" class="flex flex-col items-center justify-center w-full h-[10rem] border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50" draggable="true">
							<input id="dropzone-file" type="file" class="absolute -z-10 w-7" name="resume" accept=".pdf" required>
							<div class="flex flex-col items-center justify-center pt-5 pb-6" id="file-content">
								<svg class="w-8 h-8 mb-4 text-gray-500 aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
									<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
								</svg>
								<p class="mb-2 text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
								<p class="text-xs text-gray-500">PDF only (MAX. 2MB)</p>
							</div>
						</label>
					</div>
					<div class="mt-5">
						<p class="text-justify indent-4">Safeguard your privacy by sharing only essential details. Avoid including content from identity documents, financial data, or other sensitive information like religious beliefs or ethnicity. By uploading, you consent to our <span class="italic underline cursor-pointer text-cyan-600 hover:text-cyan-400 show-policy-modal">Privacy Policy</span>.</p>
					</div>
					<div class="flex items-center justify-end mt-4">
						<x-primary-button class="ms-4 submit-applicant">
							{{ __('UPLOAD') }}
						</x-primary-button>
					</div>
			</form>
		</div>
		<div class="my-5">
			<h3 class="text-2xl font-bold">Manage Resume</h3>
			<div class="my-5">
				@if (session('successResume'))
				<div id="toast-success" class="flex items-center w-full p-4 mt-10 mb-4 text-gray-500 bg-white rounded-lg shadow" role="alert">
					<div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
							<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
									<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
							</svg>
							<span class="sr-only">Check icon</span>
					</div>
					<div class="text-sm font-semibold ms-3">{{ session('successResume') }}</div>
					<button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-success" aria-label="Close">
						<span class="sr-only">Close</span>
							<svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
									<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
							</svg>
					</button>
				</div>
						@endif
			</div>
			<div id="resume-container">				
				@include('components.applicant-resume.list-resume', ['my_resumes' => $my_resumes])
			</div>
		</div>
    </div>
	@include('components.dialog', ['title' => 'Are You Sure?', 'text_content' => 'This action will submit the form', 'class' => 'modal-warning', 'icon' => 'warning', 'isHxSwap' => false])

</div>


@section('scripts')
	<script>

		$(document).ready(function(){
			let dropzone = $('#dropzone-parent');

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
			$('.show-policy-modal').on('click', function(){
				event.preventDefault();
				$('.privacy-policy').show();
			});
			$('.btn-close-policy').on('click', function(){
				$('.privacy-policy').hide();
			});
			
			dropzone.on('dragover', function(event) {
				event.preventDefault();
			});

			dropzone.on('drop', function(event) {
				event.preventDefault();
				let files = event.originalEvent.dataTransfer.files;
				$('#dropzone-file')[0].files = files;
				updateFileName(files);
			});

			$(document).on('change', '#dropzone-file', function(event){
				let files = event.target.files;
				updateFileName(files);
			});


			// Toggle dropdown menu
			$(document).on('click', '.dropdown svg', function(event) {
				event.stopPropagation();
				const $menu = $(this).closest('.dropdown').find('.dropdown-menu');
				$menu.toggleClass('hidden');
			});

			// Hide all dropdown menus when clicking outside
			$(document).on('click', function(event) {
				if (!$(event.target).closest('.dropdown').length) {
					$('.dropdown-menu').addClass('hidden');
				}
			});

			// Handle setting a resume as default
			$(document).on('click', '.default-btn', function() {
				var $this = $(this);
				var resumeId = $this.closest('[data-id]').data('id');
				var url = $this.attr('hx-get');
				$.get(url, function(data) {
					// Update the resume item in the DOM
					$(`[data-id="${resumeId}"]`).replaceWith(data);
				});
			});

			$('.delete-btn').click(function(e) {
				e.preventDefault();
				const entryId = $(this).data('entry-id');
				console.log(entryId);
				const url = $(this).attr('href');
				let editUrl = "{{ route('applicant.profile.delete-resume', 'entryId') }}";
				const newUrl = editUrl.replace('entryId', entryId);

				$('.dropdown-menu').addClass('hidden');
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

			$(document).on('click', '.download-btn', function(){
				const filePath = $(this).data('file-path');
				const route = `{{ route('applicant.profile.download-resume') }}?file_path=${filePath}`;
				location.assign(route);
			});

			$(document).on('click', '.view-resume', function() {
				const resumePath = $(this).data('file-path');
				const route = `{{ route('showResume') }}?file_path=${resumePath}`;
				// const route = "{{ route('showResume', ':resumePath') }}".replace(':resumePath', resumePath);
				$('#pdfShow').attr('src', route);
				console.log(resumePath, route);
				$('.show-resume').show();
			});

			$('.btn-close-resume').on('click', function(){
				$('.show-resume').hide();
				$('#pdfShow').attr('src', '');
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

			function updateFileName(files) {
				if (files && files[0] && files[0].type === 'application/pdf') {
					let file = files[0];
					let fileName = file.name;
					let fileContentContainer = $('#file-content');
					fileContentContainer.empty();
					fileContentContainer.append(`
						<svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
							<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
						</svg>
						<p class="mb-2 text-gray-500"><span class="font-semibold">${fileName}</span></p>
					`);
				} else {
					alert("Please upload a valid PDF file.");
				}
			}

			const timeagoNodes = document.querySelectorAll('.timeago');
				if (timeagoNodes.length) {
					timeago.render(timeagoNodes);
			}

		});

	</script>
@endsection
@endsection