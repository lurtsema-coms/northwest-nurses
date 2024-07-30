<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="flex flex-col items-center justify-center min-h-screen py-5">
      <div class="container flex flex-col items-center justify-center mx-auto gap-y-10 lg:flex-row" x-data="formData">
        <div x-show="modalIsOpen" class="fixed inset-0 z-10 flex items-center justify-center w-full h-screen p-4 overflow-y-auto bg-black bg-opacity-75 modal-center">
          <div class="w-full max-w-lg m-auto bg-white rounded-lg shadow-lg modal-box animate-fade-in">
              <div class="flex flex-col p-3 modal-content" @click.away="modalIsOpen = false; isSubmitting = false">
                  <div>
                      <img src="{{ asset('img/emailNotif.png') }}" alt="" class="object-contain mx-auto w-80">
                  </div>
                  <div class="mb-4">
                      <h1 class="mb-2 text-xl font-bold text-center">Check Inbox And Spam Messages</h1>
                      <p class="p-2 text-center">A link will be sent to your email to verify your account. To continue, press the "Send Verification Link and login your account." </p>
                      <p class="p-2 italic text-center text-gray-400"> You will be redirected to Login Page </p>
                  </div>
                  <div class="flex flex-row justify-center gap-10 p-2 ">
                      <button class="cancel-btn" @click="modalIsOpen = false; isSubmitting = false">Cancel</button>
                      <button @click="handleSubmit()" class="flex gap-2 px-4 py-2 font-semibold text-white submit-applicant-btn bg-cyan-800" :disabled="isSubmitting">
                        Send Verification Link 
                        <svg x-show="isSubmitting" class="w-5 h-5 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                          <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                          <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>       
                      </button>
                  </div>
              </div>
          </div>
        </div>
        <div class="w-full flex flex-col justify-between p-5 lg:p-10 bg-primary min-h-[580px]">
          <div class="w-full" x-show="role == 'applicant'">
            <h1 class="text-4xl font-bold text-slate-50">Applicant</h1>
            <p class="my-5 text-slate-50">Whether you're a seasoned nurse, an allied health expert, or a physician, we're here to support your career journey. Register today to access exclusive job opportunities, personalized support, and resources tailored to your unique skills and aspirations!</p>
            <img src="{{ asset('img/applicant.png') }}" alt="" class="object-contain mx-auto w-80">
          </div>
          <div class="w-full" x-show="role == 'employer'">
            <h1 class="text-4xl font-bold text-slate-50">Employer</h1>
            <p class="my-5 text-slate-50">Gain access to a vast network of qualified and passionate healthcare professionals ready to meet your staffing needs. Let us help you deliver outstanding patient care by connecting you with top talent in the industry!</p>
            <img src="{{ asset('img/employer.png') }}" alt="" class="object-contain mx-auto w-80">
          </div>
          <div class="flex justify-center gap-5 p-3 text-center ">
            <button @click="role = 'applicant'" id="applicantButton" :class="{'focus:outline-none focus:ring-2 focus:ring-white ring-offset-2 ring-offset-cyan-800 ring-2 ring-white opacity-75' : role == 'applicant'}" class="px-4 py-2 text-lg font-semibold bg-white border border-transparent rounded-md rounded-tr-none rounded-bl-none text-slate-950">Applicant</button>
            <button @click="role = 'employer'" id="employerButton" :class="{'focus:outline-none focus:ring-2 focus:ring-white ring-offset-2 ring-offset-cyan-800 ring-2 ring-white opacity-75' : role == 'employer'}" class="px-4 py-2 text-lg font-semibold bg-white border border-transparent rounded-md rounded-tr-none rounded-bl-none text-slate-950">Employer</button>
          </div>
        </div>
        <div class="flex flex-col justify-between w-full p-5 lg:p-10 place-self-stretch">
          @if(session('error'))
            <div id="dismiss-toast" class="w-full mb-5 text-sm text-white bg-red-500 shadow-lg rounded-xl" role="alert" tabindex="-1" aria-labelledby="hs-toast-solid-color-red-label">
              <div id="hs-toast-solid-color-red-label" class="flex p-4">
                {{ session('error') }}
                <div class="ms-auto">
                  <button type="button" class="inline-flex items-center justify-center text-white rounded-lg opacity-50 shrink-0 size-5 hover:text-white hover:opacity-100 focus:outline-none focus:opacity-100" aria-label="Close" data-hs-remove-element="#dismiss-toast">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M18 6 6 18"></path>
                      <path d="m6 6 12 12"></path>
                    </svg>
                  </button>
                </div>
              </div>
            </div>
          @endif   
          <form method="POST" id="applicantForm" x-show="role == 'applicant'" action="{{ route('user.store','applicant') }}" enctype="multipart/form-data" class="flex flex-col justify-between w-full h-full">
            @csrf
            <div class="w-full">
              <div class="flex flex-col sm:flex-row sm:gap-5">
                  <div class="flex-grow">
                      <x-input-label for="first_name" :value="__('First Name')" />
                      <x-text-input id="first_name" class="block w-full mt-1" type="text" name="first_name" required autofocus/>
                      <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                  </div>
                  <div class="flex-grow mt-4 sm:mt-0">
                      <x-input-label for="last_name" :value="__(' Last Name')" />
                      <x-text-input id="last_name" class="block w-full mt-1" type="text" name="last_name"  required autofocus/>
                      <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                  </div>
              </div>
              <div class="flex flex-col sm:flex-row sm:gap-5">
                  <div class="flex-grow mt-4">
                      <x-input-label for="contact_number" :value="__('Contact Number')" />
                      <x-text-input id="contact_number" class="block w-full mt-1" oninput="this.value = this.value.replace(/\D/gi, '')" type="text" name="contact_number" required/>
                      <x-input-error :messages="$errors->get('contact_number')" class="mt-2" />
                  </div>
                  <div class="flex-grow mt-4">
                      <x-input-label for="email" :value="__('Email')" />
                      <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required/>
                      <x-input-error :messages="$errors->get('email')" class="mt-2" />
                  </div>
              </div>
              <div class="flex flex-col sm:flex-row sm:gap-5">
                  <div class="flex-grow mt-4">
                      <x-input-label for="home_address" :value="__('Home Address')" />
                      <x-text-input id="home_address" class="block w-full mt-1" type="text" name="address"  required/>
                      <x-input-error :messages="$errors->get('address')" class="mt-2" />
                  </div>
              </div>
              <div class="flex flex-col sm:flex-row sm:gap-5">
                  <div class="flex-grow mt-4 ">
                      <x-input-label for="sex" :value="__('Sex')" />
                      <select name="sex" id="sex" class="block w-full mt-1 rounded-md shadow-sm border-cyan-600 focus:border-cyan-600 dark:focus:border-cyan-600 focus:ring-cyan-600 dark:focus:ring-cyan-600" required>
                          <option selected disabled value="">None selected</option>
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                      </select>
                      <x-input-error :messages="$errors->get('sex')" class="mt-2" />
                  </div>
                  <div class="flex-grow mt-4 ">
                    <x-input-label for="birthdate" :value="__('Date of Birth')" />
                    <x-text-input id="birthdate" class="block w-full mt-1" type="date" name="birthdate"  required/>
                    <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
                  </div>
              </div>
              <div class="flex flex-col sm:flex-row sm:gap-5">
                  <div class="flex-grow mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input class="block w-full mt-1"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                  </div>
                  <div class="flex-col flex-grow mt-4 sm:flex-row ">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input class="block w-full mt-1"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                  </div>
              </div>
              <div class="mt-4 mb-2">
                <x-input-label for="Resume" :value="__('Upload Resume:')" />
                <div class="relative flex flex-col items-center justify-center w-full overflow-hidden">
                  <label for="dropzone-file" id="dropzone-parent" class="flex flex-col items-center justify-center w-full h-[6rem] border border-cyan-600  rounded-lg cursor-pointer bg-gray-50" draggable="true">
                    <input id="dropzone-file" type="file" class="absolute -z-10 w-7" name="resume" accept=".pdf" required>
                    <div class="flex flex-col items-center justify-center pt-5 pb-6" id="file-content">
                      <svg class="w-8 h-8 text-gray-500 aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                      </svg>
                      <p class="text-gray-500"><span class="font-semibold">Click to upload resume</span> or drag and drop</p>
                      <p class="text-xs text-gray-500">PDF only (MAX. 2MB)</p>
                    </div>
                  </label>
                  <x-input-error :messages="$errors->get('resume')" class="mt-2" />
                </div>
              </div>
            </div>
          </form>
          <form method="POST" id="employerForm" x-show="role == 'employer'" action="{{ route('user.store','employer') }}" class="flex flex-col justify-between w-full h-full">
            @csrf
            <div class="w-full">
              <div class="flex flex-col sm:flex-row sm:gap-5">
                <div class="flex-grow">
                  <x-input-label for="company_name" :value="__('Company Name')" />
                  <x-text-input id="company_name" class="block w-full mt-1" type="text" name="company_name" required autofocus/>
                  <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
                </div>
                <div class="flex-grow mt-4 sm:mt-0">
                  <x-input-label for="company_website" :value="__('Company Website Link')" />
                  <x-text-input id="company_website" class="block w-full mt-1" type="text" name="company_website" placeholder="Optional" autofocus/>
                  <x-input-error :messages="$errors->get('company_website')" class="mt-2" />
                </div>
              </div>
              <div class="flex flex-col sm:flex-row lg:flex-col xl:flex-row sm:gap-5">
                  <div class="flex-grow mt-4">
                    <x-input-label for="company_number" :value="__('Company Contact Number')" />
                    <x-text-input id="company_number" oninput="this.value = this.value.replace(/\D/gi, '')" class="block w-full mt-1" type="text" name="contact_number" required/>
                    <x-input-error :messages="$errors->get('company_number')" class="mt-2" />
                  </div>
                  <div class="flex-grow mt-4">
                    <x-input-label for="contact_email" :value="__('Contact Email')" /> 
                    <x-text-input id="contact_email" class="block w-full mt-1" type="email" name="email"  required/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                  </div>
              </div>
              <div>
                <div class="flex-grow mt-4">
                  <x-input-label for="company_address" :value="__(' Company Address')" />
                  <x-text-input id="company_address" class="block w-full mt-1" type="text" name="address" required autofocus/>
                  <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>
              </div>
              <div class="flex flex-col sm:flex-row sm:gap-5">
                  <div class="flex-grow mt-4">
                      <x-input-label for="password" :value="__('Password')" />
                      <x-text-input class="block w-full mt-1"
                                      type="password"
                                      name="password"
                                      required autocomplete="new-password" />
                      <x-input-error :messages="$errors->get('password')" class="mt-2" />
                  </div>
                  <!-- Confirm Password -->
                  <div class="flex-col flex-grow mt-4 sm:flex-row ">
                      <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                      <x-text-input class="block w-full mt-1"
                                      type="password"
                                      name="password_confirmation" required autocomplete="new-password" />
                      <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                  </div>
              </div>
            </div>
          </form>
          <div class="flex items-center justify-end mt-1">
              <a class="text-sm underline rounded-md text-cyan-600 dark:text-cyan-400 hover:text-cyan-900 dark:hover:text-cyan-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 dark:focus:ring-offset-cyan-500" href="{{ route('login') }}">
                  {{ __('Already registered?') }}
              </a>
              <x-primary-button class="flex gap-3 ms-4 submit-applicant" @click="modalIsOpen = true" type="button">
                  {{ __('Register') }}
              </x-primary-button>
          </div>
        </div>
      </div>
      <script>

        $(document).ready(function(){
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
                <svg class="w-8 h-8 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                </svg>
                <p class="mb-2 text-gray-500"><span class="font-semibold">${fileName}</span></p>
              `);
            } else {
              alert("Please upload a valid PDF file.");
            }
          }

        });

        document.addEventListener('alpine:init', () => {
          Alpine.data('formData', () => ({
              role: 'applicant', 
              modalIsOpen: false, 
              isSubmitting: false,
              handleSubmit() {
                let form;
                if (this.role == 'applicant') {
                  form = document.querySelector('#applicantForm');
                } else if (this.role == 'employer') {
                  form = document.querySelector('#employerForm');
                }
                if (form.reportValidity()) {
                  this.isSubmitting = true;
                  form.submit();
                } else {
                  this.modalIsOpen = false;
                }
              }
          }))
        })
      </script>
    </body>
</html>
    
    
    

