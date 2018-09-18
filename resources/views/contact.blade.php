@extends('layouts.master')

@section('content')


<div class="container">
    <div class="row">
          <div class="col-md-12 _r_kgc_content_head">
            <h1 class="_r_kgc_content_head_title">Get In Touch</h1>
            <hr class="_r_kgc_hr">
            <!--   @if(isset($online_servive))-->
            <!--<h1 class="_r_kgc_content_head_body">{!!$online_servive->home_online_text !!}</h1>-->
            <!--@endif-->
          </div>
        </div>
        <div class="row _r_kgc_contact_us">
            <div class="col-md-8">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14602.359881845392!2d90.38948110198481!3d23.797611176935174!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c719eff3f473%3A0x34e2a229bd80af0a!2sKurmitola+Golf+Club!5e0!3m2!1sen!2sbd!4v1536386329487" width="100%" height="480" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="col-md-4">
                <section class="_r_kgc_section2">
                    <div class="contactform">
                        <h5>Drop us a line...</h5>
                        <form method="POST" action="/mail">
                            @csrf
                            <label for="firstname">
                                <i class="cntfrmicn fa fa-user"></i>
                                <input name="firstname" class="form-fields" type="text" placeholder="Name" required>
                            </label>
                            <label for="email">
                                <i class="cntfrmicn fa fa-envelope"></i>
                                <input name="email" class="form-fields" type="text" placeholder="Email" required>
                            </label>
                            <label for="contact">
                                <i class="cntfrmicn fa fa-phone"></i>
                                <input name="contact" class="form-fields" type="text" placeholder="Contact" required>
                            </label>
                            <label for="textarea">
                                <i class="cntfrmicn fa fa-comment"></i>
                                <textarea class="form-fields" name="details" id="" cols="30" rows="10" placeholder="Details..."></textarea>
                            </label>
                            <button class="form-fields button" value="Send" type="submit">Send <i class="fa fa-paper-plane"></i></button>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
@include('layouts.footer')





@endsection