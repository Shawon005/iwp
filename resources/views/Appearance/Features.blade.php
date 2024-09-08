@extends('layout.master')
@section('content')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
        @if(session('message'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Features Enable & Disable</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Appearance</li>
                    <li class="breadcrumb-item active">Features Enable & Disable</li>
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
                    <h5>Features Enable & Disable</h5>
                  </div>
                  <div class="card-body add-post">
                  <div class="container-fluid ">
                      <table class="table  " id="" style="width: 100%;  font-size:12px;white-space: nowrap; ">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>Features</th>
                            <th>Page</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                       <tbody>
                        <tr>  
                           <td>1</td>
                           <td>Mobile App</td>
                           <td>Home Page</td>
                           <td>
                              <div class="media-body switch-sm icon-state">
                                <label class="switch">
                                    <input type="checkbox" onclick="mobile()" {{($setting->admin_mobile_app_feature==1)?"checked":''}} id="mobile_f" value=1><span class="switch-state"></span>
                                </label>
                              </div>
                           </td>
                        </tr>
                        <tr>  
                           <td>2</td>
                           <td>Get in touch(footer)</td>
                           <td>All Page</td>
                           <td>
                              <div class="media-body switch-sm icon-state">
                                <label class="switch">
                                    <input type="checkbox" onclick="touch()" {{($setting->admin_get_in_touch_feature==1)?"checked":''}} id="touch_f" value=1><span class="switch-state"></span>
                                </label>
                              </div>
                           </td>
                        </tr>
                        <tr>  
                           <td>3</td>
                           <td>Download Free Mobile Apps(footer)</td>
                           <td>All Page</td>
                           <td>
                              <div class="media-body switch-sm icon-state">
                                <label class="switch">
                                    <input type="checkbox" onclick="m_footer()" {{($setting->admin_footer_mobile_app_feature==1)?"checked":''}} id="m_footer_f" value=1><span class="switch-state"></span>
                                </label>
                              </div>
                           </td>
                        </tr>
                        <tr>  
                           <td>4</td>
                           <td>Country list(footer)</td>
                           <td>All Page</td>
                           <td>
                              <div class="media-body switch-sm icon-state">
                                <label class="switch">
                                    <input type="checkbox" onclick="country()" {{($setting->admin_country_list_feature==1)?"checked":''}} id="country_f" value=1><span class="switch-state"></span>
                                </label>
                              </div>
                           </td>
                        </tr>
                       </tbody>
                      </table>
                     
                   
                  
                
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
    function mobile()
    {
        
        feature=document.getElementById("mobile_f").value;
        //  window.alert(category);
         if(feature ==1){
            
            feature=1;
            $.ajax({
             url:"/admin/mobile/"+feature,
             type:"GET",
         });
         }
        //  window.alert(sub_category);
    }
    function touch()
    {
        
        feature=document.getElementById("touch_f").value;
        //  window.alert(category);
         if(feature ==1){
            
            feature=1;
            $.ajax({
             url:"/admin/touch/"+feature,
             type:"GET",
         });
         }
        //  window.alert(sub_category);
    }
    function m_footer()
    {
        
        feature=document.getElementById("m_footer_f").value;
        //  window.alert(category);
         if(feature ==1){
            
            feature=1;
            $.ajax({
             url:"/admin/m_footer/"+feature,
             type:"GET",
         });
         }
        //  window.alert(sub_category);
    }
    function country()
    {
        
        feature=document.getElementById("country_f").value;
        //  window.alert(category);
         if(feature ==1){
            
            feature=1;
            $.ajax({
             url:"/admin/country/"+feature,
             type:"GET",
         });
         }
        //  window.alert(sub_category);
    }
</script>
@endsection