@extends('main.master')
@section('content')
<section class=" job-det-pg">
    <div class="container">
        <div class="row">
            <div class="job-det-desc">
                <div class="s1">
                    <h4 class="job-lhs-tit">About company</h4>
                    <div class="job-comp-pro">
                        <div class="job-comp-img">
                            <img src="{{asset('/storage/file/'.$job->company_logo)}}"
                                 alt="">
                        </div>
                    </div>
                    <div class="job-comp-soc">
                        <ul>
                            <li class="ic-web"><a href="{{$job->contact_website}}/" target="_blank">{{$job->contact_website}}/</a></li>
                            <li class="ic-user">{{$job->contact_person}}</li>
                            <li class="ic-eml">{{$job->contact_email_id}}</li>
                            <li class="ic-pho">{{$job->contact_number}}</li>
                        </ul>
                    </div>
                    <div class="job-comp-abo">
                        <?php echo $job->job_description ?>
                        <a href="{{$job->contact_website}}/" target="_blank"
                           class="cta">Company profile</a>
                    </div>
                </div>
                <div class="s2">
                    <div class="lhs">
                        <!--START-->
                        <h1>{{$job->job_title}}</h1>
                        <!--END-->
                        <!--START-->
                        <div class="desc">
                            <p>{{$job->job_small_description}}</p>
                            <div class="jb-skil-set">
                                <h4>Skill set:</h4>
                                <ul>
                                    @php $skills=arr($job->skill_set); @endphp
                                    @foreach($skills as $skill)
                                    <li>{{Nam('vv_job_skill','category_id',$skill,'category_name')}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!--END-->
                        <!--START-->
                        <div class="alpply">
                           <span class="cta-app" data-toggle="modal"data-target="#apply">Apply this job now</span>
                        </div>                         
                       <!-- The Modal -->
                        <!--END-->
                    </div>
                </div>
                <div class="s3">
                    <div class="rhs">
                        <!--START-->
                        <div class="job-summ">
                            <h4>Job Summary</h4>
                            <ul>
                                <li><span>Vacancy  :</span>{{$job->no_of_openings}}</li>
                                <li><span>Job Type:</span>{{job($job->job_type)}}</li>
                                <li><span>Experience :</span>{{$job->years_of_experience}}</li>
                                <li><span>Job Location:</span> HYDERABAD</li>
                                <li><span>Salary:</span> Rs: {{$job->job_salary}}}</li>
                                <li><span>Role:</span> {{$job->job_role}}</li>
                                <li><span>Gender:</span> Any</li>
                                <li><span>Education  :</span>{{$job->educational_qualification}}</li>
                                <li><span>Date :</span>{{dateFormatConverter($job->job_interview_date)}}</li>
                                <li><span>Time :</span>{{$job->job_interview_time}}</li>
                                <li><span>Published on :</span>{{dateFormatConverter($job->job_cdt)}}</li>
                            </ul>
                                 <span class="cta-app" data-toggle="modal"data-target="#apply">Apply now</span>
                        </div>
                        <!--END-->
                        <!--START-->
                        <div class="shar">
                            <h4>Share</h4>
                            <span class="share-new-top share-ic-com" data-toggle="modal" data-target="#sharepop" style="top: 6px"><i class="material-icons">share</i></span>
                            <span class="share-new-top share-ic-com" style="/*position: absolute;right: 52px;top: 10px;*/cursor: pointer;" >
                                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http://iwpdirectory.in/job/photographer?src=facebook&quote=photographer"><img src="http://iwpdirectory.in/images/icon/fb.svg" width="45px"></a>       
                            </span>
                            <span class="fb-new-top share-ic-com" style="/*position: absolute;right: 95px;top: 8px;*/cursor: pointer;" >
                                <a target="_blank"
                                   href="whatsapp://send?text=http%3A%2F%2Fiwpdirectory.in%2Fjob%2Fphotographer%3Fsrc%3Dwhatsapp"><img src="http://iwpdirectory.in/images/icon/whatsapp.svg"></a>                                        
                            </span>
                        </div>
                        <!--END-->
                    </div>
                </div>
                <!---->

            </div>

            <!--START-->
            <div class="job-tre">
                <h2>Related job openings</h2>
                <ul>
                                    </ul>
            </div>
            <!--END-->
        </div>
    </div>

</section>
 <div class="modal fade" id="apply" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="log-bor">&nbsp;</div>
                    <span class="udb-inst">Apply this job</span>
                    <button type="button" class="close justify-content-end" data-dismiss="modal" aria-label="Close">x</button>
                    <!-- Modal Header -->
                    <div class="quote-pop">
                        <div id="pop_enq_success" class="log" style="display: none;">
                            <p>You have successfully applied for this job.</p>
                        </div>
                        <div id="pop_enq_same" class="log" style="display: none;">
                            <p>You cannot make enquiry on your own job!!</p>
                        </div>
                        <div id="pop_enq_already_applied" class="log" style="display: none;">
                            <p>Already Applied on this job!!</p>
                        </div>
                        <div id="pop_enq_no_profile" class="log" style="display: none;">
                            <p>You don't have job profile. Please <a href="">click here</a> to create and apply. </p>
                        </div>
                        <div id="pop_enq_fail" class="log" style="display: none;">
                            <p>Oops!! Something Went Wrong Try Later!!!</p>
                        </div>
                        <form method="post" name="popup_job_enquiry_form" id="popup_job_enquiry_form" novalidate="novalidate">
                            @csrf
                            <input type="hidden" class="form-control" name="job_id" value="{{$job->job_id}}" placeholder="" required="">
                            <input type="hidden" class="form-control" name="job_user_id" value="{{$job->user_id}}" placeholder="" required="">
                            <input type="hidden" class="form-control" name="enquiry_sender_id" value="{{Nam('vv_job_profile','user_id',$job->user_id,'job_profile_id')}}" placeholder="" required="">
                            <input type="hidden" class="form-control" name="enquiry_source" value="Website" placeholder="" required="">
                            <div class="form-group">
                                <input type="text" name="enquiry_name" value="{{user(session('user_id'))}}" required="required" class="form-control valid" placeholder="Enter name*">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control valid" placeholder="Enter email*" required="required" value="{{Nam('vv_users','user_id',session('user_id'),'email_id')}}" name="enquiry_email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" title="Invalid email address">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control valid" value="{{Nam('vv_users','user_id',session('user_id'),'mobile_number')}}" name="enquiry_mobile" placeholder="Enter mobile number *" pattern="[7-9]{1}[0-9]{9}" title="Phone number starting with 7-9 and remaining 9 digit with 0-9" required="">
                            </div>
                            <input type="hidden" id="source">
                            @if(session('user_id')>0)
                            <button type="submit" id="popup_job_enquiry_submit" name="popup_job_enquiry_submit" class="btn btn-primary">Submit</button>
                            @else
                            <a type="submit" href="{{route('ui_login')}}" class="btn btn-primary">Submit</a>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
   

<!-- END -->
@endsection
@section('js')

@endsection
<!-- START -->
