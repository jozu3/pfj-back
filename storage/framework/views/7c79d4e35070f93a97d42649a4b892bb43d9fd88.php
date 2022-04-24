

<?php $__env->startSection('title', 'Inscripcioner'); ?>

<?php $__env->startSection('plugins.Select2', true); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Registrar personal en sesión</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('error')): ?>
        <div class="alert alert-danger">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>
    <div class="card">
    	<div class="card-body">
    		<?php echo Form::model($contacto, ['route' => 'admin.inscripciones.store']); ?>

                <?php echo $__env->make('admin.inscripciones.partials.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('admin.personales.partials.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo Form::submit('Registrar', ['class' => 'btn btn-primary']); ?>

    		<?php echo Form::close(); ?>

    	</div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <style>
        .form-check{
            display: inline-block;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script> 
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pfj\resources\views/admin/inscripciones/create.blade.php ENDPATH**/ ?>