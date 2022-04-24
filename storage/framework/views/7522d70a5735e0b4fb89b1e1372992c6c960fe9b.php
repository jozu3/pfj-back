

<?php $__env->startSection('title', 'Panel'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>PFJ Lima Norte 2022</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <p>Bienvenido al Panel Administrativo del <strong>PFJ 2022</strong></p>
    <div>
        <div class="contimg">
            <img src="<?php echo e(config('app.url', 'http://localhost/pfj/public').'/img/portada.jpg'); ?>" alt="">
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="">
    <style type="text/css">
        .contimg{
            text-align: center;   
        }
        .contimg>img{
            width:100%!important;
            opacity: 1;
            border:  0px!important;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script> console.log('Hi!'); </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pfj\resources\views/admin/index.blade.php ENDPATH**/ ?>