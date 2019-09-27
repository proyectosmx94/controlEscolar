@extends('layouts.app')

@section('content')
@include('escuela/modalNewEscuela')
@include('escuela/modalEditEscuela')
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                	Escuelas
                    <div style="float: right;">
                        <button class="btn btn-primary btn-sm" id="btnAbrirModalEscuela" data-toggle="tooltip" data-placement="top" title="Nueva escuela"><i class="fas fa-plus-circle"></i></button>
                    </div>
                </div>
                <div class="card-body">
               		<table class="table table-striped table-hover table-bordered dt-responsive" id="tablaEscuelas" style="font-size: .8rem; text-align: center;">
                        <thead>
                            <tr>
                                <th name="clave" scope="col">Clave</th>
                                <th name="nombre" scope="col">Nombre</th>
                                <th name="turno" scope="col">Turno</th>
                                <th name="nivel" scope="col">Nivel</th>
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
    function eliminarEscuela(value){
        var id = value.id;

            swal({
                title: "¿Estás seguro? ",
                text: "Los datos de la escuela se eliminaran del sistema  ",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#BB1E19',
                confirmButtonText: 'Eliminar',
                cancelButtonText: "Cancelar",
                }, function(isConfirm){
                        if (isConfirm) {     
                            $.ajax({
                                url: '{{url("/destroyEscuela")}}',
                                type: 'get',
                                data: {id: id},
                                success: function(data){
                                    window.location.reload();
                                },
                                error: function(data){
                                    console.log("error");
                                }
                            });
                        }else{
                            return false;
                        }
                    });  
    }
    function editarEscuela(value){
        var url = '{{ url('') }}';
        $("#editarEscuela").modal("show");

        var id = value.id;
        console.log(id);
            $.ajax({
                url: '{{url("/datosModalEscuela")}}',
                type: 'get',
                data: {id: id},
                success: function(data){
                    $("#idEscuela").val(data.idEscuela);
                    $("#editNombreEscuela").val(data.editNombreEscuela);
                    $("#editClave").val(data.editClave);
                    $("#editTurno").val(data.editTurno);
                    $("#editNivel").val(data.editNivel);
                },
                error: function(data){
                    
                }
            });
        }
    $(document).ready(function() {
        var url = '{{ url('') }}';
        $("#btnAbrirModalEscuela").click(function(event) {
            $('#nuevaEscuela').modal('show');
        });

        $("#btnGuardarEscuela").click(function(event) {
            $.ajax({
                url: 'storeEscuela',
                type: 'GET',
                data:{  nombreEscuela: $("#nombreEscuela").val(),
                        clave:         $("#clave").val(),
                        turno:         $("#turno").val(),
                        nivel:         $("#nivel").val(),
                        grado:         $("#grado").val(),
                        grupo:         $("#grupo").val()
                     },
            })
            .done(function(data) {
                swal({
                    title: "Escuela registrada",
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
                
            })
            .always(function() {
                
            });
        });

        // cargar datos a tabla
        $('#tablaEscuelas').DataTable({
            responsive: true,
            fixedHeader: true,
            processing: true,
            serverSide: true,
            ajax: url+"/getEscuelas",
            columns: [
                { data: 'clave', name: 'clave' },
                { data: 'nombre', name: 'nombre' },
                { data: 'turno', name: 'turno' },
                { data: 'nivel', name: 'nivel' },
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

        $("#btnEditEscuela").click(function(event) {
            $.ajax({
                url: 'editEscuela',
                type: 'GET',
                data:{  idEscuela:          $("#idEscuela").val(),
                        nombreEscuela:      $("#editNombreEscuela").val(),
                        turno:              $("#editTurno").val(),
                        clave:              $("#editClave").val(),
                        nivel:              $("#editNivel").val(),
                     },
            })
            .done(function(data) {
                swal({
                    title: "Los datos de la escuela se han actualizado",
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
                toastr.error('Error de sistema. Consulte al administrador');
            })
            .always(function() {
                // console.log("complete");
            });
        });
    });  
</script>
@endsection