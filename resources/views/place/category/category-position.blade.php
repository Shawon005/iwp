@extends('layout.master')
@section('content')
        <!-- Page Sidebar Ends-->

        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Place Category positions</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Place Category positions</li>
                    
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
                    <h5>Change Place Category Positions</h5>
                  </div>
                  <div class="card-body add-post">
                  <div class="container-fluid">
                      
                        <div class=" ui-sortable" id="sortable">
                       
                        @foreach($category as $cat)
                       
                            <li class="shadow p-2 m-3 bg-body col-xl-6"style="list-style: none; border-style: dashed;border-width: thin" id="sort_{{$cat->category_id}}"> <i class="icon-move me-2"></i><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>{{$cat->category_name}}</li>
                        @endforeach
                        </div>
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
        <script src="{{asset('')}}assets/js/jquery.ui.min.js"></script>
        <script src="{{asset('')}}assets/js/dragable/sortable.js"></script>
        <script src="{{asset('')}}assets/js/dragable/sortable-custom.js"></script>

        <script>
    $( function() {
        var ul_sortable = $('#sortable');

        ul_sortable.sortable({
            opacity: 0.325,
            tolerance: 'pointer',
            cursor: 'move',
            update: function(event, ui) {
                var post = ul_sortable.sortable('serialize');

                $.ajax({
                    type: 'GET',
                    url: '/place_category_prosition_store/'+post,
                  
                    dataType: 'json',
                    cache: false,
                    success: function(output) {
                        // alert(output);
                    },
                    error: function(output) {
                        // alert(output);
                    }
                });

            }
        });
        ul_sortable.disableSelection();
    } );
</script>
    @endsection