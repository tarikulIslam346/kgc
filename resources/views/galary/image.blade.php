<section id="gallery">

  <div class="container">

    <div id="image-gallery">
        
        <div class="row">
                <div class="col-md-12 _r_kgc_content_head">
                  <h1 class="_r_kgc_content_head_title">Tournament name for image gallery</h1>
                  <hr class="_r_kgc_hr">
                </div>
            </div>

      <div class="row">
        @if(isset($g_images))
                @foreach($g_images as $img)

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 image">

          <div class="img-wrapper">

            <a href="/galleryimages/{{$img->img_url}}"><img src="/galleryimages/{{$img->img_url}}" class="img-responsive"></a>

            <div class="img-overlay">

              <i class="fas fa-expand-arrows-alt"></i>

            </div>

          </div>

        </div>

      @endforeach
      @endif
      </div>

    </div>

  </div>

</section>