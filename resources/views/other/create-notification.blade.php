@extends('layout.master')
@section('content')  
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Notification</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Notification</li>
                    <li class="breadcrumb-item active">Add New Notification</li>
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
                    <h5>Add New Notification</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" action="{{route('notification_store')}}" method="post">
                      @csrf
                    <div class="col-sm-12">
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <select class="js-example-placeholder-multiple col-sm-12"name="notification_user">
                              <option value=""Selected>Choose User</option>
                              <option value="100">All User</option>
                              <option value="101">All Service Provider User</option>
                              <option value="102">All General User</option>
                              @foreach($plan as $plans)
                              <option value="{{$plans->plan_type_id}}">All {{$plans->plan_type_name}} User</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">                      
                          <input class="form-control" id="state_name" type="text" name="notification_title" placeholder="Notification Title" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <input class="form-control" id="state_name" type="text" name="notification_message" placeholder="Short Description" required="">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <input class="form-control" id="state_name" type="text" name="notification_link" placeholder="Page Link" required="">
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