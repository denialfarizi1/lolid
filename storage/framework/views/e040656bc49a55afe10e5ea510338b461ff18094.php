<?php $__env->startSection('content'); ?>

<div class="span9">
    <ul class="breadcrumb">
    <li><a href="home">Home</a> <span class="divider">/</span></li>
    <li class="produk">Produk</li>
    <li class="produk"><span class="divider">/</span>
     
    </li>
    </ul>
  <h3>
        <small class="pull-right">  [<?php echo e($count_produk); ?>] produk tersedia </small></h3> 
  <hr class="soft"/>
  <p>
    Pilih barang yang ada suka.
  </p>
  <hr class="soft"/>
  <form class="form-horizontal span6">
    <div class="control-group">
      <label class="control-label alignL">Sort By </label>
      <select>
              <option>Priduct name A - Z</option>
              <option>Priduct name Z - A</option>
              <option>Priduct Stoke</option>
              <option>Price Lowest first</option>
            </select>
    </div>
    </form>
    
<div id="myTab" class="pull-right">
 <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
</div>
<br class="clr"/>
<div class="tab-content">
  <div class="tab-pane" id="listView">
     <?php if(!empty($produk)): ?>
            <?php $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="row">   
      <div class="span2">
        <a href="produk_<?php echo e($val->produk_id); ?>"><img src="<?php echo e(url('image/view/'.$val->produk_image_src1)); ?>" alt="" /></a>
      </div>
      <div class="span3">
        <h3><?php echo e($val->produk_name); ?></h3>        
        <hr class="soft"/>
        <div class="desc">
       <?php echo $val->produk_desc; ?>

        </div>
        <a class="btn btn-small pull-right" href="produk_<?php echo e($val->produk_id); ?>">View Details</a>
        <br class="clr"/>
      </div>
      <div class="span3 alignR">
      <h3> Rp.<?php echo e($val->produk_price); ?>,00</h3>
      <label class="checkbox">
        <input type="checkbox">  Nego
      </label><br/>
            
          <?php if(auth()->guard()->guest()): ?>

        <form action="register" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>              
                <center><input type="number" name="produk_cart_qty" class="span1" placeholder="Qty."/></center>
                <center>
                <a href="register" class="btn btn-medium btn-primary">Add to <i class=" icon-shopping-cart"></i></a>
                <a href="produk_<?php echo e($val->produk_id); ?>" class="btn btn-medium"><i class="icon-zoom-in"></i></a>
                </center>
        </form>
         <?php else: ?>
          <form action="<?php echo e(route('cart_save')); ?>" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="asal" id="" value="cart_produk"/>              
                <input type="hidden" name="user_id" id="" value="<?php echo e(Auth::user()->id); ?>"/>
                <input type="hidden" name="produk_id" id="" value="<?php echo e($val->produk_id); ?>"/>           
                <input type="hidden" name="produk_name" id="" value="<?php echo e($val->produk_name); ?>">
                <input type="hidden" name="produk_price" id="" value="<?php echo e($val->produk_price); ?>"/>
                <input type="hidden" name="produk_image_src1" id="" value="<?php echo e($val->produk_image_src1); ?>"/>
                <center><input type="hidden" name="produk_cart_qty" class="span1" placeholder="Qty." value="1" /></center>
                <center>
                <a href="produk_<?php echo e($val->produk_id); ?>" class="btn btn-medium"><i class="icon-zoom-in"></i></a>
                <button class="btn btn-secondary"> Add to <i class=" icon-shopping-cart"></i></button>
                 </center>
         </form>
         <?php endif; ?>      </div>
    </div>
    <hr class="soft"/>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
     </div>
  <div class="tab-pane  active" id="blockView">
    <ul class="thumbnails">
       <?php if(!empty($produk) && $count_produk > 0 && $count_produk < 10): ?>
            <?php $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li class="span3">
        <div class="thumbnail">
        <a href="produk_<?php echo e($val->produk_id); ?>"><img src="<?php echo e(url('image/view/'.$val->produk_image_src1)); ?>" alt="" style="width: 120px; height: 120px;"/></a>
        <div class="caption">
           <h5><?php echo e($val->produk_name); ?></h5>
           <div style="height: 15px;">
          <p> 
           <?php echo e($val->produk_model); ?>

          </p>
          </div>
           <h4 style="text-align:center" ><a class="btn btn-primary" href="#">Rp.<?php echo e($val->produk_price); ?>,00</a></h4>
            <?php if(auth()->guard()->guest()): ?>

        <form action="register" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>              
                <center><input type="number" name="produk_cart_qty" class="span1" placeholder="Qty."/></center>
                <center>
                <a href="register" class="btn btn-medium btn-primary">Add to <i class=" icon-shopping-cart"></i></a>
                <a href="produk_<?php echo e($val->produk_id); ?>" class="btn btn-medium"><i class="icon-zoom-in"></i></a>
                </center>
        </form>
         <?php else: ?>
          <form action="<?php echo e(route('cart_save')); ?>" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="asal" id="" value="cart_produk"/>              
                <input type="hidden" name="user_id" id="" value="<?php echo e(Auth::user()->id); ?>"/>
                <input type="hidden" name="produk_id" id="" value="<?php echo e($val->produk_id); ?>"/>           
                <input type="hidden" name="produk_name" id="" value="<?php echo e($val->produk_name); ?>">
                <input type="hidden" name="produk_price" id="" value="<?php echo e($val->produk_price); ?>"/>
                <input type="hidden" name="produk_image_src1" id="" value="<?php echo e($val->produk_image_src1); ?>"/>
                <center><input type="hidden" name="produk_cart_qty" class="span1" placeholder="Qty." value="1" /></center>
                <center>
                <a href="produk_<?php echo e($val->produk_id); ?>" class="btn btn-medium"><i class="icon-zoom-in"></i></a>
                <button class="btn btn-secondary"> Add to <i class=" icon-shopping-cart"></i></button>
                 </center>
         </form>
         <?php endif; ?>
        </div>
        </div>
      </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </ul>
      <center>
          <a href="produk=<?php echo e($limit_tambah+24); ?>"><button class="btn btn-medium">tampilkan lebih banyak barang</button></a>
      
      </center>
  <hr class="soft"/>
  </div>
</div>
  
  <a href="" class="btn btn-large pull-right">Compair Product</a>
  <div class="pagination">
      <ul>
      <li><a href="#">&lsaquo;</a></li>
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">...</a></li>
      <li><a href="#">&rsaquo;</a></li>
      </ul>
      </div>
      <br class="clr"/>
</div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>