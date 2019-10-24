<div class="box">
    <div class="box-header">
        <h3 class="box-title">Secciones en total: {{ count($data) }}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover table-striped table-bordered">
            <tbody>
                <tr>
                    @foreach($data->groupBy('anio') as $anio => $items)
                        <th>{{ $anio }}</th>
                    @endforeach
                </tr>
                <tr>
                    @foreach($data->groupBy('anio') as $anio => $items)
                        @php
                            $items = collect($items);
                        @endphp
                            <td>{{ $items->count()  }}</td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>