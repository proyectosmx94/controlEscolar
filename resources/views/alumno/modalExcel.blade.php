<style>
    div.upload {
        background-color:#fff;
        border: 1px solid #ddd;
        border-radius:5px;
        display:inline-block;
        height: 40px;
        padding:3px 40px 3px 3px;
        position:relative;
        width: 100%;
    }

    div.upload:hover {
        opacity:0.95;
    }

    div.upload input[type="file"] {
        display: input-block;
        width: 100%;
        height: 30px;
        opacity: 0;
        cursor:pointer;
        position:absolute;
        left:0;
    }

    .uploadButton {
        background-color: #32AB67;
        border: none;
        border-radius: 3px;
        color: #FFF;
        cursor:pointer;
        display: inline-block;
        height: 30px;
        margin-right:15px;
        width: auto;
        padding:0 30px;
        box-sizing: content-box;
    }

    .fileName {
        font-family: Arial;
        font-size:14px;
    }

    #obligatorio{
        color:red;
        font-weight: bolder;
    }
</style>
<div class="modal fade" id="cargarExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-file-excel"></i> Importar desde excel</h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <span>El archivo de Excel deberá de contar con las siguientes columnas. </span><span style="color: red;">* Campos obligatorios</span><br>
                    <table class="table table-bordered" style="font-size: 0.6rem">
                        <thead>
                            <tr>
                                <td>curp</td>
                                <td>primerApellido<span id="obligatorio">*</span></td>
                                <td>segundoApellido<span id="obligatorio">*</span></td>
                                <td>nombre<span id="obligatorio">*</span></td>
                                <td>grado<span id="obligatorio">*</span></td>
                                <td>grupo<span id="obligatorio">*</span></td>
                                <td>nombreTutor</td>
                                <td>telefonoTutor</td>
                                <td>correoTutor</td>
                                <td>idRfid<span id="obligatorio">*</span></td>
                                <td>idEscuela<span id="obligatorio">*</span></td>
                            </tr>
                        </thead>
                    </table>
                    <span style="font-weight: bolder">Nota: </span><span>El campo "idRfid" es el número que arroja el sticker circular</span>
                    
                    <br><br>
                    <label>Seleccionar documento excel</label>
                    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="upload">
                        <input type="button" class="uploadButton" value="Buscar" />
                        <input type="file" name="file" accept=".xlsx, .xls, .csv" id="fileUpload" />
                        <span class="fileName">Seleccionar archivo</span>
                    </div>
                </div>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>