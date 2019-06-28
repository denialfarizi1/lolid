<?php $__env->startSection('content'); ?>

<div style="width: 600px; height: 400px; border:1px solid; float: right; padding-left: 50px; padding-right: 50px; padding-top: 40px; padding-bottom: 20px">
  <center>
    <form action="/user/update" method="POST" enctype="multipart/form-data">
       <?php echo e(csrf_field()); ?>

        <table style="font-size: 15px;">
          <tr>
            <td><label for="">Upload Foto Anda</label></td>
            <td></td>
            <td>  <div class="form-group">
                    <input type="file" name="image_profil">
                </div>
            </td>
          </tr>
          <tr>
            <td>Nama </td>
            <td style="width: 10px;">:</td>
            <input type="hidden" name="id" value="<?php echo e(Auth::user()->id); ?>">
            <td> <input type="text" name="name" value="<?php echo e(Auth::user()->name); ?>"></td>
          </tr>
          <tr>
            <td>Email</td>
            <td>:</td>
            <td> <input type="mail" name="email" value="<?php echo e(Auth::user()->email); ?>"></td>
          </tr>
          <tr>
            <td>HP/WA </td>
            <td>+62</td>
            <td><input type="number" name="hp" value="<?php echo e(Auth::user()->hp); ?>"></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><textarea name="alamat" value="<?php echo e(Auth::user()->alamat); ?>"></textarea></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td><input type="submit" value="update"></td>
          </tr>
        </table>
     </form>
  </center>
</div>
<br/>
<div class="container">
  
  <div class="row">
  <div class="span12">
  <iframe style="width:100%; height:300; border: 0px" scrolling="no" src="https://maps.google.co.uk/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=18+California,+Fresno,+CA,+United+States&amp;aq=0&amp;oq=18+California+united+state&amp;sll=39.9589,-120.955336&amp;sspn=0.007114,0.016512&amp;ie=UTF8&amp;hq=&amp;hnear=18,+Fresno,+California+93727,+United+States&amp;t=m&amp;ll=36.732762,-119.695787&amp;spn=0.017197,0.100336&amp;z=14&amp;output=embed"></iframe><br />
  <small><a href="https://maps.google.co.uk/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=18+California,+Fresno,+CA,+United+States&amp;aq=0&amp;oq=18+California+united+state&amp;sll=39.9589,-120.955336&amp;sspn=0.007114,0.016512&amp;ie=UTF8&amp;hq=&amp;hnear=18,+Fresno,+California+93727,+United+States&amp;t=m&amp;ll=36.732762,-119.695787&amp;spn=0.017197,0.100336&amp;z=14" style="color:#0000FF;text-align:left">View Larger Map</a></small>
  </div>
  </div>
</div>




 <?php if(!empty($produk)): ?>
      <?php $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
                

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>