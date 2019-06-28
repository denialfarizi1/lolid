<?php $__env->startSection('content'); ?>

  <div class="span9">
    <ul class="breadcrumb">
    <li><a href="index.html">Home</a> <span class="divider">/</span></li>
    <li class="active"> SHOPPING CART</li>
    </ul>
  <h3>  SHOPPING CART [ <small>3 Item(s) </small>]<a href="produk" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>  
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
  
  <?php if(!empty($cart)): ?>
                     <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <form action="<?php echo e(route('update_cart_produk')); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

  <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Produk</th>
                  <th>Nama Produk</th>
                  <th>Quantity</th>
                  <th>Harga</th>
                  <th>Total</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                

                <tr>
                  <td> <img width="60" src="<?php echo e(url('image/view/'.$c->produk_image_src1)); ?>" alt=""/></td>
                  <td><?php echo e($c->produk_name); ?><br/></td>
                  <form action="/cart_produk/update" method="POST">
                  <td> <input type="number" name="produk_cart_qty" id="harga_algoritma" value="<?php echo e($c->produk_cart_qty); ?>" style="width: 30px" onchange="total()">
                  </td>
                   
                  <td><?php echo e($c->produk_price); ?></td>
                  <input type="hidden" name="cart_id" value="<?php echo e($c->cart_id); ?>" >
                  <td>Rp.0,00</td>
                  <td><a href="/cart_produk/update"><button type="submit" class="btn btn-success btn-xs">update </button></a>
                      
                      <a href="produk_<?php echo e($c->produk_id); ?>"><button type="button" class="btn btn-info btn-xs"> detail</button></a>
                      <a href="/cart_produk/hapus/<?php echo e($c->cart_id); ?>"><button type="button" class="btn btn-danger btn-xs"> delete</button></a>
                  </td>
                  </form> 
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
                  <td colspan="4" style="text-align:right"><strong>TOTAL  =</strong></td>
                  <td class="label label-important" style="display:block"> <strong> Rp.0,00 </strong></td>
                </tr>
              </tbody>
            </table>
    </form>
<!--
    <div class="container">
    <h2>Form Pemesanan buku</h2>
    <table border="1">
      <tr>
        <th>No </th>
        <th>Judul buku</th>
        <th>harga</th>
        <th>jumlah</th>
      </tr>

      <tr>
        <th>1</th>
        <th>algoritma dan pemprograman</th>
        <th>@<input type="text" name="harga" id="algoritma" size="7" value="75000" readonly></th>
        <th>@<input type="number" name="jumlah_algoritma" id="harga_algoritma" size="7" value="0" onchange="total()"></th>
      </tr>

      <tr>
        <th>2</th>
        <th>algoritma dan pemprograman</th>
        <th>@<input type="text" name="harga" id="javascript" size="7" value="46000" readonly></th>
        <th>@<input type="number" name="jumlah_javascript" id="harga_javascript" size="7" value="0" onchange="total()"></th>
      </tr>

      <tr>
        <th>3</th>
        <th>PHP</th>
        <th>@<input type="text" name="harga" id="php" size="7" value="90000" readonly></th>
        <th>@<input type="number" name="jumlah_php" id="harga_php" size="7" value="0" onchange="total()"></th>
      </tr>

      <tr>
        
        <th colspan="3" style="text-align:right">jumlah total</th>
        <th>@<input type="text" name="total_jumlah" id="total" size="7" value="" readonly></th>
      </tr>
    </table>
    <br><br>
    <input type="button" onclick="window.print()" value="cetak">

    <script type="text/javascript">
    function total() {
    var valgoritma = 75000 * parseInt(document.getElementById('harga_algoritma').value);
    var vjavascript = 45000 * parseInt(document.getElementById('harga_javascript').value);
    var vphp = 90000 * parseInt(document.getElementById('harga_php').value);

    var jumlah_harga = valgoritma + vjavascript + vphp;

    document.getElementById('total').value = jumlah_harga;
    }
    
    </script>
  </div>
  Menghitung otomatis -->
            
      
      <a href="products.html" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
  <a href="login.html" class="btn btn-large pull-right">Next <i class="icon-arrow-right"></i></a>
  
</div>
</div>
</div>
</div>
<?php endif; ?>
      

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>