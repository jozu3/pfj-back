

<?php $__env->startSection('title', 'Editar inscripcione'); ?>

<?php $__env->startSection('content_header'); ?>
    <a href="<?php echo e(route('admin.inscripciones.show', $inscripcione)); ?>" class="float-right">Ver recibo <i class="fas fa-chevron-right"></i></a>
    <h1>Editar matrícula</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('info')): ?>
        <div class="alert alert-success">
            <?php echo e(session('info')); ?>

        </div>
    <?php endif; ?>
    <div class="card">
        <div class="card-header">
            <b>Detalle de la matrícula</b>
            </div>
    	<div class="card-body">
    		<?php echo Form::model($inscripcione, ['route' => ['admin.inscripciones.update', $inscripcione], 'method' => 'put']); ?>

                
                <div class="form-group">
                    <?php echo Form::label('estado', 'Estado'); ?>

                    <?php echo Form::select('estado', [
                        '0' => 'Habilitado', 
                        '1' => 'Retirado', 
                        '2' => 'Suspendido',
                    ], null, ['class' => 'form-control']); ?>

                </div>
                <?php echo $__env->make('admin.inscripciones.partials.formedit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo Form::submit('Guardar', ['class' => 'btn btn-primary']); ?>

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
    <script> console.log('Hi!'); </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pfj\resources\views/admin/inscripciones/edit.blade.php ENDPATH**/ ?>