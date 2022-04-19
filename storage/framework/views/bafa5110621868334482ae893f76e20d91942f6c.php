

<?php $__env->startSection('title', 'Sesión'); ?>

<?php $__env->startSection('content_header'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.programas.edit')): ?>
        <a href="<?php echo e(route('admin.programas.edit', $programa)); ?>" class="btn btn-success btn-sm float-right">Editar programa</a>
    <?php endif; ?>
    <a href="<?php echo e(route('admin.programas.asignar', $programa)); ?>" class="btn btn-success btn-sm float-right mr-3">
		<i class="fas fa-sitemap"></i> Asignaciones</a>
    <a href="<?php echo e(route('admin.excel.personalesGrupo', $programa)); ?>" class="btn btn-success btn-sm float-right mr-3"><i
            class="far fa-file-excel"></i> Registro de personales</a>

    <h1>Sesión: <?php echo e($programa->nombre . ' ' . date('d/m/Y', strtotime($programa->fecha_inicio))); ?></h1>
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
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <p>Capacitaciones:</p>
                        </div>
                        <div class="col-md-9"><b><?php echo e(count($programa->capacitaciones)); ?></b></div>
                        <div class="col-md-3">
                            <p>Grupos:</p>
                        </div>
                        <div class="col-md-9"> <b><?php echo e(count($programa->grupos)); ?></b></div>
                        <div class="col-md-3">
                            <p>Personal:</p>
                        </div>
                        <div class="col-md-9"><b><?php echo e(count($programa->inscripciones)); ?></b></div>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-md-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-personal-tab" data-toggle="tab" href="#nav-personal"
                            role="tab" aria-controls="nav-personal" aria-selected="true">Personal</a>
                        <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                            aria-controls="nav-home" aria-selected="true">Asistencia</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                            aria-controls="nav-profile" aria-selected="false">Lecturas</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-personal" role="tabpanel"
                        aria-labelledby="nav-personal-tab">
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.inscripcione-programa-index', ['programa_id' => $programa->id])->html();
} elseif ($_instance->childHasBeenRendered('JgNXymc')) {
    $componentId = $_instance->getRenderedChildComponentId('JgNXymc');
    $componentTag = $_instance->getRenderedChildComponentTagName('JgNXymc');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('JgNXymc');
} else {
    $response = \Livewire\Livewire::mount('admin.inscripcione-programa-index', ['programa_id' => $programa->id]);
    $html = $response->html();
    $_instance->logRenderedChild('JgNXymc', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    </div>
                    <div class="tab-pane fade show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <?php echo $__env->make('admin.programas.partials.asistencia', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        
                    </div>
                </div>
            </div>
    </div>

    <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
        <b>Se guardó correctamente!</b>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <style type="text/css">
        .cont-pestaña {
            box-shadow: none;
            border: 1px solid transparent;
            border-color: #FFF #dee2e6 #dee2e6;
            border-radius: 0px 0px 0.25rem 0.25rem;
        }

        .una-fila {
            flex-wrap: nowrap;
        }

        .apellido-fijo {
            position: absolute;
            width: 11em;
            left: 0;

        }

        .nombre-fijo {
            position: absolute;
            width: 11em;
            left: 11em;
        }

        .card-body-2 {
            padding-left: 0
        }

        .cont-table-div {
            overflow-x: scroll;
            margin-left: 22em;
        }

        .alturatd-dis {
            height: 4em;
            color: #00000050;
        }

        #success-alert {
            position: fixed;
            top: 150px;
            right: 5px;
        }

        .input-nota {
            width: 80px !important;
        }
		.tab-content{
			overflow-y: auto
		}
    </style>
    

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        $().ready(function() {
            $("#success-alert").hide();
        });

        Livewire.on('alert', function(result) {

            if (result) {
                $("#success-alert").show();
                $("#success-alert").fadeTo(1000, 500).slideUp(500, function() {
                    $("#success-alert").slideUp(500);
                });
            }

        });

        /*	$('input[type="radio"]').change(function () {

        		var color = 'as';
        		switch ($(this).val()){
        			case 0:
        				color = 'text-danger'
        				break;
        			case 1:
        				color = 'text-success'
        				break;
        			case 2:
        				color = 'text-warning'
        				break;
        		}

    		  if($(this).is(":checked")){
    		  	console.log($(this).val());
    		    $(this).parent().addClass(color);
    		  }

    		});*/
    </script>
    <script type="text/javascript" src="<?php echo e(config('app.url')); ?>/js/app.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pfj\resources\views/admin/programas/show.blade.php ENDPATH**/ ?>