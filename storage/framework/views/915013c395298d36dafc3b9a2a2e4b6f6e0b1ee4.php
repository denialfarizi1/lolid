<?php $__env->startSection('content'); ?>

<div style="width: 1150px; height: 700px; border: 0px solid; padding-left: 5px; padding-right: 5px;">
  <div style="width: 800px; height: 700px; border: 0px solid; border-color: red; float: left;">
      <div style="width: 790px; height: 30px; border: 0px solid; padding-left: 40px; padding-top: 5px;">
        <?php if(!empty($post_detail->lokasi)): ?>
        <img src="themes/images/alamat.jpg" style="width: 20px; padding-right: 5px;" /><?php echo e($post_detail->lokasi); ?>

        <?php else: ?>
        <?php endif; ?>
      </div>
  	  <div style="width: 790px;  height: 490px;  border: 0px solid; overflow: hidden; margin: 0px; padding: 0px;">
  	  <center><img src="<?php echo e(url('image_post/view/'.$post_detail->image_post)); ?>" style="display: block; height: 490px ;  margin: 0px; padding: 0px;"> </center>
  	  </div>
  	   <tr>
          <div style="width: 300px; height: 40px; border: 0px solid; float: left; padding-top: 10px; padding-left: 30px; padding-bottom: 0px;">
            <div style="width: 60px height 25px; float: left; border: 0px solid; border-color: red">
               <td>
                <?php if(auth()->guard()->guest()): ?>
                    <a href="login"><img src="themes/images/lolid.jpg"></a> 
                <?php else: ?>
                  <?php if(!empty($likes_post_user_id)): ?>
                      <form action="<?php echo e('like_id/delete/'.$likes_post_user_id->like_id); ?>" method="POST">
                                            <?php echo e(csrf_field()); ?>

                                            <input type="hidden" name="asal" value="<?php echo e('post_'.$post_user->post_id); ?>">
                                            <input type="hidden" name="post_id" value="<?php echo e($post_user->post_id); ?>">
                                            <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                                            <button tipe="submit" class="img-circle" style="background-color: white; width: 37px; height: 35px;">
                                              <img src="themes/images/lolid.jpg"> 
                                               </button>
                                              </form>
                                             <?php else: ?>
                                            <form action="<?php echo e(route('like_post_id_save')); ?>" method="POST">
                                            <?php echo e(csrf_field()); ?>

                                            <input type="hidden" name="asal" value="<?php echo e('post_'.$post_user->post_id); ?>">
                                            <input type="hidden" name="post_id" value="<?php echo e($post_user->post_id); ?>">
                                            <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                                            <button tipe="submit" class="img-circle" style="background-color: white; width: 37px; height: 35px;">
                                                <img src="themes/images/lol.jpg">
                                               </button>
                                              </form>
                   <?php endif; ?>
                <?php endif; ?> 
            	<!-- -->
            
            </td>
            </div>
          <td><a href="<?php echo e('post_'.$post_user->post_id); ?>" style="background-color: white;"><button tipe="submit" class="img-circle" style="background-color: white; width: 37px; height: 35px;"><img src="themes/images/comment.png"> </button></a></td>
          <td>
            <button tipe="submit" class="img-circle" data-toggle="modal" data-target="#share" style="background-color: white; width: 37px; height: 35px;"><img src="themes/images/right.png"> </button>
          </td>
               <!-- Modal share-->
                                          <div style="padding-top: 0px; ">
                                            <div class="modal fade" id="share" tabindex="-1" role="dialog" aria-labelledby="share" aria-hidden="true" style="padding-bottom: 0px; margin-bottom: 0px;">
                                                <div class="modal-dialog" role="document"  style="padding-bottom: 0px; margin-bottom: 0px;">
                                                    <div class="modal-content"  style="padding-bottom: 0px; margin-bottom:  0px;">
                                                      <div class="modal-header" style="width: 520px; height: 40px; border: 0px solid">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="tutup"><span aria-hidden="true">&times;</span></button>
                                                          <div style="width: 500px; height: auto; border: 0px solid; border-color: red;  padding-left: 0px; padding-top: 0px; padding-right: 0px;">
                                                              <div style="width: 30px; border: 0px solid; float: left; padding-left: 0px; padding-top: 0px;">
                                                                <button data-dismiss="modal" class="img-circle"  aria-label="kembali" style="float: left; padding: 0px;margin: 0px;">
                                                                    <img src="themes/images/kembali.png"  class="img-circle" style="width: 25px;">
                                                                </button>
                                                              </div>
                                                          <div style="width: 465px; height: auto; border: 0px solid; float: left; padding-top: 0px;"> <h3>Share</h3>           
                                                           </div>
                                                        </div>
                                                        <hr class="soft">
                                                      </div>
                                                  <div class="modal-body" style="width: 490px; height: 100px; border: 0px solid;" >
                                                    <!-- isi modul -->   
                                                    <center>
                                                     <div style="width: 180px; height: 50px; border: 0px solid;">
                                                       <div style="width: 50px; height: 50px; border: 0px solid; float: left;">
                                                         <button tipe="submit" class="img-circle"  style="background-color: white; width: 45px; height: 45px; padding: 0px; margin: 0px;">
                                                           <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://lolid.xyz/post_<?php echo e($post_user->post_id); ?>;src=sdkpreparse" >
                                                            <img src="themes/images/facebook.jpg"  class="img-circle" style="width: 50px;">
                                                            </a>
                                                          </button>
                                                       </div>
                                                       <div style="width: 50px; height: 50px; border: 0px solid; float: left;">
                                                         <button tipe="submit" class="img-circle"  style="background-color: white; width: 45px; height: 45px; padding: 0px; margin: 0px;">
                                                          <a target="_blank"  class="twitter-share-button" href="https://twitter.com/intent/tweet?text=https://lolid.xyz/post_<?php echo e($post_user->post_id); ?>">
                                                            <img src="themes/images/twitter.jpg"  class="img-circle" style="width: 50px;">
                                                          </a>
                                                          </button>
                                                       </div>
                                                       <div style="width: 50px; height: 50px; border: 0px solid; float: left;">
                                                         <button tipe="submit" class="img-circle"  style="background-color: white; width: 45px; height: 45px; padding: 0px; margin: 0px;">
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
                              <div  style="width: 510px; border: 0px solid; padding-left: 20px;">            
                                      <div style="width: 430px; padding-left: 1px; border: 0px solid; float: left;" >
            
                                      </div>
                                      <div style="width: 50px; float: right; border: 0px solid; padding-top: 5px;">
                                           <i class="btn btn-secondary" data-dismiss="modal">Close</i>
                                      </div>
                              </div>
                         </div>
                        </div>
                      </div>
                  <!--end modul -->                             
 
            	<!-- -->
              
          </div>
          <div style="width: 750px; text-align: right; padding-top: 5px;">
          <i><?php echo e($post_user->created_at); ?></i>
          </div>
        </tr>
        <div class="clr" id="myTab" style="width: 300px; padding-left: 35px; padding-top: 0px;">
            <tr>
            	<div style="width: 55px; border: 0px solid; float: left;">
                   <td id="<?php echo e($post_detail->post_id); ?>"> <a href="" data-toggle="modal" data-target="#likes"><?php echo e($count_likes); ?> <img src="themes/images/lol.jpg" style="width: 40%"> </a></td>
                </div>
                <div style="width: 100px; border: 0px solid; float: left;">
                   <td id="<?php echo e($post_detail->post_id); ?>"> <a href="#comment" data-toggle="tab"><?php echo e($count_comment); ?> <img src="themes/images/comment.png" style="width: 22%"> </a></td>
                </div>
            </tr>
            <p class="clr"></p>
            <tr>
            	<td>
            	
               <div style="width: 430px; height: 15px; border: 0px solid; text-align: left; float: left;">

                                      <?php if(!empty($count_likes != 0)): ?>
                                        <div style="width: auto; height: 15px; float: left; padding-top: 2px;">
                                          <?php $__currentLoopData = $likes_post_user_limit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         
                                              <a href="<?php echo e('@'.$lu->get_like_user->username); ?>">
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
                                            <a href="<?php echo e('@'.$lp->get_like_user->username); ?>">
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
                                            <div class="modal fade" id="likes" tabindex="-1" role="dialog" aria-labelledby="likes" aria-hidden="true" style="padding-bottom: 0px; margin-bottom: 0px;">
                                                <div class="modal-dialog" role="document"  style="padding-bottom: 0px; margin-bottom: 0px;">
                                                    <div class="modal-content"  style="padding-bottom: 0px; margin-bottom:  0px;">
                                                      <div class="modal-header" style="width: 520px; height: 40px; border: 0px solid">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="tutup"><span aria-hidden="true">&times;</span></button>
                                                          <div style="width: 500px; height: auto; border: 0px solid; border-color: red;  padding-left: 0px; padding-top: 0px; padding-right: 0px;">
                                                              <div style="width: 30px; border: 0px solid; float: left; padding-left: 0px; padding-top: 0px;">
                                                                <button data-dismiss="modal" class="img-circle"  aria-label="kembali" style="float: left; padding: 0px;margin: 0px;">
                                                                    <img src="themes/images/kembali.png"  class="img-circle" style="width: 25px;">
                                                                </button>
                                                              </div>
                                                          <div style="width: 465px; height: auto; border: 0px solid; float: left; padding-top: 0px;"> <b>Likes</b>           
                                                           </div>
                                                        </div>
                                                        <hr class="soft">
                                                      </div>
                                                  <div class="modal-body" style="width: 490px; height: 200px; border: 0px solid;" >
                                                    <!-- isi modul -->   
                                                      <table>
                                                        <div>
                                                      <?php if(!empty($likes_user)): ?>
                                                            <?php $__currentLoopData = $likes_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lpu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                         <?php 
                                                           $user_id_f =  $lpu->get_like_user;
                                                           $follower_id_f = $follower_user->where('user_id', $user_id_f->id)->first();
                                                           $followed_id_f = $followed_user->where('followed_user_id', $user_id_f->id)->first();
                                                         ?>
                                                        <tr>
                                                            <td>
                                                              <div style="width: 250px; height: 50px; border: 0px solid;">
                                                                <div style="width: 50px; height: 50; border: 0px solid;">
                                                                  <a href="<?php echo e('@'.$lpu->get_like_user->username); ?>">
                                                                      <?php if(!empty($lpu->get_like_user->image_profil)): ?>
                                                                        <img src="<?php echo e(url('image_user/view/'.$lpu->get_like_user->image_profil)); ?>" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 5px;">
                                                                      <?php else: ?>
                                                                        <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 5px;">
                                                                      <?php endif; ?>
                                                                  </a>
                                                              </div>
                                                              <div style="width: 200px; height: 40px; border: 0px solid; padding-top: 4px;">
                                                              <a href="<?php echo e('@'.$lpu->get_like_user->username); ?>">
                                                                  <h5 style="margin: 4px;" ><?php echo e($lpu->get_like_user->name); ?>

                                                                      <?php if(!empty($lpu->get_like_user->verifikasi)): ?>
                                                                        <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;">
                                                                      <?php else: ?>
                                                                      <?php endif; ?>
                                                                <div style="font-size: 13px;">
                                                                      <small><i>@</i></small><small><i><?php echo e($lpu->get_like_user->username); ?></i></small>
                                                                </div>
                                                                 </h5>
                                                              </a>
                                                            </div>
                                                          </div>
                                                        </td>
                                                      <td>  
                                                          <center>
                                                          <div style="width: auto; height: 35px; ">
                                                          </div>
                                                          </center>
                                                      </td>
                                                      <td>
                                                        <?php if(auth()->guard()->guest()): ?>
                                                        <?php else: ?>
                                                        <?php if($user_id_f->id == Auth::user()->id): ?>
                                                          <?php else: ?>
                                                          <div style="width: 330px; height: 35px; border: 0px solid; float: right;">
                                                             <div style="width: 80px; float: left;">
                                                               <?php if(!empty($follower_id_f)): ?>
                                                                  <form action="<?php echo e(route('follow_delete')); ?>" method="POST">
                                                                  <?php echo e(csrf_field()); ?>

                                                                      <input type="hidden" name="asal" value="<?php echo e('@'.$user_id_f->username); ?>">
                                                                      <input type="hidden" name="follower_id" value="<?php echo e($follower_id_f->follower_id); ?>">
                                                                      <input type="hidden" name="followed_id" value="<?php echo e($followed_id_f->followed_id); ?>">
                                                                      <input type="hidden" name="username" value="<?php echo e($user_id_f->username); ?>">
                                                                      <button tipe="submit" class="btn btn-secondary btn-mini" >Followed<img src='themes/images/centang.gif'  class='img-circle' style='width: 20px; height: 15px;'></button>
                                                                    </form>
                                                                <?php else: ?>
                                                                  <form action="<?php echo e(route('follow_save')); ?>" method="POST">
                                                                  <?php echo e(csrf_field()); ?>

                                                                      <input type="hidden" name="asal" value="<?php echo e('@'.$user_id_f->username); ?>">
                                                                      <input type="hidden" name="user_id" value="<?php echo e($user_id_f->id); ?>">
                                                                      <input type="hidden" name="follow_user_id" value="<?php echo e(Auth::user()->id); ?>">
                                                                      <input type="hidden" name="username" value="<?php echo e($user_id_f->username); ?>">
                                                                      <button tipe="submit" class="btn btn-success btn-mini" >Follow <img src='themes/images/plus.jpg'  class='img-circle' style='width: 20px; height: 15px;'>
                                                                      </button>
                                                                      </form> 
                                                                <?php endif; ?>
                                                              </div> 
                                                        <div style="width: 80px; float: left;">
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
                                <br class="clr"/>
                              </div>
                          </div>
                        </div>
                          <!-- end isi modul -->
                        <div class="modal-footer" style="height: 20px; padding-top: 0px;">
                              <div  style="width: 510px; border: 0px solid; padding-left: 20px;">            
                                      <div style="width: 430px; padding-left: 1px; border: 0px solid; float: left;" >
            
                                      </div>
                                      <div style="width: 50px; float: right; border: 0px solid; padding-top: 5px;">
                                           <i class="btn btn-secondary" data-dismiss="modal">Close</i>
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

            	</td>
            </tr>
        </div>
 
  </div>
  <div style="width:45px; height: 45px; border: 0px solid; border-color: red; float: right;">
  	<a href="<?php echo e('@'.$post_user->get_post_user->username.'#'.$post_user->post_id); ?>"><img src="themes\images\x.png"></a>
  </div>
   
  <!-- menu kanan -->
  <div style="width: 315px; height: auto; border: 0px solid; border-color: red; float: left; padding-left: 20px; padding-top: 0px; padding-right: 0px;">
  	 <div style="width: 285px; height: 90px; border: 0px solid; float: left;">
  	 <a href="<?php echo e('@'.$post_user->get_post_user->username); ?>">
        <?php if(!empty($post_user->get_post_user->image_profil)): ?>
      <img src="<?php echo e(url('image_user/view/'.$post_user->get_post_user->image_profil)); ?>" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 0px;"> 
        <?php else: ?>
          <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 0px;"> 
        <?php endif; ?>
    </a>
         <a href="<?php echo e('@'.$post_user->get_post_user->username); ?>">
           <h5><?php echo e($post_user->get_post_user->name); ?>

            <?php if(!empty($post_user->get_post_user->verifikasi)): ?>
            <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 0px;">
            <?php else: ?>
          
            <?php endif; ?>
              <div style="font-size: 13px;">
                  <p><small><i>@</i></small><small><i><?php echo e($post_user->get_post_user->username); ?></i></small></p>
              </div>
           </h5>
        </a>
      <tr style="border: 9px solid; padding: 10px;">
            <td><a href="<?php echo e('@'.$post_user->get_post_user->username); ?>"><b><?php echo e($post_user->get_post_user->name); ?> 
                <?php if(!empty($post_user->get_post_user->verifikasi)): ?>
              <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;"> 
               <?php else: ?>
               <?php endif; ?>
            </b></a></td>
            <td><?php echo e($post_user->status); ?></td>
      </tr>
      <div style="float:right; text-align: right; font-size:7px; padding-top: 5px;">
                 <i><?php echo e($post_user->updated_at); ?></i><a href="#"><img src="themes\images\edit1.png" style="padding-left: 5px;"> </a>
      </div>
      
      </div>
      <div style="width: 20px; height: 90px; border: 0px solid; float: right;">
        <?php if(auth()->guard()->guest()): ?>
        <?php else: ?>
        <?php if($post_user->get_post_user->id == Auth::user()->id): ?>
         <i class="btn btn-secondary" data-toggle="modal" data-target="#editpost" style="width: 15px; height: 15px; padding: 0px; margin: 0px;"><img src="themes\images\edit.png"></i>
        <?php else: ?>
        <?php endif; ?>
        <?php endif; ?>
      <!-- Modal edit post-->
<div class="modal fade" id="editpost" tabindex="-1" role="dialog" aria-labelledby="editpost" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    
      <h5 class="modal-title" id="edit_post">Edit Post</h5>
      
    </div>
    <div class="modal-body">
      <form action="<?php echo e(route('post_update')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>


                <input type="hidden" name="asal" value="<?php echo e('post_'.$post_user->post_id); ?>">
                <input type="hidden" name="post_id" value="<?php echo e($post_user->post_id); ?>">
                <textarea style="width: 500px; height: 200px" name="status"> <?php echo e($post_user->status); ?> </textarea>
                <center><button type="submit" class="btn btn-primary">update</button></center>
     </form>
    </div>
    <div class="modal-footer">
      <div style="width: 160px; float: left; border: 0px solid; text-align: left;">
        <form action="<?php echo e(route('post_delete')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="asal" value="<?php echo e('@'.$post_user->username); ?>">
                <input type="hidden" name="post_id" value="<?php echo e($post_user->post_id); ?>">
                <button type="submit" class="btn btn-danger">Delete</button>
      </form>
      </div>

      <div style="width: 180px; float: left; border: 0px solid; text-align: center;">

     </div>
     <div style="width: 160px; float: right; border: 0px solid">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
<!--end edit post -->

      </div>
      <div class="clr" style="width: 300px; height: 30px; padding-left: 10px; border: 0px solid;">
          
                    <div style="max-width: 100px; height: 30px;  border: 0px solid; float: left; padding-top: 5px;">
                      <?php echo e($count_likes); ?>

                    </div>
                    <div style="max-width: 50px; height: 30px;  border: 0px solid; float: left; ">
                     <?php if(auth()->guard()->guest()): ?>
                      <a href="login"><img src="themes/images/lolid.jpg" class="img-circle" style="padding-top: 2px;"></a>
                     <?php else: ?>
                      <?php if(!empty($likes_post_user_id)): ?>
                                        <form action="<?php echo e('like_id/delete/'.$likes_post_user_id->like_id); ?>" method="POST">
                                            <?php echo e(csrf_field()); ?>

                                            <input type="hidden" name="asal" value="<?php echo e('post_'.$post_user->post_id); ?>">
                                            <input type="hidden" name="post_id" value="<?php echo e($post_user->post_id); ?>">
                                            <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                                            <button tipe="submit" class="img-circle" style="background-color: white; width: 33px; height: 30px; padding: 2px;">
                                              <img src="themes/images/lolid.jpg" class="img-circle" style="padding-top: 2px;"> 
                                               </button>
                                            </form>
                       <?php else: ?>
                                            <form action="<?php echo e(route('like_post_id_save')); ?>" method="POST">
                                            <?php echo e(csrf_field()); ?>

                                             <input type="hidden" name="asal" value="<?php echo e('post_'.$post_user->post_id); ?>">
                                            <input type="hidden" name="post_id" value="<?php echo e($post_user->post_id); ?>">
                                            <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                                            <button tipe="submit" class="img-circle" style="background-color: white; width: 33px; height: 30px; padding: 2px;">
                                                <img src="themes/images/lol.jpg" class="img-circle" style="padding-top: 2px;">
                                               </button>
                                              </form>
                      <?php endif; ?>
                      <?php endif; ?>
                     </div> 
                    <div style="max-width: 100px; height: 30px;  border: 0px solid; float: left;  padding-top: 5px;">
                    <?php echo e($count_comment); ?>

                    </div>
                     <div style="max-width: 50px; height: 30px;  border: 0px solid; float: left; ">
                         <button tipe="submit" class="img-circle" data-toggle="modal" data-target="#share" style="background-color: white; width: 34px; height: 32px; padding: 4px;">
                           <img src="themes/images/comment.jpg" class="img-circle" >
                         </button>
                     </div>
                     <div style="max-width: 50px; height: 30px;  border: 0px solid; float: left; padding-left: 7px;">
                         <button tipe="submit" class="img-circle" data-toggle="modal" data-target="#share" style="background-color: white; width: 33px; height: 33px;">
                          <img src="themes/images/right.jpg" class="img-circle"> 
                         </button>
                    </div>
                 
      </div> 
      <br/>
        <div style="padding-left: 20px;">
         <?php if(!empty($comment_post)): ?>
            <?php $__currentLoopData = $comment_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         
         <div style="width: 280px; height: auto; border: 0px solid; float: left; padding: 0px;">
              <div style="width: 280px; border: 0px solid;">
                <?php if(!empty($cp->get_comment_user->image_profil)): ?>
              <img src="<?php echo e(url('image_user/view/'.$cp->get_comment_user->image_profil)); ?>" class="img-circle" style="width: 25px; height: 25px; float: left;">
               <?php else: ?>
               <img src="themes/images/profil.jpg" class="img-circle" style="width: 25px; height: 25px; float: left;">
               <?php endif; ?>   
               <div style="width: 280px; height: auto; border: 0px solid;">
               <a href="<?php echo e('@'.$cp->get_comment_user->username); ?>"><b><?php echo e($cp->get_comment_user->name); ?>

                <?php if(!empty($cp->get_comment_user->verifikasi)): ?>
                <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;"> 
                <?php else: ?>
                <?php endif; ?>
                </b></a>
                   <?php echo e($cp->comment_desc); ?>

                 
                   <div style="width: 70px;text-align: right; float:right; font-size:7px; padding-top: 5px;">
                    <i style="float: left;"><?php echo e($cp->updated_at); ?></i>
                    <?php if(auth()->guard()->guest()): ?>
                    <?php else: ?>
                      <?php if($cp->get_comment_user->id == Auth::user()->id || $post_user->get_post_user->id == Auth::user()->id): ?>
                      <div style="float: left; padding-left: 5px;">
                      <form action="comment_id/delete/<?php echo e($cp->comment_id); ?>" method="post">
                         <?php echo e(csrf_field()); ?>

                       <input type="hidden" name="asal" value="<?php echo e('post_'.$post_user->post_id); ?>">
                       <button class="btn" type="submit" style="height: 0px; padding: 0px; margin: 0px;"> <img  src="themes\images\edit1.png" style=" padding-bottom: 20px; margin: 0px;"></button>
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
      <div class="span4" style="border: 0px solid;">            
         <div style="padding-left: 0px">
              <?php if(auth()->guard()->guest()): ?>
              <?php else: ?>
              <form action="<?php echo e(route('comment_post_id_save')); ?>" method="POST">
              <?php echo e(csrf_field()); ?>

              <div style="width: 50px; float: left; border: 0px solid;"><a href="">

                <?php if(!empty(Auth::user()->image_profil)): ?>
                <img src="<?php echo e(url('image_user/view/'.Auth::user()->image_profil)); ?>" class="img-circle" style="width: 40px; height: 40px; float: left;"> 
                <?php else: ?>
                <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left;">
                <?php endif; ?>
              </a>
              </div>
              
              <div style=" width: 160px; float: left; padding-top: 9px; border: 0px solid;">
              <input type="hidden" name="asal" value="<?php echo e('post_'.$post_user->post_id); ?>">
              <input type="hidden" name="post_id" value="<?php echo e($post_user->post_id); ?>">
              <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
              <input type="hidden" name="name" value="<?php echo e(Auth::user()->name); ?>">
              <input type="hidden" name="username" value="<?php echo e(Auth::user()->username); ?>">
              <input type="text" name="comment_desc" placeholder="add your comment" style="width: 145px; border: 0px;">
              </div>
              <div style="width: 80px; float: left; padding-top: 8px; border: 0px;">
              <input class="btn btn-success btn-mini" type="submit" value="comment">
              </div>
              
              
            </form>
            <?php endif; ?>
         </div>
        
        <br class="clr"/>
      </div>
        
  </div>
</div>          


<?php $__env->stopSection(); ?>

<?php echo $__env->make('master_post1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>