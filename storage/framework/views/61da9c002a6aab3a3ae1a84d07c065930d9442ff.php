<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">

                    <form class="form-horizontal" method="POST" action="<?php echo e(route('register')); ?>" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="<?php echo e(old('username')); ?>" required>

                                <?php if($errors->has('username')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('username')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required><i style="font-size: 8px;color: blue;">*minmal 6 karakter</i>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required><i style="font-size: 8px;color: blue;">*minmal 6 karakter</i>
                            </div>
                        </div>

                         <div class="form-group<?php echo e($errors->has('hp') ? ' has-error' : ''); ?>">
                            <label for="hp" class="col-md-4 control-label">hp</label>

                            <div class="col-md-6">
                                <input id="hp" type="text" class="form-control" name="hp" value="<?php echo e(old('hp')); ?>" required autofocus>
                                <i style="font-size: 8px;color: blue;">*maximmal 20 angka</i>

                                <?php if($errors->has('hp')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('hp')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                         <div class="form-group<?php echo e($errors->has('alamat') ? ' has-error' : ''); ?>">
                            <label for="alamat" class="col-md-4 control-label">Alamat</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control" name="alamat" value="<?php echo e(old('alamat')); ?>" required autofocus>

                                <?php if($errors->has('alamat')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('alamat')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!--
                         <div class="form-group<?php echo e($errors->has('image_profil') ? ' has-error' : ''); ?>">
                            <label for="image_profil" class="col-md-4 control-label">Upload Foto</label>

                            <div class="col-md-6">
                                <input id="image_profil" type="file" class="form-control" name="image_profil" value="<?php echo e(old('image_profil')); ?>" required autofocus>

                                <?php if($errors->has('image_profil')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('image_profil')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                      -->
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>