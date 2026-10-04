<x-layout>
    <header class="flex justify-between border border-gray-200 p-6 rounded-xl max-w-xxl mx-auto mt-20 text-center ring-offset-2 ring-offset-gray-100 shadow-md">

        <h2 class="self-center text-xl font-semibold">My Job Posts</h2>
        <a
            class="self-center bg-gray-200 hover:bg-gray-400 p-4 rounded-xl"
            href="/myJobs/createNewPost">
            Create New Job Post
        </a>
    </header>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                            @if($posts->count())
                                @foreach ($posts as $post)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-normal">

                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900 flex flex-col items-center space-y-2 lg:space-y-0 lg:flex-row">

                                                    <h2 class="font-semibold underline lg:no-underline lg:pr-2 lg:border-r-2">
                                                        Job Post
                                                    </h2>
                                                    <a class="lg:ml-2 inline-flex text-black-400 hover:text-blue-400" href="/jobs/{{$post->slug}}">
                                                        {{$post->name}}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-3 lg:px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="/myJobs/{{$post->id}}/edit" class="text-blue-400 hover:text-blue-600">Edit</a>
                                        </td>

                                        <td class="px-3 lg:px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                                            <form method="POST"
                                                  action="/myJobs/{{$post->id}}">
                                                @csrf
                                                @method('DELETE')

                                                <button class="text-sm text-red-400 font-medium hover:text-red-600"
                                                        onclick="return confirm('Are you sure you want to delete: {{$post->name}}?')"
                                                        type="submit"
                                                >Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-normal">
                                            <div class="flex justify-center lg:justify-start items-center">
                                                <div class="text-sm font-medium text-gray-900 flex flex-col items-center space-y-2 lg:space-y-0 lg:flex-row">
                                                    <h2 class="font-semibold underline lg:no-underline lg:pr-2">
                                                        Job Description
                                                    </h2>
                                                    <div class="lg:px-2 border-2 max-h-48 overflow-y-auto">
                                                        {!!$post->description !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td colspan="2" class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                            <a href="/myJobs/{{$post->id}}/viewApplications" class="text-indigo-400 hover:text-indigo-600">View Applications</a>
                                        </td>
                                        @endforeach
                                    </tr>
                            @else
                                <p class="text-center">No posts created, start posting your jobs now!</p>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>
