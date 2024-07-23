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
					<button type="button" class="btn-close-email">Cancel</button>
					<button class="font-semibold py-2 px-4 bg-cyan-800 text-white ">Logout And Verify Email</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="container mx-auto my-5 py-10">
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

<div class="container mx-auto my-5 py-10">
    <div class="mx-3 lg:mx-auto py-10 px-5 md:px-16 shadow-md max-w-screen-lg rounded-lg">
		<div>
			<form method="POST" action="{{ route('applicant.profile.add-resume', auth()->user()->id) }}" enctype="multipart/form-data" autocomplete="off">
				@csrf
				@method('PUT')
					<h3 class="font-bold text-2xl mb-5">Add Resume</h3>
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
						<p class="text-justify indent-4">Protect your privacy Only share necessary information. Don't include the content of identity documents, financial information or other sensitive information such as your religion or race. By uploading, you agree to our Privacy Statement. In an application, we remove external links from documents to adhere to our security standards.</p>
					</div>
					<div class="flex items-center justify-end mt-4">
						<x-primary-button class="ms-4 submit-applicant">
							{{ __('UPLOAD') }}
						</x-primary-button>
					</div>
			</form>
		</div>
		<div class="my-5">
			<h3 class="font-bold text-2xl">Manage Resume</h3>
			<div class="my-5">
				@if (session('successResume'))
				<div class="max-w-xs bg-teal-500 text-sm text-white rounded-xl shadow-lg update-success" role="alert">
					<div class="flex p-4">
					{{ session('successResume') }}
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
			<div class="relative flex items-center justify-center w-full sm:w-2/3 overflow-hidden mt-5">
				<label  class="flex items-center justify-center w-full  h-[8rem] border-2 border-gray-300 rounded-lg bg-gray-50 py-5 px-10	">
					<div class="hidden lg:block">
						<svg class="w-8 h-8 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
							<path fill="currentColor" d="M64 464l48 0 0 48-48 0c-35.3 0-64-28.7-64-64L0 64C0 28.7 28.7 0 64 0L229.5 0c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3L384 304l-48 0 0-144-80 0c-17.7 0-32-14.3-32-32l0-80L64 48c-8.8 0-16 7.2-16 16l0 384c0 8.8 7.2 16 16 16zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z"/>
						</svg>
					</div>
					<div class="mx-2 lg:mx-10">
						<div class="">
							<span class="m-auto py-2 px-4 text-sm font-semibold bg-gray-200 rounded text-black">Default</span>
						</div>
						<div>
							<h1 class="max-w-[200px] sm:max-w-[300px] whitespace-nowrap overflow-hidden text-ellipsis text-lg font-semibold my-1">resume_Gabriel_Quing_Updated.pdf</h1>
							<span class="text-gray-500">Added about 1 month ago</span>
						</div>
					</div>
					<div class="relative p-1 rounded-3xl hover:bg-gray-200 cursor-pointer dropdown">
						<svg class="w-8 h-8 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 512">
							<path fill="currentColor" d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/>
						</svg>
						<div class="bg-white absolute right-[44px] top-[-20px] py-1 z-10 hidden dropdown-menu rounded-xl shadow-md">
							<span class="text-lg w-full cursor-pointer px-3 py-1 hover:bg-gray-100 flex mb-1 font-semibold text-gray-800 ">
								<svg class="w-8 h-5 text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
									<path fill="currentColor" d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 242.7-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7 288 32zM64 352c-35.3 0-64 28.7-64 64l0 32c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-32c0-35.3-28.7-64-64-64l-101.5 0-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352 64 352zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/>
								</svg>Download
							</span>
							<span class="text-lg w-full cursor-pointer px-3 py-1 hover:bg-gray-100 flex font-semibold text-red-500">
								<svg class="w-8 h-6 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
									<path fill="currentColor" d="M64 80c-8.8 0-16 7.2-16 16l0 320c0 8.8 7.2 16 16 16l320 0c8.8 0 16-7.2 16-16l0-320c0-8.8-7.2-16-16-16L64 80zM0 96C0 60.7 28.7 32 64 32l320 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64L0 96zM152 232l144 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-144 0c-13.3 0-24-10.7-24-24s10.7-24 24-24z"/>
								</svg>
								Delete
							</span>
						</div>
					</div>
				</label>
			</div>
			<div class="relative flex items-center justify-center w-full sm:w-2/3 overflow-hidden mt-5">
				<label  class="flex items-center justify-center w-full  h-[8rem] border-2 border-gray-300 rounded-lg bg-gray-50 py-5 px-10	">
					<div class="hidden lg:block">
						<svg class="w-8 h-8 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
							<path fill="currentColor" d="M64 464l48 0 0 48-48 0c-35.3 0-64-28.7-64-64L0 64C0 28.7 28.7 0 64 0L229.5 0c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3L384 304l-48 0 0-144-80 0c-17.7 0-32-14.3-32-32l0-80L64 48c-8.8 0-16 7.2-16 16l0 384c0 8.8 7.2 16 16 16zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z"/>
						</svg>
					</div>
					<div class="mx-2 lg:mx-10">
						<div>
							<h1 class="max-w-[200px] sm:max-w-[300px] whitespace-nowrap overflow-hidden text-ellipsis text-lg font-semibold my-1">resume_Gabriel_Quing_Updated.pdf</h1>
							<span class="text-gray-500">Added about 1 month ago</span>
						</div>
					</div>
					<div class="relative p-1 rounded-3xl hover:bg-gray-200 cursor-pointer dropdown">
						<svg class="w-8 h-8 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 512">
							<path fill="currentColor" d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/>
						</svg>
						<div class="bg-white absolute right-[44px] top-[-44px] py-1 z-10 hidden dropdown-menu rounded-xl shadow-md">
							<span class="text-lg w-full cursor-pointer px-3 py-1 hover:bg-gray-100 flex mb-1 font-semibold text-gray-800 ">
								<svg class="w-8 h-5 text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
									<path fill="currentColor" d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"/>
								</svg>
								Default
							</span>
							<span class="text-lg w-full cursor-pointer px-3 py-1 hover:bg-gray-100 flex mb-1 font-semibold text-gray-800 ">
								<svg class="w-8 h-5 text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
									<path fill="currentColor" d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 242.7-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7 288 32zM64 352c-35.3 0-64 28.7-64 64l0 32c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-32c0-35.3-28.7-64-64-64l-101.5 0-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352 64 352zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/>
								</svg>Download
							</span>
							<span class="text-lg w-full cursor-pointer px-3 py-1 hover:bg-gray-100 flex font-semibold text-red-500">
								<svg class="w-8 h-6 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
									<path fill="currentColor" d="M64 80c-8.8 0-16 7.2-16 16l0 320c0 8.8 7.2 16 16 16l320 0c8.8 0 16-7.2 16-16l0-320c0-8.8-7.2-16-16-16L64 80zM0 96C0 60.7 28.7 32 64 32l320 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64L0 96zM152 232l144 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-144 0c-13.3 0-24-10.7-24-24s10.7-24 24-24z"/>
								</svg>
								Delete
							</span>
						</div>
					</div>
				</label>
			</div>
		</div>
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

			let dropzone = $('#dropzone-parent');

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
			$('.dropdown').on('click', function() {
                $(this).find('.dropdown-menu').toggle();
            });
		
		});

	</script>
@endsection
@endsection