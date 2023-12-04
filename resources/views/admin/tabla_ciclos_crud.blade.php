@php
    $route = strtolower($titulo);
@endphp
@if(isset($items['error']))
    <p>
        Respuesta de API
    </p>
    <code>{{ $items['error'] }}</code>
@else
<div class="box">
  <div class="box-header">
      <h3 class="box-title">{{ $titulo }} en total: {{ count($items) }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body table-responsive no-padding">
      <table class="table table-hover table-striped table-bordered">
          <thead>
          <tr>
              <th>ID</th>
              <th>Nombre</th>
          </tr>
          </thead>
          <tbody>
              @foreach($items as $item)
                <tr>
                    <td style="width: 50px">{{ $item['id'] }}</td>
                    <td>{{ $item['nombre'] }}</td>
                    <td style="width: 50px">
                        <a href="{{ url("admin/{$route}/delete",$item['id']) }}" class="btn btn-sm btn-default btn-block"><i class="fa fa-edit"></i></a>
                    </td>
                    <td style="width: 50px">
                        <a href="{{ url("admin/{$route}/delete",$item['id']) }}" class="btn btn-sm btn-danger btn-block"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
              @endforeach
          </tbody>
      </table>
  </div>
  <!-- /.box-body -->
</div>
@endif