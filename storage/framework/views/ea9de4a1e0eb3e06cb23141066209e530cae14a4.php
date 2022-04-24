

<?php $__env->startSection('title', 'Personales'); ?>

<?php $__env->startSection('content_header'); ?>
    <a href="<?php echo e(route('admin.contactos.index')); ?>" class="btn btn-success btn-sm float-right">Nuevo personal</a>
    <h1>Lista de personales</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<?php if(session('info')): ?>
        <div class="alert alert-success">
            <?php echo e(session('info')); ?>

        </div>
    <?php endif; ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.personales-index')->html();
} elseif ($_instance->childHasBeenRendered('Z6GWe8F')) {
    $componentId = $_instance->getRenderedChildComponentId('Z6GWe8F');
    $componentTag = $_instance->getRenderedChildComponentTagName('Z6GWe8F');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Z6GWe8F');
} else {
    $response = \Livewire\Livewire::mount('admin.personales-index');
    $html = $response->html();
    $_instance->logRenderedChild('Z6GWe8F', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pfj\resources\views/admin/personales/index.blade.php ENDPATH**/ ?>