<?php $__env->startSection('content'); ?>

<div style="width: 495px; height: auto; border: 0px solid;  padding: 2px; ">
  <center><a href="<?php echo e('image_user/view/'.$user_id->image_background); ?>">
    <div style="width: 490px; height: 290px; border: 1px solid;  padding: 4px;  <?php if(!empty($user_id->image_background)): ?> background: url(<?php echo e('image_user/view/'.$user_id->image_background); ?>); <?php else: ?> background: url('themes/images/profil_background.jpg'); <?php endif; ?> background-size: 490px; background-repeat: no-repeat; background-position: center;">  
            <div style="width: 490px; height: 210px; border:0px solid; border-color: blue; padding: 0px; ">
              
            </div>
            <div style="width: 480px; height: 70px; border:0px solid; border-color: blue; padding: 4px;">
               <div style="width: 80px; height: 70px; float: left; border:0px solid; border-color: blue; padding: 4px;">
                <center>
                <?php if(!empty($user_id->image_profil)): ?>
                <a href="<?php echo e('image_user/view/'.$user_id->image_profil); ?>"><img style="width: 70px; height: 70px; border: 1px solid;" src="<?php echo e(url('image_user/view/'.$user_id->image_profil)); ?>"/></a>
                 <?php else: ?>
                 <img style="width:70px; height: 70px; border: 1px solid;" src="themes/images/profil.jpg"/>
                 <?php endif; ?> 
                </center>
               </div>
               <div style="width: 380px; height: 50px; float:left; border:0px solid; border-color: green; padding-top: 20px; ">
                    <center>

                    <div style=" width: 220px ; text-align: center; background-color: #F0FFFF;">
                      <table style="width: 220px;border: 1px solid;" class="rounded">
                            <tr>
                              <td><center><?php echo e($count_post_id); ?></center></td>
                              <td><center><?php echo e($count_follower); ?></center></td>
                              <td><center><?php echo e($count_followed); ?></center></td>
                            </tr>
                            <tr>
                              <td><center><a href="#status"><b class="btn" style="padding-top: 2px; padding-bottom: 2px; padding-left: 2px; padding-right: 2px; margin: 0">post</b></a></center></td>
                              <td><center><b class="btn" data-toggle="modal" data-target="#follower" style="padding-top: 2px; padding-bottom: 2px; padding-left: 2px; padding-right: 2px; margin: 0">follower</b>
                                  </center>
                              </td>
                              <td>
                                <center><b class="btn" data-toggle="modal" data-target="#followed" style="padding-top: 2px; padding-bottom: 2px; padding-left: 2px; padding-right: 2px; margin: 0">followed</b>
                                  </center>
                              </td>
                            </tr>
                        </table>
                    </div>
                    <?php if(auth()->guard()->guest()): ?>
                    <?php else: ?>
                          <?php if($user_id->id == Auth::user()->id): ?>
                          <?php else: ?>
                       
                        <div style="width: 160px; height: 30px; border: 0px solid; ">
                        
                        <div style="float: left;">
                                <?php if(!empty($follower_id)): ?>
                          <form action="<?php echo e(route('follow_delete')); ?>" method="POST">
                          <?php echo e(csrf_field()); ?>

                           <input type="hidden" name="asal" value="<?php echo e('=@'.$user_id->username); ?>">
                          <input type="hidden" name="follower_id" value="<?php echo e($follower_id->follower_id); ?>">
                          <input type="hidden" name="followed_id" value="<?php echo e($followed_id->followed_id); ?>">
                          <input type="hidden" name="username" value="<?php echo e($user_id->username); ?>">
                          <button tipe="submit" class="btn btn-secondary btn-mini" > Followed<img src='themes/images/centang.gif'  class='img-circle' style='width: 20px; height: 15px;'></button>
                         </form>
                                <?php else: ?>
                         <form action="<?php echo e(route('follow_save')); ?>" method="POST">
                          <?php echo e(csrf_field()); ?>

                           <input type="hidden" name="asal" value="mmessage_">
                          <input type="hidden" name="user_id" value="<?php echo e($user_id->id); ?>">
                          <input type="hidden" name="follow_user_id" value="<?php echo e(Auth::user()->id); ?>">
                          <input type="hidden" name="username" value="<?php echo e($user_id->username); ?>">
                          <button tipe="submit" class="btn btn-success btn-mini" >Follow <img src='themes/images/plus.jpg'  class='img-circle' style='width: 20px; height: 15px;'></button>
                          </form> 
                                <?php endif; ?>
                         </div>
                        
                        <div style="float: left;">
                        <form action="<?php echo e(route('message_save')); ?>" method="POST">
                          <?php echo e(csrf_field()); ?>

                           <input type="hidden" name="asal" value="mmessage_">
                          <input type="hidden" name="user_id1" value="<?php echo e(Auth::user()->id); ?>">
                          <input type="hidden" name="user_id2" value="<?php echo e($user_id->id); ?>">

                          <button tipe="submit" class="btn btn-success btn-mini" >Message <img src="themes/images/mail.png" class="img-circle"> </button>
                         </form>
                         </div>
                         
                         </div>
                      
                         <?php endif; ?>
                    <?php endif; ?>    
                </center>
              </div>
            </div>

          
     </div>
     </a>
     </center>
     <center>
     <div style="width: 480px; border: 0px solid; clear: left;">
        <div style="width: 200px; border: 0px solid; float: left; text-align: left;">
                  <b><?php echo e($user_id->name); ?></b>                     
                    <?php if(!empty($user_id->verifikasi)): ?><img src="<?php echo e(url('themes/images/verifikasi.png')); ?>" class="img-circle" style="width: 15px; height: 15px; padding: 1px;">
                    <?php else: ?>
                    <?php endif; ?>             
                  <div style="font-size: 10px; padding-left: 10px;">@<i><?php echo e($user_id->username); ?></i></div>
        </div>
        <div style="width: 120px height: 160px border:0px solid; float: right;">
            <div style="width: 110px; border: 0px solid; padding-top: 5px;">
                <div style="text-align: center;">
                <b><?php echo e($rating_user_sum); ?></b>
                </div style="text-align: center;">
                <div style="text-align: center;"> 
                <img src="themes\images\star.png" style="width: 50px;">
                </div>
                <div style="text-align: center;">
                <?php echo e($rating_user_avg); ?><img src="themes\images\user.png"> <?php echo e($count_rating); ?>

                </div>
                <div style="height: 20px; text-align: center; border: 0px solid">
                <form action="<?php echo e(route('rating_save')); ?>" method="POST">
                  <?php echo e(csrf_field()); ?>

                  <input type="hidden" name="user_id" value="<?php echo e($user_id->id); ?>">
                  <?php if(auth()->guard()->guest()): ?> 
                  <?php else: ?><input type="hidden" name="rating_pengirim_id" value="<?php echo e(Auth::user()->id); ?>">
                  <?php endif; ?>
                  <input type="hidden" name="asal" value="<?php echo e('=@'.$user_id->username); ?>">
                  <input type="hidden" name="username" value="<?php echo e($user_id->username); ?>">
                  <div class="bintang">
                  <input type="image" name="rating_nilai" src="themes\images\star1.png" value="1" style="width: 13px;"/>
                  <input type="image" name="rating_nilai" src="themes\images\star1.png" value="2" style="width: 13px;"/>
                  <input type="image" name="rating_nilai" src="themes\images\star1.png" value="3" style="width: 13px;"/>
                  <input type="image" name="rating_nilai" src="themes\images\star1.png" value="4" style="width: 13px;"/>
                  <input type="image" name="rating_nilai" src="themes\images\star1.png" value="5" style="width: 13px;"/>
                  </div>
                </form>
                <div style="border: 0px solid;">Beri Rating</div>
                </div>
            </div>
        </div>
    </div>
    </center>
   
   
   <div style=" clear: left; width: 350px; height: 100px; border:0px solid; border-color: blue; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; text-align: left; ">
               <div style="width: 320px; height: 90px; padding-left: 20px; padding-top: 5px; float: left; background-color: #F0FFFF;">
                 <b><?php echo $user_id->desc; ?></b> 

               </div>

            </div>
    
   <div style="width: 485px; height: 40px; border: 1px solid; border-color: red; padding: 4px;">
      <div id="myTab">
        <div style="width: 160px; float: left; text-align: center;">
        <a href="#status" data-toggle="tab"><span class="btn" style="width: 27px; height: 27px;"><i><img src="themes/images/post.png" style="width: 30px; height: 30px;"></i></span></a>
        </div>
        <div style="width: 160px; float: left; text-align: center;">
          <a href="#produk" data-toggle="tab"><span class="btn" style="width: 27px; height: 27px;"><i><img src="themes/images/keranjang.png" style="width: 30px; height: 30px;"></i></span></a>
        </div>
        <div style="width: 160px; float: left; text-align: center;">
          <a href="#catatan" data-toggle="tab"><span class="btn" style="width: 27px; height: 27px;"><i><img src="themes/images/blog.png" style="width: 30px; height: 30px;"></i></span></a>
        </div>
      </div>
   </div>
   <div style="width: 470px; height: auto; border:0px solid; border-color: yellow; padding: 10px;">
     
<br class="clr"/>
<div class="tab-content" style="padding: 0px;">
  <div class="tab-pane active" id="status" style=" border: 0px solid; text-align: center; padding-bottom: 0px; margin: 0px;">
   
       <?php if(!empty($post_id)): ?>
            <?php $__currentLoopData = $post_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div style="width: 152px; padding: 0px;  border: 0px solid ; margin: 0px; float: left; padding: 1px;">
          <center>
          <div style="height: 130px; overflow: hidden; margin: 0px;">
                <a href="<?php echo e('post=m_'.$p->post_id); ?>"><img src="<?php echo e(url('image_post/view/'.$p->image_post)); ?>" alt="" style="display: block; height: 100%;  margin: 0px;" /></a>
          </div>
          </center>
        </div>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
  </div>
  <div class="tab-pane" id="produk">
    
       <?php if(!empty($produk_id)): ?>
            <?php $__currentLoopData = $produk_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div style="width: 153px; border: 0px solid; float: left;">
         <center>
       <div style="width: 120px; height: 90px; overflow: hidden">
        <a href="mproduk_<?php echo e($val->produk_id); ?>"><img src="<?php echo e(url('image/view/'.$val->produk_image_src1)); ?>" alt="" style="display: block; height: 100%;  margin: 0px;"/></a>
      </div>
        <div class="caption">
          <h5><?php echo e($val->produk_name); ?></h5>
           <?php echo e($val->produk_model); ?>

           <div style="text-align:center" ><a class="btn btn-primary btn-mini" href="#">Rp.<?php echo e($val->produk_price); ?>,00</a>
           </div>
           <div style="padding-top: 5px;">
           <?php if(auth()->guard()->guest()): ?>

        <form action="register" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>              
                <center><input type="number" name="produk_cart_qty" class="span1" placeholder="Qty."/></center>
                <center>
                <a href="register" class="btn btn-mini btn-primary">Add to <i class=" icon-shopping-cart"></i></a>
                <a href="produk_<?php echo e($val->produk_id); ?>" class="btn btn-secondary btn-mini"><i class="icon-zoom-in"></i></a>
                </center>
        </form>
         <?php else: ?>
          <form action="<?php echo e(route('cart_save')); ?>" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?> 
                <input type="hidden" name="asal" id="" value="mcart_produk"/>               
                <input type="hidden" name="user_id" id="" value="<?php echo e(Auth::user()->id); ?>"/>
                <input type="hidden" name="produk_id" id="" value="<?php echo e($val->produk_id); ?>"/>           
                <input type="hidden" name="produk_name" id="" value="<?php echo e($val->produk_name); ?>">
                <input type="hidden" name="produk_price" id="" value="<?php echo e($val->produk_price); ?>"/>
                <input type="hidden" name="produk_image_src1" id="" value="<?php echo e($val->produk_image_src1); ?>"/>
                <center><input type="hidden" name="produk_cart_qty" class="span1" placeholder="Qty."/></center>
                <center>
                <a href="produk_<?php echo e($val->produk_id); ?>" class="btn btn-secondary btn-mini"><i class="icon-zoom-in"></i></a>
                <button class="btn btn-secondary btn-mini"> Add to <i class=" icon-shopping-cart"></i></button>
                 </center>
         </form>
         <?php endif; ?>
        </div>
        </div>
        </center>
       </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
     </div>     
     <div class="tab-pane" id="catatan">
           <div style="width: 460px; height: auto; border: 1px solid; border-color: yellow;">
           <div style="width: 460px; height: 30px; border: 1px solid;">
              
             
           </div>
           <div style="width: 450px; height: auto; border: 1px solid; float: left; padding: 5px;">
             
              <?php if(!empty($catatan)): ?>
              <?php $__currentLoopData = $catatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <div>
               <h4 style="border: 0px solid;"><img src="themes/images/blog.png" style="width: 20px; height: 20px;"><?php echo e($c->catatan_judul); ?></h4>
                <div style="padding-left: 10px;">
               <i style="font-size: 10px;"><?php echo e($c->created_at); ?></i>
                  <br>
               <?php echo $c->catatan_isi; ?>

                </div>
             </div>
             <hr class="soft">
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <?php endif; ?>
           </div>
           
        </div>

    </div>   
</div>
 

<br/>

<div class="container">
  
  <div class="row" style="width: 480px; height: 150px; ;float: left; padding-left: 15px;">
  <!-- Elemen yang akan menjadi kontainer peta -->
    <div id="googleMap" style="width:100%;height:150px;"></div>
  </div>
</div>

<!-- Button trigger modal -->

<!-- Modal follower-->
<div class="modal fade" id="follower" tabindex="-1" role="dialog" aria-labelledby="follower" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="height: 25px; padding-left: 10px; padding-top: 0px; padding-bottom: 0px; margin: 0px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="follower">Follower</h5>
        
      </div>
      <div class="modal-body" style="height: 120px;">
        <table>
        <div>
          <?php if(!empty($follower)): ?>
            <?php $__currentLoopData = $follower; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td>
               <div style="width: 250px; height: 40px; border: 0px solid;">
                  <div style="width: 40px; height: 40px; border: 0px solid; float: left">
                      <a href="<?php echo e('@'.$fr->get_follower_user->username); ?>">
                         <?php if(!empty($fr->get_follower_user->image_profil)): ?>
                        <img src="<?php echo e(url('image_user/view/'.$fr->get_follower_user->image_profil)); ?>" class="img-circle" style="width: 30px; height: 30px; float: left; padding: 5px;">
                         <?php else: ?>
                         <img src="themes/images/profil.jpg" class="img-circle" style="width: 30px; height: 30px; float: left; padding: 5px;">
                         <?php endif; ?>
                      </a>
                  </div>
                  <div style="width: 200px; height: 40px; border: 0px solid; padding-top: 4px; float: left; font-size: 13px;">
                     <div style="height: 15px; font-size: 13px;">
                      <a href="<?php echo e('@'.$fr->get_follower_user->username); ?>">
                      <h5 style="margin: 4px;" ><?php echo e($fr->get_follower_user->name); ?>

                        <?php if(!empty($fr->get_follower_user->verifikasi)): ?>
                        <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;">
                        <?php else: ?>
                        <?php endif; ?>
                        </h5>
                        </a>
                      </div>
                  <div style="height: 15px; font-size: 11px; padding: 0px; margin: 0px;">
                  <p><small><i>@</small><small><?php echo e($fr->get_follower_user->username); ?></i></small></p>
                  </div>

                  </div>
                </div>
            </td>
            <td>          <?php 
                            $user_id_f =  $fr->get_follower_user;
                            $follower_id_f = $follower_user->where('user_id', $user_id_f->id)->first();
                            $followed_id_f = $followed_user->where('followed_user_id', $user_id_f->id)->first();
                         ?>
                        <?php if(auth()->guard()->guest()): ?>
                        <?php else: ?>
                         <?php if($user_id_f->id == Auth::user()->id): ?>
                          <?php else: ?>
                        <div style="width: 200px; height: 35px; border: 0px solid; float: right;">
                        <div style="width: 80px; float: left;">
                         <?php if(!empty($follower_id_f)): ?>
                          <form action="<?php echo e(route('follow_delete')); ?>" method="POST">
                          <?php echo e(csrf_field()); ?>

                          <input type="hidden" name="asal" value="<?php echo e('=@'.$user_id_f->username); ?>">
                          <input type="hidden" name="follower_id" value="<?php echo e($follower_id_f->follower_id); ?>">
                          <input type="hidden" name="followed_id" value="<?php echo e($followed_id_f->followed_id); ?>">
                          <input type="hidden" name="username" value="<?php echo e($user_id_f->username); ?>">
                          <div style="width: 80px;">
                          <button tipe="submit" class="btn btn-secondary btn-mini" >Followed<img src='themes/images/centang.gif'  class='img-circle' style='width: 20px; height: 15px;'></button>
                          </div>
                          </form> 
                          <?php else: ?>
                         <form action="<?php echo e(route('follow_save')); ?>" method="POST">
                          <?php echo e(csrf_field()); ?>


                           <input type="hidden" name="asal" value="<?php echo e('=@'.$user_id_f->username); ?>">
                          <input type="hidden" name="user_id" value="<?php echo e($user_id_f->id); ?>">
                          <input type="hidden" name="follow_user_id" value="<?php echo e(Auth::user()->id); ?>">
                          <input type="hidden" name="username" value="<?php echo e($user_id_f->username); ?>">
                          <div style="width: 100px; float: left;">
                          <button tipe="submit" class="btn btn-success btn-mini" >Follow <img src='themes/images/plus.jpg'  class='img-circle' style='width: 20px; height: 15px;'></button>
                          </div>
                          </form>
                            <?php endif; ?>
            
                           
                          </button>
                         </form>
                         </div>
                        
                        <div style="width: 100px; float: left;">
                        <form action="<?php echo e(route('message_save')); ?>" method="POST">
                          <?php echo e(csrf_field()); ?>

                          <input type="hidden" name="asal" value="mmessage_">
                          <input type="hidden" name="user_id1" value="<?php echo e(Auth::user()->id); ?>">
                          <input type="hidden" name="user_id2" value="<?php echo e($user_id_f->id); ?>">

                          <button tipe="submit" class="btn btn-success btn-mini" >Message <img src="themes/images/mail.png" class="img-circle"> </button>
                         </form>
                         </div>

                         </div>
                          <?php endif; ?>
                          <?php endif; ?>
                </td> 
            </tr> 
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <?php endif; ?>
        </div>
        </table>

      </div>
      <div class="modal-footer" style="height: 30px; padding: 0px; margin: 0px;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<!--end follower -->
<!-- followed -->
<div class="modal fade" id="followed" tabindex="-1" role="dialog" aria-labelledby="followed" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="height: 25px; padding-left: 10px; padding-top: 0px; padding-bottom: 0px; margin: 0px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="followed">Followed</h5>
        
      </div>
      <div class="modal-body" style="height: 120px;">
        <table>
        <?php if(!empty($followed)): ?>
            <?php $__currentLoopData = $followed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td>
                  <div style="width: 250px; height: 40px; border: 0px solid;">
                      <div style="width: 40px; height: 40px; border: 0px solid;float: left;">
                          <a href="<?php echo e('@'.$fd->get_followed_user->username); ?>">
                              <?php if(!empty($fd->get_followed_user->image_profil)): ?>
                            <img src="<?php echo e(url('image_user/view/'.$fd->get_followed_user->image_profil)); ?>" class="img-circle" style="width: 30px; height: 30px; float: left; padding: 5px;">
                              <?php else: ?>
                            <img src="themes/images/profil.jpg" class="img-circle" style="width: 30px; height: 30px; float: left; padding: 5px;">
                              <?php endif; ?>
                          </a>
                      </div>
                      <div style="width: 200px; height: 40px; border: 0px solid; padding-top: 4px; float: left">
                      <a href="<?php echo e('@'.$fd->get_followed_user->username); ?>">
                      <h6 style="height: 12px; border: 1px solid; padding: 0px; margin: 0px; "><?php echo e($fd->get_followed_user->name); ?>

                        <?php if(!empty($fd->get_followed_user->verifikasi)): ?>
                        <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;">
                        <?php else: ?>
                        <?php endif; ?>
                      </h6>
                      </a>
                      <div style="height: 11px; font-size: 11px; padding: 0px; margin: 0px;">
                          <p><small><i>@</small><small><?php echo e($fd->get_followed_user->username); ?></i></small></p>
                      </div>
                      
                      </div>
                  </div>
            </td>
            <td>        
                        <?php 
                            $user_id_fd =  $fd->get_followed_user;
                            $follower_id_fd = $follower_user->where('user_id', $user_id_fd->id)->first();
                            $followed_id_fd = $followed_user->where('followed_user_id', $user_id_fd->id)->first();
                         ?>
                       <?php if(auth()->guard()->guest()): ?>
                       <?php else: ?>
                         <?php if($user_id_fd->id == Auth::user()->id): ?>
                          <?php else: ?>
                        <div style="width: 200px; height: 35px; border: 0px solid; float: right;">
                        <div style="width: 80px; float: left;">
                         <?php if(!empty($follower_id_fd)): ?>
                          <form action="<?php echo e(route('follow_delete')); ?>" method="POST">
                          <?php echo e(csrf_field()); ?>

                          <input type="hidden" name="asal" value="<?php echo e('=@'.$user_id_fd->username); ?>">
                          <input type="hidden" name="follower_id" value="<?php echo e($follower_id_fd->follower_id); ?>">
                          <input type="hidden" name="followed_id" value="<?php echo e($followed_id_fd->followed_id); ?>">
                          <input type="hidden" name="username" value="<?php echo e($user_id_fd->username); ?>">
                          <div style="width: 80px; float: left;">
                          <button tipe="submit" class="btn btn-secondary btn-mini" >Followed<img src='themes/images/centang.gif'  class='img-circle' style='width: 20px; height: 15px;'></button>
                          </div>
                          </form> 
                          <?php else: ?>
                         <form action="<?php echo e(route('follow_save')); ?>" method="POST">
                          <?php echo e(csrf_field()); ?>

                          <input type="hidden" name="asal" value="<?php echo e('=@'.$user_id_fd->username); ?>">
                          <input type="hidden" name="user_id" value="<?php echo e($user_id_fd->id); ?>">
                          <input type="hidden" name="follow_user_id" value="<?php echo e(Auth::user()->id); ?>">
                          <input type="hidden" name="username" value="<?php echo e($user_id_fd->username); ?>">
                           <div style="width: 80px; float: left;">
                              <button tipe="submit" class="btn btn-success btn-mini" > Follow <img src='themes/images/plus.jpg'  class='img-circle' style='width: 20px; height: 15px;'></button>
                           </div>
                          </form> 
                            <?php endif; ?>
                                   
                          </button>
                         </form>
                         </div>
                        
                        <div style="width: 80px; float: left;">
                        <form action="<?php echo e(route('message_save')); ?>" method="POST">
                          <?php echo e(csrf_field()); ?>

                          <input type="hidden" name="asal" value="mmessage_">
                          <input type="hidden" name="user_id1" value="<?php echo e(Auth::user()->id); ?>">
                          <input type="hidden" name="user_id2" value="<?php echo e($user_id_fd->id); ?>">

                          <button tipe="submit" class="btn btn-success btn-mini" >Message <img src="themes/images/mail.png" class="img-circle"> </button>
                         </form>
                         </div>

                         </div>
                          <?php endif; ?>
                          <?php endif; ?>
                </td> 
            </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <?php endif; ?>
        </table>
      </div>
      <div class="modal-footer" style="height: 30px; padding: 0px; margin: 0px;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
        
    </div>
  </div>
</div>
<!-- end followed -->

</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('mmaster_beranda', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>