<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Northwest Nurses') }}: @yield('title')</title>

        <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
		<script src="https://unpkg.com/htmx.org@1.9.12" integrity="sha384-ujb1lZYygJmzgSwoxRggbCHcjc0rB2XoQrxeTUQyRjrOnlCoYta87iKBWq3EsdM2" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/timeago.js/4.0.2/timeago.min.js"></script>


        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="antialiased bg-slate-50">
        <nav class="bg-dark text-white">
            <div class="container mx-auto flex flex-col md:flex-row md:justify-between content-center p-5">
                <div class="flex items-center justify-between">
                    <a href="{{ url('/') }}">
                        <img class="max-w-28" src="{{ asset('img/logo/North West Nurses Logo-v5.png') }}" alt="">
                    </a>
                    <button class="nav-hamburger flex flex-col gap-1 md:hidden">
                        <div class="w-[30px] h-[0.25rem] bg-white rounded-full"></div>
                        <div class="w-[30px] h-[0.25rem] bg-white rounded-full"></div>
                        <div class="w-[30px] h-[0.25rem] bg-white rounded-full"></div>
                    </button>
                </div>
                <div class="navbar-list hidden my-10 md:my-5 md:flex flex-col items-start md:flex-row md:items-end md:gap-10 relative">
                    <a class="text-md py-2 hover:opacity-75" href="/find-jobs">Find Jobs</a>
                    <a class="text-md py-2 hover:opacity-75" href="/about-us">About Us</a>
                    <a class="text-md py-2 hover:opacity-75" href="/contact-us">Contact Us</a>
                    @guest
                    <a href="/login" class="account-nav-btn text-md mt-1 py-2 rounded-full md:bg-primary md:px-5 hover:opacity-75 flex flex-row justify-center align-center gap-2" type="submit"><p>Login</p></a>
                    @endguest
                    @auth
                    <button class="account-nav-btn text-md mt-1 py-2 rounded-full md:bg-primary md:px-5 hover:opacity-75 flex flex-row justify-center align-center gap-2" type="submit"><p>Account</p><span class="material-symbols-outlined"><span class="material-symbols-outlined">arrow_drop_down</span></button>
                    <div class="account-nav-list flex flex-col pl-5 md:absolute z-10 right-0 top-[100%] md:mt-6 md:mr-4 bg-dark md:py-1 md:px-0" style="display: none">
                        @role('applicant')
                        <a class="text-md py-2 hover:opacity-75 md:px-5" href="/my-profile">Profile</a>
                        @endrole
                        @role('employer')
                        <a class="text-md py-2 hover:opacity-75 md:px-5" href="/employer-dashboard">Dashboard</a>
                        @endrole
                        @role('applicant')
                        <a class="text-md py-2 hover:opacity-75 md:px-5" href="/my-jobs">My Jobs</a>
                        @endrole
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="text-md py-2 hover:opacity-75 md:px-5" href="/logout">Logout</button>
                        </form>
                    </div>
                    @endauth
                </div>
            </div>
        </nav>        
        @yield('content')
        <footer class="bg-dark text-white w-full py-12">
            <div class="container mx-auto px-3">
                <img class="max-w-[150px]" src="{{ asset('img/logo/North West Nurses Logo-v5.png') }}" alt="">
                <div class="flex flex-col lg:flex-row lg:justify-start lg:items-start mt-3 gap-10">
                    <div class="md:min-w-96">
                        <h1 class="text-xl font-extrabold">Ready to take the next step in your nursing career?</h1>
                        <p class="text-lg">Reach out to Northwest Nurses today to learn more about our exciting opportunities.</p>
                        <p class="mt-5">info@northwestnurses.com</p>
                    </div>
                    <div class="grow flex flex-col md:flex-row md:justify-between gap-8">
                        <div class="md:flex-1">
                            <h3 class="font-bold">For Employers</h3>
                            <p class="mt-2">Northwest Nurses empowers healthcare leaders by providing them with the necessary tools and data to enhance their management of workforce.</p>
                        </div>
                        <div class="md:flex-1">
                            <h3 class="font-bold">For Applicants</h3>
                            <p class="mt-2">Northwest Nurses provides the opportunity for Travel Nursing, Allied & Per Diem Jobs with ease - directly connecting you with the best healthcare facilities.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mt-10">
                    <p class="text-gray-500">All rights reserve <span>{{ date('Y') }}</span></p>
                </div>
            </div>
        </footer>
        <script>
        $(document).ready(function() {
            htmx.onLoad(function() {
                const timeagoNodes = document.querySelectorAll('.timeago');
                if (timeagoNodes.length) {
                    timeago.render(timeagoNodes);
                }
            });

			$.fn.slideToggleFlex = function (duration = 400, easing, complete) {
				return this.each(function () {
					var $el = $(this);
					if ($el.css('display') === 'none') {
						$el.css('display', 'flex').hide().slideDown(duration, easing, complete);
					} else {
						$el.slideUp(duration, easing, complete);
					}
				});
			};
			$(window).resize(function() {
				const viewPortWidth = $(window).width();
				if (viewPortWidth > 768) {
					$('.navbar-list').show();
				}
			});

			$('.nav-hamburger').on('click', function() {
				$('.navbar-list').slideToggleFlex();
			});

			$('.account-nav-btn').on('click', function() {
				$('.account-nav-list').slideToggleFlex();
			});

			$('.navbar-list a').on('click', function() {
				const viewPortWidth = $(window).width();
				if (viewPortWidth <= 768) {
					$('.navbar-list').slideToggleFlex();
				}
			});
		});
        </script>
        @yield('scripts')
    </body>
</html>
