<?php $__env->startSection('content'); ?>
<div style="width: 780px; height: auto; border:1px solid; float: right; background: url('themes/images/b_inbox.png'); padding: 5px; ">
  <div style="width: 250px; height: auto; border: 1px solid; float: left;">
      <?php if(!empty($message)): ?>
      <?php $__currentLoopData = $message; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php 
            $message_id = $m->message_id;
            $message_chat_user_messeage_id = $message_chat_user_all_order->where('message_id',$message_id)->orderByDesc('updated_at')->first(); 
            ?>
        <?php if($m->get_message_user1->id == Auth::user()->id): ?>
           <?php
                $message_id1 = $m->message_id;
             ?>
            <a href="<?php echo e('message_'.$m->message_id); ?>">
            <div style="width: 225px; height: 65px; border: 1px solid; float: left; padding: 10px; <?php if($m->message_user2 == $message_user_id->get_message_user2->id ): ?> background: white <?php endif; ?>">
              <?php if(!empty($m->get_message_user2->image_profil)): ?>
              <img src="<?php echo e(url('image_user/view/'.$m->get_message_user2->image_profil)); ?>" class="img-circle" style="width: 40px; height: 40px; float: left;">
              <?php else: ?>
                <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left;">
              <?php endif; ?>
               <div style=" width: 180px ;height: 60px; border: 0px solid;  float: left; padding-top: 0px;">
                  
                  <div style="font-size: 15px">
                    <b><?php echo e($m->get_message_user2->name); ?>

                        <?php if(!empty($m->get_message_user2->verifikasi)): ?>
                        <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 10px; height: 10px; float: left;">
                        <?php else: ?>
                        <?php endif; ?>
                     </b>
                   </div>
                  <div style=" border: 0px solid; font-size: 13px;">
                    <p><small><i>@</i><i><?php echo e($m->get_message_user2->username); ?></i></small></p>
                  </div>
                  <?php if(!empty($message_chat_user_messeage_id)): ?>
                  <div style="float: left;"><?php echo e($message_chat_user_messeage_id->message_chat_comment); ?></div>
                  <div style="float:right; font-size:7px;">  
                   <?php echo e($message_chat_user_messeage_id->updated_at); ?>

                  </div>
                   <?php else: ?>
                  <?php endif; ?>
               </div>
            </div>
           </a>
          <?php endif; ?>
          <?php if($m->get_message_user1->id != Auth::user()->id): ?>
          <?php
                $message_id2 = $m->message_id;
             ?>
           <a href="<?php echo e('message_'.$m->message_id); ?>">
           <div style="width: 225px; height: 65px; border: 1px solid; float: left; padding: 10px; <?php if($m->message_user1 == $message_user_id->get_message_user1->id): ?> background-color: white <?php endif; ?>">
               <?php if(!empty($m->get_message_user1->image_profil)): ?>
               <img src="<?php echo e(url('image_user/view/'.$m->get_message_user1->image_profil)); ?>" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 0px;">
               <?php else: ?>
               <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 0px;">
               <?php endif; ?>
                <div style=" width: 180px ;height: 60px; border: 0px solid;  float: left; padding-top: 0px;">
                   <div style="font-size: 15px">
                    <b><?php echo e($m->get_message_user1->name); ?>

                       <?php if(!empty($m->get_message_user1)): ?>
                         <img src="themes/images/verifikasi.jpg" class="img-circle" style="width: 10px; height: 10px; float: left;">
                       <?php else: ?>
                       <?php endif; ?>
                    </b>
                  </div>
                   <div style=" border: 0px solid; font-size: 13px;">
                    <p><small><i>@</i><i><?php echo e($m->get_message_user1->username); ?></i></small></p>
                   </div>
                    <?php if(!empty($message_chat_user_messeage_id)): ?>
                    <div style=" float: left;"><?php echo e($message_chat_user_messeage_id->message_chat_comment); ?></div>
                    <div style="float:right; font-size:7px; border: 0px solid;">
                     <?php echo e($message_chat_user_messeage_id->updated_at); ?>

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
  <div style="width: 520px; height: auto; border: 1px solid; float: left;">
     <div style="width: 520px; height: 85px; border: 1px solid">
      
    <?php if($message_user_id->get_message_user1->id == Auth::user()->id): ?>
            <a href="<?php echo e('@'.$message_user_id->get_message_user2->username); ?>">
            <div style="width: 225px; height: 65px; border: 0px solid; float: left; padding: 10px;">
              <?php if(!empty($message_user_id->get_message_user2->image_profil)): ?>
              <img src="<?php echo e(url('image_user/view/'.$message_user_id->get_message_user2->image_profil)); ?>" class="img-circle" style="width: 40px; height: 40px; float: left;">
              <?php else: ?>
                 <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left;">
              <?php endif; ?>
               <div style=" width: 180px ;height: 60px; border: 0px solid;  float: left; padding-left: 5px;">
                  
                  <div style="font-size: 15px; ">
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
           <div style="width: 225px; height: 65px; border: 0px solid; float: left; padding: 10px;">
             <?php if(!empty($message_user_id->get_message_user1->image_profil)): ?>
               <img src="<?php echo e(url('image_user/view/'.$message_user_id->get_message_user1->image_profil)); ?>" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 0px;">
              <?php else: ?>
                <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 0px;">
              <?php endif; ?>
                <div style=" width: 180px ;height: 60px; border: 0px solid;  float: left; padding-left: 5px;">
                   <div style="font-size: 15px; ">
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
     <div style="width: 505px; height: auto; border: 0px solid; border-color: red;  float: left; padding: 5px;">
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
        
        <div style="width: 505px; padding-left: 10px;">  
         
              <div style="width: 50px; float: left;">
              <a href="">
                  <?php if(!empty(Auth::user()->image_profil)): ?>
                <img src="<?php echo e(url('image_user/view/'.Auth::user()->image_profil)); ?>" class="img-circle" style="width: 40px; height: 40px; float: left;">
                  <?php else: ?>
                <img src="themes/images/profil.jpg" class="img-circle" style="width: 40px; height: 40px; float: left;">
                  <?php endif; ?>
              </a>
              </div>
               <form action="<?php echo e(route('message_chat_save')); ?>" method="POST">
              <div style=" width: 395px; height: 35px; border: 0px solid; float: left; padding-top: 5px;">
               
                     <?php echo e(csrf_field()); ?>

               <input type="hidden" name="asal" value="<?php echo e('message_'.$message_id); ?>">
              <input type="hidden" name="message_id" value="<?php echo e($message_id); ?>">
              <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
              <input type="text" name="message_chat_comment" placeholder="add your comment" style="width: 370px;">
              </div>
              <div style="width: 50px; float: left; padding-top: 5px;">
              <input class="btn btn-primary" type="submit" value="chat">
              </div>
              </form>
             
        </div>
     
 
  
</div>

   

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master_user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>