@extends('layout.master')
@section('content')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Event State</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Event State</li>
                    <li class="breadcrumb-item active">Add Event State</li>
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
                    <h5>Add New Event State</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" action="{{route('event_city_update',['id'=>$city->city_id])}}" method="Post">
                      @csrf
                      <div class="col-sm-12">
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>State</label>
                            <select class="js-example-basic-single col-sm-12" name="state_id" id="states"> 
                                <optgroup>
                                <option value="">Select Country</option>
                                  @foreach($state as $user):
                                    @if($city->state_id == $user->state_id)
                                    <option value="{{$user->state_id}}" selected >{{$user->state_name}}</option>
                                      @else
                                      <option value="{{$user->state_id}}" >{{$user->state_name}}</option>
                                      @endif
                                 @endforeach
                              </select>
                          </div>
                          @error('state_id')
                            <span class="small text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                          <label for="event_city_name">Event City Name</label>
                          <input class="form-control" id="event_city_name" type="text" name="city_name" placeholder="Event City name*" required=""value="{{$city->city_name}}">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        @error('city_name')
                            <span class="small text-danger">{{$message}}</span>
                            @enderror
                      </div>
                   
                      <button class="btn btn-primary">Update</button>
                      <input class="btn btn-light" type="reset" value="Discard">
                    
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
       