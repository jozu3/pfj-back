<div class="form-group">
	<?php echo Form::label('descripcion', 'Descripción'); ?>

	<?php echo Form::textArea('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el anuncio']); ?>


	<?php $__errorArgs = ['descripcion'];
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
<div class="form-group">
	<?php echo Form::label('tipo', 'Tipo'); ?>

	<?php echo Form::select('tipo', [
			'1' => 'Urgente',
			'2' => 'Informativo',
			'3' => 'Advertencia',
		], null, ['class' => 'form-control', 'placeholder' => '-- Escoge un tipo de anuncio --']);; ?>

	<?php $__errorArgs = ['tipo'];
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
<div class="form-group">
	<?php echo Form::label('estado', 'Estado'); ?>

	<?php echo Form::select('estado', [
			'1' => 'Activo',
			'2' => 'Inactivo',
		], null, ['class' => 'form-control', 'placeholder' => '-- Escoge un estado --']);; ?>

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
<div class="form-group">
	<?php echo Form::label('programa_id', 'Sesión'); ?>

	<?php echo Form::select('programa_id', $programas, null, ['class' => 'form-control', 'placeholder' => '-- Escoge una sesión --']);; ?>

	<?php $__errorArgs = ['programa_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
		<small class="text-danger"><?php echo e($message); ?></small>
	<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div> <?php /**PATH C:\xampp\htdocs\pfj\resources\views/admin/anuncios/partials/form.blade.php ENDPATH**/ ?>