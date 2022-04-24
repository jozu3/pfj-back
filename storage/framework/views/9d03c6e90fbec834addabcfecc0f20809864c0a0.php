

<?php $__env->startSection('title', 'Usuarios'); ?>

<?php $__env->startSection('content_header'); ?>
    
    <h1>Lista de usuarios</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<?php if(session('info')): ?>
        <div class="alert alert-success">
            <?php echo e(session('info')); ?>

        </div>
    <?php endif; ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.users-index')->html();
} elseif ($_instance->childHasBeenRendered('SH0nQYO')) {
    $componentId = $_instance->getRenderedChildComponentId('SH0nQYO');
    $componentTag = $_instance->getRenderedChildComponentTagName('SH0nQYO');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('SH0nQYO');
} else {
    $response = \Livewire\Livewire::mount('admin.users-index');
    $html = $response->html();
    $_instance->logRenderedChild('SH0nQYO', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pfj\resources\views/admin/users/index.blade.php ENDPATH**/ ?>