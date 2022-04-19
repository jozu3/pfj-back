<div>
	<?php if(!$is_report): ?>
   <div class="form-check">
	<?php echo Form::radio('asistencia', 0, null, ['class' => 'form-check-input disabled:opacity-25', 'id' =>'cl_a'.$capacitacione_id.$inscripcione_id, 'wire:click' => 'saveAsistencia', 'wire:model' => 'asistencia', 'wire:loading.attr' => 'disabled']); ?> 
	<?php echo Form::label('cl_a'.$capacitacione_id.$inscripcione_id, 'A', ['class' => 'form-check-label']); ?>

	</div>
	<div class="form-check">
	<?php echo Form::radio('asistencia', 1, null, ['class' => 'form-check-input disabled:opacity-25', 'id' =>'cl_f'.$capacitacione_id.$inscripcione_id, 'wire:click' => 'saveAsistencia', 'wire:model' => 'asistencia', 'wire:loading.attr' => 'disabled']); ?> 
	<?php echo Form::label('cl_f'.$capacitacione_id.$inscripcione_id, 'F', ['class' => 'form-check-label']); ?>

	</div>
	<div class="form-check">
	<?php echo Form::radio('asistencia', 2, null, ['class' => 'form-check-input disabled:opacity-25', 'id' =>'cl_fj'.$capacitacione_id.$inscripcione_id, 'wire:click' => 'saveAsistencia', 'wire:model' => 'asistencia', 'wire:loading.attr' => 'disabled']); ?> 
	<?php echo Form::label('cl_fj'.$capacitacione_id.$inscripcione_id, 'FJ', ['class' => 'form-check-label']); ?>

	</div>
 	<?php else: ?>
 		<?php switch($asistencia):
 		   case (''): ?>
 				<?php echo e(''); ?>

 		      <?php break; ?>
 		   <?php case (1): ?>
 				<?php echo e('F'); ?>

 		      <?php break; ?>
 		   <?php case (2): ?>
 				<?php echo e('FJ'); ?>

 		      <?php break; ?>
 		   <?php case (0): ?>
 				<?php echo e('A'); ?>

 		      <?php break; ?>
 		   <?php default: ?>
 		      <?php echo e(''); ?>

 		<?php endswitch; ?>
 	<?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\pfj\resources\views/livewire/admin/create-asistencia.blade.php ENDPATH**/ ?>