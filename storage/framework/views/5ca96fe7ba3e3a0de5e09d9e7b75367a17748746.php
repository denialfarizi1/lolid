<?php $__env->startSection('content'); ?>

<div  style="width: 540px">
      
       <?php if(!empty($post_user)): ?>
            <?php $__currentLoopData = $post_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <center>
        <div style="width: 170px; height: 130px; border: 0px solid; float: left; overflow: hidden; margin: 0px; padding: 1px;">
         
            <a href="<?php echo e('post=m_'.$p->post_id); ?>"><img src="<?php echo e(url('image_post/view/'.$p->image_post)); ?>" id="<?php echo e($p->post_id); ?>"  style=" display: block; height: 100%;  margin: 0px;" /></a>
          
        </div>
      </center>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      <div style="width: 520px;">
        <center class="clr">
           <a href="mhome=<?php echo e($limit_tambah+12); ?>"><button class="btn btn-mini">tampilkan lebih banyak</button></a>
          </center> 
      </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('mmaster_home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>