<x-layout>
    <header class="flex justify-between border border-gray-200 p-6 rounded-xl max-w-xxl mx-auto mt-20 text-center">
        <div class="flex flex-col space-y-2">
            <h2>{{$user->name}}</h2>
            <h3>{{$user->location->name}}, {{$user->location->state->name}}</h3>
        </div>
        <a
            class="self-center bg-gray-200 hover:bg-gray-400 p-4 rounded-xl"
            href="/jobseeker/updateProfile">
            Update Profile
        </a>
    </header>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <div class="space-y-4">
            @foreach($user->jobseeker as $jobseeker)
            <div class="space-y-4 lg:text-lg leading-loose border-solid border-2 border-black-100">
                <h2 class="font-semibold border-b-2">
                    Personal Introduction:
                </h2>
                {!! nl2br(e($jobseeker->personalIntroduction)) !!}
            </div>

            <div class="space-y-4 lg:text-lg leading-loose border-solid border-2 border-black-100">
                <h2 class="font-semibold border-b-2">
                    Education Background:
                </h2>
                {!! nl2br(e($jobseeker->educationBackground)) !!}



            </div>

            <div class="space-y-4 lg:text-lg leading-loose border-solid border-2 border-black-100">
                <h2 class="font-semibold border-b-2">
                    Work Experience:
                </h2>
                {!! nl2br(e($jobseeker->workExperience)) !!}
            </div>


            <div class="space-y-4 lg:text-lg leading-loose border-solid border-2 border-black-100">
                <h2 class="font-semibold border-b-2">
                    Skills and Interest:
                </h2>
                {!! nl2br(e($jobseeker->skillsInterest)) !!}
            </div>
            @endforeach
        </div>
    </main>
</x-layout>
