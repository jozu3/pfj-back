

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
} elseif ($_instance->childHasBeenRendered('VCILEuw')) {
    $componentId = $_instance->getRenderedChildComponentId('VCILEuw');
    $componentTag = $_instance->getRenderedChildComponentTagName('VCILEuw');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('VCILEuw');
} else {
    $response = \Livewire\Livewire::mount('admin.programas-index', ['mis_programas' => true]);
    $html = $response->html();
    $_instance->logRenderedChild('VCILEuw', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
    <script> 
        console.log('Hi!'); 
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pfj\resources\views/admin/programas/misprogramas.blade.php ENDPATH**/ ?>