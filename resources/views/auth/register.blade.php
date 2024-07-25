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
    <body class="flex flex-col min-h-screen m-auto font-sans antialiased text-gray-900">
  <div class="fixed inset-0 z-10 hidden w-full h-screen p-4 overflow-y-auto bg-black bg-opacity-75 modal-center modal-applicant">
            <div class="w-full max-w-lg m-auto bg-white rounded-lg shadow-lg modal-box animate-fade-in">
                <div class="flex flex-col p-3 modal-content">
                    <div>
                        <img src="{{ asset('img/emailNotif.png') }}" alt="" class="object-contain mx-auto w-80">
                    </div>
                    <div class="mb-4">
                        <h1 class="mb-2 text-xl font-bold text-center">Check Inbox And Spam Messages</h1>
                        <p class="p-2 text-center">A link will be sent to your email to verify your account. To continue, press the "Send Verification Link and login your account." </p>
                        <p class="p-2 italic text-center text-gray-400"> You will return to Login Page </p>
                    </div>
                    <div class="flex flex-row justify-center gap-10 p-2 ">
                        <button class="cancel-btn ">Cancel</button>
                        <button class="px-4 py-2 font-semibold text-white submit-applicant-btn bg-cyan-800 ">Send Verification Link</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="fixed inset-0 z-10 hidden w-full h-screen p-4 overflow-y-auto bg-black bg-opacity-75 modal-center modal-employer">
            <div class="w-full max-w-lg m-auto bg-white rounded-lg shadow-lg modal-box animate-fade-in">
                <div class="flex flex-col p-3 modal-content">
                    <div class="w-full max-w-lg m-auto bg-white rounded-lg shadow-lg modal-box animate-fade-in">
                        <div class="flex flex-col p-3 modal-content">
                            <div>
                                <img src="{{ asset('img/emailNotif.png') }}" alt="" class="object-contain mx-auto w-80">
                            </div>
                            <div class="mb-4">
                                <h1 class="mb-2 text-xl font-bold text-center">Check Inbox And Spam Messages</h1>
                                <p class="p-2 text-center">A link will be sent to your email to verify your account. To continue, press the "Send Verification Link and login your account." </p>
                                <p class="p-2 italic text-center text-gray-400"> You will return to Login Page </p>
                            </div>
                            <div class="flex flex-row justify-center gap-10 p-2 ">
                                <button class="cancel-btn ">Cancel</button>
                                <button class="px-4 py-2 font-semibold text-white submit-employer-btn bg-cyan-800 ">Send Verification Link</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full max-w-7xl flex flex-col sm:flex-row justify-center m-auto bg-white shadow-md overflow-hidden sm:h-[35rem]">
            <div class=" max-w-[520px] flex flex-col bg-primary bg-contain bg-no-repeat bg-center p-3">
                <div class ="p-3 mt-5">
                    <h1 id="applicantTitle" class="text-4xl font-bold text-slate-50 ">Applicant</h1>
                    <h1 id="employerTitle" class="hidden text-4xl font-bold text-slate-50">Employer</h1>
                </div>
                <div>
                    <p class="p-3 text-slate-50" id="applicantDes">Whether you're a seasoned nurse, an allied health expert, or a physician, we're here to support your career journey. Register today to access exclusive job opportunities, personalized support, and resources tailored to your unique skills and aspirations!</p>
                    <p class="hidden p-3 text-slate-50"id="employerDes">Gain access to a vast network of qualified and passionate healthcare professionals ready to meet your staffing needs. Let us help you deliver outstanding patient care by connecting you with top talent in the industry!</p>
                </div>
                <div class="p-3 ">
                    <img id="applicantImage" src="{{ asset('img/applicant.png') }}" alt="" class="object-contain mx-auto w-80">
                    <img id="employerImage" src="{{ asset('img/employer.png') }}" alt="" class="hidden object-contain mx-auto w-80">
                </div>
                <div class="flex justify-center gap-5 p-3 text-center ">
                    <button id="applicantButton" class="px-4 py-2 text-lg font-semibold bg-white border border-transparent rounded-md rounded-tr-none rounded-bl-none cursor-not-allowed text-slate-950 focus:outline-none focus:ring-2 focus:ring-white ring-offset-2 ring-offset-cyan-800 ring-2 ring-white" disabled>Applicant</button>
                    <button id="employerButton" class="px-4 py-2 text-lg font-semibold bg-white border border-transparent rounded-md rounded-tr-none rounded-bl-none text-slate-950">Employer</button>
                </div>
            </div>
            <div class="flex-1 w-full py-4 m-auto px-14" id="applicantForm">
                @if (session('error'))
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
                <form method="POST" action="{{ route('user.store','applicant') }}" id="submitApplicantForm">
                    @csrf
                    <!-- Name -->
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
                            <x-text-input id="contact_number" class="block w-full mt-1" type="text" name="contact_number" required/>
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
                            <x-text-input id="password" class="block w-full mt-1"
                                            type="password"
                                            name="password"
                                            required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <!-- Confirm Password -->
                        <div class="flex-col flex-grow mt-4 sm:flex-row ">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-text-input id="password_confirmation" class="block w-full mt-1"
                                            type="password"
                                            name="password_confirmation" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class="text-sm underline rounded-md text-cyan-600 dark:text-cyan-400 hover:text-cyan-900 dark:hover:text-cyan-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 dark:focus:ring-offset-cyan-500" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                        <x-primary-button class="ms-4 submit-applicant">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
            <div class="flex-1 hidden w-full py-4 m-auto px-14" id="employerForm">
                <form method="POST" action="{{ route('user.store','employer') }}" id="submitEmployerForm">
                    @csrf
                    <!-- Name -->
                    <div class="flex flex-col sm:flex-row sm:gap-5">
                        <div class="flex-grow">
                            <x-input-label for="company_name" :value="__('Company Name')" />
                            <x-text-input id="company_name" class="block w-full mt-1" type="text" name="company_name" required autofocus/>
                            <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
                        </div>
                        <div class="flex-grow mt-4 sm:mt-0">
                            <x-input-label for="company_website" :value="__('Company Website Link')" />
                            <x-text-input id="company_website" class="block w-full mt-1" type="text" name="company_website" placeholder="Not Required" autofocus/>
                            <x-input-error :messages="$errors->get('company_website')" class="mt-2" />
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:gap-5">
                        <div class="flex-grow mt-4">
                            <x-input-label for="company_number" :value="__('Company Contact Number')" />
                            <x-text-input id="company_number" class="block w-full mt-1" type="text" name="contact_number" required/>
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
                            <x-text-input id="password" class="block w-full mt-1"
                                            type="password"
                                            name="password"
                                            required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <!-- Confirm Password -->
                        <div class="flex-col flex-grow mt-4 sm:flex-row ">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-text-input id="password_confirmation" class="block w-full mt-1"
                                            type="password"
                                            name="password_confirmation" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class="text-sm underline rounded-md text-cyan-600 dark:text-cyan-400 hover:text-cyan-900 dark:hover:text-cyan-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 dark:focus:ring-offset-cyan-500" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                        <x-primary-button class="ms-4 submit-employer">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </body>
    <script>
            $(document).ready(function() {
                function toggleButtonState(clickedButton, otherButton) {
                    $(clickedButton).toggleClass("ring-offset-2 ring-offset-cyan-800 ring-2 ring-white cursor-not-allowed");
                    $(clickedButton).prop("disabled", !$(clickedButton).prop("disabled"));
                    $(otherButton).removeClass("ring-offset-2 ring-offset-cyan-800 ring-2 ring-white cursor-not-allowed");
                    $(otherButton).prop("disabled", false);
                }

                function toggleItemState(displayItem, hideItem) {
                    $(hideItem).addClass("hidden");
                    $(displayItem).removeClass("hidden");
                }

				function clearFormInputs(formId) {
					$(formId).find("input[type='text'], input[type='email'], input[type='password'], input[type='date']").val("");
				}

                $("#applicantButton").click(function() {
                    toggleButtonState(this, "#employerButton");
                    toggleItemState("#applicantTitle", "#employerTitle");
                    toggleItemState("#applicantImage", "#employerImage");
                    toggleItemState("#applicantForm", "#employerForm");
                    toggleItemState("#applicantDes", "#employerDes");
					clearFormInputs("#employerForm");
                });

                $("#employerButton").click(function() {
                    toggleButtonState(this, "#applicantButton");
                    toggleItemState("#employerTitle", "#applicantTitle");
                    toggleItemState("#employerImage", "#applicantImage");
                    toggleItemState("#employerForm", "#applicantForm");
                    toggleItemState("#employerDes", "#applicantDes");
					clearFormInputs("#applicantForm");
                });

                $(".submit-applicant").click(function(event) {
                    event.preventDefault();
                    $(".modal-applicant").removeClass("hidden").css("display", "flex");
                });
                $(".submit-employer").click(function(event) {
                    event.preventDefault();
                    $(".modal-employer").removeClass("hidden").css("display", "flex");
                });

                $(".cancel-btn").click(function() {
                    $(".modal-center").css("display", "none").addClass("hidden");
                });
                
                $(".submit-applicant-btn").click(function() {
                    console.log("testing");
                    $("#submitApplicantForm").submit();
                });
                $(".submit-employer-btn").click(function() {
                    $("#submitEmployerForm").submit();
                });
            });
    </script>
</html>
    
    
    

