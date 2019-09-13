@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Panel de control</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="form-group row" align="center">
                        <div class="col-sm" style="padding-bottom: 1rem">
                            <a class="btn btn-primary btn-block" data-toggle="tooltip" data-placement="top" title="Iniciar control" href="control"><label style="font-size: 2rem; font-weight: bolder;">Iniciar control</label> 
                            <br><i class="fas fa-barcode" style="font-size: 5rem;"></i>
                            </a>
                        </div>
                        
                        <div class="col-sm" style="padding-bottom: 1rem">
                            <a class="btn btn-primary btn-block" data-toggle="tooltip" data-placement="top" title="Administrar alumnos" href="alumno"><label style="font-size: 2rem; font-weight: bolder;">Alumnos</label> 
                            <br><i class="fas fa-users" style="font-size: 5rem;"></i>
                            </a>
                        </div>

                        <div class="col-sm" style="padding-bottom: 1rem">
                            <a class="btn btn-primary btn-block" data-toggle="tooltip" data-placement="top" title="Escuelas" href="escuela"><label style="font-size: 2rem; font-weight: bolder;">Escuelas</label> 
                            <br><i class="fas fa-school" style="font-size: 5rem;"></i>
                            </a>
                        </div>

                        <div class="col-sm" style="padding-bottom: 1rem">
                            <a class="btn btn-primary btn-block" data-toggle="tooltip" data-placement="top" title="Administrar usuarios del sistema" href="usuariosIndex"><label style="font-size: 2rem; font-weight: bolder;">Usuarios</label> 
                            <br><i class="fas fa-users-cog" style="font-size: 5rem;"></i>
                            </a>
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