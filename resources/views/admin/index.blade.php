@extends('layouts.master')

@section('content')

 <section class="_r_section_login_wrap">
                <div class="container">
                    <div class="row justify-content-md-center">
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


@endsection


