@props(['active'=> false])

@php
    $classes = 'block font-mono text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white';
    //if ($active) $classes .= ' italic';
@endphp

<label {{ $attributes->merge(['class'=>$classes])}} >
    {{$slot}}</label>

