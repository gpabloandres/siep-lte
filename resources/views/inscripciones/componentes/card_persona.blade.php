<div class="box box-primary">
    <div class="box-body box-profile">
        <h3 class="profile-username text-center">{{ $persona['nombre_completo'] }}</h3>

        <p class="text-muted text-center">{{ $persona['documento_tipo'] }} {{ $persona['documento_nro'] }}</p>

        <ul class="list-group">
            <li class="list-group-item">
                <b>Ciudad</b> <a class="pull-right">{{ $persona['ciudad']['nombre'] }}</a>
            </li>
            <li class="list-group-item">
                <b>Direccion</b> <a class="pull-right">{{ $persona['calle_nombre'] }} {{ $persona['calle_nro'] }}</a>
            </li>
            <li class="list-group-item">
                <b>Nacionalidad</b> <a class="pull-right">{{ $persona['nacionalidad'] }}</a>
            </li>
            <li class="list-group-item">
                <b>Fecha de nacimiento</b> <a class="pull-right">{{ \Carbon\Carbon::parse($persona['fecha_nac'])->format('d/m/Y') }}</a>
            </li>
            <li class="list-group-item">
                <b>Edad</b> <a class="pull-right">{{ \Carbon\Carbon::parse($persona['fecha_nac'])->age }}</a>
            </li>
        </ul>
    </div>
    <!-- /.box-body -->
</div>
