@extends('layouts.app')
@section('content')
<style>
	.toast-top-center {
	    top: 12px;
	    left:50%;
	    margin:0 0 0 -150px;
	}
</style>
<link href="{{ asset('plugins/Toastr/css/toastr.css') }}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Control de alumnos</div>
                <div class="card-body">
                	<div style="text-align:center;padding:1em 0;"> <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=es&size=large&timezone=America%2FMexico_City" width="100%" height="140" frameborder="0" seamless></iframe> </div>

                	<div class="form-group" align="center">
                		<div class="col-sm-4">
                			<input type="text" class="form-control" id="prueba">
                		</div>
                	</div>
                </div>
			</div>
		</div>
	</div>
</div>	
@endsection
<script src="{{ asset('plugins/jQuery/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('plugins/Bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('plugins/Bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/Font_awesome/js/all.js') }}"></script>
<script src="{{ asset('plugins/Toastr/js/toastr.min.js') }}"></script>
<script>
	$(document).ready(function() {
		toastr.options = {
		    positionClass: 'toast-top-center'
		};
		$("#prueba").change(function(){
			var curp= $(this).val();

			if (curp.length ==18) {
				$.ajax({		
					url: 'storeControl',
					type: 'get',
					data: {curp: curp},
					success: function(data){
						$("#prueba").val('');
						console.log("Bien");
			        },
			        error: function(data){
			            $("#prueba").val('');
			            // toastr.error('Alumno no registrado. Consulte al administrador');
			        }
    			});
			}else{
				toastr.error('Código invalido');
			}
		});

		//Asignar fecha
		var d = new Date();
		var month = d.getMonth()+1;
		var day = d.getDate();

		var output = ((''+day).length<2 ? '0' : '') + day+'/'+
	    ((''+month).length<2 ? '0' : '') + month + '/'+
	    d.getFullYear();

		$("#idFecha").append(output);

		//Asignar hora
	});	
</script>