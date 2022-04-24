<div class="card">
    <div class="card-header ui-sortable-handle" style="cursor: move;">
        <h3 class="card-title">
            <i class="fas fa-book-reader"></i>&nbsp;
            <b>Lecturas asignadas a la sesión</b>
        </h3>

        <div class="card-tools">
            <ul class="pagination pagination-sm">
                <li class="page-item"><a href="#" class="page-link">«</a></li>
                <li class="page-item"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">»</a></li>
            </ul>
        </div>
    </div>
    <!-- /.card-header -->
   
            @livewire('admin.tarea-lista', ['programa' => $programa])
        
</div>
