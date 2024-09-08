@extends('layout.master')
@section('content')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>ADS</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Slider Images</li>
                    <li class="breadcrumb-item active">Add Slider</li>
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
                    <h5>Add New Slider Photo</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" action="{{route('slider_update',['id'=>$slider->slider_id])}}" method="Post" enctype="multipart/form-data">
                      @csrf
                      <div class="col-sm-12">
                        <div class="mb-3">
                          <label for="choose_slider_image">Choose Slider Image</label>
                          <input class="form-control" id="choose_slider_image" type="file" name="slider_photo" placeholder="" >
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <!-- <label>Slider External Link<label> -->
                          <textarea class="form-control" id="exampleFormControlTextarea4" placeholder="Slider External Link" name="slider_link" value="{{$slider->slider_link}}"cols="10" rows="2">{{$slider->slider_link}}</textarea>
                        </div>
                      </div>
                      <div class="btn-showcase text-end">
                        <button class="btn btn-primary" type="submit">Submit</button>
                        <input class="btn btn-light" type="reset" value="Discard">
                      </div>
                    </form>
                    <div class="alert alert-info mt-5">
                      <p class="text-center"><b>Notes:</b> Hi, Before submit your <b>Ads</b> please check the <b>available date</b> because previous Ads running in same date. Kindly check this manually</p>
                    </div>
                  </div>                  
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
 @endsection