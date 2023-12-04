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
      <div class="box-tools">
          <form method="POST" action="{{ route("{$route}.store") }}">
          @csrf
            <div class="input-group input-group-sm hidden-xs" style="width: 200px;">
                  <input type="text" name="name" class="form-control pull-right" placeholder="Ingresar nombre">

                  <div class="input-group-btn">
                      <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Agregar</button>
                  </div>
            </div>
          </form>
      </div>
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
                    <td>{{ $item['name'] }}</td>
                    <td style="width: 50px">
                        <a href="{{ url("admin/{$route}/delete",$item['id']) }}" class="btn btn-sm btn-default btn-block"><i class="fa fa-edit"></i></a>
                    </td>
                    <td style="width: 50px">
                        <form method="POST" action="{{ url("admin/{$route}",$item['id']) }}">
                            @csrf
                            {{ method_field('DELETE') }}

                            <div class="form-group">
                                <input type="submit" class="btn btn-sm btn-danger" value="Borrar">
                            </div>
                        </form>
                    </td>
                </tr>
              @endforeach
          </tbody>
      </table>
  </div>
  <!-- /.box-body -->
</div>
@endif