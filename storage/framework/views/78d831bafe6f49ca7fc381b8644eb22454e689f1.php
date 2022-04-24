<div>
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Ingrese nombre de un personal">
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Asignación</th>
                <th>Grupo - Compañerismo</th>
                <th colspan="2">Nombres</th>
                <th>Apellidos</th>
                <th>Telefono</th>
                <th>Correo electrónico</th>
            </tr>
        </thead>
        <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $inscripciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inscripcione): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($inscripcione->role->name); ?></td>
                    <?php if($inscripcione->role->name == 'Matrimonio Director'): ?>
                        <td><?php echo e($inscripcione->role->name); ?></td>
                    <?php else: ?>
                    <?php if($inscripcione->role->name == 'Cordinador'): ?>
                        <td><?php echo e($inscripcione->role->name); ?></td>
                    <?php else: ?>
                        <?php if($inscripcione->inscripcioneCompanerismo != null): ?>
                            
                        <td>
                            <?php echo e($inscripcione->inscripcioneCompanerismo->companerismo->grupo->numero . ' - ' . $inscripcione->inscripcioneCompanerismo->companerismo->numero); ?>

                        </td>
                        <?php else: ?>
                        <td> No tiene compañero(a)</td>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php endif; ?>
                    <td>
                        <img id="imgperfil" class="rounded-circle" width="50" height="50" src="<?php echo e($inscripcione->personale->user->adminlte_image()); ?>" alt="">
                    </td>
                    <td>
                        <?php echo e($inscripcione->personale->contacto->nombres); ?>

                    </td>
                    <td><?php echo e($inscripcione->personale->contacto->apellidos); ?></td>
                    <td>
                        <span>
                            <a href="tel:<?php echo e($inscripcione->personale->contacto->telefono); ?>" alt="Llamar por teléfono" data-toggle="tooltip" data-placement="top" title="Llamar por teléfono"><?php echo e($inscripcione->personale->contacto->telefono); ?></a>
                            <a href="https://api.whatsapp.com/send?phone=51<?php echo e($inscripcione->personale->contacto->telefono); ?>" class="text-success" target="_blank" alt="Enviar Whatsapp" data-toggle="tooltip" data-placement="top" title="Enviar Whatsapp"><i class="fab fa-whatsapp"></i></a>
                        </span>
                    </td>
                    <td>
                        <?php if( $inscripcione->personale->user): ?>
                            <a href="mailto:<?php echo e($inscripcione->personale->user->email); ?>" alt="Enviar email" data-toggle="tooltip" data-placement="top" title="Enviar email"><?php echo e($inscripcione->personale->user->email); ?></a>
                        <?php else: ?>
                        <a href="<?php echo e(route('admin.users.create', ['personale' => $inscripcione->personale])); ?>" class="btn btn-primary" >Crear usuario</a>
                        <?php endif; ?>
                    </td>
                    <td width="10px">
                        <a href="<?php echo e(route('admin.contactos.show', $inscripcione->personale->contacto)); ?>" class="btn btn-primary" >Editar</a>
                    </td>
                </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td colspan="100%">
                <div class="card">
                    <div class="card-header text-warning">
                        <?php echo e('No hay personal'); ?>

                    </div>
                </div>
                
            </td>
        </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
<?php /**PATH C:\xampp\htdocs\pfj\resources\views/livewire/admin/inscripcione-programa-index.blade.php ENDPATH**/ ?>