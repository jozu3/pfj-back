

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
} elseif ($_instance->childHasBeenRendered('iEtcwS8')) {
    $componentId = $_instance->getRenderedChildComponentId('iEtcwS8');
    $componentTag = $_instance->getRenderedChildComponentTagName('iEtcwS8');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('iEtcwS8');
} else {
    $response = \Livewire\Livewire::mount('admin.capacitaciones-index', [ 'programa' => $programa]);
    $html = $response->html();
    $_instance->logRenderedChild('iEtcwS8', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    </div>
                    <div class="tab-pane fade show" id="nav-comp" role="tabpanel" aria-labelledby="nav-comp-tab">
						<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.grupos-index', [ 'programa' => $programa])->html();
} elseif ($_instance->childHasBeenRendered('V7Q7SG5')) {
    $componentId = $_instance->getRenderedChildComponentId('V7Q7SG5');
    $componentTag = $_instance->getRenderedChildComponentTagName('V7Q7SG5');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('V7Q7SG5');
} else {
    $response = \Livewire\Livewire::mount('admin.grupos-index', [ 'programa' => $programa]);
    $html = $response->html();
    $_instance->logRenderedChild('V7Q7SG5', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
						
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