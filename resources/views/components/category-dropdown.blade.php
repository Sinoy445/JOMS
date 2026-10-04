<x-dropdown-filter>
        <x-slot name="trigger">
            <button type="button" class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
                Categories

                <x-icons name="down-arrow" class="absolute pointer-events-none" style="right: 12px">
                </x-icons>
            </button>
        </x-slot>
        <fieldset>
            <x-dropdown-checkbox-item
                :active="!isset($currentCategory)"
            >
                @if(request('tag_checkbox')==null)
                    <input type="checkbox" class="checkAllC mainCategory" name="category_checkbox_main" checked=true value="">
                @elseif(request('tag_checkbox') !== null)
                    <input type="checkbox" class="checkAllC mainCategory" name="category_checkbox_main" value="">
                @endif
                All
            </x-dropdown-checkbox-item> {{--except means list all the requests except location= and page=--}}

            @foreach($categories as $category)
                <fieldset>
                    <x-dropdown-checkbox-item
                        class="font-semibold"
                    >
                        <input type="checkbox" class="checkedChild category" name="category_checkbox[]" value="{{$category->slug}}">
                        {{ucwords($category->name)}}
                    </x-dropdown-checkbox-item>
                    <x-category-tag :category="$category->id" :tags="$tags"/>
                </fieldset>

            @endforeach
        </fieldset>
</x-dropdown-filter>
