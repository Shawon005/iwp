@extends('layout.master')
@section('content')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3 >ADD NEW USER</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Add New User</li>
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
                    <h5>New User Details</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" novalidate=""action="{{route('user_store')}}" method="Post" enctype="multipart/form-data">
                      @csrf
                    <div class="col-sm-12">
                        <div class="mb-3">
                          <label for="name">Name</label>
                          <input class="form-control" id="name" type="text" name="name" placeholder="Name" required="">
                          <div class="valid-feedback">Looks good!</div>
                          @error('name')
                            <span class="small text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                          <label for="email_id">Email ID</label>
                          <input class="form-control" id="email_id" type="email" name="email_id" placeholder="Email Id" required="">
                          <div class="valid-feedback">Looks good!</div>
                          @error('email_id')
                            <span class="small text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                          <label for="profile_password">Profile Password</label>
                          <input class="form-control" id="profile_password" type="Password" name="profile_password" placeholder="Password" required="">
                          <div class="valid-feedback">Looks good!</div>
                          @error('profile_password')
                            <span class="small text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                          <label for="mobile_number">Mobile Number</label>
                          <input class="form-control" id="mobile_number" type="text" name="mobile_number" placeholder="Mobile Number" required="">
                          <div class="valid-feedback">Looks good!</div>
                          @error('mobile_number')
                            <span class="small text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                          <label for="profile_picture">Profile Picture</label>
                          <input class="form-control" id="profile_picture" type="file" placeholder="" required=""name="file">
                          <div class="valid-feedback">Looks good!</div>
                          @error('file')
                            <span class="small text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                          <label for="address">Address</label>
                          <input class="form-control" id="address" type="text" name="address" placeholder="Address" required="">
                          <div class="valid-feedback">Looks good!</div>
                          @error('address')
                            <span class="small text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                          <div class="col-form-label"> 
                            <label>User type</label>
                            <select class="js-example-placeholder-multiple col-sm-12"   single="multiple"  name="user_type"  id="user_type">
                            <option value="">User Type</option>
                              <option value="General">General User</option>
                              <option value="Service provider">Service Provider</option>
                            </select>
                           
                          </div>
                          @error('user_type')
                            <span class="small text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3" id="user_plan">
                          <div class="col-form-label"> 
                            <label>User plan</label>
                            <select class="js-example-placeholder-multiple col-sm-12" single="multiple" name="user_plan">
                            <option value="">User Plan</option>
                             @foreach($plan as $user):
                                <option value="{{$user->plan_type_id}}" >{{$user->plan_type_name}}-{{$user->plan_type_price}}/Year</option>
                                 @endforeach
                            </select>
                          </div>
                          @error('user_plan')
                            <span class="small text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                          <label for="facebook">Facebook</label>
                          <input class="form-control" id="facebook" type="text" name="facebook" placeholder="Address" >
                          <div class="valid-feedback">Looks good!</div>
                       
                        </div>
                        <div class="mb-3">
                          <label for="twitter">Twitter</label>
                          <input class="form-control" id="twitter" type="text" name="twitter" placeholder="Address" >
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label for="youtube">Youtube</label>
                          <input class="form-control" id="youtube" type="text" name="youtube" placeholder="Address">
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                          <label for="website">Website</label>
                          <input class="form-control" id="website" type="text" name="website" placeholder="Address" >
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
@section('js')
<script>
    $(document).ready(function(){
     
     $("#user_type").change(function(){

         var type = $(this).val();
        //  window.alert(category);
       
        if(type=='General')
         {
          document.getElementById("user_plan").style.display="none";
        }
      else if(type=='Service provider')
        {
          document.getElementById("user_plan").style.display="initial";
        }
        //  window.alert(sub_category);
     });
    });
 
</script>
@endsection
  