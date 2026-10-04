<x-layout>
    <section class="px-6 py-8">
        <header class="flex justify-between border border-gray-200 bg-blue-200 p-6 rounded-xl max-w-xxl mx-auto mt-20 text-center">
            <div class="flex flex-col space-y-2">
                <h2>{{$owner->name}}</h2>
                <h3>{{$owner->location->name}}, {{$owner->location->state->name}} || Registered <time>{{$owner->created_at->diffForHumans()}}</time></h3>
            </div>
            <a
                class="self-center bg-gray-200 hover:bg-gray-400 p-4 rounded-xl flex flex-row"
                href="/jobs">
                <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                    <g fill="none" fill-rule="evenodd">
                        <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                        </path>
                        <path class="fill-current"
                              d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                        </path>
                    </g>
                </svg>
                Back To Jobs Page
            </a>
        </header>
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
{{--                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">--}}
{{--                    <div class="flex items-center lg:justify-center text-sm mt-4">--}}
{{--                        <img src="/images/lary-avatar.svg" alt="Lary avatar">--}}
{{--                        <div class="ml-3 text-left">--}}
{{--                            <h5 class="font-bold"><a href="/?author={{$employer->username}}">{{$employer->name}}</a></h5>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="col-span-10">

                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{$owner->name}}
                    </h1>

                    <div class="space-y-4">
                        @foreach($owner->employer as $employer)
                        <div class="space-y-4 lg:text-lg leading-loose border-solid border-2 border-black-100">
                            <h2 class="font-semibold border-b-2">
                                Company Background:
                            </h2>
                            {!! nl2br(e($employer->background)) !!}
                        </div>

                        <div class="space-y-4 lg:text-lg leading-loose border-solid border-2 border-black-100">
                            <h2 class="font-semibold border-b-2">
                                Company Culture:
                            </h2>
                            {!! nl2br(e($employer->culture)) !!}



                        </div>

                        <div class="space-y-4 lg:text-lg leading-loose border-solid border-2 border-black-100">
                            <h2 class="font-semibold border-b-2">
                                Type of People We Want:
                            </h2>
                            {!! nl2br(e($employer->typePeople)) !!}
                        </div>


                        <div class="space-y-4 lg:text-lg leading-loose border-solid border-2 border-black-100">
                            <h2 class="font-semibold border-b-2">
                                Vacancies Available:
                            </h2>
                            {!! nl2br(e($employer->vacancies)) !!}
                        </div>
                        @endforeach
                    </div>
                </div>
            </article>
        </main>
    </section>

</x-layout>
