<x-layout>
    <header class="flex justify-between border border-gray-200 p-6 rounded-xl max-w-xxl mx-auto mt-20 text-center ring-offset-2 ring-offset-gray-100 shadow-md">

        <div class="text-left">
            <h2 class="text-xl font-semibold">Create Job Post</h2>
            <h3 class="text-sm font-light italic">Enter your job post details and submit</h3>
        </div>
        <a
            class="self-center bg-gray-200 hover:bg-gray-400 p-4 rounded-xl"
            href="/myJobs">
            Back
        </a>
    </header>
    <x-myJobs.copy-form/>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b p-4 border-gray-200 sm:rounded-lg">
                        <form
                            action="/myJobs/createNewPost"
                            method="POST"
                            onsubmit="return confirm('Are you sure you have filled correctly? Please ensure correct spellings especially for tags')">
                            @csrf
                            <div class="mb-6">
                                <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                    Job Post Name:
                                </label>

                                <input class="border border-gray-400 p-2 w-full rounded"
                                type="text"
                                name="name"
                                id="name"
                                value="{{old('name')}}"
                                required
                                >

                                @error('name')
                                    <span class="text-xs text-red-500 mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="location" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                    Job Location(City):
                                </label>

                                <input class="typeahead form-control border border-gray-400 p-2 w-full rounded"
                                       type="text"
                                       name="location"
                                       id="location"
                                       value="{{old('location')}}"
                                       required
                                >

                                <ul id="locationList" class="block absolute overflow-y-auto w-11/12 max-h-24 bg-white z-10"></ul>
                                @error('location')
                                    <span class="text-xs text-red-500 mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="excerpt" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                    Job Excerpt:
                                </label>

                                <textarea class="border border-gray-400 p-2 w-full "
                                          name="excerpt"
                                          id="excerpt"
                                          required
                                >{{strip_tags(old('excerpt',''))}}</textarea>

                                @error('excerpt')
                                    <span class="text-xs text-red-500 mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="description" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                   Job Description:
                                </label>

                                <textarea class="border border-gray-400 p-2 w-full "
                                          name="description"
                                          id="description"
                                          required
                                >{{strip_tags(old('description',''))}}</textarea>

                                @error('description')
                                    <span class="text-xs text-red-500 mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="skillNeeded" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                    Job Skills Needed:
                                </label>

                                <textarea class="border border-gray-400 p-2 w-full "
                                          name="skillNeeded"
                                          id="skillNeeded"
                                          required
                                >{{strip_tags(old('skillNeeded',''))}}</textarea>

                                @error('skillNeeded')
                                    <span class="text-xs text-red-500 mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="jobScope" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                    Job Scope:
                                </label>

                                <textarea class="border border-gray-400 p-2 w-full "
                                          name="jobScope"
                                          id="jobScope"
                                          required
                                >{{strip_tags(old('jobScope',''))}}</textarea>

                                @error('jobScope')
                                    <span class="text-xs text-red-500 mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-6 flex flex-col sm:flex-row gap-y-3 sm:space-x-3">
                                <div class="flex-1">
                                    <label for="jobType" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                        Job Type:
                                    </label>
                                    <x-panel class="mt-2">
                                        @foreach($tags as $tag)
                                            @if($tag->category->name =="Job Type")
                                                <label class="block text-left px-3 mb-2 text-sm text-gray-700">
                                                    <input type="checkbox" name="jobType[]" class="mx-2" value="{{$tag->name}}"
                                                           @if (is_array(old('jobType')) && in_array($tag->name, old('jobType'))) checked @endif>
                                                    {{ucfirst($tag->name)}}
                                                </label>
                                            @endif
                                        @endforeach
                                            @error('jobType')
                                            <span class="text-xs text-red-500 mt-2">{{ $message }}</span>
                                            @enderror
                                    </x-panel>
                                </div>
                                <div class="flex-1">
                                    <label for="jobExperience" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                        Job Experience:
                                    </label>
                                    <x-panel class="mt-2">
                                        @foreach($tags as $tag)
                                            @if($tag->category->name =="Job Experience")
                                                <label class="block text-left px-3 mb-2 text-sm text-gray-700">
                                                    <input type="checkbox" name="jobExperience[]" class="mx-2" value="{{$tag->name}}"
                                                    {{ ( is_array(old('jobExperience')) && in_array($tag->name, old('jobExperience')) ) ? 'checked ' : '' }}>
                                                    {{ucfirst($tag->name)}}
                                                </label>
                                            @endif
                                        @endforeach
                                            @error('jobExperience')
                                            <span class="text-xs text-red-500 mt-2">{{ $message }}</span>
                                            @enderror
                                    </x-panel>
                                </div>
                            </div>
                            <div class="mb-6">

                                <label for="sector" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                   Job Sector:
                                </label>

                                <div class="italic text-sm ml-4 mb-2">
                                    Enter the sector(s) separated by comma, do follow the spelling,
                                </div>
                                <x-panel>
                                <input class="border border-gray-400 p-2 w-full rounded"
                                type="text"
                                name="sector"
                                id="sector"
                                placeholder="Enter the sector(s) separated by comma"
                                >
                                <div class="mt-2">
                                    Current tags in site:
                                    @foreach($tags as $tag)
                                        @if($tag->category->name =="Sector")
                                            <span class="text-sm italic border-2 px-2">{{$tag->name}}</span>
                                        @endif
                                    @endforeach
                                </div>
                                    @if(old('sector')!=null)
                                        @php
                                            $tagErrors = explode(",", old('sector'));
                                        @endphp
                                        @foreach($tagErrors as $tagError)
                                            <script>$('#sector').addTag({!! json_encode($tagError) !!})</script>
                                        @endforeach
                                    @endif
                                @error('sector')
                                    <span class="text-xs text-red-500 mt-2">{{ $message }}</span>
                                @enderror
                                </x-panel>
                            </div>
                            <x-form.field class="flex justify-around">
                                <button type="button"
                                        id="copyJob"
                                        onclick="$.fn.copyForm();"
                                        class="bg-green-400 text-white font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-green-500"
                                >
                                    Copy Details from Previous Job Post
                                </button>
                                <button type="submit"
                                        class="bg-blue-400 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-500"
                                >
                                    Post
                                </button>
                            </x-form.field>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <style>
        #sector_tag:focus{
            outline:none !important;
        }
        span.tag{
            display:block;
            color:white;
            background-color:darkseagreen;
            float:left;
            margin-right:1rem;
            padding:0.5rem 0.5rem;
            border-radius:0.25rem;
        }
    </style>
    <script type="text/javascript">
        // I am going to use an object, just for reuse
        /*
        ** @param jQuery [object] Pass the jQuery object
        ** @param getMenu [object] jQuery DOM object (ul) that contains our menu
        ** @parm getKeyTap [int] This is the e.keyCode passed from the event
        */
        let keyAction = function (jQuery, getMenu, getKeyTap) {
            // The variable is what is currently be acted on
            let isSelected;
            // This will designate first or last child
            let getChild;
            // This will be assigned the next, previous, or current child
            let thisChild;
            // We assign jQuery here
            let $ = jQuery;
            // These are all the keys we allow to be struck
            let allowKeys = [38, 40, 13];
            // This is not used in this example, but can reset the keyCode
            let keyCode = false;
            /*
            ** @returns [boolean] This function returns if the key being pressed is arrow up/down
            */
            let upDown = function (getKeyTap) {
                return (getKeyTap == 38 || getKeyTap == 40);
            }
            /*
            ** @returns [boolean] This method returns boolean true/false if up/down arrow pressed
            */
            this.keyAllowed = function () {
                return upDown(getKeyTap);
            }
            /*
            ** @description This method sees if pressed key is up/down arrow or return key
            ** @returns [boolean] Will return true/false
            */
            this.isAllowed = function () {
                return (allowKeys.indexOf(getKeyTap) != -1);
            }
            // This will manually set the keyCode (not required in this example)
            this.setKey = function (keyCode) {
                getKeyTap = keyCode;
                return this;
            }
            /*
            ** @returns [object] This returns the current state of the DOM
            */
            this.isSelected = function () {
                return isSelected;
            }
            /*
            ** @description This will run an anonymous function passing the current DOM
            ** @param thisChild [ANY] I pass the current DOM selection but, you
            **                        can pass whatever you want
            ** @param func [function] This is what you want to run when the
            **                        return key is pressed
            */
            this.setReturn = function (thisChild, func) {
                if (getKeyTap == 13) {
                    if (thisChild)
                        func(thisChild);
                }
            }
            /*
            ** @description This will set the current DOM and add the select class
            ** @returns This will return the current DOM object
            */
            this.firstClick = function () {
                getChild = (getKeyTap == 38) ? 'last' : 'first';
                isSelected = getMenu.children('li:' + getChild + '-child');
                isSelected.addClass('selected');
                return isSelected;
            }
            /*
            ** @description This method will move the selection up and down
            ** @param isSelected [object] This is the current select DOM object
            ** @returns [object] this will return the current selected DOM object
            */
            this.currClick = function (isSelected) {
                let setSpot = 'last';

                if (getKeyTap == 38)
                    thisChild = isSelected.prev();
                else if (getKeyTap == 40) {
                    thisChild = isSelected.next();
                    setSpot = 'first';
                }

                if (!thisChild.hasClass('selectable'))
                    thisChild = getMenu.children("li:" + setSpot + "-child");

                isSelected.removeClass('selected');
                thisChild.addClass('selected');
                return thisChild;
            }

            /*
            ** @description This will just run a function
            */
            this.doAction = function (func) {
                return func();
            }
        };

        $(document).ready(function(){
            let isSelected=false;
            var qBox = $('input[name=location]');
            $('#location').keyup(function(e){
                let query = $(this).val();
                if(e.keyCode == 38 || e.keyCode == 40)
                    // Don't do ajax call
                {
                    return false;
                }
                if(query != '')
                {
                    let _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{ route('autocompleteMyJobs') }}",
                        method:"GET",
                        data:{term:query, _token:_token},
                        success:function(data){
                            $('#locationList').fadeIn();
                            $('#locationList').html(data);
                        }
                    });
                }
            });

            $(document).on('click', 'li', function(){
                $('#location').val($(this).text());
                $('#locationList').fadeOut();
            });
            $(document).on('click', function(){
                $('#locationList').fadeOut();
            });

            $(this).keydown(function(e) {
                // See where the cursor is focused
                let isFocused   =   (e.target.nodeName == 'INPUT');
                // Start engine
                let sMenu       =   new keyAction($, $('ul'), e.keyCode);
                // If it's focused
                if(isFocused) {
                    // Place text into field on return
                    // sMenu.setReturn(isSelected,function(obj) {
                    //     qBox.val(isSelected.text());
                    //     // Submit form
                    //     // $('#search').submit();
                    // });

                    // If keys are allowed
                    if(sMenu.keyAllowed()) {
                        isSelected  =   (!isSelected)? sMenu.firstClick(isSelected) : sMenu.currClick(isSelected);
                        // Copy the value of the selection into the input
                        sMenu.doAction(function(){
                            qBox.val(isSelected.text());
                        });
                    }
                }
            });

            $('#sector').tagsInput({
                'width': '100%',
                'delimiter': ',',
                'defaultText': 'Enter sector(s)',
            });
        });
    </script>
    <x-myJobs.copy-form-logic/>
</x-layout>
