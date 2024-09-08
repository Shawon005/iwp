@extends('ui.old-ui.master.master')
@section('content')
	
	<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->
			<!--CENTER SECTION-->
			<div class="ud-cen">
				<div class="log-bor">&nbsp;</div>	<span class="udb-inst">All places</span>
				<div class="ud-cen-s2">
					<h2>place Details</h2>
					@if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
					<a href="{{route('users.places.create')}}" class="db-tit-btn">Add New place</a>
					<div class="table-responsive">
						<table class="table bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Place Name</th>
									<th>Category</th>
									<th>Published</th>
									<th>Views</th>
									<th>Edit</th>
									<th>Delete</th>
									<th>Preview</th>
								</tr>
							</thead>
							<tbody>
								@foreach($places as $place)
								<tr>
									<td>{{$place->place_id}}</td>
									<td>{{$place->place_name}}</td>
                                   <td><span class="bg-success p-1">@foreach($category as $cat)
                                    @if($place->category_id==$cat->category_id)
                                      {{$cat->category_name}}
                                    @endif
                                    @endforeach</span></td>
                                   <td>{{CountCol('vv_page_views','place_id',$place->place_id)}}</td>
                                   <td>{{dateFormatConverter($place->place_cdt)}}</td>
									<td>
									    <a href="{{route('users.places.edit',['id' => $place->place_id])}}" class="db-list-edit">Edit</a>
									</td>
									<td>
									    <a href="{{route('users.places.delete',['id' => $place->place_id])}}" class="db-list-edit">Delete</a>
									</td>
									<td><a href="{{route('places',['id'=>$place->place_id])}}" class="db-list-edit" target="_blank">Preview</a>
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
