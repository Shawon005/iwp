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
                    <form class="row needs-validation" action="{{route('notification_update',['id'=>$notifi->notification_id])}}" method="post">
                      @csrf
                    <div class="col-sm-12">
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <select class="js-example-placeholder-multiple col-sm-12"name="notification_user">
                              
                              <option value="100" {{($notifi->notification_user==100)?'selected':""}}>All User</option>
                              <option value="101"{{($notifi->notification_user==101)?'selected':""}}>All Service Provider User</option>
                              <option value="102"{{($notifi->notification_user==101)?'selected':""}}>All General User</option>
                              @foreach($plan as $plans)
                              @if($notifi->notification_user==$plans->plan_type_id)
                              <option value="{{$plans->plan_type_id}}"selected>All {{$plans->plan_type_name}} User</option>
                              @else
                              <option value="{{$plans->plan_type_id}}">All {{$plans->plan_type_name}} User</option>
                              @endif
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">                      
                          <input class="form-control" id="state_name" type="text" name="notification_title" placeholder="Notification Title" value="{{$notifi->notification_title}}">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <input class="form-control" id="state_name" type="text" name="notification_message" placeholder="Short Description" value="{{$notifi->notification_message}}">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <input class="form-control" id="state_name" type="text" name="notification_link" placeholder="Page Link" value="{{$notifi->notification_link}}">
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