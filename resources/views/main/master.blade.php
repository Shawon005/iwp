<!doctype html>
<html lang="en">
<head>
    <title>Join us at Parivar and connect with a community of photographers to help grow your business</title>
    <!--== META TAGS ==-->
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="theme-color" content="#76cef1"/>
    <meta property="og:image" content="images/home/61813fototech-pvt-ltd.png"/>
    <meta name="description" content="Kick start your business with Fototech Directory. Its comes with ultimate features like listings, events, blog, community. Try Fototech Portal now!">
    <meta name="keyword" content="fototech, phototradefair, phototradeexpo aiptia, canon, nikon, sony, camera, offer, lense, camerabag,expo,hyderabad, hptostore, digipress, album, photographer, wedding">    
    <!--== FAV ICON(BROWSER TAB ICON) ==-->
	<link rel="shortcut icon" href="{{asset('/storage/file/'.Nam('vv_footer','footer_id',1,'home_page_fav_icon'))}}" type="image/x-icon">
	<!--== GOOGLE FONTS ==-->
	<link href="https://fonts.googleapis.com/css?family=Oswald:700|Source+Sans+Pro:300,400,600,700&display=swap" rel="stylesheet">
	<!--== WEB ICON FONTS ==-->
	<link rel="preload" as="font" href="{{asset('')}}frontend/css/icon.woff2" type="font/woff2" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--== CSS FILES ==-->
	<link rel="stylesheet" href="{{asset('')}}frontend/css/jquery-ui.css">
	<link rel="stylesheet" href="{{asset('')}}frontend/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="{{asset('')}}frontend/css/theme-color.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}frontend/css/style.css">
	<link rel="stylesheet" href="{{asset('')}}frontend/css/style.css">
	<link rel="stylesheet" href="{{asset('')}}frontend/css/fonts.css">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
    <script src="{{asset('')}}frontend/js/html5shiv.js"></script>
    <script src="{{asset('')}}frontend/js/respond.min.js"></script>
    <![endif]-->
</head>
<style>
	            .hom-nav .bl li:last-child a {
                border: 1px solid #0a0ef5;
                background: #0a0ef5;
            }
</style>
<body>
	<!-- Preloader -->
	<div id="preloader">
		<div id="status">&nbsp;</div>
	</div>
	<!-- START -->

	@include('ui.layout.top')

			</div>
		</div>
	</section>
@php $footer=footer() @endphp
@yield('content')

@include('ui.layout.footer')

    <script type="text/javascript">var webpage_full_link = 'index.html';</script>
    <script type="text/javascript">var login_url = 'login97d9.html?src=http://iwpdirectory.in/all-category';</script>
	<!-- END -->
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="{{asset('')}}frontend/js/jquery.min.js"></script>
	<script src="{{asset('')}}frontend/js/popper.min.js"></script>
	<script src="{{asset('')}}frontend/js/bootstrap.min.js"></script>
	<script src="{{asset('')}}frontend/js/jquery-ui.js"></script>
	<script src="{{asset('')}}frontend/js/custom.js"></script>
	<script src="{{asset('')}}frontend/js/jquery.validate.min.js"></script>
	<script src="{{asset('')}}frontend/js/slick.js"></script>
	<script src="{{asset('')}}frontend/js/custom_validation.js"></script>
	<script src="{{asset('')}}frontend/js/event_filter.js"></script>
    <script src="{{asset('')}}frontend/js/jquery.simplePagination.min.js"></script>
	<script src="{{asset('')}}userend/js/select-opt.js"></script>

	<script>
		$(window).scroll(function () {
		        var scroll = $(window).scrollTop();
		        if (scroll >= 250) {
		            $(".hom-top").addClass("dmact");
		        }
		        else {
		            $(".hom-top").removeClass("dmact");
		        }
		    });
	</script>
    <script type="text/javascript">
		var webpage_full_link = '';
	</script>
    <script>
		$("#tail-se").on("keyup", function () {
		        var value = $(this).val().toLowerCase();
		        $(".sh-all-scat-box").filter(function () {
		            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		        })
		    });
	</script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-90614514-2"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());
		
		  gtag('config', 'UA-90614514-2');
	</script>
@yield('js')
    <style>
	.ud-cen .log-bor{display:none;}
    </style>
</body>
</html>