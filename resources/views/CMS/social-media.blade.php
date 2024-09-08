@extends('layout.master')
@section('content')
<style>
    
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}
</style>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Others</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Sub admin</li>
                    <li class="breadcrumb-item active">Create Sub admin</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-8 m-auto">
                <div class="card">
                  <div class="card-header pb-0">
                    <h5>Sub admin details</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation"action=""method="POST" novalidate="">
                      @csrf
                    <div class="col-sm-12 m-auto">
                        <hr>
                        <div class="row">
                          <div class="col-sm-8">
                            <div class="mt-2">
                              <label for="city_name">Facebook</label>
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="mb-1">    
                                <div class="media-body switch-sm icon-state">
                                    <label class="switch">
                                    <input type="checkbox" onclick="change()" {{($admin->admin_share_facebook==1)?"checked":''}} id="facebook" value=1><span class="switch-state"></span>
                                    </label>
                                </div>
                          </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-8">
                            <div class="mt-2">
                              <label for="city_name">Twitter</label>
                            </div>
                          </div>
                          <div class="col-sm-2">
                                <div class="mb-1">                         
                                    <div class="media-body switch-sm icon-state">
                                        <label class="switch">
                                         <input type="checkbox" onclick="Twitter1()" {{($admin->admin_share_twitter==1)?"checked":''}} id="Twitter" value=1><span class="switch-state"></span>
                                        </label>
                                    </div>
                                </div>    
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-8">
                            <div class="mt-2">
                              <label for="city_name">WhatsApp</label>
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="mb-1">
                            <div class="media-body switch-sm icon-state">
                            <label class="switch">
                              <input type="checkbox" onclick="WhatsApp1()"{{($admin->admin_share_whatsapp==1)?"checked":''}}  id="WhatsApp" value=1><span class="switch-state"></span>
                            </label>
                            </div>    
                          </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-8">
                            <div class="mt-2">
                              <label for="city_name">LinkedIn</label>
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="mb-1">
                            <div class="media-body switch-sm icon-state">
                            <label class="switch">
                              <input type="checkbox" onclick="LinkedIn1()" {{($admin->admin_share_linkedin==1)?"checked":''}} id="LinkedIn" value=1><span class="switch-state"></span>
                            </label>
                            </div>    
                          </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-8">
                            <div class="mt-2">
                              <label for="city_name">Pinterest</label>
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="mb-1">
                            <div class="media-body switch-sm icon-state">
                            <label class="switch">
                              <input type="checkbox" onclick="Pinterest1()" {{($admin->admin_share_pinterest==1)?"checked":''}}  id="Pinterest" value=1><span class="switch-state"></span>
                            </label>
                            </div>    
                          </div>
                          </div>
                        </div>
                        <hr>                                          
                      </div>
                    <!-- </div> -->
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
 @endsection;
 @section('js')
 <script>
    function change()
    {
        
        facebook=document.getElementById("facebook").value;
        //  window.alert(category);
         if(facebook ==1){
            
            facebook=1;
            $.ajax({
             url:"/facebook/"+facebook,
             type:"GET",
         });
         }
        //  window.alert(sub_category);
    }
    function Twitter1()
    {
        facebook=document.getElementById("Twitter").value;
        //  window.alert(category);
         if(facebook ==1){
            
            facebook=1;
            $.ajax({
             url:"/Twitter/"+facebook,
             type:"GET",
         });
         }

        //  window.alert(sub_category);
    }
    function WhatsApp1()
    {
        facebook=document.getElementById("WhatsApp").value;
        //  window.alert(category);
         if(facebook ==1){
            
            facebook=1;
            $.ajax({
             url:"/WhatsApp/"+facebook,
             type:"GET",
         });
         }
        //  window.alert(sub_category);
    }
    function LinkedIn1()
    {
        facebook=document.getElementById("LinkedIn").value;
        //  window.alert(category);
         if(facebook ==1){
            
            facebook=1;
            $.ajax({
             url:"/LinkedIn/"+facebook,
             type:"GET",
         });
         }
   
        //  window.alert(sub_category);
    }
    function Pinterest1()
    {
        facebook=document.getElementById("Pinterest").value;
        //  window.alert(category);
         if(facebook ==1){
            
            facebook=1;
            $.ajax({
             url:"/Pinterest/"+facebook,
             type:"GET",
         });
         }
  
        //  window.alert(sub_category);
    }

 </script>
 @endsection