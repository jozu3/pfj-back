<div class="row">
<div class="col-md-3">
	<?php echo Form::label('nombre', 'Nombre'); ?>

	<?php echo Form::text('nombre', null, ['class' => 'form-control', /*'disabled' => ''*/]); ?>


	<?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
		<small class="text-danger"><?php echo e($message); ?></small>
	<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div> 
<div class="col-md-3">
	<?php echo Form::label('fecha_inicio', 'Fecha de inicio'); ?>

	<?php echo Form::date('fecha_inicio', null, ['class' => 'form-control']); ?>

	<?php $__errorArgs = ['fecha_inicio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
		<small class="text-danger"><?php echo e($message); ?></small>
	<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div> 

<div class="col-md-3">
	<?php echo Form::label('fecha_fin', 'Fecha de fin'); ?>

	<?php echo Form::date('fecha_fin', null, ['class' => 'form-control']); ?>

	<?php $__errorArgs = ['fecha_fin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
		<small class="text-danger"><?php echo e($message); ?></small>
	<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div> 

<div class="col-md-3">
	<?php echo Form::label('estado', 'Estado'); ?>

	<?php echo Form::select('estado', [
			'0' => 'Por iniciar',
			'1' => 'Iniciado',
			'2' => 'Terminado',
		], null, ['class' => 'form-control', 'placeholder' => '--Seleccione--']);; ?>

	<?php $__errorArgs = ['estado'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
		<small class="text-danger"><?php echo e($message); ?></small>
	<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div> 
</div> <?php /**PATH C:\xampp\htdocs\pfj\resources\views/admin/programas/partials/form.blade.php ENDPATH**/ ?>