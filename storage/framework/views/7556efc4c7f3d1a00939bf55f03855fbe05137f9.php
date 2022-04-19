<div>
    <div class="card">
    	<div class="card-header">
            <?php if(isset($pfj_id) || $mis_programas == true): ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.programas.create')): ?>
                <a href="<?php echo e(route('admin.programas.create', 'idpfj='.$pfj_id)); ?>" class="btn btn-success btn-sm float-right">Nueva sesión</a>
            <?php endif; ?>
            <?php else: ?>
                <div class="form-row align-items-center">
                <div class="col-md-10 my-1">
                    <input wire:model="search" class="form-control" placeholder="Ingrese nombre de un pfj">
                </div>
                <div class="col-md-1 my-1">
                    <div style="text-align:right; font-weight:bold">Mostrar:</div>
                </div>
                <div class="col-md-1 my-1">
                  <select class="custom-select mr-sm-2" wire:model="cant" id="inlineFormCustomSelect">
                    <option value="15">15</option>
                    <option value="30">30</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                  </select>
                </div>
              </div>
            <?php endif; ?>
            <div class="form-row align-items-center">
                <div class="col-auto my-1">
                  <div class="custom-control custom-checkbox mr-sm-2 d-inline">
                    <input class="form-check-input" wire:model= "poriniciar" type="checkbox" value="" id="poriniciar">
                    <label class="form-check-label" for="poriniciar">
                    Por iniciar
                    </label>
                  </div>
                  <div class="custom-control custom-checkbox mr-sm-2 d-inline">
                    <input class="form-check-input" wire:model= "iniciado" type="checkbox" value="" id="iniciado">
                    <label class="form-check-label" for="iniciado">
                    Iniciado
                    </label>
                  </div>
                  <div class="custom-control custom-checkbox mr-sm-2 d-inline">
                    <input class="form-check-input" wire:model= "terminado" type="checkbox" value="" id="terminado">
                    <label class="form-check-label" for="terminado">
                    	Terminado
                    </label>
                  </div>
                  <div class="custom-control custom-checkbox mr-sm-2 d-none">
                    <input class="form-check-input" wire:model= "mis_programas" type="checkbox" disabled id="mis_programas" >
                    <label class="form-check-label" for="mis_programas">
                    	Mis programas
                    </label>
                  </div>
                </div>
            </div>
    	</div>
        <?php if($programas->count()): ?>
    	<div class="card-body overflow-auto">
    		<table class="table table-striped">
    			<thead>
    				<tr>
                        <th>ID</th>
    					<th>Sesión</th>
    					<th>Matrimonio Director</th>
    					<th>Fecha de inicio</th>
                        <th>Fecha de fin</th>
                        <th>Estado</th>
                        <th>Personal</th>
                        
                        <th>Grupos</th>
                        
                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.programas.edit')): ?>
    					<th colspan="1"></th>
                        <?php endif; ?>
    				</tr>
    			</thead>
    			<tbody>
    				<?php $__currentLoopData = $programas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $programa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    				  <tr>
                        <td><?php echo e($programa->id); ?></td>
    				  	<td><?php echo e($programa->nombre); ?></td>
    				  	<td>
                              <?php $__currentLoopData = $programa->matrimonioDirectores(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mdirector): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($mdirector->personale->user->name); ?><br>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
    				  	<td><?php echo e(date('d/m/Y', strtotime($programa->fecha_inicio))); ?></td>
    				  	<td><?php echo e(date('d/m/Y', strtotime($programa->fecha_fin))); ?></td>
    				  	<td>
                            <?php if( $programa->estado == '0'): ?>
                                <?php echo e('Por iniciar'); ?>

                            <?php endif; ?>
                            <?php if( $programa->estado == '1'): ?>
                                <?php echo e('Iniciado'); ?>

                            <?php endif; ?>
                            <?php if( $programa->estado == '2'): ?>
                                <?php echo e('Terminado'); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            
                                
                            
                                <?php echo e($programa->inscripciones->count()); ?>

                            
                        </td>
                        <td>
                            <?php echo e($programa->grupos->count()); ?>

                        </td>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.programas.edit')): ?>
    				  	<td width="10px">
                            <a href="<?php echo e(route('admin.programas.edit', $programa)); ?>" class="btn btn-sm btn-primary" alt="Administrar sesión" data-toggle="tooltip" data-placement="top" title="Administrar sesión"><i class="fas fa-cogs"></i></a>
                        </td>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['admin.programas.edit'])): ?>
                        <td width="10px">
                            <a href="<?php echo e(route('admin.programas.show', $programa)); ?>" class="btn btn-sm btn-primary" alt="Personal" data-toggle="tooltip" data-placement="top" title="Personal"><i class="fas fa-user-friends"></i></a>
                        </td>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.programas.destroy')): ?>
    				  	<td width="10px">
							<form method="POST" action="<?php echo e(route('admin.programas.destroy', $programa)); ?>">
								<?php echo csrf_field(); ?>
								<?php echo method_field('DELETE'); ?>
								<button type="submit" class="btn btn-sm btn-danger" alt="Eliminar" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fas fa-trash"></i></button>
							</form>
						</td>
                        <?php endif; ?>
                        <td>
                        </td>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.inscripcioneCompanerismos.edit')): ?>                            
                        <td width="10px">
                            <a href="<?php echo e(route('admin.programas.asignar', $programa)); ?>" 
                            class="btn btn-success btn-sm float-right mr-3" alt="Organigrama" data-toggle="tooltip" data-placement="top" title="Organigrama">
                            <i class="fas fa-sitemap"></i></a>
                        </td>
                        <?php endif; ?>
    				  </tr>
    				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    			</tbody>
    		</table>
    	</div>
        <div class="card-footer">
            <?php echo e($programas->links()); ?>

        </div>
        <?php else: ?>
            <div class="card-body">
                <b>No hay registros</b>        
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\pfj\resources\views/livewire/admin/programas-index.blade.php ENDPATH**/ ?>