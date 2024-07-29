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
			@foreach ($my_resumes as $my_resume)
				@include('components.applicant-resume.list-resume', ['my_resume' => $my_resume])
			@endforeach
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

			// $('.dropdown').on('click', function(event) {
			// 	event.stopPropagation();
			// 	$(this).find('.dropdown-menu').toggle();
			// });

			// $(document).on('click', function() {
			// 	$('.dropdown-menu').hide();
			// });

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