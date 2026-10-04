<x-layout>
    @include('jobs._header')
    <x-apply-Form/>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($jobs->count())
            <x-posts-grid :jobs="$jobs" :tags="$tags"/>

            {{$jobs->links()}} {{--if we implement paginate only--}}
        @else
            <p class="text-center">No job posts yet. Please check back later</p>
        @endif
    </main>

</x-layout>
