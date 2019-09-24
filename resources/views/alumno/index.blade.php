@extends('layouts.app')

@section('content')
@include('alumno/modalNewAlumno')
@include('alumno/modalEditAlumno')
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
               		<table class="table table-striped table-hover table-bordered dt-responsive" id="tablaAlumnos" style="font-size: .8rem;">
                        <thead>
                            <tr>
                                <th name="grado" scope="col">Grado</th>
                                <th name="grupo" scope="col">Grupo</th>
                                <th name="nombre" scope="col">Nombre</th>
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
@endsection

@section('script')
<script>
    function asignarAlumno(value){
        var url = '{{ url('') }}';
        $("#editAlumno").modal("show");
        //     $("#selectPersonas").html("");
        var id = value.id;
            $.ajax({
                url: '{{url("/datosModalAlumno")}}',
                type: 'get',
                data: {id: id},
                success: function(data){
                    $("#editPrimerApellido").val(data.primerApellido);
                    $("#editSegundoApellido").val(data.primerApellido);
                    $("#editNombre").val(data.nombre);
                    $("#editCurpAlumno").val(data.curp);
                    $("#EditGrado").val(data.grado);
                    $("#EditGrupo").val(data.grupo);
                },
                error: function(data){
                    console.log("error");
                }
            });
        }

    $(document).ready(function() {
        // $('#tablaAlumnos').DataTable();
        var url = '{{ url('') }}';

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
        $('#tablaAlumnos').DataTable({
            responsive: true,
            fixedHeader: true,
            processing: true,
            serverSide: true,
            ajax: url+"/getAlumnos",
            columns: [
                { data: 'grado', name: 'grado' },
                { data: 'grupo', name: 'grupo' },
                { data: 'nombre', name: 'nombre' },
                { data: 'acciones', name: 'acciones' },
            ],
      
            "language": {
                "sProcessing":    "Procesando...",
                "sLengthMenu":    "Mostrar _MENU_ registros",
                "sZeroRecords":   "No se encontraron resultados",
                "sEmptyTable":    "Ningún dato disponible en esta tabla",
                "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":   "",
                "sSearch":        "<span class='fa fa-search'></span> Buscar",
                "sUrl":           "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                "sFirst":    "Primero",
                "sLast":    "Último",
                "sNext":    "Siguiente",
                "sPrevious": "Anterior"
            },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            },
      
            drawCallback: function( settings ) {
                $('[data-toggle="tooltip"]').tooltip();
            },
        }).ajax.reload();
    });


</script>
@endsection