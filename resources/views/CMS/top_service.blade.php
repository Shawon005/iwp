
@extends('layout.master')
@section('content')
<div class="page-body">
          @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <h2>Top Service</h2>
                    @php $no=1;@endphp
                @foreach($top_service as $top)
        <div class="card p-1 container-fluid" >
            <div class="page-title">
              <h3 class="text-center" >Top service providers : Section {{$no++}}</h3>
                <div class="row">
                    <div class="col-12 col-sm-6">
                      <h4>Category: {{name('vv_categories',$top->top_service_provider_category_id)}}</h4>
                    </div>

                    <div class="col-12 col-sm-6">
                       <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{route('top_service_cat_edit',['id'=>$top->top_service_provider_id])}}">Change Category</a></li>
                    </div>
                 </div>
            </div>
         
      
                <div class="container-fluid table-responsive">
                    <table class="table table-bordered  " id="" style="width: 100%; font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>Service providers</th>
                            <th>Clicks</th>
                            <th>Change</th>
                          </tr>
                        </thead>
                       <tbody>
                            @php $n1=1;  
                            $sub=arr($top->top_service_provider_listings);
                            @endphp
                            @foreach($sub as $user)
                            <tr>   
                            <td>{{$n1++}}</td>
                            <td>{{Nam('vv_listings','listing_id',$user,'listing_name')}}</td>
                            <td>{{rand(1,600)}}</td>
                            <td> <a class="btn-sm btn-info" href="{{route('top_service_sub_edit',['id'=>$top->top_service_provider_category_id,'sub'=>$n1])}}">Edit </a>                        
                            </td>
                            </tr>
                            @endforeach
                       </tbody>
                    </table>
                </div>
    
            </div>
            @endforeach
</div>
                   
@endsection