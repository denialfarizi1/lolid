<?php $__env->startSection('content'); ?>
<?php if(empty($produk)): ?>
<div class="container">
<b> Anda tidak memiliki produk</b>
</div>
<?php endif; ?>
<?php if(!empty($produk)): ?>
            <?php $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="span9">
    <ul class="breadcrumb">
    <li><a href="home">Home</a> <span class="divider">/</span></li>
    <li><a href="produk">Products</a> <span class="divider">/</span></li>
    <li class="active">product Details</li>
    </ul> 
  <div class="row">   
      <div id="gallery" class="span3">
            <a href="<?php echo e('image/view/'.$val->produk_image_src1); ?>" title="Fujifilm FinePix S2950 Digital Camera">
        <img src="<?php echo e(url('image/view/'.$val->produk_image_src1)); ?>" style="width:100%" alt="Fujifilm FinePix S2950 Digital Camera"/>
            </a>
      <div id="differentview" class="moreOptopm carousel slide">
                <div class="carousel-inner">
                  <div class="item active">
                   <a href="<?php echo e('image/view/'.$val->produk_image_src1); ?>"> <img style="width:29%" src="<?php echo e(url('image/view/'.$val->produk_image_src1)); ?>" alt=""/></a>
                   <a href="<?php echo e('image/view/'.$val->produk_image_src2); ?>"> <img style="width:29%" src="<?php echo e(url('image/view/'.$val->produk_image_src2)); ?>" alt=""/></a>
                   <a href="<?php echo e('image/view/'.$val->produk_image_src3); ?>" > <img style="width:29%" src="<?php echo e(url('image/view/'.$val->produk_image_src3)); ?>" alt=""/></a>
                  </div>
                  <div class="item">
                   <a href="<?php echo e('image/view/'.$val->produk_image_src1); ?>" > <img style="width:50%" src="<?php echo e('image/view/'.$val->produk_image_src1); ?>" alt=""/></a>
                   <a href="<?php echo e('image/view/'.$val->produk_image_src2); ?>"> <img style="width:50%" src="<?php echo e('image/view/'.$val->produk_image_src2); ?>" alt=""/></a>
                   <a href="<?php echo e('image/view/'.$val->produk_image_src3); ?>"> <img style="width:50%" src="<?php echo e('image/view/'.$val->produk_image_src3); ?>" alt=""/></a>
                  </div>
                </div>
              <!--  
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a> 
        -->
              </div>
        
       <div class="btn-toolbar">
        <div class="btn-group">
        <span class="btn"><i class="icon-envelope"></i></span>
        <span class="btn" ><i class="icon-print"></i></span>
        <a href="<?php echo e('image/view/'.$val->produk_image_src1); ?>"><<span class="btn" ><i class="icon-zoom-in"></i></span></a>
        <span class="btn" ><i class="icon-star"></i></span>
        <span class="btn" ><i class=" icon-thumbs-up"></i></span>
        <span class="btn" ><i class="icon-thumbs-down"></i></span>
        </div>
      </div>
      </div>
      
      <div class="span6">
        <h3><?php echo e($val->produk_name); ?> </h3> 
        <small>- <?php echo e($val->produk_model); ?></small>
        <hr class="soft"/>
        <?php if(auth()->guard()->guest()): ?>
        <form action="register" class="form-horizontal qtyFrm">
      
        <?php else: ?>
         <?php endif; ?>  
          <div class="control-group">
          <label class="control-label"><span>Rp.<?php echo e($val->produk_price); ?></span></label>
          <div class="controls">
           <?php if(auth()->guard()->guest()): ?>

        <form action="register" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>              
                <center><input type="number" name="produk_cart_qty" class="span1" placeholder="Qty."/></center>
                <center>
                <a href="register" class="btn btn-medium btn-primary">Add to <i class=" icon-shopping-cart"></i></a>
                </center>
        </form>
         <?php else: ?>
          <form action="<?php echo e(route('cart_save')); ?>" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>              
                <input type="hidden" name="user_id" id="" value="<?php echo e(Auth::user()->id); ?>"/>
                <input type="hidden" name="produk_id" id="" value="<?php echo e($val->produk_id); ?>"/>           
                <input type="hidden" name="produk_name" id="" value="<?php echo e($val->produk_name); ?>">
                <input type="hidden" name="produk_price" id="" value="<?php echo e($val->produk_price); ?>"/>
                <input type="hidden" name="produk_image_src1" id="" value="<?php echo e($val->produk_image_src1); ?>"/>
                <input type="number" name="produk_cart_qty" class="span1" placeholder="Qty." />
                <button type="submit" class="btn btn-large btn-primary pull-right"> Add to <i class=" icon-shopping-cart"></i></button>
                
         </form>
         <?php endif; ?>
          
          </div>
          </div>
         
        <hr class="soft"/>
        <h4><?php echo e($val->produk_qty); ?> barang tersedia</h4>
        <form class="form-horizontal qtyFrm pull-right">
          <div class="control-group">
          <label class="control-label"><span>Color</span></label>
          <div class="controls">
            <select class="span2">
              <option>Black</option>
              <option>Red</option>
              <option>Blue</option>
              <option>Brown</option>
            </select>
          </div>
          </div>
        </form>
        <hr class="soft clr"/>
        <p>
          <?php echo e($val->produk_desc); ?>

        </p>
        <a class="btn btn-small pull-right" href="#detail">More Details</a>
        <br class="clr"/>
      <a href="#" name="detail"></a>
      <hr class="soft"/>
      </div>
      <div class="user">
        <table>
          <tr>
            <td><b>Penjual</b></td>
            <td style="padding-left: 10px;">:</td>
            <td style="padding-left: 10px;"><b><?php echo e($val->user_name); ?></b></td>
          </tr>
          <tr>
            <td><img src="themes/images/wa.png" style="width: 80px; height: 25px;"></td>
            <td style="padding-left: 10px;">:</td>
            <td style="padding-left: 10px;"><b>0<?php echo e($val->hp); ?></b></td>
          </tr>
          <tr>
            <td><img src="themes/images/alamat.png" style="width: 80px; height: 25px;"></td>
            <td style="padding-left: 10px;">:</td>
            <td style="padding-left: 10px;"><b><?php echo e($val->alamat); ?></b></td>
          </tr>
        
        </table>
      </div>
      

      <div class="span9">
            <ul id="productDetail" class="nav nav-tabs">
              <li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>
              <li><a href="#profile" data-toggle="tab">Related Products</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade active in" id="home">
        <h4>Product Information</h4>
                <table class="table table-bordered">
        <tbody>
        <tr class="techSpecRow"><th colspan="2">Product Details</th></tr>
        <tr class="techSpecRow"><td class="techSpecTD1">Brand: </td><td class="techSpecTD2"><?php echo e($val->produk_brand); ?></td></tr>
        <tr class="techSpecRow"><td class="techSpecTD1">Model:</td><td class="techSpecTD2"><?php echo e($val->produk_model); ?></td></tr>
        <tr class="techSpecRow"><td class="techSpecTD1">Released on:</td><td class="techSpecTD2"> <?php echo e($val->produk_released_on); ?></td></tr>
        <tr class="techSpecRow"><td class="techSpecTD1">Dimensions:</td><td class="techSpecTD2"> <?php echo e($val->produk_dimensions); ?></td></tr>
        <tr class="techSpecRow"><td class="techSpecTD1">Display size:</td><td class="techSpecTD2"><?php echo e($val->produk_size); ?></td></tr>
        </tbody>
        </table>
        
        <h5>Features</h5>
        <?php echo e($val->produk_desc); ?>

              </div>
    <div class="tab-pane fade" id="profile">
    <div id="myTab" class="pull-right">
     <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
     <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
    </div>
    <br class="clr"/>
    <hr class="soft"/>
    <div class="tab-content">
      <div class="tab-pane" id="listView">
     <?php if(!empty($produk)): ?>
            <?php $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="row">   
      <div class="span2">
        <a href="produk_<?php echo e($val->user_id); ?>"><img src="<?php echo e(url('image/view/'.$val->produk_image_src1)); ?>" alt=""/></a>
      </div>
      <div class="span4">
        <h3>New | Available</h3>        
        <hr class="soft"/>
        <h5><?php echo e($val->produk_name); ?></h5>
        <div class="desc">
       <?php echo e($val->produk_desc); ?>

        </div>
        <a class="btn btn-small pull-right" href="product_details.html">View Details</a>
        <br class="clr"/>
      </div>
      <div class="span3 alignR">
      <form class="form-horizontal qtyFrm">
      <h3> Rp.<?php echo e($val->produk_price); ?>,00</h3>
      <label class="checkbox">
        <input type="checkbox">  Nego
      </label><br/>
      
        <a href="product_details.html" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
        <a href="product_details.html" class="btn btn-large"><i class="icon-zoom-in"></i></a>
      
        </form>
      </div>
    </div>
    <hr class="soft"/>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
     </div>
  <div class="tab-pane  active" id="blockView">
    <ul class="thumbnails">
       <?php if(!empty($produk)): ?>
            <?php $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li class="span3">
        <div class="thumbnail">
        <a href="produk_<?php echo e($val->user_id); ?>"><img src="<?php echo e(url('image/view/'.$val->produk_image_src1)); ?>" alt=""/></a>
        <div class="caption">
           <h5><?php echo e($val->produk_name); ?></h5>
          <p> 
           <?php echo e($val->produk_model); ?>

          </p>
           <h4 style="text-align:center"><a class="btn" href="produk_<?php echo e($val->produk_id); ?>"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">Rp.<?php echo e($val->produk_price); ?>,00</a></h4>
        </div>
        </div>
      </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </ul>
  <hr class="soft"/>
  </div>

    </div>
        <br class="clr">
           </div>
    </div>
          </div>

  </div>
</div>
</div> 
</div>

       
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>