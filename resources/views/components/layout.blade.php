<!doctype html>
<script src="https://cdn.tailwindcss.com" ></script>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">


<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

<!-- Fonts -->

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<style>
    html {
        scroll-behavior: smooth;
    }
</style>
<title>JOMS - Job Marketplace System</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">
    @include('layouts.navigation')
    {{--    <nav class="md:flex md:justify-between md:items-center">--}}
    {{--        <div>--}}
    {{--            <a href="/">--}}
    {{--                <img src="/images/jomsLogo.png" alt="JOMS Logo" width="165" height="16">--}}
    {{--            </a>--}}
    {{--        </div>--}}

    {{--        <div class="mt-8 md:mt-0 flex items-center">--}}
    {{--            <a href="/jobs" class="text-xs font-bold uppercase">Jobs</a>--}}
    {{--            <a href="/people" class="ml-6 text-xs font-bold uppercase">People</a>--}}
    {{--            @auth--}}
    {{--                <a href="/jobseeker/myJobs" class="ml-6 text-xs font-bold uppercase">My Jobs</a>--}}
    {{--                <x-dropdown>--}}
    {{--                    <x-slot name="trigger">--}}
    {{--                        <button class="px-2 text-xs font-bold uppercase flex flex-row">--}}
    {{--                            Welcome, {{auth()->user()->name}}--}}
    {{--                            <x-icons name="down-arrow" class="absolute pointer-events-none" style="right: 12px"></x-icons>--}}
    {{--                        </button>--}}
    {{--                    </x-slot>--}}
    {{--                    <x-slot name="content">--}}
    {{--                    @if(auth()->user()->can('admin'))--}}
    {{--                        <x-dropdown-item href="/admin/posts" :active="request()->is('admin/posts')">Dashboard</x-dropdown-item>--}}
    {{--                        <x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create')">New Post</x-dropdown-item>--}}
    {{--                    @endif--}}
    {{--                    <x-dropdown-item href="/jobseeker/profile" :active="request()->is('jobseeker/profile')">Profile</x-dropdown-item>--}}
    {{--                    <x-dropdown-item href="#" X-data="{}" @click.prevent="document.querySelector('#logout-form').submit()">Log Out</x-dropdown-item>--}}

    {{--                    <form id="logout-form" method="POST" action="/logout" class="hidden">--}}
    {{--                        @csrf--}}
    {{--                    </form>--}}
    {{--                    </x-slot>--}}
    {{--                </x-dropdown>--}}

    {{--            @else--}}

    {{--                <a href="/register" class="ml-6 text-xs font-bold uppercase">Register</a>--}}
    {{--                <a href="/login" class="ml-6 text-xs font-bold uppercase">Log In</a>--}}
    {{--            @endauth--}}
    {{--            <a href="#newsletter" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">--}}
    {{--                Subscribe for Updates--}}
    {{--            </a>--}}
    {{--        </div>--}}
    {{--    </nav>--}}
    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>

    {{--    <footer id="newsletter" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">--}}
    {{--        <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">--}}
    {{--        <h5 class="text-3xl">Stay in touch with the latest posts</h5>--}}
    {{--        <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>--}}

    {{--        <div class="mt-10">--}}
    {{--            <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">--}}

    {{--                <form method="POST" action="/newsletter" class="lg:flex text-sm">--}}
    {{--                    @csrf--}}
    {{--                    <div class="lg:py-3 lg:px-5 flex items-center">--}}
    {{--                        <label for="newsEmail" class="hidden lg:inline-block">--}}
    {{--                            <img src="/images/mailbox-icon.svg" alt="mailbox letter">--}}
    {{--                        </label>--}}

    {{--                        <div>--}}
    {{--                            <input id="newsEmail" type="email" name="newsEmail" placeholder="Your email address"--}}
    {{--                                   class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">--}}

    {{--                            @error('newsEmail')--}}
    {{--                            <span class="text-xs text-red-500">{{ $message }}</span>--}}
    {{--                            @enderror--}}
    {{--                        </div>--}}
    {{--                    </div>--}}

    {{--                    <button type="submit"--}}
    {{--                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"--}}
    {{--                    >--}}
    {{--                        Subscribe--}}
    {{--                    </button>--}}
    {{--                </form>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </footer>--}}
</section>
<x-flash /> {{--flash message like Your account is created successfully--}}
</body>
