<div class="box">
  <div class="box-header">
		<h3 class="box-title">Registros en total: {{ count($data) }}
			<span id="vuelte" style="margin-left:30px;">
				@php 
					$query = new \stdClass;
					$query->centro_id = $id;
					$query->ciclo = $ciclo;
				@endphp
				<secciones-exportar :query="{{ json_encode($query) }}"></secciones-exportar>
			</span>
		</h3>
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
              <th>Division</th>
              <th>Turno</th>
              <th>Tipo</th>
              <th>Plazas</th>
              <th>Matriculas</th>
              <th>Vacantes</th>
              <th>Varones</th>
              <th>Confirmadas</th>
          </tr>
          @foreach($data as $dt)
              <tr class="{{ ($dt['confirmadas_excede_plaza']) ? 'danger': '' }}">
              <td>{{ $dt['anio'] }}</td>
              <td>{{ $dt['division'] }}</td>
              <td>{{ $dt['turno'] }}</td>
              <td>{{ $dt['tipo'] }}</td>
              <td>{{ $dt['plazas'] }}</td>
              <td>{{ $dt['matriculas'] }}</td>
              <td>{{ $dt['vacantes'] }}</td>
              <td>{{ $dt['varones'] }}</td>
              <td>{{ $dt['confirmadas'] }}</td>
              <td>
                  <a href="{{ route('secciones.show',[
                        'curso_id'=>$dt['curso_id'],
                        'ciclo'=>$ciclo
                      ]) }}" class="btn btn-sm btn-primary btn-block"><i class="fa fa-eye"></i>
              </td>
          </tr>
          @endforeach
          </tbody>
      </table>

  </div>
  <!-- /.box-body -->
</div>
