<x-dropdown-filter>
        <x-slot name="trigger">
            <button type="button" class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
                Locations

                <x-icons name="down-arrow" class="absolute pointer-events-none" style="right: 12px">
                </x-icons>
            </button>
        </x-slot>
        <fieldset>
            <x-dropdown-checkbox-item
                :active="!isset($currentState)" {{--&& !isset($currentLocation --}}
            >

                @if(request('location_checkbox')==null)
                    <input type="checkbox" class="checkAllL mainLocation" name="location_checkbox_main" checked=true value="">
                @elseif(!request('location_checkbox')==null)
                    <input type="checkbox" class="checkAllL mainLocation" name="location_checkbox_main" value="">
                @endif
                All
            </x-dropdown-checkbox-item>


            {{--TODO Location under each state to sync with search and vice versa--}}
            @foreach($states as $state) {{--for all states to be passed one-by-one as a single state object--}}
            <fieldset>
            @if(request('state_checkbox') !== null)
                    @foreach(request('state_checkbox') as $CS){{--for each array item being CS--}}
                        @if($CS == $state->slug)
                                <x-dropdown-checkbox-item
                                    class="font-semibold"
                                    :active="isset($currentState)"
                                >
                                    <input type="checkbox" class="checkedChild state" name="state_checkbox[]" checked=true value="{{$state->slug}}">
                                    {{ucwords($state->name)}}
                                </x-dropdown-checkbox-item>
                            @break
                            @elseif($loop->last && $CS !== $state->slug)
                                <x-dropdown-checkbox-item
                                    class="font-semibold"
                                >
                                    <input type="checkbox" class="checkedChild state" name="state_checkbox[]" value="{{$state->slug}}">
                                    {{ucwords($state->name)}}
                                </x-dropdown-checkbox-item>
                        @endif
                    @endforeach
                        <x-location-city :state="$state->id" :locations="$locations"/>
                @elseif(request('state_checkbox') == null)
                    <x-dropdown-checkbox-item
                        class="font-semibold"
                    >
                        <input type="checkbox" class="checkedChild state" name="state_checkbox[]" value="{{$state->slug}}">
                        {{ucwords($state->name)}}
                    </x-dropdown-checkbox-item>
                        <x-location-city :state="$state->id" :locations="$locations"/>
                @endif
            </fieldset>
            @endforeach
        </fieldset>
</x-dropdown-filter>
