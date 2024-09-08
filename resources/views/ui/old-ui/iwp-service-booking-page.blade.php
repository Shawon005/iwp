@extends('ui.old-ui.master.master2')
@section('content')
<section>
    <div class="ser-confir">
        <div class="container">
            <div class="row">
                <div class="ser-confir-main">
                                        <div class="lhs">
                        <div class="exp-deta-1">
                            <img src="{{asset('/storage/file/'.$expert->profile_image)}}"
                                alt=""/>
                            <h2>{{$expert->profile_name}}</h2>
                            <span class="loc"></span>
                            <p></p>
                        </div>
                        <div class="exp-deta-con-com exp-deta-2">
                            <h4>Expert approximate arrive time</h4>
                            <p>{{$enquery->appointment_time}} - {{dateFormatConverter($enquery->appointment_date)}}</p>
                        </div>
                        <div class="exp-deta-con-com exp-deta-3">
                            <h4>Service status</h4>
                            <p>Closed</p>
                        </div>
                        <div class="exp-deta-con-com exp-deta-4">
                            <h4>Payment accept</h4>
                            <ul>
                                <li>Cash</li>
                                <li>PayPal</li>
                                <li>Stripe</li>
                                <li>Google Pay</li>
                            </ul>
                        </div>
                    </div>
                    <div class="rhs">
                        <h2>Booking reference</h2>
                        <ul>
                            <li>Services: </li>
                            <li>Preferred date & time: {{$enquery->appointment_time}} - {{dateFormatConverter($enquery->appointment_date)}}</li>
                            <li>Message: {{$enquery->enquiry_message}}</li>
                        </ul>
                        <a href="#" class="cta-wri-rev" data-toggle="modal" data-target="#expwrirevi">Write Review</a>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="modal fade show" id="expwrirevi" >

<div class="modal-dialog">
    <div class="modal-content">
        <div class="exper-rev-box">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <div class="tit">
                <h4>Write a Review</h4>
            </div>
            <div class="prof">
                <img src="{{asset('/storage/file/'.$expert->profile_image)}}" alt="">
                <h3>{{$expert->profile_name}}</h3>
                <p>Rate the Service and Care here</p>
            </div>
                    <form class="col" name="expert_review_form" id="expert_review_form" method="post">
                        @csrf
                    <input type="hidden" class="form-control" name="expert_id" value="{{$expert->expert_id}}">
                    <input type="hidden" class="form-control" name="expert_user_id" value="{{$expert->user_id}}">
                    <input name="review_user_id" value="{{session('user_id')}}" type="hidden">
                    <div id="expert_review_success" style="text-align:center;display: none; color: green;">Thanks for your Review !! Your Review Is Successful!!                                </div>
                    <div id="expert_review_fail" style="text-align:center;display: none; color: red;">Oops!! Something Went Wrong Try Later!!!</div>
                    <div class="rating-new">
                        <fieldset class="rating">
                            <input type="radio" id="star5" name="expert_rating" class="expert_rating" value="5">
                            <label class="full" for="star5" title="Awesome"></label>
                            <input type="radio" id="star4" name="expert_rating" class="expert_rating" value="4">
                            <label class="full" for="star4" title="Excellent"></label>
                            <input type="radio" id="star3" class="expert_rating" name="expert_rating" value="3">
                            <label class="full" for="star3" title="Good"></label>
                            <input type="radio" id="star2" name="expert_rating" class="expert_rating" value="2">
                            <label class="full" for="star2" title="Average"></label>
                            <input type="radio" id="star1" name="expert_rating" class="expert_rating" value="1" checked="checked">
                            <label class="full" for="star1" title="Poor"></label>
                        </fieldset>
                        <div id="star-value">3 Star</div>
                    </div>
                    <div class="rating-new-msg">
                        <textarea name="expert_message" placeholder="Write your comments.."></textarea>
                    </div>
                    <div class="rating-new-cta">
                        <span data-dismiss="modal">Not now</span>
                        <button type="submit" name="expert_review_submit" id="expert_review_submit">Submit Review</button>
                    </div>
                </form>
                                </div>
    </div>
</div>
</section>
@endsection