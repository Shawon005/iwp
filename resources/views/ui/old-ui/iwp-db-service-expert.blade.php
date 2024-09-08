@extends('ui.old-ui.master.master')
@section('content')

	<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->

			<!--CENTER SECTION-->
			<div class="ud-cen">
				<div class="log-bor">&nbsp;</div>	<span class="udb-inst">ALL SERVICE EXPERTS LEADS</span>
				<div class="ud-cen-s2">
				@if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
					<!-- <h2>Listing Details</h2> -->
					<div class="text-center pb-4">
                		<input type="text" id="myInput" placeholder="Search this page..">
            		</div>
					<!-- <a href="" class="db-tit-btn" id="expstatus">Update my Availability</a> -->
					<a href="#" class="db-tit-btn cta-db-exp-avail" data-toggle="modal" data-target="#expw">Update my Availability</a>
					<div class="table-responsive">
						<table class="table bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Lead details</th>
									<th>Enquiry details</th>
									<th>Message</th>
									<!--									<th>Expiry on</th>-->
									<th>Rating</th>
									<th>Manage</th>
									<th>Status</th>
									<!-- <th>Edit</th> -->
									<th>Delete</th>
									<!--                                    <th>-->
									<!--</th>-->
									<!-- <th>Preview</th> -->
								</tr>
							</thead>
							<tbody>
							 @foreach($expert as $user)
								<tr>
								@php $T_R=sub('vv_expert_reviews','expert_id',$user->expert_id); $T=count($T_R); $review=0; @endphp
									@foreach($T_R as $R)
									@php $review=$review+$R->expert_rating @endphp
									@endforeach
									<td>{{$user->enquiry_id}}</td>
									<td>
										{{$user->enquiry_name}}<br>{{dateFormatConverter($user->enquiry_cdt)}}</td>
										<td>Phone:{{$user->enquiry_mobile}}<br>
										Email:{{$user->enquiry_email}}<br>
										Address:{{$user->enquiry_location}}<br>
										Preferred date:{{dateFormatConverter($user->appointment_date)}}<br>
										Preferred time:{{$user->appointment_time}}
									</td>
									<td>{{$user->enquiry_message}}</td>
									<td><span class="db-list-rat">{{($review!=0)?$review/$T:"N/A"}}</span>
									</td>
									<td><a href="" data-toggle="modal" data-target="#expstatus{{$user->enquiry_id}}"><span class="db-list-rat">Manage</span></a></td>
									<!--									<td><span class="db-list-ststus">8 June 2020</span></td>-->

									<?php
									$status='Cancel';
									if($user->enquiry_status==300) {
									   $status="On the way";}
									if($user->enquiry_status==400) {
									  $status="Pending";}
									if($user->enquiry_status==500) {
									  $status="Done";}
									if($user->enquiry_status==200) {
									   $status="New" ;  }
									?>							
									<td><span class="db-list-ststus">{{$status}}</span>
									</td>
									<!-- <td><a href="edit-listing-step-1.html?row=LIST395" class="db-list-edit">Edit</a>
									</td> -->
									<td><a href="{{route('db-enquiry-delete',['id'=>$user->enquiry_id])}}" class="db-list-edit">Delete</a>
									</td>
									<!--									<td><a href="promote-business.html?code=-->
									<!--&&type=listing" class="db-list-edit">-->
									<!--</a></td>-->
									<!-- <td><a href="listing/test6" class="db-list-edit" target="_blank">Preview</a>
									</td> -->
								</tr>
								<section>
									<div class="modal fade" id="expstatus{{$user->enquiry_id}}">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="log-bor">&nbsp;</div>
												<span class="udb-inst">Manage Lead</span>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<!-- Modal Header -->
												<div class="quote-pop">
													<div id="expert_manage_lead_success2" class="log" style="display: none;">
														<p>Enquiry status have been successfully updated!!</p>
													</div>
													<div id="expert_manage_lead_fail2" class="log" style="display: none;">
														<p>Oops!! Something Went Wrong Try Later!!!</p>
													</div>
													<form method="post" name="expert_manage_lead_form" id="expert_manage_lead_form2">
														@csrf
														<input type="hidden" class="form-control" name="enquiry_id"
																value="{{$user->enquiry_id}}" required>
														<input type="hidden" class="form-control" name="expert_user_id"
																value="{{$user->expert_user_id}}" required>
														<div class="form-group">
															<label
																class="">Preferred Date</label>
															<input type="date" class="form-control" name="appointment_date"
																	value="{{$user->appointment_date}}"
																	id="expredate">
														</div>
														<div class="form-group">
															<label
																class="">Approximate arrive time</label>
															<select class="form-control" id="appointment_time"
																	name="appointment_time">
																    <option value="5:00 AM"{{($user->appointment_time=='5:00 AM')?'selected':''}} >5:00 AM</option>
																	<option value="6:00 AM"{{($user->appointment_time=='6:00 AM')?'selected':''}} >6:00 AM</option>
																	<option value="7:00 AM"{{($user->appointment_time=='7:00 AM')?'selected':''}} >7:00 AM</option>
																	<option value="8:00 AM"{{($user->appointment_time=='8:00 AM')?'selected':''}} >8:00 AM</option>
																	<option value="9:00 AM"{{($user->appointment_time=='9:00 AM')?'selected':''}} >9:00 AM</option>
																	<option value="10:00 AM"{{($user->appointment_time=='10:00 AM')?'selected':''}}>10:00 AM</option>
																	<option value="11:00 AM"{{($user->appointment_time=='11:00 AM')?'selected':''}} >11:00 AM</option>
																	<option value="12:00 PM"{{($user->appointment_time=='12:00 PM')?'selected':''}} >12:00 PM</option>
																	<option value="1:00 PM" {{($user->appointment_time=='1:00 PM')?'selected':''}} >1:00 PM</option>
																	<option value="2:00 PM" {{($user->appointment_time=='2:00 PM')?'selected':''}} >2:00 PM</option>
																	<option value="3:00 PM"{{($user->appointment_time=='3:00 PM')?'selected':''}} >3:00 PM</option>
																	<option value="4:00 PM"{{($user->appointment_time=='4:00 PM')?'selected':''}} >4:00 PM</option>
																	<option value="5:00 PM"{{($user->appointment_time=='5:00 PM')?'selected':''}} >5:00 PM</option>
																	<option value="6:00 PM"{{($user->appointment_time=='6:00 PM')?'selected':''}} >6:00 PM</option>
																	<option value="7:00 PM"{{($user->appointment_time=='7:00 PM')?'selected':''}} >7:00 PM</option>
																	<option value="8:00 PM"{{($user->appointment_time=='8:00 PM')?'selected':''}} >8:00 PM</option>
																	<option value="9:00 PM" {{($user->appointment_time=='9:00 PM')?'selected':''}} >9:00 PM</option>
																	<option value="10:00 PM" {{($user->appointment_time=='10:00 PM')?'selected':''}} >10:00 PM</option>
																	<option value="11:00 PM" {{($user->appointment_time=='11:00 PM')?'selected':''}} >11:00 PM</option>
																	<option value="12:00 AM"{{($user->appointment_time=='12:00 AM')?'selected':''}} >12:00 AM</option>
															</select>
														</div>
														<div class="form-group">
															<label
																class="">Service status</label>
															<select class="form-control" name="enquiry_status" id="enquiry_status">
																<option value="500"  {{($user->enquiry_status=='500')?'selected':''}} >Done</option>
																<option value="300" {{($user->enquiry_status=='300')?'selected':''}} >On the way</option>
																<option value="400" {{($user->enquiry_status=='400')?'selected':''}} >Pending</option>
																<option value="100" {{($user->enquiry_status=='100')?'selected':''}} >Cancel</option>
																<option value="200"{{($user->enquiry_status=='200')?'selected':''}}  >New</option>
															</select>
														</div>
														<button type="submit" id="expert_manage_lead_submit2"
																name="expert_manage_lead_submit"
																class="btn btn-primary">Submit</button>
													</form>
												</div>
											</div>
										</div>
									</div>
											
								</section>
								@endforeach
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<section>
        <div style="padding-bottom: 0!important;" class="pop-ups pop-quo job-form exp-pop-form">
            <!-- The Modal -->
            <div class="modal fade" id="expw">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="log-bor">&nbsp;</div>
                        <span class="udb-inst">Availability</span>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <!-- Modal Header -->
                        <div class="quote-pop">
                            <div
                                class="ser-exp-wel ser-exp-wel1">This will help you your availability status to customers. Customers easy to know you are available or not.</div>
                            <div id="expert_availability_success" class="log" style="display: none;">
                                <p>Your Availability Successfully Updated!!!</p>
                            </div>
                            <div id="expert_availability_fail" class="log" style="display: none;">
                                <p>Oops!! Something Went Wrong Try Later!!!</p>
                            </div>
                            <form method="post" name="expert_manage_lead_form7" id="expert_manage_lead_form7">
								@csrf
                                <input type="hidden" class="form-control" name="expert_id"
                                       value="{{Nam('vv_experts','user_id',session('user_id'),'expert_id')}}">
                                <div class="form-group">
                                    <label class="">Choose Availability</label>
                                    <select class="form-control" id="expert_availability_status"
                                            name="expert_availability_status">
                                        <option value="0">Available (Ready to work)</option>
                                        <option value="1">Busy (Busy on other customer)</option>
                                        <option selected value="2">End today (Done today work)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="">Service Start Time</label>
                                    <select class="form-control" name="available_time_start">
										<option  value="5:00 AM">5:00 AM</option>
											<option  value="6:00 AM">6:00 AM</option>
											<option  value="7:00 AM">7:00 AM</option>
											<option  value="8:00 AM">8:00 AM</option>
											<option selected value="9:00 AM">9:00 AM</option>
											<option  value="10:00 AM">10:00 AM</option>
											<option  value="11:00 AM">11:00 AM</option>
											<option  value="12:00 PM">12:00 PM</option>
											<option  value="1:00 PM">1:00 PM</option>
											<option  value="2:00 PM">2:00 PM</option>
											<option  value="3:00 PM">3:00 PM</option>
											<option  value="4:00 PM">4:00 PM</option>
											<option  value="5:00 PM">5:00 PM</option>
											<option  value="6:00 PM">6:00 PM</option>
											<option  value="7:00 PM">7:00 PM</option>
											<option  value="8:00 PM">8:00 PM</option>
											<option  value="9:00 PM">9:00 PM</option>
											<option  value="10:00 PM">10:00 PM</option>
											<option  value="11:00 PM">11:00 PM</option>
											<option  value="12:00 AM">12:00 AM</option>
									</select>
                                </div>
                                <div class="form-group">
                                    <label class="">Service Close Time</label>
                                    <select class="form-control" name="available_time_end">
										<option  value="6:00 AM">6:00 AM</option>
											<option  value="7:00 AM">7:00 AM</option>
											<option  value="8:00 AM">8:00 AM</option>
											<option  value="9:00 AM">9:00 AM</option>
											<option  value="10:00 AM">10:00 AM</option>
											<option  value="11:00 AM">11:00 AM</option>
											<option  value="12:00 PM">12:00 PM</option>
											<option  value="1:00 PM">1:00 PM</option>
											<option  value="2:00 PM">2:00 PM</option>
											<option  value="3:00 PM">3:00 PM</option>
											<option  value="4:00 PM">4:00 PM</option>
											<option  value="5:00 PM">5:00 PM</option>
											<option selected value="6:00 PM">6:00 PM</option>
											<option  value="7:00 PM">7:00 PM</option>
											<option  value="8:00 PM">8:00 PM</option>
											<option  value="9:00 PM">9:00 PM</option>
											<option  value="10:00 PM">10:00 PM</option>
											<option  value="11:00 PM">11:00 PM</option>
											<option  value="12:00 AM">12:00 AM</option>
									</select>
                                </div>
                                <button type="submit" id="expert_manage_lead_submit7" name="expert_manage_lead_submit7"
                                        class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--- END --->
    </section>
	<!--RIGHT SECTION-->
	<!--END PRICING DETAILS-->
	<!-- START -->
	<!-- END -->
	<!-- START -->
	<!-- <section>
		<div class="full-bot-book">
			<div class="container">
				<div class="row">
					<div class="bot-book">
						<div class="col-md-2 bb-img">
							<img src="images/idea.png" alt="">
						</div>
						<div class="col-md-7 bb-text">
							<h4>#1 Business Directory and Service Provider</h4>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>
						</div>
						<div class="col-md-3 bb-link"> <a href="pricing-details.html">Add my business</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> -->

	@endsection
	@section('js')
	<script>

        //
        <!--Expert Service Manage Lead Form Ajax Call And Validation starts-->

        $("#expert_manage_lead_submit2").click(function () {
            $("#expert_manage_lead_form2").validate({
                rules: {
                    appointment_date: {required: true},
                    enquiry_status: {required: true},
                    appointment_time: {required: true}

                },
                messages: {
                    appointment_date: {required: "Date is Required"},
                    enquiry_status: {required: "Status is Required"},
                    appointment_time: {required: "Time is Required"}
                },

                submitHandler: function (form) { // for demo
                    //form.submit();

                    if (webpage_full_link != null) {
                        var link = webpage_full_link + 'service-experts/expert_manage_lead_update.php';
                    } else {
                        var link = 'service-experts/expert_manage_lead_update.php';
                    }

                    $.ajax({
                        type: "POST",
                        data: $("#expert_manage_lead_form2").serialize(),
                        url: '/enquery_manage',
                        cache: true,
                        success: function (html) {
                            //alert(html);
                            if (html == 500500) {
                                $("#expert_manage_lead_fail2").show();
                                $("#expert_manage_lead_form2")[0].reset();
                            } else {
                                if (html == 403403) {
                                    $("#expert_manage_lead_fail2").show();
                                    $("#expert_manage_lead_form2")[0].reset();
                                } else {
                                    $("#expert_manage_lead_success2").show();
                                    $("#expert_manage_lead_form2")[0].reset();
                                    window.location.reload();
                                }
                            }

                        }

                    })
                }
            });
        });
        <!--Expert Service Manage Lead Form Ajax Call And Validation ends-->
    </script>
	<script>

//
<!--Expert Service Manage Lead Form Ajax Call And Validation starts-->

$("#expert_manage_lead_submit7").click(function () {
	$("#expert_manage_lead_form7").validate({
		rules: {
			appointment_date: {required: true},
			enquiry_status: {required: true},
			appointment_time: {required: true}

		},
		messages: {
			appointment_date: {required: "Date is Required"},
			enquiry_status: {required: "Status is Required"},
			appointment_time: {required: "Time is Required"}
		},

		submitHandler: function (form) { // for demo
			//form.submit();

			if (webpage_full_link != null) {
				var link = webpage_full_link + 'service-experts/expert_manage_lead_update.php';
			} else {
				var link = 'service-experts/expert_manage_lead_update.php';
			}

			$.ajax({
				type: "POST",
				data: $("#expert_manage_lead_form7").serialize(),
				url: '/avaliability',
				cache: true,
				success: function (html) {
					 //alert(html);
					if (html == 500500) {
						$("#expert_manage_lead_fail7").show();
						$("#expert_manage_lead_form7")[0].reset();
					} else {
						if (html == 403403) {
							$("#expert_manage_lead_fail7").show();
							$("#expert_manage_lead_form7")[0].reset();
						} else {
							$("#expert_manage_lead_success7").show();
							$("#expert_manage_lead_form7")[0].reset();
							window.location.reload();
						}
					}

				}

			})
		}
	});
});
<!--Expert Service Manage Lead Form Ajax Call And Validation ends-->
</script>
	@endsection