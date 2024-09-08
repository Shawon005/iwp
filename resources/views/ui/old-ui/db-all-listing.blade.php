@extends('ui.old-ui.master.master')
@section('content')
	
	<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->
			<!--CENTER SECTION-->
			<div class="ud-cen">
				<div class="log-bor">&nbsp;</div>	<span class="udb-inst">All Listings</span>
				<div class="ud-cen-s2">
					<h2>Listing Details</h2>
					@if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
					<a href="{{route('user_add_listing')}}" class="db-tit-btn">Add New Listing</a>
					<div class="table-responsive">
						<table class="table bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Listing Name</th>
									<th>Views</th>
									<th>Rating</th>
									<!--									<th>Expiry on</th>-->
									<th>Status</th>
									<th>Edit</th>
									<th>Delete</th>
									<!--                                    <th>-->
									<!--</th>-->
									<th>Preview</th>
								</tr>
							</thead>
							<tbody>
								@foreach($listings as $user)
								<tr>
									<td>{{$user->listing_id}}</td>
									<td><img src="{{asset('/storage/file/'.$user->profile_image)}}" width="50" height="60" style="border-radius:50%"class="me-2">{{$user->listing_name}}</td>
									<td><span class="bg-success p-1">{{CountCol('vv_page_views','listing_id',$user->listing_id)}}</span></td>
									@php $total=0; $rats=sub('vv_reviews','listing_id',$user->listing_id); @endphp
									@foreach($rats as $rat)
									 @php $total=$total+$rat->price_rating; @endphp
									@endforeach 
									<td><span class="bg-success p-1">{{($total==0)?'0':$total/(count($rats))}}</span></td>
									<!--									<td><span class="db-list-ststus">8 June 2020</span></td>-->
									<td><span class="db-list-ststus">{{$user->listing_status}}</span>
									</td>
									<td><a href="{{route('edit_listing_step_1',['id'=>$user->listing_id,'step'=>1])}}" class="db-list-edit">Edit</a>
									</td>
									<td><a href="{{route('user_listing_delete',['id'=>$user->listing_id])}}" class="db-list-edit">Delete</a>
									</td>
									<!--									<td><a href="promote-business.html?code=-->
									<!--&&type=listing" class="db-list-edit">-->
									<!--</a></td>-->
									<td><a href="{{route('all-listinged',['id'=>$user->listing_id])}}" class="db-list-edit" target="_blank">Preview</a>
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

@endsection	
	<!-- END -->
	<!-- START -->
