<div>
	<?php if(session('info_grupo')): ?>
        <div class="alert alert-success">
            <?php echo e(session('info_grupo')); ?>

        </div>
    <?php endif; ?>
	<?php if($info_grupo != ''): ?>
        <div class="alert alert-success">
            <?php echo e($info_grupo); ?>

        </div>
    <?php endif; ?>
    <table class="table table-striped">
    	<thead>
    		<tr>
				<th></th>
    			<th>Nombre de grupo</th>
    			<th>Número de grupo</th>
    			<th></th>
    		</tr>
    	</thead>
    	<tbody>
    		<?php $__currentLoopData = $grupos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grupo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    			<tr>
    				<?php echo Form::model($grupo, ['route' => ['admin.grupos.update', $grupo], 'method' => 'put']); ?>

					<td width="5px">
						<a class="btn dropdown-toggle" data-toggle="collapse" id="comps-<?php echo e($grupo->id); ?>" href="#list-companerismos<?php echo e($grupo->id); ?>" role="button" aria-expanded="false" aria-controls="list-companerismos<?php echo e($grupo->id); ?>">
							<b>Compañerismos</b>
						</a>
					</td>
    				<td>
    					<?php echo Form::text('nombre', null, ['class' => 'form-control']); ?>

					</td>
                    <td>
    					<?php echo Form::text('numero', null, ['class' => 'form-control']); ?>

					</td>
					<td width="10px">
						<button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i></button>
    				</td>
    				<?php echo Form::close(); ?>

					<td width="10px">
						<form method="POST" action="<?php echo e(route('admin.grupos.destroy', $grupo)); ?>">
							<?php echo csrf_field(); ?>
							<?php echo method_field('DELETE'); ?>
							<button type="submit" class="btn btn-sm btn-danger">
								<i class="fas fa-trash-alt"></i>
							</button>
						</form>
					</td>
    			</tr>
				<tr>
					<td colspan="5">
						<div class="collapse multi-collapse" id="list-companerismos<?php echo e($grupo->id); ?>">
							<div class="row">
								<div class="col-3 px-4 py-2">
									<b>Nombre</b>
								</div>
								<div class="col-3 px-4 py-2">
									<b>Número de compañia</b>
								</div>
								<div class="col-3 px-4 py-2">
									<b>Rol</b>
								</div>
								<div class="col-3 px-4 py-2">
								</div>
							</div>
							<?php $__currentLoopData = $grupo->companerismos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $companerismo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php echo Form::model($companerismo, ['route' => ['admin.companerismos.update', $companerismo], 'method' => 'put']); ?>

							<div class="row">
								<div class="col-3 mb-3">
									<?php echo Form::hidden('grupo_id', null); ?>

									<?php echo Form::text('nombre', null, ['class' => 'form-control']); ?>

								</div>
								<div class="col-3 mb-3">
									<?php echo Form::number('numero', null, ['class' => 'form-control']); ?>

								</div>
								<div class="col-3 mb-3">
									<?php echo Form::select('role_id', $roles, null, ['class' => 'form-control ', 'placeholder' => 'Escoge un rol']);; ?>

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
								<div class="col-3 mb-3">
									<?php echo Form::submit('Actualizar',  ['class' => 'btn btn-sm btn-primary']); ?>

								</div>
							</div>
							<?php echo Form::close(); ?>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php echo Form::open( ['route' => 'admin.companerismos.store']); ?>

							<div class="row">
								<div class="col-3 mb-3">
									<?php echo Form::hidden('grupo_id', $grupo->id); ?>

									<?php echo Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nuevo compañerismo']); ?>

								</div>
								<div class="col-3 mb-3">
									<?php echo Form::number('numero', null, ['class' => 'form-control']); ?>

								</div>
								<div class="col-3 mb-3">
									<?php echo Form::select('role_id', $roles, null, ['class' => 'form-control ', 'placeholder' => 'Escoge un rol']);; ?>

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
								<div class="col-3 mb-3">
									<?php echo Form::submit('Guardar',  ['class' => 'btn btn-sm btn-primary']); ?>

								</div>
							</div>
							<?php echo Form::close(); ?>

						</div>
					</td>
				</tr>
    		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<form wire:submit.prevent="">
					<td class="text-center">
						<b>Nuevo grupo:</b>
					</td>
					<td>
						<input type="text" name="nombre_grupo" wire:model="nombre_grupo" class="form-control">
						<?php $__errorArgs = ['nombre_grupo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
					</td>
					<td>
						<input type="text" name="numero_grupo" wire:model="numero_grupo" class="form-control">
						<?php $__errorArgs = ['numero_grupo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
					</td>
					<td>
						<input type="submit" value="Guardar"  wire:loading.attr="disabled" wire:click="submit" wire:target="submit" class="btn btn-sm btn-primary disabled:opacity-25">
					</td>
				</form>
			</tr>
    	</tbody>
    </table>	
	<script>
	</script>
</div>
<?php /**PATH C:\xampp\htdocs\pfj\resources\views/livewire/admin/grupos-index.blade.php ENDPATH**/ ?>