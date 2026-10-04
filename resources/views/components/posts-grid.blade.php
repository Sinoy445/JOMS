@props(['jobs', 'tags'])
<div class="lg:grid lg:grid-cols-6 border-opacity-50 border-2 border-black border-white rounded-xl shadow-xl shadow-gray-400 ring-offset-4 ring-offset-lime">
    @foreach($jobs as $job)
            <x-post-card
                :job="$job"
                :tags="$tags"
                class="col-span-3"
            />
    @endforeach
</div>
