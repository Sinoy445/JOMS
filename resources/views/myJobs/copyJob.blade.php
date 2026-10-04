<div class='mt-4 flex justify-around'>
    @if($jobs->count())
        <p class="text-center italic py-2 font-semibold">Click on a job from dropdown on the right</p>
    <x-dropdown align='left' width='48'>

        <x-slot name='trigger'>
            <button class='flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out'>
                <div>
                    Job Post
                    </div>
                <div class="ml-1">
                              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                   <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                             </svg>
                </div>
            </button>
        </x-slot>

        <x-slot name="content">

            @foreach($jobs as $job)

            <button id="Job{{$job->id}}"  onclick="$.fn.selectJob(this.id);" class='block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out'>
                {{$job->id}}, {{$job->name}}
            </button>

            @endforeach
            </x-slot>
    </x-dropdown>
    @else
        <p class="text-center italic py-4 font-semibold">You have not created any jobs, create jobs to attempt copy!</p>
    @endif
    <script type="text/javascript">
        $.fn.selectJob=function(id){ //show selected job's details
            let jobIdStr= id;
            let jobId = jobIdStr.substring(3,jobIdStr.length);

            let _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ url('/myJobs/copyForm') }}",
                method: 'post',
                data: {
                    jobId: jobId,
                    _token:_token,
                },
                success: function(data){
                    $('#selectedJobDetail').html(data.html);

                }

            });
        };
    </script>
</div>
