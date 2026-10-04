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
        <form id="update-Profile" method="POST" action="/employer/updateProfile">
            @csrf
        <div class="space-y-4">
            @foreach($user->employer as $employer)
            <div class="space-y-4 lg:text-lg leading-loose border-solid border-2 border-black-100">
                <h2 class="font-semibold border-b-2">
                    Company Background:
                </h2>
                <textarea class="border border-gray-400 p-2 w-full "
                          name="background"
                          id="background"
                          required
                >{{old('background',$employer->background)}}</textarea>

                @error('background')
                <span class="text-xs text-red-500 mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="space-y-4 lg:text-lg leading-loose border-solid border-2 border-black-100">
                <h2 class="font-semibold border-b-2">
                    Company Culture:
                </h2>

                <textarea class="border border-gray-400 p-2 w-full "
                          name="culture"
                          id="culture"
                          required
                >{{old('culture',$employer->culture)}}</textarea>

                @error('culture')
                <span class="text-xs text-red-500 mt-2">{{ $message }}</span>
                @enderror

            </div>

            <div class="space-y-4 lg:text-lg leading-loose border-solid border-2 border-black-100">
                <h2 class="font-semibold border-b-2">
                    Type of People We Want:
                </h2>

                <textarea class="border border-gray-400 p-2 w-full "
                          name="typePeople"
                          id="typePeople"
                          required
                >{{old('typePeople',$employer->typePeople)}}</textarea>

                @error('typePeople')
                <span class="text-xs text-red-500 mt-2">{{ $message }}</span>
                @enderror
            </div>


            <div class="space-y-4 lg:text-lg leading-loose border-solid border-2 border-black-100">
                <h2 class="font-semibold border-b-2">
                    Vacancies Available:
                </h2>

                <textarea class="border border-gray-400 p-2 w-full "
                          name="vacancies"
                          id="vacancies"
                          required
                >{{old('vacancies',$employer->vacancies)}}</textarea>

                @error('vacancies')
                <span class="text-xs text-red-500 mt-2">{{ $message }}</span>
                @enderror
            </div>
            @endforeach
        </div>
        </form>
    </main>
</x-layout>
