@foreach($inscripciones['data'] as $data)
<div class="col-md-4">
    <div class="box box-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-aqua-active">
            <h4>{{ $data['inscripcion']['alumno']['persona']['nombre_completo'] }}</h4>
            <h5 class="widget-user-desc">{{ $data['inscripcion']['centro']['nombre'] }}</h5>
            <h5>{{ $data['inscripcion']['estado_inscripcion'] }}</h5>
        </div>
            <div class="box-footer no-padding">
                <div class="row">
                    <div class="col-sm-6 border-right">
                        <div class="description-block">
                            <span class="description-text">{{ $data['inscripcion']['legajo_nro'] }}</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <div class="description-block">
                            <span class="description-text">{{ $data['inscripcion']['estado_documentacion'] }}</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
            <!-- /.row -->
        </div>
</div>
@endforeach


