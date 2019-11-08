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
                	<div class="form-group" align="center">
                		
					    <div class="col-md" id="fechaEstilo">
							<label id="diaSemana" class="diaSemana"></label>
							<label id="dia" class="dia"></label>
							<label>DE</label>
							<label id="mes" class="mes"></label>
							<label>DE</label>
							<label id="anio" class="anio"></label>
					    </div>
					    
					    <div class="col-md" id="horaEstilo">
							<label id="horas" class="horas"></label>
							<label>:</label>
							<label id="minutos" class="minutos"></label>
							<label>:</label>
							<label id="segundos" class="segundos"></label>
							<label id="ampm" class="ampm"></label>
					    </div>
					    
                	</div>

                	<div class="form-group" align="center">
                		<div class="col-sm-4">
                			<input type="text" class="form-control" id="curp" maxlength="18" style="text-align: center;">
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
		$('#curp').focus().select();

		toastr.options = {
		    positionClass: 'toast-top-center'
		};
		$("#curp").change(function(){
			var curp= $(this).val();

			if (curp.length ==18) {
				$.ajax({		
					url: 'storeControl',
					type: 'get',
					data: {curp: curp},
					success: function(data){
						$("#curp").val('');
						$('#curp').focus().select();
						if (data =="registrado") {
							toastr.success('Acceso correcto');
						}else{
							$("#curp").val('');
							toastr.error('Alumno no registrado. Consulte al administrador');
						}
			        },
			        error: function(data){
			            $("#curp").val('');
			            toastr.error('Alumno no registrado. Consulte al administrador');
			            $('#curp').focus().select();
			        }
    			});
			}else{
				toastr.error('Código invalido');
				$("#curp").val('');
				$('#curp').focus().select();
			}
		});

	

		$(function(){
  		var actualizarHora = function(){
	    var fecha = new Date(),
	        hora = fecha.getHours(),
	        minutos = fecha.getMinutes(),
	        segundos = fecha.getSeconds(),
	        diaSemana = fecha.getDay(),
	        dia = fecha.getDate(),
	        mes = fecha.getMonth(),
	        anio = fecha.getFullYear(),
	        ampm;
    
	    var $pHoras = $("#horas"),
	        $pSegundos = $("#segundos"),
	        $pMinutos = $("#minutos"),
	        $pAMPM = $("#ampm"),
	        $pDiaSemana = $("#diaSemana"),
	        $pDia = $("#dia"),
	        $pMes = $("#mes"),
	        $pAnio = $("#anio");

	    var semana = ['DOMINGO','LUNES','MARTES','MIÉRCOLES','JUEVES','VIERNES','SÁBADO'];
	    var meses = ['ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];
    
	    $pDiaSemana.text(semana[diaSemana]);
	    $pDia.text(dia);
	    $pMes.text(meses[mes]);
	    $pAnio.text(anio);
	    if(hora>=12){
	      hora = hora - 12;
	      ampm = "PM";
	    }else{
	      ampm = "AM";
	    }
	    if(hora == 0){
	      hora = 12;
	    }
	    if(hora<10){$pHoras.text("0"+hora)}else{$pHoras.text(hora)};
	    if(minutos<10){$pMinutos.text("0"+minutos)}else{$pMinutos.text(minutos)};
	    if(segundos<10){$pSegundos.text("0"+segundos)}else{$pSegundos.text(segundos)};
	    $pAMPM.text(ampm);
    
  		};
  
  
		  	actualizarHora();
		  	var intervalo = setInterval(actualizarHora,1000);

		  	$("#fechaEstilo").attr('style', 'font-size:2rem; font-weight:bolder');
		  	$("#horaEstilo").attr('style', 'font-size:5rem; font-weight:bolder; margin-top:-35px');
		});
		
	});	
</script>  