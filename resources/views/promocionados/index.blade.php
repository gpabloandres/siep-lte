@extends('core.layout')

@section('contenido')
     <!-- Breadcrumb -->
      <section class="content-header">
        <h1>
          Alumnos promocionados
          <small>ciclo {{ $ciclo }}</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home"></i> Ver</a></li>
          <li class="active">Promocionados</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
              <div class="col-md-9">
              @if(request('tarjetas'))
                      @include('promocionados.cards')
                  @else
                      @include('promocionados.tabla',['data'=>$promocionados])
                  @endif
              </div>
              <div class="col-md-3">
                  <div class="box collapsed-box">
                      <div class="box-header">
                          <h3 class="box-title">Visualizacion</h3>
                          <div class="box-tools">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                          </div>
                      </div>
                      <div class="box-body">
                          <div class="row">
                              <div class="col-sm-6">
                                  <a class="btn btn-app" href="{{ url('inscripciones') }}">
                                      <i class="fa fa-list"></i> Tabla
                                  </a>
                              </div>
                              <div class="col-sm-6">
                                  <a class="btn btn-app" href="{{ url('inscripciones') }}?tarjetas=true">
                                      <i class="fa fa-th"></i> Tarjetas
                                  </a>
                              </div>
                          </div>
                      </div>
                      <!-- /.box-body -->
                  </div>

                  @include('sidebar_filtros',[
                    'action' => route('promocionados.index')
                  ])
                  <!-- /. box -->
              </div>
          </div>
      </section>
      <!-- /.content -->
@endsection
