<!-- PASO 3-->
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">
            Solicitud de pase
        </h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form method="POST" action="{{ route('pases.store') }}">
        @csrf
        <input type="hidden" name="inscripcion_id" value="{{ $inscripcion['inscripcion']['id'] }}">
        <input type="hidden" name="centro_id" value="{{ $inscripcion['inscripcion']['centro']['id'] }}">
        <input type="hidden" name="ciclo" value="{{ $inscripcion['inscripcion']['ciclo']['nombre'] }}">
        <div class="box-body">
            <div class="box box-widget widget-user">
                <div class="widget-user-header bg-blue-active">
                  <span class="pull-right">
                      <small>
                        Ciclo: {{ $inscripcion['inscripcion']['ciclo']['nombre'] }}
                      </small>
                  </span>
                    <h5 class="widget-user-desc">{{ $inscripcion['inscripcion']['alumno']['persona']['nombre_completo'] }}</h5>
                    <h4>{{ $inscripcion['inscripcion']['centro']['nombre'] }}</h4> <div>
                        {{ $inscripcion['curso']['anio'] }}
                        {{ $inscripcion['curso']['division'] }}
                        {{ $inscripcion['curso']['turno'] }}
                    </div>
                </div>
            </div>

            @if(count($inscripcion['inscripcion']['alumno']['familiares'])>0)
                <div class="form-group">
                    <select class="form-control" name="familiar_id" autocomplete="off">
                        <option>- Seleccionar un familiar -</option>
                        @foreach($inscripcion['inscripcion']['alumno']['familiares'] as $item)
                            <option value="{{ $item['familiar']['id'] }}">
                                {{ $item['familiar']['persona']['nombre_completo'] }} ({{ $item['familiar']['vinculo']  }})
                            </option>
                        @endforeach
                    </select>
                </div>
                @else
                <div class="alert alert-warning alert-dismissible">
                    <h4><i class="icon fa fa-warning"></i> Atencion</h4>
                    El alumno no tiene familiares relacionados, debe asignar uno para continuar. <a href="{{ route('inscripciones.show',$inscripcion['inscripcion']['id']) }}#familiares">Click acá para asignar familiar</a>
                </div>
            @endif

            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Formulario de solicitud</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Centro destino principal</label>
                                @include('widget.autocomplete_centros',['name'=>'centro_id_destino_a'])
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Centro destino secundario</label>
                                @include('widget.autocomplete_centros',['name'=>'centro_id_destino_b'])
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select class="form-control" name="anio" autocomplete="off">
                                    <option>- Seleccionar año -</option>
                                    @php
                                        $anios = [
                                            'Sala de 3 años',
                                            'Sala de 4 años',
                                            'Sala de 5 años',
                                            '1ro',
                                            '2do',
                                            '3ro',
                                            '4to',
                                            '5to',
                                            '6to',
                                            '7mo',
                                            '8vo',
                                            '9no',
                                            '10mo',
                                            '11ro',
                                        ]
                                    @endphp
                                    @foreach($anios as $anio)
                                        <option value="{{ $anio}}">{{ $anio }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select class="form-control" name="tipo" autocomplete="off">
                                    <option>- Seleccionar tipo -</option>
                                    <option value="ingreso">Ingreso a la provincia</option>
                                    <option value="egreso">Egreso de la provincia</option>
                                    <option value="dentro">Pase local</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select class="form-control" name="motivo" autocomplete="off">
                                    <option>- Seleccionar motivo -</option>
                                    @php
                                        $motivos = [
                                            'Otro',
                                            'Mudanza de la familia',
                                            'Pasó a educación de jóvenes y adultos',
                                            'No especifica',
                                            'Dificultad de transporte',
                                            'Tenía muchas materias previas',
                                            'Problemas de salud',
                                            'No le gustaba la escuela',
                                            'Cambio en la situación económica',
                                            'Decisión de la escuela',
                                            'Decisión de la institución',
                                            'Pasó a educación especial',
                                            'Problemas de adaptación',
                                            'Comenzó a trabajar',
                                            'Quedó embarazada'
                                        ]
                                    @endphp
                                    @foreach($motivos as $motivo)
                                        <option value="{{ $motivo }}">{{ $motivo }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class=col-sm-6>
                            <!-- Fecha de vencimiento -->
                            <div class="form-group">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="fecha_vencimiento" class="form-control pull-right" id="datepicker_fecha_vencimiento" placeholder="Fecha de vencimiento">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                    </div>
                    <!-- checkbox -->
                    <div class="form-group">
                        <label>
                            <input type="checkbox" class="minimal" name="nota_pase_tutor">
                            Nota de tutor presentada
                        </label>
                    </div>
                    <div>
                      <textarea class="textarea" placeholder="Observaciones" name="observaciones"
                        style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-right">Continuar</button>
                </div>
                <!-- /.box-footer -->

            </div>

        </div>
        <!-- /.box-body -->
    </form>
</div>



@section('endjs')
    <script>
        !function(a){a.fn.datepicker.dates.es={days:["Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado"],daysShort:["Dom","Lun","Mar","Mié","Jue","Vie","Sáb"],daysMin:["Do","Lu","Ma","Mi","Ju","Vi","Sa"],months:["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],monthsShort:["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"],today:"Hoy",monthsTitle:"Meses",clear:"Borrar",weekStart:1,format:"dd/mm/yyyy"}}(jQuery);

        $(function(){
            // Fecha de vencimiento
            $('#datepicker_fecha_vencimiento').datepicker({
                autoclose: true,
                language: 'es'
            });

            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass   : 'iradio_minimal-blue'
            })
        });
    </script>
@append