@isset($inscripcion['promocion_id'])
<div class="col-sm-12">
    <div class="description-block">
        <span class="description-text">Promocion: #{{ $inscripcion['promocion_id'] }}</span>
    </div>
    <!-- /.description-block -->
</div>
<!-- /.col -->
@endisset
@isset($inscripcion['repitencia_id'])
<div class="col-sm-12">
    <div class="description-block">
        <span class="description-text">Repitencia: #{{ $inscripcion['repitencia_id'] }}</span>
    </div>
    <!-- /.description-block -->
</div>
<!-- /.col -->
@endisset

@if(!empty($inscripcion['tipo_baja']))
    <div class="col-sm-12">
        <div class="description-block">
            <span class="description-text">Tipo: {{ $inscripcion['tipo_baja'] }}</span>
        </div>
        <!-- /.description-block -->
    </div>
@endif

@isset($inscripcion['fecha_baja'])
<div class="col-sm-12">
    <div class="description-block">
        <span class="description-text">Fecha: {{ $inscripcion['fecha_baja'] }}</span>
    </div>
    <!-- /.description-block -->
</div>
@endisset

@if(!empty($inscripcion['motivo_baja']))
    <div class="col-sm-12">
        <div class="description-block">
            <span class="description-text">Motivo: {{ $inscripcion['motivo_baja'] }}</span>
        </div>
        <!-- /.description-block -->
    </div>
@endif

@if(!empty($inscripcion['observaciones']))
    <div class="col-sm-12">
        <div class="description-block">
            <span class="description-text">Observaciones: {{ $inscripcion['observaciones'] }}</span>
        </div>
        <!-- /.description-block -->
    </div>
@endif