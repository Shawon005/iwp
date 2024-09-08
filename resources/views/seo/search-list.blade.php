@extends('layout.master')
@section('content')
<div class="page-body">  
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
          <div class="card p-1 container-fluid">
            <div class="page-title">
              <h3 class="text-center" >Search lists</h3>
              <div class="row">
                <div class="col-12 col-sm-6">
                
                  <h4>Initial search lists</h4>
                </div>

                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('search_list_add')}}">ADD NEW</a></li>
              </div>
            </div>
          </div>
          @php $no=1; @endphp   
          <div class="container-fluid table-responsive">
                      <table class="table table-bordered " id="basic-10" style="width: 100%; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Search query</th>
                            <th>Search link</th>
                            <th>Edit</th>
                          </tr>
                        </thead>
                       <tbody>
                       @foreach($listing_category as $user)
                        <tr>   
                           <td>{{$no++}}</td>
                           <td>{{$user->search_title}}</td>
                           <td><a class="btn-sm btn-warning" target="_blank" href="{{$user->search_list_link}}">Preview</a></td>
                           <td> <a class="btn-sm btn-info" href="{{route('all_search_edit',['id'=>$user->search_list_id])}}">Edit </a>
                        </tr>
                        @endforeach
                       </tbody>
                      </table>
                     
                   
                  
                
                        </div>
    
            </div>
            </div>
          </div>
                   
@endsection