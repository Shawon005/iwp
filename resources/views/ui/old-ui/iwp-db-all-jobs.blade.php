@extends('ui.old-ui.master.master')
@section('content')
	<!-- START -->
	<!--PRICING DETAILS-->

			<!--CENTER SECTION-->
			<div class="ud-cen">
				<div class="log-bor">&nbsp;</div>	<span class="udb-inst">All JOBS</span>
				<div class="ud-cen-s2">
					<h2>Job Details</h2>
					@if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
					<a href="{{route('add-job')}}" class="db-tit-btn">Add New Job</a>
					<div class="table-responsive">
						<table class="table bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Job Name</th>
									<th>Job Applicants</th>
									<th>Job Applicant Profiles</th>
									<!-- <th>Listing Name</th> -->
									<!-- <th>Rating</th> -->
									<th>Views</th>
									<!--									<th>Expiry on</th>-->
									<!-- <th>Status</th> -->
									<th>Edit</th>
									<th>Delete</th>
									<!--                                    <th>-->
									<!--</th>-->
									<th>Preview</th>
								</tr>
							</thead>
							<tbody>
								@foreach($job as $user)
								<tr>
									<td>{{$user->job_id}}</td>
									<td><span class="db-list-rat">{{$user->job_title}}</span></td>
									<td><span class="db-list-rat">{{CountCol('vv_job_applied','job_id',$user->job_id)}}</span>
									</td>
									<td><a href="{{route('all-applied-profile',['id'=>$user->job_id])}}" ><span class="db-list-ststus">view profile</span></a></td>
									<td><span class="db-list-ststus">{{CountCol('vv_page_views','job_id',$user->job_id)}}</span>
									</td>
									<td><a href="{{route('edit-job',['id'=>$user->job_id])}}" class="db-list-edit">Edit</a>
									</td>
									<td><a href="{{route('db-job-delete',['id'=>$user->job_id])}}" class="db-list-edit">Delete</a>
									</td>
									<!-- <td><a href="promote-business.html?cod
									&&type=listing" class="db-list-edit">
									</a></td> -->
									<td><a href="{{route('job_details',['id'=>$user->job_id])}}" class="db-list-edit" target="_blank">Preview</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
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