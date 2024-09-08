@extends('layout.master')
@section('content')
<style>
    .pdf-main .head {
  background: #233d47;
  padding: 15px 50px;
    }
    .pdf-main {
  background: #fff;
  width: 58%;
  margin: 0 auto;
  display: table;
}
.pdf-main .head h2 {
  text-align: center;
  color: #fff;
  font-weight: 600;
  font-size: 20px;
  margin: 0;
}
</style>
<div class="page-body">
    <div class="p-2">
        <h2>Invoice</h2>
    </div>
<section class="">
    <div class="ad-com">
        <div class="ad-dash leftpadd">
            <div class="ud-cen">
                <div class="log-bor">&nbsp;</div>
                <span class="udb-inst "><h2 class="card text-center mb-4">Create Invoices</h2></span>
                <div class="ud-cen-s2 add-list">
                    <div class="card p-3 col-12 mx-auto"id="content2" contenteditable="">
                        <div class=" pdf-main ">
                            <div class="inn">
                                <div class="head">
                                    <h2>Premium Plus - Invoice</h2>
                                </div>
                                <div class="con">
                                    <p>Your are the golden member of the worlds No:1 business directory portal
                                        website.</p>
                                    <table class="table table-hover">
                                        <tbody>
                                        <tr>
                                            <td>User</td>
                                            <td>:</td>
                                            <td>Andriya jue</td>
                                        </tr>
                                        <tr>
                                            <td>Plan type</td>
                                            <td>:</td>
                                            <td>Premium Plus</td>
                                        </tr>
                                        <tr>
                                            <td>Amount paid</td>
                                            <td>:</td>
                                            <td>Rs: 250</td>
                                        </tr>
                                        <tr>
                                            <td>Email id</td>
                                            <td>:</td>
                                            <td>andriya@business.com</td>
                                        </tr>
                                        <tr>
                                            <td>Payment type</td>
                                            <td>:</td>
                                            <td>Cash on delivery</td>
                                        </tr>
                                        <tr>
                                            <td>Profile</td>
                                            <td>:</td>
                                            <td>www.businessdire.com/profile/andriya</td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>:</td>
                                            <td>28800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A.</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="but">
                                    <p>Your are the golden member of worlds No:1 business directory portal website.</p>
                                </div>
                                <div class="foot">
                                    <p>Thank you for a member of Fototech India Magazine & Portal</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2 col-4 mx-auto">
                      <button class="btn-mpdf btn btn-warning" id="downloadPDF" ><a href="{{route('pdf')}}">Click to Download PDF</a></button>
                    </div>
                   
                    <div class="ud-notes alert alert-info mt-5">
                        <p><b>Notes:</b> Hi, here you can able to edit all text and title also. You just click the text
                            and change it and click "Click to download pdf" button to generate your invoice.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
@endsection