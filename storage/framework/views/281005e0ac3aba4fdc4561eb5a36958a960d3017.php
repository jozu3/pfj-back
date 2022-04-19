

<?php $__env->startSection('title', 'Editar pfj'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Editar pfj</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<?php if(session('info')): ?>
        <div class="alert alert-success">
            <?php echo e(session('info')); ?>

        </div>
    <?php endif; ?>
	<div class="card">
		<div class="card-body">
			<?php echo Form::model($pfj, ['route' => ['admin.pfjs.update', $pfj], 'method' => 'put']); ?>

				
				<?php echo $__env->make('admin.pfjs.partials.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				
				<br>
				<div class="form-group">
					
				<?php echo Form::submit('Guardar', ['class' => 'btn btn-primary']); ?>

				</div>
			<?php echo Form::close(); ?>

		</div>
	</div>
	
    <h4>Listado de sesiones del <?php echo e($pfj->nombre); ?></h4>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.programas-index', ['pfj_id' => $pfj->id, 'terminado' => false])->html();
} elseif ($_instance->childHasBeenRendered('VFiXSSp')) {
    $componentId = $_instance->getRenderedChildComponentId('VFiXSSp');
    $componentTag = $_instance->getRenderedChildComponentTagName('VFiXSSp');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('VFiXSSp');
} else {
    $response = \Livewire\Livewire::mount('admin.programas-index', ['pfj_id' => $pfj->id, 'terminado' => false]);
    $html = $response->html();
    $_instance->logRenderedChild('VFiXSSp', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="">
    <style>
    	.list-nota{
    		width: 20%;
    		padding: 0.15rem 1.25rem;
    	}
    	.list-nota2{
    		width: 80%;
    	}
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script> console.log('Hi!'); </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pfj\resources\views/admin/pfjs/edit.blade.php ENDPATH**/ ?>