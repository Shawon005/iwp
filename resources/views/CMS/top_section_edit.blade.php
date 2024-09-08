@extends('layout.master')
@section('content')
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Top Section</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Top Section</li>
                    <li class="breadcrumb-item active">Top Section</li>
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
                    <h5>Top Section</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" action="{{route('top_section_update',['id'=>$top->top_section_id])}}" method="Post"enctype="multipart/form-data">
                      @csrf
                     <div class="col-sm-12">
                        <div class="mb-3">
                          
                          <input class="form-control" id="category_name" type="text" name="top_section_title" placeholder="top_section_title*" value="{{$top->top_section_title}}"required="">
                          <div class="valid-feedback">Looks good!</div>
                         
                        </div>
                        <div class="mb-3">
                        <textarea class="form-control" id="exampleFormControlTextarea4" rows="3"name="top_section_description" value="{{$top->top_section_description}}"required="">{{$top->top_section_description}}</textarea>
                         
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          
                          <input class="form-control" id="category_name" type="text" name="top_section_link_text" placeholder="top_section_link_text*" value="{{$top->top_section_link_text}}"required="">
                          <div class="valid-feedback">Looks good!</div>
                         
                        </div>
                        <div class="mb-3">
                          
                          <input class="form-control" id="category_name" type="text" name="top_section_link" placeholder="top_section_link*" value="{{$top->top_section_link}}"required="">
                          <div class="valid-feedback">Looks good!</div>
                         
                        </div>
                        <div class="mb-3">
                          
                          <input class="form-control" id="category_name" type="file" name="top_section_image" placeholder="*" value="{{$top->top_section_image}}">
                          <div class="valid-feedback">Looks good!</div>
                         
                        </div>
                      </div>
                      <button class="btn btn-primary" type="submit">Submit</button>
                      <input class="btn btn-light" type="reset" value="Discard">
                    </form>
                    <div class="btn-showcase text-end">
                 
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