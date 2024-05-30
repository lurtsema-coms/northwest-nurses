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
        <div class="w-full max-w-7xl flex flex-row justify-center m-auto bg-white shadow-md overflow-hidden h-[35rem]">
            <div class=" max-w-[520px] flex flex-col bg-primary bg-contain bg-no-repeat bg-center p-3">
                <div class ="p-3 mt-5">
                    <h1 id="applicantTitle" class="text-4xl font-bold text-slate-50 ">Applicant</h1>
                    <h1 id="employerTitle" class="text-4xl font-bold text-slate-50 hidden">Employer</h1>
                </div>
                <div>
                    <p class="p-3 text-slate-50">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repudiandae delectus vero doloremque, minus accusantium? Iste, maxime quam. Consectetur architecto ipsam impedit quod dolor sequi neque in, reiciendis ratione quasi.</p>
                </div>
                <div class="p-3 ">
                    <img id="applicantImage" src="{{ asset('img/applicant.png') }}" alt="" class=" w-80 object-contain mx-auto">
                    <img id="employerImage" src="{{ asset('img/employer.png') }}" alt="" class=" w-80 object-contain mx-auto hidden">
                </div>
                <div class="p-3 flex justify-center text-center gap-5 ">
                    <x-primary-button id="applicantButton" class="bg-white text-dark rounded-bl-none rounded-tr-none focus:outline-none focus:ring-2 focus:ring-white ring-offset-2 ring-offset-cyan-800 ring-2 ring-white cursor-not-allowed" disabled>Applicant</x-primary-button>
                    <x-primary-button id="employerButton" class="bg-white text-dark rounded-bl-none rounded-tr-none">Employer</x-primary-button>
                </div>
            </div>
            <div class="w-full flex-1 px-14 py-4 m-auto" id="applicantForm">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- Name -->
                    <div class="flex gap-5">
                        <div class="flex-grow">
                            <x-input-label for="name" :value="__('First Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="flex-grow">
                            <x-input-label for="name" :value="__(' Last Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex gap-5">
                        <div class="mt-4 flex-grow">
                            <x-input-label for="email" :value="__('Contact Number')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="mt-4 flex-grow">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex gap-5">
                        <div class="mt-4 flex-grow">
                            <x-input-label for="email" :value="__('Home Address')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="mt-4 ">
                            <x-input-label for="email" :value="__('Date of Birth')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="date" name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex gap-5">
                        <div class="mt-4 flex-grow">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <!-- Confirm Password -->
                        <div class="mt-4 flex-grow  ">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                            type="password"
                                            name="password_confirmation" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                        <x-primary-button class="ms-4">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
            <div class=" w-full flex-1 px-14 py-4 m-auto hidden" id="employerForm">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- Name -->
                    <div class="flex gap-5">
                        <div class="flex-grow">
                            <x-input-label for="name" :value="__('Company Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="flex-grow">
                            <x-input-label for="name" :value="__('Company Website')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                    </div>
                    <div class="flex gap-5">
                        <div class="mt-4 flex-grow">
                            <x-input-label for="email" :value="__('Company Contact Number')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="mt-4 flex-grow">
                            <x-input-label for="email" :value="__('Contact Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </div>
					<div>
						<div class="flex-grow mt-4">
                            <x-input-label for="name" :value="__(' Company Address')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
					</div>
                    <div class="flex gap-5">
                        <div class="mt-4 flex-grow">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <!-- Confirm Password -->
                        <div class="mt-4 flex-grow  ">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                            type="password"
                                            name="password_confirmation" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                        <x-primary-button class="ms-4">
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
					clearFormInputs("#employerForm"); // Clear inputs in employer form

                });

                $("#employerButton").click(function() {
                    toggleButtonState(this, "#applicantButton");
                    toggleItemState("#employerTitle", "#applicantTitle");
                    toggleItemState("#employerImage", "#applicantImage");
                    toggleItemState("#employerForm", "#applicantForm");
					clearFormInputs("#applicantForm"); // Clear inputs in applicant form
                });
            });
    </script>
</html>
    
    
    

