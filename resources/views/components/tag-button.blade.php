@props(['tag'])
<a href="/jobs?tag={{$tag->slug}}"
   class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
   style="font-size: 10px">{{$tag->name}}</a>
