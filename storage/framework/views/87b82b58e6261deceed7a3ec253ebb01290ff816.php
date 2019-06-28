<?php $__env->startSection('content'); ?>
<!-- post -->
<div style="width: 780px; height: auto; border:1px solid; float: right; padding: 5px;">
  
   <div style="width: 525px; height: auto; border:1px solid; border-color: red; float: left; padding: 4px;">
     <div style="width: 510px;height: auto; border: 1px solid; border-color: blue; padding: 5px;">
            <form action="<?php echo e(route('post_save')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

               <?php if(Session::get('success')): ?>
                  <div class="alert alert-success">
                  <center>
                    <p><?php echo e(Session::get('success')); ?></p>
                  </div>
              <?php endif; ?>
                      
              <?php if(Session::get('warning')): ?>
              <div class="alert alert-danger">
                    <p><?php echo e(Session::get('warning')); ?></p>
              </div>
              <?php endif; ?>
                 <div class="form-group">
                      <div class="col-sm-10">
                      <input type="file" name="image_post"  style="width: 200px; ">
                      </div>
                </div>
                <div class="form-group">
                       <div class="col-sm-10">
                            <input class="form-control" id="#" type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>" placeholder="">
                           
                            <input class="form-control" type="text" name="status" placeholder="Apa yang anda lakukan ?" style="width: 495px;">
                       </div>
                </div>
                <div class="form-group">
                         <div class="col-sm-10">
                            <button class="btn btn-sm btn-primary">Post</button>        
                         </div>
                </div>
              </form>
     </div>
     <div style="width: 510px;height: auto; border: 1px solid; border-color: blue; padding: 5px;">
        
            <?php if(!empty($post_user)): ?>
            <?php $__currentLoopData = $post_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
              <div class="row">
                     <?php
                                    $post_id = $p->post_id;
                                    $post_user_id = $post_user->where('post_id',$post_id)->first();
                                    $comment_post_get = $comment_post->where('post_id',$post_id);
                      ?>   
                      <div class="span6" style="padding:10px;">
                      <a href="<?php echo e('@'.$p->get_post_user->username); ?>">
                        <?php if(!empty($p->get_post_user->image_profil)): ?>
                      <img src="<?php echo e(url('image_user/view/'.$p->get_post_user->image_profil)); ?>" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 5px;">
                        <?php else: ?>
                        <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 5px;">
                        <?php endif; ?>
                       </a>
                      <a href="<?php echo e('@'.$p->get_post_user->username); ?>">
                       <h5><?php echo e($p->get_post_user->name); ?>

                        <?php if(!empty($p->get_post_user->verifikasi)): ?>
                        <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;">
                        <?php else: ?>
                        <?php endif; ?>
                      </h5>
                          <div style="font-size: 13px;">
                              <p><small><i>@</i></small><small><i><?php echo e($p->get_post_user->username); ?></i></small></p>
                          </div>
                       
                      </a>
                      <center>
                         <div style="height: 350px; overflow: hidden; margin: 0;">
                            <a href="<?php echo e('post_'.$p->post_id); ?>"><img src="<?php echo e(url('image_post/view/'.$p->image_post)); ?>" id="b<?php echo e($p->post_id); ?>" alt="" style="display: block; height: 100%;  margin: 0;" /></a>
                          </div>
                      </center>
                       
                              <div style="width: 500px; height: 35px; border: 0px solid; padding-top: 5px;">
                                <div style="width: 240px; height: 35px; border: 0px solid; float: left;">
                                      <div style="width: 40px; float: left;">
                                          <form action="<?php echo e(route('like_post_save')); ?>" method="POST">
                                            <?php echo e(csrf_field()); ?>

                                            <input type="hidden" name="post_id" value="<?php echo e($p->post_id); ?>">
                                            <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                                            <button tipe="submit" class="img-circle" style="background-color: white; width: 37px; height: 35px;">
                                              <img src="themes/images/lol.jpg"> 
                                            </button>
                                          </form>
                                      </div>
                                      <div style="width: 40px; float: left;">
                                          <button tipe="submit" class="img-circle" data-toggle="modal" data-target="#comment<?php echo e($post_id); ?>" style="background-color: white; width: 37px; height: 35px;">
                                            <img src="themes/images/comment.png"> 
                                         </button>
                                      </div>
                                      <div style="width: 40px; float: left;">
                                          <button tipe="submit" class="img-circle" style="background-color: white; width: 37px; height: 35px;">
                                            <img src="themes/images/right.png"> 
                                          </button>
                                      </div>
                                  </div>
                                  <div style="width: 250px; border: 0px solid; float: right; text-align: right; padding-top: 10px;">
                                <?php echo e($p->created_at); ?>

                                  </div>
                              </div>
                              <div style="width: 450px; border: 0px solid; float: left; padding-left: 10px; padding-bottom: 0px;">  
                                  <div style="width: 55px; border: 0px solid; float: left;">         
                                          <a href="<?php echo e('post_'.$p->post_id); ?>" data-toggle="tab" id="<?php echo e($p->post_id); ?>">
                                          <?php
                                               $likes_post_user = $likes_user_post_all->where('post_id',$p->post_id);
                                               $likes_post_user_limit = $likes_user_post_l->where('post_id',$p->post_id); 
                                               $count_likes_post = $likes_post_user->count();
                                               
                                              echo $count_likes_post ;
                                          ?>
                                            <img src="themes/images/lol.jpg" style="width: 40%"> 
                                          </a>
                                      
                                    </div>
                                    <div style="width: 100px; border: 0px solid; float: left;">
                                       <a href="<?php echo e('post_'.$p->post_id); ?>"  data-toggle="modal" data-target="#comment<?php echo e($post_id); ?>">
                                            <?php $comment_post_w = $comment_post_t->where('post_id',$p->post_id)->count();
                                              echo $comment_post_w ;
                                          ?>
                                        <img src="themes/images/comment.png" style="width: 22%"> 
                                      </a>
                                    </div>
                                    <br/>
                                    <div style="width: 330px; height: 20px; border: 0px solid; text-align: left; float: left;">

                                      <?php if(!empty($likes_post_user_limit)): ?>
                                          <?php $__currentLoopData = $likes_post_user_limit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <a href="<?php echo e('@'.$lu->get_like_user->username); ?>">
                                                <?php if(!empty($lu->get_like_user->image_profil)): ?>
                                                <img src="<?php echo e(url('image_user/view/'.$lu->get_like_user->image_profil)); ?>" class="img-circle" style="width: 15px; height: 15px; float: left; padding: 0px;">
                                                <?php else: ?>
                                                <img src="themes/images/profil.jpg" class="img-circle" style="width: 15px; height: 15px; float: left; padding: 0px;">
                                                <?php endif; ?>
                                              </a>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          <?php if($count_likes_post >= 15): ?>
                                             <i class="btn btn-secondary" style=" height: 10px; padding: 0px ; margin: 0px; font-size: 10px;"> <sup>more ++</sup></i>
                                          <?php endif; ?>
                                            <i style="padding-left: 5px;">menyukai</i>
                                      <?php endif; ?>

                                    </div>
                              </div>
                                 <i class="clr"></i>
                              <div style="width: 450px;">
                                <a href="<?php echo e('@'.$p->get_post_user->username); ?>"><b><?php echo e($p->get_post_user->name); ?></b>
                                  <?php if(!empty($p->get_post_user->verifikasi)): ?>
                                  <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;">
                                  <?php else: ?>
                                  <?php endif; ?>
                                </a>
                                <?php echo e($p->status); ?>

                             </div>
                            <div style="border: 0px solid; padding-left: 20px;">
                              
                               
                              <a href=""><i data-toggle="modal" data-target="#comment<?php echo e($post_id); ?>">lihat comentar ...</i></a>
                            </div>
                              <!-- Modal comment-->
     

                              <!--end modul --> 
                                  
              <div class="span8">       
                 <div style="padding-left: 10px">
                  <table>
                  <tr>
                       <form action="<?php echo e(route('comment_post_id_save')); ?>" method="POST">
                       <td>
                          <?php if(Auth::user()->image_profil): ?>
                        <img src="<?php echo e(url('image_user/view/'.Auth::user()->image_profil)); ?>" class="img-circle" style="width: 40px; height: 40px; float: left;">
                          <?php else: ?>
                          <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left;">
                          <?php endif; ?>
                      <div style=" width: 335px; float: left; padding-top: 5px;">
                        
                         <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="post_id" value="<?php echo e($p->post_id); ?>">
                        <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>"> 
                        <input type="text" name="comment_desc" placeholder="tulis komentar anda" style="width: 320px;">
                      </div>
                      <div style="float: left; padding-top: 8px;">
                         <input class="btn-success" type="submit" value="comment">
                      </div>
                      </td>
                      </form>
                  </tr>
                  </table>
                 </div>
                
                <br class="clr"/>
              </div>
              
              </div>

             <hr class="soft"/>
          </div> 

         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    
       </div>
    </div>
    <div style="width: 220px; height: auto; border:1px solid; border-color: yellow; float: left; padding: 10px;">
    
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('master_beranda', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>