<x-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo src="/images/jomsLogo.png" class="w-auto h-20 fill-current text-gray-500 rounded-md" />
            </a>
        </x-slot>

        <x-slot name="navi">
            <a href="{{ route('registerJobseeker') }}" class="mt-3 p-3 bg-white rounded-md float-left">Jobseeker Registration</a>
            <a href="{{ route('registerEmployer') }}" class="mt-3 p-3 bg-blue-200 font-semibold rounded-md float-left">Employer Registration</a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('registerEmployer') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Employer/Company Name')" />

                <x-input id="name" class="px-2 py-3 border text-base block mt-1 w-full focus:ring-offset-indigo-400 focus:outline-none focus:outline-offset-2 focus:border-blue-300" type="text" name="name" :value="old('name')" required autofocus />
            </div>
            <!-- Username -->
            <div class="mt-4">
                <x-label for="username" :value="__('Username')" />

                <x-input id="username" class="px-2 py-3 border text-base block mt-1 w-full focus:ring-offset-indigo-400 focus:outline-none focus:outline-offset-2 focus:border-blue-300" type="text" name="username" :value="old('username')" required autofocus />
            </div>


            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="px-2 py-3 border text-base block mt-1 w-full focus:ring-offset-indigo-400 focus:outline-none focus:outline-offset-2 focus:border-blue-300" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-label for="location" :value="__('Location')"/>

                <input class="typeahead form-control px-2 py-3 border text-base block mt-1 w-full focus:ring-offset-indigo-400 focus:outline-none focus:outline-offset-2 focus:border-blue-300"
                           type="text"
                           name="location"
                           id="location"
                           value="{{old('location')}}"
                           required
                >
                <ul id="locationList" class="block absolute overflow-y-auto w-3/12 max-h-24 bg-white z-10"></ul>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="px-2 py-3 border text-base block mt-1 w-full focus:ring-offset-indigo-400 focus:outline-none focus:outline-offset-2 focus:border-blue-300"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="px-2 py-3 border text-base block mt-1 w-full focus:ring-offset-indigo-400 focus:outline-none focus:outline-offset-2 focus:border-blue-300"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
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
                        url:"{{ route('autocompleteNewJobseeker') }}",
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

        });
    </script>
</x-layout>
