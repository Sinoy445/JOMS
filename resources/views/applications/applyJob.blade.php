@foreach($jobs as $job)
<div class='space-y-4 mt-4 text-center'>
    <div class='space-y-4 flex justify-between lg:text-lg leading-loose border-solid border-2 border-black-100'>
        <label class='block self-center uppercase font-bold text-xs text-gray-700'>Job Name:</label>
        {{$job->name}}
        </div>
    <div class='space-y-4 flex justify-between lg:text-lg leading-loose border-solid border-2 border-black-100'>
        <label class='block self-center mb-2 uppercase font-bold text-xs text-gray-700'>Employer Name:</label>
        {{$job->author->name}}
        </div>
    <button class='px-3 py-1 border border-blue-600 rounded-full text-blue-600 mt-5 text-xs uppercase font-semibold'>
        {{$job->location->name}}, {{$job->location->state->name}}
    </button>
    </div>
@endforeach

@foreach($jobs as $job)
    @if($job->user_id == auth()->user()->id)
           <div class='space-y-4 mt-4 text-center'>
                 You cannot apply to a job you created. Please apply to another job
                 </div>
    @else
             @foreach($applicants as $applicant)
                 <form method='post' id='applicationForm' action='jobs/apply/{{$job->id}}' enctype='multipart/form-data'>
                         <div class='space-y-4 mt-4 p-4 text-center border-solid border-2 border-blue-400 rounded-xl'>
                                 <div class='p-4 flex justify-between lg:text-lg leading-loose'>
                                         <label class='block self-center uppercase font-bold text-xs text-gray-700'>Your Name:</label>
                                         <input class='border border-gray-200 p-2 w-full rounded'
                                                name='name' id='name'
                                                value='{{$applicant->name}}' required>
                                     @error('name')
                                     <span class="text-xs text-red-500 mt-2">{{ $message }}</span>
                                     @enderror
                                     </div>
                                 <div class='p-4 flex justify-between lg:text-lg leading-loose'>
                                         <label class='block self-center uppercase font-bold text-xs text-gray-700'>Your Email:</label>
                                         <input class='border border-gray-200 p-2 w-full rounded'
                                                name='email' id='email'
                                                type='email'
                                                value='{{$applicant->email}}' required>
                                     @error('email')
                                     <span class="text-xs text-red-500 mt-2">{{ $message }}</span>
                                     @enderror
                                     </div>
                                 <div class='p-4 flex justify-between lg:text-lg leading-loose'>
                                         <label class='block self-center uppercase font-bold text-xs text-gray-700'>Your Phone Number:</label>
                                         <input class='border border-gray-200 p-2 w-full rounded' name='phoneNumber' id='phoneNumber' required>
                                     @error('phoneNumber')
                                     <span class="text-xs text-red-500 mt-2">{{ $message }}</span>
                                     @enderror
                                 </div>
                                 <div class='p-4 flex justify-between lg:text-lg leading-loose'>
                                         <label class='block self-center uppercase font-bold text-xs text-gray-700'>Additional Details:</label>
                                         <textarea class='border border-gray-200 p-2 w-full rounded'
                                                   placeholder='Add any relevant details about you or reasons you &#39 re suitable for the job'
                                                         name='reasonSuitable' id='reasonSuitable'></textarea>
                                     </div>
                                 <div class='p-4 flex justify-between lg:text-lg leading-loose'>
                                     <label class='block self-center uppercase font-bold text-xs text-gray-700'>Your Curriculum Vitae (CV):</label>
                                     <input class='border border-gray-200 p-2 w-full rounded' type="file" name='curriculumVitae' id='curriculumVitae'>
                                     @error('curriculumVitae')
                                     <span class="text-xs text-red-500 mt-2">{{ $message }}</span>
                                     @enderror
                                 </div>
                                 <div class='p-4 flex justify-between lg:text-lg leading-loose'>
                                     <label class='block self-center uppercase font-bold text-xs text-gray-700'>Your Resume:</label>
                                     <input class='border border-gray-200 p-2 w-full rounded' type="file" name='resume' id='resume'>
                                     @error('resume')
                                     <span class="text-xs text-red-500 mt-2">{{ $message }}</span>
                                     @enderror
                                 </div>
                                 <button type='submit' class='self-center bg-gray-200 hover:bg-gray-400 p-4 rounded-xl'>Apply to Job</button>
                             </div>
                     </form>
             @endforeach
    @endif
@endforeach
