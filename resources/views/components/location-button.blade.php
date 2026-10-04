@props(['location'])
<a
    {{ $attributes(['class' => "px-3 py-1 border border-blue-600 rounded-full text-blue-600 mt-5 text-xs uppercase font-semibold"]) }}
    style="font-size: 10px">{{$location->name}}, {{$location->state->name}}</a>
