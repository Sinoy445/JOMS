<x-layout>
    <header class="flex justify-between border border-gray-200 p-6 rounded-xl max-w-xxl mx-auto mt-20 text-center ring-offset-2 ring-offset-gray-100 shadow-md">

        <div class="flex lg:flex-row flex-col space-y-3 lg:space-y-0 items-center">
            <h2 class="self-center text-xl font-semibold">Job Applications for </h2><span class="text-xl font-semibold italic lg:ml-2 lg:pl-2 lg:border-l-2">{{$job->name}}</span>
        </div>

        <a
            class="self-center font-medium bg-gray-200 hover:bg-gray-400 p-4 rounded-xl"
            href="/myJobs">
            Back
        </a>
    </header>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                            @if($applications->count())

                                @foreach($applications as $application)

                                    <tr>
                                        <td class="whitespace-nowrap px-3 py-6 flex flex-col lg:flex-row">
                                            <div class="px-6 py-4 flex items-center">
                                                <div class="text-sm font-medium text-gray-900 flex flex-row">
                                                    <h2 class="font-semibold pr-2 border-r-2">
                                                        Applicant Name
                                                    </h2>
                                                    <a class="ml-2 text-gray-600 hover:text-blue-400" href="/people/{{$application->applicant->username}}">
                                                        {{$application->name}}
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="px-6 py-4 flex items-center">
                                                <div class="flex lg:flex-col text-sm font-medium text-gray-900 lg:border-r-2 lg:border-l-2 text-center lg:px-2 lg:space-y-2">
                                                    <h2 class="font-semibold no-underline lg:underline border-r-2 lg:border-r-0 pr-2 lg:pr-0">
                                                        From
                                                    </h2>
                                                    <span class="ml-2 lg:ml-0 text-gray-600">
                                                        {{$application->applicant->location->name}}, {{$application->applicant->location->state->name}}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="px-6 py-4 flex items-center">
                                                <div class="flex lg:flex-col text-sm font-medium text-gray-900 lg:border-r-2 lg:border-l-2 text-center lg:px-2 lg:space-y-2">
                                                    <h2 class="font-semibold no-underline lg:underline border-r-2 lg:border-r-0 pr-2 lg:pr-0">
                                                        Email
                                                    </h2>
                                                    <span class="ml-2 lg:ml-0 text-gray-600 italic">
                                                        {{$application->email}}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="px-6 py-4 flex items-center">
                                                <div class="flex lg:flex-col text-sm font-medium text-gray-900 lg:border-r-2 lg:border-l-2 text-center lg:px-2 lg:space-y-2">
                                                    <h2 class="font-semibold no-underline lg:underline border-r-2 lg:border-r-0 pr-2 lg:pr-0">
                                                        Contact Number
                                                    </h2>
                                                    <span class="ml-2 lg:ml-0 text-gray-600 italic">
                                                        {{$application->phoneNumber}}
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-3 py-2 whitespace-nowrap text-center text-sm font-medium">
                                            <div class="space-y-6">
                                                @if($application->appStatus->status=="Keep In View")
                                                    <div class="px-6 py-4 flex justify-center items-center">
                                                        <div class="flex lg:flex-col text-sm font-medium text-gray-900 lg:border-r-2 lg:border-l-2 text-center lg:px-2 lg:space-y-2">
                                                            <h2 class="font-semibold no-underline lg:underline border-r-2 lg:border-r-0 pr-2 lg:pr-0">
                                                                Status
                                                            </h2>
                                                            <span class="ml-2 lg:ml-0 text-gray-600 italic">
                                                            {{$application->appStatus->status}}
                                                        </span>
                                                        </div>
                                                    </div>
                                                @else
                                                    <form
                                                        action="/myJobs/{{$application->id}}/viewApplications"
                                                        method="POST"
                                                        onsubmit="return confirm('Are you sure to keep in view this applicant?')"
                                                    >
                                                        @csrf
                                                        <input
                                                            type="hidden"
                                                            name="action"
                                                            id="action"
                                                            value="KIV"
                                                            required
                                                        >
                                                        <button type="submit" class="px-3 py-2 border-2 border-blue-400 rounded-md bg-blue-100 hover:bg-blue-200">Keep In View</button>
                                                    </form>
                                                @endif
                                                @if($application->appStatus->status=="Rejected")
                                                    <div class="px-6 py-4 flex justify-center items-center">
                                                        <div class="flex lg:flex-col text-sm font-medium text-gray-900 lg:border-r-2 lg:border-l-2 text-center lg:px-2 lg:space-y-2">
                                                            <h2 class="font-semibold no-underline lg:underline border-r-2 lg:border-r-0 pr-2 lg:pr-0">
                                                                Status
                                                            </h2>
                                                            <span class="ml-2 lg:ml-0 text-gray-600 italic">
                                                        {{$application->appStatus->status}}
                                                    </span>
                                                        </div>
                                                    </div>
                                                @else
                                                    <form
                                                        action="/myJobs/{{$application->id}}/viewApplications"
                                                        method="POST"
                                                        onsubmit="return confirm('Are you sure to reject this applicant?')"
                                                    >
                                                        @csrf
                                                        <input
                                                            type="hidden"
                                                            name="action"
                                                            id="action"
                                                            value="reject"
                                                            required
                                                        >
                                                        <button type="submit" class="px-3 py-2 border-2 border-red-400 rounded-md bg-red-100 hover:bg-red-200">Reject</button>
                                                    </form>
                                                @endif
                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-normal">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900 flex flex-row">
                                                    <h2 class="font-semibold pr-2">
                                                        Details Added:
                                                    </h2>
                                                    <div class="px-2 border-2 max-h-48 overflow-y-auto">
                                                        @if($application->reasonSuitable==null)
                                                            <span class="text-gray-200 italic">None given</span>
                                                        @else
                                                        {!! nl2br(e($application->reasonSuitable)) !!}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-center text-sm font-medium">
                                            <div class="space-y-6 lg:space-y-0 flex flex-col lg:flex-row lg:space-x-6 lg:justify-between">
                                                @if(is_null($application->curriculumVitae))
                                                    <p class="self-center italic rounded bg-gray-100 w-24 flex items-center whitespace-normal">No CV attached</p>
                                                @else
                                                    <form action="/myJobs/viewApplications/{{$application->curriculumVitae}}/{{$application->name}}/downloadCV" method="GET">
                                                        @csrf
                                                        <button type="submit" class="bg-indigo-100 w-24 hover:bg-indigo-400 hover:text-white border-2 border-black whitespace-normal p-2 rounded font-medium">Download Curriculum Vitae (CV)</button>
                                                    </form>
                                                @endif
                                                @if(is_null($application->resume))
                                                    <p class="self-center italic rounded bg-gray-100 w-24 flex items-center whitespace-normal">No Resume attached</p>
                                                @else
                                                    <form action="/myJobs/viewApplications/{{$application->resume}}/{{$application->name}}/downloadResume" method="GET">
                                                        @csrf
                                                        <button type="submit" class="bg-indigo-100 w-24 hover:bg-indigo-400 hover:text-white border-2 border-black whitespace-normal p-2 rounded font-medium">Download Resume</button>
                                                    </form>
                                                @endif
                                            </div>

                                        </td>
                                        @endforeach
                                    </tr>
                            @else
                                <p class="text-center italic py-4 font-semibold">No applications have been made yet to your job</p>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </main>
</x-layout>
