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
    <link id="callCss" rel="stylesheet" href="<?php echo e(asset('themes/bootshop/bootstrap.min.css')); ?>" media="screen"/>
    <link href="<?php echo e(asset('themes/css/base.css')); ?>" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive --> 
    <link href="<?php echo e(asset('themes/css/bootstrap-responsive.min.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('themes/css/font-awesome.css')); ?>" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->   
    <link href="<?php echo e(asset('themes/js/google-code-prettify/prettify.css')); ?>" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo e(asset('themes/images/ico/favicon.ico')); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo e(asset('themes/images/ico/apple-touch-icon-144-precomposed.png')); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo e(asset('themes/images/ico/apple-touch-icon-114-precomposed.png')); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo e(asset('themes/images/ico/apple-touch-icon-72-precomposed.png')); ?>">
    <link rel="apple-touch-icon-precomposed" href="<?php echo e(asset('themes/images/ico/apple-touch-icon-57-precomposed.png')); ?>">
    <style type="text/css" id="enject"></style>
     <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/style.css')); ?>">
  </head>
  <body style="width: 540px; border: 0px solid;">

<div id="header" style=" width: 540px; ; border: 0px solid;">
<div class="container" >
<div id="welcomeLine" class="row" style="width: 540px; font-size: 10px; border: 0px solid;">
    <div class="span3"  style="width: 200px; border: 0px solid; float: left;">
    <?php if(auth()->guard()->guest()): ?>
    Selamat Datang
    <?php else: ?>
     Selamat Datang<strong>
     
     <?php echo e(Auth::user()->name); ?>

                                
      </strong>
    <?php endif; ?>
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
       <?php if(auth()->guard()->guest()): ?>
        <a href="register">
            <button class="btn btn-primary btn-mini"> 
              <div style="font-size: 10px;">
               <i class="icon-shopping-cart icon-white"></i>        
                 [0] Keranjang Anda  
              </div>
            </button>
          </a> 
        [ 0 ]  <div style="font-size: 10px;">Keranjang Anda</div>
          <?php else: ?> 
          <a href="mcart_produk">
            <button class="btn btn-primary btn-mini"> 
              <div style="font-size: 10px;">
               <i class="icon-shopping-cart icon-white"></i>        
                 [<?php echo e($count_cart); ?>] Keranjang Anda  
              </div>
            </button>
          </a>
          <?php endif; ?>
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
    <div style="width: 220px; border: 0px solid; float: left; ">
    <div style="width: 50px; border: 0px solid; float: left; padding-bottom: 3px;">
       <a  href="home=m"><img src="themes/images/logo.jpg"  style="width: 40px; height: 20px; padding-bottom: 5px;" /></a>
    </div>
    
    <div style="width: 160px; height: 50px; float: left; border: 0px solid;">
        <form method="post" action="cari_barang=m" >
          <?php echo e(csrf_field()); ?>

        <div style="width: 130px; height: 30px; float: left;">
        <div style="width: 130px; height: 10px; padding-bottom: 10px;">
           <input  type="text" name="barang"  placeholder="pencarian barang" style="width: 110px; height: 10px;"/>
        </div> 
        <div style="width: 132px; height: 10px; border: 0px solid; float: left;">
          <select  name="produk_jenis" style="width: 122px; height: 20px; font-size: 8px;">
            <option value="All"><div style="font-size: 8px;">ALL</div></option>
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
        </div>
        </div>
        <div style="width: 30px; height: 10px; float: left; padding-bottom: 10px; float: left;">
          <button type="submit"  class="btn btn-default btn-mini" ><i><img src="themes/images/search.png"></i></button>
        </div>
        
    </form>
    
       
    </div>
    </div>
    <ul id="topMenu" class="nav pull-right">
      <?php if(auth()->guard()->guest()): ?>
       <div style="width: 300px; height: 50px; border: 0px solid; float: right;">
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
    <?php else: ?>
      <div style="width: 320px; height: 50px; border: 0px solid; float: right;">
          <li>
          <div style="width: 30px; float: left;">
              <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;" >
                                            <?php echo e(csrf_field()); ?>

              </form>
            </div>
          <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
           <div style="width: 30px; float: right;">
               <img src="themes/images/logout.png" style="width: 20px; padding-right: 0px; padding-left: 0px;">                                
           </div>
           </a>
           <div style="width: 35px; padding-top: 0px; float: right;">
            <?php if(!empty(Auth::user()->image_profil)): ?>
            <a href="profil=m" ><img class="img-circle" style="width:30px; height: 30px;" src="<?php echo e(url('image_user/view/'.Auth::user()->image_profil)); ?>" alt=""/></a>
            <?php else: ?>
            <a href="profil=m" > <img class="img-circle" style="width:30px; height: 30px;" src="themes/images/profil.jpg"/></a>
            <?php endif; ?>
              </div>
          
          <div style="width: auto; float: right; padding-top: 0px; font-size: 8px; padding-top: 0px;">
            <a href="profil=m"><button class="btn btn-success btn-mini"><?php echo e(Auth::user()->name); ?></button></a>
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
                                  <?php endif; ?>
    </ul>
  </div>


</div>
</div>
</div>
</div>


<!-- Header End====================================================================== -->
<div id="mainBody">
    <div class="container">
    <div class="row">
<!-- Sidebar ================================================== -->
<!--
    <div id="sidebar" class="span3">
        <div class="well well-small">
          <?php if(!empty(Auth::user())): ?>
          <a id="myCart" href="cart_produk_<?php echo e(Auth::user()->id); ?>"><img src="themes/images/ico-cart.png" alt="cart">[<?php echo e($count_cart); ?>] Belanjaanmu  <span class="badge badge-warning pull-right">Rp.0</span></a>
          <?php else: ?>
             <a id="myCart" href="login"><img src="themes/images/ico-cart.png" alt="cart">[0] Belanjaanmu  <span class="badge badge-warning pull-right">Rp.0</span></a>
          <?php endif; ?>
        </div>
        <ul id="sideManu" class="nav nav-tabs nav-stacked">
            
            <li><a href="alat_rumah_tangga">ALAT RUMAH TANGGA [<?php echo e($count_produk_alat_rumah_tangga); ?>]</a></li>
            <li><a href="buku">BUKU [<?php echo e($count_produk_buku); ?>]</a></li>
            <li class="subMenu open"><a href="elektronik"> ELECTRONIK [<?php echo e($count_produk_elektronik); ?>]</a>
                <ul>
                <li><a class="active" href="elektronik"><i class="icon-chevron-right"></i>Kamera (0) </a></li>
                <li><a href="elektronik"><i class="icon-chevron-right"></i>Komputer, Tablet & Laptop (0)</a></li>
                <li><a href="elektronik"><i class="icon-chevron-right"></i>Hand Phone (0)</a></li>
                <li><a href="elektronik"><i class="icon-chevron-right"></i>Rumah Tangga (0)</a></li>
                </ul>
            </li>
            <li><a href="hewan">HEWAN [<?php echo e($count_produk_hewan); ?>]</a></li>
            <li><a href="hiburan">HIBURAN [<?php echo e($count_produk_hiburan); ?>]</a></li>
            <li><a href="jasa">JASA [<?php echo e($count_produk_jasa); ?>]</a></li>
            <li><a href="kendaraan">KENDARAAN [<?php echo e($count_produk_kendaraan); ?>]</a></li>
            <li><a href="keseahatan">KESEHATAN & KECANTIKAN [<?php echo e($count_produk_kesehatan); ?>]</a></li>
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
            <li><a href="olahraga">OLAHRAGA & BERITA [<?php echo e($count_produk_olahraga); ?>]</a></li>
            <li class="subMenu"><a href="pakaian"> PAKAIAN [<?php echo e($count_produk_pakaian); ?>] </a>
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
            <li><a href="tempat">TEMPAT TINGGAL & APARTEMEN & RUMAH [<?php echo e($count_produk_tempat); ?>]</a></li>
            <li><a href="lain">LAIN-LAINYA [<?php echo e($count_produk_lain); ?>]</a></li>
        </ul>
        <br/>
        
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
            
    </div>
  -->
    <!-- Sidebar end=============================================== -->
  <?php echo $__env->yieldContent('content'); ?>

  <!-- MainBody End ============================= --><!-- Footer ================================================================== -->

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
<div class="mfooter_center">
   <a href="home=m"><div style="width: 20%; float: left;"><img src="themes/images/post.png" class="img-circle" style="width: 25px;"></div></a>
   <a href="beranda=m"><div style="width: 18%; float: left;"><img src="themes/images/beranda.png" class="img-circle" style="width: 25px;"></div></a>
   <a href="tambah_produk=m"><div style="width: 18%; float: left;"><img src="themes/images/sell.png" class="img-circle" style="width: 25px;"></div></a>
   <a href="produk=m"><div style="width: 20%; float: left;"><img src="themes/images/shop.png" class="img-circle" style="width: 25px;"></div></a>
   <a href="profil=m"><div style="width: 15%; float: left;"><img src="themes/images/user.png" class="img-circle" style="width: 25px;"></div></a>
</div>
</body>
</html>