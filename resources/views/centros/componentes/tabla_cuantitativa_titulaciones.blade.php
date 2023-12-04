<div class="box">
  <div class="box-header">
      <h3 class="box-title">Titulaciones</h3>
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
              <th>Años</th>
          </tr>
          @foreach($secciones->groupBy('titulacion') as $titulacion => $items)
              @php
                $items = collect($items);
              @endphp
          <tr>
              <td>{{ $titulacion }}</td>
              <td>
                  @foreach($items->groupBy('anio') as $titulacion_anio => $titulacion_items)
                      <span class="label label-default" style="font-size:12px;">{{ $titulacion_anio }}</span>
                  @endforeach
              </td>
          </tr>
          @endforeach
          </tbody>
      </table>
  </div>
  <!-- /.box-body -->
</div>
