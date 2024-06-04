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
    <body class="font-sans text-gray-900 antialiased flex m-auto min-h-screen">
        <div class="modal-center modal-applicant fixed inset-0 h-screen w-full bg-black bg-opacity-75  p-4 z-10 overflow-y-auto hidden">
            <div class="modal-box m-auto w-full max-w-lg bg-white shadow-lg rounded-lg animate-fade-in">
                <div class="modal-content flex flex-col p-3">
                    <div>
                        <img src="{{ asset('img/emailNotif.png') }}" alt="" class=" w-80 object-contain mx-auto ">
                    </div>
                    <div class="mb-4">
                        <h1 class="text-xl font-bold text-center mb-2">Check Inbox And Spam Messages</h1>
                        <p class="p-2 text-center">A link will be sent to your email to verify your account. To continue, press the "Send Verification Link and login your account." </p>
                        <p class="p-2 text-center italic text-gray-400"> You will return to Login Page </p>
                    </div>
                    <div class="flex flex-row gap-10 justify-center p-2 ">
                        <button class="cancel-btn ">Cancel</button>
                        <button class="submit-applicant-btn font-semibold py-2 px-4 bg-cyan-800 text-white ">Send Verification Link</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-center modal-employer fixed inset-0 h-screen w-full bg-black bg-opacity-75  p-4 z-10 overflow-y-auto hidden">
            <div class="modal-box m-auto w-full max-w-lg bg-white shadow-lg rounded-lg animate-fade-in">
                <div class="modal-content flex flex-col p-3">
                    <div class="modal-box m-auto w-full max-w-lg bg-white shadow-lg rounded-lg animate-fade-in">
                        <div class="modal-content flex flex-col p-3">
                            <div>
                                <img src="{{ asset('img/emailNotif.png') }}" alt="" class=" w-80 object-contain mx-auto ">
                            </div>
                            <div class="mb-4">
                                <h1 class="text-xl font-bold text-center mb-2">Check Inbox And Spam Messages</h1>
                                <p class="p-2 text-center">A link will be sent to your email to verify your account. To continue, press the "Send Verification Link and login your account." </p>
                                <p class="p-2 text-center italic text-gray-400"> You will return to Login Page </p>
                            </div>
                            <div class="flex flex-row gap-10 justify-center p-2 ">
                                <button class="cancel-btn ">Cancel</button>
                                <button class="submit-employer-btn font-semibold py-2 px-4 bg-cyan-800 text-white ">Send Verification Link</button>
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
                    <h1 id="employerTitle" class="text-4xl font-bold text-slate-50 hidden">Employer</h1>
                </div>
                <div>
                    <p class="p-3 text-slate-50" id="applicantDes">Whether you're a seasoned nurse, an allied health expert, or a physician, we're here to support your career journey. Register today to access exclusive job opportunities, personalized support, and resources tailored to your unique skills and aspirations!</p>
                    <p class="p-3 text-slate-50 hidden"id="employerDes">Gain access to a vast network of qualified and passionate healthcare professionals ready to meet your staffing needs. Let us help you deliver outstanding patient care by connecting you with top talent in the industry!</p>
                </div>
                <div class="p-3 ">
                    <img id="applicantImage" src="{{ asset('img/applicant.png') }}" alt="" class=" w-80 object-contain mx-auto">
                    <img id="employerImage" src="{{ asset('img/employer.png') }}" alt="" class=" w-80 object-contain mx-auto hidden">
                </div>
                <div class="p-3 flex justify-center text-center gap-5 ">
                    <button id="applicantButton" class="bg-white text-lg px-4 py-2  border border-transparent rounded-md font-semibold text-slate-950 rounded-bl-none rounded-tr-none focus:outline-none focus:ring-2 focus:ring-white ring-offset-2 ring-offset-cyan-800 ring-2 ring-white cursor-not-allowed" disabled>Applicant</button>
                    <button id="employerButton" class="bg-white text-lg px-4 py-2  border border-transparent rounded-md font-semibold text-slate-950 rounded-bl-none rounded-tr-none">Employer</button>
                </div>
            </div>
            <div class="w-full flex-1 px-14 py-4 m-auto" id="applicantForm">
                <form method="POST" action="{{ route('user.store','applicant') }}" id="submitApplicantForm">
                    @csrf
                    <!-- Name -->
                    <div class="flex flex-col sm:flex-row sm:gap-5">
                        <div class="flex-grow">
                            <x-input-label for="first_name" :value="__('First Name')" />
                            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" required autofocus/>
                            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                        </div>
                        <div class="mt-4 sm:mt-0 flex-grow">
                            <x-input-label for="last_name" :value="__(' Last Name')" />
                            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"  required autofocus/>
                            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:gap-5">
                        <div class="mt-4 flex-grow">
                            <x-input-label for="contact_number" :value="__('Contact Number')" />
                            <x-text-input id="contact_number" class="block mt-1 w-full" type="text" name="contact_number" required/>
                            <x-input-error :messages="$errors->get('contact_number')" class="mt-2" />
                        </div>
                        <div class="mt-4 flex-grow">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required/>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:gap-5">
                        <div class="mt-4 flex-grow">
                            <x-input-label for="home_address" :value="__('Home Address')" />
                            <x-text-input id="home_address" class="block mt-1 w-full" type="text" name="address"  required/>
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:gap-5">
                        <div class="mt-4 flex-grow ">
                            <x-input-label for="sex" :value="__('Sex')" />
                            <select name="sex" id="sex" class="block mt-1 w-full border-cyan-600 focus:border-cyan-600 dark:focus:border-cyan-600 focus:ring-cyan-600 dark:focus:ring-cyan-600 rounded-md shadow-sm" required>
                                <option selected disabled value="">None selected</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <x-input-error :messages="$errors->get('sex')" class="mt-2" />
                        </div>
                        <div class="mt-4 flex-grow ">
                            <x-input-label for="birthdate" :value="__('Date of Birth')" />
                            <x-text-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate"  required/>
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
                        <a class="underline text-sm text-cyan-600 dark:text-cyan-400 hover:text-cyan-900 dark:hover:text-cyan-500 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 dark:focus:ring-offset-cyan-500" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                        <x-primary-button class="ms-4 submit-applicant">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
            <div class=" w-full flex-1 px-14 py-4 m-auto hidden" id="employerForm">
                <form method="POST" action="{{ route('user.store','employer') }}" id="submitEmployerForm">
                    @csrf
                    <!-- Name -->
                    <div class="flex flex-col sm:flex-row sm:gap-5">
                        <div class="flex-grow">
                            <x-input-label for="company_name" :value="__('Company Name')" />
                            <x-text-input id="company_name" class="block mt-1 w-full" type="text" name="company_name" required autofocus/>
                            <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
                        </div>
                        <div class="mt-4 sm:mt-0 flex-grow">
                            <x-input-label for="company_website" :value="__('Company Website')" />
                            <x-text-input id="company_website" class="block mt-1 w-full" type="text" name="company_website" required autofocus/>
                            <x-input-error :messages="$errors->get('company_website')" class="mt-2" />
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:gap-5">
                        <div class="mt-4 flex-grow">
                            <x-input-label for="company_number" :value="__('Company Contact Number')" />
                            <x-text-input id="company_number" class="block mt-1 w-full" type="text" name="contact_number" required/>
                            <x-input-error :messages="$errors->get('company_number')" class="mt-2" />
                        </div>
                        <div class="mt-4 flex-grow">
                            <x-input-label for="contact_email" :value="__('Contact Email')" />
                            <x-text-input id="contact_email" class="block mt-1 w-full" type="email" name="email"  required/>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </div>
					<div>
						<div class="flex-grow mt-4">
                            <x-input-label for="company_address" :value="__(' Company Address')" />
                            <x-text-input id="company_address" class="block mt-1 w-full" type="text" name="address" required autofocus/>
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
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
                        <a class="underline text-sm text-cyan-600 dark:text-cyan-400 hover:text-cyan-900 dark:hover:text-cyan-500 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 dark:focus:ring-offset-cyan-500" href="{{ route('login') }}">
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
    
    
    

