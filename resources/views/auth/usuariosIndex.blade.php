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
                                <th name="nombre" scope="col">Nombre</th>
                                <th name="escuela" scope="col">Escuela</th>
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
                    // console.log(data);
                    $("#editNombreUsuario").val(data.name);
                    $("#editMailUsuario").val(data.email);
                    $("#idEscuela").val(data.idEscuela);
                    $("#idUser").val(data.idUser);
                },
                error: function(data){
                    console.log("error");
                }
            });
        }
    
    function eliminarUsuario(value){
        var id = value.id;

            swal({
                title: "¿Estás seguro? ",
                text: "Los datos del usuario se eliminaran del sistema",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#BB1E19',
                confirmButtonText: 'Eliminar',
                cancelButtonText: "Cancelar",
                }, function(isConfirm){
                        if (isConfirm) {     
                            $.ajax({
                                url: '{{url("/destroyUsuario")}}',
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
    $(document).ready(function() {
        var url = '{{ url('') }}';
        $('#tablaUsuarios').DataTable({
            responsive: true,
            fixedHeader: true,
            processing: true,
            serverSide: true,
            ajax: url+"/getUsuarios",
            columns: [
                { data: 'nombre', name: 'nombre' },
                { data: 'escuela', name: 'escuela' },
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

        // Editar usuario
        $("#btnEditUser").click(function(event) {
            $.ajax({
                url: '{{url("editUser")}}',
                type: 'GET',
                data:{  idUser:     $("#idUser").val(),
                        name:       $("#editNombreUsuario").val(),
                        idEscuela:  $("#idEscuela").val(),
                        email:      $("#editMailUsuario").val(),
                        password:   $("#editPasswordUsuario").val()
                     },
            })
            .done(function(data) {
                console.log("Bien");
                swal({
                    title: "Los datos del usuario se han actualizado",
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
                toastr.error('Error. Consulte al administrador');
            })
            .always(function() {

            });
        });
    });
</script>
@endsection