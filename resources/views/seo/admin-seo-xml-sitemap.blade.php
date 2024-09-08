@extends('layout.master')
@section('content')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>SEO Settings</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Sitemap</li>
                    <li class="breadcrumb-item active">XML Sitemap </li>
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
                  @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <h4>XML Sitemap</h4>
                    <p class="mt-3"> <a href="https://www.xml-sitemaps.com/?bizbook-tempate" target="_blank">Click here</a> to generate your sitemap then upload to below box.</p>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation"action="{{route('xml_store')}}" method="POST"enctype="multipart/form-data">
                      @csrf
                       <div class="col-sm-12">
                        <div class="mb-3">
                           <label for="upload_xml_file:">Upload XML file:</label>
                           <input class="form-control" id="upload_xml_file:" type="file" name="xml_file" placeholder="" required="">
                           <div class="valid-feedback">Looks good!</div>             
                        </div>
                      </div>
                      <div class="btn-showcase text-end">
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
        <!-- footer start-->
 @endsection