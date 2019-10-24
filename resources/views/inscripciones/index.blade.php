@extends('core.layout')

@section('contenido')
     <!-- Breadcrumb -->
      <section class="content-header">
        <h1>
          Inscripciones
          <small>Alumnos del ciclo {{ $ciclo }}</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home"></i> Alumnado</a></li>
          <li class="active">Inscripciones</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
              <div class="col-md-9">
              @if(request('tarjetas'))
                      @include('inscripciones.componentes.cards')
                  @else
                      @include('inscripciones.componentes.tabla')
                  @endif
              </div>
              <div class="col-md-3">
                  @permiso('inscripcion.create')
                      <a href="AgregarInscripciones" class="btn btn-primary btn-block margin-bottom">Agregar inscripcion</a>
                  @endpermiso

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
                    'action' => route('inscripciones.index')
                  ])
                  <!-- /. box -->
                  <div class="box box-solid">
                      <div class="box-header with-border">
                          <h3 class="box-title">Filtro rapido</h3>

                          <div class="box-tools">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                              </button>
                          </div>
                      </div>
                      <div class="box-body no-padding">
                          <ul class="nav nav-pills nav-stacked">
                              <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> Promocionados</a></li>
                              <li><a href="#"><i class="fa fa-circle-o text-red"></i> Repitentes</a></li>
                              <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Egresados</a></li>
                          </ul>
                      </div>
                      <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
              </div>
          </div>
      </section>
      <!-- /.content -->
@endsection
