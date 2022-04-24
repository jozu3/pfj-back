

<?php $__env->startSection('title', 'Detalle de Inscripcione'); ?>

<?php $__env->startSection('content_header'); ?>
	<a href="<?php echo e(route('admin.inscripciones.edit', $inscripcione)); ?>" class="btn btn-success btn-sm float-right">Editar matrícula</a>
	<a href="<?php echo e(route('admin.print', 'recibo-inscripcione?idinscripcione='.$inscripcione->id)); ?>" class="btn btn-danger btn-sm float-right mr-2" target="_blank"><i class="fas fa-file-pdf"></i> Imprimir recibo</a>
    <h1>Personale: <?php echo e($inscripcione->personale->contacto->nombres.' '.$inscripcione->personale->contacto->apellidos); ?></h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if(session('info')): ?>
    <div class="alert alert-success">
        <?php echo e(session('info')); ?>

    </div>
<?php endif; ?>
<?php if(session('error')): ?>
    <div class="alert alert-danger">
        <?php echo e(session('error')); ?>

    </div>
<?php endif; ?>
<div class="row">		
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-3">
						<p>DNI:</p>
					</div>
					<div class="col-md-9"><?php echo e($inscripcione->personale->contacto->doc); ?></div>
					<div class="col-md-3">
						<p>Correo electrónico:</p>
					</div>
					<div class="col-md-9"><?php echo e($inscripcione->personale->user->email); ?></div>
					<div class="col-md-3">
						<p>Teléfono:</p>
					</div>
					<div class="col-md-9"><?php echo e($inscripcione->personale->contacto->telefono); ?></div>
					<div class="col-md-3">
						<p>Código:</p>
					</div>
					<div class="col-md-9"><?php echo e($inscripcione->personale->codigo); ?></div>
					<div class="col-md-3">
						<p>Pfj:</p>
					</div>
					<div class="col-md-9"><?php echo e($inscripcione->programa->nombre); ?></div>
					<div class="col-md-3">
						<p>Fecha de inicio de la sesión:</p>
					</div>
					<div class="col-md-9"><?php echo e(date('d/m/Y', strtotime($inscripcione->programa->fecha_inicio))); ?></div>
				</div>
			</div>
		</div>
	</div>
	
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <style type="text/css">
        .card-body {
            overflow: auto;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script> console.log('Hi!'); </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pfj\resources\views/admin/inscripciones/show.blade.php ENDPATH**/ ?>