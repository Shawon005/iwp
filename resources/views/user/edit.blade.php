@extends('layout.master')
@section('content')
<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Users</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Add user</li>
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
                    <h5>Add new user</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" novalidate=""action="{{route('user_update',['id'=>$user->user_id])}}" method="Post" enctype="multipart/form-data">
                      @csrf
                    <div class="col-sm-12">
                        <div class="mb-3">
                          <label for="name">Name</label>
                          <input class="form-control" id="name" type="text" name="name" placeholder="Name" required=""value="{{$user->first_name}}">
                          <div class="valid-feedback">Looks good!</div>
                          @error('name')
                            <span class="small text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                          <label for="email_id">Email ID</label>
                          <input class="form-control" id="email_id" type="email" name="email_id" placeholder="Email Id" required=""value="{{$user->email_id}}">
                          <div class="valid-feedback">Looks good!</div>
                          @error('email_id')
                            <span class="small text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                          <label for="profile_password">Profile Password</label>
                          <input class="form-control" id="profile_password" type="Password" name="profile_password" placeholder="Password" >
                          <div class="valid-feedback">Looks good!</div>
                          @error('profile_password')
                            <span class="small text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                          <label for="mobile_number">Mobile Number</label>
                          <input class="form-control" id="mobile_number" type="text" name="mobile_number" placeholder="Mobile Number" required=""value="{{$user->mobile_number}}">
                          <div class="valid-feedback">Looks good!</div>
                          @error('mobile_number')
                            <span class="small text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                          <label for="profile_picture">Profile Picture</label>
                          <input class="form-control" id="profile_picture" type="file" placeholder="" name="file">
                          <div class="valid-feedback">Looks good!</div>
                          @error('file')
                            <span class="small text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                          <label for="address">Address</label>
                          <input class="form-control" id="address" type="text" name="address" placeholder="Address" required=""value="{{$user->user_address}}">
                          <div class="valid-feedback">Looks good!</div>
                          @error('address')
                            <span class="small text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>User type</label>
                            <select class="js-example-placeholder-multiple col-sm-12" single="multiple"name="user_type">
                            <option value="">User Type</option>
                              <option value="General"{{($user->user_type)=='General'?"selected":''}}>General User</option>
                              <option value="Service provider"{{($user->user_type)=='Service provider'?"selected":''}}>Service Provider</option>
                            </select>
                           
                          </div>
                          @error('user_type')
                            <span class="small text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>User plan</label>
                            <select class="js-example-placeholder-multiple col-sm-12" single="multiple" name="user_plan">
                            @foreach($plan as $p):
                             @if($user->user_plan==$p->plan_type_id)
                                <option value="{{$p->plan_type_id}}"selected >{{$p->plan_type_name}}-{{$p->plan_type_price}}/Year</option>
                                @else
                                <option value="{{$p->plan_type_id}}">{{$p->plan_type_name}}-{{$p->plan_type_price}}/Year</option>
                                @endif
                                 @endforeach
                            </select>
                          
                          </div>
                          @error('user_plan')
                            <span class="small text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                          <label for="facebook">Facebook</label>
                          <input class="form-control" id="facebook" type="text" name="facebook" placeholder="Address" value="{{$user->user_facebook}}">
                          <div class="valid-feedback">Looks good!</div>
                       
                        </div>
                        <div class="mb-3">
                          <label for="twitter">Twitter</label>
                          <input class="form-control" id="twitter" type="text" name="twitter" placeholder="Address" value="{{$user->user_twitter}}">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label for="youtube">Youtube</label>
                          <input class="form-control" id="youtube" type="text" name="youtube" placeholder="Address" value="{{$user->user_youtube}}">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label for="website">Website</label>
                          <input class="form-control" id="website" type="text" name="website" placeholder="Address" value="{{$user->user_website}}">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                      </div>
                      <button class="btn btn-primary" >Add user</button>
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
@endsection        