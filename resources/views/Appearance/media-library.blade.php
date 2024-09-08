@extends('layout.master')
@section('content')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Media Library</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Media Library</li>
                    <li class="breadcrumb-item active">Media Library</li>
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
                    <div class="row">
                        <div class="col-sm-4">
                          <h5>Media Library</h5>
                        </div>
                        <div class="col-sm-3">
                            <select class="form-control" onchange="image()" id="sel1">
                                <option name="" selected="" value="0" id="">All images</option>
                                <option name="" value="1" id="">Listing images</option>
                                <option name="" value="2" id="">Event images</option>
                                <option name="" value="3" id="">Product images</option>
                                <option name="" value="4" id="">Service expert images</option>
                                <option name="" value="5" id="">Job images</option>
                                <option name="" value="6" id="">Discount images</option>
                                <option name="" value="7" id="">Ads images</option>
                                <option name="" value="8" id="">Blog images</option>
                                <option name="" value="9" id="">Profile images</option>
                                <option name="" value="10" id="">Listing services images</option>
                                <option name="" value="11" id="">Listing gallery images</option>
                            </select> 
                        </div>
                        <div class="col-sm-5">
                            <button class ="btn btn-primary">Select All</button>
                            <button class ="btn btn-primary">Delect Selected</button>
                        </div>
                    </div>       
                  </div>
                  <div class="card-body add-post">
                  <div class="container-fluid ">
                    <div id="listing" class="mb-3">
                       <h3>Listing Image</h3>
                        @foreach($listing as $list)
                        <img src="{{asset('/storage/file/'.$list->cover_image)}}"style="margin:5px" width="100" height="110"title="{{user($list->user_id)}} date:{{dateFormatconverter($list->listing_cdt)}}" alt="">
                        @endforeach
                    </div>
                    <div id="listing_Expert" class="mb-3">
                       <h3>Listing Service Image</h3>
                        @foreach($listing as $list)
                        <img src="{{asset('/storage/file/'.$list->service_image)}}"style="margin:5px" width="100" height="110" alt="">
                        @endforeach
                    </div>
                    <div id="listing_gallery" class="mb-3">
                       <h3>Listing Gallery Image</h3>
                        @foreach($listing as $list)
                        <img src="{{asset('/storage/file/'.$list->gallery_image)}}"style="margin:5px" width="100" height="110" alt="">
                        @endforeach
                    </div>
                    <div id="event" class="mb-3">
                       <h3>Event Image</h3>
                        @foreach($event as $list)
                        <img src="{{asset('/storage/file/'.$list->event_image)}}"style="margin:5px" width="100" height="110" alt="">
                        @endforeach
                    </div>
                    <div id="product" class="mb-3">
                       <h3>Product Image</h3>
                        @foreach($product as $list)
                        <img src="{{asset('/storage/file/'.$list->gallery_image)}}"style="margin:5px" width="100" height="110" alt="">
                        @endforeach
                    </div>
                    <div id="expert" class="mb-3">
                       <h3>Expert Image</h3>
                        @foreach($expert as $list)
                        <img src="{{asset('/storage/file/'.$list->profile_image)}}"style="margin:5px" width="100" height="110" alt="">
                        @endforeach
                    </div>
                    <div id="blog" class="mb-3">
                       <h3>Blog Image</h3>
                        @foreach($blog as $list)
                        <img src="{{asset('/storage/file/'.$list->blog_image)}}"style="margin:5px" width="100" height="110" alt="">
                        @endforeach
                    </div>
                    <div id="job" class="mb-3">
                       <h3>Job Image</h3>
                        @foreach($job as $list)
                        <img src="{{asset('/storage/file/'.$list->company_logo)}}"style="margin:5px" width="100" height="110" alt="">
                        @endforeach
                    </div>
                    <div id="discount" class="mb-3">
                       <h3>Discount Image</h3>
                        @foreach($discount as $list)
                        <img src="{{asset('/storage/file/'.$list->gallery_image)}}"style="margin:5px" width="100" height="110" alt="">
                        @endforeach
                    </div>
                  </div>
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
    function image()
    {    
        
        feature=document.getElementById("sel1").value;
        if(feature==0){
           document.getElementById("listing").style.display="block";
           document.getElementById("listing_Expert").style.display='block';
           document.getElementById("listing_gallery").style.display='block';
           document.getElementById("event").style.display='block';
           document.getElementById("product").style.display='block';
           document.getElementById("expert").style.display='block';
           document.getElementById("job").style.display='block';
           document.getElementById("blog").style.display='block';
           document.getElementById("discount").style.display='block';
        }
        if(feature==1){
           document.getElementById("listing").style.display="block";
           document.getElementById("listing_Expert").style.display='none';
           document.getElementById("listing_gallery").style.display='none';
           document.getElementById("event").style.display='none';
           document.getElementById("product").style.display='none';
           document.getElementById("expert").style.display='none';
           document.getElementById("job").style.display='none';
           document.getElementById("blog").style.display='none';
           document.getElementById("discount").style.display='none';
        }
        if(feature==2){
           document.getElementById("listing").style.display='none';
           document.getElementById("listing_Expert").style.display='none';
           document.getElementById("listing_gallery").style.display='none';
           document.getElementById("event").style.display="block";
           document.getElementById("product").style.display='none';
           document.getElementById("expert").style.display='none';
           document.getElementById("job").style.display='none';
           document.getElementById("blog").style.display='none';
           document.getElementById("discount").style.display='none';
        }
        if(feature==3){
           document.getElementById("listing").style.display='none';
           document.getElementById("listing_Expert").style.display='none';
           document.getElementById("listing_gallery").style.display='none';
           document.getElementById("event").style.display='none';
           document.getElementById("product").style.display="block";
           document.getElementById("expert").style.display='none';
           document.getElementById("job").style.display='none';
           document.getElementById("blog").style.display='none';
           document.getElementById("discount").style.display='none';
        }
        if(feature==4){
           document.getElementById("listing").style.display='none';
           document.getElementById("listing_Expert").style.display='none';
           document.getElementById("listing_gallery").style.display='none';
           document.getElementById("event").style.display='none';
           document.getElementById("product").style.display='none';
           document.getElementById("expert").style.display="block";
           document.getElementById("job").style.display='none';
           document.getElementById("blog").style.display='none';
           document.getElementById("discount").style.display='none';
        }
        if(feature==5){
           document.getElementById("listing").style.display='none';
           document.getElementById("listing_Expert").style.display='none';
           document.getElementById("listing_gallery").style.display='none';
           document.getElementById("event").style.display='none';
           document.getElementById("product").style.display='none';
           document.getElementById("expert").style.display='none';
           document.getElementById("job").style.display="block";
           document.getElementById("blog").style.display='none';
           document.getElementById("discount").style.display='none';
        }
        if(feature==6){
           document.getElementById("listing").style.display='none';
           document.getElementById("listing_Expert").style.display='none';
           document.getElementById("listing_gallery").style.display='none';
           document.getElementById("event").style.display='none';
           document.getElementById("product").style.display='none';
           document.getElementById("expert").style.display='none';
           document.getElementById("job").style.display='none';
           document.getElementById("blog").style.display='none';
           document.getElementById("discount").style.display="block";
        }
        if(feature==8){
           document.getElementById("listing").style.display='none';
           document.getElementById("listing_Expert").style.display='none';
           document.getElementById("listing_gallery").style.display='none';
           document.getElementById("event").style.display='none';
           document.getElementById("product").style.display='none';
           document.getElementById("expert").style.display='none';
           document.getElementById("job").style.display='none';
           document.getElementById("blog").style.display="block";
           document.getElementById("discount").style.display='none';
        }
        if(feature==10){
           document.getElementById("listing").style.display='none';
           document.getElementById("listing_Expert").style.display="block";
           document.getElementById("listing_gallery").style.display='none';
           document.getElementById("event").style.display='none';
           document.getElementById("product").style.display='none';
           document.getElementById("expert").style.display='none';
           document.getElementById("job").style.display='none';
           document.getElementById("blog").style.display='none';
           document.getElementById("discount").style.display='none';
        }
        if(feature==11){
           document.getElementById("listing").style.display='none';
           document.getElementById("listing_Expert").style.display='none';
           document.getElementById("listing_gallery").style.display="block";
           document.getElementById("event").style.display='none';
           document.getElementById("product").style.display='none';
           document.getElementById("expert").style.display='none';
           document.getElementById("job").style.display='none';
           document.getElementById("blog").style.display='none';
           document.getElementById("discount").style.display='none';
        }

    }
   
</script>
@endsection