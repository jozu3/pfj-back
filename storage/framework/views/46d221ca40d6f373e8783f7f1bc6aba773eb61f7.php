<div class="form-group">
	<div class="form-group">
		<?php echo Form::label('role_id', 'Rol'); ?>

		<?php echo Form::select('role_id', $roles, null, ['class' => 'form-control ', 'placeholder' => 'Escoge un rol', 'wire:model' => 'role_id']);; ?>

		<?php $__errorArgs = ['role_id'];
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
	
	<div>
	<?php if(session('haypagos')): ?>
		<small class="text-danger"><?php echo e(session('haypagos')); ?></small>
	<?php endif; ?>
	</div>
</div> <?php /**PATH C:\xampp\htdocs\pfj\resources\views/admin/inscripciones/partials/formedit.blade.php ENDPATH**/ ?>