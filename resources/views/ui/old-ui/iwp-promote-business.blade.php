
@extends('ui.old-ui.master.master2')
@section('content')
	<!-- START -->

	<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->
	<section class=" login-reg">
		<div class="container">
			<div class="row">
				<div class="login-main add-list">
					<div class="log-bor">&nbsp;</div> <span class="steps">Start promotions</span>
					<div class="log">
						<div class="login">
							<h4>Start promotions</h4>
							<form name="create_promote_form" id="create_promote_form" method="post" action="{{route('add-promote-store')}}" enctype="multipart/form-data">
								@csrf
							    <input type="hidden" value="" name="ad_total_days" id="ad_total_days" class="validate">
								<input type="hidden" value="" name="ad_cost_per_day" id="ad_cost_per_day" class="validate">
								<input type="hidden" value="" name="ad_total_cost" id="ad_total_cost" class="validate">
								<input type="hidden" value="1" name="adposi" id="adposi" class="validate">
								<!--                            <input type="hidden" value="-->
								<!--" name="type_id" id="type_id"-->
								<!--                                   class="validate">-->
								<input type="hidden" value="promote-business.html" name="url" id="url" class="validate">
								<!--                            <input type="hidden" value="-->
								<!--" name="type_value" id="type_value"-->
								<!--                                   class="validate">-->
								<input type="hidden" value="1" name="type_value" id="type_value" class="validate">
								<!--FILED START-->
								<!--                            <div class="row">-->
								<!--                                <div class="col-md-12">-->
								<!--                                    <div class="form-group">-->
								<!--                                        <input id="listing_name" name="listing_name" type="text" required="required"-->
								<!--                                               readonly="readonly" class="form-control"-->
								<!--                                               value="-->
								<!--"-->
								<!--                                               placeholder="-->
								<!--">-->
								<!--                                    </div>-->
								<!--                                </div>-->
								<!--                            </div>-->
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<select name="listing_id" required="required" id="listing_id" class=" form-control">
												<option value="">Choose Listing</option>
												@foreach($listing as $user):
												<option value="{{$user->listing_id}}" >{{$user->listing_name}}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Start date</label>
											<input id="start_date" onfocusout="func()" name="start_date" required="required" type="date" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>End date</label>
											<input id="end_date" onfocusout="func()" name="end_date" type="date" required="required" class="form-control">
										</div>
									</div>
								</div>
								<!--FILED END-->
								<!--FILED START-->
								<div class="row">
									<div class="col-md-12">
										<div style="display:block" class="ad-pri-cal">
											<ul>
												<li>
													<div> <span>Total days</span>
														<h5 id="total_day">0</h5>
													</div>
												</li>
												<li>
													<div> <span>Cost Per Day</span>
														<h5><b class="ad-pocost">{{Nam('vv_footer','footer_id','1','cost_per_point')}}</b></h5>
													</div>
													<input type="number" id="cost_per_point" name="cost" class="d-none" value="{{Nam('vv_footer','footer_id','1','cost_per_point')}}">
												</li>
												<!--                                                    <li>-->
												<!--                                                        <div>-->
												<!--                                                            <span>Tax</span>-->
												<!--                                                            <h5>-->
												<!--4</h5>-->
												<!--                                                        </div>-->
												<!--                                                    </li>-->
												<li>
													<div> <span>Total Points</span>
														<h5><b id="point">0</b></h5>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<!--FILED END-->
								<button type="submit" name="create_promote_submit" class="btn btn-primary">Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--END PRICING DETAILS-->
	<!-- START -->

	<!-- END -->
	<!-- START -->
	
	@endsection
@section('js')
<script>
//   window.alert("total_day")
  function func(){
//  window.alert("total_day")
          var start_date=document.getElementById("start_date").value;
          var end_date=document.getElementById("end_date").value;
		  var per_point=document.getElementById("cost_per_point").value;

          start_date=Math.abs((new Date(start_date).getTime()/1000).toFixed(0));
          end_date=Math.abs((new Date(end_date).getTime()/1000).toFixed(0));
         
          var total_day=end_date-start_date;
         // alert(total_day/(60*60*24));
		 parseInt(per_point);
          document.getElementById("total_day").innerHTML=total_day/(60*60*24);
          document.getElementById("point").innerHTML=(total_day/(60*60*24)*per_point);

  }
</script>
@endsection