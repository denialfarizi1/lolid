<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title> Deni online Shopping </title>
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
    <link id="callCss" rel="stylesheet" href="{{ asset('../themes/bootshop/bootstrap.min.css') }}" media="screen"/>
    <link href="{{ asset('../themes/css/base.css') }}" rel="stylesheet" media="screen"/>
    <link id="callCss" rel="stylesheet" href="{{ asset('bootstrap4/bootstrap.min.css') }}" media="screen"/>
    
<!-- Bootstrap style responsive --> 
    <link href="{{ asset('../themes/css/bootstrap-responsive.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('bootstrap4/bootstrap.css') }}" rel="stylesheet"/>
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
     <script src="http://maps.googleapis.com/maps/api/js"></script>
     <script>
        // fungsi initialize untuk mempersiapkan peta
        function initialize() {
        var propertiPeta = {
            center:new google.maps.LatLng(-6.916736, 107.606420),
            zoom:9,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };
        
        var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
        }

        // event jendela di-load  
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>

  <body>
<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
    @guest
    <div class="span6">Selamat Datang<strong> User</strong></div>
    @else
     <div class="span6">Selamat Datang<strong>
     
     {{ Auth::user()->name }}
                                
      </strong></div>
    @endguest
    <div class="span6">
    <div class="pull-right">
        <a href="register"><span class="">Indonesia</span></a>
        <a href="register"><span class="">IDN</span></a>
        <span class="btn btn-mini"></span>
        <a href="register"><span></span></a>
        <span class="btn btn-mini">Rp.0</span>
        <a href="register"><span class="">IDR</span></a>
        
    </div>
    </div>
</div>
<!-- Navbar ================================================== -->
<div class="navbar" style="width: 1180px; border: 0px solid;">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="home"><img src="../themes/images/logo.jpg" alt="Bootsshop" style="width: 140px; height: 41px;" /></a>
        <form class="form-inline navbar-search " method="get" action="pencarian=" >
          {{ csrf_field() }}
        <input class="form-control" type="text" name="name" placeholder=" cari user disini" style="width: 120px" />
      
          <button type="submit" class="btn btn-default btn-mini"><i><img src="themes/images/search.png"></i></button>
       </form>
    <ul id="topMenu" class="nav pull-right" style="padding-top: 10px;">
      @guest
     <li class=""><a href="beranda">Beranda</a></li>
     <li class=""><a href="beranda">Hot Offer</a></li>
     <li class=""><a href="/register" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-medium btn-success">Register</span></a></li>
     <li class="">
     <a href="/login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-medium btn-success">Login</span></a>
    <div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3>Login Block</h3>
          </div>
          <div class="modal-body">
            <form class="form-horizontal loginFrm">
              <div class="control-group">                               
                <input type="text" id="inputEmail" placeholder="Email">
              </div>
              <div class="control-group">
                <input type="password" id="inputPassword" placeholder="Password">
              </div>
              <div class="control-group">
                <label class="checkbox">
                <input type="checkbox"> Remember me
                </label>
              </div>
            </form>     
            <button type="submit" class="btn btn-success">Sign in</button>
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
          </div>
    </div>
    </li>
    @else  
           <li><a href="beranda" >Beranda</a></li>
          <li><a href="produk" >Market</a></li>
          <li><a href="user_produk_{{Auth::user()->id}}" >Produk Anda</a></li>     
          <li><div style="padding-top: 0px;">
            <a href="profil"><button class="btn btn-success">{{ Auth::user()->name }}</button></a>
              </div>
          </li>
          <li><div style="padding-top: 0px;">
            @if(!empty(Auth::user()->image_profil))
            <a href="profil" ><img class="img-circle" style="width:50px; height: 50px;" src="{{url('image_user/view/'.Auth::user()->image_profil)}}" alt=""/></a>
            @else
            <a href="profil" > <img class="img-circle" style="width:50px; height: 50px;" src="themes/images/profil.jpg"/></a>
            @endif
              </div>
          </li>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
          <li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;" >
                                            {{ csrf_field() }}
              </form>
          </li>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
         <li>
                                       <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <img src="themes/images/logout.png" style="padding-right: 0px; padding-left: 0px;">
                                        </a>
         </li>
                            @endguest
    </ul>
  </div>


</div>
</div>
</div>
<!-- Header End====================================================================== -->
<div id="mainBody">
    <div class="container">
    <div class="row">
<!-- Sidebar ================================================== -->
    <div id="sidebar" class="span2">
        <ul id="sideManu" class="nav nav-tabs nav-stacked">
            <li><a href="/grup_tambah">Buat Grup</a></li>
            <a href=""><li class="subMenu">Grup anda
               <ul style="display:block;">
                @if(!empty($grup_list ))
                     @foreach($grup_list as $gl)
                      
                <li><a href="{{$gl->grup_id}}"><i class="icon-chevron-right"></i>{{$gl->grup_name}}</a></li>
                      
                     @endforeach
                @endif                                               
                </ul>
             </li></a>
            
        </ul>
        <br/>
    </div>
  
    <!-- Sidebar end=============================================== -->
  @yield('content')

  <!-- MainBody End ============================= -->
  </div>
  </div>
</div>
<!-- Footer ================================================================== -->
  <div  id="footerSection">
  <div class="container">
    <div class="row">
      <div class="span3">
        <h5>ACCOUNT</h5>
        <a href="login.html">YOUR ACCOUNT</a>
        <a href="login.html">PERSONAL INFORMATION</a> 
        <a href="login.html">ADDRESSES</a> 
        <a href="login.html">DISCOUNT</a>  
        <a href="login.html">ORDER HISTORY</a>
       </div>
      <div class="span3">
        <h5>INFORMATION</h5>
        <a href="contact.html">CONTACT</a>  
        <a href="register.html">REGISTRATION</a>  
        <a href="legal_notice.html">LEGAL NOTICE</a>  
        <a href="tac.html">TERMS AND CONDITIONS</a> 
        <a href="faq.html">FAQ</a>
       </div>
      <div class="span3">
        <h5>OUR OFFERS</h5>
        <a href="#">NEW PRODUCTS</a> 
        <a href="#">TOP SELLERS</a>  
        <a href="produk">SPECIAL OFFERS</a>  
        <a href="#">MANUFACTURERS</a> 
        <a href="#">SUPPLIERS</a> 
       </div>
      <div id="socialMedia" class="span3 pull-right">
        <h5>SOCIAL MEDIA </h5>
        <a href="#"><img width="60" height="60" src="../themes/images/facebook.png" title="facebook" alt="facebook"/></a>
        <a href="#"><img width="60" height="60" src="../themes/images/twitter.png" title="twitter" alt="twitter"/></a>
        <a href="#"><img width="60" height="60" src="../themes/images/youtube.png" title="youtube" alt="youtube"/></a>
       </div> 
     </div>
    <p class="pull-right">&copy; Deni Al Farizi</p>
  </div><!-- Container End -->
  </div>

  </div>
  </div>
</div>
<span id="themesBtn"></span>
<div class="clear">
<div class="footer">


<!-- WhatsHelp.io widget -->

<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+6282215218397", // WhatsApp number
            call_to_action: "Message us", // Call to action
            position: "left", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
    </script>
<!-- /WhatsHelp.io widget --> 


<div class="footer_center">
&copy;lolid.com 
</div>
<div class="footer_kiri">
  
 <a href="/message"><button class="btn-primary btn-medium">Inbox Anda</button></a>
  
</div>
   <!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = '9yAVk9O85X';var d=document;var w=window;function l(){
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
<!-- {/literal} END JIVOSITE CODE -->
  

</div> 
</body>
</html>