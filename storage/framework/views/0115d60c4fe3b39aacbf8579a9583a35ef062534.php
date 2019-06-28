<?php $__env->startSection('content'); ?>

<div style="width: 545px; height: auto; border: 1px solid; padding-right: 5px;">
  <div style="width: 40px; height: 40px; border: 0px solid; border-color: red; float: right;">
    <a href="<?php echo e('=@'.$post_user->get_post_user->username.'#'.$post_user->post_id); ?>"><img src="themes\images\x.png"></a>
  </div>
  
  <div style="width: 500px; height: 50px; border: 1px solid; float: left;">
    <div style="width: 40px; height: 50px; float: left;">
     <a href="<?php echo e('=@'.$post_user->get_post_user->username); ?>">
        <?php if(!empty($post_user->get_post_user->image_profil)): ?>
      <img src="<?php echo e(url('image_user/view/'.$post_user->get_post_user->image_profil)); ?>" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 0px;"> 
        <?php else: ?>
          <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 0px;"> 
        <?php endif; ?>
      </a>
     </div>
     <div style="width: 450px;  height: 25px; border: 1px solid; float: left;">
        <div style="width: 450px; height: 20px; border: 1px solid; float: left; padding-top: 5px;">
         <a href="<?php echo e('=@'.$post_user->get_post_user->username); ?>">
           <b><?php echo e($post_user->get_post_user->name); ?></b>
            <?php if(!empty($post_user->get_post_user->verifikasi)): ?>
            <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 0px;">
            <?php else: ?>
          
            <?php endif; ?>
          </a>
        </div>
        <div style="width: 450px; height: 10px; margin: 0px; padding: 0px;">
              <div style="width: 180px; height: 10px; border: 1px solid; font-size: 13px; float: left; padding: 0px; margin: 0px;">
                  <small><i style="margin: 0px; padding: 0px;">@</i></small><small><i><?php echo e($post_user->get_post_user->username); ?></i></small>
              </div>
              <div style="width: 250px; height: 15px; border: 1px solid; float: left; padding-left: 10px;">
                  <?php if(!empty($post_detail->lokasi)): ?>
                    <img src="themes/images/alamat.jpg" style="height: 15px; float: left; padding-right: 3px;"/><?php echo e($post_detail->lokasi); ?>

                  <?php else: ?>
                  <?php endif; ?>
              </div>
        </div>
    </div>
  </div>
  <div style="width: 500px; height: 400px; border: 1px solid; border-color: red;">
  	  <div style="width: 500px;  height: 350px;  border: 1px solid; overflow: hidden; margin: 0px;">
  	  <center>
        <div id="gallery" cclass="carousel-inner" style="width: 500px; height: 350px; border: 1px solid;">
            <a href="<?php echo e(url('image_post/view/'.$post_detail->image_post)); ?>" title="<?php echo e($post_detail->status); ?>">
              <img src="<?php echo e(url('image_post/view/'.$post_detail->image_post)); ?>" style="height: 350px;" alt="<?php echo e($post_detail->status); ?>"/>
            </a>
        </div>
        </center>
      </div>
  	  </div>
  	   
      <div style="width: 300px; height: 40px; border: 1px solid; float: left; padding-top: 10px; padding-left: 10px; padding-bottom: 0px;">
          <div style="width: 60px height 25px; float: left; border: 1px solid; border-color: red">
               
                <?php if(auth()->guard()->guest()): ?>
                    <a href="login">
                       <button  class="img-circle" style="background-color: white; width: 37px; height: 35px;">
                            <img src="themes/images/lol.jpg">
                        </button>
                    </a> 
                <?php else: ?>
                  <?php if(!empty($likes_post_user_id)): ?>
                      <form action="<?php echo e('like_id/delete/'.$likes_post_user_id->like_id); ?>" method="POST">
                                            <?php echo e(csrf_field()); ?>

                                            <input type="hidden" name="post_id" value="<?php echo e($post_user->post_id); ?>">
                                            <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                                            <button tipe="submit" class="img-circle" style="background-color: white; width: 37px; height: 35px;">
                                              <img src="themes/images/lolid.jpg"> 
                                               </button> 
                                              </form>
                                             <?php else: ?>
                                            <form action="<?php echo e(route('like_post_id_save')); ?>" method="POST">
                                            <?php echo e(csrf_field()); ?>

                                            <input type="hidden" name="post_id" value="<?php echo e($post_user->post_id); ?>">
                                            <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                                            <button tipe="submit" class="img-circle" style="background-color: white; width: 37px; height: 35px;">
                                                <img src="themes/images/lol.jpg">
                                               </button>
                                              </form>
                   <?php endif; ?>
                <?php endif; ?> 
            	<!-- -->
            
            
            </div>
          <button class="img-circle"  style="background-color: white; width: 37px; height: 35px;"><img src="themes/images/comment.png"> </button>
            <button  class="img-circle" data-toggle="modal" data-target="#share" style="background-color: white; width: 37px; height: 35px;"><img src="themes/images/right.png"> </button>
          
               <!-- Modal share-->
                                          <div style="padding-top: 0px; ">
                                            <div class="modal fade" id="share" tabindex="-1" role="dialog" aria-labelledby="share" aria-hidden="true" style="width: 450px; padding-bottom: 0px; margin-bottom: 0px;">
                                                <div class="modal-dialog" role="document"  style="width:450px; padding-bottom: 0px; margin-bottom: 0px;">
                                                    <div class="modal-content"  style="width: 450px; padding-bottom: 0px; margin-bottom:  0px;">
                                                      <div class="modal-header" style="width: 420px; height: 40px; border: 0px solid">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="tutup"><span aria-hidden="true">&times;</span></button>
                                                          <div style="width: 400px; height: auto; border: 0px solid; border-color: red;  padding-left: 0px; padding-top: 0px; padding-right: 0px;">
                                                              <div style="width: 30px; border: 0px solid; float: left; padding-left: 0px; padding-top: 0px;">
                                                                <button data-dismiss="modal" class="img-circle"  aria-label="kembali" style="float: left; padding: 0px;margin: 0px;">
                                                                    <img src="themes/images/kembali.png"  class="img-circle" style="width: 25px;">
                                                                </button>
                                                              </div>
                                                          <div style="width: 300px; height: auto; border: 0px solid; float: left; padding-top: 0px;"> <h3>Share</h3>           
                                                           </div>
                                                        </div>
                                                        <hr class="soft">
                                                      </div>
                                                  <div class="modal-body" style="width: 420px; height: 100px; border: 0px solid;" >
                                                    <!-- isi modul -->   
                                                    <center>
                                                     <div style="width: 180px; height: 40px; border: 0px solid; padding-top: 65px; padding-left: 30px;">
                                                       <div style="width: 40px; height: 40px; border: 0px solid; float: left;">
                                                         <button tipe="submit" class="img-circle"  style="background-color: white; width: 40px; height: 40px; padding: 0px; margin: 0px;">
                                                           <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://lolid.xyz/post_<?php echo e($post_user->post_id); ?>;src=sdkpreparse" >
                                                            <img src="themes/images/facebook.jpg"  class="img-circle" style="width: 40px;">
                                                            </a>
                                                          </button>
                                                       </div>
                                                       <div style="width: 50px; height: 40px; border: 0px solid; float: left;">
                                                         <button tipe="submit" class="img-circle"  style="background-color: white; width: 40px; height: 40px; padding: 0px; margin: 0px;">
                                                          <a target="_blank"  class="twitter-share-button" href="https://twitter.com/intent/tweet?text=https://lolid.xyz/post_<?php echo e($post_user->post_id); ?>">
                                                            <img src="themes/images/twitter.jpg"  class="img-circle" style="width: 40px;">
                                                          </a>
                                                          </button>
                                                       </div>
                                                       <div style="width: 50px; height: 40px; border: 0px solid; float: left;">
                                                         <button tipe="submit" class="img-circle"  style="background-color: white; width: 40px; height: 40px; padding: 0px; margin: 0px;">
                                                          <a target="_blank"  href="https://web.whatsapp.com://send?text=https://lolid.xyz/post_<?php echo e($post_user->post_id); ?>">
                                                           <img src="themes/images/wa.png"  class="img-circle" style="width: 50px;">
                                                         </a>
                                                          </button>
                                                       </div>
                                                       
                                                     </div>
                                                   </center>
                                                
                                                </div>
                                              </div>
                                        </div>
                                                  <!-- end isi modul -->
                            <div class="modal-footer" style="height: 20px; padding-top: 0px;">
                              <div  style="width: 400px; border: 0px solid; padding-left: 20px;">            
                                      <div style="width: 350px; padding-left: 1px; border: 0px solid; float: left;" >
            
                                      </div>
                                      <div style="width: 50px; float: right; border: 0px solid; padding-top: 5px;">
                                           <i class="btn btn-secondary btn-mini" data-dismiss="modal">Close</i>
                                      </div>
                              </div>
                         </div>
                        </div>
                      </div>
                  <!--end modul -->                             
 
            	<!-- -->
              
          </div>
          <div style="width: 150px; float: right; text-align: right;  border: 1px solid; padding-top: 5px; padding-right: 50px;">
          <i><?php echo e($post_user->created_at); ?></i>
          </div>
        
        <div class="clr" id="myTab" style="width: 300px; padding-left: 10px; padding-top: 0px;">
            
            	  <div style="width: 55px; border: 0px solid; float: left;">
                   <div id="<?php echo e($post_detail->post_id); ?>"> <a href="" data-toggle="modal" data-target="#likes"><?php echo e($count_likes); ?> <img src="themes/images/lol.jpg" style="width: 40%"> </a>
                   </div>
                </div>
                <div style="width: 100px; border: 0px solid; float: left;">
                   <div id="<?php echo e($post_detail->post_id); ?>"> <?php echo e($count_comment); ?> <img src="themes/images/comment.png" style="width: 22%"></div>
                </div>
                       <p class="clr"></p>	
               <div style="width: 430px; height: 15px; border: 0px solid; text-align: left; float: left;">

                                      <?php if(!empty($count_likes != 0)): ?>
                                        <div style="width: auto; height: 15px; float: left; padding-top: 2px;">
                                          <?php $__currentLoopData = $likes_post_user_limit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         
                                              <a href="<?php echo e('=@'.$lu->get_like_user->username); ?>">
                                                <?php if(!empty($lu->get_like_user->image_profil)): ?>
                                                <img src="<?php echo e(url('image_user/view/'.$lu->get_like_user->image_profil)); ?>" class="img-circle" style="width: 13px; height: 13px; float: left; padding-top: 1px;">
                                                <?php else: ?>
                                                <img src="themes/images/profil.jpg" class="img-circle" style="width: 15px; height: 15px; float: left; padding: 0px;">
                                                <?php endif; ?>
                                              </a>
                                         
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <div style="width: 410px; height: 15px; padding-bottom: 0px;  border: 0px solid; padding-left: 5px; ">
                                          <?php $__currentLoopData = $likes_post_user_limit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <b style="font-size: 10px; font-style: italic;">
                                            <a href="<?php echo e('=@'.$lp->get_like_user->username); ?>">
                                               <?php if(auth()->guard()->guest()): ?>

                                               <?php else: ?>
                                                <?php if($lp->get_like_user->id == Auth::user()->id): ?>
                                                   Anda

                                                <?php else: ?>
                                                  <?php echo e($lp->get_like_user->name); ?>

                                                <?php endif; ?>
                                              <?php endif; ?>
                                            </a>
                                            </b>
                                            ,
                                           
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          <?php if($count_likes >= 3): ?>
                                             <i class="btn btn-secondary" data-toggle="modal" data-target="#likes" style=" height: 10px; padding: 0px ; margin: 0px; font-size: 10px;"> <sup><b>dan <?php echo e($count_likes-2); ?> lainnya</b></sup></i>
                                            <i style="padding-left: 5px; font-size: 10px;">menyukai</i>
                        
                                           
                                                <!-- Modal likes-->
                                          <div style="padding-top: 0px; ">
                                            <div class="modal fade" id="likes" tabindex="-1" role="dialog" aria-labelledby="likes" aria-hidden="true" style="width: 450px; padding-bottom: 0px; margin-bottom: 0px;">
                                                <div class="modal-dialog" role="document"  style="width: 450px; padding-bottom: 0px; margin-bottom: 0px;">
                                                    <div class="modal-content"  style="width: 450px;padding-bottom: 0px; margin-bottom:  0px;">
                                                      <div class="modal-header" style="width: 420px; height: 40px; border: 0px solid">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="tutup"><span aria-hidden="true">&times;</span></button>
                                                          <div style="width: 350px; height: auto; border: 0px solid; border-color: red;  padding-left: 0px; padding-top: 0px; padding-right: 0px;">
                                                              <div style="width: 30px; border: 0px solid; float: left; padding-left: 0px; padding-top: 0px;">
                                                                <button data-dismiss="modal" class="img-circle"  aria-label="kembali" style="float: left; padding: 0px;margin: 0px;">
                                                                    <img src="themes/images/kembali.png"  class="img-circle" style="width: 25px;">
                                                                </button>
                                                              </div>
                                                          <div style="width: 300px; height: auto; border: 0px solid; float: left; padding-top: 0px;"> <b>Likes</b>           
                                                           </div>
                                                        </div>
                                                        <hr class="soft">
                                                      </div>
                                                  <div class="modal-body" style="width: 420px; height: 150px; border: 0px solid;" >
                                                    <!-- isi modul -->   
                                                      
                                                      
                                                      <?php if(!empty($likes_user)): ?>
                                                            <?php $__currentLoopData = $likes_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lpu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                         <?php 
                                                           $user_id_f =  $lpu->get_like_user;
                                                         
                                                         ?>
                                                       
                                                              <div style="width: 420px; height: 40px; border: 1px solid; float: left;">
                                                                <div style="width: 40px; height: 40px; border: 1px solid; float: left;">
                                                                  <a href="<?php echo e('=@'.$lpu->get_like_user->username); ?>">
                                                                      <?php if(!empty($lpu->get_like_user->image_profil)): ?>
                                                                        <img src="<?php echo e(url('image_user/view/'.$lpu->get_like_user->image_profil)); ?>" class="img-circle" style="width: 30px; height: 30px; float: left; padding: 5px;">
                                                                      <?php else: ?>
                                                                        <img src="themes/images/profil.jpg" class="img-circle" style="width: 30px; height: 30px; float: left; padding: 5px;">
                                                                      <?php endif; ?>
                                                                  </a>
                                                              </div>
                                                              <div style="width: 190px; height: 40px; border: 1px solid; float: left; ">
                                                                <div style="width: 180px; border: 1px solid;">
                                                                     <a href="<?php echo e('=@'.$lpu->get_like_user->username); ?>">
                                                                          <div style="width: 180px; height: 13px; border: 1px solid;padding-top: 4px;"><b><?php echo e($lpu->get_like_user->name); ?></b>
                                                                             <?php if(!empty($lpu->get_like_user->verifikasi)): ?>
                                                                                <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;">
                                                                            <?php else: ?>
                                                                            <?php endif; ?>
                                                                      </div>
                                                                     </a>
                                                                
                                                                       <div style="font-size: 10px;">
                                                                              <small><i>@</i></small><small><i><?php echo e($lpu->get_like_user->username); ?></i></small>
                                                                        </div> 
                                                               </div>
                                                             </div>
                                                         
                                                          
                                                      
                                                        <?php if(auth()->guard()->guest()): ?>
                                                        <?php else: ?>
                                                        <?php if($user_id_f->id == Auth::user()->id): ?>
                                                          <?php else: ?>
                                                          <div style="width: 150px; height: 25px; border: 1px solid; float: left; padding-top: 10px;">
                                                             <div style="float: left;">
                                                               <?php if(!empty($follower_id_f)): ?>
                                                                  <form action="<?php echo e(route('follow_delete')); ?>" method="POST">
                                                                  <?php echo e(csrf_field()); ?>

                                                                      <input type="hidden" name="follower_id" value="<?php echo e($follower_id_f->follower_id); ?>">
                                                                      <input type="hidden" name="followed_id" value="<?php echo e($followed_id_f->followed_id); ?>">
                                                                      <input type="hidden" name="username" value="<?php echo e($user_id_f->username); ?>">
                                                                      <button tipe="submit" class="btn btn-success btn-mini" >Followed<img src='themes/images/centang.gif'  class='img-circle' style='width: 20px; height: 15px;'>
                                                                      </button>
                                                                  </form> 
                                                                <?php else: ?>
                                                                  <form action="<?php echo e(route('follow_save')); ?>" method="POST">
                                                                  <?php echo e(csrf_field()); ?>

                                                                      <input type="hidden" name="user_id" value="<?php echo e($user_id_f->id); ?>">
                                                                      <input type="hidden" name="follow_user_id" value="<?php echo e(Auth::user()->id); ?>">
                                                                      <input type="hidden" name="username" value="<?php echo e($user_id_f->username); ?>">
                                                                      <button tipe="submit" class="btn btn-success btn-mini" >Follow <img src='themes/images/plus.jpg'  class='img-circle' style='width: 20px; height: 15px;'> 
                                                                   </button>
                                                                  </form>
                                                                <?php endif; ?>
                                                        </div> 
                                                        <div style="float: left;">
                                                            <form action="<?php echo e(route('message_save')); ?>" method="POST">
                                                                  <?php echo e(csrf_field()); ?>

                                                                  <input type="hidden" name="user_id1" value="<?php echo e(Auth::user()->id); ?>">
                                                                  <input type="hidden" name="user_id2" value="<?php echo e($user_id_f->id); ?>">
                                                                  <button tipe="submit" class="btn btn-success btn-mini" >Message <img src="themes/images/mail.png" class="img-circle"> </button>
                                                            </form>
                                                        </div>
                                                     </div>
                                                   <?php endif; ?>
                                                <?php endif; ?>
                                         </div>      
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>    
                        </div>
                          <!-- end isi modul -->
                        <div class="modal-footer" style="width: 420px; height: 20px; padding-top: 0px;">
                              <div  style="width: 400px; border: 0px solid; padding-left: 20px;">            
                                      <div style="width: 300px; padding-left: 1px; border: 0px solid; float: left;" >
            
                                      </div>
                                      <div style="width: 50px; float: right; border: 0px solid; padding-top: 5px;">
                                           <i class="btn btn-secondary btn-mini" data-dismiss="modal">Close</i>
                                      </div>
                              </div>
                         </div>
                        </div>
                      </div>
                  <!--end modul --> 
                                          <?php endif; ?>
                                          <?php if($count_likes <= 2): ?>
                                          <i style="padding-left: 5px; font-size: 10px;">menyukai</i>
                                          <?php else: ?>
                                          <?php endif; ?>
                                        </div>
                                        <?php else: ?>
                                        <?php endif; ?>                  
                  </div>

        </div>
 
  </div>
  </div>
  <br clear="clr">
  <!-- menu bawah -->
  <div style="width: 500px; height: auto; border: 1px solid; border-color: red; padding-bottom: 30px;">
  	 <div style="width: 370px; border: 1px solid; padding: 5px; float: left;">
            <div><a href="<?php echo e('=@'.$post_user->get_post_user->username); ?>"><b><?php echo e($post_user->get_post_user->name); ?> 
                <?php if(!empty($post_user->get_post_user->verifikasi)): ?>
              <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;"> 
               <?php else: ?>
               <?php endif; ?>
            </b></a><?php echo e($post_user->status); ?>

          </div>
      </div>
      <div style="height: 10px; float:right; text-align: right; font-size:10px;">
                <div style="padding-top: 15px; float: left;">
                 <i ><?php echo e($post_user->updated_at); ?></i>
                 </div>
                    <div style="width: 10px; height: 10px; border: 1px solid; float: right; padding-top: 10px; padding-left: 5px;">
        <?php if(auth()->guard()->guest()): ?>
        <?php else: ?>
        <?php if($post_user->get_post_user->id == Auth::user()->id): ?>
         <a class="btn btn-mini" data-toggle="modal" data-target="#editpost" style="width: 13px;  padding: 0px; margin: 0px;"><img src="themes\images\edit.png" ></a>
        <?php else: ?>
        <?php endif; ?>
        <?php endif; ?>
                   </div>
      <!-- Modal edit post-->
<div class="modal fade" id="editpost" tabindex="-1" role="dialog" aria-labelledby="editpost" aria-hidden="true" style="width: 450px;">
<div class="modal-dialog" role="document" style="width: 450px;">
  <div class="modal-content" style="width: 430px;">
    <div class="modal-header" style="width: 430px; height: 30px;">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    
      <h5 class="modal-title" id="edit_post"><div style="text-align: left;">Edit Post</div></h5>
      
    </div>
    <div class="modal-body" style="width: 420px; height: 120px;">
      <form action="<?php echo e(route('post_update')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                 <input type="hidden" name="asal" value="post=m_<?php echo e($post_user->post_id); ?>">
                <input type="hidden" name="post_id" value="<?php echo e($post_user->post_id); ?>">
                <textarea style="width: 400px; height: 90px" name="status"> <?php echo e($post_user->status); ?> </textarea>
                <center><button type="submit" class="btn btn-primary btn-mini">update</button></center>
     </form>
    </div>
    <div class="modal-footer" style="width: 420px; height: 20px;">
      <div style="width: 160px; height: 20px; float: left; border: 0px solid; text-align: left;">
        <form action="<?php echo e(route('post_delete')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="asal" value="<?php echo e('=@'.$post_user->get_post_user->username); ?>">
                <input type="hidden" name="post_id" value="<?php echo e($post_user->post_id); ?>">
        <button type="submit" class="btn btn-danger btn-mini">Delete</button>
      </form>
      </div>

     <div style="width: 160px; height: 20px; float: right; border: 0px solid">
      <button type="button" class="btn btn-secondary btn-mini" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
<!--end edit post -->

      
      </div>
      
       
      <br/>
        <div style="padding-left: 10px;">
         <?php if(!empty($comment_post)): ?>
            <?php $__currentLoopData = $comment_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         
         <div style="width: 500px; height: auto; border: 1px solid; float: left; padding: 0px; margin: 0px;">
              <div style="width: 500px; border: 0px solid;">
                <?php if(!empty($cp->get_comment_user->image_profil)): ?>
              <img src="<?php echo e(url('image_user/view/'.$cp->get_comment_user->image_profil)); ?>" class="img-circle" style="width: 25px; height: 25px; float: left;">
               <?php else: ?>
               <img src="themes/images/profil.jpg" class="img-circle" style="width: 25px; height: 25px; float: left;">
               <?php endif; ?>   
               <div style="width: 480px; height: auto; border: 1px solid;">
               <a href="<?php echo e('=@'.$cp->get_comment_user->username); ?>"><b><?php echo e($cp->get_comment_user->name); ?>

                <?php if(!empty($cp->get_comment_user->verifikasi)): ?>
                <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;"> 
                <?php else: ?>
                <?php endif; ?>
                </b></a>
                   <?php echo e($cp->comment_desc); ?>

                 
                   <div style="width: 70px; height: 10px; text-align: right; float:right; font-size:7px; padding-top: 5px;">
                    <i><?php echo e($cp->updated_at); ?></i>
                    <?php if(auth()->guard()->guest()): ?>
                    <?php else: ?>
                      <?php if($cp->get_comment_user->id == Auth::user()->id || $post_user->get_post_user->id == Auth::user()->id): ?>
                     <div style="float: right; height: 10px;">
                        <form action="<?php echo e('comment_id/delete/'.$cp->comment_id); ?>" method="post">                     
                                <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="asal" value="<?php echo e('post=m_'.$cp->post_id); ?>">
                        <button class="btn" type="submit" style="height: 8px; padding: 0px;  margin: 0px;"><img src="themes\images\edit1.png" style="padding-bottom: 13px; margin: 0px;"> </button>
                        </form>
                      </div> 
                    
                     <?php else: ?>
                
                     <?php endif; ?>
                    <?php endif; ?>
                  </div>
              </div>
            <br/>
          </div>
        </div>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <?php endif; ?>
         </div>
      <div class="span4" style="border: 0px solid; padding-bottom: 40px;">            
         <div style="width: 500px; padding-left: 0px">
              <?php if(auth()->guard()->guest()): ?>
              <?php else: ?>
              <form action="<?php echo e(route('comment_post_id_save')); ?>" method="POST">
              <?php echo e(csrf_field()); ?>

              <div style="width: 38px; float: left; border: 0px solid; padding-top: 5px;"><a href="">

                <?php if(!empty(Auth::user()->image_profil)): ?>
                <img src="<?php echo e(url('image_user/view/'.Auth::user()->image_profil)); ?>" class="img-circle" style="width: 35px; height: 35px; float: left;"> 
                <?php else: ?>
                <img src="themes/images/profil.jpg" class="img-circle" style="width: 35px; height: 35px; float: left;">
                <?php endif; ?>
              </a>
              </div>
              
              <div style=" width: 360px; float: left; padding-top: 9px; padding-right: 5px; border: 0px solid;">
              
              <input type="hidden" name="post_id" value="<?php echo e($post_user->post_id); ?>">
              <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
              <input type="hidden" name="asal" value="<?php echo e('post=m_'.$post_user->post_id); ?>">
              <input type="text" name="comment_desc" placeholder="add your comment" style="width: 355px; height: 15px; border: 0px;">
              </div>
              <div style="width: 80px; float: left; padding-top: 8px; padding-left: 5px; border: 0px;">
              <input class="btn btn-success btn-mini" type="submit" value="comment">
              </div>
              
              
            </form>
            <?php endif; ?>
         </div>
        
        <br class="clr"/>
      </div>
        
  </div>
</div>          
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('mmaster_post1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>