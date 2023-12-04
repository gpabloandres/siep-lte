<div class="box">
  <div class="box-header">
      <h3 class="box-title">Registros en total: {{ $inscripciones['total'] }}</h3>
      <div class="box-tools">
          <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
              <input type="text" name="table_search" class="form-control pull-right" placeholder="Buscar">

              <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
          </div>
      </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body table-responsive no-padding">
      <table class="table table-hover table-striped table-bordered">
          <tbody><tr>
              <th></th> <!-- Admin icon-->
              <th>DNI</th>
              <th>Alumno</th>
              <th>Fecha de nac.</th>
              <th>Telefono</th>
              <th>Direccion</th>
              <th>Estado</th>
          </tr>
          @foreach($inscripciones['data'] as $data)
          <tr>
              <td>
                  <div class="btn-group">
                      <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                          <i class="fa fa-cog"></i></button>
                      <ul class="dropdown-menu" role="menu">
                          <li>
                              <a href="{{ route('inscripciones.show',$data['inscripcion']['id']) }}">Ver trayectoria</a>
                          </li>
                          <li class="divider"></li>
                          <li><a href="{{ route('constancia.inscripcion',[$data['inscripcion']['id']]) }}" target="_blank">Constancia de inscripcion</a></li>
                          <li><a href="{{ route('constancia.regular',[$data['inscripcion']['id']]) }}" target="_blank">Constancia de alumno regular</a></li>
                          <li class="divider"></li>
                          <li>
                              <a href="{{ route('pases.create',['inscripcion_id'=>$data['inscripcion']['id'],'paso'=>3]) }}">Iniciar solicitud de pase</a>
                          </li>
                      </ul>
                  </div>
              </td>
              <td>{{ $data['inscripcion']['alumno']['persona']['documento_nro'] }}</td>
              <td>{{ $data['inscripcion']['alumno']['persona']['nombre_completo'] }}</td>
              <td>{{ \Carbon\Carbon::parse($data['inscripcion']['alumno']['persona']['fecha_nac'])->format('d/m/y') }}</td>
              <td>{{ $data['inscripcion']['alumno']['persona']['telefono_nro'] }}</td>
              <td>
                  {{ $data['inscripcion']['alumno']['persona']['calle_nombre'] }}
                  {{ $data['inscripcion']['alumno']['persona']['calle_nro'] }}
              </td>
              <td>
                  <span class="label label-{{ ($data['inscripcion']['estado_inscripcion'] == 'CONFIRMADA')? 'success' : 'warning' }}">
                      {{ $data['inscripcion']['estado_inscripcion'] }}
                  </span>
              </td>
          </tr>
          @endforeach
          </tbody>
      </table>

      @include('core.pagination',[
        'data' => $inscripciones,
        'page_link' => (isset($page_link) ? $page_link : ''),
        'page_append' => (isset($page_append) ? $page_append : '')
      ])
  </div>
  <!-- /.box-body -->
</div>
