

<?php $__env->startSection('title', 'Sesiones'); ?>

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
    $html = \Livewire\Livewire::mount('admin.programas-index')->html();
} elseif ($_instance->childHasBeenRendered('6AkPIEa')) {
    $componentId = $_instance->getRenderedChildComponentId('6AkPIEa');
    $componentTag = $_instance->getRenderedChildComponentTagName('6AkPIEa');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('6AkPIEa');
} else {
    $response = \Livewire\Livewire::mount('admin.programas-index');
    $html = $response->html();
    $_instance->logRenderedChild('6AkPIEa', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
        .avatar-circle{
            width:130px;
            height: 130px;
            object-fit: cover;
            object-position: center
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script> console.log('Hi!');
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
        })
 </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pfj\resources\views/admin/programas/index.blade.php ENDPATH**/ ?>