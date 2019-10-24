@php
    $nivel_servicio = null;
    $años = null;
    $años = null;
    $turnos = null;
    $tipos= null;
@endphp
<div class="box box-solid">
    <form method="GET" action="{{ $action }}">
    <div class="box-header with-border">
        <h3 class="box-title">Filtros</h3>
    </div>
    <div class="box-body">
        @isset($ciclos)
        <div class="form-group">
            <label>Ciclo</label>
            <select name="ciclo" class="form-control">
                @foreach($ciclos as $item)
                    <option value="{{ $item['nombre'] }}" @if($item['nombre']==$ciclo) selected="selected" @endif>{{ $item['nombre'] }}</option>
                @endforeach
            </select>
        </div>
        @endisset

        @isset($estado_inscripcion)
        <div class="form-group">
            <label>Estado inscripcion</label>
            <select name="estado_inscripcion" class="form-control">
                <option value="">- Estado de inscripcion -</option>
                <option value="CONFIRMADA" @if($estado_inscripcion=='CONFIRMADA') selected="selected" @endif>CONFIRMADA</option>
                <option value="NO CONFIRMADA" @if($estado_inscripcion=='NO CONFIRMADA') selected="selected" @endif>NO CONFIRMADA</option>
                <option value="BAJA" @if($estado_inscripcion=='BAJA') selected="selected" @endif>BAJA</option>
            </select>
        </div>
        @endif

        @isset($anios)
        <div class="form-group">
            <label>Año</label>
            <select name="anio" class="form-control">
                @foreach($años as $item)
                    <option value="{{ $item['nombre'] }}" @if($item['nombre']==$ciclo) selected="selected" @endif>{{ $item['nombre'] }}</option>
                @endforeach
            </select>
        </div>
        @endif

        @isset($turnos)
        <div class="form-group">
            <label>Turno</label>
            <select name="turno" class="form-control">
                @foreach($turnos as $item)
                    <option value="{{ $item['nombre'] }}" @if($item['nombre']==$ciclo) selected="selected" @endif>{{ $item['nombre'] }}</option>
                @endforeach
            </select>
        </div>
        @endif

        @isset($tipos)
        <div class="form-group">
            <label>Tipo</label>
            <select name="tipo" class="form-control">
                @foreach($tipos as $item)
                    <option value="{{ $item['nombre'] }}" @if($item['nombre']==$ciclo) selected="selected" @endif>{{ $item['nombre'] }}</option>
                @endforeach
            </select>
        </div>
        @endif

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" class="btn btn-success pull-right">Aplicar</button>
    </div>
    <!-- /.box-footer-->
    </form>
</div>
