<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="@yield('title')">
  <meta name="author" content="">
  <base href="{{ asset('') }}">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
  <link href="public/css/bootstrap.css" rel="stylesheet">
  <link href="public/css/bootstrap-responsive.css" rel="stylesheet">
  <link href="public/css/style.css" rel="stylesheet">
  <link href="public/css/flexslider.css" type="text/css" media="screen" rel="stylesheet"  />
  <link href="public/css/jquery.fancybox.css" rel="stylesheet">
  <link href="public/css/cloud-zoom.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- fav -->
    <link rel="shortcut icon" href="public/assets/ico/favicon.html">
</head>
<body>
    <!-- Header Start -->
  <header>
    {{-- headerstrip --}}
    @include('client.blocks.headerstrip')
    <div class="container">
        {{-- menu --}}
        @include('client.blocks.nav')
    </div>
  </header>
<!-- Header End -->

<div id="maincontainer">
  <!-- Slider Start-->
  @include('client.blocks.slider')
  <!-- Slider End-->
  
  <!-- Section Start-->
  @include('client.blocks.otherddetails')
  <!-- Section End-->
  
  <!-- Content-->


  @yield('content')



  <!-- Footer -->
  <footer id="footer">
    <!-- footersocial -->
    @include('client.blocks.footersocial')
  <!-- footerlinks -->
    @include('client.blocks.footerlinks')
    <!-- copyrightbottom -->
    @include('client.blocks.copyrightbottom')
    <a id="gotop" href="http://www.mafiashare.net">Back to top</a>
  </footer>
<!-- javascript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="public/js/jquery.js"></script>
  <script src="public/js/bootstrap.js"></script>
  <script src="public/js/respond.min.js"></script>
  <script src="public/js/application.js"></script>
  <script src="public/js/bootstrap-tooltip.js"></script>
  <script defer src="public/js/jquery.fancybox.js"></script>
  <script defer src="public/js/jquery.flexslider.js"></script>
  <script type="text/javascript" src="public/js/jquery.tweet.js"></script>
  <script  src="public/js/cloud-zoom.1.0.2.js"></script>
  <script  type="text/javascript" src="public/js/jquery.validate.js"></script>
  <script type="text/javascript"  src="public/js/jquery.carouFredSel-6.1.0-packed.js"></script>
  <script type="text/javascript"  src="public/js/jquery.mousewheel.min.js"></script>
  <script type="text/javascript"  src="public/js/jquery.touchSwipe.min.js"></script>
  <script type="text/javascript"  src="public/js/jquery.ba-throttle-debounce.min.js"></script>
  <script defer src="public/js/custom.js"></script>
</body>
</html>