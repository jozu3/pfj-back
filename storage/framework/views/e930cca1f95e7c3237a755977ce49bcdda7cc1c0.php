
<div class="form-group">
    <?php echo Form::label('barrio_id', 'Barrio/Rama'); ?>

    <?php echo Form::select('barrio_id', $barrios, null, ['class' => 'form-control', 'placeholder' => '-- Escoge --', 'style' => 'appearance: none; ']);; ?>

</div>
<?php $__errorArgs = ['barrio_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <small class="text-danger"><?php echo e($message); ?></small>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
<div class="form-group">
    <?php echo Form::label('permiso_obispo', 'Aprobación de su Obispo/Presidente de rama'); ?>

    <?php echo Form::select('permiso_obispo', [
            '1' => 'Aprobado',
            '2' => 'No tiene aprobación',
        ], null, ['class' => 'form-control', 'placeholder' => '-- Escoge --', 'style' => 'appearance: none; ']);; ?>

</div>
<?php $__errorArgs = ['permiso_obispo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <small class="text-danger"><?php echo e($message); ?></small>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
<div class="form-group">
    <?php echo Form::label('estado_rtemplo', 'Estado de la recomendación para el templo'); ?>

    <?php echo Form::select('estado_rtemplo', [
            '1' => 'Activa',
            '2' => 'No está activa',
        ], null, ['class' => 'form-control', 'placeholder' => '-- Escoge --', 'style' => 'appearance: none; ']);; ?>

</div>
<?php $__errorArgs = ['estado_rtemplo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <small class="text-danger"><?php echo e($message); ?></small>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php /**PATH C:\xampp\htdocs\pfj\resources\views/admin/personales/partials/form.blade.php ENDPATH**/ ?>