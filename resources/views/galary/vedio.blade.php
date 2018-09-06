



<section>

    <div class="_r_kgc_video_wrap">

        <div class="container">
            <div class="row">
                <div class="col-md-12 _r_kgc_content_head">
                  <h1 class="_r_kgc_content_head_title">Video Gallery</h1>
                  <hr class="_r_kgc_hr">
                </div>
            </div>

            <div class="row">
                @if(isset($g_vedios))
                @foreach($g_vedios as $g_vedio)

            <div class="col-md-6">

                <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{$g_vedio->link}}" frameborder="0" allowfullscreen></iframe>

            </div>
            @endforeach
            @endif

            {{-- <div class="col-md-6">

                <iframe width="100%" height="315" src="https://www.youtube.com/embed/5_QPcRWpwvQ" frameborder="0" allowfullscreen></iframe>

            </div> --}}

        </div>

        </div>

    </div>

</section>





<!-- backend video show -->


