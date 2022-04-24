<div>
    <div class="card">
    	<div class="card-header">
    		<input wire:model="search" class="form-control" placeholder="Ingrese nombre o correo de un usuario">
            <div class="form-row align-items-center">
                <div class="col-auto my-1">
                <?php
                //vardump($all_roles)
                ?>
                  <?php $__currentLoopData = $all_roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="custom-control custom-checkbox mr-sm-2 d-inline">
                      <input class="form-check-input" wire:model= "<?php echo e($role->slug); ?>" type="checkbox" value="" id="<?php echo e($role->slug); ?>">
                      <label class="form-check-label" for="<?php echo e($role->slug); ?>">
                          <?php echo e($role->name); ?>

                      </label>
                    </div>    
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <!--div class="custom-control custom-checkbox mr-sm-2 d-inline">
                    <input class="form-check-input" wire:model= "admin" type="checkbox" value="" id="admin">
                    <label class="form-check-label" for="admin">
                        Administrador
                    </label>
                  </div>
                  <div class="custom-control custom-checkbox mr-sm-2 d-inline">
                    <input class="form-check-input" wire:model= "asistente" type="checkbox" value="" id="asistente">
                    <label class="form-check-label" for="asistente">
                        Asistente
                    </label>
                  </div>
                  <div class="custom-control custom-checkbox mr-sm-2 d-inline">
                    <input class="form-check-input" wire:model= "vendedor" type="checkbox" value="" id="vendedor">
                    <label class="form-check-label" for="vendedor">
                        Vendedor
                    </label>
                  </div>
                  <div class="custom-control custom-checkbox mr-sm-2 d-inline">
                    <input class="form-check-input" wire:model= "coord_academico" type="checkbox" value="" id="coord-academico">
                    <label class="form-check-label" for="coord-academico">
                        Coordinador académico
                    </label>
                  </div>
                  <div class="custom-control custom-checkbox mr-sm-2 d-inline">
                    <input class="form-check-input" wire:model= "profesor" type="checkbox" value="" id="profesor">
                    <label class="form-check-label" for="profesor">
                        Profesor
                    </label>
                  </div>
                  <div class="custom-control custom-checkbox mr-sm-2 d-inline">
                    <input class="form-check-input" wire:model= "personale" type="checkbox" value="" id="personale">
                    <label class="form-check-label" for="personale">
                        Personale
                    </label>
                  </div-->
                  <div class="custom-control custom-checkbox mr-sm-2 d-inline">
                    <input class="form-check-input" wire:model= "otros" type="checkbox" value="" id="otros">
                    <label class="form-check-label" for="otros">
                        Otros
                    </label>
                  </div>
                </div>
            </div>
    	</div>
        <?php if($users->count()): ?>
    	<div class="card-body">
    		<table class="table table-striped">
    			<thead>
    				<tr>
    					<th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
    					<th>Roles</th>
    					<th></th>
    				</tr>
    			</thead>
    			<tbody>
    				<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    				  <tr>
                        <td><?php echo e($user->id); ?></td>
    				  	<td><?php echo e($user->name); ?></td>
                        <td><?php echo e($user->email); ?></td>
    				  	<td>
                            <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                - <?php echo e($rol->name); ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
    				  	<td width="10px">
    				  		<a href="<?php echo e(route('admin.users.edit', $user)); ?>" class="btn btn-primary" >Editar</a>
    				  	</td>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.users.destroy')): ?>
                <td width="10px">
                  <form method="POST" class="eliminar-users" action="<?php echo e(route('admin.users.destroy', $user)); ?>">
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
            <?php echo e($users->links()); ?>

        </div>
        <?php else: ?>
            <div class="card-body">
                <b>No hay registros</b>        
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\pfj\resources\views/livewire/admin/users-index.blade.php ENDPATH**/ ?>