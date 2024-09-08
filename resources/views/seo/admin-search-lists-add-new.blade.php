
 @extends('layout.master')
 @section('content')      
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
                    <li class="breadcrumb-item">Search Settings</li>
                    <li class="breadcrumb-item active">Add New</li>
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
                    <h5>Search query</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation"method="post" action="{{route('all_search_store')}}">
                      @csrf
                      <div class="col-sm-12">
                        <div class="card alert alert-light">
                          <div class="p-1">
                            <input class="form-control" id="search_text" type="text" name="search_title" value="" placeholder="Search text*" required="">
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                          <hr> </hr>
                          <div class="p-1">
                            <input class="form-control" id="tag_line_for_search" type="text" name="search_tag_line" value=""placeholder="Tag line for search*" required="">
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                          <hr class=""> </hr>
                          <div class="p-1">
                            <input class="form-control" id="search link" type="text" name="search_list_link" value=""placeholder="Search link*" required="">
                            <div class="valid-feedback">Looks good!</div>
                          </div>
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
        
   