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
    <link id="callCss" rel="stylesheet" href="{{ asset('themes/bootshop/bootstrap.min.css') }}" media="screen"/>
    <link href="{{ asset('themes/css/base.css') }}" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive --> 
    <link href="{{ asset('themes/css/bootstrap-responsive.min.css') }}" rel="stylesheet"/>
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
        @guest
        <a href="register"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> 
        [ 0 ]  Keranjang Anda 
          @else 
        <a href="cart_produk"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> 
             
                [
                 @if(!empty($count_cart))
                 {{$count_cart}}
                 @else
                 0
                 @endif
                 ] Keranjang Anda
             
                  
          @endguest 
        </span> </a> 
    </div>
    </div>
</div>
<!-- Navbar ================================================== -->
<div class="navbar" style="width: 1030px; border: 0px solid;">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="home"><img src="themes/images/logo.jpg" alt="Bootsshop" style="width: 140px; height: 41px;" /></a>
    <div style="padding-top: 7px;">
        <form class="form-inline navbar-search" method="post" action="cari_barang" >
          {{ csrf_field() }}
        <input class="form-control" type="text" name="barang"  placeholder="cari barang disini" style="width: 120px"/>
          <select class="form-control" name="produk_jenis" style="width: 120px">
            <option value="All">ALL</option>
            <option value="Alat_Rumah_Rangga">ALAT RUMAH TANGGA</option>
            <option value="Buku">BUKU</option>
            <option value="Elektronik">ELEKTRONIK </option>
            <option value="Hewan">HEWAN</option>
            <option value="Hiburan">HIBURAN</option>
            <option value="Jasa">JASA</option>
            <option value="Kendaraan">KENDARAAN</option>
            <option value="Kesehatan">KESEHATAN & KECANTIKAN </option>
            <option value="Makanan">MAKANAN</option>
            <option value="Olahraga">OLAHRAGA & BERITA</option>
            <option value="Pakaian">PAKAIAN</option>
            <option value="Tempat">TEMPAT TINGGAL $ APARTEMENT & RUMAH</option>
            <option value="Lain_Lain">LAIN-LAIN</option>
        </select> 
          <button type="submit"  class="btn btn-default btn-mini" ><i><img src="themes/images/search.png"></i></button>
    </form>
    </div>
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
          <li><a href="user_produk" >Produk Anda</a></li>     
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
    <div id="sidebar" class="span3">
        <div class="well well-small">
          @if(!empty(Auth::user()))
          <a id="myCart" href="cart_produk_{{Auth::user()->id}}"><img src="themes/images/ico-cart.png" alt="cart">[{{$count_cart}}] Belanjaanmu  <span class="badge badge-warning pull-right">Rp.0</span></a>
          @else
             <a id="myCart" href="login"><img src="themes/images/ico-cart.png" alt="cart">[0] Belanjaanmu  <span class="badge badge-warning pull-right">Rp.0</span></a>
          @endif
        </div>
        <ul id="sideManu" class="nav nav-tabs nav-stacked">
            
            <li><a href="alat_rumah_tangga">ALAT RUMAH TANGGA [{{$count_produk_alat_rumah_tangga}}]</a></li>
            <li><a href="buku">BUKU [{{$count_produk_buku}}]</a></li>
            <li class="subMenu open"><a href="elektronik"> ELECTRONIK [{{$count_produk_elektronik}}]</a>
                <ul>
                <li><a class="active" href="elektronik"><i class="icon-chevron-right"></i>Kamera (0) </a></li>
                <li><a href="elektronik"><i class="icon-chevron-right"></i>Komputer, Tablet & Laptop (0)</a></li>
                <li><a href="elektronik"><i class="icon-chevron-right"></i>Hand Phone (0)</a></li>
                <li><a href="elektronik"><i class="icon-chevron-right"></i>Rumah Tangga (0)</a></li>
                </ul>
            </li>
            <li><a href="hewan">HEWAN [{{$count_produk_hewan}}]</a></li>
            <li><a href="hiburan">HIBURAN [{{$count_produk_hiburan}}]</a></li>
            <li><a href="jasa">JASA [{{$count_produk_jasa}}]</a></li>
            <li><a href="kendaraan">KENDARAAN [{{$count_produk_kendaraan}}]</a></li>
            <li><a href="keseahatan">KESEHATAN & KECANTIKAN [{{$count_produk_kesehatan}}]</a></li>
            <li class="subMenu"><a>MAKANAN [0]</a>
                <ul style="display:none">
                <li><a href="makanan"><i class="icon-chevron-right"></i>Angoves  (0)</a></li>
                <li><a href="makanan"><i class="icon-chevron-right"></i>Bouchard Aine & Fils (0)</a></li>                                             
                <li><a href="makanan"><i class="icon-chevron-right"></i>French Rabbit (0)</a></li>    
                <li><a href="makanan"><i class="icon-chevron-right"></i>Louis Bernard  (0)</a></li>
                <li><a href="makanan"><i class="icon-chevron-right"></i>BIB Wine (Bag in Box) (0)</a></li>                                                
                <li><a href="makanan"><i class="icon-chevron-right"></i>Other Liquors & Wine (0)</a></li>                                             
                <li><a href="makanan"><i class="icon-chevron-right"></i>Garden (0)</a></li>                                               
                <li><a href="makanan"><i class="icon-chevron-right"></i>Khao Shong (0)</a></li>                                              
            </ul>
            </li>
            <li><a href="olahraga">OLAHRAGA & BERITA [{{$count_produk_olahraga}}]</a></li>
            <li class="subMenu"><a href="pakaian"> PAKAIAN [{{$count_produk_pakaian}}] </a>
            <ul style="display:none">
                <li><a href="pakaian"><i class="icon-chevron-right"></i>Baju & Celana Wanita (0)</a></li>
                <li><a href="pakaian"><i class="icon-chevron-right"></i>Sepatu Wanita (0)</a></li>                                                
                <li><a href="pakaian"><i class="icon-chevron-right"></i>Tas Wanita(0)</a></li>    
                <li><a href="pakaian"><i class="icon-chevron-right"></i>Baju & Celana Pria  (0)</a></li>
                <li><a href="pakaian"><i class="icon-chevron-right"></i>Sepatu Pria (0)</a></li>                                              
                <li><a href="pakaian"><i class="icon-chevron-right"></i>Baju & Celana Anak-Anak (0)</a></li>                                                
                <li><a href="pakaian"><i class="icon-chevron-right"></i>Sepatu Anak-anak (0)</a></li>                                               
            </ul>
            </li>
            <li><a href="tempat">TEMPAT TINGGAL & APARTEMEN & RUMAH [{{$count_produk_tempat}}]</a></li>
            <li><a href="lain">LAIN-LAINYA [{{$count_produk_lain}}]</a></li>
        </ul>
        <br/>
        <!--
          <div class="thumbnail">
            <img src="themes/images/products/panasonic.jpg" alt="Bootshop panasonoc New camera"/>
            <div class="caption">
              <h5>Panasonic</h5>
                <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">Rp80.000,-</a></h4>
            </div>
          </div><br/>
            <div class="thumbnail">
                <img src="themes/images/products/kindle.png" title="Bootshop New Kindel" alt="Bootshop Kindel">
                <div class="caption">
                  <h5>Alat Bantu Tulis</h5>
                    <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">Rp.45.0000,-</a></h4>
                </div>
              </div><br/>
            <div class="thumbnail">
                <img src="themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
                <div class="caption">
                  <h5>Metode Pembayaran</h5>
                </div>
              </div>
            -->
    </div>
    <!-- Sidebar end=============================================== -->
  @yield('content')

  <!-- MainBody End ============================= -->
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
        <a href="#"><img width="60" height="60" src="themes/images/facebook.png" title="facebook" alt="facebook"/></a>
        <a href="#"><img width="60" height="60" src="themes/images/twitter.png" title="twitter" alt="twitter"/></a>
        <a href="#"><img width="60" height="60" src="themes/images/youtube.png" title="youtube" alt="youtube"/></a>
       </div> 
     </div>
    <p class="pull-right">&copy; Deni Al Farizi</p>
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
<div class="clear">
<div class="footer_kiri">

 <!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = '9yAVk9O85X';var d=document;var w=window;function l(){
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
<!-- {/literal} END JIVOSITE CODE -->"
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
</div>
<div class="footer_kanan">
  <button class="btn-success">message</button>
</div>
<div class="footer">
  &copy;denialfarizi.com
</div>
</div> 
</body>
</html>