<?php $__env->startSection('content'); ?>


        <div class="span9">
    <ul class="breadcrumb">
    <li><a href="index.html">Home</a> <span class="divider">/</span></li>
    <li class="active"> SHOPPING CART</li>
    </ul>
  <h3>  Detail Produk Anda [ <small><?php echo e($count_produk_user); ?> Item(s) </small>]<a href="tambah_produk" class="btn btn-large pull-right"><i class="icon-arrow-up"></i> Tambah Produk </a></h3>  
  <hr class="soft"/>
 <?php if(!empty($user_produk_post)): ?>
      <?php $__currentLoopData = $user_produk_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Product Name</th>
                  <th>Brand</th>
                  <th>Model</th>
                  <th>Size</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Action</th>
             </tr>
              </thead>
              <tbody>
                <tr>
                  <td><center><img width="60" src="<?php echo e(url('image/view/'.$val->produk_image_src1)); ?>" alt=""/></br><?php echo e($val->produk_name); ?></center></td>
                  
                  <td><center><?php echo e($val->produk_brand); ?></center></td>
                  <td><center><?php echo e($val->produk_model); ?></center></td>
                  <td><center><?php echo e($val->produk_size); ?></center></td>
                  <td><center><?php echo e($val->produk_qty); ?></center></td>
                  <td><center>Rp.<?php echo e($val->produk_price); ?>,00</center></td>
                  <td><center>
                      <div style="width: 120px;">
                        <div style="float: left; padding-right: 2px;">
                             <a href="edit_produk_<?php echo e($val->produk_id); ?>"><button style="font-size: 10px" type="button" class="btn btn-success btn-mini">edit </button></a>
                        </div>
                       <div style="float: left; padding-right: 2px;">
                           <a href="produk_<?php echo e($val->produk_id); ?>"><button style="font-size: 10px" type="button" class="btn btn-info btn-mini"> detail</button></a>
                        </div>
                         <div style="float: left;">
                           <form action="/produk/hapus/<?php echo e($val->produk_id); ?>" method="post" >
                           <?php echo e(csrf_field()); ?>

                           <input type="hidden" name="asal" value="user_produk">
                           <button style="font-size: 10px" type="submit" class="btn btn-danger btn-mini"> delete</button>
                         </form>
                          </div>
                        </div>
                      </center>
                  </td>
                  
                </tr>
        
            </table>
    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
                
  <a href="produk" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
  <a href="login" class="btn btn-large pull-right">Next <i class="icon-arrow-right"></i></a>
  
</div>
</div>
</div>
</div>
      

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>