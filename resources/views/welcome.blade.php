<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title> Lol ID Media Sosial Masa Kini</title>
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
    <link href="{{ asset('themes/css/base.css') }}" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive --> 
    <link href="{{ asset('themes/css/bootstrap-responsive.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('themes/css/font-awesome.css') }}" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->   
    <link href="{{ asset('themes/js/google-code-prettify/prettify.css') }}" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="{{ asset('themes/images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('themes/images/lol_icon.jpg') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('themes/images/lol_icon.jpg') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('themes/images/lol_icon.jpg') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('themes/images/ico/apple-touch-icon-57-precomposed.png') }}">
    <style type="text/css" id="enject"></style>
 <link rel="stylesheet" href="screen.css" media="screen"/>
 <link rel="stylesheet" href="handheld.css" media="handheld"/>
<script type="text/javascript">

if (screen.width <= 699) {
//document.location = "M.VERSI-MOBILE.com";
location.replace("/home=id");
}

</script>

<script type="text/javascript">

if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i))) {
   location.replace("/home=m");
}
</script>
  </head>

<body style="background: url({{'themes/images/banner3.jpg'}}">

<div id="header" style="background: url({{'themes/images/banner3.jpg'}}">
<div class="container" >
<div id="welcomeLine" class="row" >
    @guest
    <div class="span6">Selamat Datang<strong></strong></div>
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
        @guest
        <a href="register"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> 
        [ 0 ]  Keranjang Anda 
          @else 
        <a href="cart_produk"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> 
                 
                 [0] Keranjang Anda  
                
              
          @endguest 
        </span> </a> 
    </div>
    </div>
</div>
<!-- Navbar ================================================== -->
<div>
<div id="logoArea" class="bg-primary navbar" >
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</a>
  <div class="navbar-inner" >
    <a class="brand" href=""><img src="themes/images/logo.jpg" alt="Bootsshop" style="width: 140px; height: 41px;" /></a>
        
    <ul id="topMenu" class="nav pull-right">
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
          <li><a href="user_produk" >Produk Anda</a></li>     
          <li><div style="padding-top: 10px;">
            <a href="profil"><button class="btn btn-success">{{ Auth::user()->name }}</button></a>
              </div>
          </li>
          <li><div style="padding-top: 10px;">
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
</div>

<!-- Header End====================================================================== -->
<!-- Sidebar ================================================== -->
<!-- Sidebar end=============================================== -->
<center>
<div style="width: 940px; height: 600px; border: 0px solid; text-align: center;  padding: 0px;">
  <div id="carouselBlk">
    <div id="myCarousel" class="carousel slide">
        <div class="carousel-inner">
          <div class="item active">
          <div class="container">
            <a href="register"><img style="width:100%" src="themes/images/traveler.gif" alt="special offers"/></a>
            <div class="carousel-caption">
                  
                </div>
          </div>
          </div>
          <div class="item">
          <div class="container">
            <a href="register"><img style="width:100%" src="themes/images/travel3.jpg" alt=""/></a>
                <div class="carousel-caption">
                </div>
          </div>
          </div>
          <div class="item">
          <div class="container">
            <a href="register"><img style="width:100%" src="themes/images/travel2.jpg" alt=""/></a>
            <div class="carousel-caption">
                  
                </div>
            
          </div>
          </div>
           <div class="item">
           <div class="container">
            <a href="register"><img style="width:100%" src="themes/images/travel1.jpg" alt=""/></a>
            <div class="carousel-caption">
                  
                </div>
           
          </div>
          </div>
           <div class="item">
           <div class="container">
            <a href="register"><img style="width:80%" src="themes/images/ti.png" alt=""/></a>
            <div class="carousel-caption">
                  
            </div>
          </div>
          </div>
           <div class="item">
           <div class="container">
            <a href="register"><img style="width:100%" src="themes/images/visit.png" alt=""/></a>
            <div class="carousel-caption">
                  
                </div>
          </div>
          </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
      </div> 
</div>
</center>
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
                <a href="register">REGISTRATION</a>  
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
                <a href="#"><img width="60" height="60" src="themes/images/facebook.png" title="facebook" alt="facebook"/></a>
                <a href="#"><img width="60" height="60" src="themes/images/twitter.png" title="twitter" alt="twitter"/></a>
                <a href="#"><img width="60" height="60" src="themes/images/youtube.png" title="youtube" alt="youtube"/></a>
             </div> 
         </div>
        <p class="pull-right">&copy; Deni Anggun Ginanjar</p>
    </div><!-- Container End -->
    </div>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
    <script src="themes/js/jquery.js" type="text/javascript"></script>
    <script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="themes/js/google-code-prettify/prettify.js"></script>
    
    <script src="themes/js/bootshop.js"></script>
    <script src="themes/js/jquery.lightbox-0.5.js"></script>
    
    <!-- Themes switcher section ============================================================================================= -->
<div id="secectionBox">
<link rel="stylesheet" href="themes/switch/themeswitch.css" type="text/css" media="screen" />
<script src="themes/switch/theamswitcher.js" type="text/javascript" charset="utf-8"></script>
    <div id="themeContainer">
    <div id="hideme" class="themeTitle">Style Selector</div>
    <div class="themeName">Oregional Skin</div>
    <div class="images style">
    <a href="themes/css/#" name="bootshop"><img src="themes/switch/images/clr/bootshop.png" alt="bootstrap business templates" class="active"></a>
    <a href="themes/css/#" name="businessltd"><img src="themes/switch/images/clr/businessltd.png" alt="bootstrap business templates" class="active"></a>
    </div>
    <div class="themeName">Bootswatch Skins (11)</div>
    <div class="images style">
        <a href="themes/css/#" name="amelia" title="Amelia"><img src="themes/switch/images/clr/amelia.png" alt="bootstrap business templates"></a>
        <a href="themes/css/#" name="spruce" title="Spruce"><img src="themes/switch/images/clr/spruce.png" alt="bootstrap business templates" ></a>
        <a href="themes/css/#" name="superhero" title="Superhero"><img src="themes/switch/images/clr/superhero.png" alt="bootstrap business templates"></a>
        <a href="themes/css/#" name="cyborg"><img src="themes/switch/images/clr/cyborg.png" alt="bootstrap business templates"></a>
        <a href="themes/css/#" name="cerulean"><img src="themes/switch/images/clr/cerulean.png" alt="bootstrap business templates"></a>
        <a href="themes/css/#" name="journal"><img src="themes/switch/images/clr/journal.png" alt="bootstrap business templates"></a>
        <a href="themes/css/#" name="readable"><img src="themes/switch/images/clr/readable.png" alt="bootstrap business templates"></a> 
        <a href="themes/css/#" name="simplex"><img src="themes/switch/images/clr/simplex.png" alt="bootstrap business templates"></a>
        <a href="themes/css/#" name="slate"><img src="themes/switch/images/clr/slate.png" alt="bootstrap business templates"></a>
        <a href="themes/css/#" name="spacelab"><img src="themes/switch/images/clr/spacelab.png" alt="bootstrap business templates"></a>
        <a href="themes/css/#" name="united"><img src="themes/switch/images/clr/united.png" alt="bootstrap business templates"></a>
        <p style="margin:0;line-height:normal;margin-left:-10px;display:none;"><small>These are just examples and you can build your own color scheme in the backend.</small></p>
    </div>
    <div class="themeName">Background Patterns </div>
    <div class="images patterns">
        <a href="themes/css/#" name="pattern1"><img src="themes/switch/images/pattern/pattern1.png" alt="bootstrap business templates" class="active"></a>
        <a href="themes/css/#" name="pattern2"><img src="themes/switch/images/pattern/pattern2.png" alt="bootstrap business templates"></a>
        <a href="themes/css/#" name="pattern3"><img src="themes/switch/images/pattern/pattern3.png" alt="bootstrap business templates"></a>
        <a href="themes/css/#" name="pattern4"><img src="themes/switch/images/pattern/pattern4.png" alt="bootstrap business templates"></a>
        <a href="themes/css/#" name="pattern5"><img src="themes/switch/images/pattern/pattern5.png" alt="bootstrap business templates"></a>
        <a href="themes/css/#" name="pattern6"><img src="themes/switch/images/pattern/pattern6.png" alt="bootstrap business templates"></a>
        <a href="themes/css/#" name="pattern7"><img src="themes/switch/images/pattern/pattern7.png" alt="bootstrap business templates"></a>
        <a href="themes/css/#" name="pattern8"><img src="themes/switch/images/pattern/pattern8.png" alt="bootstrap business templates"></a>
        <a href="themes/css/#" name="pattern9"><img src="themes/switch/images/pattern/pattern9.png" alt="bootstrap business templates"></a>
        <a href="themes/css/#" name="pattern10"><img src="themes/switch/images/pattern/pattern10.png" alt="bootstrap business templates"></a>
        
        <a href="themes/css/#" name="pattern11"><img src="themes/switch/images/pattern/pattern11.png" alt="bootstrap business templates"></a>
        <a href="themes/css/#" name="pattern12"><img src="themes/switch/images/pattern/pattern12.png" alt="bootstrap business templates"></a>
        <a href="themes/css/#" name="pattern13"><img src="themes/switch/images/pattern/pattern13.png" alt="bootstrap business templates"></a>
        <a href="themes/css/#" name="pattern14"><img src="themes/switch/images/pattern/pattern14.png" alt="bootstrap business templates"></a>
        <a href="themes/css/#" name="pattern15"><img src="themes/switch/images/pattern/pattern15.png" alt="bootstrap business templates"></a>
        
        <a href="themes/css/#" name="pattern16"><img src="themes/switch/images/pattern/pattern16.png" alt="bootstrap business templates"></a>
        <a href="themes/css/#" name="pattern17"><img src="themes/switch/images/pattern/pattern17.png" alt="bootstrap business templates"></a>
        <a href="themes/css/#" name="pattern18"><img src="themes/switch/images/pattern/pattern18.png" alt="bootstrap business templates"></a>
        <a href="themes/css/#" name="pattern19"><img src="themes/switch/images/pattern/pattern19.png" alt="bootstrap business templates"></a>
        <a href="themes/css/#" name="pattern20"><img src="themes/switch/images/pattern/pattern20.png" alt="bootstrap business templates"></a>
         
    </div>
    </div>
</div>
<span id="themesBtn"></span>

</body>
</html>