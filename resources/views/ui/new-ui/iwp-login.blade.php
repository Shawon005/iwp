@extends('main.master')
@section('content')
  
    <!-- END -->
    <script>
  var r= document.getElementById("mobile_number").onload = function() {login(2)};
 
        function login(id)
        {
            alert('hello');
         if(id==2)
         {
            $('.log-1, .log-3').slideUp();
          $('.log-2').slideDown();
         }
        }
        window.fbAsyncInit = function() {
            // FB JavaScript SDK configuration and setup
            FB.init({
                appId      : '196306794765008', // FB App ID
                cookie     : true,  // enable cookies to allow the server to access the session
                xfbml      : true,  // parse social plugins on this page
                version    : 'v3.2' // use graph api version 2.8
            });

            // Check whether the user already logged in
            FB.getLoginStatus(function(response) {
                if (response.status === 'connected') {
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
            js.src = "../connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        // Facebook login with JavaScript SDK
        function fbLogin() {
            FB.login(function (response) {
                if (response.authResponse) {
                    // Get and display the user profile data
                    getFbUserData();
                } else {
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
                        window.location.href = 'index-2.html';
                    }else{
                        fbLogout();
                                            window.location.href = 'login.html';
                    }

                });
        }

        // Logout from facebook
        function fbLogout() {
            FB.logout(function() {
               // document.getElementById('fbLink').setAttribute("onclick","fbLogin()");
               // document.getElementById('fbLink').innerHTML = '<img src="images/fb-login-btn.png"/>';
               // document.getElementById('userData').innerHTML = '';
               // document.getElementById('status').innerHTML = '<p>You have successfully logout from Facebook.</p>';
            });
        }
    </script>
    <script>
        // Save user data to the database
        function saveUserData(userData){
            $.ajax({
                type: 'POST',
                url: 'facebook_login.php',
                cache: false,
                data: {oauth_provider:'facebook',userData: JSON.stringify(userData)},
                success: function (response) {
                   // alert(response);
                    return true;
                }
            });
        }
    </script>
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

    <section class=" login-reg" onload="login(2)">

            <div class="row">
                <div class="login-main">
                    <div class="log-bor">&nbsp;</div>
                    <div class="log log-1">
                        <div class="login login-new" onload="login(2)">
                        @if(session('message'))
                        <div class="alert alert-danger">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message')}}</strong>
                        </div>
                         @endif
                         @if(session('message_S'))
                        <div class="alert alert-success">
                            <span class="close" data-dismiss="alert"></span>
                            <strong>{{session('message_S')}}</strong>
                        </div>
                         @endif
                            <h4>Member Login</h4>
                            <form id="login_form" name="login_form" method="post" action="{{route('user_login')}}">
                                @csrf
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
                                 <button type="submit" name="login_submit" value="submit"class="btn btn-primary">Sign in                            </button>
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
                    <div class="log log-2">
                        <div class="login login-new">
                                   <h4>Create an account</h4>
                            <p>Don't have an account? Create your account. It's take less then a minutes</p>
                            <form name="register_form" id="register_form" method="post" action="http://iwpdirectory.in/register_update.php">

                                <input type="hidden" autocomplete="off" name="trap_box" id="trap_box" class="validate">
                                <input type="hidden" autocomplete="off" name="verified" id="verified">

                                <input type="hidden" autocomplete="off" name="mode_path" value="XeFrOnT_MoDeX_PATHXHU"
                                       id="mode_path" class="validate">

                                <div class="form-group">
                                    <input type="text" autocomplete="off" name="first_name" id="first_name"
                                           class="form-control" placeholder="Name*" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" onkeypress="return isNumber(event)" autocomplete="off"
                                           name="mobile_number" id="reg_mobile_number" class="form-control"
                                           placeholder="Phone*" required>
                                </div>
                                
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control"
                                           placeholder="Password**" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" autocomplete="off" name="email_id" id="reg_email_id"
                                           class="form-control" placeholder="Email id*"
                                           required>
                                </div>
                                
                                <div class="form-group">
                                    <select class="form-control" id="state" name="state" required>
                                        <option value="">Select State*</option>

                                                                                    <option value="20"> Andhra Pradesh</option>
                                                                                    <option value="21"> Arunachal Pradesh</option>
                                                                                    <option value="22"> Assam</option>
                                                                                    <option value="23"> Bihar</option>
                                                                                    <option value="24"> Chhattisgarh</option>
                                                                                    <option value="25"> Goa</option>
                                                                                    <option value="26"> Gujarat</option>
                                                                                    <option value="27"> Haryana</option>
                                                                                    <option value="28"> Himachal Pradesh</option>
                                                                                    <option value="29"> Jharkhand</option>
                                                                                    <option value="30"> Karnataka</option>
                                                                                    <option value="31"> Kerala</option>
                                                                                    <option value="32"> Madhya Pradesh</option>
                                                                                    <option value="33"> Maharashtra</option>
                                                                                    <option value="34"> Manipur</option>
                                                                                    <option value="35"> Meghalaya</option>
                                                                                    <option value="36"> Mizoram</option>
                                                                                    <option value="37"> Nagaland</option>
                                                                                    <option value="38"> Odisha</option>
                                                                                    <option value="39"> Punjab</option>
                                                                                    <option value="40"> Rajasthan</option>
                                                                                    <option value="41"> Sikkim</option>
                                                                                    <option value="42"> Tamil Nadu</option>
                                                                                    <option value="43"> Telangana</option>
                                                                                    <option value="44"> Tripura</option>
                                                                                    <option value="45"> Uttarakhand</option>
                                                                                    <option value="46"> Uttar Pradesh</option>
                                                                                    <option value="47"> West Bengal</option>
                                                                                    <option value="48"> Andaman and Nicobar Islands</option>
                                                                                    <option value="49"> Chandigarh</option>
                                                                                    <option value="50"> Dadra and Nagar Haveli</option>
                                                                                    <option value="51"> Daman & Diu</option>
                                                                                    <option value="52"> Delhi</option>
                                                                                    <option value="53"> Jammu & Kashmir</option>
                                                                                    <option value="54"> Ladakh</option>
                                                                                    <option value="55"> Lakshadweep</option>
                                                                                    <option value="56"> Puducherry</option>
                                                                        </select>
                                    <!-- <input type="text" autocomplete="off" name="state" id="state" class="form-control" placeholder="State*" required> -->
                                </div>

                                <div class="form-group">
                                    <select class="form-control" id="city" name="city" required>
                                        <option value="">Select City*</option>
                                    </select>
                                    <!-- <input type="text" autocomplete="off" name="city" id="city" class="form-control" placeholder="City*" required> -->
                                </div>

                                                            
                                
                                <div class="form-group ca-sh-user">
                                    <select name="user_type" id="user_type" class="form-control ca-check-plan">
                                        <option value="">User type</option>
                                        <option value="General">General user</option>
                                        <option
                                            value="Service provider">Service provider</option>
                                    </select>
                                    <a href="user-type.html" class="frmtip"
                                       target="_blank">User options</a>
                                </div>
                                
                                <div class="form-group ca-sh-plan">
                                    <select name="user_plan" id="user_plan" class="form-control">
                                        <option value="" disabled="disabled"
                                                selected="selected">Choose your plan</option>
                                                                                <option
                                                value="1">Pro Photographer - Rs: 100/year</option>
                                                                                    <option
                                                value="2">Photography Service Providers - Rs: 999/year</option>
                                                                                    <option
                                                value="3">Photography Traders - Rs: 2000/year</option>
                                                                                    <option
                                                value="4">Premium Traders - Rs: 10000/month</option>
                                                                            </select>
                                    <a href="pricing-details.html" class="frmtip" target="_blank">Plan details</a>
                                    
                                </div>
                                
                                <div class="form-group d-flex" id="verificationBlock">
                                    <input type="text" autocomplete="off" name="code" id="code" class="form-control" placeholder="Verification Code*" required>
                                    <button type="button" class="btn btn-primary btn-sm" id="send_code" onclick="sendVerificationCode()">Send</button>
                                    <button type="button" class="btn btn-primary btn-sm d-none" id="check_code" onclick="checkVerificationCode()">Verify</button>
                                </div>
                                
                                <button type="submit" name="register_submit"
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
                                <span class="ll-1">Login?</span>
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
       
        function checkVerificationCode(){
            var code = $("#code").val(); 
            if(code == ''){
                alert('Please enter verification code.');return false;
            }
            event.preventDefault();
            $.ajax({
                url: '/register_update.php',
                method: "POST",
                data: { code : code, register_otp_check : true },
                dataType:'json',
                beforeSend: function(){
                    $("#paymentButton").text('Processing...');
                    $("#paymentButton").attr('disabled',true);
                },
                success: function (response) {
                    if (response.status === 'success') {
                        $("#verified").html('done');
                        $("#verificationBlock").html(response.message);
                    }else{
        				alert(response.message);
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
                url: '/register_update.php',
                method: "POST",
                data: { email_id : email_id,mobile_number : mobile_number, register_otp_send : true },
                dataType:'json',
                beforeSend: function(){
                    $("#paymentButton").text('Processing...');
                    $("#paymentButton").attr('disabled',true);
                },
                success: function (response) {
                    if (response.status === 'success') {
                        $("#check_code").removeClass('d-none');
                        $("#send_code").addClass('d-none');
                    }else{
        				alert(response.message);
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
            $("#state").on('change', function() {
                var stateid = $(this).val();
                $.ajax({
                    method: "POST",
                    url: "city_populate.php",
                    data: {
                        sid: stateid
                    },
                    datatype: "html",
                    success: function(data) {
                        $("#city").html(data);

                    }

                });
            });
        });
    </script>
@endsection