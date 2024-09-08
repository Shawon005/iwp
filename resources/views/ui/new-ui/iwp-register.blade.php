@extends('main.master')
@section('content')
<?php
use Illuminate\Support\Facades\URL;
// session(['price' => 0]);
?>
 
    <meta name="google-signin-client_id" content="1010571321784-a386vnv1k7388h1usp3ilq5me6fkd013.apps.googleusercontent.com">
    <script src="../apis.google.com/js/platform.js" async defer></script>
    <script>
        /**
         * Handler for the signin callback triggered after the user selects an account.
         */
        function onSignInCallback(resp) {
            gapi.client.load('plus', 'v1', apiClientLoaded);
        }

        /**
         * Sets up an API call after the Google API client loads.
         */
        function apiClientLoaded() {
            gapi.client.plus.people.get({userId: 'me'}).execute(handleEmailResponse);
        }

        /**
         * Response callback for when the API client receives a response.
         *
         * @param resp The API response object with the user email and profile information.
         */
        function handleEmailResponse(resp) {
            var primaryEmail;
            for (var i=0; i < resp.emails.length; i++) {
                if (resp.emails[i].type === 'account') primaryEmail = resp.emails[i].value;
            }

            $.ajax({
                type: 'POST',
                url: 'google_login.php',
                cache: false,
                data: {gp_details: resp},
                success: function (response) {
                if(response=='1'){
                    signOut();
                    window.location.reload("index-2.html");
                }else{
                    signOut();
                    window.location.reload("index-2.html");
                }


            }
            });
    //        document.getElementById('responseContainer').value = 'Primary email: ' +
    //            primaryEmail + '\n\nFull Response:\n' + JSON.stringify(resp);
        }
       

        function onSignIn(googleUser) {
            var profile = googleUser.getBasicProfile();
            console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
            console.log('Name: ' + profile.getName());
            console.log('Image URL: ' + profile.getImageUrl());
            console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.

            $.ajax({
                type: 'POST',
                url: 'google_login.php',
                cache: false,
                data: {gp_details: profile.getId(),name:profile.getName(),email:profile.getEmail()},
                success: function (response) {
                if(response=='1'){
                    signOut();
                    window.location.reload("index-2.html");
                }else{
                    signOut();
                    window.location.reload("index-2.html");
                }


            }
            });

        }
    </script>
    <script>
        function signOut() {
            var auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then(function () {
                console.log('User signed out.');
            });

        }
    </script>
    <!-- START -->
    <!--PRICING DETAILS-->
    <section class=" login-reg" >
            <div class="row">
                <div class="login-main">
                    <div class="log-bor">&nbsp;</div>
                    <div class="log log-2">
                        <div class="login login-new" >
                            <h4>Member Login</h4>
                            <form id="login_form" name="login_form" method="post" action="http://iwpdirectory.in/login_check.php">
                               
                                                            <div class="form-group">
                                    <input type="number" autocomplete="off" name="mobile_number" id="mobile_number"
                                           class="form-control" placeholder="Phone number *"
                                           title="Enter Phone Number" value="" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control"
                                           placeholder="Enter password*" required
                                           value="">
                                </div>
                                <button type="submit" name="login_submit" value="submit"
                                        class="btn btn-primary">Sign in                            </button>
                            </form>

                            <!-- SOCIAL MEDIA LOGIN -->
                            <div class="soc-log">
                                <ul>
                                    <li>
                                        <div class="g-signin2" data-onsuccess="onSignIn"></div>

                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" onclick="fbLogin();" class="login-fb"><img
                                                src="{{asset('')}}frontend/images/icon/facebook.png"> Continue with Facebook                                    </a>
                                    </li>

                                </ul>
                            </div>
                            <!-- END SOCIAL MEDIA LOGIN -->
                        </div>
                    </div>
                    <div class="log log-1">
                        <div class="login login-new">
                                   <h4>Create an account</h4>
                            <p>Don't have an account? Create your account. It's take less then a minutes</p>
                            <form name="register_form" id="register_form" method="post" action="{{route('user_register')}}">
                                @csrf

                                <input type="hidden" autocomplete="off" name="trap_box" id="trap_box" class="validate">
                                <input type="hidden" autocomplete="off" name="verifiedu" id="verifiedu">

                                <input type="hidden" autocomplete="off" name="mode_path" value="XeFrOnT_MoDeX_PATHXHU"
                                       id="mode_path" class="validate">

                                <div class="form-group">
                                    <input type="text" autocomplete="off" name="first_name" id="first_name"
                                           class="form-control" placeholder="Name*" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" onkeypress="return isNumber(event)" autocomplete="off"
                                           name="mobile_number" id="reg_mobile_number" class="form-control"
                                           placeholder="Phone*" required="required">
                                           @error('mobile_number')
                                            <span class="small text-danger">{{$message}}</span>
                                            @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control"
                                           placeholder="Password**" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="email" autocomplete="off" name="email_id" id="reg_email_id"
                                           class="form-control" placeholder="Email id*"
                                           required="required">
                                           @error('email_id')
                                            <span class="small text-danger">{{$message}}</span>
                                            @enderror
                                </div>
                                
                                <div class="form-group">
                                    <select class="form-control" id="state" name="state" required>
                                        <option value="">Select State*</option>
                                        @foreach($state as $cat)
                                        <option value="{{$cat->state_id}}">{{$cat->state_name}}</option>
                                        @endforeach
                                    </select>
                                    <!-- <input type="text" autocomplete="off" name="state" id="state" class="form-control" placeholder="State*" required> -->
                                </div>

                                <div class="form-group">
                                    <select class="form-control" id="city" name="city" required="required">
                                        <option value="">Select City*</option>
                                        @foreach($city as $cat)
                                        <option value="{{$cat->city_id}}">{{$cat->city_name}}</option>
                                        @endforeach
                                    </select>
                                    <!-- <input type="text" autocomplete="off" name="city" id="city" class="form-control" placeholder="City*" required> -->
                                </div>

                                                            
                                
                                <div class="form-group ca-sh-user">
                                    <select name="user_type" id="user_type" class="form-control ca-check-plan"required="required">
                                        <option value="">User type</option>
                                        <option value="General">General user</option>
                                        <option
                                            value="Service provider">Service provider</option>
                                    </select>
                                    <!-- <a href="user-type.html" class="frmtip"
                                       target="_blank">User options</a> -->
                                </div>
                                
                                <div class="form-group ca-sh-plan">
                                    <select name="user_plan" id="user_plan" class="form-control">
                                        <option value="" disabled="disabled"
                                                selected="selected">Choose your plan</option>
                                                @foreach($plan as $user):
                                                <option value="{{$user->plan_type_id}}" >{{$user->plan_type_name}}-{{$user->plan_type_price}}/Year</option>
                                                @endforeach
                                                                            </select>
                                    <a href="{{route('pricing-details')}}" class="frmtip" target="_blank">Plan details</a>
                                                    
                                </div>
                                <!-- {{session('price')}} -->
                             
                               
                               
                                <div class="form-group d-flex" id="verificationBlock"name="verificationBlock">
                                <input type="text" autocomplete="off" name="code" id="code" class="form-control" placeholder="Verification Code*" required>
                                <button type="button" class="btn btn-primary btn-sm" id="send_code" onclick="sendVerificationCode()">Send</button>
                                <button type="button" class="btn btn-primary btn-sm d-none" id="check_code" onclick="checkVerificationCode()">Verify</button>
                                
                            </div>
                            <div class="form-group text-success d-none" id="verified" name="verified">Verified.</div>
                            
                                <button type="submit"  name="register_submit" id="register_submit"
                                    class="btn btn-primary">Register Now</button>
                                   
                                  
                                      
                            </form>
                            <!-- SOCIAL MEDIA LOGIN -->
                            <div class="soc-log">
                                <ul>
                                    <li>
                                        <div class="g-signin2" data-onsuccess="onSignIn"></div>

                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" onclick="fbLogin();" class="login-fb"><img
                                                src="{{asset('')}}frontend/images/icon/facebook.png"> Continue with Facebook                                            </a>
                                    </li>
                                        
                                </ul>
                            </div>
                            <!-- END SOCIAL MEDIA LOGIN -->
                        </div>
                    </div>
                    <div class="log log-3">
                        <div class="login login-new">
                            <h4>Forgot password</h4>
                            <form id="forget_form" name="forget_form" method="post" action="{{route('forget_password')}}">
                                @csrf
                                <div class="form-group">
                                    <input type="email" autocomplete="off" name="email_id" id="email_id"
                                           class="form-control" placeholder="Enter email*"
                                           pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$"
                                           title="Invalid email address" required>
                                </div>
                                <button type="submit" name="forgot_submit"
                                        class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="log-bot">
                        <ul>
                        <li>
                                <span class="ll-1">Create an account?</span>
                            </li>
                            <li>
                                <span class="ll-3">Forgot password?</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END PRICING DETAILS-->


    <section>
        <div class="pop-ups pop-quo">
            <!-- The Modal -->
            <div class="modal fade" id="quote">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <!-- Modal Header -->
                        <div class="quote-pop">
                            <h4>Get quote</h4>
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                           placeholder="Enter name*" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control"
                                           placeholder="Enter email*"
                                           pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$"
                                           title="Invalid email address" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                           placeholder="Enter mobile number *"
                                           pattern="[7-9]{1}[0-9]{9}"
                                           title="Phone number starting with 7-9 and remaining 9 digit with 0-9" required>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="3"
                                              placeholder="Enter your query or message"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- START -->

    <!-- END -->

    <!-- START -->
  
    <!-- END -->

@endsection
@section('js')

    <script>
           window.fbAsyncInit = function() {
        // FB JavaScript SDK configuration and setup
        FB.init({
            appId      : {{Nam('vv_footer','footer_id',1,'admin_facebook_app_id')}}, // FB App ID
            cookie     : true,  // enable cookies to allow the server to access the session
            xfbml      : true,  // parse social plugins on this page
            version    : 'v3.2' // use graph api version 2.8
        });
      
        // Check whether the user already logged in
        FB.getLoginStatus(function(response) {
            if (response.status === 'connected') {
                console.log("connected");
                //display user data
                getFbUserData();
            }
        });
    };

    // Load the JavaScript SDK asynchronously
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    // Facebook login with JavaScript SDK
    function fbLogin() {
        FB.login(function (response) {
            if (response.authResponse) {
                // Get and display the user profile data
                alert('LOGIN');
                console.log(response.authResponse);
                getFbUserData();
                alert('LOGIN-GET DATA');
            } else {
                alert('NOT-LOGIN');
                console.log(response);
                document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
            }
        }, {scope: 'email'});
    }

    // Fetch the user profile data from facebook
    function getFbUserData(){
        FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture'},
            function (response) {
                // Save user data
                saveUserData(response);
                
                if(response.email !== null){
                    fbLogout();
                    window.location.href = 'dashboard';
                }else{
                    fbLogout();
                    <?php //$_SESSION['status_msg'] = $BIZBOOK['OOPS_SOMETHING_WENT_WRONG']; ?>
                    window.location.href = 'login';
                }

            });
    }

    // Logout from facebook
    function fbLogout() {
        FB.logout(function() {
//            document.getElementById('fbLink').setAttribute("onclick","fbLogin()");
//            document.getElementById('fbLink').innerHTML = '<img src="images/fb-login-btn.png"/>';
//            document.getElementById('userData').innerHTML = '';
//            document.getElementById('status').innerHTML = '<p>You have successfully logout from Facebook.</p>';
        });
    }

    // Save user data to the database
    function saveUserData(userData){
        $.ajax({
            type: 'POST',
            url: '/fblogin',
            cache: false,
            data: {oauth_provider:'facebook',userData: JSON.stringify(userData)},
            success: function (response) {
//                alert(response);
                return true;
            }
        });
    }
        function checkVerificationCode(){
            var code = $("#code").val(); 
            if(code == ''){
                alert('Please enter verification code.');return false;
            }
            event.preventDefault();
            $.ajax({
                url: '/verifyEmail/'+code,
                method: "GET",
                dataType:'json',
                beforeSend: function(){
                    $("#paymentButton").text('Processing...');
                    
                },
                success: function (response) {
                    if (response == 'success') {
                        $("#register_submit").attr('disabled',false);
                        $("#verificationBlock").removeClass('d-flex');
                        $("#verificationBlock").addClass('d-none');
                        $("#verified").removeClass('d-none');
                    }else{
        				//alert(response.message);
                    }
                },
                error: function(data) {
                        var errors = $.parseJSON(data.responseText);
                        var html = '<ul>';
                        html += '<li>'+ errors.message +'</li>';
                        $.each(errors.errors, function (key, val) {
                            html += '<li>'+ val +'</li>';
                        });
                        html += '</ul>';
                    Message.add(html, {type: 'error',sticky: true});
                },
            });    
        }
        function sendVerificationCode(){
            var email_id = $("#reg_email_id").val(); 
            var mobile_number = $("#reg_mobile_number").val();
            if(email_id == '' ||  mobile_number == ''){
                alert('Email Id & Password is required to send OTP.');return false;
            }
            event.preventDefault();
            $.ajax({
                url: '/email/'+email_id,
                method: "GET",
                
                dataType:'json',
                beforeSend: function(){
                    $("#paymentButton").text('Processing...');
                    $("#paymentButton").attr('disabled',true);
                },
                success: function (response) {
                    if (response == 'success') {
                        $("#check_code").removeClass('d-none');
                        $("#send_code").addClass('d-none');
                        
                    }else{
        				//alert(response.m);
                    }
                },
                error: function(data) {
                        var errors = $.parseJSON(data.responseText);
                        var html = '<ul>';
                        html += '<li>'+ errors.message +'</li>';
                        $.each(errors.errors, function (key, val) {
                            html += '<li>'+ val +'</li>';
                        });
                        html += '</ul>';
                    Message.add(html, {type: 'error',sticky: true});
                },
            });
        }

        $(document).ready(function() {
            $("#register_submit").attr('disabled',true);
            // $("#country").on('change', function() {
            //     var countryid = $(this).val();

            //     $.ajax({
            //         method: "POST",
            //         url: "response.php",
            //         data: {
            //             id: countryid
            //         },
            //         datatype: "html",
            //         success: function(data) {
            //             $("#state").html(data);
            //             $("#city").html('<option value="">Select city</option');

            //         }
            //     });
            // });
            // $("#state").on('change', function() {
            //     var stateid = $(this).val();
            //     $.ajax({
            //         method: "POST",
            //         url: "city_populate.php",
            //         data: {
            //             sid: stateid
            //         },
            //         datatype: "html",
            //         success: function(data) {
            //             $("#city").html(data);

            //         }

            //     });
            // });
                 
            $("#state").change(function(){

            var state = $(this).val();
            //window.alert(sub_category);
            if(state == ""){
                $("#city").html("<option value=''>Select city</option>");
            }

            $.ajax({
                url:"/get-listing2/"+state,
                type:"GET",
                success:function(data){

                    var city = data.city;
                // window.alert(child_category.lenght);
                    var html = "<option value=''>Select city</option>";
                    for(let i =0;i<city.length;i++){
                        html += `
                        <option value="`+city[i]['city_id']+`">`+city[i]['city_name']+`</option>
                        `;
                    }
                    $("#city").html(html);
                }
            });

            });
            $("#user_plan").on('change', function() {
                var plan_id = $(this).val();
                $.ajax({
                    method: "GET",
                    url: "/user_payment/"+plan_id,
                    success: function(data) {
                        

                    }
                   
                });
               
            });
           
       
        });
    </script>
@endsection