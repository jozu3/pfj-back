<div class="card">
			<div class="card-header">
				<b>Comentarios</b>
				<div class="form-check mt-2 d-inline float-right">
              <input class="form-check-input" wire:model= "vermis_comentarios" type="checkbox" id="vermis_comentarios">
              <label class="form-check-label" for="vermis_comentarios">
                Ver solo del vendedor actual
              </label>
            </div>
			</div>
			<div class="card-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Fecha</th>
							<th>Pfj</th>
							<th>Comentario</th>
							<th>Usuario</th>
							<th>Estado del contacto</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php $__currentLoopData = $seguimientos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($seg->fecha); ?></td>
								<td><?php echo e($seg->pfj->nombre); ?></td>
								<td><?php echo e($seg->comentario); ?></td>
								<td colspan="2"><?php echo e($seg->personal->user->name); ?></td>
								<td></td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tr>
						<?php echo Form::open(['route' => 'admin.seguimientos.store']); ?>

							<?php echo Form::hidden('contacto_id', $contacto->id); ?>

							<?php echo Form::hidden('tipo', 0); ?>

							<?php echo Form::hidden('user_id', auth()->user()->id); ?>

							<?php echo Form::hidden('personal_id', auth()->user()->personale->id); ?>


                            <td width="100px">
								<?php echo Form::date('', date('Y-m-d'), ['class' => 'form-control', 'disabled' => 'disabled']); ?>

                            </td>
                            <td>
                            	<?php echo Form::select('pfj_id', $pfjs, null, ['class' => 'form-control', 'placeholder' => 'Escoge un pfj']);; ?>

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
                            </td>
                            <td>
								<?php echo Form::text('comentario', null, ['class' => 'form-control', 'placeholder' => 'Ingrese un comentario']); ?>

							<?php $__errorArgs = ['comentario'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
								<small class="text-danger"><?php echo e($message); ?></small>
							<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </td>
                            <td width="200px">
                                <?php echo Form::text('user', auth()->user()->name, ['class' => 'form-control', 'disabled' => 'disabled']); ?>

                            </td>
                            <td>
								<?php echo Form::select('estado', [
										'2' => 'Contactado',
										'3' => 'Probable',
										'4' => 'Confirmado',
									], null, ['class' => 'form-control', 'placeholder' => 'Escoge', 'style' => '']);; ?>

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
                            </td>	
                            <td>
                            	<?php echo Form::submit('Guardar', ['class' => 'btn btn-primary']); ?>

                            </td>
                    	<?php echo Form::close(); ?>

                        </tr>
					</tbody>
				</table>
			</div>
</div><?php /**PATH C:\xampp\htdocs\pfj\resources\views/livewire/admin/contacto-seguimientos.blade.php ENDPATH**/ ?>