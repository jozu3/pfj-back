

<?php $__env->startSection('title', 'Crear programa'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Crear nueva sesión</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-body">
			<?php echo Form::open(['route' => 'admin.programas.store']); ?>

				<?php echo Form::hidden('pfj_id', $pfj->id); ?>

				
				<?php echo $__env->make('admin.programas.partials.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				
				<br>
				<div class="form-group">
					
				<?php echo Form::submit('Crear programa', ['class' => 'btn btn-primary']); ?>

				</div>
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
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pfj\resources\views/admin/programas/create.blade.php ENDPATH**/ ?>