<div>
	<?php if(session('info_capacitacione')): ?>
        <div class="alert alert-success">
            <?php echo e(session('info_capacitacione')); ?>

        </div>
    <?php endif; ?>
	<?php if($info_capacitacione != ''): ?>
        <div class="alert alert-success">
            <?php echo e($info_capacitacione); ?>

        </div>
    <?php endif; ?>
    <table class="table table-striped">
    	<thead>
    		<tr>
    			<th>Tema de la Capacitación</th>
    			<th>Fecha</th>
    			<th></th>
    		</tr>
    	</thead>
    	<tbody>
    		<?php $__currentLoopData = $capacitaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $capacitacione): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    			<tr>
    				<?php echo Form::model($capacitacione, ['route' => ['admin.capacitaciones.update', $capacitacione], 'method' => 'put']); ?>

					<?php echo Form::hidden('programa_id', null); ?>

    				<td>
    					<?php echo Form::text('tema', null, ['class' => 'form-control']); ?>

					</td>
					<td>
						<?php echo Form::date('fechacapacitacion', null, ['class' => 'form-control']); ?>

					<td width="10px">
						<button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i></button>
    				</td>
    				<?php echo Form::close(); ?>

					<td width="10px">
						<form method="POST" action="<?php echo e(route('admin.capacitaciones.destroy', $capacitacione)); ?>">
							<?php echo csrf_field(); ?>
							<?php echo method_field('DELETE'); ?>
							<button type="submit" class="btn btn-sm btn-danger">
								<i class="fas fa-trash-alt"></i>
							</button>
						</form>
					</td>
    			</tr>
    		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			<tr>
				<form wire:submit.prevent="submit">
				<td>
					<input type="text" name="tema" wire:model="tema" class="form-control">
					<?php $__errorArgs = ['tema'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
				</td>
				<td>
					<input type="date" name="fechacapacitacion" wire:model="fechacapacitacion" class="form-control">
					<?php $__errorArgs = ['fechacapacitacion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
				</td>
				<td>
					<input type="submit" value="Guardar" wire:click="submit"  wire:loading.attr="disabled" wire:target="submit" class="btn btn-sm btn-primary disabled:opacity-25">
				</td>
				</form>
			</tr>
    	</tbody>
    </table>	
</div>
<?php /**PATH C:\xampp\htdocs\pfj\resources\views/livewire/admin/capacitaciones-index.blade.php ENDPATH**/ ?>