
 @extends('layout.master')
@section('content')       <!-- Page Sidebar Ends-->
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
                    <li class="breadcrumb-item active">Add Expert Area</li>
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
                    <h5>Add New Area</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" action="{{route('expert_area_update',['id'=>$area->city_id])}}" method="post">
                      @csrf
                    <div class="col-sm-12">
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>City</label>
                            <select class="js-example-placeholder-multiple col-sm-12" name="city_id" >
                              <option value="AL">Choose City Name</option>
                              @foreach($city as $user):
                                <option value="{{$user->country_id}}" >{{$user->country_name}}</option>
                                @if($area->state_id == $user->country_id)
                                <option value="{{$user->country_id}}" selected>{{$user->country_name}}</option>
                                       @else
                                    <option value="{{$user->country_id}}" >{{$user->country_name}}</option>
                                      @endif 
                                 @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="area_name">Area Name</label>
                          <input class="form-control" id="area_name" type="text" name="area_name" placeholder="Area name*" value="{{$area->city_name}}">
                          <div class="valid-feedback">Looks good!</div>
                          @error('area_name')
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
 @endsection
        <!-- footer start-->
 