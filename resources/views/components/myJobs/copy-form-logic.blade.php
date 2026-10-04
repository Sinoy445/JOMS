<script type="text/javascript">
    jQuery(document).ready(function(){
        $(document).on("click", '#response-text-X', function(event) {
            $('#responseText').fadeOut();
        });
    });
    $.fn.copyForm=function(){
        let _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{ url('/myJobs/copyForm') }}", //show dropdown
            method: 'get',
            data: {
                _token:_token,
            },
            success: function(data){
                $('#responseText').fadeIn();
                $('#responseInnerText').html(data.html);
            }

        });
    };
</script>
