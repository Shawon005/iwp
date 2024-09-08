@extends('main.master')
@section('content')

	<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->
	 <section class="login-reg ">
    <div class="container">
        <div class="row">
            <div class="login-main add-list ad-table">
                <div class="log-bor">&nbsp;</div>
                <span class="steps">Ad details</span>
                <div class="ad-table-inn ud-cen-s2">
                    <table class="responsive-table bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Ads Name</th>
                            <th>Ads Preview</th>
                            <th>Ads Size</th>
                            <th>Cost P/Day</th>
                            <th>Start Ads</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php $posts=table('vv_all_ads_price'); $no=1;@endphp
                            @foreach($posts as $post)
                                                    <tr>
                                <td>{{$post->all_ads_price_id}}</td>
                                <td>{{$post->ad_price_name}}</td>
                                <td>
                                    <img src="{{asset('/storage/file/'.$post->ad_price_photo)}}" alt="">
                                </td>
                                <td>{{$post->ad_price_size}}</td>
                                <td>{{$post->ad_price_cost}}</td>
                                <td><a href="{{route('post-your-ads')}}" class="db-list-rat">Post your Ads</a></td>
                            </tr>
                            @endforeach
                              
                                                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
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
