

<?php $__env->startSection('title', 'PFJ'); ?>

<?php $__env->startSection('content_header'); ?>
    <a href="<?php echo e(route('admin.contactos.create')); ?>" class="btn btn-success btn-sm float-right">Nuevo contacto</a>
    <h1>Lista de contactos</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<?php if(session('info')): ?>
        <div class="alert alert-success">
            <?php echo e(session('info')); ?>

        </div>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div class="alert alert-success">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.contactos-index')->html();
} elseif ($_instance->childHasBeenRendered('LlDRAYQ')) {
    $componentId = $_instance->getRenderedChildComponentId('LlDRAYQ');
    $componentTag = $_instance->getRenderedChildComponentTagName('LlDRAYQ');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('LlDRAYQ');
} else {
    $response = \Livewire\Livewire::mount('admin.contactos-index');
    $html = $response->html();
    $_instance->logRenderedChild('LlDRAYQ', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pfj\resources\views/admin/contactos/index.blade.php ENDPATH**/ ?>