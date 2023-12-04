@php
    // Configuracion inicial del componente
    $total = 0;
    $data = [];
    $search = $table_name."_table_search";
    $link = $table_name."_table_page";

    if(!isset($table_name)) {
        $table_name = rand(0,10000000);
    }

    $route = strtolower($titulo);

    if(count($items) && !isset($items['error'])) {
        $total = $items['total'];
        $data = $items['data'];
        $resource = 'users';
    }
@endphp

@if(isset($items['error']))
    <p>
        Respuesta de API
    </p>
   <code>{{ $items['error'] }}</code>
@endif

@if(!isset($items['error']))
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ $titulo }} en total: {{ $total }}</h3>
            <div class="box-tools">
                <form class="GET" action="?">
                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                        <input type="text" name="{{ $search }}" class="form-control pull-right" placeholder="Buscar">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
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
                    <th>Usuario</th>
                    <th>Rol</th>
                    <th>Puesto</th>
                    <th>Email</th>
                    <th>Centro</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $item)
                    <tr>
                        <td style="width: 50px">{{ $item['id'] }}</td>
                        <td>{{ $item['username'] }}</td>
                        <td>{{ $item['role'] }}</td>
                        <td>{{ $item['puesto'] }}</td>
                        <td>{{ $item['email'] }}</td>
                        <td>{{ $item['centro']['nombre'] }}</td>

                        @rol('superadmin')
                        <td style="width: 50px">
                            <a href="{{ url("admin/{$resource}",$item['id']) }}" class="btn btn-sm btn-default btn-block"><i class="fa fa-edit"></i></a>
                        </td>
                        <td style="width: 50px">
                            <a href="{{ url("admin/{$resource}",$item['id']) }}" class="btn btn-sm btn-danger btn-block"><i class="fa fa-trash"></i></a>
                        </td>
                        @endrol
                    </tr>
                @endforeach
                </tbody>
            </table>

            @include('core.pagination',[
              'data' => $items,
              'page_link' => $link
            ])
        </div>
        <!-- /.box-body -->
    </div>
@endif

