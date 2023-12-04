@php
    if(isset($data['meta'])){
        $total = $data['meta']['total'];
    } else {
        $total = $data['total'];
    }
@endphp
<div class="box">
  <div class="box-header">
      <h3 class="box-title">Registros en total: {{ $total }}</h3>
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
              <th>Nombre</th>
              <th>Desde</th>
              <th>Hacia</th>
          </tr>
          @foreach($data['data'] as $dt)
          <tr>
              <td>{{ $dt['inscripcion']['persona']['nombre_completo'] }}</td>
              <td>
                  <b>
                      {{ $dt['actual']['centro']['nombre'] }}
                  </b>
                  <br>
                  {{ $dt['actual']['curso']['anio'] }}
                  {{ $dt['actual']['curso']['division'] }}
                  {{ $dt['actual']['curso']['turno'] }}
              </td>
              <td>
                  <b>
                      {{ $dt['anterior']['centro']['nombre'] }}
                  </b>
                  <br>
                  {{ $dt['anterior']['curso']['anio'] }}
                  {{ $dt['anterior']['curso']['division'] }}
                  {{ $dt['anterior']['curso']['turno'] }}
              </td>
              <td>
                  <a href="{{ url('inscripciones',$dt['inscripcion']['id']) }}" class="btn btn-sm btn-default"><i class="fa fa-eye"></i></a>
              </td>
          </tr>
          @endforeach
          </tbody>
      </table>

      @include('core.pagination',[
        'data' => $data
      ])
  </div>
  <!-- /.box-body -->
</div>
