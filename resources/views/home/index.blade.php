<x-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <div id="myCarousel" class="carousel slide content" style="display:none" data-ride="carousel" data-interval="10000" data-pause="hover">
        <ol class="carousel-indicators rounded-md bg-amber-400 w-fit mx-auto pl-2 pr-2">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1" class=""></li>
        </ol>
        <div class="carousel-inner">

            <div class="carousel-item active">
                <img src="/images/JobseekerHowTo.png" class="d-block lg:w-7/12 lg:h-2/5 mx-auto my-2 drop-shadow-md rounded-xl shadow-gray shadow-md"  alt="Jobseeker How To">
            </div>
            <div class="carousel-item">
                <img src="/images/EmployerHowTo.png" class="d-block lg:w-7/12 lg:h-2/5 mx-auto my-2 drop-shadow-md drop-sha rounded-xl shadow-gray shadow-md"  alt="Employer How To">
            </div>

        </div>
        <a class="carousel-control-prev rounded-l-2xl lg:w-20 lg:bg-rose-200" href="#myCarousel" role="button"  data-slide="prev">
            <span class="carousel-control-prev-icon mix-blend-luminosity invert bg-gray-300 rounded-xl p-4" aria-hidden="true">     </span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next rounded-r-2xl lg:w-20 lg:bg-rose-200" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon mix-blend-luminosity invert bg-gray-300 rounded-xl p-4" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="content mt-3 flex flex-col space-y-2" style="display:none">
        <a href="/jobs" class="lg:w-7/12 lg:h-3/5 self-center relative">
            <img src="/images/JobSearch.jpg" class="rounded-md" alt="Job Search">
            <div class="absolute p-6 bg-blue-300 font-semibold border-2 border-white text-black hover:text-white hover:bg-blue-600 rounded-sm bottom-2 right-2">Browse Jobs</div>
        </a>
        <a href="/people" class="lg:w-7/12 lg:h-3/5 self-center relative">
            <img src="/images/ProfessionalTalent.jpg" class="rounded-md" alt="Talent Search">
            <div class="absolute p-6 bg-blue-300 font-semibold border-2 border-white text-black hover:text-white hover:bg-blue-600 rounded-sm bottom-2 right-2">Talent Search</div>
        </a>

    </div>
    <div class="loadingDiv">Loading ...</div>
    <script>
        $( window ).on( "load", function() {

            let images = $("img"),
                totalImages = images.length,
                imagesLoaded = 0,
                img;


            function checkForLoaded() {

                if(imagesLoaded === totalImages) {

                    // loadingDiv.parentNode.removeChild(loadingDiv);
                    $('.loadingDiv').css('display','none');
                    $('.content').removeAttr("style");
                }
            }


            for (let i = 0; i < totalImages; i++) {
                img = new Image();

                img.onload = function () {

                    imagesLoaded++;
                    checkForLoaded();
                }

                img.src = images[i].src;

            }
        });

    </script>
</x-layout>
