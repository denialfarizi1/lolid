<?php $__env->startSection('content'); ?>

<div style="width: 600px; height: 400px; border:1px solid; float: right; padding-left: 50px; padding-right: 50px; padding-top: 40px; padding-bottom: 20px">
  <center>
  <table style="font-size: 15px;font-family: Verdana;">
    <tr>
      <td></td>
      <td></td>
      <td><center><img style="width:60px;" src="<?php echo e(url('image/view/'.Auth::user()->image_profil)); ?>" alt=""/></center></td>
    </tr>
    <tr>
      <td><b>Nama </b></td>
      <td style="width: 10px;"><b>:</b></td>
      <td><b><?php echo e(Auth::user()->name); ?></b></td>
    </tr>
    <tr>
      <td><b>Email</b></td>
      <td><b>:</b></td>
      <td><b><?php echo e(Auth::user()->email); ?></b></td>
    </tr>
    <tr>
      <td><b>HP/WA</b></td>
      <td><b>:</b></td>
      <td><b>0<?php echo e(Auth::user()->hp); ?></b></td>
    </tr>
    <tr>
      <td><b>Alamat</b></td>
      <td><b>:</b></td>
      <td><b><?php echo e(Auth::user()->alamat); ?></b></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td><a href="edit_profil"><input type="button" value="edit"></a></td>
    </tr>
  </b>
  </table>
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