<?php $__env->startSection('content'); ?>
<div style="width: 500px; height: 580px; border:1px solid; background: url('themes/images/b_inbox.png'); padding: 5px; ">
  <div style="width: 500px; height: 580px; border: 1px solid;">
      <div style="width: 50px; float: left; padding-top: 10px; padding-left: 10px; ">
                <a href="message=m"><img src="themes/images/kembali.png" style="width: 40px;"></a>
      </div>  
     <div style="width: 500px; height: 85px; border: 1px solid">
      
    <?php if($message_user_id->get_message_user1->id == Auth::user()->id): ?>
            <a href="<?php echo e('@'.$message_user_id->get_message_user2->username); ?>">
            <div style="width: 225px; height: 50px; border: 0px solid; float: left; padding: 10px;">
              <?php if(!empty($message_user_id->get_message_user2->image_profil)): ?>
              <img src="<?php echo e(url('image_user/view/'.$message_user_id->get_message_user2->image_profil)); ?>" class="img-circle" style="width: 40px; height: 40px; float: left;">
              <?php else: ?>
                 <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left;">
              <?php endif; ?>
               <div style=" width: 180px ;height: 50px; border: 0px solid;  float: left; padding-left: 0px;">
                  
                  <div style="font-size: 15px; padding-top: 5px; margin: 0px; border: 0px solid;">
                    <b><?php echo e($message_user_id->get_message_user2->name); ?>

                        <?php if($message_user_id->get_message_user2->verifikasi): ?>
                        <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 10px; height: 10px; float: left;">
                        <?php else: ?>
                        <?php endif; ?>
                    </b>
                  </div>
                  <div style=" border: 0px solid; font-size: 13px;">
                    <p><small><i>@</i><i><?php echo e($message_user_id->get_message_user2->username); ?></i></small></p>
                  </div>
                  <div style="float:right; font-size:7px;">
                  </div>
               </div>
            </div>
           </a>
      <?php else: ?>
           <a href="<?php echo e('@'.$message_user_id->get_message_user1->username); ?>">
           <div style="width: 225px; height: 50px; border: 0px solid; float: left; padding: 10px;">
             <?php if(!empty($message_user_id->get_message_user1->image_profil)): ?>
               <img src="<?php echo e(url('image_user/view/'.$message_user_id->get_message_user1->image_profil)); ?>" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 0px;">
              <?php else: ?>
                <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 0px;">
              <?php endif; ?>
                <div style=" width: 180px ;height: 50px; border: 0px solid;  float: left; padding-left: 5px;">
                   <div style="font-size: 15px; padding-top: 5px; margin: 0px; border: 0px solid;">
                        <b><?php echo e($message_user_id->get_message_user1->name); ?>

                          <?php if(!empty($message_user_id->get_message_user1->verifikasi)): ?>
                          <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 10px; height: 10px; float: left;">
                          <?php else: ?>
                          <?php endif; ?>
                        </b>
                    </div>
                   <div style=" border: 0px solid; font-size: 13px;">
                    <p><small><i>@</i><i><?php echo e($message_user_id->get_message_user1->username); ?></i></small></p>
                   </div>
                   <div style="float:right; font-size:7px;">
                  </div>
               </div>
          </div>
          </a>
      <?php endif; ?>  
          <!-- <h5><?php echo e($message_user_id->message_kode); ?></h5> -->
    </div>
   
       <?php if(!empty($message_chat_user)): ?>
      <?php $__currentLoopData = $message_chat_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mcu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <div style="width: 480px; height: auto; border: 0px solid; border-color: red;  float: left; padding: 5px;">
         <div>
            
            <div class="clr" style=" width: auto; height: auto; border: 0px solid;  <?php if($mcu->user_id ==  Auth::user()->id): ?> float: right; background: url('themes/images/chat_kanan.png'); padding-left: 20px; <?php else: ?> float: left; background: url('themes/images/chat_kiri.png'); padding-left: 10px; <?php endif; ?>" >
                    <div style="padding: 5px; ">
                    <?php echo e($mcu->message_chat_comment); ?>

                   
                        <div style=" float:right; font-size:7px; padding-top: 5px; padding-left: 5px;">
                          <i><?php echo e($mcu->updated_at); ?></i><a href="#"><img src="themes\images\edit1.png" style="padding-left: 5px;">
                        </div>
                    </div>
            </div>  
            
          </div>
      </div>

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        
        
     
 
  
</div>

   

<?php $__env->stopSection(); ?>

<?php echo $__env->make('mmaster_beranda_chat', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>