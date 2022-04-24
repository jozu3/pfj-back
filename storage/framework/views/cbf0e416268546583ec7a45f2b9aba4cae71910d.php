

<?php $__env->startSection('title', 'PFJ'); ?>

<?php $__env->startSection('content_header'); ?>
	<a href="<?php echo e(route('admin.inscripciones.create', 'idcontacto='.$contacto->id)); ?>" class="btn btn-success btn-sm float-right">Inscribir</a>
    <h1>Contacto JAS: <?php echo e($contacto->nombres.' '.$contacto->apellidos); ?></h1>
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
				<?php echo Form::model($contacto, ['route' => ['admin.contactos.update', $contacto], 'method' => 'put', 'files' => true]); ?>


				<?php echo $__env->make('admin.contactos.partials.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<div class="row">
					
				<div class="col-md-12">
						<?php echo Form::label('estado', 'Estado'); ?>

						<?php echo Form::select('estado', [
								'1' => 'No contactado',
								'2' => 'Contactado',
								'3' => 'Probable',
								'4' => 'Confirmado',
								'5' => 'Inscrito',
							], null, ['class' => 'form-control', 'placeholder' => 'Escoge', 'disabled' => 'disabled', 'style' => 'appearance: none; ']);; ?>

				</div>
				</div>
				<br>
				<div class="form-group">
				<?php echo Form::submit('Actualizar datos', ['class' => 'btn btn-yellow-pfj']); ?>

				</div>
				<?php echo Form::close(); ?>

				
			</div>
		</div>
		
	</div>
	<?php if($contacto->personale != null): ?>
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Información de personal</h5>
				</div>
				<?php
					$personale = $contacto->personale;
				?>
				<div class="card-body">
					<?php echo Form::model($personale, ['route' => ['admin.personales.update', $personale], 'method' => 'put']); ?>

					<?php echo Form::hidden('show_contacto', '1'); ?>


						<?php echo $__env->make('admin.personales.partials.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						
						<?php echo Form::submit('Guardar', ['class' => 'btn btn-yellow-pfj']); ?>

					<?php echo Form::close(); ?>

				</div>
			</div>
		</div>
	<?php endif; ?>
	
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
    <script> 
		document.getElementById('imgperfil').addEventListener('change', cambiarImagen);

		function cambiarImagen(event){
			var file = event.target.files[0];

			var reader = new FileReader();
			reader.onload = (event) => {
				document.getElementById("img-show").setAttribute('src', event.target.result);
			};

			reader.readAsDataURL(file);
		}
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pfj\resources\views/admin/contactos/show.blade.php ENDPATH**/ ?>