@extends('layouts.app')

@section('content')
@include('escuela/modalNewEscuela')
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                	Escuelas
                    <div style="float: right;">
                        <button class="btn btn-primary btn-sm" id="btnAbrirModalEscuela" data-toggle="tooltip" data-placement="top" title="Nueva escuela"><i class="fas fa-school"></i></button>
                    </div>
                </div>
                <div class="card-body">
               		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet ut alias, illum voluptates, cum labore perferendis dolore. Repellendus itaque iusto, vitae pariatur earum voluptas autem numquam incidunt cumque non quas. ipsum dolor sit amet, consectetur adipisicing elit. Odit iusto quod consequatur velit voluptates nihil temporibus saepe est pariatur, commodi porro, optio sunt, ea dolores. Inventore quisquam earum labore placeat!
                </div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {

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

        
    });  
</script>
@endsection