<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12"><h3>Insert Image</h3></div>
        <div class="col-md-12">
            <form action="" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>


                <div class="form-group">
                    <label for="">Image Title</label>
                    <input type="text" name="image_title" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Image Desc</label>
                    <textarea name="image_desc" id=""></textarea>
                </div>
                <div class="form-group">
                    <label for="">Upload</label>
                    <input type="file" name="image_src" id="" class="form-control">
                </div>

                <button class="btn btn-sm btn-primary float-right">Save Image</button>
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

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>