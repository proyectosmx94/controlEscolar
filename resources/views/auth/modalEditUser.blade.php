<div class="modal fade" id="editUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-edit"></i> Editar usuario</h5>
            </div>
            <div class="modal-body">
                <input type="hidden" id="idUser">
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>Nombre</label>
                    </div>
                    <div class="col-md">
                        <input type="text" class="form-control mayuscula" id="editNombreUsuario">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-3">
                        <label>Correo electrónico</label>
                    </div>
                    <div class="col-md">
                        <input type="email" class="form-control mayuscula" id="editMailUsuario">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-3">
                        <label>Nueva contraseña</label>
                    </div>
                    <div class="col-md">
                        <input type="text" class="form-control" id="editPasswordUsuario">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-3">
                        <label>Escuela</label>
                    </div>
                    <div class="col-md">
                        <select class="form-control" id="idEscuela">
                                    
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnEditUser">Guardar</button>
            </div>
        </div>
    </div>
</div>