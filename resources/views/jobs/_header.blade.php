<header class="max-w-xxl mx-auto mt-20 lg:mb-0 text-center">
    <section class="w-full p-2 flex justify-center">
        <h1 class="text-4xl w-fit p-2 bg-white shadow-xl border-2 border-white rounded-md">
            Job <span class="text-blue-500">Vacancies</span>
        </h1>

    </section>


    <div class="w-full flex flex-col lg:flex-row justify-center space-y-3 lg:space-y-0 lg:space-x-6 lg:mt-8 mt-1">

        <form action="/jobs" method="POST" id="filter-form" class="lg:space-x-6 lg:space-y-0 space-y-3" >
            @csrf
        <!--  Category -->
            <div class="relative lg:inline-flex border-2 border-amber-200 rounded-xl lg:px-4 lg:py-0 py-0.5">
                <x-category-dropdown />
            </div>
            <!-- Location -->
            <div class="relative lg:inline-flex border-2 border-amber-200 rounded-xl lg:px-4 lg:py-0 py-0.5">
                <x-location-dropdown />
            </div>
                <input type="hidden" name="search" id="searchHidden" value="">

        </form>

        <!-- Search -->
        <div class="relative items-center border-2 border-amber-200 rounded-xl px-3 lg:py-1 py-2">
            <form method="POST" action="/jobs" class="w-full">
                @csrf
                @if (request('tag_checkbox')&& request('location_checkbox'))
                    @foreach(request('tag_checkbox') as $key=>$value)
                        <input type="hidden" name="tag_checkbox[]" value="{{ $value }}">
                    @endforeach
                    @foreach(request('location_checkbox') as $key=>$value)
                        <input type="hidden" name="location_checkbox[]" value="{{ $value }}">
                    @endforeach
                @endif
                <input type="text" name="search" id="searchField" placeholder="Search for Job Vacancy"
                       class="bg-white outline-none placeholder-black font-semibold text-sm w-full rounded-md pl-3"
                       value="{{ request('search') }}">
            </form>
        </div>
    </div>
</header>

<script>
    $('#filter-form').on('submit', function(e){
        e.preventDefault();
        let text = $('#searchField').val();
        $('#searchHidden').val(text);
        this.submit();
    });
    $( window ).on( "load", function() {
        let inputL = $('.checkAllL').prop('checked'); //parent checkbox for Locations
        let inputC = $('.checkAllC').prop('checked'); //parent checkbox for Categories

        if (inputL){
            $('.checkAllL').closest('fieldset').find(':checkbox').prop('checked', true); // prop($propertyName,value) sets the retrieved prop's $propertyName to value like true to property checked
        } else if(!inputL) {
            let fieldset = $('.checkAllL').closest('fieldset').find('.state');
            console.log(fieldset + 'state Window');
            let allChecked = true;
            fieldset.each(function () {
                allChecked = allChecked && this.checked;
            });
            if (allChecked) {
                $('.checkAllL').prop('checked', allChecked);
                console.log('checkAll true');
            } else if (!allChecked) {
                $('.checkAllL').prop('checked', allChecked);
                console.log('checkAll false');
            }
        }
        if (inputC){ //if parent checkbox for Categories is checked
            $('.checkAllC').closest('fieldset').find(':checkbox').prop('checked', true); // prop($propertyName,value) sets the retrieved prop's $propertyName to value like true to property checked
        } else if(!inputC) {
            let fieldset = $('.checkAllC').closest('fieldset').find('.category');  //get array of category checkboxes to check whether all category checkboxes are checked
            console.log(fieldset + 'category Window');
            let allChecked = true;
            fieldset.each(function () {
                allChecked = allChecked && this.checked;
            });
            if (allChecked) {
                $('.checkAllC').prop('checked', allChecked);
                console.log('checkAll true');
            } else if (!allChecked) {
                $('.checkAllC').prop('checked', allChecked);
                console.log('checkAll false');
            }
        }

        let subInputC = $('.tag');

        subInputC.each(function() {
            if (this.checked){
                $(this).trigger('change');
            }
        });

        let subInputL = $('.location');

        subInputL.each(function() {
            if (this.checked){
                $(this).trigger('change');
            }
        });
    });

    $(function () {
        $('.checkAllL').on('click', function () {
            $(this).closest('fieldset').find(':checkbox').prop('checked', this.checked);
        });
        $('.checkAllC').on('click', function () {
            $(this).closest('fieldset').find(':checkbox').prop('checked', this.checked);
        });
        $('.state').on('change', function (e) {
            $(this).closest('fieldset').find(':checkbox').prop('checked', this.checked);
            let fieldset = $(this).closest('fieldset').parents('fieldset').find('.state');
            console.log(fieldset + 'state');
            let allChecked = true;
            fieldset.each(function(){
                allChecked = allChecked && this.checked;
            });
            if(allChecked){
                $(this).parents('fieldset').find('.mainLocation').prop('checked',allChecked);
                console.log('checkAll true');
            }else if (!allChecked){
                $(this).parents('fieldset').find('.mainLocation').prop('checked',allChecked);
                console.log('checkAll false');
            }
        });
        $('.location').on('change', function (e) {
            let fieldset = $(this).closest('fieldset').find('.location');
            console.log(fieldset + 'location');
            let allChecked = true;
            fieldset.each(function(){
                allChecked = allChecked && this.checked;
            });
            if(allChecked){
                $(this).closest('fieldset').find(':checkbox').prop('checked', allChecked);
                console.log('true allChecked');
                $(this).closest('fieldset').find('.state').trigger('change');
            } else if(!allChecked){
                $(this).closest('fieldset').find('.state').prop('checked', allChecked);
                console.log('false allChecked');
                $(this).closest('fieldset').parents('fieldset').find('.mainLocation').prop('checked',allChecked);
            }
        });
        $('.category').on('change', function (e) {
            $(this).closest('fieldset').find(':checkbox').prop('checked', this.checked);
            let fieldset = $(this).closest('fieldset').parents('fieldset').find('.category'); //this array of category checkboxes to check whether all category checkboxes are checked
            console.log(fieldset + 'category');
            let allChecked = true;
            fieldset.each(function(){
                allChecked = allChecked && this.checked;
            });
            if(allChecked){
                $(this).parents('fieldset').find('.mainCategory').prop('checked',allChecked); //if yes, the parent checkbox should be checked
                console.log('checkAll true');
            }else if (!allChecked){
                $(this).parents('fieldset').find('.mainCategory').prop('checked',allChecked);
                console.log('checkAll false');
            }
        });

        $('.tag').on('change', function (e) {
            let fieldset = $(this).closest('fieldset').find('.tag');
            console.log(fieldset + 'tag');
            let allChecked = true;
            fieldset.each(function(){
                allChecked = allChecked && this.checked;
            });
            if(allChecked){
                $(this).closest('fieldset').find(':checkbox').prop('checked', allChecked);
                console.log('true allChecked');
                $(this).closest('fieldset').find('.category').trigger('change');
            } else if(!allChecked){
                $(this).closest('fieldset').find('.category').prop('checked', allChecked);
                console.log('false allChecked');
                $(this).closest('fieldset').parents('fieldset').find('.mainCategory').prop('checked',allChecked);
            }
        });
    });



</script>
