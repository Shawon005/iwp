@extends('ui.old-ui.master.master2')
@section('content')
<section>
    <div class="job-prof-pg">
        <div class="container">
            <div class="row">
                <div class="lhs">
                    <!--START-->
                    @php $expert=first('vv_experts','user_id',session('user_id')); @endphp
                    <div class="profile">
                        <div class="jpro-ban-bg-img">
                            <img
                                src="{{asset('/storage/file/'.$expert->cover_image)}}"
                                alt="">
                        </div>
                        <div class="jpro-ban-tit">
                            <div class="s1">
                                <img
                                    src="{{asset('/storage/file/'.$expert->profile_image)}}" alt="">
                            </div>
                            <div class="s2">
                                <h1>{{$expert->profile_name}}</h1>
                                <span class="loc">{{Nam('vv_expert_cities','country_id',$expert->city_id,'country_name')}}</span>
                                <p>{{name('vv_expert_categories',$expert->category_id)}} - FOTOTECH</p>
                            </div>
                            <div class="s3">
                                <span class="cta fol">Message</span>
                                <span class="cta">Follow</span>
                            </div>
                        </div>
                    </div>
                    <!--END-->
                    <!--START-->
                    <div class="jb-pro-bio">
                        <h4>Expert details</h4>
                        <ul>
                            <li>
                                Service Done<span>00</span>
                            </li>
                            <li>
                            Experience <span>{{$expert->years_of_experience}}</span>
                            </li>
                             <li>
                             Base fare <span>{{$expert->base_fare}}</span>
                            </li>
                            <li>
                            Verified  <span>{{$expert->expert_status}}</span>
                            </li>
                            <li>
                            Location  <span>{{$expert->years_of_experience}} Years</span>
                            </li>
                            <li>
                            Join date   <span>{{dateFormatConverter($expert->expert_cdt)}}</span>
                            </li>
                            <li>
                            Service time   <span>{{$expert->available_time_start}}</span>
                            </li>
                         </ul>
                    </div>
                    <!--END-->
                    <!--START-->
                    <div class="jpro-bd-com">
                            <h4>Service Areas</h4>
                            @php $sub_category=arr($expert->area_id); $sub=table('vv_expert_areas'); @endphp
                            @foreach($sub_category as $user):
                            @foreach($sub as $s)
                            @if($s->city_id==$user)
                            <span>{{$s->city_name}}</span>
                            @endif
                            @endforeach
                            @endforeach
                            
                        </div>
                        <div class="jpro-bd-com">
                            <h4>Services can do</h4>
                            @php $sub_category=arr($expert->sub_category_id); $sub=table('vv_expert_sub_categories'); @endphp
                            @foreach($sub_category as $user):
                            @foreach($sub as $s)
                            @if($s->sub_category_id==$user)
                            <span>{{$s->sub_category_name}}</span>
                            @endif
                            @endforeach
                            @endforeach
                            
                        </div>
                    <div class="jpro-bd">
                        <div class="jpro-bd-com">
                            <h4>Experience</h4>
                            <ul>
                                <li class="{{($expert->experience_1==null)?'d-none':''}}">{{$expert->experience_1}}</li>
                                <li class="{{($expert->experience_2==null)?'d-none':''}}">{{$expert->experience_2}}</li>
                                <li class="{{($expert->experience_3==null)?'d-none':''}}">{{$expert->experience_3}}</li>
                                <li class="{{($expert->experience_4==null)?'d-none':''}}">{{$expert->experience_4}}</li>
                            </ul>
                        </div>
                        
                        <div class="jpro-bd-com">
                            <h4>Education</h4>
                            <ul>
                                <li class="{{($expert->education_1==null)?'d-none':''}}">{{$expert->education_1}}</li>
                                <li class="{{($expert->education_2==null)?'d-none':''}}">{{$expert->education_2}}</li>
                                <li class="{{($expert->education_3==null)?'d-none':''}}">{{$expert->education_3}}</li>
                                <li class="{{($expert->education_4==null)?'d-none':''}}">{{$expert->education_4}}</li>
                             </ul>
                        </div>
                        <div class="jpro-bd-com">
                            <h4>Additional information</h4>
                                <span class="{{($expert->additional_info_1==null)?'d-none':''}}">{{$expert->additional_info_1}}</span>
                                <span class="{{($expert->additional_info_2==null)?'d-none':''}}">{{$expert->additional_info_2}}</span>
                                <span class="{{($expert->additional_info_3==null)?'d-none':''}}">{{$expert->additional_info_3}}</span>
                                <span class="{{($expert->additional_info_4==null)?'d-none':''}}">{{$expert->additional_info_4}}</span>
                        </div>
                    </div>
                    <!--END-->
                </div>
                <div class="rhs">
                    <div class="ud-rhs-promo">
                        <h3>Get Personalised Jobs</h3>
                        <p>Tell us what kind of a job you are looking for and stay updated with latest opportunities.</p>
                        <a href="{{route('register')}}">Register for free</a>
                    </div>
                    <div class="job-rel-pro">
                        <div class="hot-page2-hom-pre">
                            <h4>Related profiles</h4>
                            <ul>
                                                            </ul>
                        </div>
                    </div>
                    <div class="job-rel-pro">
                        <div class="hot-page2-hom-pre">
                            <h4>Related job openings</h4>
                            <ul>
                                                                    <li>
                                        <div class="hot-page2-hom-pre-1">
                                            <img
                                                src="http://iwpdirectory.in/jobs/images/jobs/2582fototech-pvt-ltd-000.png"
                                                alt="">
                                        </div>
                                        <div class="hot-page2-hom-pre-2">
                                            <h5>photographer</h5>
                                            <span><b>05Openings</b>, Permanent</span>
                                        </div>
                                        <a href="http://iwpdirectory.in/job/photographer"
                                           class="fclick"></a>
                                    </li>
                                                                </ul>
                        </div>
                    </div>
                    <div class="ud-rhs-promo job-rel-post-jb">
                        <h3>Post your job</h3>
                        <p>Post your job openings and hire more professional employee</p>
                        <a href="http://iwpdirectory.in/jobs/db-jobs">Post job</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
