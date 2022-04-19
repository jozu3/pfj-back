<div wire:init="loadInscripciones">
    <div class="card">
    	<div class="card-header">
    		<input wire:model="search" class="form-control" placeholder="Ingrese el nombre o apellido de un personale">
            <div class="form-check mt-2 d-inline">
              <input class="form-check-input" wire:model= "estado_habilitado" type="checkbox" id="estado_habilitado">
              <label class="form-check-label" for="estado_habilitado">
                Ver habilitados
              </label>
            </div>
            <div class="form-check mt-2 d-inline">
              <input class="form-check-input" wire:model= "estado_retirado" type="checkbox" id="estado_retirado">
              <label class="form-check-label" for="estado_retirado">
                Ver retirados
              </label>
            </div>
            <div class="form-check mt-2 d-inline">
              <input class="form-check-input" wire:model= "estado_suspendido" type="checkbox" id="estado_suspendido">
              <label class="form-check-label" for="estado_suspendido">
                Ver suspendidos
              </label>
            </div>
    	</div>
        <?php if($inscripciones->count()): ?>
    	<div class="card-body">
    		<table class="table table-striped">
    			<thead>
    				<tr>
              <th>Id</th>
              <th>Apellidos</th>
              <th>Nombres</th>
              <th>Telefono</th>
              <th>Correo electrónico</th>
              <th>Fecha de inscripción</th>
              <th>Sesión</th>
              <th>Asignación</th>
              <th>Estado</th>
    				</tr>
    			</thead>
    			<tbody>
    				<?php $__currentLoopData = $inscripciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inscripcione): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    				  <tr>
                
                        <td><?php echo e($inscripcione->id); ?></td>
                        <td><?php echo e($inscripcione->personale->contacto->nombres); ?></td>
                        <td><?php echo e($inscripcione->personale->contacto->apellidos); ?></td>
                        <td><?php echo e($inscripcione->personale->contacto->telefono); ?></td>
                        <td><?php echo e($inscripcione->personale->user->email); ?></td>                        
                        <td><?php echo e(date('d/m/Y', strtotime($inscripcione->fecha))); ?></td>
                        <td><?php echo e($inscripcione->programa->nombre); ?></td>
                        <td><?php echo e($inscripcione->role->name); ?></td>
                        <td>
                            <?php switch($inscripcione->estado):
                                case (0): ?>
                                    <?php echo e('Habilitado'); ?>

                                    <?php break; ?>
                                <?php case (1): ?>
                                    <?php echo e('Retirado'); ?>

                                    <?php break; ?>
                                <?php case (2): ?>
                                    <?php echo e('Suspendido'); ?>

                                    <?php break; ?>
                                <?php default: ?>
                            <?php endswitch; ?>
                        </td>
    				  	<td width="10px">
    				  		<a href="<?php echo e(route('admin.inscripciones.show', $inscripcione->id)); ?>" class="btn btn-primary">Ver</a>
    				  	</td>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.inscripciones.destroy')): ?>
                        <td width="10px">
                           <form method="POST" class="eliminar-inscripcione" action="<?php echo e(route('admin.inscripciones.destroy', $inscripcione->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-danger ">Eliminar</button>
                            </form>
                        </td>
                        <?php endif; ?>
    				  </tr>
    				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    			</tbody>
    		</table>
    	</div>
        <div class="card-footer">
            <?php echo e($inscripciones->links()); ?>

        </div>
        <?php else: ?>
            <div class="card-body">
                <b>No hay inscripciones</b>        
            </div>
        <?php endif; ?>
    </div>
</div><?php /**PATH C:\xampp\htdocs\pfj\resources\views/livewire/admin/inscripciones-index.blade.php ENDPATH**/ ?>