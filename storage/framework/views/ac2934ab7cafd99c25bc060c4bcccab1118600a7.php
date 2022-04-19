<div>
    <div class="card">
    	<div class="card-header">
    		<h3><?php echo e($programa->nombre); ?></h3>
    	</div>
        <?php if($anuncios->count()): ?>
    	<div class="card-body">
    		<table class="table table-striped">
    			<thead>
    				<tr>
                        <th>Anuncio</th>
                        <th>Tipo</th>
                        <th>Estado</th>
    					<th></th>
    				</tr>
    			</thead>
    			<tbody>
    				<?php $__currentLoopData = $anuncios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anuncio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    				  <tr>
                        <td><?php echo e($anuncio->descripcion); ?></td>
                        <td><?php echo e($anuncio->tipo); ?></td>
                        <td><?php echo e($anuncio->estado); ?></td>
    				  	<td width="10px">
    				  		<a href="<?php echo e(route('admin.anuncios.edit', $anuncio)); ?>" class="btn btn-primary" >Editar</a>
    				  	</td>
						<td width="10px">
						<form method="POST" action="<?php echo e(route('admin.anuncios.destroy', $anuncio)); ?>">
							<?php echo csrf_field(); ?>
							<?php echo method_field('DELETE'); ?>
							<button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
						</form>
						</td>
    				  </tr>
    				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    			</tbody>
    		</table>
    	</div>
        <div class="card-footer">
        </div>
        <?php else: ?>
            <div class="card-body">
                <b>No hay registros</b>        
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\pfj\resources\views/livewire/admin/anuncios-index.blade.php ENDPATH**/ ?>