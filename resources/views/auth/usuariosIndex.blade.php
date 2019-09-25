@extends('layouts.app')

@section('content')
@include('auth/modalEditUser')
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                	Usuarios
                    <div style="float: right;">
                        <a href="{{ url('') }}/register" class="btn btn-primary btn-sm" id="btnAbrirModalUsuario" data-toggle="tooltip" data-placement="top" title="Nuevo usuario"><i class="fas fa-user-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
               		<table class="table table-striped table-hover table-bordered dt-responsive" id="tablaUsuarios" style="font-size: .8rem; text-align: center;">
                        <thead>
                            <tr>
                                <th name="escuela" scope="col">Escuela</th>
                                <th name="nombre" scope="col">Nombre</th>
                                <th name="correo" scope="col">Correo</th>
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
    function editarUsuario(value){
        var url = '{{ url('') }}';
        $("#editUsuario").modal("show");

        var id = value.id;
            $.ajax({
                url: '{{url("datosModalUsuario")}}',
                type: 'get',
                data: {id: id},
                success: function(data){
                    console.log(data);
                    // $("#editPrimerApellido").val(data.primerApellido);
                    // $("#editSegundoApellido").val(data.segundoApellido);
                    // $("#editNombre").val(data.nombre);
                    // $("#editCurpAlumno").val(data.curp);
                    // $("#EditGrado").val(data.grado);
                    // $("#EditGrupo").val(data.grupo);
                    // $("#idAlumno").val(data.idAlumno);
                },
                error: function(data){
                    console.log("error");
                }
            });
        }
    $(document).ready(function() {
        var url = '{{ url('') }}';
        $('#tablaUsuarios').DataTable({
            responsive: true,
            fixedHeader: true,
            processing: true,
            serverSide: true,
            ajax: url+"/getUsuarios",
            columns: [
                { data: 'escuela', name: 'escuela' },
                { data: 'nombre', name: 'nombre' },
                { data: 'correo', name: 'correo' },
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

        $.ajax({
            url: 'obtenerEscuelas',
            type: 'GET',
        })
        .done(function(data) {
            $("#idEscuela").append(data);
            
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            // console.log("complete");
        });
    });
</script>
@endsection