@extends('ui.old-ui.master.master2')
@section('content')
<section>
    <div class="job-prof-pg">
        <div class="container">
            <div class="row">
                <div class="lhs">
                    <!--START-->
                   
                    <div class="profile">
                        <div class="jpro-ban-bg-img">
                            <span><b>{{rand(1,15)}}</b> Followers</span>
                            <p>Available time to talk:
                                <b>{{$job->available_time_start}}</b></p>
                            <img
                                src="{{asset('/storage/file/'.$job->cover_image)}}"
                                alt="">
                        </div>
                        <div class="jpro-ban-tit">
                            <div class="s1">
                                <img
                                    src="{{asset('/storage/file/'.$job->job_profile_image)}}" alt="">
                            </div>
                            <div class="s2">
                                <h1>{{$job->profile_name}}</h1>
                                <span class="loc">{{$job->educational_qualification}}</span>
                                <p>{{name('vv_job_categories',$job->category_id)}} - FOTOTECH</p>
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
                        <h4>Employee details</h4>
                        <ul>
                            <li>
                                Phone <span>{{Nam('vv_users','user_id',session('user_id'),'mobile_number')}}</span>
                            </li>
                            <li>
                                Email <span>{{Nam('vv_users','user_id',session('user_id'),'email_id')}}</span>
                            </li>
                            <li>
                                Current company <span>{{$job->current_company}}</span>
                            </li>
                            <li>
                                Notice period <span>{{$job->notice_period}} Month</span>
                            </li>
                            <li>
                                Experience in Field <span>{{$job->years_of_experience}} Years</span>
                            </li>
                        </ul>
                    </div>
                    <!--END-->
                    <!--START-->
                    <div class="jpro-bd">
                        <div class="jpro-bd-com">
                            <h4>Experience</h4>
                            <ul>
                                <li class="{{($job->experience_1==null)?'d-none':''}}">{{$job->experience_1}}</li>
                                <li class="{{($job->experience_2==null)?'d-none':''}}">{{$job->experience_2}}</li>
                                <li class="{{($job->experience_3==null)?'d-none':''}}">{{$job->experience_3}}</li>
                                <li class="{{($job->experience_4==null)?'d-none':''}}">{{$job->experience_4}}</li>
                            </ul>
                        </div>
                        <div class="jpro-bd-com">
                            <h4>Skill set</h4>
                            @php $skills=arr($job->skill_set); $skill_table=table('vv_job_skill'); @endphp
                            @foreach($skills as $skill)
                            @foreach($skill_table as $sk)
                              @if($skill==$sk->category_id)
                               <span>{{$sk->category_name}}</span>
                              @endif
                              @endforeach
                              @endforeach
                            
                        </div>
                        <div class="jpro-bd-com">
                            <h4>Education</h4>
                            <ul>
                                <li class="{{($job->education_1==null)?'d-none':''}}">{{$job->education_1}}</li>
                                <li class="{{($job->education_2==null)?'d-none':''}}">{{$job->education_2}}</li>
                                <li class="{{($job->education_3==null)?'d-none':''}}">{{$job->education_3}}</li>
                                <li class="{{($job->education_4==null)?'d-none':''}}">{{$job->education_4}}</li>
                             </ul>
                        </div>
                        <div class="jpro-bd-com">
                            <h4>Additional information</h4>
                                <span class="{{($job->additional_info_1==null)?'d-none':''}}">{{$job->additional_info_1}}</span>
                                <span class="{{($job->additional_info_2==null)?'d-none':''}}">{{$job->additional_info_2}}</span>
                                <span class="{{($job->additional_info_3==null)?'d-none':''}}">{{$job->additional_info_3}}</span>
                                <span class="{{($job->additional_info_4==null)?'d-none':''}}">{{$job->additional_info_4}}</span>
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

