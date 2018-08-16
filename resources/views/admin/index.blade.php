@extends('layouts.master')

@section('content')

 <section class="_r_section_login_wrap">
                <div class="container">
                    <div class="row justify-content-md-center" style="height: 100vh;display: flex;background-image: url(img/s1.jpeg);">
                        <div class="col-md-3 col-sm-1" style="margin: auto;"  id="_r_login_header" >
                            <header>
                              <h2>Admin Login</h2>
                            </header>
                            <div style="background-color: lightgray">
                              <form action="/store" method="POST" class="login-form">
                                @csrf
                                <input type="text" name="email"  placeholder="email"  class="login-input" required autofocus>
                                <input type="password" name="password" placeholder="password" class="login-input" required autofocus>
                             
                              <div class="submit-container">
                                <button type="submit" class="login-button">SIGN IN</button>
                              </div>

                              </form>
                            </div>
                             
                        </div>
                    </div>
                </div>
            </section>
{{-- <div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-6">
<div class="card">
	 <div class="card-body">
 <form action="/store" method="POST">
 	@csrf --}}
  {{-- <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" name="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" name="password" class="form-control" id="pwd">
  </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      
    </label>
  </div> --}}
  {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
{{--  </form> --}}
{{-- </div>
</div>
</div>
</div> --}}

@endsection


