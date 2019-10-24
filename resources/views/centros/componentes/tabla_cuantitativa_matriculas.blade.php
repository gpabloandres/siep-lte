<div class="box">
  <div class="box-header">
      <h3 class="box-title">Matriculas en total: {{ $data->sum('matriculas') }}</h3>
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
              <th>Año</th>
              <th>Matriculas</th>
              <th>Promociones</th>
              <th>Repitencias</th>
              <th>Vacantes</th>
          </tr>
          @foreach($data->groupBy('anio') as $anio => $items)
              @php
                $items = collect($items);
              @endphp
          <tr>
              <td>{{ $anio }}</td>
              <td>{{ $items->sum('matriculas')  }}</td>
              <td>{{ $items->sum('promociones')  }}</td>
              <td>{{ $items->sum('repitencias')  }}</td>
              <td>{{ $items->sum('vacantes')  }}</td>
          </tr>
          @endforeach
          </tbody>
      </table>
  </div>
  <!-- /.box-body -->
</div>
