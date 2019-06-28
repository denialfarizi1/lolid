<?php $__env->startSection('content'); ?>
<div class="container" style="padding-left: 300px;">
    <div class="row">
        <div class="col-md-12"><h3>Tambah Produk</h3></div>
        <div class="col-md-12">
            <form action="<?php echo e(route('produk_save')); ?>" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>


                <div class="form-group">
                    
                         <div class="col-sm-10">
                            <input  type="hidden" name="asal" value="user_produk" placeholder="">
                            <input class="form-control" id="#" type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>" placeholder="">
                         </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-10 control-label">Nama Produk <i style="font-size: 9px; color: blue;">*wajib diisi</i></label>
                         <div class="col-sm-10">
                            <input class="form-control" type="text" name="produk_name" >
                         </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-10 control-label">Lokasi <i style="font-size: 9px; color: blue;">*wajib diisi</i></label>
                         <div class="col-sm-10">
                            <input class="form-control" type="text" name="produk_lokasi" >
                         </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-10 control-label">Jenis Produk</label>
                         <div class="col-sm-10">
                    <label>
                    <select name="produk_jenis" required="required" style="width: 100px; height: 30px;">
                            <option value="Elektronik">Elektronik</option>
                            <option value="Alat_Rumah_Tangga">Alat Rumah Tangga</option>
                            <option value="Buku">Buku</option>
                            <option value="Hewan">Hewan</option>
                            <option value="Hiburan">Hiburan</option>
                            <option value="Jasa">Jasa</option>
                            <option value="Kesehatan">Kesehatan</option>
                            <option value="Makanan">Makanan</option>
                            <option value="Olahraga">Olahraga</option>
                            <option value="Pakaian">Pakaian</option>
                            <option value="Tempat">Tempat</option>
                            <option value="Lain_Lain">Lain-Lain</option>
                    </select>
                    </label>
                    </div>
                </div>
                <div class="tab-content" style="padding-bottom: 10px;">
                    <a href="#selengkapnya" class="btn btn-secondary btn-mini" data-toggle="tab">tampilkan deskripsi lengkap</a>
                    <i style="font-size: 9px; color: red;">*tidak wajib diisi</i></label>
                    <div class="tab-pane" id="selengkapnya">
                 <div class="form-group">
                    <label class="col-sm-10 control-label">Merek <i style="font-size: 9px; color: red;">*tidak wajib diisi</i></label>
                         <div class="col-sm-10">
                            <input class="form-control" type="text" name="produk_brand" style="width: 200px;">
                         </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-10 control-label">Model <i style="font-size: 9px; color: red;">*tidak wajib diisi</i></label>
                         <div class="col-sm-10">
                            <input class="form-control" type="text" name="produk_model" style="width: 200px;" >
                         </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-10 control-label">Tanggal Released  <i style="font-size: 9px; color: red;">*tidak wajib diisi</i></label>
                         <div class="col-sm-10">
                            <input class="form-control" type="date" name="produk_released_on" style="width: 200px;">
                         </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-10 control-label">Ukuran <i style="font-size: 9px; color: red;">*tidak wajib diisi</i></label>
                         <div class="col-sm-10">
                            <input class="form-control" type="text" name="produk_dimensions" style="width: 200px;" >
                         </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-10 control-label">Size <i style="font-size: 9px; color: red;">*tidak wajib diisi</i></label>
                         <div class="col-sm-10">
                            <input class="form-control" type="number" name="produk_size" style="width: 200px;">
                         </div>
                 </div>
                </div>
               </div>
                <div class="form-group">
                    <label class="col-sm-10 control-label">Descripsi <i style="font-size: 9px; color: blue;">*wajib diisi</i></label>
                         <div class="col-sm-10">
                            <textarea name="produk_desc" style="width: 700px;" ></textarea>
                         </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-10 control-label">Stock <i style="font-size: 9px; color: blue;">*wajib diisi</i></label>
                         <div class="col-sm-10">
                            <input class="form-control" type="number" name="produk_qty" style="width: 200px;">
                         </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-10 control-label">Harga <i style="font-size: 9px; color: blue;">*wajib diisi</i></label>
                         <div class="col-sm-10">
                            <input class="form-control" type="number" name="produk_price" style="width: 200px;">
                         </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-10 control-label">Upload Foto 1 <i style="font-size: 9px; color: blue;">*wajib diisi</i></label>
                         <div class="col-sm-10">
                            <input class="form-control" type="file" name="produk_image_src1">
                         </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-10 control-label">Upload Foto 2 <i style="font-size: 9px; color: red;">*tidak wajib diisi</i></label>
                         <div class="col-sm-10">
                            <input class="form-control" type="file" name="produk_image_src2">
                         </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-10 control-label">Upload Foto 3 <i style="font-size: 9px; color: red;">*tidak wajib diisi</i></label>
                         <div class="col-sm-10">
                            <input class="form-control" type="file" name="produk_image_src3">
                         </div>
                </div>
                <!--
                <div class="form-group">
                    <label class="col-sm-10 control-label">Upload Video <i style="font-size: 9px; color: red;" >*tidak wajib diisi</i></label>
                         <div class="col-sm-10">
                            <input class="form-control" type="file" name="produk_video_url">
                         </div>
                </div>
                -->
                <div class="form-group">
                         <div class="col-sm-10">
                            <br/>
                            <button class="btn btn-sm btn-primary">Save Produk</button>
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