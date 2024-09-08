@extends('main.master')
@section('content')
    <!-- START -->
    <!--PRICING DETAILS-->
    <section class=" pri">
        <div class="container">
            <div class="row">
                <div class="tit">
                    <h2><span>Choose your pricing plan</span></h2>
                    <p>Capture the perfect pricing plan to suit your photography business and client needs.</p>
                </div>
                <ul class="row wrap">
                    @foreach($plans as $plan)
                    <li class="col-md-6 col-12">
                        <div class="pri-box">
                            <div class="c2">
                                <h4>{{$plan->plan_type_name}}</h4>
                                <p class="{{($plan->plan_type_id)==1?'':'d-none'}}">For getting started</p>
                                <p class="{{($plan->plan_type_id)==2?'':'d-none'}}">Perfect for small teams</p>
                                <p class="{{($plan->plan_type_id)==3?'':'d-none'}}">Best value for large teams</p>
                                <p class="{{($plan->plan_type_id)==4?'':'d-none'}}">Made for enterprises</p>
                            </div>
                            <div class="c3">
                                <h2><span></span>Rs: {{$plan->plan_type_price}}</h2>
                                <p class="{{($plan->plan_type_id)==1?'':'d-none'}}">Single user</p>
                                <p class="{{($plan->plan_type_id)==2?'':'d-none'}}">Startup business</p>
                                <p class="{{($plan->plan_type_id)==3?'':'d-none'}}">Medium business</p>
                                <p class="{{($plan->plan_type_id)==4?'':'d-none'}}">Made for enterprises</p>
                                
                                <a href="{{route('user_add_listing')}}">Add listing</a>
                                
                            </div>
                            <div class="c4">
                                <ol>
                                    <li>{{$plan-> plan_type_listing_count}} Listing </li>

                                    <li>
                                    {{$plan->plan_type_duration}} month(s) (duration)
                                    </li>

                                    <li>{{$plan->plan_type_event_count}} Events </li>

                                    <li>{{$plan->plan_type_blog_count}} Blog posts  </li>

                                    <li>{{$plan->plan_type_job_count}} Jobs</li>

                                    <li class="{{($plan->plan_type_direct_lead)==0?'d-none':''}}">Get direct leads</li>

                                    <li  class="{{($plan->plan_type_email_notification)==0?'d-none':''}}">Email notification(leads)</li>

                                    <li  class="{{($plan->plan_type_verified)==0?'d-none':''}}">Verified listing</li>

                                    <li  class="{{($plan->plan_type_trusted)==0?'d-none':''}}">Trusted listing</li>
                                    
                                    <li  class="">User Dashboard</li>

                                    <li>{{$plan->plan_type_photos_count}} photos </li>

                                    <li>{{$plan->plan_type_videos_count}} videos </li>

                                    <li  class="">Create duplicate listing</li>

                                    <li  class="{{($plan->plan_type_social)==0?'d-none':''}}">Social media share</li>
                                    
                                    <li  class="{{($plan->plan_type_ratings)==0?'d-none':''}}">Review control</li>
                                    
                                    <li class="">Admin tips</li>
                                </ol>
                            </div>
                            <div class="c5">
                                <a href="{{route('login',['id'=>1])}}">Get Start</a>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    <!--END PRICING DETAILS-->

    <section>
        <div class="pop-ups pop-quo">
            <!-- The Modal -->
            <div class="modal fade" id="quote">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <!-- Modal Header -->
                        <div class="quote-pop">
                            <h4>Get quote</h4>
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                           placeholder="Enter name*" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control"
                                           placeholder="Enter email*"
                                           pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$"
                                           title="Invalid email address" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                           placeholder="Enter mobile number *"
                                           pattern="[7-9]{1}[0-9]{9}"
                                           title="Phone number starting with 7-9 and remaining 9 digit with 0-9" required>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="3"
                                              placeholder="Enter your query or message"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- START -->
 @endsection