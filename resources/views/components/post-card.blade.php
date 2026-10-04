@props(['job', 'tags'])
<article
    {{$attributes->merge(['class'=>'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-10 hover:border-opacity-40 rounded-xl'])}}>
    <div class="py-6 px-5">
        <div class="mt-8 flex flex-col justify-between">
            <header>
                <div class="flex flex-row flex-wrap justify-start gap-y-2">
                @foreach($job->listtags as $job->listtag)
                    @foreach($tags as $tag)
                        @if($job->listtag->tag_id == $tag->id)
                            <div class="space-x-2 mr-1 ml-1">
                                <x-tag-button :tag="$tag"/>
                            </div>
                        @endif
                    @endforeach
                @endforeach
                </div>
                <div class="mt-4">
                    <a href="/jobs/{{$job->slug}}">
                        <h1 class="text-3xl">
                            {{$job->name}}
                        </h1>
                    </a>
                    <span class="mt-2 block text-gray-400 text-xs">
                                        Published <time>{{$job->created_at->diffForHumans()}}</time>
                    </span>

                </div>
                <div class="mt-2">
                    <x-location-button
                        :location="$job->location"
                    />
                </div>
            </header>

            <div class="text-sm mt-4 space-y-4">
                {!! nl2br($job->excerpt) !!}
            </div>

            <footer class="flex flex-col space-y-4 lg:space-y-0 lg:flex-row justify-between items-center mt-8">
                <div class="flex items-center text-sm lg:w-43">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3">
                        <h5 class="font-bold">
                            <a href="/jobs/?author={{$job->author->username}}">{{$job->author->name}}</a>
                        </h5>
                    </div>
                </div>

                <div class="flex flex-row space-x-2">
                    <a href="/jobs/{{$job->slug}}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >Read More</a>
                    <button type="button"
                            id="Job{{$job->id}}"
                            onclick="$.fn.formCheck(this.id);"
                            class="bg-blue-400 text-white font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-500"
                    >
                        Apply
                    </button>

                </div>
            </footer>
            <x-apply-form-logic/>

        </div>
    </div>
</article>
