<div>
    <div class="card">
    	<div class="card-header">
    		<input wire:model="search" class="form-control" placeholder="Ingrese nombre de un pfj">
            <div class="form-check mt-1">
              <input class="form-check-input" wire:model= "estado" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Solo pfjs activos
              </label>
            </div>
    	</div>
        <?php if($pfjs->count()): ?>
    	<div class="card-body">
    		<table class="table table-striped">
    			<thead>
    				<tr>
    					<th>Pfj</th>
                        <th>Estado</th>
                        <th width="200px">Sesiones por inciciar</th>
                        <th width="200px">Sesiones Iniciados</th>
                        <th width="200px">Sesiones terminados</th>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.pfjs.edit')): ?>
    					<th colspan="2"></th>
                        <?php endif; ?>
    				</tr>
    			</thead>
    			<tbody>
    				<?php $__currentLoopData = $pfjs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pfj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    				  <tr>
    				  	<td><?php echo e($pfj->nombre); ?></td>
    				  	<td>
                            <?php if($pfj->estado == 0): ?>
                                <?php echo e('Discontinuado'); ?>

                            <?php endif; ?>
                            <?php if($pfj->estado == 1): ?>
                                <?php echo e('Activo'); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <?php 
                            $gru_pini = 0
                            ?>
                            <?php $__currentLoopData = $pfj->programas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $programa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($programa->estado == 0): ?>
                                    <?php
                                     $gru_pini++ 
                                    ?>
                                 <?php endif; ?>  
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($gru_pini); ?>

                        </td>
                        <td>
                            <?php
                            $gru_ini = 0
                            ?>
                            <?php $__currentLoopData = $pfj->programas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $programa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($programa->estado == 1): ?>
                                    <?php
                                     $gru_ini++ 
                                    ?>
                                 <?php endif; ?>  
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($gru_ini); ?>

                        </td>
                         <td>
                            <?php
                            $gru_termin = 0
                            ?>
                            <?php $__currentLoopData = $pfj->programas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $programa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($programa->estado == 2): ?>
                                    <?php
                                     $gru_termin++ 
                                    ?>
                                 <?php endif; ?>  
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($gru_termin); ?>

                        </td>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.pfjs.edit')): ?>
    				  	<td width="10px">
    				  		<a href="<?php echo e(route('admin.pfjs.edit', $pfj)); ?>" class="btn btn-sm btn-primary" >Editar</a>
    				  	</td>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.pfjs.destroy')): ?>
    				  	<td width="10px">
							<form method="POST" action="<?php echo e(route('admin.pfjs.destroy', $pfj)); ?>">
								<?php echo csrf_field(); ?>
								<?php echo method_field('DELETE'); ?>
								<button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
							</form>
						</td>
                        <?php endif; ?>
    				  </tr>
    				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    			</tbody>
    		</table>
    	</div>
        <div class="card-footer">
            <?php echo e($pfjs->links()); ?>

        </div>
        <?php else: ?>
            <div class="card-body">
                <b>No hay registros</b>        
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\pfj\resources\views/livewire/admin/pfjs-index.blade.php ENDPATH**/ ?>