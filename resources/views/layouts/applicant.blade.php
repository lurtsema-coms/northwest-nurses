<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Northwest Nurses') }}: @yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
		<script src="https://unpkg.com/htmx.org@1.9.12" integrity="sha384-ujb1lZYygJmzgSwoxRggbCHcjc0rB2XoQrxeTUQyRjrOnlCoYta87iKBWq3EsdM2" crossorigin="anonymous"></script>


        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="antialiased bg-slate-50">
        <nav class="bg-dark text-white">
            <div class="container mx-auto flex flex-col md:flex-row md:justify-between content-center p-5">
                <div class="flex items-center justify-between">
                    <a href="{{ url('/') }}">
                        <img class="max-w-28" src="https://seeklogo.com/images/N/NVIDIA-logo-BA019CBFAA-seeklogo.com.png" alt="">
                    </a>
                    <button class="nav-hamburger flex flex-col gap-1 md:hidden">
                        <div class="w-[30px] h-[0.25rem] bg-white rounded-full"></div>
                        <div class="w-[30px] h-[0.25rem] bg-white rounded-full"></div>
                        <div class="w-[30px] h-[0.25rem] bg-white rounded-full"></div>
                    </button>
                </div>
                <div class="navbar-list hidden md:flex flex-col items-start md:flex-row md:items-end md:gap-10 relative">
                    <a class="text-md py-2 hover:opacity-75" href="/find-jobs">Find Jobs</a>
                    <a class="text-md py-2 hover:opacity-75" href="#">About Us</a>
                    <a class="text-md py-2 hover:opacity-75" href="#">Contact Us</a>
                    <button class="account-nav-btn text-md mt-1 py-2 rounded-full md:bg-primary md:px-5 hover:opacity-75 flex flex-row justify-center align-center gap-2" type="submit"><p>Account</p><span class="material-symbols-outlined"><span class="material-symbols-outlined">arrow_drop_down</span></button>
                    <div class="account-nav-list flex flex-col pl-5 md:absolute z-10 right-0 top-[100%] md:mt-6 md:mr-4 bg-dark md:py-1 md:px-0" style="display: none">
                        <a class="text-md py-2 hover:opacity-75 md:px-5" href="#">Profile</a>
                        <a class="text-md py-2 hover:opacity-75 md:px-5" href="#">My Jobs</a>
                        <a class="text-md py-2 hover:opacity-75 md:px-5" href="#">Logout</a>
                    </div>
                </div>
            </div>
        </nav>        
        @yield('content')
        <footer class="bg-dark text-white w-full py-12">
            <div class="container mx-auto px-3">
                <img class="max-w-[150px]" src="https://seeklogo.com/images/N/NVIDIA-logo-BA019CBFAA-seeklogo.com.png" alt="">
                <div class="flex flex-col lg:flex-row lg:justify-start lg:items-start mt-3 gap-10">
                    <div class="md:min-w-96">
                        <h1 class="text-xl font-extrabold">Ready to take the next step in your nursing career?</h1>
                        <p class="text-lg">Reach out to Northwest Nurses today to learn more about our exciting opportunities.</p>
                        <p class="mt-5">info@northwestnurses.com</p>
                    </div>
                    <div class="grow flex flex-col 2xl:flex-row 2xl:justify-between gap-8">
                        <div class="2xl:flex-1">
                            <h3 class="font-bold">For Employers</h3>
                            <p class="mt-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro quidem veritatis aliquam aut excepturi provident numquam quis pariatur nostrum. Nam ea consequuntur a aut molestiae veritatis quasi quidem voluptatibus consectetur?</p>
                        </div>
                        <div class="2xl:flex-1">
                            <h3 class="font-bold">For Applicants</h3>
                            <p class="mt-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro quidem veritatis aliquam aut excepturi provident numquam quis pariatur nostrum. Nam ea consequuntur a aut molestiae veritatis quasi quidem voluptatibus consectetur? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Explicabo, optio in sed reiciendis, voluptas minima cupiditate quasi nihil enim cumque exercitationem est autem? Voluptatum itaque aliquid et, quidem deleniti aspernatur.</p>
                        </div>
                        <div class="2xl:flex-1">
                            <h3 class="font-bold">About</h3>
                            <p class="mt-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro quidem veritatis aliquam aut excepturi provident numquam quis pariatur nostrum. Nam ea consequuntur a aut molestiae veritatis quasi quidem voluptatibus consectetur?</p>
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
