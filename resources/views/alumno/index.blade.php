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
                	Alumnos
                    <div style="float: right;">
                        <button class="btn btn-primary btn-sm" id="btnAbrirModalAlumno" data-toggle="tooltip" data-placement="top" title="Nuevo alumno"><i class="fas fa-user-plus"></i></button>

                        <button class="btn btn-success btn-sm" id="btnAbrirModalExcel" data-toggle="tooltip" data-placement="top" title="Importar desde Excel"><i class="fas fa-file-upload"></i></button>
                    </div>
                </div>
                <div class="card-body">
               		<table class="table table-striped table-hover table-bordered dt-responsive" id="tablaAlumnos" style="font-size: .8rem; text-align: center;">
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
</div><br><br><br>
@endsection

@section('script')
<script>
    function asignarAlumno(value){
        var url = '{{ url('') }}';
        $("#editAlumno").modal("show");

        var id = value.id;
            $.ajax({
                url: '{{url("/datosModalAlumno")}}',
                type: 'get',
                data: {id: id},
                success: function(data){
                    $("#idAlumno").val(data.idAlumno);
                    $("#editPrimerApellido").val(data.primerApellido);
                    $("#editSegundoApellido").val(data.segundoApellido);
                    $("#editNombre").val(data.nombre);
                    $("#editCurpAlumno").val(data.curp);
                    $("#EditGrado").val(data.grado);
                    $("#EditGrupo").val(data.grupo);
                    $("#EditNombreTutor").val(data.nombreTutor);
                    $("#EditTelefonoTutor").val(data.telefonoTutor);
                    $("#EditCorreoNombreTutor").val(data.correoTutor);
                    $("#EditIdRfid").val(data.idRfid);
                },
                error: function(data){
                    console.log("error");
                }
            });
        }

        function eliminarAlumno(value){
        var id = value.id;

            swal({
                title: "¿Estás seguro? ",
                text: "Los datos del alumno se eliminaran del sistema  ",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#BB1E19',
                confirmButtonText: 'Eliminar',
                cancelButtonText: "Cancelar",
                }, function(isConfirm){
                        if (isConfirm) {     
                            $.ajax({
                                url: '{{url("/destroyAlumno")}}',
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

        $("#btnAbrirModalAlumno").click(function(event) {
            $('#nuevoAlumno').modal('show');
        });

        $("#btnAbrirModalExcel").click(function(event) {
            $('#cargarExcel').modal('show');
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
                        grupo:              $("#grupo").val(),
                        nombreTutor:        $("#nombreTutor").val(),
                        telefonoTutor:      $("#telefonoTutor").val(),
                        correoTutor:        $("#correoTutor").val(),
                        idRfid:             $("#idRfid").val()
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

        $('input[type=file]').change(function(e) {
            $in = $(this);
            $in.next().html($in.val());
            
        });

        $('.uploadButton').click(function() {
            var fileName = $("#fileUpload").val();
            if (fileName) {
                alert(fileName + " can be uploaded.");
            }
            else {
                alert("Please select a file to upload");
            }
        });

            // cargar datos a tabla
            var table = $('#tablaAlumnos').DataTable({
                lengthMenu: [[10, 25, 30, 50, -1], [10, 25, 30, 50, "Todos"]],
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

            $("#btnEditAlumno").click(function(event) {
                $.ajax({
                    url: 'editAlumno',
                    type: 'GET',
                    data:{  idAlumno:           $("#idAlumno").val(),
                            primerApellido:     $("#editPrimerApellido").val(),
                            segundoApellido:    $("#editSegundoApellido").val(),
                            nombre:             $("#editNombre").val(),
                            curpAlumno:         $("#editCurpAlumno").val(),
                            grado:              $("#EditGrado").val(),
                            grupo:              $("#EditGrupo").val(),
                            nombreTutor:        $("#EditNombreTutor").val(),
                            telefonoTutor:      $("#EditTelefonoTutor").val(),
                            correoTutor:        $("#EditCorreoNombreTutor").val(),
                            idRfid:        $("#EditIdRfid").val(),
                         },
                })
                .done(function(data) {
                    swal({
                        title: "Los datos del alumno se han actualizado",
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

            // Setup - add a text input to each footer cell
            $('#tablaAlumnos thead tr').clone(true).appendTo('#tablaAlumnos thead');
            $('#tablaAlumnos thead tr:eq(1) th').each(function(i){
                var title =$(this).text();
                $(this).html('<input type="text" class="form-control" placeholder="Buscar por '+title+'" />' );
         
                $('input',this).on('keyup change', function(){
                    if(table.column(i).search()!== this.value ){
                        table
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });
            });
         
    });
</script>
@endsection