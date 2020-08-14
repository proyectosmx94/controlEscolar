@extends('layouts.app')

@section('content')
@include('alumno/modalNewAlumno')
@include('alumno/modalEditAlumno')
@include('alumno/modalExcel')
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                	Reporte de asistencias
                </div>
                <div class="card-body">
                    <form   accept-charset="utf-8" novalidate class="datos-consulta">
                    {!! csrf_field() !!}
               		<div class="form-group row">
                        <div class="col-3">
                            <label>Fecha</label>
                            <input type="date" class="form-control" name="fecha" id="fecha" required="" value="<?php echo date("Y-m-d");?>">
                            <div class="invalid-feedback">Ingresa una fecha</div>
                        </div>
                        <div class="col-3">
                            <label>Acciones</label><br>
                            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-search"></i> Consultar</button>
                        </div>
                    </form>
                    </div>

                    <div class="form-group row">
                        <table class="table table-striped table-hover table-bordered dt-responsive" id="tablaAsistencias" style="font-size: .8rem; text-align: center;">
                            <thead>
                                <tr>
                                    <th name="grado" scope="col">Grado</th>
                                    <th name="grupo" scope="col">Grupo</th>
                                    <th name="nombre" scope="col">Nombre</th>
                                    <th name="nombre" scope="col">Fecha y hora</th>
                                    <th class="acciones" name="acciones" scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody style="font-size: 0.8rem;">

                            </tbody>
                        </table>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div><br><br><br>
@endsection

@section('script')
<script>
    var url = '{{ url('') }}';
(function() {
  'use strict';
  window.addEventListener('load', function() {
    var forms = document.getElementsByClassName('datos-consulta');
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();


    
</script>


@endsection