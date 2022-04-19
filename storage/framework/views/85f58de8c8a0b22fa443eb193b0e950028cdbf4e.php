

<?php $__env->startSection('title', 'PFJ'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Editar personal</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('info')): ?>
        <div class="alert alert-success">
            <?php echo e(session('info')); ?>

        </div>
    <?php endif; ?>
    <div class="card">
    	<div class="card-body">
    		<?php echo Form::model($personale, ['route' => ['admin.personales.update', $personale], 'method' => 'put']); ?>

    			<?php echo $__env->make('admin.personales.partials.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
                <?php echo Form::submit('Guardar', ['class' => 'btn btn-yellow-pfj']); ?>

    		<?php echo Form::close(); ?>

    	</div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script> console.log('Hi!'); </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pfj\resources\views/admin/personales/edit.blade.php ENDPATH**/ ?>