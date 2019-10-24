<div class="box box-default">
    <div class="box-body box-profile">
        <h3 class="profile-username text-center">{{ $familiar['persona']['nombre_completo'] }}</h3>

        <p class="text-muted text-center">{{ $familiar['vinculo'] }}</p>

        <div class="callout callout-success">
            Autorizado a retirar
        </div>
        <ul class="list-group">
            <li class="list-group-item">
                <b>Ciudad</b> <a class="pull-right">{{ $familiar['persona']['ciudad']['nombre'] }}</a>
            </li>
            <li class="list-group-item">
                <b>Direccion</b> <a class="pull-right">{{ $familiar['persona']['calle_nombre'] }} {{ $familiar['persona']['calle_nro'] }}</a>
            </li>
            <li class="list-group-item">
                <b>Telefono</b> <a class="pull-right">{{ $familiar['persona']['telefono_nro'] }}</a>
            </li>
            <li class="list-group-item">
                <b>Email</b> <a class="pull-right">{{ $familiar['persona']['email'] }}</a>
            </li>
        </ul>
    </div>
    <!-- /.box-body -->
</div>
