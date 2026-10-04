<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto -mx-2 lg:-mx-4">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <section class="shadow flex flex-row justify-between overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <div class="px-6 py-4 whitespace-normal">
                    <div class="flex justify-center lg:justify-start items-center">
                        <div class="text-sm font-medium text-gray-900 flex flex-col items-center space-y-2 lg:space-y-0 lg:flex-row">
                        <h2 class="font-semibold underline lg:no-underline lg:pr-2 lg:border-r-2">
                            Job Post
                        </h2>
                        <span class="ml-2 text-gray-600 hover:text-blue-400">
                            @foreach($jobs as $job)
                            {{$job->name}}
                            @endforeach
                        </span>
                        </div>
                    </div>
                </div>
                <div class="px-3 lg:px-6 py-4 whitespace-normal">
                    <div class="flex items-center justify-center border-r-2 border-l-2 lg:border-r-0 lg:border-l-0">
                        <div class="flex flex-col lg:flex-row lg:space-y-0 text-sm font-medium text-gray-900 text-center px-2 space-y-2">
                            <h2 class="font-semibold underline lg:no-underline lg:pr-2 lg:border-r-2">
                                Job Location
                            </h2>
                            <span class="pl-3 text-gray-600 italic">
                                @foreach($jobs as $job)
                                {{$job->location->name}}, {{$job->location->state->name}}
                                @endforeach
                            </span>
                        </div>
                    </div>
                </div>
            </section>
            <section class="shadow flex flex-row justify-between overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <div class="px-6 py-4 whitespace-normal">
                    <div class="flex justify-center lg:justify-start items-center">
                        <div class="text-sm font-medium text-gray-900 flex flex-col items-center space-y-2 lg:space-y-0 lg:flex-row">
                            <h2 class="font-semibold underline lg:no-underline lg:pr-2 lg:border-r-2">
                                Job Post
                            </h2>
                            <span class="ml-2 text-gray-600 hover:text-blue-400">
                                @foreach($jobs as $job)
                                    {!! nl2br($job->description) !!}
                                @endforeach
                        </span>
                        </div>
                    </div>
                </div>
            </section>
            @foreach($jobs as $job)
                <form action="/myJobs/createNewPost/{{$job->id}}" method="get" class="mt-4 flex justify-center">
                    @csrf
                    <button type="submit"
                            id="copyJob"
                            class="bg-green-400 text-white font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-green-500"
                    >
                        Copy Job
                    </button>
                </form>

            @endforeach
        </div>
    </div>
</div>
