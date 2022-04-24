

<?php $__env->startSection('title', 'Inscripciones'); ?>

<?php $__env->startSection('plugins.Sweetalert2', true); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Matrículas</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<?php if(session('info')): ?>
        <div class="alert alert-success">
            <?php echo e(session('info')); ?>

        </div>
    <?php endif; ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.inscripciones-index')->html();
} elseif ($_instance->childHasBeenRendered('KMASq8t')) {
    $componentId = $_instance->getRenderedChildComponentId('KMASq8t');
    $componentTag = $_instance->getRenderedChildComponentTagName('KMASq8t');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('KMASq8t');
} else {
    $response = \Livewire\Livewire::mount('admin.inscripciones-index');
    $html = $response->html();
    $_instance->logRenderedChild('KMASq8t', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
    	$().ready(function() {
			<?php if(session('eliminar') == 'Ok'): ?>
				Swal.fire(
					      "Ok",
					      'Matrícula eliminada.',
					      'success'
					    )
			<?php endif; ?>
	    	Livewire.on('readytoload', event => {
		    	$('.eliminar-inscripcione').submit( function (e) {
		    		e.preventDefault();
			    	Swal.fire({
					  title: 'Se necesita confirmación',
					  text: "No se podrá recuperar los datos de la inscrición.",
					  icon: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Sí, borrar difinitivamente!'
					}).then((result) => {
					  if (result.value) {
					    /**/
					    this.submit();
					  }
					})	    		
		    	});
	    	});

	    });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pfj\resources\views/admin/inscripciones/index.blade.php ENDPATH**/ ?>