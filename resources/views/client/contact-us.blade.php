@extends('client.index')
@section('titlel', 'Contact Us')
@section('client_content')

<!-- ***** Reservation Us Area Starts ***** -->
<section class="section" id="reservation">
  <div class="container">
      <div class="row">
          <div class="col-lg-6 align-self-center">
              <div class="left-text-content">
                  <div class="section-heading">
                      <h6>Contact Us</h6>
                      <h2>Here You Can Leave Us A Message For Inquiries</h2>
                  </div>
                 
                  <div class="row">
                      <div class="col-lg-6">
                          <div class="phone">
                              <i class="fa fa-phone"></i>
                              <h4>Phone Numbers</h4>
                              <span><a href="#">088-856-2710</a><br><a href="#">0915-580-3508</a></span>
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <div class="message">
                              <i class="fa fa-envelope"></i>
                              <h4>Emails</h4>
                              <span><a>casalco.coop@gmail.com</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-6">
              <div class="contact-form">
                  <form id="contact" action="" method="post">
                    <div class="row">
                      <div class="col-lg-12">
                          <h4>Contact Us</h4>
                      </div>
                      <div class="col-lg-6 col-sm-12">
                        <fieldset>
                          <input name="name" type="text" id="name" placeholder="Your Name*" required="">
                        </fieldset>
                      </div>
                      <div class="col-lg-6 col-sm-12">
                        <fieldset>
                        <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email Address" required="">
                      </fieldset>
                      </div>
                      {{-- <div class="col-lg-6 col-sm-12">
                        <fieldset>
                          <input name="phone" type="text" id="phone" placeholder="Phone Number*" required="">
                        </fieldset>
                      </div>
                      <div class="col-md-6 col-sm-12">
                        <fieldset>
                          <select value="number-guests" name="number-guests" id="number-guests">
                              <option value="number-guests">Number Of Guests</option>
                              <option name="1" id="1">1</option>
                              <option name="2" id="2">2</option>
                              <option name="3" id="3">3</option>
                              <option name="4" id="4">4</option>
                              <option name="5" id="5">5</option>
                              <option name="6" id="6">6</option>
                              <option name="7" id="7">7</option>
                              <option name="8" id="8">8</option>
                              <option name="9" id="9">9</option>
                              <option name="10" id="10">10</option>
                              <option name="11" id="11">11</option>
                              <option name="12" id="12">12</option>
                          </select>
                        </fieldset>
                      </div>
                      <div class="col-lg-6">
                          <div id="filterDate2">    
                            <div class="input-group date" data-date-format="dd/mm/yyyy">
                              <input  name="date" id="date" type="text" class="form-control" placeholder="dd/mm/yyyy">
                              <div class="input-group-addon" >
                                <span class="glyphicon glyphicon-th"></span>
                              </div>
                            </div>
                          </div>   
                      </div>
                      <div class="col-md-6 col-sm-12">
                        <fieldset>
                          <select value="time" name="time" id="time">
                              <option value="time">Time</option>
                              <option name="Breakfast" id="Breakfast">Breakfast</option>
                              <option name="Lunch" id="Lunch">Lunch</option>
                              <option name="Dinner" id="Dinner">Dinner</option>
                          </select>
                        </fieldset>
                      </div> --}}
                      <div class="col-lg-12">
                        <fieldset>
                          <textarea name="message" rows="6" id="message" placeholder="Message" required=""></textarea>
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <button type="submit" id="form-submit" class="main-button-icon">Send A Message</button>
                        </fieldset>
                      </div>
                    </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- ***** Reservation Area Ends ***** -->

@endsection