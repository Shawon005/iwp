@extends('layout.master')
@section('content')
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Color Setting</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">All Color</li>
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
                    <h5>Color Options</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" action="{{route('color_setting_update')}}" method="Post"enctype="multipart/form-data">
                      @csrf
                   
                      <table class="responsive-table bordered" id="pg-resu">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Page name</th>
                            <th>Element</th>
                            <th>Default color</th>
                            <th>Hover color</th>
                        </tr>
                        </thead>
                                                <tbody>
                        <tr>
                            <td>1</td>
                            <td>Home</td>
                            <td>Search (button)</td>
                            <td>
                                <div class="form-group">
                                  <input type="color" class="form-control clr-pan" value="{{$color->home_search_btn_default}}">
                                  <input type="text" name="home_search_btn_default" class="form-control clr-cod" placeholder="color code" value="{{$color->home_search_btn_default}}" minlength="7" maxlength="7" required="">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                  <input type="color" class="form-control clr-pan" value="{{$color->home_search_btn_hover}}">
                                  <input type="text" name="home_search_btn_hover" class="form-control clr-cod" placeholder="color code"value="{{$color->home_search_btn_hover}}"  minlength="7" maxlength="7" required="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Home</td>
                            <td>Banner "Explore now" (button)</td>
                            <td>
                                <div class="form-group">
                                  <input type="color" class="form-control clr-pan" value="{{$color->home_banner_btn_default}}">
                                  <input type="text" name="home_banner_btn_default" class="form-control clr-cod" placeholder="color code"value="{{$color->home_banner_btn_default}}" minlength="7" maxlength="7" required="">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                  <input type="color" class="form-control clr-pan" value="{{$color->home_banner_btn_hover}}">
                                  <input type="text" name="home_banner_btn_hover" class="form-control clr-cod" placeholder="color code" value="{{$color->home_banner_btn_hover}}"  minlength="7" maxlength="7" required="">
                                </div>
                            </td>
                        </tr>
                            <tr>
                            <td>3</td>
                            <td>Home</td>
                            <td>"View all services" (button)</td>
                            <td>
                                <div class="form-group">
                                  <input type="color" class="form-control clr-pan" value="{{$color->home_view_all_btn_default}}">
                                  <input type="text" name="home_view_all_btn_default" class="form-control clr-cod" placeholder="color code" value="{{$color->home_view_all_btn_default}}"  minlength="7" maxlength="7" required="">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                  <input type="color" class="form-control clr-pan" value="{{$color->home_view_all_btn_hover}}">
                                  <input type="text" name="home_view_all_btn_hover" class="form-control clr-cod" placeholder="color code" value="{{$color->home_view_all_btn_hover}}"  minlength="7" maxlength="7" required="">
                                </div>
                            </td>
                        </tr>
                            <tr>
                            <td>4</td>
                            <td>Common</td>
                            <td>"Help &amp; Support" (button)</td>
                            <td>
                                <div class="form-group">
                                  <input type="color" class="form-control clr-pan" value="{{$color->common_help_support_btn_default}}">
                                  <input type="text" name="common_help_support_btn_default" class="form-control clr-cod" placeholder="color code" value="{{$color->common_help_support_btn_default}}" minlength="7" maxlength="7" required="">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                  <input type="color" class="form-control clr-pan" value="{{$color->common_help_support_btn_hover}}">
                                  <input type="text" name="common_help_support_btn_hover" class="form-control clr-cod" placeholder="color code" minlength="7" value="{{$color->common_help_support_btn_hover}}" maxlength="7" required="">
                                </div>
                            </td>
                        </tr>
                           <tr>
                            <td>5</td>
                            <td>Home</td>
                            <td>"Submit Requirements" (button)</td>
                            <td>
                                <div class="form-group">
                                  <input type="color" class="form-control clr-pan" value="{{$color->home_submit_req_btn_default}}">
                                  <input type="text" name="home_submit_req_btn_default" class="form-control clr-cod" placeholder="color code" value="{{$color->home_submit_req_btn_default}}"  minlength="7" maxlength="7" required="">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                  <input type="color" class="form-control clr-pan" value="{{$color->home_submit_req_btn_hover}}">
                                  <input type="text" name="home_submit_req_btn_hover" class="form-control clr-cod" placeholder="color code" value="{{$color->home_submit_req_btn_hover}}"  minlength="7" maxlength="7" required="">
                                </div>
                            </td>
                        </tr>
                           <tr>
                            <td>6</td>
                            <td>Common</td>
                            <td>Blue color(button)</td>
                            <td>
                                <div class="form-group">
                                  <input type="color" class="form-control clr-pan" value="{{$color->common_blue_btn}}">
                                  <input type="text" name="common_blue_btn" class="form-control clr-cod" placeholder="color code" value="{{$color->common_blue_btn}}"  minlength="7" maxlength="7" required="">
                                </div>
                            </td>
                        </tr>
                           <tr>
                            <td>7</td>
                            <td>Common</td>
                            <td>Blue light color(button)</td>
                            <td>
                                <div class="form-group">
                                  <input type="color" class="form-control clr-pan" value="{{$color->common_light_blue_btn}}">
                                  <input type="text" name="common_light_blue_btn" class="form-control clr-cod" placeholder="color code" value="{{$color->common_light_blue_btn}}"  minlength="7" maxlength="7" required="">
                                </div>
                            </td>
                        </tr>
                           <tr>
                            <td>8</td>
                            <td>Common</td>
                            <td>Red color(button)</td>
                            <td>
                                <div class="form-group">
                                  <input type="color" class="form-control clr-pan" value="#f44336">
                                  <input type="text" name="common_red_btn" class="form-control clr-cod" placeholder="color code"value="{{$color->common_red_btn}}"  minlength="7" maxlength="7" required="">
                                </div>
                            </td>
                        </tr>
                           <tr>
                            <td>9</td>
                            <td>Common</td>
                            <td>Red dark color(button)</td>
                            <td>
                                <div class="form-group">
                                  <input type="color" class="form-control clr-pan" value="{{$color->common_dark_red_btn}}">
                                  <input type="text" name="common_dark_red_btn" class="form-control clr-cod" placeholder="color code" value="{{$color->common_dark_red_btn}}"  minlength="7" maxlength="7" required="">
                                </div>
                            </td>
                        </tr>
                           <tr>
                            <td>10</td>
                            <td>Common</td>
                            <td>Yellow color(bottom band)</td>
                            <td>
                                <div class="form-group">
                                  <input type="color" class="form-control clr-pan" value="{{$color->common_yellow_bottom_band}}">
                                  <input type="text" name="common_yellow_bottom_band" class="form-control clr-cod" placeholder="color code"value="{{$color->common_yellow_bottom_band}}"  minlength="7" maxlength="7" required="">
                                </div>
                            </td>
                        </tr>
                           <tr>
                            <td>11</td>
                            <td>Common</td>
                            <td>Yellow-1 color(bottom band)</td>
                            <td>
                                <div class="form-group">
                                  <input type="color" class="form-control clr-pan" value="{{$color->common_yellow_1_bottom_band}}">
                                  <input type="text" name="common_yellow_1_bottom_band" class="form-control clr-cod" placeholder="color code"value="{{$color->common_yellow_1_bottom_band}}" minlength="7" maxlength="7" required="">
                                </div>
                            </td>
                        </tr>
                          <tr>
                            <td>12</td>
                            <td>Common</td>
                            <td>Yellow-2 color(button)</td>
                            <td>
                                <div class="form-group">
                                  <input type="color" class="form-control clr-pan" value="{{$color->common_yellow_2_btn}}">
                                  <input type="text" name="common_yellow_2_btn" class="form-control clr-cod" placeholder="color code" value="{{$color->common_yellow_2_btn}}" minlength="7" maxlength="7" required="">
                                </div>
                            </td>
                        </tr>
                           <tr>
                            <td>13</td>
                            <td>Common</td>
                            <td>Gray color</td>
                            <td>
                                <div class="form-group">
                                  <input type="color" class="form-control clr-pan" value="{{$color->common_gray_color}}">
                                  <input type="text" name="common_gray_color" class="form-control clr-cod" placeholder="color code" value="{{$color->common_gray_color}}"  minlength="7" maxlength="7" required="">
                                </div>
                            </td>
                        </tr>
                           <tr>
                            <td>14</td>
                            <td>Common</td>
                            <td>Green color</td>
                            <td>
                                <div class="form-group">
                                  <input type="color" class="form-control clr-pan" value="{{$color->common_green_color}}">
                                  <input type="text" name="common_green_color" class="form-control clr-cod" placeholder="color code" value="{{$color->common_green_color}}" minlength="7" maxlength="7" required="">
                                </div>
                            </td>
                        </tr>
                           <tr>
                            <td>15</td>
                            <td>Common</td>
                            <td>Green light color</td>
                            <td>
                                <div class="form-group">
                                  <input type="color" class="form-control clr-pan" value="#7dc34a">
                                  <input type="text" name="common_light_green_color" class="form-control clr-cod" placeholder="color code" value="{{$color->common_light_green_color}}"  minlength="7" maxlength="7" required="">
                                </div>
                            </td>
                        </tr>
                           <tr>
                            <td>16</td>
                            <td>Job</td>
                            <td>Blue color</td>
                            <td>
                                <div class="form-group">
                                  <input type="color" class="form-control clr-pan" value="{{$color->job_blue_color}}">
                                  <input type="text" name="job_blue_color" class="form-control clr-cod" placeholder="color code" value="{{$color->job_blue_color}}"  minlength="7" maxlength="7" required="">
                                </div>
                            </td>
                        </tr>
                           <tr>
                            <td>17</td>
                            <td>Job</td>
                            <td>Orange color</td>
                            <td>
                                <div class="form-group">
                                  <input type="color" class="form-control clr-pan" value="{{$color->job_orange_color}}">
                                  <input type="text" name="job_orange_color" class="form-control clr-cod" placeholder="color code" value="{{$color->job_orange_color}}"  minlength="7" maxlength="7" required="">
                                </div>
                            </td>
                        </tr>
                            <tr>
                                <td colspan="2">
                                 
                                </td>
                                <td colspan="3">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                        <div class="btn-showcase mt-3">
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
 @endsection
 @section('js')
<script>
$(document).ready(function(){
    $('.clr-pan').on('input', function() {
        $(this).siblings('.clr-cod').val(this.value);
    });
    $('.clr-cod').on('input', function() {
      $(this).siblings('.clr-pan').val(this.value);
    });
});
</script>


 @endsection