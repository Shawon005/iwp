@extends('layout.master')
@section('content')
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Job Skill Set</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Job Skill Set</li>
                    <li class="breadcrumb-item active">Add Job Skill Set</li>
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
                    <h5>Add New Job Skill Set</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" action="{{route('job_skill_store')}}"method="post">
                     @csrf
                    <div class="col-sm-12">
                        <div class="mb-3">
                          <label for="skill_set_name">Skill Set Name</label>
                          <input class="form-control" id="skill_set_name" type="text" name="skill_name" placeholder="Skill set name*" required="">
                          <div class="valid-feedback">Looks good!</div>
                          @error('skill_name')
                            <span class="small text-danger">{{$message}}</span>
                            @enderror
                        </div>
                      </div>
                      <button class="btn btn-primary" type="submit">Submit</button>
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
        <!-- footer start-->
@endsection