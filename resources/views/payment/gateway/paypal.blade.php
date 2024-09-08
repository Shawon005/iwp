@extends('layout.master')
@section('content')  
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>PayPal</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin/dashboard')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">PayPal</li>
                    <li class="breadcrumb-item active">PayPal Details</li>
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
                    <h5>PayPal Details</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row needs-validation" action="{{route('paypal_update')}}" method="post">
                      @csrf
                        <ul>
                            <li>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="admin_paypal_id" value="{{$footer->admin_paypal_id}}" class="form-control" placeholder="Enter your business PayPal id *" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select name="admin_paypal_currency_code" required="required" class="form-control">
                                                <option value="">Select Currency Code</option>
                                                <option value="AUD"{{($footer->admin_paypal_currency_code=='AUD')?"selected":''}}>Australian dollar</option>
                                                <option value="BRL"{{($footer->admin_paypal_currency_code=='BRL')?"selected":''}}>Brazilian real</option>
                                                <option value="CAD"{{($footer->admin_paypal_currency_code=='CAD')?"selected":''}}>Canadian dollar</option>
                                                <option value="CNY"{{($footer->admin_paypal_currency_code=='CNY')?"selected":''}}>Chinese Renmenbi</option>
                                                <option value="CZK"{{($footer->admin_paypal_currency_code=='CZK')?"selected":''}}>Czech koruna</option>
                                                <option value="DKK"{{($footer->admin_paypal_currency_code=='DKK')?"selected":''}}>Danish krone</option>
                                                <option value="EUR"{{($footer->admin_paypal_currency_code=='EUR')?"selected":''}}>Euro</option>
                                                <option value="HKD"{{($footer->admin_paypal_currency_code=='HKD')?"selected":''}}>Hong Kong dollar</option>
                                                <option value="HUF"{{($footer->admin_paypal_currency_code=='HUF')?"selected":''}}>Hungarian forint</option>
                                                <option value="INR"{{($footer->admin_paypal_currency_code=='INR')?"selected":''}}>Indian rupee</option>
                                                <option value="ILS"{{($footer->admin_paypal_currency_code=='ILS')?"selected":''}}>Israeli new shekel</option>
                                                <option value="JPY"{{($footer->admin_paypal_currency_code=='JPY')?"selected":''}}>Japanese yen</option>
                                                <option value="MYR"{{($footer->admin_paypal_currency_code=='MYR')?"selected":''}}>Malaysian ringgit</option>
                                                <option value="MXN"{{($footer->admin_paypal_currency_code=='MXN')?"selected":''}}>Mexican peso</option>
                                                <option value="TWD"{{($footer->admin_paypal_currency_code=='TWD')?"selected":''}}>New Taiwan dollar</option>
                                                <option value="NZD"{{($footer->admin_paypal_currency_code=='NZD')?"selected":''}}>New Zealand dollar</option>
                                                <option value="NOK"{{($footer->admin_paypal_currency_code=='NOK')?"selected":''}}>Norwegian krone</option>
                                                <option value="PHP"{{($footer->admin_paypal_currency_code=='PHP')?"selected":''}}>Philippine peso</option>
                                                <option value="PLN"{{($footer->admin_paypal_currency_code=='PLN')?"selected":''}}>Polish złoty</option>
                                                <option value="GBP"{{($footer->admin_paypal_currency_code=='GBP')?"selected":''}}>Pound sterling</option>
                                                <option value="RUB"{{($footer->admin_paypal_currency_code=='RUB')?"selected":''}}>Russian ruble</option>
                                                <option value="SGD"{{($footer->admin_paypal_currency_code=='SGD')?"selected":''}}>Singapore dollar</option>
                                                <option value="SEK"{{($footer->admin_paypal_currency_code=='SEK')?"selected":''}}>Swedish krona</option>
                                                <option value="CHF"{{($footer->admin_paypal_currency_code=='CHF')?"selected":''}}>Swiss franc</option>
                                                <option value="THB"{{($footer->admin_paypal_currency_code=='THB')?"selected":''}}>Thai baht</option>
                                                <option value="USD"{{($footer->admin_paypal_currency_code=='USD')?"selected":''}}>United States dollar</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select name="admin_paypal_status" required="required" class="form-control">
                                                <option value="">Select status</option>
                                                <option value="Active"{{($footer->admin_paypal_status=='Active')?"selected":''}}>Active
                                                </option>
                                                <option value="InActive"{{($footer->admin_paypal_status=='InActive')?"selected":''}}>InActive
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>  
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