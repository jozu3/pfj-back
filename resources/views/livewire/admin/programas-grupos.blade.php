<div>
  @if ($programa->grupos->count() != 0)
	<div class="col-md-12">
		<nav>
		  <div class="nav nav-tabs" id="nav-tab" role="tablist">
		    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Asistencia</a>
		    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Lecturas</a>
		  </div>
		</nav>
		<div class="tab-content" id="nav-tabContent">
		  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
				{{-- @include('admin.programas.partials.asistencia') --}}
		  </div>
		  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
				{{-- @include('admin.programas.partials.register-notas') --}}
		  </div>
		</div>		
	</div>
	@else
	<div class="col-md-12">
		<div class="card">
			<div class="card-header text-warning">
				{{ 'Debe crear las clases de esta semana' }}
			</div>
		</div>
	</div>
	@endif
</div>
