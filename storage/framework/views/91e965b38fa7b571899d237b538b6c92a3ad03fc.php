<?php $__env->startSection('content'); ?>
<div class="container" style="padding-left: 300px;">
    <div class="row">
        <div class="col-md-12"><h3>Edit Produk</h3></div>
        <div class="col-md-12">
            <form action="<?php echo e(route('update_produk_user')); ?>" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>



                <div class="form-group">
                    
                         <div class="col-sm-10">
                            <input class="form-control" id="#" type="hidden" name="produk_id" value="<?php echo e($produk->produk_id); ?>" placeholder="">
                         </div>
                </div>

                <div class="form-group">
                    
                         <div class="col-sm-10">
                            <input class="form-control" id="#" type="hidden" name="user_id" value="<?php echo e($produk->user_id); ?>" placeholder="">
                         </div>
                </div>
                <div class="form-group">
                  
                         <div class="col-sm-10">
                            <input class="form-control" id="#" type="hidden" name="user_name" value="<?php echo e($produk->user_name); ?>" placeholder="">
                         </div>
                </div>
                <div class="form-group">
                  
                         <div class="col-sm-10">
                            <input class="form-control" id="#" type="hidden" name="hp" value="<?php echo e($produk->hp); ?>" placeholder="">
                         </div>
                </div>
                <div class="form-group">
                  
                         <div class="col-sm-10">
                            <input class="form-control" id="" type="hidden" name="alamat" value="<?php echo e($produk->alamat); ?>" placeholder="">
                         </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-10 control-label">Nama Produk</label>
                         <div class="col-sm-10">
                            <input class="form-control" type="text" name="produk_name" value="<?php echo e($produk->produk_name); ?>" >
                         </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-10 control-label">Jenis Produk</label>
                         <div class="col-sm-10">
                    <label>
                    <select name="produk_jenis" required="required" style="width: 100px; height: 30px;">
                            <option value="Elektronik">Elektronik</option>
                            <option value="Baju">Baju</option>
                            <option value="Makanan">Makanan</option>
                            <option value="Kesehatan">Kesehatan</option>
                            <option value="Olahraga">Olahraga</option>
                            <option value="Buku">Buku</option>
                    </select>
                    </label>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-10 control-label">Merek</label>
                         <div class="col-sm-10">
                            <input class="form-control" type="text" name="produk_brand" style="width: 200px;" value="<?php echo e($produk->produk_brand); ?>">
                         </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-10 control-label">Model</label>
                         <div class="col-sm-10">
                            <input class="form-control" type="text" name="produk_model" style="width: 200px;" value="<?php echo e($produk->produk_model); ?>">
                         </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-10 control-label">Tanggal Released</label>
                         <div class="col-sm-10">
                            <input class="form-control" type="date" name="produk_released_on" style="width: 200px;" value="<?php echo e($produk->produk_released_on); ?>">
                         </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-10 control-label">Ukuran</label>
                         <div class="col-sm-10">
                            <input class="form-control" type="text" name="produk_dimensions" style="width: 200px;" value="<?php echo e($produk->produk_dimensions); ?>">
                         </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-10 control-label">Size</label>
                         <div class="col-sm-10">
                            <input class="form-control" type="number" name="produk_size" style="width: 200px;" value="<?php echo e($produk->produk_size); ?>">
                         </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-10 control-label">Descripsi</label>
                         <div class="col-sm-10">
                            <textarea name="produk_desc" style="width: 700px;" value="<?php echo e($produk->produk_desc); ?>"></textarea>
                         </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-10 control-label">Stock</label>
                         <div class="col-sm-10">
                            <input class="form-control" type="number" name="produk_qty" style="width: 200px;" value="<?php echo e($produk->produk_qty); ?>">
                         </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-10 control-label">Harga</label>
                         <div class="col-sm-10">
                            <input class="form-control" type="number" name="produk_price" style="width: 200px;" value="<?php echo e($produk->produk_price); ?>">
                         </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-10 control-label">Upload Foto 1 <i style="font-size: 9px; color: blue;">*wajib diisi</i></label>
                         <div class="col-sm-10">
                            <input class="form-control" type="file" name="produk_image_src1" value="<?php echo e($produk->produk_image_src1); ?>">
                         </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-10 control-label">Upload Foto 2 <i style="font-size: 9px; color: blue;">*wajib diisi</i></label>
                         <div class="col-sm-10">
                            <input class="form-control" type="file" name="produk_image_src2" value="<?php echo e($produk->produk_image_src2); ?>">
                         </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-10 control-label">Upload Foto 3 <i style="font-size: 9px; color: blue;">*wajib diisi</i></label>
                         <div class="col-sm-10">
                            <input class="form-control" type="file" name="produk_image_src3" value="<?php echo e($produk->produk_image_src3); ?>">
                         </div>
                </div>
                <!--
                <div class="form-group">
                    <label class="col-sm-10 control-label">Upload Video</label>
                         <div class="col-sm-10">
                            <input class="form-control" type="file" name="produk_video_url">
                         </div>
                </div>
                -->
                <div class="form-group">
                         <div class="col-sm-10">
                            <br/>
                            <button class="btn btn-sm btn-primary">Update Produk</button>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                         </div>
                </div>
                
            </form>
        </div>
    </div>
</div>

<script src="<?php echo e(url('plugins/tinymce/jquery.tinymce.min.js')); ?>"></script>
<script src="<?php echo e(url('plugins/tinymce/tinymce.min.js')); ?>"></script>
<script>tinymce.init({ selector:'textarea' });</script>

<script type="<?php echo e(url('plugins/tinymce/jquery.tinymce.min.js')); ?>"></script>
<script type="<?php echo e(url('plugins/tinymce/tinymce.min.js')); ?>"></script>
<script>tynymice.init({selector:'textarea'});</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>