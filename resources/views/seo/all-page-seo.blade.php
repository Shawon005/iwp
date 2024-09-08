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
                <div class="card p-4">
                  <div class="card-header pb-0">
                  @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                                 <h4 class="text-center p-2">Edit SEO - Home Page</h4>
                                <form name="seo_page_form" id="country_form" method="post" action="{{route('all_page_update',['id'=>$page->seo_page_id])}}" class="cre-dup-form cre-dup-form-show">
                                    @csrf
                                 <input type="hidden" id="seo_page_id" value="1" name="seo_page_id" class="validate">
                                 <ul>
                                     <li>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="s-com">
                                                    <div class="form-group">
                                                      <input type="text" name="seo_page_title" value="{{$page->seo_page_title}}" class="form-control" placeholder="Title">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="s-com">
                                                    <div class="form-group">
                                                        <textarea name="seo_page_keywords" class="form-control" placeholder="Keywords">{{$page->seo_page_keywords}}</textarea>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="s-com">
                                                    <div class="form-group">
                                                        <textarea name="seo_page_description" class="form-control" placeholder="Descriptions">{{$page->seo_page_description}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     </li>
                                 </ul>
                                <button type="submit" name="seo_page_submit" class="btn btn-primary mt-3">Submit</button>
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
                        