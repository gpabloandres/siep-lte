@extends('core.layout')

@section('contenido')
     <!-- Breadcrumb -->
      <section class="content-header">
        <h1>
          Ciclo {{ $ciclo }}
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home"></i> Alumnado</a></li>
          <li>Pases</li>
          <li class="active">Crear pase</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
              <div class="col-md-8">
                  @if($paso==1)
                      @include('pases.create_wizard.paso1')
                  @endif

                  @if($paso==2)
                      @include('pases.create_wizard.paso2')
                  @endif

                  @if($paso==3)
                      @include('pases.create_wizard.paso3')
                  @endif

                  @if($paso==4)
                      @include('pases.create_wizard.paso4')
                  @endif
              </div>
              <div class="col-md-4">
                  <div class="alert alert-info">
                      <h4> Paso {{ $paso }} de {{ $pasos }}</h4>
                  </div>
              </div>
          </div>
      </section>
      <!-- /.content -->
@endsection