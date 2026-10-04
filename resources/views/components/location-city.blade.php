@props(['state','locations'])
@foreach($locations as $location)
    @if($state == $location->state_id)
    <div class="ml-2">
        @if(request('location_checkbox') !== null)
            @foreach(request('location_checkbox') as $CL){{--for each array item being CL--}}
                @if($CL == $location->slug)
                    <x-dropdown-checkbox-item
                        class="font-semibold"
                        :active="isset($currentLocation)"
                    >
                        <input type="checkbox" class="checkedChild location" name="location_checkbox[]" checked=true value="{{$location->slug}}">
                        {{ucwords($location->name)}}
                    </x-dropdown-checkbox-item>
                    @break
                @elseif($loop->last && $CL !== $location->slug)
                    <x-dropdown-checkbox-item
                        class="font-semibold"
                    >
                        <input type="checkbox" class="checkedChild location" name="location_checkbox[]" value="{{$location->slug}}">
                        {{ucwords($location->name)}}
                    </x-dropdown-checkbox-item>
                @endif
            @endforeach
        @elseif(request('location_checkbox')==null)
            <x-dropdown-checkbox-item
                class="font-semibold"
            >
                <input type="checkbox" class="checkedChild location" name="location_checkbox[]" value="{{$location->slug}}">
                {{ucwords($location->name)}}
            </x-dropdown-checkbox-item>
        @endif
    </div>
    @endif
@endforeach


