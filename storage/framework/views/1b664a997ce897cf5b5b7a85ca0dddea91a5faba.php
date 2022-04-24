

<?php $__env->startSection('title', 'Anuncios'); ?>

<?php $__env->startSection('plugins.Sweetalert2', true); ?>

<?php $__env->startSection('content_header'); ?>
    
<a href="<?php echo e(route('admin.anuncios.create')); ?>" class="btn btn-success btn-sm float-right">Nuevo anuncio</a>
<h1>Anuncios</h1>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<?php if(session('info')): ?>
        <div class="alert alert-success">
            <?php echo e(session('info')); ?>

        </div>
    <?php endif; ?>
    <?php $__empty_1 = true; $__currentLoopData = auth()->user()->personale->inscripciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inscripcione): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.anuncios-index', ['programa_id' => $inscripcione->programa->id])->html();
} elseif ($_instance->childHasBeenRendered($inscripcione->programa->id)) {
    $componentId = $_instance->getRenderedChildComponentId($inscripcione->programa->id);
    $componentTag = $_instance->getRenderedChildComponentTagName($inscripcione->programa->id);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild($inscripcione->programa->id);
} else {
    $response = \Livewire\Livewire::mount('admin.anuncios-index', ['programa_id' => $inscripcione->programa->id]);
    $html = $response->html();
    $_instance->logRenderedChild($inscripcione->programa->id, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div>No está inscrito en ninguna sesión</div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <style type="text/css">
        .card-body {
            overflow: auto;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
    	
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pfj\resources\views/admin/anuncios/index.blade.php ENDPATH**/ ?>