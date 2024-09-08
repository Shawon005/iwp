
@extends('layout.master')
@section('content')                 
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Service Experts</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Expert State,Cities & Areas</li>
                    <li class="breadcrumb-item active">Add Expert City</li>
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
                    <h5>Add New Expert City</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" action="{{route('expert_city_update',['id'=>$city->country_id])}}" method="post">
                      <div class="col-sm-12">
                        @csrf
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>State</label>
                            <select class="js-example-placeholder-multiple col-sm-12" name="state_id">
                              <option value="AL">Choose State</option>
                              @foreach($state as $user):
                                @if($city->state_id == $user->state_id)
                                    <option value="{{$user->state_id}}" selected >{{$user->state_name}}</option>
                                      @else
                                      <option value="{{$user->state_id}}" >{{$user->state_name}}</option>
                                      @endif                                
                                       @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="city_name"> City Name</label>
                          <input class="form-control" id="city_name" type="text" name="city_name" placeholder="City name*" required=""value="{{$city->country_name}}">
                          <div class="valid-feedback">Looks good!</div>
                          @error('city_name')
                            <span class="small text-danger">{{$message}}</span>
                            @enderror
                        </div>
                      </div>
                      <div class="btn-showcase text-end">
                      <button class="btn btn-primary" type="submit">Update</button>
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
        <!-- footer start-->
  