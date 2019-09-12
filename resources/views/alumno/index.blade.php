@extends('layouts.app')

@section('content')
@include('alumno/modalNewAlumno')
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                	Alumnos
                    <div style="float: right;">
                        <button class="btn btn-primary btn-sm" id="btnAbrirModalAlumno" data-toggle="tooltip" data-placement="top" title="Nuevo alumno"><i class="fas fa-user-plus"></i></button>
                    </div>
                </div>
                <div class="card-body">
               		<table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Grado</th>
                                <th scope="col">Grupo</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                        </table>

                
                </div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $("#btnAbrirModalAlumno").click(function(event) {
            $('#nuevoAlumno').modal('show');
        });

        $("#btnGuardarAlumno").click(function(event) {
            $.ajax({
                url: 'storeAlumno',
                type: 'GET',
                data:{  primerApellido:     $("#primerApellido").val(),
                        segundoApellido:    $("#segundoApellido").val(),
                        nombre:             $("#nombre").val(),
                        curpAlumno:         $("#curpAlumno").val(),
                        grado:              $("#grado").val(),
                        grupo:              $("#grupo").val()
                     },
            })
            .done(function(data) {
                swal({
                    title: "Alumno registrado",
                    type: "success",
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "Aceptar",
                    closeOnConfirm: false
                    }, function(isConfirm){
                        if (isConfirm) {     
                            window.location.reload();
                        } 
                    });  
            })
            .fail(function() {
                toastr.error('Alumno no registrado. Consulte al administrador');
            })
            .always(function() {
                // console.log("complete");
            });
        });

        // cargar datos a tabla
    });
</script>
@endsection