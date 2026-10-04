@props(['jobseekers', 'tags'])
<div class="lg:grid lg:grid-cols-6 border-opacity-50 border-2 border-black border-white rounded-xl shadow-xl shadow-gray-400 ring-offset-4 ring-offset-lime">
    @foreach($jobseekers as $jobseeker)
        @foreach ($jobseeker->jobseeker as $jobseekerDetail)
            <x-people.card
                :jobseeker="$jobseeker"
                :jobseekerDetail="$jobseekerDetail"
                {{--:tags="$tags"--}}
                class="col-span-3"
            />
        @endforeach
    @endforeach
</div>
