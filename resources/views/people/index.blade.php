<x-layout>
    @include('people._header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($jobseekers->count())
            <x-people.grid :jobseekers="$jobseekers" {{--:tags="$tags"--}}/>

            {{$jobseekers->links()}} {{--if we implement paginate only--}}
        @else
            <p class="text-center">No jobseekers found.</p>
        @endif
    </main>
</x-layout>
