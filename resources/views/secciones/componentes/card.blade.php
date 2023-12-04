<div class="box box-primary">
    <div class="box-body box-profile">
        <h3 class="profile-username text-center">
            <a href="{{ route('centros.show',$seccion['centro']['id']) }}">{{ $seccion['centro']['nombre'] }}</a>
        </h3>

        <ul class="list-group">
            <li class="list-group-item">
                <b>Anio</b> <a class="pull-right">{{ $seccion['anio'] }}</a>
            </li>
            <li class="list-group-item">
                <b>Division</b> <a class="pull-right">{{ $seccion['division'] }}</a>
            </li>
            <li class="list-group-item">
                <b>Turno</b> <a class="pull-right">{{ $seccion['turno'] }}</a>
            </li>
            <li class="list-group-item">
                <b>Plazas</b> <a class="pull-right">{{ $seccion['plazas'] }}</a>
            </li>
            <li class="list-group-item">
                <b>Tipo</b> <a class="pull-right">{{ $seccion['tipo'] }}</a>
            </li>
        </ul>
    </div>
    <!-- /.box-body -->
</div>
