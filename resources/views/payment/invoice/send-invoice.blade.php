@extends('layout.master')
@section('content')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Send Invoice</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    
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
                    <h5>Add New Brand</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" action="{{route('send_invoice_store')}}" method="post"enctype="multipart/form-data">
                      @csrf
                      <div class="col-sm-12">
                        <div class="mb-3">
                           <select class="js-example-placeholder-multiple col-sm-12"name="user_id" required="">
                                 @foreach($users as $user):
                                 <option value="{{$user->user_id}}" >{{$user->first_name}}</option>
                                 @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                           <select class="js-example-placeholder-multiple col-sm-12"name="plan_id" required="">
                                 @foreach($plan as $user):
                                 <option value="{{$user->plan_type_id}}" >{{$user->plan_type_name}}</option>
                                 @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                        <input class="form-control" id="" type="number" name="amount" placeholder="Invoice Amount*" required="">
                        </div>
                        <div class="mb-3">
                         <label for="">Choose Invoice</label>
                        <input class="form-control" id="" type="file" name="file" placeholder="Invoice Amount*" required="">
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
