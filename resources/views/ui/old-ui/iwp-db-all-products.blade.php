@extends('ui.old-ui.master.master')
@section('content')

	<!-- END -->
	<!-- START -->

			<!--CENTER SECTION-->
			<div class="ud-cen">
				<div class="log-bor">&nbsp;</div>	<span class="udb-inst">All Products</span>
				<div class="ud-cen-s2">
					<h2>Product Details</h2>
					@if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
					<a href="{{route('add-product')}}" class="db-tit-btn">Add New Product</a>
					<div class="table-responsive">
						<table class="table bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Product Name</th>
									<!-- <th>Rating</th> -->
									<th>Views</th>
									<th>Status</th>
									<th>Edit</th>
									<th>Delete</th>
									<th>Preview</th>
								</tr>
							</thead>
							<tbody>
								@foreach($product as $user)
								<tr>
									<td>{{$user->product_id}}</td>
									<td>
									    <div class="row">
											<div class="col-2">
												<img src="{{asset('/storage/file/'.$user->gallery_image)}}"width="50" height="60" alt="">
											</div>
											<div class="col-4">
												{{$user->product_name}}<br><small>{{dateFormatConverter($user->product_cdt)}}<small>
											</div>
										</div>
									</td>
									<!-- <td><span class="db-list-rat">0</span>
									</td> -->
									<td><span class="db-list-rat">{{CountCol('vv_page_views','product_id',$user->product_id)}}</span>
									</td>
									<!--									<td><span class="db-list-ststus">8 June 2020</span></td>-->
									<td><span class="db-list-ststus">{{$user->product_status}}</span>
									</td>
									<td><a href="{{route('edit-product',['id'=>$user->product_id])}}" class="db-list-edit">Edit</a>
									</td>
									<td><a href="{{route('product_delete',['id'=>$user->product_id])}}" class="db-list-edit">Delete</a>
									</td>
									<!--									<td><a href="promote-business.html?code=-->
									<!--&&type=listing" class="db-list-edit">-->
									<!--</a></td>-->
									<td><a href="{{route('product/details',['id'=>$user->product_id])}}" class="db-list-edit" target="_blank">Preview</a>
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