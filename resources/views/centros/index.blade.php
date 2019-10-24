@extends('core.layout')

@section('contenido')
     <!-- Breadcrumb -->
      <section class="content-header">
        <h1>
          Listado de centros de la provincia
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home"></i> Centros</a></li>
          <li class="active">Listado de centros</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
              @include('centros.componentes.tabla_centros',['data'=>$centros])
      </section>
      <!-- /.content -->
@endsection
