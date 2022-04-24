<div>
    <div class="card">
    	<div class="card-header">
    		<input wire:model="search" class="form-control" placeholder="Ingrese nombre de contacto o pfj">
    	</div>
        <?php if($seguimientos->count()): ?>
    	<div class="card-body">
    		<table class="table table-striped">
    			<thead>
    				<tr>
                        <th wire:click="sortBy('fecha')" style="cursor:pointer">Fecha
                            <?php echo $__env->make('partials._sort-icon', ['field' => 'fecha'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </th>
    					<th wire:click="sortBy('nombres')" style="cursor:pointer;">Contacto
                            <?php echo $__env->make('partials._sort-icon', ['field' => 'nombres'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </th>
    					<th wire:click="sortBy('pfjs.nombre')" style="cursor:pointer">Pfj
                            <?php echo $__env->make('partials._sort-icon', ['field' => 'pfjs.nombre'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </th>
                        <th>Comentario</th>
                        <th>Vendedor actual</th>
    					<th></th>
    				</tr>
    			</thead>
    			<tbody>
    				<?php $__currentLoopData = $seguimientos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seguimiento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    				  <tr>
                        <td><?php echo e($seguimiento->fecha); ?></td>
    				  	<td> <b> <?php echo e($seguimiento->nombres); ?></b></td>
                        <td><?php echo e($seguimiento->nombre); ?></td>
                        <td><?php echo e($seguimiento->comentario); ?></td>
    				  	<td><?php echo e($seguimiento->personal->user->name); ?></td>
    				  	<td width="10px">
    				  		<a href="<?php echo e(route('admin.contactos.show', $seguimiento->contacto)); ?>" class="btn btn-primary" >Editar</a>
    				  	</td>
    				  </tr>
    				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    			</tbody>
    		</table>
    	</div>
        <div class="card-footer">
            <?php echo e($seguimientos->links()); ?>

        </div>
        <?php else: ?>
            <div class="card-body">
                <b>No hay registros</b>        
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\pfj\resources\views/livewire/admin/seguimientos-index.blade.php ENDPATH**/ ?>