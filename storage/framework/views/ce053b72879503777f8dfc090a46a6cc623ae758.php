

<?php $__env->startSection('title', 'Editar programa'); ?>

<?php $__env->startSection('plugins.Sweetalert2', true); ?>

<?php $__env->startSection('content_header'); ?>
     <a href="<?php echo e(route('admin.programas.show', $programa)); ?>" class="btn btn-success btn-sm float-right"><i class="fas fa-user-graduate"></i> Ver personales</a>
	 <a href="<?php echo e(route('admin.programas.asignar', $programa)); ?>" class="btn btn-success btn-sm float-right mr-3">
		<i class="fas fa-sitemap"></i> Asignaciones</a>
    <h1>Editar programa</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if(session('info')): ?>
<div class="alert alert-success">
	<?php echo e(session('info')); ?>

</div>
<?php endif; ?>

    <?php if(auth()->user()->can('admin.programas.edit')): ?>
	<div class="card">
		<div class="card-body">
			<?php echo Form::model($programa, ['route' => ['admin.programas.update', $programa], 'method' => 'put']); ?>

				<?php echo Form::hidden('pfj_id', null); ?>

				<?php echo $__env->make('admin.programas.partials.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<br>
				<div class="form-group">
				<?php echo Form::submit('Guardar', ['class' => 'btn btn-primary']); ?>

				</div>
			<?php echo Form::close(); ?>

		</div>
	</div>
    <?php endif; ?>

	<?php if(session('info_comp')): ?>
        <div class="alert alert-success">
            <?php echo e(session('info_comp')); ?>

        </div>
    <?php endif; ?>
	<div class="card">
		<div class="row">
			<div class="col-md-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-personal-tab" data-toggle="tab" href="#nav-personal"
                            role="tab" aria-controls="nav-personal" aria-selected="true">Capacitaciones</a>
                        <a class="nav-item nav-link" id="nav-comp-tab" data-toggle="tab" href="#nav-comp" role="tab"
                            aria-controls="nav-comp" aria-selected="true">Grupos</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                            aria-controls="nav-profile" aria-selected="false">Lecturas</a>
                    </div>
                </nav>
                <div class="tab-content overflow-auto" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-personal" role="tabpanel"
                        aria-labelledby="nav-personal-tab">
						<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.capacitaciones-index', [ 'programa' => $programa])->html();
} elseif ($_instance->childHasBeenRendered('LaaMWfK')) {
    $componentId = $_instance->getRenderedChildComponentId('LaaMWfK');
    $componentTag = $_instance->getRenderedChildComponentTagName('LaaMWfK');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('LaaMWfK');
} else {
    $response = \Livewire\Livewire::mount('admin.capacitaciones-index', [ 'programa' => $programa]);
    $html = $response->html();
    $_instance->logRenderedChild('LaaMWfK', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    </div>
                    <div class="tab-pane fade show" id="nav-comp" role="tabpanel" aria-labelledby="nav-comp-tab">
						<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.grupos-index', [ 'programa' => $programa])->html();
} elseif ($_instance->childHasBeenRendered('nC8DCuV')) {
    $componentId = $_instance->getRenderedChildComponentId('nC8DCuV');
    $componentTag = $_instance->getRenderedChildComponentTagName('nC8DCuV');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('nC8DCuV');
} else {
    $response = \Livewire\Livewire::mount('admin.grupos-index', [ 'programa' => $programa]);
    $html = $response->html();
    $_instance->logRenderedChild('nC8DCuV', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
						<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.tarea-lista', ['programa' => $programa])->html();
} elseif ($_instance->childHasBeenRendered('fEOQ91o')) {
    $componentId = $_instance->getRenderedChildComponentId('fEOQ91o');
    $componentTag = $_instance->getRenderedChildComponentTagName('fEOQ91o');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('fEOQ91o');
} else {
    $response = \Livewire\Livewire::mount('admin.tarea-lista', ['programa' => $programa]);
    $html = $response->html();
    $_instance->logRenderedChild('fEOQ91o', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    </div>
                </div>
            </div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="">
    <style>
    	.list-nota{
    		width: 20%;
    		padding: 0.15rem 1.25rem;
    		border: 0;
    	}
    	.list-nota2{
    		width: 60%;
    	}
    	.list-group-horizontal {
		    border-bottom: 1px solid #bbbbbb;
		}
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

	<?php if(session('info_comp')): ?>
        <script>
			$().ready(function() {
				$('#nav-comp-tab').click();
				
				const urlParams = new URLSearchParams(window.location.search);
				const grupo_id = urlParams.get('grupo')
				$('#comps-' + grupo_id ).click();

			})

		</script>
    <?php endif; ?>
	<?php if(session('info_grupo')): ?>
        <script>
			$().ready(function() {
				$('#nav-comp-tab').click();
			})

		</script>
    <?php endif; ?>
    <script>
    	$().ready(function() {
		
	    	$('.crear_notas_clases').submit( function (e) {
	    		e.preventDefault();
		    	Swal.fire({
				  title: 'Advertencia',
				  text: "Si crea las clases o genera las notas para los personales, ya no podrá agregar unidades o notas de las unidades a este grupo.",
				  icon: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Continuar',
				  cancelButtonText: "Cancelar", 
				}).then((result) => {
				  if (result.value) {
				    /**/
				    this.submit();
				  }
				})	    		
	    	});
	    

	    });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pfj\resources\views/admin/programas/edit.blade.php ENDPATH**/ ?>