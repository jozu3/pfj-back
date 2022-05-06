

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
} elseif ($_instance->childHasBeenRendered('qL9G7M5')) {
    $componentId = $_instance->getRenderedChildComponentId('qL9G7M5');
    $componentTag = $_instance->getRenderedChildComponentTagName('qL9G7M5');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('qL9G7M5');
} else {
    $response = \Livewire\Livewire::mount('admin.programas-index', ['mis_programas' => true]);
    $html = $response->html();
    $_instance->logRenderedChild('qL9G7M5', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <style type="text/css">
        .card-body {
            overflow: auto;
        }
        td{
            vertical-align: middle!important
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