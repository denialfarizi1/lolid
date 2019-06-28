<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
    
    </head>
    <body>
        <div class="container" style="margin-top: 100px; width: 600px;">
            <h2 class="text-center">Please Type Your Email Address</h2>
            <h5 class="text-center">Demo App: How To Send Email with Gmail</h5>

            <!--Code to show success Messade -->
            <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session('success')); ?>

                <button type="button" class="close" data-dissmiss="alert" aria-label=Close></button>
                <span aria-hidden="true">&times;</span>
                
            </div>
            <?php endif; ?>

            <!-- code show error message -->
            <?php if(count($errors)>0): ?>
              <?php $__currentLoopData = $erors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <div class="alert alert-dager alert-dismissible fade show" role="alert"><?php echo e($error); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>   
                   </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>   
            
            <!-- form to input email address-->
            <form action="hello/send-welcome-email" method="POST">
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <input type="email" class="form-control text-center" required placeholder="Provide an email" name="email"><br>
                    <button type="submit" class="btn btn-primary btn-mid" style="margin-left: 0px;margin: auto; display: block;">
                        SEND
                    </button>   
                </div>
            </form>       
        </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script type="text/javascript" src="https://cdnjs.cloudflare/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>    
    </body>
</html>
