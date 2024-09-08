@extends('ui.old-ui.master.master')
@section('content')
	<!-- START -->
	
	<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->

			<!--CENTER SECTION-->
			<div class="ud-cen">
				<div class="log-bor">&nbsp;</div> <span class="udb-inst">Followings</span>
				<div class="ud-cen-s2">
					<h2>Following users</h2>
					<a href="{{route('community')}}" class="db-tit-btn">View all users</a>
					<div class="db-fol-grid">
						<ul>
						   @if($follower!=null)
							@foreach($follower as $follow)
							@php $user=first('vv_users','user_id',$follow); @endphp
							@if($user != null)
							<li>
								<div class="pro-fol-gr">
									<div class="db-unfol-user">
										<img src="{{asset('/storage/file/'.$user->profile_image)}}" alt="">
										<h4><b>{{$user->first_name}}</b> {{$user->user_city}}</h4>
										<a href="{{route('profile',['id'=>$user->user_id])}}" target="_blank" class="comm-viw-pro-btn"></a>
									</div>
									<div class="count-li"> <span><b>{{CountCol('vv_listings','user_id',$follow,'user_id')}}</b> Listings</span>
										<span><b>{{CountCol('vv_events','user_id',$follow,'user_id')}}</b> Events</span>
										<span><b>{{CountCol('vv_blogs','user_id',$follow,'user_id')}}</b> Blogs</span>
									</div>
									<div class="pro-pg-msg"> <span><i class="material-icons">message</i> Message</span>
										<span class="userfollow follow-content35" ><a id="follow{{$follow}}" onclick="follow({{$follow}})">Follow</a></span>
									</div>
								</div>
							</li>
							@endif
							@endforeach
							@endif
</div>
</div>					
</div>
@endsection
@section('js')
<script>
    function follow(id){
       
        $.ajax({
             url:"/follower/"+id,
             type:"GET",
             success:function(data){
                
                var value=data.check;
                var ff="follow"+id;
                if(value=='unfollow')
                {
                    document.getElementById(ff).innerHTML="Follow";
                }
                else{
                    document.getElementById(ff).innerHTML="Unfollow";
                }
             }
        });
    }
</script>
@endsection