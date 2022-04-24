

<?php $__env->startSection('title', 'Pfjs'); ?>

<?php $__env->startSection('content_header'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.pfjs.create')): ?>
        <a href="<?php echo e(route('admin.pfjs.create')); ?>" class="btn btn-success btn-sm float-right">Nuevo pfj</a>
    <?php endif; ?>
    <h1>Lista de pfjs</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<?php if(session('info')): ?>
        <div class="alert alert-success">
            <?php echo e(session('info')); ?>

        </div>
    <?php endif; ?>
     <?php if(session('error')): ?>
        <div class="alert alert-danger">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.pfjs-index')->html();
} elseif ($_instance->childHasBeenRendered('LCIDvVm')) {
    $componentId = $_instance->getRenderedChildComponentId('LCIDvVm');
    $componentTag = $_instance->getRenderedChildComponentTagName('LCIDvVm');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('LCIDvVm');
} else {
    $response = \Livewire\Livewire::mount('admin.pfjs-index');
    $html = $response->html();
    $_instance->logRenderedChild('LCIDvVm', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pfj\resources\views/admin/pfjs/index.blade.php ENDPATH**/ ?>