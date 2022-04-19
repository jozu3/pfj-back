<div>
    <div class="card">
    	<div class="card-header">
    		<input wire:model="search" class="form-control" placeholder="Ingrese nombre, apellido o telefono de un contacto">
            <div class="form-check mt-1 d-inline">
              <input class="form-check-input" wire:model= "nocontactado" type="checkbox" value="true" id="nocontac1">
              <label class="form-check-label" for="nocontac1">
                No contactado
              </label>
            </div>
            <div class="form-check mt-1 d-inline">
              <input class="form-check-input" wire:model= "contactado" type="checkbox" value="true" id="contact1">
              <label class="form-check-label" for="contact1">
                Contactado
              </label>
            </div>
            <div class="form-check mt-1 d-inline">
              <input class="form-check-input" wire:model= "probable" type="checkbox" value="true" id="flexCheckDefault1">
              <label class="form-check-label" for="flexCheckDefault1">
                Probable
              </label>
            </div>
            <div class="form-check mt-1 d-inline">
                <input class="form-check-input" wire:model= "confirmado" type="checkbox" value="true" id="flexCheckDefault2">
                <label class="form-check-label" for="flexCheckDefault2">
                  Confirmado
                </label>
            </div>
            <div class="form-check mt-1 d-inline">
            <input class="form-check-input" wire:model= "inscrito" type="checkbox" value="true" id="flexCheckDefault3">
            <label class="form-check-label" for="flexCheckDefault3">
                Inscrito
            </label>
            </div>
    	</div>
        <?php if($contactos->count()): ?>
    	<div class="card-body">
    		<table class="table table-striped">
    			<thead>
    				<tr>
                        <th>ID</th>
                        <!--https://web.whatsapp.com/send?phone=584141849565-->
                        <th  style="cursor:pointer">
                            <span wire:click="sortBy('nombres')">Nombre</span>
                            <?php echo $__env->make('partials._sort-icon', ['field' => 'nombres'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <span wire:click="sortBy('newassign')" class="ml-1">Nuevos</span>
                            <?php echo $__env->make('partials._sort-icon', ['field' => 'newassign'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </th>
    					<th wire:click="sortBy('apellidos')" style="cursor:pointer">Apellidos
                            <?php echo $__env->make('partials._sort-icon', ['field' => 'apellidos'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </th>
    					<th wire:click="sortBy('telefono')" style="cursor:pointer">Telefono
                            <?php echo $__env->make('partials._sort-icon', ['field' => 'telefono'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </th>
                        <th wire:click="sortBy('estado')" style="cursor:pointer">Estado
                            <?php echo $__env->make('partials._sort-icon', ['field' => 'estado'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </th>
                        <th wire:click="sortBy('estaca_id')" style="cursor:pointer">Estaca
                            <?php echo $__env->make('partials._sort-icon', ['field' => 'estaca_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </th>
                        <th wire:click="" style="">Comentarios de su vendedor actual
                        </th>
                        <th wire:click="" style="">Total de comentarios
                        </th>
    					<th colspan="2"></th>
    				</tr>
    			</thead>
    			<tbody>
    				<?php $__currentLoopData = $contactos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contacto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($contacto->id); ?></td>
                    	<td><?php echo e($contacto->nombres); ?> 
                            <?php if($contacto->newassign == 1): ?>
                                <span class="badge badge-success right">N</span>
                            <?php endif; ?>
                        </td>
                    	<td><?php echo e($contacto->apellidos); ?></td>
                    	<td><?php echo e($contacto->telefono); ?></td>
                        <td>
                            <?php 
                                $estados = [
                                        '1' => 'No contactado',
                                        '2' => 'Contactado',
                                        '3' => 'Probable',
                                        '4' => 'Confirmado',
                                        '5' => 'Inscrito',
                                    ];
                            ?>
                            <?php switch($contacto->estado):
                                case (1): ?>
                                     <?php echo e($estados['1']); ?>

                                <?php break; ?>
                                <?php case (2): ?>
                                     <?php echo e($estados['2']); ?>

                                <?php break; ?>
                                <?php case (3): ?>
                                     <?php echo e($estados['3']); ?>

                                <?php break; ?>
                                <?php case (4): ?>
                                     <?php echo e($estados['4']); ?>

                                <?php break; ?>
                                <?php case (5): ?>
                                     <?php echo e($estados['5']); ?>

                                <?php break; ?>
                            <?php endswitch; ?>
                        </td>
                            <?php if(Auth::user()->can(['permiso'])): ?> 
                                <td>
                                
                                </td>
                            <?php else: ?>
                                
                            <?php endif; ?>
                                <td>
                                    <?php if($contacto->personale != null): ?>
                                        <?php echo e($contacto->personale->barrio->estaca->nombre); ?>

                                    <?php else: ?>
                                    <?php echo e('No se ha registrado'); ?>

                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php
                                    //cantidad de veces contactadas por mi
                                        $vcp_mi = 0
                                    ?> 
                                    <?php $__currentLoopData = $contacto->seguimientos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $segui): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            if ($segui->personal->id == $contacto->personal->id){
                                                $vcp_mi++;
                                            }
                                        ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($vcp_mi == 0): ?>
                                        <b class="alert-warning">Ningún comentario</b>
                                    <?php else: ?>
                                        <b class=""><?php echo e($vcp_mi); ?></b>
                                    <?php endif; ?>
                                </td>   
                                <td>
                                    <?php echo e(count($contacto->seguimientos)); ?>

                                </td> 
                                            
                        <td width="160px">
                    		<a href="<?php echo e(route('admin.contactos.show', $contacto)); ?>" class="btn btn-success" ><i class="fas fa-file-signature"></i> Ver / Editar</a>
                    	</td>
                    </tr>
    				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    			</tbody>
    		</table>
    	</div>
        <div class="card-footer">
            <?php echo e($contactos->links()); ?>

        </div>
        <?php else: ?>
            <div class="card-body">
                <b>No hay registros</b>        
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\pfj\resources\views/livewire/admin/contactos-index.blade.php ENDPATH**/ ?>