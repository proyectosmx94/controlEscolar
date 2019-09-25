<div class="modal fade" id="editAlumno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-edit"></i> Editar alumno</h5>
            </div>
            <div class="modal-body">
                <input type="hidden" id="idAlumno">
                <div class="form-group row">
                    <div class="col-md">
                        <label>Primer apellido</label>
                        <input type="text" class="form-control mayuscula" id="editPrimerApellido">
                    </div>
                    <div class="col-md">
                        <label>Segundo apellido</label>
                        <input type="text" class="form-control mayuscula" id="editSegundoApellido">
                    </div>
                    <div class="col-md-5">
                        <label>Nombre(s)</label>
                        <input type="text" class="form-control mayuscula" id="editNombre">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-7">
                        <label>CURP</label>
                        <input type="text" class="form-control mayuscula" id="editCurpAlumno" maxlength="18">
                    </div>
                    <div class="col-md">
                        <label>Grado</label>
                        <select class="form-control" id="EditGrado">
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
                        <select class="form-control" id="EditGrupo">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnEditAlumno">Guardar</button>
            </div>
        </div>
    </div>
</div>