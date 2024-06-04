@extends('layouts.applicant')
@section('title', 'My Profile')
@section('content')
<div class="container mx-auto my-10">
	<h1 class="text-3xl text-center font-bold my-10">My Profile</h1>
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
					<x-text-input value="{{ $email }}" id="email" class="block mt-1 w-full" type="email" name="email" required/>
					<x-input-error :messages="$errors->get('email')" class="mt-2" />
				</div>
			</div>

			<div class="flex flex-col sm:flex-row sm:gap-5">
				<div class="mt-4 flex-grow">
					<x-input-label for="home_address" :value="__('Home Address')" />
					<x-text-input value="{{ $address }}" id="home_address" class="block mt-1 w-full" type="text" name="address"  required/>
					<x-input-error :messages="$errors->get('address')" class="mt-2" />
				</div>
				<div class="mt-4 ">
					<x-input-label for="birthdate" :value="__('Date of Birth')" />
					<x-text-input value="{{ $birthdate }}" id="birthdate" class="block mt-1 w-full" type="date" name="birthdate"  required/>
					<x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
				</div>
			</div>

			<div class="flex flex-col sm:flex-row sm:gap-5">
				<div class="mt-4 flex-grow">
					<x-input-label for="password" :value="__('Password')" />
					<x-text-input id="password" class="block mt-1 w-full"
									type="password"
									name="password"
									required autocomplete="new-password" />
					<x-input-error :messages="$errors->get('password')" class="mt-2" />
				</div>
				<!-- Confirm Password -->
				<div class="mt-4 flex-col sm:flex-row flex-grow  ">
					<x-input-label for="password_confirmation" :value="__('Confirm Password')" />
					<x-text-input id="password_confirmation" class="block mt-1 w-full"
									type="password"
									name="password_confirmation" required autocomplete="new-password" />
					<x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
				</div>
			</div>

			<div class="flex items-center justify-end mt-4">
				<x-primary-button class="ms-4 submit-applicant">
					{{ __('Save') }}
				</x-primary-button>
			</div>
		</form>
		@if (session('success'))
		<div id="update-success" class="max-w-xs bg-teal-500 text-sm text-white rounded-xl shadow-lg" role="alert">
			<div class="flex p-4">
			{{ session('success') }}
			<div class="ms-auto">
				<button type="button" class="inline-flex flex-shrink-0 justify-center items-center size-5 rounded-lg text-white hover:text-white opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100" data-hs-remove-element="#update-success">
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

@endsection