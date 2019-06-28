<?php $__env->startSection('content'); ?>
<?php if(empty($produk)): ?>
<div class="container">
<b> Anda tidak memiliki produk</b>
</div>
<?php endif; ?>
        
<div class="span7" style="width: 520px;">
    <ul class="breadcrumb">
    <li><a href="home">Home</a> <span class="divider">/</span></li>
    <li><a href="produk">Products</a> <span class="divider">/</span></li>
    <li class="active">product Details</li>
    </ul>
  <div class="row">
   <center>   
      <div id="gallery" class="span3" style="width: 350px; border: 0px solid;">
            <a href="<?php echo e('image/view/'.$produk_user->produk_image_src1); ?>" title="<?php echo e($produk_user->produk_name); ?>">
        <img src="<?php echo e(url('image/view/'.$produk_user->produk_image_src1)); ?>" style="width:100%" alt="<?php echo e($produk_user->produk_name); ?>"/>
            </a>
      <div id="differentview" class="moreOptopm carousel slide">
                <div class="carousel-inner">
                  <div class="item active">
                   <a href="<?php echo e('image/view/'.$produk_user->produk_image_src1); ?>"> <img style="width:29%" src="<?php echo e(url('image/view/'.$produk_user->produk_image_src1)); ?>" alt=""/></a>
                   <a href="<?php echo e('image/view/'.$produk_user->produk_image_src2); ?>"> <img style="width:29%" src="<?php echo e(url('image/view/'.$produk_user->produk_image_src2)); ?>" alt=""/></a>
                   <a href="<?php echo e('image/view/'.$produk_user->produk_image_src3); ?>" > <img style="width:29%" src="<?php echo e(url('image/view/'.$produk_user->produk_image_src3)); ?>" alt=""/></a>
                  </div>
                  <div class="item">
                   <a href="<?php echo e('image/view/'.$produk_user->produk_image_src1); ?>" > <img style="width:50%" src="<?php echo e('image/view/'.$produk_user->produk_image_src1); ?>" alt=""/></a>
                   <a href="<?php echo e('image/view/'.$produk_user->produk_image_src2); ?>"> <img style="width:50%" src="<?php echo e('image/view/'.$produk_user->produk_image_src2); ?>" alt=""/></a>
                   <a href="<?php echo e('image/view/'.$produk_user->produk_image_src3); ?>"> <img style="width:50%" src="<?php echo e('image/view/'.$produk_user->produk_image_src3); ?>" alt=""/></a>
                  </div>
                </div>
              <!--  
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a> 
        -->
              </div>
        
       <div class="btn-toolbar">
        <div class="btn-group">
        <span class="btn"><i class="icon-envelope"></i></span>
        <span class="btn" ><i class="icon-print"></i></span>
        <a href="<?php echo e('image/view/'.$produk_user->produk_image_src1); ?>"><<span class="btn" ><i class="icon-zoom-in"></i></span></a>
        <span class="btn" ><i class="icon-star"></i></span>
        <span class="btn" ><i class=" icon-thumbs-up"></i></span>
        <span class="btn" ><i class="icon-thumbs-down"></i></span>
        </div>
      </div>
      </div>
      </center>
      <div class="span6">
        <div style="text-align: left;">
        <h3><?php echo e($produk_user->produk_name); ?> </h3> 
        <small>- <?php echo e($produk_user->produk_model); ?></small>
        <h6><img src="themes/images/alamat.png" style="width: 17px; float: left; padding-right: 3px;"><div style="float: left;"><?php echo e($produk_user->produk_lokasi); ?></div></h6>
        </div>
        <hr class="soft"/>
        
        <?php if(auth()->guard()->guest()): ?>
        <form action="register" class="form-horizontal qtyFrm">
      
        <?php else: ?>
         <?php endif; ?>  
          <div class="control-group">

          <label class="control-label" style="text-align: left; font-size: 20px;"><span class="btn btn-medium btn-primary">Rp.<?php echo e($produk_user->produk_price); ?>,00</span></label>
              <div class="controls">
                  <?php if(auth()->guard()->guest()): ?>

                    <form action="register" method="post" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>              
                            <div style="float: right;"><input type="hidden" name="produk_cart_qty" class="span1" placeholder="Qty." value="1" /></div>
                            
                            <a href="register" class="btn btn-medium btn-primary">Add to <i class=" icon-shopping-cart"></i></a>
                            
                    </form>
              <div class="clr"></div>
                  <?php else: ?>

                  <form action="<?php echo e(route('cart_save')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>              
                        <input type="hidden" name="user_id" id="" value="<?php echo e(Auth::user()->id); ?>"/>
                        <input type="hidden" name="produk_id" id="" value="<?php echo e($produk_user->produk_id); ?>"/>           
                        <input type="hidden" name="produk_name" id="" value="<?php echo e($produk_user->produk_name); ?>">
                        <input type="hidden" name="produk_price" id="" value="<?php echo e($produk_user->produk_price); ?>"/>
                        <input type="hidden" name="produk_image_src1" id="" value="<?php echo e($produk_user->produk_image_src1); ?>"/>
                        <div style="width: 250px; border: 0px solid; text-align: left; float: left; padding-top: 5px; padding-left: 10px;">
                        <input type="hidden" name="produk_cart_qty" class="span1" placeholder="Qty." value="1" />
                        </div>
                        <div style="width: 150px; float: right; padding-right: 90px;">
                        <button type="submit" class="btn btn-medium btn-primary pull-right"> Add to <i class=" icon-shopping-cart"></i></button>
                        </div>
                        
                 </form>
         <?php endif; ?>
          
              </div>
          </div>
         
        <hr class="soft"  />
        <div class="clr" style="text-align: left; padding-top: 20px; height: 80px; font-size: 20px;">[<?php echo e($produk_user->produk_qty); ?>] barang tersedia
        </div>
        <form class="form-horizontal qtyFrm pull-right">
          <div class="control-group" style=" height:  50px; padding-right: 40px;">
          <label class="control-label"><span>Color</span></label>
          <div class="controls">
            <select class="span2">
              <option>Black</option>
              <option>Red</option>
              <option>Blue</option>
              <option>Brown</option>
            </select>
          </div>
          </div>
        </form>
        <hr class="soft clr"/>
        
          <?php echo $produk_user->produk_desc; ?>

        <div style="padding-right: 40px;">
        <a class="btn btn-small pull-right" href="#detail">More Details</a>
        </div>
        <br class="clr"/>
      <a href="#" name="detail"></a>
      <hr class="soft"/>
      </div>
      <div class="user" style="width: 300px ; height: 200px;  border: 0px solid; padding-left: 200px; font-size: 15px;">
        
           
        <table>
          <tr>
            <td></td>
            <td></td>
            <td>
               <div style="padding-top: 40px; float: left;">
              <a href="<?php echo e('@'.$produk_user->get_user->username); ?>">
                  <?php if(!empty($produk_user->get_user->image_profil)): ?>
                <img src="<?php echo e(url('image_user/view/'.$produk_user->get_user->image_profil)); ?>" class="img-circle" style="width: 40px; height: 40px;  padding: 5px;">
                  <?php else: ?>
                 <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px;  padding: 5px;">
                  <?php endif; ?>
              </a>
              </div>
              <div style="width: 100px height: 90px border: 0px solid; float: right; padding-left: 30px;">
            <div style="width: 100px; height: 80px; border: 0px solid; padding-top: 5px; font-size: 9px;">
                <div style="text-align: center;">
                <b><?php echo e($rating_user_sum); ?></b>
                </div style="text-align: center;">
                <div style="text-align: center;"> 
                <img src="themes\images\star.png" style="width: 50px; height: 15px;">
                </div>
                <div style="text-align: center;">
                <?php echo e($rating_user_avg); ?><img src="themes\images\user.png" style="width: 10px; height: 10px;"> <?php echo e($count_rating); ?>

                </div>
                <div style="text-align: center;">
                   <?php if(!empty(Auth::user())): ?>
                <form action="<?php echo e(route('rating_save')); ?>" method="POST">
                  <?php echo e(csrf_field()); ?>

                  <input type="hidden" name="asal" value="<?php echo e('=@'.$produk_user->get_user->username); ?>">
                  <input type="hidden" name="user_id" value="<?php echo e($produk_user->get_user->id); ?>">
                  <input type="hidden" name="rating_pengirim_id" value="<?php echo e(Auth::user()->id); ?>">
                 
                  <input type="hidden" name="rating_pengirim_id" value="21">
                 
                  <input type="hidden" name="username" value="<?php echo e($produk_user->get_user->username); ?>">
                  <input type="image" name="rating_nilai" src="themes\images\star2.png" value="1" />
                  <input type="image" name="rating_nilai" src="themes\images\star2.png" value="2" />
                  <input type="image" name="rating_nilai" src="themes\images\star2.png" value="3" />
                  <input type="image" name="rating_nilai" src="themes\images\star2.png" value="4" />
                  <input type="image" name="rating_nilai" src="themes\images\star2.png" value="5" />
                  
                </form>
                 <?php else: ?>
                  <?php endif; ?>
                </div>
            </div>
            </div>   
            </td>
            
          </tr>

          <tr>
            <td><img src="themes/images/shop.png" style="width: 25px; height: 18px;"></td>
            <td style="padding-left: 10px;">:</td>
            <td style="padding-left: 10px;"><a href="<?php echo e('=@'.$produk_user->get_user->username); ?>"><?php echo e($produk_user->get_user->name); ?>

                <?php if(!empty($produk_user->get_user->verifikasi)): ?>
              <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;">
                <?php else: ?>
                <?php endif; ?>
            </a>
            
            </td>
          </tr>
          <tr>
            <td><img src="themes/images/wa.png" style="width: 25px; height: 20px;"></td>
            <td style="padding-left: 10px;">:</td>
            <td style="padding-left: 10px;">0<?php echo e($produk_user->get_user->hp); ?></td>
          </tr>
          <tr>
            <td><img src="themes/images/alamat.png" style="width: 25px; height: 20px;"></td>
            <td style="padding-left: 10px;">:</td>
            <td style="padding-left: 10px;"><?php echo e($produk_user->get_user->alamat); ?></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td>
              <?php if(!empty(Auth::user())): ?>
               <?php if($produk_user->get_user->id == Auth::user()->id): ?>
               <?php else: ?>
              <form action="<?php echo e(route('message_save')); ?>" method="POST">
                          <?php echo e(csrf_field()); ?>

                          <input type="hidden" name="asal" value="mmessage_">
                          <input type="hidden" name="user_id1" value="<?php echo e(Auth::user()->id); ?>">
                          <input type="hidden" name="user_id2" value="<?php echo e($produk_user->get_user->id); ?>">
                          <button tipe="submit" class="btn btn-success btn-mini" >Message <img src="themes/images/mail.png" class="img-circle"> </button> 
             </form>
             <?php endif; ?>  
             <?php else: ?>
             <?php endif; ?> 
            </td>
          </tr>
        </table>
      </div>
      

      <div class="span7" style="width: 470px; height: auto;">
            <ul id="productDetail" class="nav nav-tabs">
              <li class="active"><a href="#home" data-toggle="tab">Produk Detail</a></li>
              <li><a href="#profile" data-toggle="tab">Produk Terkait</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade active in" id="home">
        <h4>Product Information</h4>
                <table class="table table-bordered">
        <tbody>
        <tr class="techSpecRow"><th colspan="2">Product Details</th></tr>
        <tr class="techSpecRow"><td class="techSpecTD1">Brand: </td><td class="techSpecTD2"><?php echo e($produk_user->produk_brand); ?></td></tr>
        <tr class="techSpecRow"><td class="techSpecTD1">Model:</td><td class="techSpecTD2"><?php echo e($produk_user->produk_model); ?></td></tr>
        <tr class="techSpecRow"><td class="techSpecTD1">Released on:</td><td class="techSpecTD2"> <?php echo e($produk_user->produk_released_on); ?></td></tr>
        <tr class="techSpecRow"><td class="techSpecTD1">Dimensions:</td><td class="techSpecTD2"> <?php echo e($produk_user->produk_dimensions); ?></td></tr>
        <tr class="techSpecRow"><td class="techSpecTD1">Display size:</td><td class="techSpecTD2"><?php echo e($produk_user->produk_size); ?></td></tr>
        </tbody>
        </table>
        
        <h5>Features</h5>
        <?php echo $produk_user->produk_desc; ?>

              </div>
    <div class="tab-pane fade" id="profile">
    <div id="myTab" class="pull-right">
     <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
     <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
    </div>
    <br class="clr"/>
    <hr class="soft"/>
    <div class="tab-content">
      <div class="tab-pane" id="listView">
     <?php if(!empty($produk)): ?>
            <?php $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="row">   
      <div class="span2">
        <a href="produk_<?php echo e($p->user_id); ?>"><center><img src="<?php echo e(url('image/view/'.$p->produk_image_src1)); ?>" alt="" style="width: auto; height: 110px;" /></center></a>
      </div>
      <div class="span4">
        <center>
        <h3><?php echo e($p->produk_name); ?></h3>
        <div class="desc">
       <?php echo $p->produk_desc; ?>

        </div>
      </center>
      <center>
        <a class="btn btn-small pull-right" href="#">View Details</a>
        <br class="clr"/>
      </center>
      </div>
      <div class="span3 alignR">
      <form class="form-horizontal qtyFrm">
      <h2 class="btn btn-mini btn-primary"> Rp.<?php echo e($p->produk_price); ?>,00</h2>
      <label class="checkbox">
        <input type="checkbox">  Nego
      </label>
      </form>
      <center>
        <div style="width: 200px;">
          <?php if(auth()->guard()->guest()): ?>

        <form action="register" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>              
                <input type="hidden" name="produk_cart_qty" class="span1" placeholder="Qty."/>
                <a href="register" class="btn btn-mini btn-primary">Add to <i class=" icon-shopping-cart"></i></a>
                <a href="mproduk_<?php echo e($p->produk_id); ?>" class="btn btn-mini"><i class="icon-zoom-in"></i></a>
                
        </form>
         <?php else: ?>
          <form action="<?php echo e(route('cart_save')); ?>" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                 <input type="hidden" name="asal" id="" value="mcart_produk"/>      
                <input type="hidden" name="user_id" id="" value="<?php echo e(Auth::user()->id); ?>"/>
                <input type="hidden" name="produk_id" id="" value="<?php echo e($p->produk_id); ?>"/>           
                <input type="hidden" name="produk_name" id="" value="<?php echo e($p->produk_name); ?>">
                <input type="hidden" name="produk_price" id="" value="<?php echo e($p->produk_price); ?>"/>
                <input type="hidden" name="produk_image_src1" id="" value="<?php echo e($p->produk_image_src1); ?>"/>
                <input type="hidden" name="produk_cart_qty" class="span1" placeholder="Qty." value="1" />
                
                <a href="mproduk_<?php echo e($p->produk_id); ?>" class="btn btn-mini"><i class="icon-zoom-in"></i></a>
                <button class="btn btn-mini"> Add to <i class=" icon-shopping-cart"></i></button>
                 
         </form>
         <?php endif; ?>
         </div>
         </center>   
      </div>
    </div>
    <hr class="soft"/>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
     </div>
  <div class="tab-pane  active" id="blockView" style="width: 450px;">
    <div style="width: 440px; ">
       <?php if(!empty($produk)): ?>
            <?php $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     
        <div style="width: 140px; border: 0px solid; padding: 2px; float: left;">
        <a href="produk_<?php echo e($p->user_id); ?>"><center><img src="<?php echo e(url('image/view/'.$p->produk_image_src1)); ?>" alt="" style="width: auto; height: 110px;" /></center></a>
        <div class="caption">
          
          <div style="padding-left: 10px;">
           <center><h5><?php echo e($p->produk_name); ?></h5></center>
          <div style="height: 20px;"> 
           <center><?php echo e($p->produk_model); ?></center>
          </div>
          
         </div>
           <h4 style="text-align:center"><a class="btn btn-primary btn-mini" href="#">Rp.<?php echo e($p->produk_price); ?>,00</a>
           </h4>
           <div style="width: 145px; height: 26px; border: 0px solid;">
            <center>
           <?php if(auth()->guard()->guest()): ?>

        <form action="register" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>              
                <center><input type="number" name="produk_cart_qty" class="span1" placeholder="Qty."/></center>
                <center>
                <a href="register" class="btn btn-medium btn-primary">Add to <i class=" icon-shopping-cart"></i></a>
                <a href="mproduk_<?php echo e($p->produk_id); ?>" class="btn btn-medium"><i class="icon-zoom-in"></i></a>
                </center>
        </form>
         <?php else: ?>
          <form action="<?php echo e(route('cart_save')); ?>" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="asal" id="" value="mcart_produk"/>          
                <input type="hidden" name="user_id" id="" value="<?php echo e(Auth::user()->id); ?>"/>
                <input type="hidden" name="produk_id" id="" value="<?php echo e($p->produk_id); ?>"/>           
                <input type="hidden" name="produk_name" id="" value="<?php echo e($p->produk_name); ?>">
                <input type="hidden" name="produk_price" id="" value="<?php echo e($p->produk_price); ?>"/>
                <input type="hidden" name="produk_image_src1" id="" value="<?php echo e($p->produk_image_src1); ?>"/>
                <div style="width: 90px; height: 20px; padding-left: 12px; border: 0px solid;">
                <input type="hidden" name="produk_cart_qty" class="span1" placeholder="Qty." value="1"  />
                <div style="width: 25px; float: left;">
                                <a href="mproduk_<?php echo e($p->produk_id); ?>" class="btn btn-mini"><i class="icon-zoom-in"></i></a>
                </div>
                <div style="width: 60px; float: left;">
                <button class="btn btn-mini" style="float: left;"> Add to <i class=" icon-shopping-cart"></i></button>
                </div>
              </div>
                 
         </form>
         <?php endif; ?>
         </center>
         </div>
        </div>
        </div>
     
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </div>
  <hr class="soft"/>
  </div>

    </div>
        <br class="clr">
           </div>
    </div>
          </div>

  </div>
  <div style="width: 500px; height: auto; border: 1px ; padding-top: 25px;">
    <hr class="soft">
    <?php if(!empty(Auth::user())): ?>
    <div style="width: 480px; height: 45px; border: 1px ;  padding-top: 5px; padding-left: 30px">
      <form action="<?php echo e(route('comment_produk_save')); ?>"" method="POST">
         <?php echo e(csrf_field()); ?>

        <div style="width: 42px; float: left;">
        <input type="hidden" name="asal" value="<?php echo e('mproduk_'.$produk_user->produk_id); ?>">
        <input type="hidden" name="produk_id" value="<?php echo e($produk_user->produk_id); ?>">
        <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
        <a href="">
         
           <?php if(!empty(Auth::user()->image_profil)): ?>
          <img src="<?php echo e(url('image_user/view/'.Auth::user()->image_profil)); ?>" class="img-circle" style="width: 40px; height: 40px; float: left;">
            <?php else: ?>
           <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left;">
            <?php endif; ?>
          
        </a>
        </div>
         <div style="width: 350px; padding-top: 8px;  float: left;">
        <input type="text" name="comment_produk_desc" style="width: 330px; height: 15px;">
        </div>
        <div style=" width: 50px; float: left; padding-top: 8px;">
        <input type="submit" class="btn btn-primary btn-mini" value="comment" >
        </div>
      </form>
    </div>
    <?php else: ?>
    <?php endif; ?>
    <div style="width: 385px; height: auto; border: 1px  ;padding-top: 5px; padding-left: 10px; padding-bottom: 20px;">
        <?php if(!empty($comment_produk)): ?>
            <?php $__currentLoopData = $comment_produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <div style="width: 450px; height: auto; border: 0px solid; padding-left: 20px; padding-top: 10px; padding-bottom: 20px;">

                 <div style="width: 40px; border: 0px solid; height: 40px; float: left;">
                   <a href="">
                      <?php if(!empty($cp->get_comment_produk_user->image_profil)): ?>
                    <img src="<?php echo e(url('image_user/view/'.$cp->get_comment_produk_user->image_profil)); ?>" class="img-circle" style="width: 40px; height: 40px; float: left;">
                     <?php else: ?>
                      <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left;">
                     <?php endif; ?>
                  </a>
                 </div>
                 <div style="width: 200px; height: auto; border: 0px solid; float: left; padding-left: 5px; padding-top: 10px;">
                   <b><?php echo e($cp->get_comment_produk_user->name); ?></b>
                   <?php echo e($cp->comment_produk_desc); ?>

                 </div>
                 <div style="width: 80px; float: right; font-size: 9px; padding-top: 10px;">
                   <?php echo e($cp->created_at); ?>

                 </div>
               
             </div>
             <div class="clr"></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
  </div>

</div>
</div> 
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('mmaster', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>