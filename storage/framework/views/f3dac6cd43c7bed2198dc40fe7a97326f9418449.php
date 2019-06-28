<?php $__env->startSection('content'); ?>

<div style="width: 780px; height: auto; border:1px solid; float: left; padding: 5px; ">
  <center><a href="<?php echo e('image_user/view/'.$user_id->image_background); ?>">
    <div style="width: 720px; height: 390px; border:1px solid;  padding: 4px;  <?php if(!empty($user_id->image_background)): ?> background: url(<?php echo e('image_user/view/'.$user_id->image_background); ?>); <?php else: ?> background: url('themes/images/profil_background.jpg'); <?php endif; ?> background-size: 730px; background-repeat: no-repeat; background-position: center;">  
            <div style="width: 710px; height: 290px; border:0px solid; border-color: blue; padding: 0px; ">
              
            </div>
            <div style="width: 710px; height: 90px; border:0px solid; border-color: blue; padding: 4px;">
               <div style="width: 140px; height: 90px; float: left; border:0px solid; border-color: blue; padding: 4px;">
                <center>
                <?php if(!empty($user_id->image_profil)): ?>
                <a href="<?php echo e('image_user/view/'.$user_id->image_profil); ?>"><img style="width:90px; height: 90px; border:1px solid;" src="<?php echo e(url('image_user/view/'.$user_id->image_profil)); ?>"/></a>
                 <?php else: ?>
                 <img style="width:90px; height: 90px; border:1px solid;" src="themes/images/profil.jpg"/>
                 <?php endif; ?> 
                </center>
               </div>
               <div style="width: 550px; height: 50px; float:left; border:0px solid; border-color: green; padding-top: 40px; ">
                    <center>

                    <div style=" width: 350px ; text-align: center; background-color: #F0FFFF;">
                      <table style="width: 350px;border: 1px solid;" class="rounded">
                            <tr>
                              <td><center><?php echo e($count_post_id); ?></center></td>
                              <td><center><?php echo e($count_follower); ?></center></td>
                              <td><center><?php echo e($count_followed - 1); ?></center></td>
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
                        <div style="width: 330px; height: 35px; border: 0px solid; float: right;">
                        <div style="float: left;">
                         <?php if(!empty($follower_id)): ?>
                          <form action="<?php echo e(route('follow_delete')); ?>" method="POST">
                          <?php echo e(csrf_field()); ?>

                          <input type="hidden" name="asal" value="<?php echo e('@'.$user_id->username); ?>">
                          <input type="hidden" name="follower_id" value="<?php echo e($follower_id->follower_id); ?>">
                          <input type="hidden" name="followed_id" value="<?php echo e($followed_id->followed_id); ?>">
                          <input type="hidden" name="username" value="<?php echo e($user_id->username); ?>">
                          <button tipe="submit" class="btn btn-secondary btn-mini" > Followed<img src='themes/images/centang.gif'  class='img-circle' style='width: 20px; height: 15px;'></button>
                         </form>
                          <?php else: ?>
                         <form action="<?php echo e(route('follow_save')); ?>" method="POST">
                          <?php echo e(csrf_field()); ?>

                          <input type="hidden" name="asal" value="<?php echo e('@'.$user_id->username); ?>">
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

                          <input type="hidden" name="asal" value="message_">
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
     <div style="width: 720px; border: 0px solid; clear: left;">
        <div style="width: 165px; border: 0px solid; float: left;">
                  <b><?php echo e($user_id->name); ?></b>                     
                    <?php if(!empty($user_id->verifikasi)): ?><img src="<?php echo e(url('themes/images/verifikasi.png')); ?>" class="img-circle" style="width: 15px; height: 15px; padding: 1px;">
                    <?php else: ?>
                    <?php endif; ?>             
                  <div style="font-size: 10px; padding-right: 20px;">@<i><?php echo e($user_id->username); ?></i></div>
        </div>
        <div style="width: 150px height: 140px border:0px solid; float: right;">
            <div style="width: 130px; border: 0px solid; padding-top: 5px;">
                <div style="text-align: center;">
                <b><?php echo e($rating_user_sum); ?></b>
                </div style="text-align: center;">
                <div style="text-align: center;"> 
                <img src="themes\images\star.png">
                </div>
                <div style="text-align: center;">
                <?php echo e($rating_user_avg); ?><img src="themes\images\user.png"> <?php echo e($count_rating); ?>

                </div>
                <div style="height: 20px; text-align: center; border: 0px solid">
                <form action="<?php echo e(route('rating_save')); ?>" method="POST">
                  <?php echo e(csrf_field()); ?>

                  <input type="hidden" name="user_id" value="<?php echo e($user_id->id); ?>">
                  <?php if(auth()->guard()->guest()): ?> <?php else: ?><input type="hidden" name="rating_pengirim_id" value="<?php echo e(Auth::user()->id); ?>"><?php endif; ?>
                  <input type="hidden" name="username" value="<?php echo e($user_id->username); ?>">
                  <div class="bintang">
                  <input type="hidden" name="asal" value="<?php echo e('@'.$user_id->username); ?>">
                  <input type="image" name="rating_nilai" src="themes\images\star1.png" value="1" />
                  <input type="image" name="rating_nilai" src="themes\images\star1.png" value="2" />
                  <input type="image" name="rating_nilai" src="themes\images\star1.png" value="3" />
                  <input type="image" name="rating_nilai" src="themes\images\star1.png" value="4" />
                  <input type="image" name="rating_nilai" src="themes\images\star1.png" value="5" />
                  </div>
                </form>
                <div style="border: 0px solid;">Beri Rating</div>
                </div>
            </div>
        </div>
    </div>
    </center>
   
   
   <div style=" clear: left; width: 690px; height: 100px; border:0px solid; border-color: blue; padding-left: 25px; padding-top: 20px; padding-bottom: 20px; text-align: left; ">
               <div style="width: 450px; height: 90px; padding-left: 20px; padding-top: 5px; float: left; background-color: #F0FFFF;">
                 <b><?php echo $user_id->desc; ?></b> 

               </div>

            </div>
    
   <div style="width: 770px; height: 40px; border:1px solid; border-color: red; padding: 4px;">
      <div id="myTab">
        <div style="width: 250px; float: left; text-align: center;">
        <a href="#status" data-toggle="tab"><span class="btn" style="width: 32px; height: 32px;""><i><img src="themes/images/post.png" style="width: 30px; height: 30px;"></i></span></a>
        </div>
        <div style="width: 250px; float: left; text-align: center;">
          <a href="#produk" data-toggle="tab"><span class="btn" style="width: 32px; height: 32px;""><i><img src="themes/images/keranjang.png" style="width: 30px; height: 30px;"></i></span></a>
        </div>
        <div style="width: 250px; float: left; text-align: center;">
          <a href="#catatan" data-toggle="tab"><span class="btn" style="width: 32px; height: 32px;""><i><img src="themes/images/blog.png" style="width: 30px; height: 30px;"></i></span></a>
        </div>
      </div>
   </div>
   <div style="width: 757px; height: auto; border:0px solid; border-color: yellow; padding: 10px;">
     
<br class="clr"/>
<div class="tab-content" style="padding: 0px;">
  <div class="tab-pane active" id="status" style=" border: 0px solid; text-align: center; padding-bottom: 0px; margin: 0px;">
    
      <ul class="thumbnails" style="padding: 0px;  margin: 0px;">
        <center>
       <?php if(!empty($post_id)): ?>
            <?php $__currentLoopData = $post_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="span3" style="width: 250px; padding: 0px;  border: 0px solid ; margin: 0px;">
        <div class="thumbnail" style="padding: 0px;  margin: 0px;">
          <center>
          <div style="height: 220px; overflow: hidden; margin: 0px; padding: 0px;">
                <a href="<?php echo e('post_'.$p->post_id); ?>"><img src="<?php echo e(url('image_post/view/'.$p->image_post)); ?>" alt="" style="display: block; height: 100%;  margin: 0px ;padding: 0px;" /></a>
          </div>
          </center>
        </div>
      </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </center>
        </ul>
      
     </div>
  <div class="tab-pane" id="produk">
    <ul class="thumbnails">
       <?php if(!empty($produk_id)): ?>
            <?php $__currentLoopData = $produk_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <li class="span3">
        <div class="thumbnail">
        <a href="produk_<?php echo e($val->produk_id); ?>"><img src="<?php echo e(url('image/view/'.$val->produk_image_src1)); ?>" alt="" style="width: 120px; height: 120px;"/></a>
        <div class="caption">
           <h5><?php echo e($val->produk_name); ?></h5>
           <div style="height: 15px;">
          <p> 
           <?php echo e($val->produk_model); ?>

          </p>
         </div>
           <h4 style="text-align:center" ><a class="btn btn-primary" href="#">Rp.<?php echo e($val->produk_price); ?>,00</a></h4>
             <?php if(auth()->guard()->guest()): ?>

        <form action="register" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>              
                <center><input type="number" name="produk_cart_qty" class="span1" placeholder="Qty."/></center>
                <center>
                <a href="register" class="btn btn-medium btn-primary">Add to <i class=" icon-shopping-cart"></i></a>
                <a href="produk_<?php echo e($val->produk_id); ?>" class="btn btn-medium"><i class="icon-zoom-in"></i></a>
                </center>
        </form>
         <?php else: ?>
          <form action="<?php echo e(route('cart_save')); ?>" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>              
                <input type="hidden" name="user_id" id="" value="<?php echo e(Auth::user()->id); ?>"/>
                <input type="hidden" name="produk_id" id="" value="<?php echo e($val->produk_id); ?>"/>           
                <input type="hidden" name="produk_name" id="" value="<?php echo e($val->produk_name); ?>">
                <input type="hidden" name="produk_price" id="" value="<?php echo e($val->produk_price); ?>"/>
                <input type="hidden" name="produk_image_src1" id="" value="<?php echo e($val->produk_image_src1); ?>"/>
                <center><input type="hidden" name="produk_cart_qty" class="span1" placeholder="Qty." value="1" /></center>
                <center>
                <a href="produk_<?php echo e($val->produk_id); ?>" class="btn btn-medium"><i class="icon-zoom-in"></i></a>
                <button class="btn"> Add to <i class=" icon-shopping-cart"></i></button>
                 </center>
         </form>
         <?php endif; ?>
        </div>
        </div>
      </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      
      </ul>

  </div>

     <div class="tab-pane" id="catatan">
           <div style="width: 750px; height: auto; border: 0px solid; border-color: yellow;">
           <div style="width: 700px; height: 40px; border: 0px solid;">
              
           </div>
           <div style="width: 500px; height: auto; border: 0px solid; float: left; padding: 5px;">
             
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
           <div style="width: 230px; height: auto; border: 0px solid; float: left; padding: 3px;">
               <?php if(!empty($catatan)): ?>
                 <?php $__currentLoopData = $catatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <h5 style="border: 0px solid;"><img src="themes/images/blog.png" style="width: 15px; height: 15px;"><?php echo e($c->catatan_judul); ?></h5>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <?php endif; ?>
           </div>
        </div>

    </div>   
</div>
 

<br/>

<div class="container">
  
  <div class="row" style="width: 790px; height: 200px; ;float: left; padding-left: 15px;">
  <!-- Elemen yang akan menjadi kontainer peta -->
    <div id="googleMap" style="width:100%;height:200px;"></div>
  </div>
</div>

<!-- Button trigger modal -->

<!-- Modal follower-->
<div class="modal fade" id="follower" tabindex="-1" role="dialog" aria-labelledby="follower" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="follower">Follower</h5>
        
      </div>
      <div class="modal-body">
        <table>
        <div>
          <?php if(!empty($follower)): ?>
            <?php $__currentLoopData = $follower; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td>
               <div style="width: 250px; height: 50px; border: 0px solid;">
                  <div style="width: 50px; height: 50; border: 0px solid;">
                      <a href="<?php echo e('@'.$fr->get_follower_user->username); ?>">
                         <?php if(!empty($fr->get_follower_user->image_profil)): ?>
                        <img src="<?php echo e(url('image_user/view/'.$fr->get_follower_user->image_profil)); ?>" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 5px;">
                         <?php else: ?>
                         <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 5px;">
                         <?php endif; ?>
                      </a>
                  </div>
                  <div style="width: 200px; height: 40px; border: 0px solid; padding-top: 4px;">
                      <a href="<?php echo e('@'.$fr->get_follower_user->username); ?>">
                      <h5 style="margin: 4px;" ><?php echo e($fr->get_follower_user->name); ?>

                        <?php if(!empty($fr->get_follower_user->verifikasi)): ?>
                        <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;">
                        <?php else: ?>
                        <?php endif; ?>
                  <div style="font-size: 13px;">
                  <p><small><i>@</small><small><?php echo e($fr->get_follower_user->username); ?></i></small></p>
                  </div>
                  </h5>
                  </a>
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
                        <div style="width: 330px; height: 35px; border: 0px solid; float: right;">
                        <div style="float: left;">
                         <?php if(!empty($follower_id_f)): ?>
                          <form action="<?php echo e(route('follow_delete')); ?>" method="POST">
                          <?php echo e(csrf_field()); ?>

                          <input type="hidden" name="asal" value="<?php echo e('@'.$user_id_f->username); ?>">
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

                          <input type="hidden" name="asal" value="<?php echo e('@'.$user_id_f->username); ?>">
                          <input type="hidden" name="user_id" value="<?php echo e($user_id_f->id); ?>">
                          <input type="hidden" name="follow_user_id" value="<?php echo e(Auth::user()->id); ?>">
                          <input type="hidden" name="username" value="<?php echo e($user_id_f->username); ?>">
                          <div style="width: 80px;">
                          <button tipe="submit" class="btn btn-success btn-mini" >Follow <img src='themes/images/plus.jpg'  class='img-circle' style='width: 20px; height: 15px;'></button>
                          </div>
                          </form>
                            <?php endif; ?>
            
                           
                          </button>
                         </form>
                         </div>
                        
                        <div style="float: left;">
                        <form action="<?php echo e(route('message_save')); ?>" method="POST">
                          <?php echo e(csrf_field()); ?>

                           <input type="hidden" name="asal" value="message_">
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
      <div class="modal-footer">
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
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="followed">Followed</h5>
        
      </div>
      <div class="modal-body">
        <table>
        <?php if(!empty($followed)): ?>
            <?php $__currentLoopData = $followed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td>
                  <div style="width: 250px; height: 50px; border: 0px solid;">
                      <div style="width: 50px; height: 50; border: 0px solid;">
                          <a href="<?php echo e('@'.$fd->get_followed_user->username); ?>">
                              <?php if(!empty($fd->get_followed_user->image_profil)): ?>
                            <img src="<?php echo e(url('image_user/view/'.$fd->get_followed_user->image_profil)); ?>" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 5px;">
                              <?php else: ?>
                            <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 5px;">
                              <?php endif; ?>
                          </a>
                      </div>
                      <div style="width: 200px; height: 40px; border: 0px solid; padding-top: 4px;">
                      <a href="<?php echo e('@'.$fd->get_followed_user->username); ?>">
                      <h5 style="margin: 4px;" ><?php echo e($fd->get_followed_user->name); ?>

                        <?php if(!empty($fd->get_followed_user->verifikasi)): ?>
                        <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;">
                        <?php else: ?>
                        <?php endif; ?>
                      <div style="font-size: 13px;">
                          <p><small><i>@</small><small><?php echo e($fd->get_followed_user->username); ?></i></small></p>
                      </div>
                      </h5>
                      </a>
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
                        <div style="width: 330px; height: 35px; border: 0px solid; float: right;">
                        <div style="float: left;">
                         <?php if(!empty($follower_id_fd)): ?>
                          <form action="<?php echo e(route('follow_delete')); ?>" method="POST">
                          <?php echo e(csrf_field()); ?>

                          <input type="hidden" name="asal" value="<?php echo e('@'.$user_id_fd->username); ?>">
                          <input type="hidden" name="follower_id" value="<?php echo e($follower_id_fd->follower_id); ?>">
                          <input type="hidden" name="followed_id" value="<?php echo e($followed_id_fd->followed_id); ?>">
                          <input type="hidden" name="username" value="<?php echo e($user_id_fd->username); ?>">
                          <div style="width: 80px;">
                          <button tipe="submit" class="btn btn-secondary btn-mini" >Followed<img src='themes/images/centang.gif'  class='img-circle' style='width: 20px; height: 15px;'></button>
                          </div>
                          </form> 
                          <?php else: ?>
                         <form action="<?php echo e(route('follow_save')); ?>" method="POST">
                          <?php echo e(csrf_field()); ?>

                          <input type="hidden" name="asal" value="<?php echo e('@'.$user_id_fd->username); ?>">
                          <input type="hidden" name="user_id" value="<?php echo e($user_id_fd->id); ?>">
                          <input type="hidden" name="follow_user_id" value="<?php echo e(Auth::user()->id); ?>">
                          <input type="hidden" name="username" value="<?php echo e($user_id_fd->username); ?>">
                           <div style="width: 80px;">
                              <button tipe="submit" class="btn btn-success btn-mini" > Follow <img src='themes/images/plus.jpg'  class='img-circle' style='width: 20px; height: 15px;'></button>
                           </div>
                          </form> 
                            <?php endif; ?>
                                   
                          </button>
                         </form>
                         </div>
                        
                        <div style="float: left;">
                        <form action="<?php echo e(route('message_save')); ?>" method="POST">
                          <?php echo e(csrf_field()); ?>

                          <input type="hidden" name="asal" value="message_">
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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
        
    </div>
  </div>
</div>
<!-- end followed -->

</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('master_beranda_id', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>