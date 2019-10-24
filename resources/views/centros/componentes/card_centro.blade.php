@php
    $matriculas = $secciones->sum('matriculas');
    $plazas = $secciones->sum('plazas');
    try {
        $matriculas_porcent = $matriculas * 100 /  $plazas ;
    } catch (Exception $ex){
        $matriculas_porcent = 0;
    }
@endphp
<div class="box box-primary">
    <div class="box-body">
        <div class="progress-group">
            <span class="progress-text">Matriculas</span>
            <span class="progress-number"><b>{{ $matriculas }}</b> de {{ $plazas }}</span>

            <div class="progress sm">
                <div class="progress-bar progress-bar-aqua" style="width: {{ $matriculas_porcent  }}%"></div>
            </div>
        </div>
        <hr>
        <h4>Informacion del centro</h4>
        <strong>Ciudad</strong>
        <p class="text-muted">{{ $centro['ciudad']['nombre'] }}</p>

        <strong>Direccion</strong>
        <p class="text-muted">{{ $centro['direccion'] }}</p>

        <strong>Telefono</strong>
        <p class="text-muted">{{ $centro['telefono'] }}</p>

        <strong>Email</strong>
        <p class="text-muted">{{ $centro['email'] }}</p>

        <strong>Nivel de servicio</strong>
        <p>{{ $centro['nivel_servicio'] }}</p>
    </div>    <!-- /.box-body -->
</div>
