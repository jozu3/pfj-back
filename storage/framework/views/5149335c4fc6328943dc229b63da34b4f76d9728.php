<div class="row">
<div class="col-md-4">
	<?php echo Form::label('nombres', 'Nombre'); ?>

	<?php echo Form::text('nombres', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del nuevo contacto']); ?>

	<?php $__errorArgs = ['nombres'];
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
<div class="col-md-4">
	<?php echo Form::label('apellidos', 'Apellidos'); ?>

	<?php echo Form::text('apellidos', null, ['class' => 'form-control', 'placeholder' => 'Ingrese los apellidos del nuevo contacto']); ?>

	<?php $__errorArgs = ['apellidos'];
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
<div class="col-md-4">
	
	<?php echo Form::label('telefono', 'Teléfono'); ?>

	<?php echo Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el teléfono del nuevo contacto']); ?>

	<?php $__errorArgs = ['telefono'];
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
	<?php echo Form::label('imgperfil', 'Imagen de perfil'); ?>

	<div class="row p-2">
		<div class="col">
			<img id="img-show" class="img-fluid" src="<?php if( isset($contacto)): ?> <?php if(isset($contacto->image)): ?> <?php echo e(Storage::url($contacto->image->url)); ?> <?php endif; ?> <?php endif; ?>"  alt="">
		</div>
		<div class="col">
			<?php echo Form::file('imgperfil', ['class' => 'form-control-file', 'accept' => 'image/*']); ?>

			<p>Solo se permite los formatos de imagen(jpg, png)</p>
			<?php $__errorArgs = ['imgperfil'];
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
	</div>

</div>
<div class="col-md-4">
	
	<?php echo Form::label('email', 'Correo electrónico'); ?>

	<?php echo Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el email del nuevo contacto']); ?>

<?php $__errorArgs = ['email'];
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
<div class="col-md-4">
	<?php echo Form::label('doc', 'DNI/CE'); ?>

	<?php echo Form::text('doc', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el documento de identidad del nuevo contacto']); ?>

<?php $__errorArgs = ['doc'];
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
	<?php echo Form::label('genero', 'Género'); ?>

	<?php echo Form::select('genero', [
			'Mujer' => 'Mujer',
			'Hombre' => 'Hombre',
		], null, ['class' => 'form-control', 'placeholder' => '-- Escoge --']);; ?>

	<?php $__errorArgs = ['genero'];
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
 


</div> <?php /**PATH C:\xampp\htdocs\pfj\resources\views/admin/contactos/partials/form.blade.php ENDPATH**/ ?>