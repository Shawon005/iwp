@extends('layout.master')
@section('content')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
               @endif
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Places</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Places</li>
                    <li class="breadcrumb-item active">All Places</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header pb-0">
                    <h5>Place details & Info</h5>
                  </div>
                  <div class="card-body add-post">
                  <form class="row needs-validation" action="{{route('place_update',['id'=>$place->place_id])}}"method="post"enctype="multipart/form-data">
                     @csrf
                      <div class="col-sm-12">
                        <div class="mb-3">
                          <label for="place_name">Place Name</label>
                          <input class="form-control" id="place_name" type="text" name="place_name" placeholder="Place Name" value="{{$place->place_name}}">
                          <div class="valid-feedback">Looks good!</div>
                          @error('place_name')
                            <span class="small text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="col-form-label"> 
                              <label>Category</label>
                              <select class="js-example-placeholder-multiple col-sm-12"name="category_id" >
                              @foreach($category as $user):
                                @if($place->category_id==$user->category_id)
                                <option value="{{$user->category_id}}" selected>{{$user->category_name}}</option>
                                @else
                                <option value="{{$user->category_id}}" >{{$user->category_name}}</option>
                                @endif
                                 @endforeach
                              </select>
                          </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="mb-3">
                              <label for="tag_name">Tag name</label>
                              <input class="form-control mt-2" id="tag_name" type="text" name="place_tags" placeholder="Ex:Group of three waterfalls" value="{{$place->place_tags}}">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="mb-3">
                              <div class="col-form-label"> 
                                <label>Status</label>
                                <select class="js-example-placeholder-multiple col-sm-12"name="place_status">
                                  <option value="1"{{($place->place_status == 1)?"selected":""}}>Active</option>
                                  <option value="2"{{($place->place_status == 2)?"selected":""}}>Open</option>
                                  <option value="3"{{($place->place_status == 3)?"selected":""}}>Close</option>
                                  <option value="4"{{($place->place_status == 4)?"selected":""}}>Temporarily Close</option>
                                  <option value="5"{{($place->place_status == 5)?"selected":""}}>Premanently Close</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="mb-3">
                              <label for="tourism_fee">Booking payment</label>
                              <input class="form-control mt-2" id="tourism_fee" type="text" name="place_fee" placeholder="" value="{{$place->place_fee}}">
                              <div class="valid-feedback">Looks good!</div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mb-3">
                              <label class="col-form-label">Open time</label>
                          <!-- <div class="col-xl-5 col-sm-7 col-lg-8"> -->
                              <div class="input-group date" id="dt-time" data-target-input="nearest">
                                <input class="form-control datetimepicker-input digits" type="text" data-target="#dt-time"name="opening_time"value="{{$place->opening_time}}">
                                <div class="input-group-text" data-target="#dt-time" data-toggle="datetimepicker"><i class="fa fa-clock-o"></i></div>
                              </div>
                          <!-- </div> -->
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="mb-3">
                              <label class="col-form-label">Close Time</label>
                          <!-- <div class="col-xl-5 col-sm-7 col-lg-8"> -->
                              <div class="input-group date" id="dt-time1" data-target-input="nearest">
                                <input class="form-control datetimepicker-input digits" type="text" data-target="#dt-time1"name="closeing_time"value="{{$place->closing_time}}">
                                <div class="input-group-text" data-target="#dt-time1" data-toggle="datetimepicker"><i class="fa fa-clock-o"></i></div>
                              </div>
                          <!-- </div> -->
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="mb-3">
                              <label class="col-form-label">Select Date</label>
                          <!-- <div class="col-xl-5 col-sm-7 col-lg-8"> -->
                              <div class="input-group date" id="dt-time1" data-target-input="nearest">
                                <input class="form-control" id="place_date" type="date" name="place_date" value="{{$place->place_date}}" placeholder="Select Date">
                                <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                              </div>
                          <!-- </div> -->
                            </div>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="direction">Direction(Google map link)</label>
                          <input class="form-control mt-2" id="direction" type="text"  placeholder="" name="google_map"value="{{$place->google_map}}">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <hr> </hr>
                        <div class="mb-3">
                          <h5 style="color:#0788E2">NEAR BY SERVICES & ACTIVITY</h5>
                        </div>
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Discover places</label>
                            <select class="js-example-placeholder-multiple col-sm-12" multiple ="multiple"name="place_discover[]">
                            @foreach($places as $placeed)
                            @foreach($discover as $S)                            
                              @if($placeed->place_id==$S)
                              <option value="{{$placeed->place_id}}"selected>{{$placeed->place_name}}</option>
                                @endif
                                @endforeach
                              <option value="{{$placeed->place_id}}">{{$placeed->place_name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <hr> </hr>
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Related places</label>
                            <select class="js-example-placeholder-multiple col-sm-12" multiple ="multiple"name="place_releted[]"> 
                            @foreach($places as $placeed)
                            @foreach($related as $S)                            
                              @if($placeed->place_id==$S)
                              <option value="{{$placeed->place_id}}"selected>{{$placeed->place_name}}</option>
                                @endif
                                @endforeach
                              <option value="{{$placeed->place_id}}">{{$placeed->place_name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <hr> </hr>
                        <!--<div class="mb-3">-->
                        <!--  <div class="col-form-label"> -->
                        <!--    <label>Top near by Services(Business listings)</label>-->
                        <!--    <select class="js-example-placeholder-multiple col-sm-12" multiple ="multiple"name="place_listing[]">-->
                        <!--    @foreach($listing as $user)-->
                        <!--      @foreach($listingP as $L)                            -->
                        <!--      @if($user->listing_id==$L)-->
                        <!--        <option value="{{$user->listing_id}} " selected >{{$user->listing_name}}</option>-->
                        <!--        @endif-->
                        <!--        @endforeach-->
                        <!--        <option value="{{$user->listing_id}} ">{{$user->listing_name}}</option>-->
                        <!--         @endforeach-->
                        <!--    </select>-->
                        <!--  </div>-->
                        <!--</div>-->
                        <!--<hr> </hr>-->
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Events in this place</label>
                            <select class="js-example-placeholder-multiple col-sm-12" multiple ="multiple"name="place_events[]">
                              
                              @foreach($event as $user):
                                @foreach($eventP as $P)                            
                              @if($user->event_id==$P)
                              <option value="{{$user->event_id}}" selected>{{$user->event_name}}</option>
                                @endif
                                @endforeach
                                <option value="{{$user->event_id}}" >{{$user->event_name}}</option>
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <hr> </hr>
                        <!--<div class="mb-3">-->
                        <!--  <div class="col-form-label"> -->
                        <!--    <label>Services Experts in this place</label>-->
                        <!--    <select class="js-example-placeholder-multiple col-sm-12" multiple ="multiple"name="place_experts[]">                             -->
                        <!--      @foreach($expert as $user):-->
                        <!--        @foreach($expertP as $E)                            -->
                        <!--      @if($user->expert_id==$E)-->
                        <!--      <option value="{{$user->expert_id}}" selected>{{$user->profile_name}}</option>-->
                        <!--        @endif-->
                        <!--        @endforeach-->
                        <!--        <option value="{{$user->expert_id}}" >{{$user->profile_name}}</option>-->
                        <!--         @endforeach-->
                        <!--    </select>-->
                        <!--  </div>-->
                        <!--</div>-->
                        <!--<hr> </hr>-->
                        <!--<div class="mb-3">-->
                        <!--  <div class="col-form-label"> -->
                        <!--    <label>News & Articles in this place</label>-->
                        <!--    <select class="js-example-placeholder-multiple col-sm-12" multiple ="multiple"name="place_news[]">-->
                        <!--    @foreach($news as $user):-->
                        <!--      @foreach($newsP as $N)                            -->
                        <!--      @if($user->news_id==$N)-->
                        <!--      <option value="{{$user->news_id}}" selected>{{$user->news_title}}</option>-->
                        <!--        @endif-->
                        <!--        @endforeach-->
                        <!--        <option value="{{$user->news_id}}" >{{$user->news_title}}</option>-->
                        <!--         @endforeach-->
                        <!--    </select>-->
                        <!--  </div>-->
                        <!--</div>-->
                        <!--<hr> </hr>-->
                        <div class="mb-3">
                          <h5>PHOTO GALLERY</h5>
                          <input type="file" class="form-control " multiple="multiple"name="place_gallery_image[]">
                        </div>
                        <div class="mb-3">
                          <label for="direction">Video Gallery</label>
                          <input class="form-control mt-2" id="direction" type="url"  placeholder="Enter youtube video link" name="place_gallery_video">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <hr> </hr>
                        <!-- <div class="dropzone" id="singleFileUpload" action="/upload.php"name="place_gallery_image">
                          <div class="m-0 dz-message needsclick"><i class="icon-cloud-up"></i>
                            <h6 class="mb-0">Drop & Drop your image here or Select file to upload.</h6>
                            <p>Supports:JPG, JPEG and PNG</p>
                          </div>
                        </div>
                        <hr> </hr>
                        <div class="mb-3">
                          <h5 style="color:#0788E2">WHAT PEOPLE ASK</h5>
                          <div class=" text-end">
                              <div class="btn btn-primary prod-add-oad"><span>+</span></div>
                              <div class="btn btn-info prod-add-ore"><span>-</span></div>
                          </div>
                          </div> -->
                          <h4 class="mt-4">What people ask</h4>
                        <div class=" text-end">
                              <div class="btn btn-primary prod-add-oad"><span>+</span></div>
                              <div class="btn btn-info prod-add-ore"><span>-</span></div>
                          </div>
                        <div class="add-prod-oth">
                          <ul>
                            @php
                            $val=0;
                            @endphp
                            @foreach($qu as $qu1)
                            <li>
                          <div class="row ">
                            <div class="col">
                              <div class="mb-3">
                                <label for="question">Question:</label>
                                <input class="form-control mt-2" id="question" type="text" name="place_info_question[]" placeholder="" value="{{$qu1}}">
                                <div class="valid-feedback">Looks good!</div>
                              </div>
                            </div>
                            <div class="col">
                              <div class="mb-3">
                                <label for="answer">Answer:</label>
                                <input class="form-control mt-2" id="answer" type="text" name="place_info_answer[]" placeholder="" value="{{$ans[$val++]}}">
                                <div class="valid-feedback">Looks good!</div>
                              </div>
                            </div>
                           </div>
                            </li>
                            @endforeach
                            </ul>
                       </div>
                        
                        <hr> </hr>
                        <div class="card alert alert-light">
                          <div class="p-1">
                            <h5>SEO Details</h5>
                          </div>
                          <div class="p-1">
                            <input class="form-control" id="seo_title" type="text" name="seo_title" value="{{$place->seo_title}}"placeholder="SEO Title" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                          <hr> </hr>
                          <div class="p-1">
                            <input class="form-control" id="meta_descriptions" type="text" name="seo_descriptions" value="{{$place->seo_description}}"placeholder="Meta Descriptions" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                          <hr class=""> </hr>
                          <div class="p-1">
                            <input class="form-control" id="meta_keywords" type="text" name="seo_keywords" value="{{$place->seo_keywords}}"placeholder="Meta Keywords" >
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                          <hr> </hr>
                        </div>
                      </div>
                      <div class="btn-showcase text-end mt-3">
                      <button class="btn btn-primary" type="submit">Submit</button>
                      <input class="btn btn-light" type="reset" value="Discard">
                    </div>
                    </form>
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
 @endsection     
 @section('js')
<script>
   var count=1;
 //PRODUCT SPECIFICATION LIST ADD - APPEND
 $(".prod-add-oad").on('click', function() {
  $(".add-prod-oth ul li:last-child").after(' <li><div class="row "><div class="col"><div class="mb-3"><label for="question">Question:</label><input class="form-control mt-2" id="question" type="text" name="place_info_question[]" placeholder="" ><div class="valid-feedback">Looks good!</div></div></div><div class="col"><div class="mb-3"><label for="answer">Answer:</label><input class="form-control mt-2" id="answer" type="text" name="place_info_answer[]" placeholder="" ><div class="valid-feedback">Looks good!</div></div></div></div></li>');
count=count+1;
});
    //PRODUCT SPECIFICATION LIST REMOVE - APPEND
    $(".prod-add-ore").on('click', function() {
        var _prodspec = $(".add-prod-oth ").length;
        if(count >= 2){
            $(".add-prod-oth ul li:last-child").remove();
            count=count-1;
        }
        else{
            alert("Sorry! you are not allowed to remove the last one.");
        }
    });
</script>
 @endsection