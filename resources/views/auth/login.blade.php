{{--<link rel="stylesheet" href="/css/layout.css">--}}
<x-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo src="/images/jomsLogo.png" class="w-auto h-20 fill-current text-gray-500 rounded-md" />
            </a>
        </x-slot>

        <x-slot name="navi">
            <div class="mt-3 py-3 px-6 bg-blue-200 font-semibold rounded-md float-left">Login</div>

        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />
                {{--                block font-medium text-sm text-gray-700--}}
                <x-input id="email" class="px-2 py-3 border text-base block mt-1 w-full focus:ring-offset-indigo-400 focus:outline-none focus:outline-offset-2 focus:border-blue-300" type="email" name="email" :value="old('email')" required autofocus />
            </div>
        {{--                rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full--}}
        <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="px-2 py-3 border text-base block mt-1 w-full focus:ring-offset-indigo-400 focus:outline-none focus:outline-offset-2 focus:border-blue-300"
                         type="password"
                         name="password"
                         required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-layout>
