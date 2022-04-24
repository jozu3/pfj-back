

<?php $__env->startSection('title', 'Crear Anuncio'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Crear nuevo anuncio</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-body">
			<?php echo Form::open(['route' => 'admin.anuncios.store']); ?>

				
				<?php echo $__env->make('admin.anuncios.partials.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

				<?php echo Form::submit('Crear Anuncio', ['class' => 'btn btn-primary']); ?>

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
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pfj\resources\views/admin/anuncios/create.blade.php ENDPATH**/ ?>