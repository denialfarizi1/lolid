<?php $__env->startSection('content'); ?>
<div style="width: 460px; height: auto; border:1px solid; background: url('themes/images/b_inbox.png'); padding: 20px; ">
  <div style="width: 460px; height: 580px; border: 1px solid;">
       <?php if(!empty($message)): ?>
      <?php $__currentLoopData = $message; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php 
            $message_id = $m->message_id;
            $message_chat_user_message_id = $message_chat_user_all->where('message_id',$message_id)->first(); 
           
            ?>
        <?php if($m->get_message_user1->id == Auth::user()->id): ?>
           <?php
                $message_id1 = $m->message_id;
                $message_user_id = $message_user->where('message_id', $message_id1)->first();
             ?>
            <a href="<?php echo e('mmessage_'.$m->message_id); ?>">
            <div style="width: 440px; height: 65px; border: 1px solid; float: left; padding-left: 20px; padding-top: 10px; padding-bottom: 5px; ">
              <?php if(!empty($m->get_message_user2->image_profil)): ?>
              <img src="<?php echo e(url('image_user/view/'.$m->get_message_user2->image_profil)); ?>" class="img-circle" style="width: 40px; height: 40px; float: left;">
              <?php else: ?>
              <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left;">
              <?php endif; ?>
               <div style=" width: 400px ;height: 60px; border: 0px solid;  float: left; padding-top: 0px;">
                  
                  <div style="font-size: 15px">
                    <b><?php echo e($m->get_message_user2->name); ?>

                        <?php if(!empty($m->get_message_user2->verifikasi)): ?>
                          <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 40px; height: 40px; float: left;">
                        <?php else: ?>
                        <?php endif; ?>
                     </b>
                   </div>
                  <div style="height: 20px; border: 0px solid; font-size: 13px;">
                    <small><i>@</i><i><?php echo e($m->get_message_user2->username); ?></i></small>
                  </div>
                  <?php if(!empty($message_chat_user_message_id)): ?>
                  <div style="background: url('themes/images/chat_kanan.png');">
                  <div style="width: 300px; float: left; "><?php echo e($message_chat_user_message_id->message_chat_comment); ?></div>
                  <div style="width: 80px; float:right; font-size:7px;">  
                   <?php echo e($message_chat_user_message_id->updated_at); ?>

                  </div>
                  </div>
                  <?php else: ?>
                  <?php endif; ?>
               </div>
            </div>
           </a>
          <?php else: ?>
          <?php
                $message_id2 = $m->message_id;
                $message_user_id = $message_user->where('message_id', $message_id2)->first();
             ?>
           <a href="<?php echo e('message_'.$m->message_id); ?>">
           <div style="width: 225px; height: 65px; border: 1px solid; float: left; padding: 10px; background-color: white;">
              <?php if(!empty($m->get_message_user1->image_profil)): ?>
               <img src="<?php echo e(url('image_user/view/'.$m->get_message_user1->image_profil)); ?>" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 0px;">
               <?php else: ?>
                <img src="<?php echo e(url('image_user/view/'.$m->get_message_user1->image_profil)); ?>" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 0px;">
               <?php endif; ?>
                <div style=" width: 450px ;height: 60px; border: 1px solid;  float: left; padding-top: 0px;">
                   <div style="font-size: 15px">
                     <b><?php echo e($m->get_message_user1->name); ?>

                         <?php if(!empty($m->get_message_user1->verifikasi)): ?>
                          <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 10px; height: 10px; float: left;">
                        <?php else: ?>
                        <?php endif; ?>
                     </b>
                   </div>
                   <div style="height: 20px; border: 0px solid; font-size: 13px;">
                    <small><i>@</i><i><?php echo e($m->get_message_user1->username); ?></i></small>
                   </div>
                   <?php if(!empty($message_chat_user_message_id)): ?>
                   <div style="background: url('themes/images/chat_kanan.png');">
                    <div style="width: 300px; float: left; background: url('themes/images/chat_kanan.png');"><?php echo e($message_chat_user_message_id->message_chat_comment); ?></div>
                   <div style="width: 80px; float:right; font-size:7px; border: 0px solid;">
                    <?php echo e($message_chat_user_message_id->updated_at); ?>

                  </div>
                  </div>
                  <?php else: ?>
                  <?php endif; ?>
               </div>
          </div>
          </a>
      <?php endif; ?>  
      
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      
  </div>
</div>
   

<?php $__env->stopSection(); ?>

<?php echo $__env->make('mmaster_beranda', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>