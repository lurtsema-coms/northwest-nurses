<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-6">
            <h1 class="text-2xl  text-cyan-600 text-center sm:text-start">WELCOME TO</h1>
            <h1 class="text-5xl font-bold text-cyan-600 mb-5 text-center sm:text-start">Northwest Nurses</h1>
            <span class="font-bold">Doesn't have an account yet? <a href="/register" class="text-cyan-600 underline font-bold">Sign Up</a></span>
        </div>
        
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 ">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class=" mt-4 flex flex-col sm:flex-row gap-x-4 ">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded shadow-sm border-cyan-600 focus:border-cyan-600 dark:focus:border-cyan-600 focus:ring-cyan-600 dark:focus:ring-cyan-600" name="remember">
                <span class="ms-2 text-sm text-cyan-600">{{ __('Remember me') }}</span>
            </label>
            @if (Route::has('password.request'))
                <a class="underline text-sm text-cyan-600 hover:text-cyan-900 dark:hover:text-cyan-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-cyan-500 dark:focus:ring-offset-cyan-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <div class="flex items-center justify-center mt-4">
            <x-primary-button class=" w-full ">
                {{ __('LOGIN') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
