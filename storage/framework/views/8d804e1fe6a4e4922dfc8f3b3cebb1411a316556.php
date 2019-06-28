<?php $__env->startSection('content'); ?>

  <div class="span7" style="width: 520px;">
    <ul class="breadcrumb">
    <li><a href="index.html">Home</a> <span class="divider">/</span></li>
    <li class="active"> SHOPPING CART</li>
    </ul>
  <h3>  KERANJANG BELANJA [ <small><?php echo e($count_cart); ?> Item(s) </small>]<a href="produk=m" class="btn btn-medium pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>  
  <hr class="soft"/>
  <?php if(auth()->guard()->guest()): ?>
  <table class="table table-bordered">
    <tr><th> I AM ALREADY REGISTERED  </th></tr>
     <tr> 
     <td>
      <form class="form-horizontal">
        <div class="control-group">
          <label class="control-label" for="inputUsername">Username</label>
          <div class="controls">
          <input type="text" id="inputUsername" placeholder="Username">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputPassword1">Password</label>
          <div class="controls">
          <input type="password" id="inputPassword1" placeholder="Password">
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
          <button type="submit" class="btn">Sign in</button> OR <a href="register.html" class="btn">Register Now!</a>
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <a href="forgetpass.html" style="text-decoration:underline">Forgot password ?</a>
          </div>
        </div>
      </form>
      </td>
      </tr>
  </table>    
  <?php else: ?>
  

  <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Produk</th>
                  <th>Nama Produk</th>
                  <th>Quantity</th>
                  <th>Harga</th>
                  <th>Total</th>
                  <th width="150">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($cart)): ?>
                     <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>
                  <td> <img width="60" src="<?php echo e(url('image/view/'.$c->produk_image_src1)); ?>" /></td>
                  <td><?php echo e($c->produk_name); ?><br/></td>
                  <td>
                    <?php if(!empty($c->produk_cart_qty)): ?>
                      <?php

                        
                        $produk_total = $c->produk_cart_qty * $c->produk_price ;
                     ?>
                       <?php echo e($c->produk_cart_qty); ?>

                      <?php else: ?>
                      <?php
                        $produk_cart_qty = 0 ;
                        $produk_total = $produk_cart_qty * $c->produk_price ;
                     ?>
                       <?php echo e($produk_cart_qty); ?>

                      <?php endif; ?>
                    
                  </td>
                  <td>Rp.<?php echo e($c->produk_price); ?>,00</td>
                  <td>
                       Rp.<?php echo e($produk_total); ?>,00
                  </td>
                  <td>
                     <div style="width: 130px;">
                      <div style="width: 35px; float: left;">
                       <a href="medit_cart_produk"><button type="button" class="btn btn-success btn-mini">edit </button></a>
                      </div>
                      <div style="width: 45px; float: left;">
                      <a href="mproduk_<?php echo e($c->produk_id); ?>"><button type="button" class="btn btn-info btn-mini" > detail</button></a>
                     </div>
                      <div style="width: 50px; float: left;">
                      <form action="/cart_produk/hapus/<?php echo e($c->cart_id); ?>" method="POST">
                        <?php echo e(csrf_field()); ?> 
                      <input type="hidden" name="asal" value="mcart_produk">
                      <button type="submit" class="btn btn-danger btn-mini"> delete</button>
                      </form>
                     </div>
                   </div>
                  </td>
                  
                </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 <?php endif; ?>
                <tr>
                  <td colspan="4" style="text-align:right" >Total Price: </td>
                  <td></td>
                </tr>
                 <tr>
                  <td colspan="4" style="text-align:right">Total Discount:  </td>
                  <td> Rp.0,00</td>
                </tr>
                 <tr>
                  <td colspan="4" style="text-align:right">Total Tax: </td>
                  <td> Rp.0,00</td>
                </tr>
                <tr>
                  <td colspan="4" style="text-align:right"><strong>TOTAL =</strong></td>
                  <td class="label label-important" style="display:block"> <strong> Rp.,00 </strong></td>
                </tr>
              </tbody>
            </table>
   
      <a href="produk-m" class="btn btn-medium"><i class="icon-arrow-left"></i> Continue Shopping </a>
  <a href="#" class="btn btn-medium pull-right">Next <i class="icon-arrow-right"></i></a>
  
</div>
</div>
</div>
</div>
<?php endif; ?>
 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('mmaster', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>