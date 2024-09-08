<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
	<title>{{$data['title']}}</title>
</head>

<body id="page-top" class="index">
   <table border="0" cellspacing="0" cellpadding="0" style="width:100%;font-size:14px;font-family:Quicksand, Calibri, Arial, Verdana, sans-serif;background: #f5f6fa;color:#738196;line-height: 21px;padding: 30px;">
        <tbody>
            <tr>
                <td>
                    <table style="background: #fff;width:500px;padding: 20px;margin: 0 auto;box-shadow: 0px 1px 10px 13px #2d313703;border-radius: 8px;font-weight: 500;">
                        <tbody>
                        <tr>
                            <td style="font-size: 24px;color:#000;font-weight: bold;line-height: 30px;">Hi <span contenteditable="false">{{$data['user_name']}}</span></td>
                        </tr>
                        <tr>
                            <td style="height: 5px;line-height: 2px;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Order No : {{$data['order_no']}} Is Cancel</td>
                        </tr>     
                        <tr><td>&nbsp;</td></tr>        
                        <tr>
                            <td style="font-size: 18px;color:#000;font-weight: bold;line-height: 26px;">Order informations:</td>
                        </tr>
                        <tr>
                            <td><strong> Mr/Mrs: {{$data['user_name']}} </strong> <span contenteditable="false"></span></td>
                        </tr>     
                        <tr>
                            <td><strong> Your Order Amount Refund on 7 Working Days</strong> <span contenteditable="false"></span></td>
                        </tr> 
                        <tr><td>&nbsp;</td></tr>    
                        <tr>
                            <td>Thanks, <br><span contenteditable="false">Fototech Final Directory</span></td>
                        </tr>    
                    </tbody></table>
                </td>
            </tr>
            
        </tbody>
    </table>
</body>

</html>