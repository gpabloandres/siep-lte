@extends('core.layout')

@section('contenido')
     <!-- Breadcrumb -->
      <section class="content-header">
        <h1>
          Informacion de seccion <small>Ciclo {{ $ciclo }}</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home"></i> Ofertas</a></li>
          <li><a href="{{ route('secciones.index') }}">Secciones</a></li>
          <li class="active">Informacion de seccion</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
              <div class="col-md-9">
                  <div class="nav-tabs-custom">
                      <ul class="nav nav-tabs">
                          <li class="active"><a href="#alumnos" data-toggle="tab" aria-expanded="true">Alumnos</a></li>
                          <li class=""><a href="#titulaciones" data-toggle="tab" aria-expanded="false">Titulaciones</a></li>
                      </ul>
                      <div class="tab-content">
                          <div class="tab-pane active" id="alumnos">
                              @include('secciones.componentes.inscripciones',['data'=>$inscripciones,'page_link'=>'ins_page'])
                          </div>
                          <!-- /.tab-pane -->
                          <div class="tab-pane" id="titulaciones">
                              @php
                                $titulacion = $seccion['titulacion'];
                              @endphp
                              {{ $titulacion['nombre'] }}
                              {{ $titulacion['certificacion'] }}
                          </div>
                          <!-- /.tab-pane -->
                      </div>
                      <!-- /.tab-content -->
                  </div>
                  <!-- /.nav-tabs-custom -->
              </div>
              <div class="col-md-3">
                  @include('secciones.componentes.card',['data'=>$seccion])
              </div>

          </div>
      </section>
      <!-- /.content -->
@endsection
