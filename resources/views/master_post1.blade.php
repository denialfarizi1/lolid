<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title> Lolid Media sosila masa kini </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
<!--Less styles -->
   <!-- Other Less css file //different less files has different color scheam
    <link rel="stylesheet/less" type="text/css" href="themes/less/simplex.less">
    <link rel="stylesheet/less" type="text/css" href="themes/less/classified.less">
    <link rel="stylesheet/less" type="text/css" href="themes/less/amelia.less">  MOVE DOWN TO activate
    -->
    <!--<link rel="stylesheet/less" type="text/css" href="themes/less/bootshop.less">
    <script src="themes/js/less.js" type="text/javascript"></script> -->
    
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="{{ asset('themes/bootshop/bootstrap.min.css') }}" media="screen"/>
  <!--  <link id="callCss" rel="stylesheet" href="{{ asset('bootshop4/css/bootstrap.min.css') }}" media="screen"/> -->
    <link href="{{ asset('themes/css/base.css') }}" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive --> 
    <link href="{{ asset('themes/css/bootstrap-responsive.min.css') }}" rel="stylesheet"/>

    <!--<link href="{{ asset('boostrap4/css/bootstrap.css') }}" rel="stylesheet"/> -->
    <link href="{{ asset('themes/css/font-awesome.css') }}" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->   
    <link href="{{ asset('themes/js/google-code-prettify/prettify.css') }}" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="{{ asset('themes/images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('themes/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('themes/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('themes/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('themes/images/ico/apple-touch-icon-57-precomposed.png') }}">
    <style type="text/css" id="enject"></style>
     <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

 <link rel="stylesheet" href="screen.css" media="screen"/>
 <link rel="stylesheet" href="handheld.css" media="handheld"/>
    <script type="text/javascript">

if (screen.width <= 699) {
//document.location = "M.VERSI-MOBILE.com";
location.replace("{{'https://lolid.xyz/post_'.$post_user->post_id}}");
}

</script>

<script type="text/javascript">

if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i))) {
   location.replace("{{'https://lolid.xyz/post_'.$post_user->post_id}}");
}
</script>     
  </head>

  <body>

<!-- Header End====================================================================== -->
<div id="mainBody">
   @yield('content')
   

</div>


<!-- Placed at the end of the document so the pages load faster ============================================= -->
  <script src="themes/js/jquery.js" type="text/javascript"></script>
  <script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="themes/js/google-code-prettify/prettify.js"></script>
  
  <script src="themes/js/bootshop.js"></script>
    <script src="themes/js/jquery.lightbox-0.5.js"></script>
  


</body>
</html>