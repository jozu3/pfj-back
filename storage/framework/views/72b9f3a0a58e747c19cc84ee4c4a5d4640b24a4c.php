<div>
	<?php if($pfjs->count()): ?>
		<div class="form-group">
			<?php echo Form::label('pfj_id', 'Pfj'); ?>

			<?php echo Form::select('pfj_id', $pfjs, null, ['class' => 'form-control ', 'placeholder' => 'Escoge un pfj', 'wire:model' => 'pfj_id']);; ?>

			<?php $__errorArgs = ['pfj_id'];
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

			<?php echo Form::select('programa_id', $programas, null, ['class' => 'form-control', 'placeholder' => 'Escoga programa según fecha de inicio', 'wire:model' => 'programa_id']);; ?>

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
		</div> 
	<?php else: ?>
	    <div class="">
	        <b>No hay pfjs disponibles</b>        
	    </div>
	<?php endif; ?>
</div><?php /**PATH C:\xampp\htdocs\pfj\resources\views/livewire/admin/programa-info.blade.php ENDPATH**/ ?>