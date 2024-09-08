@extends('main.master')
@section('content')
    <!-- END -->
    <style>
        .hom2-cus-sli ul {
            position: relative;
            overflow: hidden;
            padding: 20px 20px 0
        }

        .slick-arrow {
            width: 50px;
            height: 50px;
            border-radius: 50px;
            background: #fff;
            border: 1px solid #ededed;
            color: #ffffff03;
            position: absolute;
            z-index: 9;
            top: 38%
        }

        .slick-arrow:before {
            content: 'chevron_left';
            font-size: 27px;
            top: 4px;
            left: 9px
        }

        .slick-prev {
            left: 14px
        }

        .slick-next {
            right: 14px
        }

        .slick-next:before {
            content: 'chevron_right';
            font-size: 27px
        }
    </style>


    <!-- START -->
    <section>
        <div class="all-listing all-jobs m">
            <!--FILTER ON MOBILE VIEW-->
            <div class="fil-mob fil-mob-act">
                <h4>Listing filters <i class="material-icons">filter_list</i></h4>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 fil-mob-view">
                        <!--- START --->
                        <div class="filt-com">
                            <div class="job-alert">
                                <h5>Get Personalised Jobs</h5>
                                <p>Tell us what kind of a job you are looking for and stay updated with latest opportunities.</p>
                                <a href="../login.html">Register for free</a>
                            </div>
                        </div>
                        <!--- END --->
                        <!--- START --->
                        <div class="filt-com lhs-cate">
                            <h4>Categories</h4>
                            <div class="form-group">
                                <select onChange="jobSubcategoryFilter(this.value);"
                                        name="cat_check" id="cat_check" class="cat_check chosen-select ">
                                        @foreach($category as $cat)
                                     <option value="{{$cat->category_id}}">{{$cat->category_name}}</option>
                                     @endforeach
                                 </select>
                            </div>
                        </div>
                        <!--- END --->
                        <!--- START --->
                        <div class="sub_cat_section filt-com lhs-sub">
                            <h4>Sub category</h4>
                            <ul>
                                    <li>
                                        <div class="chbox">
                                            <input type="checkbox" class="sub_cat_check" name="sub_cat_check"
                                                   value="87" id="photographer"/>
                                            <label for="photographer">photographer</label>
                                        </div>
                                    </li>
                            </ul>
                        </div>
                        <!--- END --->

                        <!--- START --->
                        <div class="filt-com lhs-sub">
                            <h4>Job Type</h4>
                            <ul>
                                <li>
                                    <div class="chbox">
                                        <input type="checkbox" name="job_type"  value="1" class="job_type" id="j1">
                                        <label for="j1">Permanent</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="chbox">
                                        <input type="checkbox" name="job_type"  value="2" class="job_type" id="j2">
                                        <label for="j2">Contract</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="chbox">
                                        <input type="checkbox" name="job_type"  value="3" class="job_type" id="j3">
                                        <label for="j3">Part time</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="chbox">
                                        <input type="checkbox" name="job_type"  value="4" class="job_type" id="j4">
                                        <label for="j4">Freelance</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!--- END --->
                        <!--- START --->
                        <div class="filt-com lhs-sub">
                            <h4>State</h4>
                            <div class="form-group">
                                <select  class="state_check chosen-select" name="state_check" id="state_check">
                                      @foreach($states as $state)
                                     <option value="{{$state->state_id}}">{{$state->state_name}}</option>
                                     @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- <div class="job_loc_section filt-com lhs-sub">
                            <h4>Job Location</h4>
                                    <ul>
                                     @foreach($citys as $city)
                                        <li>
                                            <div class="chbox">
                                                <input type="checkbox" name="city_check"  class="city_check" value="{{$city->city_id}}" id="city_check{{$city->city_id}}">
                                                <label for="city_check{{$city->city_id}}">{{$city->city_name}}</label>
                                            </div>
                                        </li>
                                        @endforeach 
                                   </ul>
                        </div> -->
                <!--- END --->
                <!--- START --->
                        <div class="filt-com lhs-sub">
                            <h4>Salary</h4>
                                <ul>
                                    <li>
                                        <div class="chbox">
                                            <input type="checkbox" name="job_salary"  value="1000" class="job_salary" id="sal1">
                                            <label for="sal1">Rs:  0 - 1000</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="chbox">
                                            <input type="checkbox" name="job_salary"  value="5000" class="job_salary" id="sal2">
                                            <label for="sal2">Rs:  1000 - 5000</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="chbox">
                                            <input type="checkbox" name="job_salary"  value="15000" class="job_salary" id="sal3">
                                            <label for="sal3">Rs:  5000 - 15000</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="chbox">
                                            <input type="checkbox" name="job_salary"  value="15001" class="job_salary" id="sal4">
                                            <label for="sal4">Rs:  15000 - above</label>
                                        </div>
                                    </li>
                                </ul>
                        </div>
                <!--- END --->
                </div>  
                <div class="col-md-9 all-job-total">
                    <div class="job-ser-cnt">Showing {{sprintf("%02d",CountCol('vv_jobs','category_id',$id,'category_id'))}} job(s)</div>
                        <div class="job-list">
                            <ul>
                                @foreach($jobs as $job)
                                <li>
                                    <div class="job-box">
                                        <div class="job-box-img">
                                            <img
                                            src="{{asset('/storage/file/'.$job->company_logo)}}"
                                            alt="">
                                        </div>
                                        <div class="job-days">
                                            <span
                                            class="day">{{floor(diff($job->job_interview_date,today())/30)}} Months ago</span>
                                            <span
                                            class="apl">{{CountCol('vv_job_applied','job_id',$job->job_id,'job_id')}} Applicants</span>
                                        </div>
                                        <div class="job-box-con">
                                            <h4>{{$job->job_title}}</h4>
                                            <span>{{name('vv_job_categories',$job->category_id)}}</span>
                                            <span>{{job($job->job_type)}}</span>
                                            <span>{{$job->no_of_openings}} Openings</span>
                                        </div>
                                        <div class="job-box-apl">
                                            <span
                                            class="job-box-cta">Apply now</span>
                                            <span>More details</span>
                                        </div>
                                        <a href="{{route('job_details',['id'=>$job->job_id])}}"
                                        class="job-full-cta"></a>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                </div>
            </div>              
        </div>
        </div>
    </section>
    <!-- END -->


    <!-- START -->


    <!-- END -->

    <!-- START -->
    <section>
 
@endsection
@section('js')
    <!--on page scroll load data ends-->
    <script>
        $(document).ready(function(){
  $("#category").change(function(){
        // alert('hellp');
         var category = $(this).val();
          //window.alert(category);
         if(category == ""){
             $("#sub_category").html("<option value=''>Select sub Category</option>");
         }

         $.ajax({
             url:"/get-job-category/"+category,
             type:"GET",
             success:function(data){
                 var sub_category = data.sub_category;
                 var html = "<option value=''>Select Sub Category</option>";
                 for(let i =0;i<sub_category.length;i++){
                     html += `
                     <option value="`+sub_category[i]['sub_category_id']+`">`+sub_category[i]['sub_category_name']+`</option>
                     `;
                 }
                 $("#sub_category").html(html);
             }
         });
        //  window.alert(sub_category);
     });
    });
        function jobSubcategoryFilter(val) {
            $(".sub_cat_section").css("opacity", 0);
            $.ajax({
                type: "POST",
                url: "http://iwpdirectory.in/jobs/job_sub_category_filter.php",
                data: 'category_id=' + val,
                success: function (data) {
                    if (data == null) {
                        $(".sub_cat_section").remove();
                    } else {
                        $(".sub_cat_section").html(data);
                        $(".sub_cat_section").css("opacity", 1);
                    }

                }
            });
        }
    </script>
    <script type="text/javascript">
        $( document ).ready(function() {
            var state = $('#state_check :selected').val();
            getCities(state);
        });
        function getCities(val) {
            // alert(val);
            $.ajax({
                type: "POST",
                // url: "http://iwpdirectory.in/jobs/job_city_process.php",
                url: "http://iwpdirectory.in/jobs/job_location_filter.php",
                data: 'state_id=' + val,
                success: function (data) {
                    // console.log(data);
                    // $("#city_check").html(data);
                    // $('#city_check').trigger("chosen:updated");
                    if (data == null) {
                        $(".job_loc_section").remove();
                    } else {
                        $(".job_loc_section").html(data);
                        $(".job_loc_section").css("opacity", 1);
                    }
                }
            });
        }
    </script>
@endsection
