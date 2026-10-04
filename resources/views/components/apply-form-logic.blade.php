<script type="text/javascript">
    jQuery(document).ready(function(){
        $(document).on("click", '#response-text-X', function(event) {
            $('#responseText').fadeOut();
        });
    });
    $.fn.formCheck=function(id){
        let jobIdStr= id;
        let jobId = jobIdStr.substring(3,jobIdStr.length);
        let loggedIn= {{ auth()->check() ? 'true' : 'false' }};
        if(loggedIn){
            $.fn.applyForm(jobId);
        } else{
            alert('Jobseekers have to be logged in!');
        }
    }
</script>
@if(auth()->user() !== null)
    <script type="text/javascript">

        $.fn.applyForm=function(jobId){
            let jobseeker={{ auth()->user()->role == "Jobseeker" ? 'true' :'false'}};
            if(jobseeker){
                let _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ url('/jobs/applyForm') }}",
                    method: 'post',
                    data: {
                        jobId: jobId,
                        _token:_token,
                    },
                    success: function(data){
                        $('#responseText').fadeIn();
                        $('#responseInnerText').html(data.html);
                        $('#applicationForm').append('{{csrf_field()}}');
                        // jQuery.each(data.errors, function(key, value){
                        //     jQuery('.alert-danger').show();
                        //     jQuery('.alert-danger').append('<p>'+value+'</p>');
                        // });
                    }

                });
            } else if(!jobseeker) {
                alert('Only jobseekers can apply for jobs!');
            }
        };
    </script>
@endif
