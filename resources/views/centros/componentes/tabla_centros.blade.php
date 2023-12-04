<div class="box">
  <div class="box-header">
      <h3 class="box-title">Registros en total: {{ count($data) }}</h3>
      <div class="box-tools">
          <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
              <input type="text" id="search_tabla_centros" class="form-control pull-right" placeholder="Buscar">

              <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
          </div>
      </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body table-responsive no-padding">
      <table id="tabla_centros" class="table table-bordered table-hover">
          <thead>
          <tr>
              <th></th>
              <th>Centro</th>
              <th>Sector</th>
              <th>Nivel de Servicio</th>
              <th>Ciudad</th>
              <th>Telefono</th>
              <th>Email</th>
          </tr>
          </thead>
          <tbody>
              @foreach($data as $dt)
                  <tr>
                      <td>
                          <a href="{{ route('centros.show',$dt['id']) }}" class="btn btn-sm btn-primary btn-block"><i class="fa fa-eye"></i></a>
                      </td>
                      <td>{{ $dt['nombre'] }}</td>
                      <td>{{ $dt['sector'] }}</td>
                      <td>{{ $dt['nivel_servicio'] }}</td>
                      <td>{{ $dt['ciudad']['nombre'] }}</td>
                      <td>{{ $dt['telefono'] }}</td>
                      <td>{{ $dt['email'] }}</td>
                  </tr>
              @endforeach
          </tbody>
      </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->

@section('endcss')
    <!-- page css -->
    <style>
        .tabla_bottom {
            padding:5px;
        }
    </style>
@endsection

@section('endjs')
<!-- page script -->
<script>
    $(function () {
        var el_tabla_centros = $('#tabla_centros').DataTable({
            "columnDefs": [
                { "orderable": false, "targets": 0 }
            ],
            "dom":' <"search"fl><"top"l>rt<"tabla_bottom"ip><"clear">',
            "order": [[ 1, "asc" ]],
            'paging'      : true,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : true,
            'info'        : false,
            'autoWidth'   : false
        });

        $('.dataTables_filter').hide();
        $('#search_tabla_centros').on( 'keyup', function () {
            el_tabla_centros.search( this.value ).draw();
        } );
    })
</script>
@endsection
