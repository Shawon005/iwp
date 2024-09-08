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
                    <form class="row needs-validation" action="{{route('store_event_state')}}" method="Post">
                      @csrf
                      <div class="col-sm-12">
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>Country</label>
                            <select class="js-example-basic-single col-sm-12" name="country_id" id="country"> 
                                <optgroup>
                                <option value="">Select Country</option>
                                  @foreach($country as $user):
                                <option value="{{$user->country_id}}" >{{$user->country_name}}</option>
                                 @endforeach
                                </optgroup>
                              </select>
                          </div>
                          @error('country_id')
                            <span class="small text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                          <label for="event_state_name">Event State Name</label>
                          <input class="form-control" id="event_state_name" type="text" name="state_name" placeholder="Event State name*" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        @error('state_name')
                            <span class="small text-danger">{{$message}}</span>
                            @enderror
                      </div>
                   
                      <button class="btn btn-primary">Submit</button>
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
       