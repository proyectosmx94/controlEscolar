<div class="modal fade" id="editarEscuela" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-edit"></i> Editar escuela</h5>
            </div>
            <div class="modal-body">
                <input type="hidden" id="idEscuela">
                <div class="form-group row">
                    <div class="col-md">
                        <label>Nombre de la escuela</label>
                        <input type="text" class="form-control mayuscula" id="editNombreEscuela">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md">
                        <label>Clave</label>
                        <input type="text" class="form-control mayuscula" id="editClave">
                    </div>
                    <div class="col-md">
                        <label>Turno</label>
                        <select class="form-control" id="editTurno">
                            <option value="MATUTINO">MATUTINO</option>
                            <option value="VESPERTINO">VESPERTINO</option>
                        </select>
                    </div>
                    <div class="col-md">
                        <label>Nivel</label>
                        <select class="form-control" id="editNivel">
                            <option value="PRIMARIA">PRIMARIA</option>
                            <option value="SECUNDARIA">SECUNDARIA</option>
                            <option value="BACHILLERATO">BACHILLERATO</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnEditEscuela">Guardar</button>
            </div>
        </div>
    </div>
</div>