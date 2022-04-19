

<?php $__env->startSection('title', 'Seguimiento'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Seguimiento a contactos</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<?php if(session('info')): ?>
        <div class="alert alert-success">
            <?php echo e(session('info')); ?>

        </div>
    <?php endif; ?>
    
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.seguimientos-index')->html();
} elseif ($_instance->childHasBeenRendered('uMR9oKp')) {
    $componentId = $_instance->getRenderedChildComponentId('uMR9oKp');
    $componentTag = $_instance->getRenderedChildComponentTagName('uMR9oKp');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('uMR9oKp');
} else {
    $response = \Livewire\Livewire::mount('admin.seguimientos-index');
    $html = $response->html();
    $_instance->logRenderedChild('uMR9oKp', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script> console.log('Hi!'); </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pfj\resources\views/admin/seguimientos/index.blade.php ENDPATH**/ ?>