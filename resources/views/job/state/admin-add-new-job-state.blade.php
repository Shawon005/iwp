@extends('layout.master')
@section('content')
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Job State</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Job State</li>
                    <li class="breadcrumb-item active">Add Job State</li>
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
                    <h5>Add New Job State</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" action ="{{route('job_state_store')}}"method="post">
                      @csrf
                      <div class="col-sm-12">
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Country</label>
                            <select class="js-example-placeholder-multiple col-sm-12"name="country_id">
                              <option value="AL">Choose country</option>
                              @foreach($country as $user):
                                <option value="{{$user->country_id}}" >{{$user->country_name}}</option>
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="job_state_name">Job State Name</label>
                          <input class="form-control" id="job_state_name" type="text" name="state_name" placeholder="Job State Name*" required="">
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
 