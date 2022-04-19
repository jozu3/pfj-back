

<?php $__env->startSection('title', 'Mis sesiones inscritas'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Lista de Sesiones</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<?php if(session('info')): ?>
        <div class="alert alert-success">
            <?php echo e(session('info')); ?>

        </div>
    <?php endif; ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.programas-index', ['mis_programas' => true])->html();
} elseif ($_instance->childHasBeenRendered('GvkKiSn')) {
    $componentId = $_instance->getRenderedChildComponentId('GvkKiSn');
    $componentTag = $_instance->getRenderedChildComponentTagName('GvkKiSn');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('GvkKiSn');
} else {
    $response = \Livewire\Livewire::mount('admin.programas-index', ['mis_programas' => true]);
    $html = $response->html();
    $_instance->logRenderedChild('GvkKiSn', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <style type="text/css">
        .card-body {
            overflow: auto;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script> console.log('Hi!'); </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pfj\resources\views/admin/programas/misprogramas.blade.php ENDPATH**/ ?>