@extends('ui.old-ui.master.master')
@section('content')
	<!-- START -->

	<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->

			<!--CENTER SECTION-->
			<div class="ud-cen">
				<div class="log-bor">&nbsp;</div>	<span class="udb-inst">All APPLIED JOBS</span>
				@if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
				<div class="ud-cen-s2">
					<div class="table-responsive">
						<table class="table bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Job Title</th>
									<th>Applied date</th>
									<!-- <th>Views</th> -->
									<!--									<th>Expiry on</th>-->
									<!-- <th>Status</th> -->
									<!-- <th>Edit</th> -->
									<!-- <th>Delete</th> -->
									<!--                                    <th>-->
									<!--</th>-->
									<th>Preview</th>
								</tr>
							</thead>
							<tbody>
							@foreach($job as $user)
								<tr>
								<td>{{$user->job_applied_id}}</td>
                                <td>{{Nam('vv_jobs','job_id',$user->job_id,'job_title')}}</td>
                                <td>{{dateFormatConverter($user->job_applied_cdt)}}</td>
								<td></td>
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