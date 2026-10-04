<x-layout>
    <header class="flex justify-between border border-gray-200 p-6 rounded-xl max-w-xxl mx-auto mt-20 text-center ring-offset-2 ring-offset-gray-100 shadow-md">

        <h2 class="self-center text-xl font-semibold">My Job Applications</h2>

    </header>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                            @if($applications->count())
                                <div class="italic text-center mt-2 mb-5">
                                    Types of Application Status Available:
                                    <span class="text-blue-400 font-medium">[Submitted]</span>,
                                    <span class="text-green-400 font-medium">[Keep In View]</span>,
                                    <span class="text-pink-400 font-medium">[Rejected]</span>
                                </div>
                                @foreach($applications as $application)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-normal">
                                            <div class="flex justify-center lg:justify-start items-center">
                                                <div class="text-sm font-medium text-gray-900 flex flex-col items-center space-y-2 lg:space-y-0 lg:flex-row">
                                                    <h2 class="font-semibold underline lg:no-underline lg:pr-2 lg:border-r-2">
                                                        Job Post
                                                    </h2>
                                                    <a class="ml-2 text-gray-600 hover:text-blue-400" href="/jobs/{{$application->job->slug}}">
                                                        {{$application->job->name}}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-3 lg:px-6 py-4 whitespace-normal">
                                            <div class="flex items-center justify-center border-r-2 border-l-2">
                                                <div class="flex flex-col text-sm font-medium text-gray-900 text-center px-2 space-y-2">
                                                    <h2 class="font-semibold underline">
                                                        Job Location
                                                    </h2>
                                                    <span class="text-gray-600">
                                                        {{$application->job->location->name}}, {{$application->job->location->state->name}}
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-3 lg:px-6 py-4 whitespace-normal">
                                            <div class="flex items-center justify-center border-r-2 border-l-2">
                                                <div class="flex flex-col text-sm font-medium text-gray-900 text-center px-2 space-y-2">
                                                    <h2 class="font-semibold underline">
                                                        Status
                                                    </h2>
                                                    <span class="text-gray-600 italic">
                                                        {{$application->appStatus->status}}
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach
                            @else
                                <p class="text-center italic py-4 font-semibold">You have yet to apply to any jobs, start applying now!</p>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </main>
</x-layout>
