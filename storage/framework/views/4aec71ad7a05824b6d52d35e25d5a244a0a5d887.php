<?php $__env->startSection('content'); ?>
<div style="width: 780px; height: auto; border:1px solid; float: right; background: url('themes/images/b_inbox.png'); padding: 5px; ">
  <div style="width: 250px; height: 800px; border: 1px solid; float: left;">
      <?php if(!empty($message)): ?>
      <?php $__currentLoopData = $message; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

     <a href="<?php echo e('message_inbox_'.$m->message_id); ?>">
     <div style="width: 225px; height: 65px; border: 1px solid; float: left; padding: 10px;">
     <img src="<?php echo e(url('image_user/view/'.$m->get_message_user->image_profil)); ?>" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 0px;">
  
           <h5><?php echo e($m->get_message_user->name); ?>

                <img src="<?php echo e(url('image_user/view/'.$m->get_message_user->verifikasi.'.png')); ?>" class="img-circle" style="width: 15px; height: 15px; padding: 1px;">
              <div style="font-size: 13px;">
                  <p><small><i>@</small><small><?php echo e($m->get_message_user->username); ?></i></small></p>
              </div>
            </h5>
           <!-- out box 1 -->
           <div style="float:right; font-size:7px;">
           <i><?php echo e($m->updated_at); ?></i><a href="#"><img src="themes\images\edit1.png" style="padding-left: 5px;"></a>
           </div>
        </a>
      </div>
    </a>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      <?php if(!empty($message_i)): ?>
      <?php $__currentLoopData = $message_i; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m_i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <a href="<?php echo e('message_inbox_'.$m_i->message_id); ?>">
     <div style="width: 225px; height: 65px; border: 1px solid; float: left; padding: 10px;">
     <img src="<?php echo e(url('image_user/view/'.$m_i->get_message_user_i->image_profil)); ?>" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 0px;">
           
           <h5><?php echo e($m_i->get_message_user_i->name); ?>

               <img src="<?php echo e(url('image_user/view/'.$m_i->get_message_user_i->verifikasi.'.png')); ?>" class="img-circle" style="width: 15px; height: 15px; padding: 1px;">
              <div style="font-size: 13px;">
                  <p><small><i>@</small><small><?php echo e($m_i->get_message_user_i->username); ?></i></small></p>
              </div>
            </h5>
           <!-- in box 2 -->
           <div style="float:right; font-size:7px;">
           <i><?php echo e($m_i->updated_at); ?></i><a href="#"><img src="themes\images\edit1.png" style="padding-left: 5px;"></a>
           </div>
        </a>
      </div>
    </a>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
  </div>
  <div style="width: 520px; height: 800px; border: 1px solid; float: left;">
     <div style="width: 520px; height: 85px; border: 1px solid">
     <!-- kiri -->
     <?php if(!empty($inbox_user_kiri)): ?>
     <a href="<?php echo e('@'.$inbox_user_kiri->get_message_inbox_user->username); ?>">
     
     <div style="width: 200px; height: 65px; border: 0px solid; float: left; padding: 10px;">
     <img src="<?php echo e(url('image_user/view/'.$inbox_user_kiri->get_message_inbox_user->image_profil)); ?>" class="img-circle" style="width: 40px; height: 40px; float: left; padding: 0px;">
         
           <h5><?php echo e($inbox_user_kiri->get_message_inbox_user->name); ?>

               <img src="<?php echo e(url('image_user/view/'.$inbox_user_kiri->get_message_inbox_user->verifikasi.'.png')); ?>" class="img-circle" style="width: 15px; height: 15px; padding: 1px;">   
              <div style="font-size: 13px;">
                  <p><small><i>@</small><small><?php echo e($inbox_user_kiri->get_message_inbox_user->username); ?></i></small></p>
              </div>
            </h5>
           
        </a>
      </div>
    </a>
    <?php endif; ?>
    <!--end kiri -->
    <!-- kanan
     <a href="#">
     <div style="width: 200px; height: 65px; border: 1px solid; float: right; padding: 10px;">
     <img src="<?php echo e(url('image_user/view/')); ?>" class="img-circle" style="width: 40px; height: 40px; float: right; padding: 0px;">
         
           <h5>   
              <div style="font-size: 13px;">
                  <p><small><i>@</small><small></i></small></p>
              </div>
            </h5>
           <div style="float:right; font-size:7px;">
           <i></i><a href="#"><img src="themes\images\edit1.png" style="padding-left: 5px;"></a>
           </div>
        </a>
      </div>
    </a>
    kanan -->
     <?php if(!empty($inbox_user_kiri)): ?>
    <div style="float:right; font-size:7px; padding-top: 70px;">
           <i><?php echo e($inbox_user_kiri->updated_at); ?></i><a href="#"><img src="themes\images\edit1.png" style="padding-left: 5px;"></a>
           </div>
    </div>
    <?php endif; ?>
       <?php if(!empty($inbox)): ?>
      <?php $__currentLoopData = $inbox; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <div style="width: 400px; height: auto; border: 0px solid; border-color: red; <?php if($i->get_message_inbox_user->id == Auth::user()->id): ?> float: right; <?php else: ?> float: left; 
        <?php endif; ?>
      padding: 5px;">
         <div>
            
            <div class="clr" style=" width: auto; height: auto; border: 0px solid; <?php if($i->get_message_inbox_user->id == Auth::user()->id): ?> float: right; background: url('themes/images/chat_kanan.png'); <?php else: ?> float: left; background: url('themes/images/chat_kiri.png'); 
        <?php endif; ?> padding-left: 10px; padding-right: 10px;">
                    <div style="padding: 5px; ">
                    <?php echo e($i->chat); ?>

                   
                        <div style=" float:right; font-size:7px; padding-top: 5px; padding-left: 5px;">
                          <i><?php echo e($i->updated_at); ?></i><a href="#"><img src="themes\images\edit1.png" style="padding-left: 5px;">
                        </div>
                    </div>
            </div>  
            
          </div>
      </div>

      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        
        <div style="padding-left: 10px;">  
          <table>
            
          <tr>
              <div>
              <td "><a href=""><img src="<?php echo e(url('image_user/view/'.Auth::user()->image_profil)); ?>" class="img-circle" style="width: 40px; height: 40px; float: left;"></a>
              </div>
              <div style=" width: 395px; height: 35px; border: 0px solid; float: left; padding-top: 5px;">
                <form action="<?php echo e(route('message_inbox_id_save')); ?>" method="POST">
              <?php echo e(csrf_field()); ?>

              <input type="hidden" name="message_id" value="<?php echo e($id); ?>">
              <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
               <?php if(!empty($inbox_user_kiri)): ?> 
              <input type="hidden" name="inbox_id" value="<?php echo e($inbox_user_kiri->get_message_inbox_user->id); ?>">
                <?php endif; ?>
              <input type="text" name="chat" placeholder="add your comment" style="width: 370px;">
              </div>
              <div style="float: left; padding-top: 8px;">
              <input class="btn-primary" type="submit" value="chat">
              </div>
              </form>
              </td>
          </tr>
          </table>
        </div>
     
 
  
</div>
   

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master_user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>