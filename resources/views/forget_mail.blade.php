<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$data['title']}}</title>
</head>
<body>
    <!-- <h3>{{$data['body']}}</h3>
    <a href="{{$data['url']}}">Click Here</a>
    <Br>
    <h3>Thank You</h3> -->

    <div class="ud-cen">
                <div class="log-bor">&nbsp;</div>
                <span class="udb-inst">Edit Email Template</span>
                <div class="ud-cen-s2 add-list">

                    <div id="email_content" contenteditable="true">
                        



	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
	<title>Bizbook Mailers</title>



   <table style="width:100%;font-size:14px;font-family:Quicksand, Calibri, Arial, Verdana, sans-serif;background: #f5f6fa;color:#738196;line-height: 21px;padding: 30px;" cellspacing="0" cellpadding="0" border="0">
        <tbody>
            <tr>
                <td>
                    <table style="background: #fff;width:500px;padding: 20px;margin: 0 auto;box-shadow: 0px 1px 10px 13px #2d313703;border-radius: 8px;font-weight: 500;">
                        <tbody>
                        <tr>
                            <td style="font-size: 24px;color:#000;font-weight: bold;line-height: 30px;">Your password</td>
                        </tr>
                        <tr>
                            <td style="height: 5px;line-height: 2px;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>We received a request to reset the password to access <span contenteditable="false">Fototech India &amp; Portal</span> with your email address (<span contenteditable="false">{{$data['user_email']}}</span>).</td>
                        </tr>   
                        <tr><td>&nbsp;</td></tr>    
                        <tr>
                            <td style="font-size: 18px;color:#000;font-weight: bold;line-height: 26px;">Login informations:</td>
                        </tr>
                        <tr>
                            <td><strong>User name:</strong><span contenteditable="false">{{$data['user_email']}} </span></td>
                        </tr>     
                        <tr>
                            <td><strong>Password:</strong> <span contenteditable="false">{{$data['password']}}</span></td>
                        </tr> 
                        <tr><td>&nbsp;</td></tr>       
                        <tr>
                            <td><a href="{{$data['url']}}" style="font-size: 14px;background: #fae73d;color: #000;font-weight: bold;width: 180px;border-radius: 50px;display: inline-block;text-align: center;cursor: pointer;text-decoration: none;padding: 8px 5px;box-shadow: 0 2px 3px rgba(0,0,0,0.16);">Click here to login</a></td>
                        </tr>
                        <tr><td>&nbsp;</td></tr>
                        <tr>
                            <td>If you use <span contenteditable="false">Fototech India  &amp; Portal</span> and were expecting this email, consider trying to request a password reset using the email address associated with your account.</td>
                        </tr>     
                        <tr><td>&nbsp;</td></tr>    
                        <tr>
                            <td>Thanks, <br><span contenteditable="false">Fototech India  &amp; Portal</span></td>
                        </tr>    
                    </tbody></table>
                </td>
            </tr>
            
        </tbody>
    </table>


                    </div>
              
                </div>
            </div>
            
</body>
</html>
