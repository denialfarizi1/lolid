<?php $__env->startSection('content'); ?>

<div style="width: 780px; height: auto; border:1px solid; float: left; padding: 5px;">
  
   <div style="width: 525px; height: auto; border:1px solid; border-color: red; float: left; padding: 4px;">
       <div style="width: 520px; height: 20px; border: 0px solid; font-size: 12px; padding: 5px;">
          Hasil pencarian yang anda maksud : 
       </div>
       <?php if(!empty($post_user)): ?>
            <?php $__currentLoopData = $post_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <div style="width: 520px; height: 50px; border: 0px solid;">
          <div style="width: 50px; height: 50; border: 0px solid; float: left;">
          <a href="<?php echo e('@'.$p->username); ?>">
            <?php if(!empty($p->image_profil)): ?>
            <img src="<?php echo e(url('image_user/view/'.$p->image_profil)); ?>" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 5px;">
            <?php else: ?>
            <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 5px;">
            <?php endif; ?>
          </a>
          </div>
          <div style="width: 200px; height: 40px; border: 0px solid; padding-top: 4px; float: left">
          <a href="<?php echo e('@'.$p->username); ?>">
           <h5 style="margin: 4px;" ><?php echo e($p->name); ?>

             <?php if(!empty($p->verifikasi)): ?>
            <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 15px; height: 15px; padding: 1px;">
            <?php else: ?>
            <?php endif; ?>
              <div style="font-size: 13px;">
                  <p><small><i>@</i></small><small><i><?php echo e($p->username); ?></i></small></p>
              </div>
           </h5>
           </a>
           </div>
        
         <div style="width: 160px;  height: 30px; border: 0px solid; float: left; padding-top: 10px;">
                    <?php if($p->id == Auth::user()->id): ?>
                    <?php else: ?>
                         <?php
                            $followed_id = $followed_user->where('followed_user_id', $p->id)->first();
                         ?>
                    <div style="width: 150px; height: 25px; border: 0px solid; float: right;">
                        <div style="float: left;">
                         <?php if(!empty($followed_id)): ?>
                          <form action="<?php echo e(route('follow_delete')); ?>" method="POST">
                          <?php echo e(csrf_field()); ?>

                          <input type="hidden" name="asal" value="<?php echo e('@'.$p->username); ?>">
                          <input type="hidden" name="follower_id" value="<?php echo e($p->id); ?>">
                          <input type="hidden" name="followed_id" value="<?php echo e($p->id); ?>">
                          <input type="hidden" name="username" value="<?php echo e($p->username); ?>">
                          <button tipe="submit" class="btn btn-secondary btn-mini" style="padding-top: 2px; padding-bottom: 2px; margin: 0px;">Followed<img src='themes/images/centang.gif'  class='img-circle' style='width: 20px; height: 15px;'></button>
                         </form>
                          <?php else: ?>
                         <form action="<?php echo e(route('follow_save')); ?>" method="POST">
                          <?php echo e(csrf_field()); ?>

                          <input type="hidden" name="asal" value="<?php echo e('@'.$p->username); ?>">
                          <input type="hidden" name="user_id" value="<?php echo e($p->id); ?>">
                          <input type="hidden" name="follow_user_id" value="<?php echo e(Auth::user()->id); ?>">
                          <input type="hidden" name="username" value="<?php echo e($p->username); ?>">                  
                          <button tipe="submit" class="btn btn-success btn-mini" style="padding-top: 2px; padding-bottom: 2px; margin: 0px;">Follow <img src='themes/images/plus.jpg'  class='img-circle' style='width: 20px; height: 15px;'></button> 
                          </form>
                           <?php endif; ?>  
                         </div>
                     </div>
                     <?php endif; ?>
                   </div>
                  </div> 
                     
                          
                         
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

         <?php endif; ?>
         <center>
          <form  method="post" action="pencarian=text=<?php echo e($limit_tambah+20); ?>" >
          <?php echo e(csrf_field()); ?>

          
            <input class="form-control" type="hidden" name="name" value="<?php echo e($name); ?>" />
         
           <button type="submit" class="btn btn-mini">tampilkan lebih banyak</button>
          </form>
    </center>  
   </div>
   <div style="width: 220px; height: auto; border:1px solid; border-color: yellow; float: left; padding: 10px;">
    
    </div>
   
 
</div>
<br/>
          

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master_beranda', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>