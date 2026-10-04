<x-layout>
    <header class="flex justify-between border border-gray-200 p-6 rounded-xl max-w-xxl mx-auto mt-20 text-center">
        <div class="flex flex-col space-y-2">
            <h2>{{$user->name}}</h2>
            <h3>{{$user->location->name}}, {{$user->location->state->name}}</h3>
        </div>
        <button onclick="document.querySelector('#update-Profile').submit()" class="self-center bg-gray-200 hover:bg-gray-400 p-4 rounded-xl">
            Save Update
        </button>
    </header>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <form id="update-Profile" method="POST" action="/jobseeker/updateProfile">
            @csrf
        <div class="space-y-4">
            @foreach($user->jobseeker as $jobseeker)
            <div class="space-y-4 lg:text-lg leading-loose border-solid border-2 border-black-100">
                <h2 class="font-semibold border-b-2">
                    Personal Introduction:
                </h2>
                <textarea class="border border-gray-400 p-2 w-full "
                          name="personalIntroduction"
                          id="personalIntroduction"
                          required
                >{{old('personalIntroduction',$jobseeker->personalIntroduction)}}</textarea>

                @error('personalIntroduction')
                <span class="text-xs text-red-500 mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="space-y-4 lg:text-lg leading-loose border-solid border-2 border-black-100">
                <h2 class="font-semibold border-b-2">
                    Education Background:
                </h2>

                <textarea class="border border-gray-400 p-2 w-full "
                          name="educationBackground"
                          id="educationBackground"
                          required
                >{{old('educationBackground',$jobseeker->educationBackground)}}</textarea>

                @error('educationBackground')
                <span class="text-xs text-red-500 mt-2">{{ $message }}</span>
                @enderror

            </div>

            <div class="space-y-4 lg:text-lg leading-loose border-solid border-2 border-black-100">
                <h2 class="font-semibold border-b-2">
                    Work Experience:
                </h2>

                <textarea class="border border-gray-400 p-2 w-full "
                          name="workExperience"
                          id="workExperience"
                          required
                >{{old('workExperience',$jobseeker->workExperience)}}</textarea>

                @error('workExperience')
                <span class="text-xs text-red-500 mt-2">{{ $message }}</span>
                @enderror
            </div>


            <div class="space-y-4 lg:text-lg leading-loose border-solid border-2 border-black-100">
                <h2 class="font-semibold border-b-2">
                    Skills and Interest:
                </h2>

                <textarea class="border border-gray-400 p-2 w-full "
                          name="skillsInterest"
                          id="skillsInterest"
                          required
                >{{old('skillsInterest',$jobseeker->skillsInterest)}}</textarea>

                @error('skillsInterest')
                <span class="text-xs text-red-500 mt-2">{{ $message }}</span>
                @enderror
            </div>
            @endforeach
        </div>
        </form>
    </main>
</x-layout>
