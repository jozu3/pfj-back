<h4>Datos del personale</h4>
<?php echo Form::hidden('contacto_id', $_GET['idcontacto']); ?>

<?php echo Form::hidden('fecha', date('Y-m-d')); ?>

<?php echo Form::hidden('user_id', ''); ?>


<?php echo $__env->make('admin.contactos.partials.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<br>
<h4>Información del PFJ y sesión</h4>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.programa-info')->html();
} elseif ($_instance->childHasBeenRendered('O2qbQo1')) {
    $componentId = $_instance->getRenderedChildComponentId('O2qbQo1');
    $componentTag = $_instance->getRenderedChildComponentTagName('O2qbQo1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('O2qbQo1');
} else {
    $response = \Livewire\Livewire::mount('admin.programa-info');
    $html = $response->html();
    $_instance->logRenderedChild('O2qbQo1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php echo $__env->make('admin.inscripciones.partials.formedit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pfj\resources\views/admin/inscripciones/partials/form.blade.php ENDPATH**/ ?>