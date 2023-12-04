@extends('core.layout')

@section('contenido')
    <!-- Breadcrumb -->
    <section class="content-header">
        <h1>
            {{ strtoupper($user['username']) }}
            <small>Informacion de usuario</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Administracion</a></li>
            <li><a href="{{ route('admin') }}">Usuarios </a></li>
            <li class="active">Informacion de usuario</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#infogeneral" data-toggle="tab">Informacion general</a></li>
                        <li><a href="#acciones" data-toggle="tab">Acciones</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="infogeneral">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-3 control-label">Usuario</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputName" placeholder="Nombre de usuario" value="{{ $user['username'] }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-3 control-label">Email</label>

                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email" value="{{ $user['email'] }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputNuevaClave" class="col-sm-3 control-label">Nueva clave</label>

                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="inputNuevaClave" placeholder="Nueva clave">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputNuevaClaveC" class="col-sm-3 control-label">Confirmar nueva clave</label>

                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="inputNuevaClaveC" placeholder="Confirmar nueva clave">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success">Guardar cambios</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="acciones">
                            <div class="callout callout-info">
                                <p>
                                    El usuario no ha realizado acciones.
                                </p>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <div class="col-md-3">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Roles</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @forelse($user['acl']['roles'] as $rol)
                            <span class="label label-info" style="font-size: 14px;">
                                    {{ $rol }}
                                <i class="fa fa-times"></i>
                                </span>
                        @empty
                            <div class="callout callout-info">
                                <p>
                                    No hay roles asignados.
                                </p>
                            </div>
                        @endforelse
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Permisos</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @forelse($user['acl']['permisos'] as $permiso)
                            <span class="label label-info" style="font-size: 14px;">
                                    {{ $permiso }}
                                <i class="fa fa-times"></i>
                            </span>
                        @empty
                            <div class="callout callout-info">
                                <p>
                                    No hay permisos asignados.
                                </p>
                            </div>
                        @endforelse
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
