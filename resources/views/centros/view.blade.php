@extends('core.layout')

@section('contenido')
     <!-- Breadcrumb -->
      <section class="content-header">
        <h1>
          {{ $centro['nombre'] }} <small>Ciclo {{ $ciclo }}</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home"></i> Centros</a></li>
          <li class="active">Informacion del centro</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
              <div class="col-md-9">
                  <div class="nav-tabs-custom">
                      <ul class="nav nav-tabs">
                          <li class="active"><a href="#infogeneral" data-toggle="tab" aria-expanded="true">Informacion general</a></li>
                          <li class=""><a href="#secciones" data-toggle="tab" aria-expanded="false">Secciones</a></li>
                          <li class=""><a href="#inscripciones" data-toggle="tab" aria-expanded="false">Inscripciones</a></li>
                          <li class=""><a href="#titulaciones" data-toggle="tab" aria-expanded="false">Titulaciones</a></li>
                      </ul>
                      <div class="tab-content">
                          <div class="tab-pane active" id="infogeneral">
                              @if(count($secciones))
                                  @include('centros.componentes.widget_resumen_centro',['data'=>$secciones])
                                  @include('centros.componentes.tabla_cuantitativa_secciones',['data'=>$secciones])
                                  @include('centros.componentes.tabla_cuantitativa_matriculas',['data'=>$secciones])
                              @else
                                  <div class="callout callout-danger">
                                      <p>
                                          No existen secciones.
                                      </p>
                                  </div>
                              @endif
                          </div>
                          <!-- /.tab-pane -->
                          <div class="tab-pane" id="secciones">
                            @include('centros.componentes.tab_secciones',['data'=>$secciones])
                          </div>
                          <!-- /.tab-pane -->
                          <div class="tab-pane" id="titulaciones">
                            @include('centros.componentes.tabla_cuantitativa_titulaciones',['data'=>$secciones])
                          </div>
                          <!-- /.tab-pane -->
                          <div class="tab-pane" id="inscripciones">
                              @include('secciones.componentes.inscripciones',['data'=>$inscripciones,'page_link'=>'tab_ins_page','page_anchor'=>'inscripciones'])
                          </div>
                          <!-- /.tab-pane -->
                      </div>
                      <!-- /.tab-content -->
                  </div>
                  <!-- /.nav-tabs-custom -->
              </div>
              <div class="col-md-3">
                  @include('centros.componentes.card_centro')
              </div>

          </div>
      </section>
      <!-- /.content -->
@endsection
