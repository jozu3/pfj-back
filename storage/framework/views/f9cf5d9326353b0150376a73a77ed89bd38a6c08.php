

<?php $__env->startSection('title', 'Grupos '); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Grupos por Sesión</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<?php if(session('info')): ?>
        <div class="alert alert-success">
            <?php echo e(session('info')); ?>

        </div>
    <?php endif; ?>
    <?php $__empty_1 = true; $__currentLoopData = auth()->user()->personale->inscripciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inscripcione): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div>
        <div class="pgrupos">
            <nav class="navbar navbar-dark bg-yellow-pfj">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nombre-sesion" href="#"><?php echo e($inscripcione->programa->nombre); ?></a>
                <?php $__empty_2 = true; $__currentLoopData = $inscripcione->programa->grupos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grupo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                <a class="nav-item nav-link" id="nav-home-tab<?php echo e($grupo->id); ?>" data-toggle="tab" 
                    href="#nav-home<?php echo e($grupo->id); ?>" role="tab" aria-controls="nav-home<?php echo e($grupo->id); ?>" aria-selected=""><?php echo e('Grupo ' . $grupo->numero); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                
                <?php endif; ?>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <?php $__empty_2 = true; $__currentLoopData = $inscripcione->programa->grupos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grupo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                <div class="tab-pane fade show" id="nav-home<?php echo e($grupo->id); ?>" role="tabpanel" aria-labelledby="nav-home-tab<?php echo e($grupo->id); ?>">
                   <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.inscripcione-programa-index', ['grupo_id' => $grupo->id])->html();
} elseif ($_instance->childHasBeenRendered($grupo->id)) {
    $componentId = $_instance->getRenderedChildComponentId($grupo->id);
    $componentTag = $_instance->getRenderedChildComponentTagName($grupo->id);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild($grupo->id);
} else {
    $response = \Livewire\Livewire::mount('admin.inscripcione-programa-index', ['grupo_id' => $grupo->id]);
    $html = $response->html();
    $_instance->logRenderedChild($grupo->id, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                  
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                <div class="card">
                    <div class="card-header text-warning">
                        <?php echo e('No hay grupos'); ?>

                    </div>
                </div>
                <?php endif; ?>
                
            </div>		
        </div>
        <div class="col-md-12">
            
        </div>
    </div>
    
        <br>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <?php echo e('No estás inscrito en ninguna sesión'); ?>

    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

    <style type="text/css">
        .card-body {
            overflow: auto;
        }
        .bg-yellow-pfj{
            background-color: #ffb900!important;
            
        }
        .pgrupos .nav-tabs{
            border:0;
            overflow-y: hidden;
            overflow-x: auto;
        }
        .pgrupos .navbar{
            padding: 0
        }
        .pgrupos a.nav-item{
            color: white
        }
        .pgrupos a.nav-item:hover{
            background-color: #fe9a18 !important;
            border:0;
            margin:0;
            border-radius: 0;
        }
        .pgrupos a.nav-item.active{
            background-color: #fe9a18 !important;
            color:white!important;
            font-weight: bold;
            border:0;
            border-radius: 0;
            margin:0
        }
        .pgrupos .nav-link {
            display: block;
            padding: 1rem 1.5rem;
            font-size:
        }
        .nombre-sesion{
            max-width: 350px;
            min-width: 320px;
            width:100%;
            border:0 !important;
            margin:0;
            padding: 0.5rem 1.5rem;
            color: white;
            font-weight: bold;
            border-radius: 0;
            font-size: 27px;
            background-color: #fe9a18!important;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .nombre-sesion:hover{
            color: white;
            background-color: #fe9a18!important;
        }

        .pgrupos .tab-pane{
            overflow: auto;
        }
        .pgrupos .nav{
            flex-wrap: unset;
            text-align: center;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script> console.log('Hi!'); </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pfj\resources\views/admin/programas/grupos.blade.php ENDPATH**/ ?>