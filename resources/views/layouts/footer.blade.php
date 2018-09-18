<footer>
    <!--<div class="container-fluid">-->
        <div class="_r_footer_wrap">
            <div class="row">
                <div class="col-md-4 _r_footer_grid">
                    <div class="card">
                        <div class="card-body">
                            <h5>Upadated Notice</h5>
                            <ul class="_r_first_footer_wrap">
                                <li><i class="fas fa-angle-double-right"></i>Some quick example text to build on the card title</li>
                                <li><i class="fas fa-angle-double-right"></i>Some quick example text to build on the card title</li>
                                <li><i class="fas fa-angle-double-right"></i>Some quick example text to build on the card title</li>
                                <li><i class="fas fa-angle-double-right"></i>Some quick example text to build on the card title</li>
                                <li><i class="fas fa-angle-double-right"></i>Some quick example text to build on the card title</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 _r_footer_grid">
                    <div class="card">
                        <img class="card-img-top" src="/img/logo.png" alt="Card image cap">
                        <div class="card-body">

                            <div class="_r_footer_title">
                                <p>Kurmitola Golf Club</p>
                            </div>

                            <div class="_r_sc_socials_wrap">
                                <div class="_r_sc_socials_item">
                                    <a href="#" target="_blank">
                                        <span><i class="fab fa-facebook-f"></i></span>
                                    </a>
                                </div>
                                <div class="_r_sc_socials_item">
                                    <a href="#" target="_blank">
                                        <span><i class="fas fa-glass-martini"></i></span>
                                    </a>
                                </div>
                                <div class="_r_sc_socials_item">
                                    <a href="#" target="_blank">
                                        <span><i class="fab fa-youtube"></i></span>
                                    </a>
                                </div>
                                <div class="_r_sc_socials_item">
                                    <a href="#" target="_blank">
                                        <span><i class="fab fa-youtube"></i></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--<h3>@Optinfer/2018</h3>-->
                    </div>
                </div>
                <div class="col-md-4 _r_footer_grid">
                    <div class="card">
                        <div class="card-body">
                            <h5>Contact Us</h5>

                            <table>
                                <thead>
                                    @php
                                    $var = \App\Contact::latest()->first();
                                    @endphp
                                <p> {!! $var->contact_details !!} <p>
                              {{--   </thead>
                                <tbody>
                                <tr>
                                    <td>Tuesday</td>
                                    <td>6AM–9PM</td>
                                </tr>
                                <tr>
                                    <td>Wednesday</td>
                                    <td>6AM–9PM</td>
                                </tr>
                                <tr>
                                    <td>Thursday</td>
                                    <td>6AM–9PM</td>
                                </tr>
                                <tr>
                                    <td>Friday</td>
                                    <td>6AM–9PM</td>
                                </tr>
                                <tr>
                                    <td>Saturday</td>
                                    <td>6AM–9PM</td>
                                </tr>
                                <tr>
                                    <td>Sunday</td>
                                    <td>6AM–9PM</td>
                                </tr>
                                <tr>
                                    <td>Monday</td>
                                    <td>6AM–9PM</td>
                                </tr>
                                </tbody>
                                <tfoot style="background-color: #6c757d">
                                <p>Founded: 1956Region served: Bangladesh Phone: 01730-004616</p>
                                </tfoot> --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--</div>-->
</footer>