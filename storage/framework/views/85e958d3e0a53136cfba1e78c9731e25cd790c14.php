<div class="row">
	<div class="col-md-12">
		<?php echo Form::label('nombre', 'Nombre'); ?>

		<?php echo Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del nuevo pfj']); ?>

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
	<div class="col-md-12">
		<?php echo Form::label('lema', 'Lema'); ?>

		<?php echo Form::text('lema', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el lema del nuevo pfj']); ?>

		<?php $__errorArgs = ['lema'];
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
	<div class="col-md-12">
		<?php echo Form::label('lema_abreviado', 'Lema abreviado'); ?>

		<?php echo Form::text('lema_abreviado', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el lema abreviado del nuevo pfj']); ?>

		<?php $__errorArgs = ['lema_abreviado'];
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
<div class="col-md-12">
	<?php echo Form::label('estado', 'Estado'); ?>

	<?php echo Form::select('estado', [
			'0' => 'Discontinuado',
			'1' => 'Activo',
		], null, ['class' => 'form-control', 'placeholder' => 'Escoge']);; ?>

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
</div> <?php /**PATH C:\xampp\htdocs\pfj\resources\views/admin/pfjs/partials/form.blade.php ENDPATH**/ ?>