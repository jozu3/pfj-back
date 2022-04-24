<div class="card cont-pestaña">
	<div class="card-header">
		<b>Listado de Personales</b>
	</div>
	<div class="card-body card-body-2 cont-table-div" style="overflow-x:auto">
		<table class="table table-striped">
			<thead>
				<tr>
					<th class="apellido-fijo">Apellidos</th>
					<th class="nombre-fijo">Nombres</th>
					<?php if(isset($is_report) && $is_report == true): ?>
	                	<th class="">Código de matrícula</th>
						<th class="">DNI/Documento de identidad</th>
						<th class="">Grado académico</th>
						<th class="">Teléfono</th>
	                <?php endif; ?>
					<?php $__empty_1 = true; $__currentLoopData = $programa->capacitaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $capacitacione): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
						<th colspan="1" class="text-center border-left">
							<b><?php echo e(date('d/m/Y', strtotime($capacitacione->fechacapacitacion))); ?></b>
						</th>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
					<?php endif; ?>
				</tr>
			</thead>
			<tbody>
				<?php $__currentLoopData = $programa->inscripcionesEstado([0,1,2]); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inscripcione): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td class="apellido-fijo">
							<b><?php echo e($inscripcione->personale->contacto->apellidos.' '); ?></b>
						</td>
						<td class="nombre-fijo">
							<?php echo e($inscripcione->personale->contacto->nombres); ?> 
						</td>
						<?php if(isset($is_report) && $is_report == true): ?>
	                	<td class="">
	                		<?php echo e($inscripcione->id); ?>

						</td>
						<td class="">
	                		<?php echo e($inscripcione->personale->contacto->doc); ?>

						</td>
						<td class="">
							<?php
								$grados = [
									'1' => 'Profesor',
									'2' => 'Bachiller',
									'3' => 'Licenciado',
									'4' => 'Magister',
									'5' => 'Doctor',
									'6' => 'Phd',
									'7' => 'Estudiante',
									'8' => 'No registra',
								];
							?>
							<?php if($inscripcione->personale->contacto->grado_academico > 0): ?>
	                			<?php echo e($grados[$inscripcione->personale->contacto->grado_academico]); ?>

							<?php endif; ?>
						</td>
						<td class="">
	                		<?php echo e($inscripcione->personale->contacto->telefono); ?>

						</td>
	                	<?php endif; ?>
						<?php $__empty_1 = true; $__currentLoopData = $inscripcione->programa->capacitaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $capacitacione): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
							<td class="border-left">
								<div class="form-row align-items-center una-fila">
									<div class="col-auto my-1 mx-2">
										<?php if(!isset($is_report)): ?>
											<?php echo e($is_report = false); ?>

										<?php endif; ?>
										<?php if($inscripcione->asistenciaCapacitacione($capacitacione)): ?>
										<?php echo Form::model($inscripcione->asistenciaCapacitacione($capacitacione)); ?>

										<?php else: ?>
										<?php echo Form::open(['route' => 'admin.capacitaciones.store']); ?>

										<?php endif; ?>
										<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.create-asistencia', [
											'capacitacione_id' => $capacitacione->id,
											'inscripcione_id' => $inscripcione->id,
											'is_report' => $is_report
											])->html();
} elseif ($_instance->childHasBeenRendered('V2AXdn7')) {
    $componentId = $_instance->getRenderedChildComponentId('V2AXdn7');
    $componentTag = $_instance->getRenderedChildComponentTagName('V2AXdn7');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('V2AXdn7');
} else {
    $response = \Livewire\Livewire::mount('admin.create-asistencia', [
											'capacitacione_id' => $capacitacione->id,
											'inscripcione_id' => $inscripcione->id,
											'is_report' => $is_report
											]);
    $html = $response->html();
    $_instance->logRenderedChild('V2AXdn7', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
										<?php echo Form::close(); ?>

									</div>
								</div>
							</td>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
						<td>
							<br>
						</td>
						<?php endif; ?>
	                	<td>
	                		<br>
	                		<br>
						</td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>
	</div>
</div><?php /**PATH C:\xampp\htdocs\pfj\resources\views/admin/programas/partials/asistencia.blade.php ENDPATH**/ ?>