<div>
    <?php echo e($alert); ?>

    <?php echo e($data); ?>

    <div class="container-fluid h-100">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card card-row card-primary">
                    <div class="card-header bg-yellow-pfj text-center">
                        <h3 class="card-title">
                            Cordinadores
                        </h3>
                    </div>
                    <div class="card-body group" >
                        <div class="card card-primary card-outline" >
                            <div class="card-header companerismo row" data-id="cordis">
                                    <?php $__empty_1 = true; $__currentLoopData = $programa->coordinadores(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inscripcione): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <div class="col-6" data-id="<?php echo e('ins-' . $inscripcione->id); ?>">
                                        <div class="card text-center">
                                            <div class="card-header">
                                                <img class="img-fluid rounded-circle" src="<?php echo e($inscripcione->personale->user->adminlte_image()); ?>" alt="">
                                                <div class="card-text"><small class="text-muted"><?php echo e($inscripcione->role->name); ?></small></div>
                                            </div>
                                            <div class="card-body p-0">
                                                <?php echo e($inscripcione->personale->user->name); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    
                                    <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
            <?php $__currentLoopData = $programa->grupos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grupo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card card-row card-primary">
                        <div class="card-header bg-yellow-pfj">
                            <h3 class="card-title">
                                <?php echo e('Grupo ' . $grupo->numero); ?>

                            </h3>
                        </div>
                        <div class="card-body group" data-id="<?php echo e('grupo-'.$grupo->id); ?>">
                            <?php $__currentLoopData = $grupo->companerismos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $companerismo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card <?php if($companerismo->role_id == 5): ?> <?php echo e('bg-cordauxiliar'); ?><?php else: ?> <?php echo e('card-primary'); ?> <?php endif; ?>  card-outline " data-id="<?php echo e('com-'.$companerismo->id); ?>">
                                    <div class="card-header companerismo row" data-id="<?php echo e('com-'.$companerismo->id); ?>"> 
                                        <?php $__currentLoopData = $companerismo->inscripcioneCompanerismos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inscripcioneCompanerismo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-6" data-id="<?php echo e('ins-'.$inscripcioneCompanerismo->inscripcione->id); ?>">
                                            <div class="card text-center">
                                                <div class="card-header inscripcione">
                                                    <img class="img-fluid rounded-circle" src="<?php echo e($inscripcioneCompanerismo->inscripcione->personale->user->adminlte_image()); ?>" alt="">
                                                    <div class="card-text"><small class="text-muted"><?php echo e($inscripcioneCompanerismo->inscripcione->role->name); ?></small></div>                                                   
                                                </div>
                                                <div class="card-body p-0">
                                                    <div class="card-text"><?php echo e($inscripcioneCompanerismo->inscripcione->personale->user->name); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if(count($programa->inscripcionesSinAsignar())): ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card card-row card-success">
                    <div class="card-header ">
                        <h3 class="card-title">
                            <?php echo e('Personal sin asignar'); ?>

                        </h3>
                    </div>
                    <div class="card-body group" data-id="<?php echo e('grupo-'); ?>">
                        <div class="card" data-id="sinAsignar">
                            <div class="card-header companerismo row" data-id="sinAsignar"> 
                                <?php $__currentLoopData = $programa->inscripcionesSinAsignar(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inscripcione): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-6" data-id="<?php echo e('ins-'.$inscripcione->id); ?>">
                                    <div class="card text-center">
                                        <div class="card-header inscripcione">
                                            <img class="img-fluid rounded-circle" src="<?php echo e($inscripcione->personale->user->adminlte_image()); ?>" alt="">
                                            <div class="card-text"><small class="text-muted"><?php echo e($inscripcione->role->name); ?></small></div>                                                   
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="card-text"><?php echo e($inscripcione->personale->user->name); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\pfj\resources\views/livewire/admin/asignar-personal.blade.php ENDPATH**/ ?>