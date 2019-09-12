<div class="modal fade" id="nuevaEscuela" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-plus"></i> Registrar nueva escuela</h5>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <div class="col-md">
                        <label>Nombre de la escuela</label>
                        <input type="text" class="form-control mayuscula" id="nombreEscuela">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md">
                        <label>Clave</label>
                        <input type="text" class="form-control mayuscula" id="clave">
                    </div>
                    <div class="col-md">
                        <label>Turno</label>
                        <select class="form-control" id="turno">
                            <option value="MATUTINO">MATUTINO</option>
                            <option value="VESPERTINO">VESPERTINO</option>
                        </select>
                    </div>
                    <div class="col-md">
                        <label>Nivel</label>
                        <select class="form-control" id="nivel">
                            <option value="PRIMARIA">PRIMARIA</option>
                            <option value="SECUNDARIA">SECUNDARIA</option>
                            <option value="BACHILLERATO">BACHILLERATO</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnGuardarEscuela">Guardar</button>
            </div>
        </div>
    </div>
</div>