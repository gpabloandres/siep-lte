<!-- PASO 2-->
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">
            {{ $trayectoria['persona']['nombre_completo'] }}
        </h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form>
        <div class="box-body">

            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Ciclo</td>
                    <td>Legajo</td>
                    <td>Tipo de inscripcion</td>
                    <td>Estado de inscripcion</td>
                    <td>Centro</td>
                    <td>Seccion</td>
                </tr>
                </thead>
                <tbody>
                @foreach($trayectoria['alumnos'] as $alumnos)
                    @foreach(collect($alumnos['inscripciones'])->groupBy('ciclo.nombre') as $items)
                        @foreach($items as $item)
                            <tr>
                                <td>{{ $item['ciclo']['nombre'] }}</td>
                                <td>{{ $item['legajo_nro']  }}</td>
                                <td>{{ $item['tipo_inscripcion'] }}</td>
                                <td>{{ $item['estado_inscripcion'] }}</td>
                                <td>{{ $item['centro']['nombre'] }}</td>
                                <td>
                                    @foreach($item['curso'] as $curso)
                                        {{ $curso['anio'] }}
                                        {{ $curso['division'] }}
                                        {{ $curso['turno'] }}
                                    @endforeach
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-success" href="?inscripcion_id={{ $item['id'] }}&paso=3">Seleccionar</a>
                                </td>
                        @endforeach
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    </form>
</div>
