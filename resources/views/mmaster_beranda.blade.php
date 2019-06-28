<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title> Lol ID </title>
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

  <body style="width: 540px; border: 0px solid;">
<div style="width: 540px; height: 100px; border: 0px solid;">
  
</div>
<div id="header" style=" width: 540px; ; border: 0px solid;">
<div class="container" >
<div id="welcomeLine" class="row" style="width: 540px; font-size: 10px; border: 0px solid;">
    <div class="span3"  style="width: 200px; border: 0px solid; float: left;">
    @guest
    Selamat Datang
    @else
     Selamat Datang<strong>
     
     {{ Auth::user()->name }}
                                
      </strong>
    @endguest
    </div>
    <div class="span6" style="width: 310px; border: 0px solid; height: 25px; float: right; padding: 0px;">
    <div class="pull-right">
       <div style="width: 150px; border: 0px solid ;float: left;">
        <a href="register"><span class="">Indonesia</span></a>
        <a href="register"><span class="">IDN</span></a>
        <span class="btn btn-mini"></span>  
        <span class="btn btn-mini">Rp.0</span>
        <a href="register"><span class="">IDR</span></a>
       
        </div>
        <div style="width: 150px; float: right;">
        @guest
        <a href="register">
            <button class="btn btn-primary btn-mini"> 
              <div style="font-size: 10px;">
               <i class="icon-shopping-cart icon-white"></i>        
                 [0] Keranjang Anda  
              </div>
            </button>
          </a> 
        [ 0 ]  <div style="font-size: 10px;">Keranjang Anda</div>
          @else 
          <a href="mcart_produk">
            <button class="btn btn-primary btn-mini"> 
              <div style="font-size: 10px;">
               <i class="icon-shopping-cart icon-white"></i>        
                 [0] Keranjang Anda  
              </div>
            </button>
          </a>
          @endguest
          </div>  
    </div>
    </div>
</div>
<!-- Navbar ================================================== -->
<div>
<div id="logoArea" class="bg-primary navbar" style="width: 540px; height: 30px">
  <div style="padding-bottom: 8px;">
   <a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar" >
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
   </a>
  </div>
  <div class="navbar-inner" style="padding-left: 5px;">
    <div style="width: 200px; border: 0px solid; float: left; ">
    <div style="width: 50px; border: 0px solid; float: left; padding-bottom: 3px;">
       <a  href="home=m"><img src="themes/images/logo.jpg"  style="width: 40px; height: 20px; padding-bottom: 5px;" /></a>
    </div>
    
    <div style="width: 140px; height: 40px; float: left; border: 0px solid;">
        <div style="width: 140px; height: 40px; float: left; ">
          <form  method="post" action="pencarian=m=">
          {{ csrf_field() }}
          <div style="width: 100px; float: left; padding-top: 4px">
            <input class="form-control" type="text" name="name" placeholder="pencarian" style="width: 95px; height: 12px;" />
          </div>
          <div style="width: 30px;  float: left; padding-left: 10px;">
          <button type="submit" class="btn btn-default btn-mini"><i><img src="themes/images/search.png"></i></button>
          </div>
          </form>
        </div>
       
    </div>
    </div>
    <ul id="topMenu" class="nav pull-right">
      @guest
       <div style="width: 250px; height: 50px; border: 0px solid; float: right;">
          <li>
           <div style="width: 50px; float: right; padding-right: 10px;">
               <a href="/login" role="button"  style="padding-right:0"><span class="btn btn-mini btn-success">Login</span></a>                                
           </div>
           
           <div style="width: 50px; padding-top: 0px; float: right; padding-right: 10px;">
            <a href="/register" role="button"  style="padding-right:0"><span class="btn btn-mini btn-success">Register</span></a>
              </div>
        
          <a href="produk" >
            <div style="width: 30px; float: right;"><img src="themes/images/shop.png" class="img-circle" ></div>
          </a>
          <a href="beranda" >
            <div style="width: 30px; float: right;">
              <img src="themes/images/beranda.png" class="img-circle">
            </div>
          </a>
        </li>
        </div>
    @else
      <div style="width: 300px; height: 50px; border: 0px solid; float: right;">
          <li>
          <div style="width: 30px; float: left;">
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;" >
                                            {{ csrf_field() }}
              </form>
            </div>
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
           <div style="width: 30px; float: right;">
               <img src="themes/images/logout.png" style="width: 20px; padding-right: 0px; padding-left: 0px;">                                
           </div>
           </a>
           <div style="width: 35px; padding-top: 0px; float: right;">
            @if(!empty(Auth::user()->image_profil))
            <a href="profil=m" ><img class="img-circle" style="width:30px; height: 30px;" src="{{url('image_user/view/'.Auth::user()->image_profil)}}" alt=""/></a>
            @else
            <a href="profil=m" > <img class="img-circle" style="width:30px; height: 30px;" src="themes/images/profil.jpg"/></a>
            @endif
              </div>
          
          <div style="width: auto; float: right; padding-top: 0px; font-size: 8px; padding-top: 0px;">
            <a href="profil=m"><button class="btn btn-success btn-mini">{{ Auth::user()->name }}</button></a>
          </div>
          <a href="user_produk=m" >
            <div style="width: 30px; float: right;">
              <img src="themes/images/sell.png" class="img-circle" style="width: 22px; background-color: white;">
            </div>
          </a>
          <a href="produk=m" >
            <div style="width: 30px; float: right;"><img src="themes/images/shop.png" class="img-circle" ></div>
          </a>
          <a href="beranda=m" >
            <div style="width: 30px; float: right;">
              <img src="themes/images/beranda.png" class="img-circle">
            </div>
          </a>
        </li>
        </div>
                                  @endguest
    </ul>
  </div>


</div>
</div>
</div>
</div>


<!-- Header End====================================================================== -->

<div style="min-height: 400px; width: 520px;  border: 0px solid; ">
    <div class="container" >

    <!-- Sidebar end=============================================== -->
   @yield('content')
   
  <!-- MainBody End ============================= -->
  </div>
</div>

<!-- Footer ================================================================== -->

    <div  id="footerSection" class="clr" style="width: 520px; height: 70px; font-size: 8px; border: 0px;">
    <div class="container" style="width: 500px; height: 70px; border: 0px solid;">
        
            <div id="socialMedia" class="span1 pull-right" style="font-size: 8px; width: 100px; float: right;">
                <h6>SOCIAL MEDIA</h6>
                <div style="padding-left: 7px;">
                <a href="#"><img width="20" height="20" src="themes/images/facebook.png" title="facebook" alt="facebook"/></a>
                <a href="#"><img width="20" height="20" src="themes/images/twitter.png" title="twitter" alt="twitter"/></a>
                <a href="#"><img width="20" height="20" src="themes/images/youtube.png" title="youtube" alt="youtube"/></a>
                <div style="width: 80px; float: right;">&copy; Deni Al farizi</div>
                </div>
             </div>
        
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
    <a href="themes/css/#" name="cerulean" ><img src="themes/switch/images/clr/cerulean.png" alt="bootstrap business templates" class="active"></a>
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
    <a href="themes/css/#" name="pattern1"  class="active"><img src="themes/switch/images/pattern/pattern1.png" alt="bootstrap business templates"  class="active"></a>
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
<div class="mfooter_center">
   <a href="home=m"><div style="width: 20%; float: left;"><img src="themes/images/post.png" class="img-circle" style="width: 25px;"></div></a>
   <a href="beranda=m"><div style="width: 18%; float: left;"><img src="themes/images/beranda.png" class="img-circle" style="width: 25px;"></div></a>
   <a href="" data-toggle="modal" data-target="#post_status"><div style="width: 18%; float: left;"><img src="themes/images/post_status.png"  style="width: 25px;"></div></a>
   <a href="produk=m"><div style="width: 20%; float: left;"><img src="themes/images/shop.png" class="img-circle" style="width: 25px;"></div></a>
   <a href="profil=m"><div style="width: 15%; float: left;"><img src="themes/images/user.png" class="img-circle" style="width: 25px;"></div></a>
</div>
<!-- Modal edit post-->
<div class="modal fade" id="post_status" tabindex="-1" role="dialog" aria-labelledby="post_status" aria-hidden="true" style="width: 450px;">
<div class="modal-dialog" role="document" style="width: 450px;">
  <div class="modal-content" style="width: 430px;">
    <div class="modal-body" style="width: 420px; height: 120px;">
        <div style="width: 400px; height: 100px; border: 0px solid; border-color: blue; padding: 5px;">
            <form action="{{route('post_save')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}             
                <div class="form-group">
                       <div class="col-sm-8">
                            <input class="form-control"  type="hidden" name="user_id" value="{{Auth::user()->id}}" placeholder="">
                             <input   type="hidden" name="asal" value="beranda=m">
                            <input class="form-control" type="text" name="status" placeholder="Apa yang anda lakukan ?" style="width: 390px; height: 15px;">
                       </div>
                </div>
                <div class="form-group" id="myTab" style="width: 400px;">
                      <div class="col-sm-2 " style="width: 200px; float: left;">
                      <input type="file" class="btn-mini" name="image_post" >
                      </div>
                      
                      <div class="tab-content" style="width: 200px; height: 35px; float: left; border: 0px solid;">
                        <div style="width: 20px; float: left;">
                          <a href="#lokasi_menu" data-toggle="tab"><button style="padding: 0px; margin: 0px;"><img src="themes/images/alamat.jpg" style="height: 15px; float: left"></button></a>
                       </div>                     
                        <div class="tab-pane" id="lokasi_menu" style="width: 165px; height: 25px; float: left; padding-top: 3px;">
                          <input type="text" class="btn-mini" name="lokasi" placeholder="tambah lokasi" style="width: 165px; height: 10px; float: left;">
                        </div>
                    </div>
                </div>
                <div class="form-group clr">
                         <div class="col-sm-10">
                            <button type="submit" class="btn btn-mini btn-primary">Post</button>        
                         </div>
                </div>
              </form>
     </div>
    </div>
    <div class="modal-footer" style="width: 420px; height: 10px;">   
         <div style="width: 160px; height: 10px; float: right; border: 0px solid">
            <button type="button" class="btn btn-secondary btn-mini" data-dismiss="modal">Close
            </button>
        </div>
   </div>
 </div>
</div>
</div>
<!--end edit post -->
<!--
<div class="footer_kiri">

 <a href="message"><input type="button" class="btn-primary btn-medium"  value="Chat anda"/></a>          
</div>

<div>

   BEGIN JIVOSITE CODE {literal}
<script type='text/javascript'>
(function(){ var widget_id = '9yAVk9O85X';var d=document;var w=window;function l(){
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
 {/literal} END JIVOSITE CODE 
</div>
-->



</body>
</html>