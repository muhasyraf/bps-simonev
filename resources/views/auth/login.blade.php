<x-guest-layout>
    <x-authentication-card>
        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif
        <form method="POST" action="{{ isset($guard) ? url($guard. '/login') : route('login') }}">
            @csrf

            <div class="py-12 lg:py-2 ">
                <x-slot name="logo">
                    <x-authentication-card-logo />
                </x-slot>
                <p class="font-semibold text-sm text-center md:text-base">Selamat datang di SIMONEV Badan Pusat
                    Statistik</p>
                <x-validation-errors class="my-2 text-center" />
            </div>
            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
            <div class="py-5 justify-center">
                <x-button
                    class="w-full text-white bg-sky-500 hover:bg-sky-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    {{ __('Login') }}
                </x-button>
            </div>
            <div class="flex items-center justify-center mt-2">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-3"
                    href="{{ route('register') }}">
                    {{ __('Haven\'t registered yet?') }}
                </a>
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>