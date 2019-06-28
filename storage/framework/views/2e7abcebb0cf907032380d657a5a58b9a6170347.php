<?php $__env->startSection('content'); ?>

<div class="tab-pane active" id="status" style="padding-left: 40px;">
      <ul class="thumbnails">
       <?php if(!empty($post_user)): ?>
            <?php $__currentLoopData = $post_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li class="span3" style="padding: 0px; margin: 0px;">
        <div class="thumbnail">
        <a href="<?php echo e('post_'.$p->post_id); ?>"><img src="<?php echo e(url('image_post/view/'.$p->image_post)); ?>" id="<?php echo e($p->post_id); ?>"alt="" style="width: 350px;height: 200px;" /></a>
        </div>
      </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      
        </ul>
    <center>
          <a href="home=<?php echo e($limit_tambah+12); ?>"><button class="btn btn-medium">tampilkan lebih banyak</button></a>
    </center>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master_home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>