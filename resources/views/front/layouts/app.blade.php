<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('front') }}/assets/images/favicon.ico">

    <!-- CSS
	============================================ -->
    <link rel="stylesheet" href="{{ url('front') }}/assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('front') }}/assets/css/vendor/slick.css">
    <link rel="stylesheet" href="{{ url('front') }}/assets/css/vendor/slick-theme.css">
    <link rel="stylesheet" href="{{ url('front') }}/assets/css/plugins/sal.css">
    <link rel="stylesheet" href="{{ url('front') }}/assets/css/plugins/feather.css">
    <link rel="stylesheet" href="{{ url('front') }}/assets/css/plugins/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ url('front') }}/assets/css/plugins/euclid-circulara.css">
    <link rel="stylesheet" href="{{ url('front') }}/assets/css/plugins/swiper.css">
    <link rel="stylesheet" href="{{ url('front') }}/assets/css/plugins/magnify.css">
    <link rel="stylesheet" href="{{ url('front') }}/assets/css/plugins/odometer.css">
    <link rel="stylesheet" href="{{ url('front') }}/assets/css/plugins/animation.css">
    <link rel="stylesheet" href="{{ url('front') }}/assets/css/plugins/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{ url('front') }}/assets/css/plugins/jquery-ui.css">
    <link rel="stylesheet" href="{{ url('front') }}/assets/css/plugins/magnigy-popup.min.css">
    <link rel="stylesheet" href="{{ url('front') }}/assets/css/plugins/plyr.css">
    <link rel="stylesheet" href="{{ url('front') }}/assets/css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700&family=IBM+Plex+Sans+Arabic:wght@200&display=swap" rel="stylesheet">

    <style>
        h1,h2,h3,h4,h5,h6,p,a,div,span,strong{
            font-family: Cairo;
        }
        .bg-gradient-12{
            background-image: linear-gradient(to right, #ffdfcb, #fdf7ee, #dde4e9, #fdf7ee, #ffdfcb) !important;
            /* background-image: url("front/assets/images/about/22.jpg") !important;  */
        }
        .rbt-header .mainmenu-nav .mainmenu > li > a.active {
            color: var(--color-primary);
            border-bottom: 3px solid var(--color-primary);
        }
    </style>
	@yield('header')
</head>

<body class="rbt-header-sticky" data-new-gr-c-s-check-loaded="14.1115.0" data-gr-ext-installed="">
    <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "434221906657159");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v17.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/ar_AR/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    

	@include('front.layouts.navbar')
	
	@yield('content')

	@include('front.layouts.footer')




	{{----------------------------------- all scripts --------------------------------}}
	{{----------------------------------- ----------- --------------------------------}}
	
    <!-- JS
============================================ -->
    <!-- Modernizer JS -->
    <script src="{{ url('front') }}/assets/js/vendor/modernizr.min.js"></script>
    <!-- jQuery JS -->
    {{-- <script src="{{ url('back') }}/assets/libs/jquery/jquery.min.js"></script> --}}
    <script src="{{ url('front') }}/assets/js/vendor/jquery.js"></script>
    <script src="{{ url('jquery.countdown.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ url('front') }}/assets/js/vendor/bootstrap.min.js"></script>
    <!-- sal.js -->
    <script src="{{ url('front') }}/assets/js/vendor/sal.js"></script>
    <script src="{{ url('front') }}/assets/js/vendor/swiper.js"></script>
    <script src="{{ url('front') }}/assets/js/vendor/magnify.min.js"></script>
    <script src="{{ url('front') }}/assets/js/vendor/jquery-appear.js"></script>
    <script src="{{ url('front') }}/assets/js/vendor/odometer.js"></script>
    <script src="{{ url('front') }}/assets/js/vendor/backtotop.js"></script>
    <script src="{{ url('front') }}/assets/js/vendor/isotop.js"></script>
    <script src="{{ url('front') }}/assets/js/vendor/imageloaded.js"></script>

    <script src="{{ url('front') }}/assets/js/vendor/wow.js"></script>
    <script src="{{ url('front') }}/assets/js/vendor/waypoint.min.js"></script>
    <script src="{{ url('front') }}/assets/js/vendor/easypie.js"></script>
    <script src="{{ url('front') }}/assets/js/vendor/text-type.js"></script>
    <script src="{{ url('front') }}/assets/js/vendor/jquery-one-page-nav.js"></script>
    <script src="{{ url('front') }}/assets/js/vendor/bootstrap-select.min.js"></script>
    <script src="{{ url('front') }}/assets/js/vendor/jquery-ui.js"></script>
    <script src="{{ url('front') }}/assets/js/vendor/magnify-popup.min.js"></script>
    <script src="{{ url('front') }}/assets/js/vendor/paralax-scroll.js"></script>
    <script src="{{ url('front') }}/assets/js/vendor/paralax.min.js"></script>
    <script src="{{ url('front') }}/assets/js/vendor/countdown.js"></script>
    <script src="{{ url('front') }}/assets/js/vendor/plyr.js"></script>
    <!-- Main JS -->
    <script src="{{ url('front') }}/assets/js/main.js"></script>

	@yield('footer')
</body>

</html>