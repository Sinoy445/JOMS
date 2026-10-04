@props(['category','tags'])
@foreach($tags as $tag)
    @if($category == $tag->category_id)
        <div class="ml-2">
            @if(request('tag_checkbox') !== null)
                @foreach(request('tag_checkbox') as $CT){{--for each array item being CT--}}
                @if($CT == $tag->slug)
                    <x-dropdown-checkbox-item
                        class="font-semibold"
                        :active="isset($currentTag)"
                    >
                        <input type="checkbox" class="checkedChild tag" name="tag_checkbox[]" checked=true value="{{$tag->slug}}">
                        {{ucwords($tag->name)}}
                    </x-dropdown-checkbox-item>
                    @break
                @elseif($loop->last && $CT !== $tag->slug)
                    <x-dropdown-checkbox-item
                        class="font-semibold"
                    >
                        <input type="checkbox" class="checkedChild tag" name="tag_checkbox[]" value="{{$tag->slug}}">
                        {{ucwords($tag->name)}}
                    </x-dropdown-checkbox-item>
                @endif
                @endforeach
            @elseif(request('tag_checkbox')==null)
                <x-dropdown-checkbox-item
                    class="font-semibold"
                >
                    <input type="checkbox" class="checkedChild tag" name="tag_checkbox[]" value="{{$tag->slug}}">
                    {{ucwords($tag->name)}}
                </x-dropdown-checkbox-item>
            @endif
        </div>
    @endif
@endforeach


