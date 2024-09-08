@extends('ui.old-ui.master.master')
@section('content')
	
	<!-- END -->
	<!-- START -->

			
			<!--CENTER SECTION-->
			<div class="ud-cen">
				<!-- <div class="log-bor">&nbsp;</div> <span class="udb-inst">User Dashboard</span> -->
				<div class="cd-cen-intr">
					<div class="cd-cen-intr-inn">
						<h2>Welcom back, <b> {{user(session('user_id'))}}</b></h2>
						<p>Stay up to date reports in your listing, products, events and blog reports here</p>
					</div>
				</div>
				<div class="ud-cen-s1">
					<ul>
						<li>
							<div> <b>{{countCol('vv_listings','user_id',session('user_id'))}}</b>
								<h4>All Listings</h4>
								<p>Total no of listings</p> <a href="{{route('user_all_listing')}}">&nbsp;</a>
							</div>
						</li>
						<li>
							<div> <b>{{countCol('vv_enquiries','listing_user_id',session('user_id'))}}</b>
								<h4>Enquiries</h4>
								<p>Total no of enquiry</p> <a href="{{route('db-enquiry')}}">&nbsp;</a>
							</div>
						</li>
						@php $user=Nam('vv_users','user_id',session('user_id'),'user_followers'); @endphp

						<li>
							<div> <b>{{$user ? Count(arr($user)) : 0}}</b>
								<h4>Followings</h4>
								<p>Total no of followings</p> <a href="{{route('db-following')}}">&nbsp;</a>
							</div>
						</li>
					</ul>
				</div>
				<!-- START -->
				<div class="ud-cen-s3 ud-cen-s4">
					<h2>Profile page</h2>
					<a href="{{route('edit-profile')}}" class="db-tit-btn">Edit profile page</a>
					<div class="ud-payment ud-pro-link">
						<div class="pay-lhs">
							<div class="lis-pro-badg">
								<div>
									<img src="{{asset('/storage/file/'.Nam('vv_users','user_id',session('user_id'),'profile_image'))}}" alt="">
									<h4>{{user(session('user_id'))}} </h4>
									<p>Member since {{dateFormatConverter(Nam('vv_users','user_id',session('user_id'),'user_cdt'))}}</p>
								</div> <a href="{{route('profile',['id'=>session('user_id')])}}" class="fclick" target="_blank">&nbsp;</a>
							</div>
						</div>
						<div class="pay-rhs">
							<ul>
								<li><b>Name : </b> {{user(session('user_id'))}} </li>
								<li><b>Followers : </b>  <span>{{$user ? Count(arr($user)) : 0}}</span>
								</li>
								<li><b>City : </b>{{Nam('vv_users','user_id',session('user_id'),'user_city')}}</li>
								<li><b>Email : </b> {{Nam('vv_users','user_id',session('user_id'),'email_id')}}</li>
								<li class="pro">
									<input type="text" value="http://iwpdirectory.in/profile/{{user(session('user_id'))}}" readonly>
								</li>
								<li class="pre"><a target="_blank" href="{{route('profile',['id'=>session('user_id')])}}">View my profile page</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- END -->
				<!-- START -->
				@php $company=first('vv_user_company','user_id',session('user_id')); @endphp
				@if(Nam('vv_users','user_id',session('user_id'),'user_plan')!=1)
				@if($company!=null)
				<div class="ud-cen-s3 ud-cen-s4">
					<h2>Business page</h2>
					<a href="{{route('company_profile_edit')}}" class="db-tit-btn">Edit business page</a>
					<div class="ud-payment ud-pro-link">
						<div class="pay-lhs">
							<div class="lis-pro-badg">
							
								<div>
									<img src="{{asset('/storage/file/'.$company->company_profile_photo)}}" alt="">
									<h4>{{$company->company_name}}</h4>
									<p>Member since {{dateFormatConverter($company->company_cdt)}}</p>
								</div> <a href="{{route('company-profile',['id'=>session('user_id')])}}" class="fclick" target="_blank">&nbsp;</a>
							</div>
						</div>
						<div class="pay-rhs">
							<ul>
								<li><b>Name : </b>{{$company->company_name}}</li>
								<li><b>Page views : </b>  <span>{{CountCol('vv_page_views','user_business_id',$company->user_company_id)}}</span>
								</li>
								<li class="pro">
									<input type="text" value="http://iwpdirectory.in/company/{{$company->company_name}}" readonly>
								</li>
								<li class="pre"><a target="_blank" href="{{route('company-profile',['id'=>session('user_id')])}}">View business page</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				@endif
				<!-- END -->
				<!-- START -->
				@php $expert=first('vv_experts','user_id',session('user_id')); @endphp
				@if(Nam('vv_footer','footer_id',1,'admin_expert_show'))
				@if($expert != null)
				<div class="ud-cen-s3 ud-cen-s4">
					<h2>Service Expert Profile</h2>
					<a href="{{route('service-expert')}}" class="db-tit-btn">Edit Service Profile</a>
					<div class="ud-payment ud-pro-link">
						<div class="pay-lhs">
							<div class="lis-pro-badg">
								<div>
									<img src="{{asset('/storage/file/'.$expert->profile_image)}}" alt="">
									<h4>{{$expert->profile_name}}</h4>
									<p>Member since {{dateFormatConverter($expert->expert_cdt)}}</p>
								</div> <a href="{{route('user-expert-profile')}}" class="fclick" target="_blank">&nbsp;</a>
							</div>
						</div>
						<div class="pay-rhs">
							<ul>
								<li><b>Name : </b> {{$expert->profile_name}}</li>
								<li><b>Page views : </b>  <span>{{CountCol('vv_page_views','expert_id',$expert->expert_id)}}</span>
								</li>
								<li class="pro">
									<input type="text" value="http://iwpdirectory.in/service-expert/{{$expert->profile_name}}" readonly>
								</li>
								<li class="pre"><a target="_blank" href="{{route('user-expert-profile')}}">View Expert Profile page</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				@endif
				@endif
				@endif
				<!-- END -->
				<!-- START -->
				@php $job=first('vv_job_profile','user_id',session('user_id')); @endphp
				@if(Nam('vv_footer','footer_id',1,'admin_job_show'))
				<div class="ud-cen-s3 ud-cen-s4">
					<h2>Job Profile</h2>
					<a href="{{route('job-profile')}}" class="db-tit-btn">Edit Your Job Profile</a>
					<div class="ud-payment ud-pro-link ">
						<div class="pay-lhs">
							<div class="lis-pro-badg">
							
								<div>
									<img src="{{asset('/storage/file/'.$job->job_profile_image)}}" alt="">
									<h4>{{$job->profile_name}}</h4>
									<p>Member since {{dateFormatConverter($job->job_profile_cdt)}}</p>
								</div> <a href="{{route('user-job-profile',['id'=>session('user_id')])}}" class="fclick" target="_blank">&nbsp;</a>
							</div>
						</div>
						<div class="pay-rhs">
							<ul>
								<li><b>Name : </b>{{$job->profile_name}}</li>
								<li><b>Page views : </b>  <span>{{CountCol('vv_page_views','job_profile_id',$job->job_profile_id)}}</span>
								</li>
								<li class="pro">
									<input type="text" value="http://iwpdirectory.in/job-profile/{{$job->profile_name}}" readonly>
								</li>
								<li class="pre"><a target="_blank" href="{{route('user-job-profile',['id'=>session('user_id')])}}">View Job Profile page</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				@endif
				<!-- END -->
				<!-- <div class="ud-cen-s2">
					<h2>Listing Details</h2>
					<a href="add-listing-start.html" class="db-tit-btn">Add New Listing</a>
					<table class="responsive-table bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Listing Name</th>
								<th>Rating</th>
								<th>Views</th>
								<!--                    <th>Expiry on</th>--
								<th>Status</th>
								<th>Edit</th>
								<th>Delete</th>
								<!--                    <th>--
								<!--</th>--
								<th>Preview</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>
									<img src="{{asset('')}}userend/images/listings/78776dsc09586.jpg">test <span>28, Mar 2021</span>
								</td>
								<td><span class="db-list-rat">0</span>
								</td>
								<td><span class="db-list-rat">1</span>
								</td>
								<!--                        <td><span class="db-list-ststus">8 June 2020</span></td>--
								<td><span class="db-list-ststus">Active</span>
								</td>
								<td><a href="edit-listing-step-1.html?row=LIST395" class="db-list-edit">Edit</a>
								</td>
								<td><a href="delete-listing?row=LIST395" class="db-list-edit">Delete</a>
								</td>
								<!--                        <td><a href="promote-business.html?code=--
								<!--&&type=listing" class="db-list-edit">-->
								<!--</a></td>--
								<td><a href="listing/test6" class="db-list-edit" target="_blank">Preview</a>
								</td>
							</tr>
							<tr>
								<td>2</td>
								<td>
									<img src="{{asset('')}}userend/images/listings/432063dffe1d6-e6c7-4bc8-a563-0e5687c5fe12.jpeg">dfzhfhd <span>25, Mar 2021</span>
								</td>
								<td><span class="db-list-rat">0</span>
								</td>
								<td><span class="db-list-rat">7</span>
								</td>
								<!--                        <td><span class="db-list-ststus">8 June 2020</span></td>--
								<td><span class="db-list-ststus">Active</span>
								</td>
								<td><a href="edit-listing-step-1.html?row=LIST394" class="db-list-edit">Edit</a>
								</td>
								<td><a href="delete-listing?row=LIST394" class="db-list-edit">Delete</a>
								</td>
								<!--                        <td><a href="promote-business.html?code=-->
								<!--&&type=listing" class="db-list-edit">-->
								<!--</a></td>--
								<td><a href="listing/dfzhfhd" class="db-list-edit" target="_blank">Preview</a>
								</td>
							</tr>
							<tr>
								<td>3</td>
								<td>
									<img src="{{asset('')}}userend/images/listings/72048pexels-francesco-ungaro-96444-(1).jpg">Iei <span>25, Mar 2021</span>
								</td>
								<td><span class="db-list-rat">0</span>
								</td>
								<td><span class="db-list-rat">15</span>
								</td>
								<!--                        <td><span class="db-list-ststus">8 June 2020</span></td>--
								<td><span class="db-list-ststus">Active</span>
								</td>
								<td><a href="edit-listing-step-1.html?row=LIST393" class="db-list-edit">Edit</a>
								</td>
								<td><a href="delete-listing?row=LIST393" class="db-list-edit">Delete</a>
								</td>
								<!--                        <td><a href="promote-business.html?code=-->
								<!--&&type=listing" class="db-list-edit">-->
								<!--</a></td>--
								<td><a href="listing/iei" class="db-list-edit" target="_blank">Preview</a>
								</td>
							</tr>
							<tr>
								<td>4</td>
								<td>
									<img src="{{asset('')}}userend/images/listings/432063dffe1d6-e6c7-4bc8-a563-0e5687c5fe12.jpeg">phoenix mall <span>13, Mar 2021</span>
								</td>
								<td><span class="db-list-rat">0</span>
								</td>
								<td><span class="db-list-rat">10</span>
								</td>
								<!--                        <td><span class="db-list-ststus">8 June 2020</span></td>--
								<td><span class="db-list-ststus">Active</span>
								</td>
								<td><a href="edit-listing-step-1.html?row=LIST392" class="db-list-edit">Edit</a>
								</td>
								<td><a href="delete-listing?row=LIST392" class="db-list-edit">Delete</a>
								</td>
								<!--                        <td><a href="promote-business.html?code=-->
								<!--&&type=listing" class="db-list-edit">-->
								<!--</a></td>--
								<td><a href="listing/phoenix-mall" class="db-list-edit" target="_blank">Preview</a>
								</td>
							</tr>
							<tr>
								<td>5</td>
								<td>
									<img src="{{asset('')}}userend/images/listings/45451download-(1).jfif">Ocha Thai Cuisine <span>12, Mar 2021</span>
								</td>
								<td><span class="db-list-rat">5.0</span>
								</td>
								<td><span class="db-list-rat">9</span>
								</td>
								<!--                        <td><span class="db-list-ststus">8 June 2020</span></td>--
								<td><span class="db-list-ststus">Active</span>
								</td>
								<td><a href="edit-listing-step-1.html?row=LIST391" class="db-list-edit">Edit</a>
								</td>
								<td><a href="delete-listing?row=LIST391" class="db-list-edit">Delete</a>
								</td>
								<!--                        <td><a href="promote-business.html?code=-->
								<!--&&type=listing" class="db-list-edit">-->
								<!--</a></td>--
								<td><a href="listing/ocha-thai-cuisine" class="db-list-edit" target="_blank">Preview</a>
								</td>
							</tr>
							<tr>
								<td>6</td>
								<td>
									<img src="{{asset('')}}userend/images/listings/72048pexels-francesco-ungaro-96444-(1).jpg">Core real estates <span>11, Mar 2021</span>
								</td>
								<td><span class="db-list-rat">0</span>
								</td>
								<td><span class="db-list-rat">18</span>
								</td>
								<!--                        <td><span class="db-list-ststus">8 June 2020</span></td>--
								<td><span class="db-list-ststus">Active</span>
								</td>
								<td><a href="edit-listing-step-1.html?row=LIST389" class="db-list-edit">Edit</a>
								</td>
								<td><a href="delete-listing?row=LIST389" class="db-list-edit">Delete</a>
								</td>
								<!--                        <td><a href="promote-business.html?code=-->
								<!--&&type=listing" class="db-list-edit">-->
								<!--</a></td>--
								<td><a href="listing/core-real-estates" class="db-list-edit" target="_blank">Preview</a>
								</td>
							</tr>
							<tr>
								<td>7</td>
								<td>
									<img src="{{asset('')}}userend/images/listings/85477capture1.png">Gill Automobiles and Services <span>20, Feb 2021</span>
								</td>
								<td><span class="db-list-rat">0</span>
								</td>
								<td><span class="db-list-rat">30</span>
								</td>
								<!--                        <td><span class="db-list-ststus">8 June 2020</span></td>--
								<td><span class="db-list-ststus">Active</span>
								</td>
								<td><a href="edit-listing-step-1.html?row=LIST384" class="db-list-edit">Edit</a>
								</td>
								<td><a href="delete-listing?row=LIST384" class="db-list-edit">Delete</a>
								</td>
								<!--                        <td><a href="promote-business.html?code=-->
								<!--&&type=listing" class="db-list-edit">-->
								<!--</a></td>--
								<td><a href="listing/gill-automobiles-and-services" class="db-list-edit" target="_blank">Preview</a>
								</td>
							</tr>
							<tr>
								<td>8</td>
								<td>
									<img src="{{asset('')}}userend/images/listings/64465capture-(1).png">Titan Wedding Hall <span>07, Feb 2021</span>
								</td>
								<td><span class="db-list-rat">5.0</span>
								</td>
								<td><span class="db-list-rat">27</span>
								</td>
								<!--                        <td><span class="db-list-ststus">8 June 2020</span></td>--
								<td><span class="db-list-ststus">Active</span>
								</td>
								<td><a href="edit-listing-step-1.html?row=LIST381" class="db-list-edit">Edit</a>
								</td>
								<td><a href="delete-listing?row=LIST381" class="db-list-edit">Delete</a>
								</td>
								<!--                        <td><a href="promote-business.html?code=-->
								<!--&&type=listing" class="db-list-edit">-->
								<!--</a></td>--
								<td><a href="listing/titan-wedding-hall" class="db-list-edit" target="_blank">Preview</a>
								</td>
							</tr>
							<tr>
								<td>9</td>
								<td>
									<img src="{{asset('')}}userend/images/listings/72048pexels-francesco-ungaro-96444-(1).jpg">Taj Hotels <span>24, Dec 2020</span>
								</td>
								<td><span class="db-list-rat">0</span>
								</td>
								<td><span class="db-list-rat">16</span>
								</td>
								<!--                        <td><span class="db-list-ststus">8 June 2020</span></td>--
								<td><span class="db-list-ststus">Active</span>
								</td>
								<td><a href="edit-listing-step-1.html?row=LIST380" class="db-list-edit">Edit</a>
								</td>
								<td><a href="delete-listing?row=LIST380" class="db-list-edit">Delete</a>
								</td>
								<!--                        <td><a href="promote-business.html?code=-->
								<!--&&type=listing" class="db-list-edit">-->
								<!--</a></td>--
								<td><a href="listing/taj-hotels1" class="db-list-edit" target="_blank">Preview</a>
								</td>
							</tr>
							<tr>
								<td>10</td>
								<td>
									<img src="{{asset('')}}userend/images/listings/28181houses-on-body-of-water-1724424.jpg">ccc <span>29, Sep 2020</span>
								</td>
								<td><span class="db-list-rat">0</span>
								</td>
								<td><span class="db-list-rat">10</span>
								</td>
								<!--                        <td><span class="db-list-ststus">8 June 2020</span></td>--
								<td><span class="db-list-ststus">Active</span>
								</td>
								<td><a href="edit-listing-step-1.html?row=LIST378" class="db-list-edit">Edit</a>
								</td>
								<td><a href="delete-listing?row=LIST378" class="db-list-edit">Delete</a>
								</td>
								<!--                        <td><a href="promote-business.html?code=-->
								<!--&&type=listing" class="db-list-edit">-->
								<!--</a></td>--
								<td><a href="listing/ccc" class="db-list-edit" target="_blank">Preview</a>
								</td>
							</tr>
							<tr>
								<td>11</td>
								<td>
									<img src="{{asset('')}}userend/images/listings/28181houses-on-body-of-water-1724424.jpg">Hello <span>23, Sep 2020</span>
								</td>
								<td><span class="db-list-rat">0</span>
								</td>
								<td><span class="db-list-rat">10</span>
								</td>
								<!--                        <td><span class="db-list-ststus">8 June 2020</span></td>--
								<td><span class="db-list-ststus">Active</span>
								</td>
								<td><a href="edit-listing-step-1.html?row=LIST375" class="db-list-edit">Edit</a>
								</td>
								<td><a href="delete-listing?row=LIST375" class="db-list-edit">Delete</a>
								</td>
								<!--                        <td><a href="promote-business.html?code=-->
								<!--&&type=listing" class="db-list-edit">-->
								<!--</a></td>--
								<td><a href="listing/hello3" class="db-list-edit" target="_blank">Preview</a>
								</td>
							</tr>
							<tr>
								<td>12</td>
								<td>
									<img src="{{asset('')}}userend/images/listings/56295pexels-photo-3155726.jpeg">Premium gardens <span>16, May 2020</span>
								</td>
								<td><span class="db-list-rat">0</span>
								</td>
								<td><span class="db-list-rat">9</span>
								</td>
								<!--                        <td><span class="db-list-ststus">8 June 2020</span></td>--
								<td><span class="db-list-ststus">Active</span>
								</td>
								<td><a href="edit-listing-step-1.html?row=LIST268" class="db-list-edit">Edit</a>
								</td>
								<td><a href="delete-listing?row=LIST268" class="db-list-edit">Delete</a>
								</td>
								<!--                        <td><a href="promote-business.html?code=-->
								<!--&&type=listing" class="db-list-edit">-->
								<!--</a></td>--
								<td><a href="listing/premium-gardens" class="db-list-edit" target="_blank">Preview</a>
								</td>
							</tr>
							<tr>
								<td>13</td>
								<td>
									<img src="{{asset('')}}userend/images/listings/55800pexels-photo-258154.jpeg">Beach luxury villa gardens <span>16, May 2020</span>
								</td>
								<td><span class="db-list-rat">0</span>
								</td>
								<td><span class="db-list-rat">14</span>
								</td>
								<!--                        <td><span class="db-list-ststus">8 June 2020</span></td>--
								<td><span class="db-list-ststus">Active</span>
								</td>
								<td><a href="edit-listing-step-1.html?row=LIST267" class="db-list-edit">Edit</a>
								</td>
								<td><a href="delete-listing?row=LIST267" class="db-list-edit">Delete</a>
								</td>
								<!--                        <td><a href="promote-business.html?code=-->
								<!--&&type=listing" class="db-list-edit">-->
								<!--</a></td>--
								<td><a href="listing/beach-luxury-villa-gardens" class="db-list-edit" target="_blank">Preview</a>
								</td>
							</tr>
							<tr>
								<td>14</td>
								<td>
									<img src="{{asset('')}}userend/images/listings/75352house-luxury-villa-swimming-pool-32870.jpg">GOS Villas <span>16, May 2020</span>
								</td>
								<td><span class="db-list-rat">0</span>
								</td>
								<td><span class="db-list-rat">10</span>
								</td>
								<!--                        <td><span class="db-list-ststus">8 June 2020</span></td>--
								<td><span class="db-list-ststus">Active</span>
								</td>
								<td><a href="edit-listing-step-1.html?row=LIST266" class="db-list-edit">Edit</a>
								</td>
								<td><a href="delete-listing?row=LIST266" class="db-list-edit">Delete</a>
								</td>
								<!--                        <td><a href="promote-business.html?code=-->
								<!--&&type=listing" class="db-list-edit">-->
								<!--</a></td>--
								<td><a href="listing/gos-villas" class="db-list-edit" target="_blank">Preview</a>
								</td>
							</tr>
							<tr>
								<td>15</td>
								<td>
									<img src="{{asset('')}}userend/images/listings/2279bike1.jpg">Super bike showroom <span>02, May 2020</span>
								</td>
								<td><span class="db-list-rat">0</span>
								</td>
								<td><span class="db-list-rat">9</span>
								</td>
								<!--                        <td><span class="db-list-ststus">8 June 2020</span></td>--
								<td><span class="db-list-ststus">Active</span>
								</td>
								<td><a href="edit-listing-step-1.html?row=LIST247" class="db-list-edit">Edit</a>
								</td>
								<td><a href="delete-listing?row=LIST247" class="db-list-edit">Delete</a>
								</td>
								<!--                        <td><a href="promote-business.html?code=-->
								<!--&&type=listing" class="db-list-edit">-->
								<!--</a></td>--
								<td><a href="listing/super-bike-showroom" class="db-list-edit" target="_blank">Preview</a>
								</td>
							</tr>
							<tr>
								<td>16</td>
								<td>
									<img src="{{asset('')}}userend/images/listings/2279bike1.jpg">Benz cars showroom <span>25, Apr 2020</span>
								</td>
								<td><span class="db-list-rat">5.0</span>
								</td>
								<td><span class="db-list-rat">12</span>
								</td>
								<!--                        <td><span class="db-list-ststus">8 June 2020</span></td>--
								<td><span class="db-list-ststus">Active</span>
								</td>
								<td><a href="edit-listing-step-1.html?row=LIST238" class="db-list-edit">Edit</a>
								</td>
								<td><a href="delete-listing?row=LIST238" class="db-list-edit">Delete</a>
								</td>
								<!--                        <td><a href="promote-business.html?code=-->
								<!--&&type=listing" class="db-list-edit">-->
								<!--</a></td>--
								<td><a href="listing/benz-cars-showroom" class="db-list-edit" target="_blank">Preview</a>
								</td>
							</tr>
							<tr>
								<td>17</td>
								<td>
									<img src="{{asset('')}}userend/images/listings/56300pexels-photo-667838.jpeg">Smith Luxury Villas <span>19, Mar 2020</span>
								</td>
								<td><span class="db-list-rat">2.0</span>
								</td>
								<td><span class="db-list-rat">9</span>
								</td>
								<!--                        <td><span class="db-list-ststus">8 June 2020</span></td>--
								<td><span class="db-list-ststus">Active</span>
								</td>
								<td><a href="edit-listing-step-1.html?row=LIST207" class="db-list-edit">Edit</a>
								</td>
								<td><a href="delete-listing?row=LIST207" class="db-list-edit">Delete</a>
								</td>
								<!--                        <td><a href="promote-business.html?code=-->
								<!--&&type=listing" class="db-list-edit">-->
								<!--</a></td>--
								<td><a href="listing/smith-luxury-villas" class="db-list-edit" target="_blank">Preview</a>
								</td>
							</tr>
							<tr>
								<td>18</td>
								<td>
									<img src="{{asset('')}}userend/images/listings/78973104682512.jpg">Ø§Ø¨Ù†Ù‰ Ù…ÙˆÙ‚Ø¹Ùƒ Ù…Ø¹Ù†Ø§ <span>25, Jan 2020</span>
								</td>
								<td><span class="db-list-rat">0</span>
								</td>
								<td><span class="db-list-rat">9</span>
								</td>
								<!--                        <td><span class="db-list-ststus">8 June 2020</span></td>--
								<td><span class="db-list-ststus">Active</span>
								</td>
								<td><a href="edit-listing-step-1.html?row=LIST164" class="db-list-edit">Edit</a>
								</td>
								<td><a href="delete-listing?row=LIST164" class="db-list-edit">Delete</a>
								</td>
								<!--                        <td><a href="promote-business.html?code=-->
								<!--&&type=listing" class="db-list-edit">-->
								<!--</a></td>--
								<td><a href="listing/Ø§Ø¨Ù†Ù‰-Ù…ÙˆÙ‚Ø¹Ùƒ-Ù…Ø¹Ù†Ø§" class="db-list-edit" target="_blank">Preview</a>
								</td>
							</tr>
							<tr>
								<td>19</td>
								<td>
									<img src="{{asset('')}}userend/images/listings/2060201_preview.jpg">BizBookBusiness Directory Template <span>24, Jan 2020</span>
								</td>
								<td><span class="db-list-rat">0</span>
								</td>
								<td><span class="db-list-rat">9</span>
								</td>
								<!--                        <td><span class="db-list-ststus">8 June 2020</span></td>--
								<td><span class="db-list-ststus">Active</span>
								</td>
								<td><a href="edit-listing-step-1.html?row=LIST163" class="db-list-edit">Edit</a>
								</td>
								<td><a href="delete-listing?row=LIST163" class="db-list-edit">Delete</a>
								</td>
								<!--                        <td><a href="promote-business.html?code=-->
								<!--&&type=listing" class="db-list-edit">-->
								<!--</a></td>--
								<td><a href="listing/bizbookbusiness-directory-template" class="db-list-edit" target="_blank">Preview</a>
								</td>
							</tr>
							<tr>
								<td>20</td>
								<td>
									<img src="{{asset('')}}userend/images/listings/76808tour-travel-html-template.jpg">Tour and Travel html Template <span>29, Dec 2019</span>
								</td>
								<td><span class="db-list-rat">3.7</span>
								</td>
								<td><span class="db-list-rat">12</span>
								</td>
								<!--                        <td><span class="db-list-ststus">8 June 2020</span></td>--
								<td><span class="db-list-ststus">Active</span>
								</td>
								<td><a href="edit-listing-step-1.html?row=LIST130" class="db-list-edit">Edit</a>
								</td>
								<td><a href="delete-listing?row=LIST130" class="db-list-edit">Delete</a>
								</td>
								<!--                        <td><a href="promote-business.html?code=-->
								<!--&&type=listing" class="db-list-edit">-->
								<!--</a></td>--
								<td><a href="listing/tour-and-travel-html-template" class="db-list-edit" target="_blank">Preview</a>
								</td>
							</tr>
							<tr>
								<td>21</td>
								<td>
									<img src="{{asset('')}}userend/images/listings/657791_f1cdikgosfn0gg0a96jsdw.png">Smart Digital Products <span>15, Dec 2019</span>
								</td>
								<td><span class="db-list-rat">3.2</span>
								</td>
								<td><span class="db-list-rat">8</span>
								</td>
								<!--                        <td><span class="db-list-ststus">8 June 2020</span></td>--
								<td><span class="db-list-ststus">Active</span>
								</td>
								<td><a href="edit-listing-step-1.html?row=LIST129" class="db-list-edit">Edit</a>
								</td>
								<td><a href="delete-listing?row=LIST129" class="db-list-edit">Delete</a>
								</td>
								<!--                        <td><a href="promote-business.html?code=-->
								<!--&&type=listing" class="db-list-edit">-->
								<!--</a></td>--
								<td><a href="listing/smart-digital-products" class="db-list-edit" target="_blank">Preview</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div> -->
				<!-- <div class="ud-cen-s3">
					<h2>Events</h2>
					<a href="create-new-event" class="db-tit-btn">Add new Event</a>
					<ul>
						<li>
							<div class="db-eve">
								<a href="event/champions-of-india-run-ride-walk">
									<img src="{{asset('')}}userend/images/events/88783banner16130393609bct2.jpg" alt="">
									<h5>CHAMPIONS OF INDIA RUN-RIDE-WALK</h5>
									<span>Created: 12, Mar 2021</span>
								</a>
							</div>
						</li>
						<li>
							<div class="db-eve">
								<a href="event/india-vs-england">
									<img src="{{asset('')}}userend/images/events/64903media-desktop-4th-test-india-vs-england-0-2021-2-13-t-22-0-8.jpg" alt="">
									<h5>INDIA VS ENGLAND</h5>
									<span>Created: 11, Mar 2021</span>
								</a>
							</div>
						</li>
						<li>
							<div class="db-eve">
								<a href="event/ipl-2021">
									<img src="{{asset('')}}userend/images/events/84183jpg.webp" alt="">
									<h5>IPL 2021</h5>
									<span>Created: 21, Feb 2021</span>
								</a>
							</div>
						</li>
						<li>
							<div class="db-eve">
								<a href="event/27-health-and-nutrition-tips">
									<img src="{{asset('')}}userend/images/events/51138springfield_illinois.jpg" alt="">
									<h5>27 Health and Nutrition Tips</h5>
									<span>Created: 09, Apr 2020</span>
								</a>
							</div>
						</li>
						<li>
							<div class="db-eve">
								<a href="event/digital-marketing-seminar-2020">
									<img src="{{asset('')}}userend/images/events/730182020-google-ideas-to-increase-business-sale-through-digital-marketing.jpg" alt="">
									<h5>Digital Marketing Seminar 2020</h5>
									<span>Created: 26, Mar 2020</span>
								</a>
							</div>
						</li>
					</ul>
				</div> -->
				<!-- <div class="ud-cen-s3 ud-cen-s4">
					<h2>Blog posts</h2>
					<a href="create-new-blog-post" class="db-tit-btn">Add new post</a>
					<ul>
						<li>
							<div class="db-eve">
								<a href="blog/inception">
									<img src="{{asset('')}}userend/images/blogs/36614hollywood-insider-feature-inception-greatest-movie-of-the-decade-leonardo-dicaprio-tom-hardy-marion-cotillard-joseph-gordon-levitt-michael-caine-christopher-nolan-ken-wantanabe-ellen-paige.jpg" alt="">
									<h5>INCEPTION</h5>
									<span>Created: 12, Mar 2021</span>
								</a>
							</div>
						</li>
						<li>
							<div class="db-eve">
								<a href="blog/avengers-infinty-war">
									<img src="{{asset('')}}userend/images/blogs/79119https___blogs-images.forbes.com_scottmendelson_files_2018_04_image001.jpg" alt="">
									<h5>AVENGERS INFINTY WAR</h5>
									<span>Created: 12, Mar 2021</span>
								</a>
							</div>
						</li>
						<li>
							<div class="db-eve">
								<a href="blog/avengers-end-game1">
									<img src="{{asset('')}}userend/images/blogs/8325292c8e00b34fcfdeaf605a0647c21adb3.jpg" alt="">
									<h5>AVENGERS END GAME</h5>
									<span>Created: 11, Mar 2021</span>
								</a>
							</div>
						</li>
						<li>
							<div class="db-eve">
								<a href="blog/captainamerica-the-civil-war">
									<img src="{{asset('')}}userend/images/blogs/6619940496pexels-photo-248547.jpeg" alt="">
									<h5>captainamerica the civil war</h5>
									<span>Created: 11, Mar 2021</span>
								</a>
							</div>
						</li>
						<li>
							<div class="db-eve">
								<a href="blog/samsung-m31-review-">
									<img src="{{asset('')}}userend/images/blogs/25287gsmarena_001.jpg" alt="">
									<h5>Samsung M31 Review </h5>
									<span>Created: 22, Feb 2021</span>
								</a>
							</div>
						</li>
						<li>
							<div class="db-eve">
								<a href="blog/wizard-of-oz1">
									<img src="{{asset('')}}userend/images/blogs/71300wizard_of_oz_4k_banner.jpg" alt="">
									<h5>wizard of oz</h5>
									<span>Created: 21, Feb 2021</span>
								</a>
							</div>
						</li>
						<li>
							<div class="db-eve">
								<a href="blog/wizard-of-oz">
									<img src="{{asset('')}}userend/images/blogs/19145wizard_of_oz_4k_banner.jpg" alt="">
									<h5>wizard of oz</h5>
									<span>Created: 21, Feb 2021</span>
								</a>
							</div>
						</li>
						<li>
							<div class="db-eve">
								<a href="blog/titanic">
									<img src="{{asset('')}}userend/images/blogs/79351titanic.jpg" alt="">
									<h5>Titanic</h5>
									<span>Created: 21, Feb 2021</span>
								</a>
							</div>
						</li>
						<li>
							<div class="db-eve">
								<a href="blog/digital-marketing">
									<img src="{{asset('')}}userend/images/blogs/131032020-google-ideas-to-increase-business-sale-through-digital-marketing.jpg" alt="">
									<h5>Digital Marketing</h5>
									<span>Created: 26, Mar 2020</span>
								</a>
							</div>
						</li>
					</ul>
				</div> -->
			</div>
			
			<!--RIGHT SECTION-->
		
	<!--END PRICING DETAILS-->
	<!-- START -->

	<!-- END -->
	<!-- START -->
@endsection
@section('js')

@endsection