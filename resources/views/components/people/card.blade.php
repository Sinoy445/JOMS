@props(['jobseeker','jobseekerDetail', 'tags'])
<article
    {{$attributes->merge(['class'=>'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-10 hover:border-opacity-40 rounded-xl'])}}>
    <div class="py-6 px-5">
        <div class="mt-8 flex flex-col justify-between">
            <header>
                <div class="mt-4">
                    <a href="/people/{{$jobseeker->username}}">
                        <h1 class="text-3xl">
                            {{$jobseeker->name}}
                        </h1>
                    </a>
                    <span class="mt-2 block text-gray-400 text-xs">
                                        Registered <time>{{$jobseeker->created_at->diffForHumans()}}</time>
                    </span>

                </div>
                <div class="mt-2">
                    <x-location-button
{{--                        href="/people?location={{$jobseeker->location->slug}}"--}}
                        :location="$jobseeker->location"
                    />
                </div>
            </header>

            <div class="text-sm mt-4 space-y-4">
                {!! nl2br(e($jobseekerDetail->personalIntroduction)) !!}
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm lg:w-43">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3">
                        <h5 class="font-bold">
                            <a href="/people/{{$jobseeker->username}}">{{$jobseeker->name}}</a>
                        </h5>
                    </div>
                </div>

                <div>
                    <a href="/people/{{$jobseeker->username}}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >Learn More</a>
                </div>
            </footer>
        </div>
    </div>
</article>
