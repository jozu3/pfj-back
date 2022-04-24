<div>
    <div class="card">
    	<div class="card-header">
    		<input wire:model="search" class="form-control" placeholder="Ingrese nombre de un personal">
    	</div>
		<?php echo e($search); ?>

        <?php if($personales->count()): ?>
    	<div class="card-body">
    		<table class="table table-striped">
    			<thead>
    				<tr>
    					<th>Nombres</th>
    					<th>Apellidos</th>
                        <th>Telefono</th>
    					<th>Correo electrónico</th>
    				</tr>
    			</thead>
    			<tbody>
    				<?php $__currentLoopData = $personales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $personal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    				  <tr>
                        <td><?php echo e($personal->contacto->nombres); ?></td>
    				  	<td><?php echo e($personal->contacto->apellidos); ?></td>
                        <td><?php echo e($personal->contacto->telefono); ?></td>
    				  	<td>
                            <?php if( $personal->user): ?>
                            <?php echo e($personal->user->email); ?>

                            <?php else: ?>
                            <a href="<?php echo e(route('admin.users.create', ['personale' => $personal])); ?>" class="btn btn-primary" >Crear usuario</a>
                            <?php endif; ?>
                        </td>
    				  	<td width="10px">
    				  		<a href="<?php echo e(route('admin.personales.edit', ['personale' => $personal])); ?>" class="btn btn-primary" >Editar</a>
    				  	</td>
						  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.personales.destroy')): ?>
						  <td width="10px">
							<form method="POST" class="eliminar-personales" action="<?php echo e(route('admin.personales.destroy', $personal)); ?>">
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
            <?php echo e($personales->links()); ?>

        </div>
        <?php else: ?>
            <div class="card-body">
                <b>No hay registros</b>        
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\pfj\resources\views/livewire/admin/personales-index.blade.php ENDPATH**/ ?>