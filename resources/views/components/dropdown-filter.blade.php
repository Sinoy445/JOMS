@props(['trigger'])
<div x-data="{ show: false}" @click.away="show=false" class="relative"> {{--Insert a truth, i.e. show = false--}}
{{--    Trigger--}}
    <div @click="show=!show" class="px-10">
        {{$trigger}}
    </div>

{{--    Links--}}

    <div x-show="show" class="py-2 absolute bg-amber-100 w-full mt-2 rounded-xl z-50 overflow-auto max-h-52" style="display:none"> {{--bind to the x-data--}}
        {{$slot}}
    </div>
    <div x-show="show" style="display:none" class="space-y-2 z-50 py-2 border-t-2 rounded-t-md shadow shadow-amber-200 border-amber-400 absolute bg-amber-100 mt-52 w-full rounded-b-xl" >

        <button type="button" name="filter-apply"
                    class="bg-blue-400 text-white rounded-md py-2 px-4 hover:bg-blue-500"
        >
                Apply
        </button>
    </div>

</div>
<script>
    $(document).ready(function(){
        $("button[name='filter-apply']").click(function(){
            $('#filter-form').submit();
        });
    });
</script>
