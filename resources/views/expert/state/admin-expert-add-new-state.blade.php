@extends('layout.master')
@section('content')  
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Service Experts</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Expert State,Cities & Areas</li>
                    <li class="breadcrumb-item active">Add Expert State</li>
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
                    <h5>Add New State</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" action="{{route('expert_state_store')}}" method="post">
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
                          <label for="state_name">State Name</label>
                          <input class="form-control" id="state_name" type="text" name="state_name" placeholder="State name*" required="">
                          <div class="valid-feedback">Looks good!</div>
                          @error('state_name')
                            <span class="small text-danger">{{$message}}</span>
                            @enderror
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