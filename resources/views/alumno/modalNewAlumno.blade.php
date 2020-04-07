<div class="modal fade" id="nuevoAlumno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-plus"></i> Registrar nuevo alumno</h5>
            </div>
            <div class="modal-body">
                <h5 style="font-weight: bold;">Datos del alumno</h5>
                <div class="form-group row">
                    <div class="col-md">
                        <label>Nombre(s)</label>
                        <input type="text" class="form-control mayuscula" id="nombre">
                    </div>
                    <div class="col-md">
                        <label>Primer apellido</label>
                        <input type="text" class="form-control mayuscula" id="primerApellido">
                    </div>
                    <div class="col-md">
                        <label>Segundo apellido</label>
                        <input type="text" class="form-control mayuscula" id="segundoApellido">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md">
                        <label>CURP</label>
                        <input type="text" class="form-control mayuscula" id="curpAlumno" maxlength="10">
                    </div>
                    <div class="col-md">
                        <label>Grado</label>
                        <select class="form-control" id="grado">
                            <option value="PRIMERO">PRIMERO</option>
                            <option value="SEGUNDO">SEGUNDO</option>
                            <option value="TERCERO">TERCERO</option>
                            <option value="CUARTO">CUARTO</option>
                            <option value="QUINTO">QUINTO</option>
                            <option value="SEXTO">SEXTO</option>
                        </select>
                    </div>
                    <div class="col-md">
                        <label>Grupo</label>
                        <select class="form-control" id="grupo">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-8">
                        <label>Número de identificación</label>
                        <input type="text" class="form-control" maxlength="10" minlength="10" id="idRfid">
                    </div>
                </div>

                <hr>
                <span style="font-weight: bold; font-size: 1.2rem">Datos del tutor. </span><span>(No obligatorios)</span>
                <div class="form-group row">
                    <div class="col">
                        <label>Nombre del tutor</label>
                        <input type="text" class="form-control mayuscula" id="nombreTutor">
                    </div>
                    <div class="col">
                        <label>Teléfono del tutor</label>
                        <input type="text" class="form-control mayuscula" id="telefonoTutor">
                    </div>
                    <div class="col">
                        <label>Correo del tutor</label>
                        <input type="text" class="form-control mayuscula" id="correoTutor">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnGuardarAlumno">Guardar</button>
            </div>
        </div>
    </div>
</div>