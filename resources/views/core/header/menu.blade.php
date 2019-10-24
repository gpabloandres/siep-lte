@rol('superadmin')
<li><a href="{{ route('admin') }}">Administracion</a></li>
@enduser

@permiso('centros.index')
<li class="{{request()->is('centros*') ? ' active' : ''}}"><a href="{{ route('centros.index') }}">Centros</a></li>
@endpermiso

@permiso('secciones.index')
<li class="{{request()->is('secciones*') ? ' active' : ''}}"><a href="{{ route('secciones.index') }}">Secciones</a></li>
@endpermiso

<!-- Alumnado -->
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Alumnado <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
        <li class="active"><a href="{{ url('inscripciones') }}">Inscripciones</a></li>
        <li><a href="{{ route('promocionados.index') }}">Promocionados</a></li>
        <li><a href="{{ route('repitentes.index') }}">Repitentes</a></li>
        <li><a href="{{ route('pases.index') }}">Pases</a></li>
    </ul>
</li>

<li class="{{request()->is('secciones*') ? ' active' : ''}}"><a href="#">Mapa educativo</a></li>

<!-- Ayuda -->
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ayuda <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
        <li><a href="#">Procesos paso a paso</a></li>
        <li><a href="#">Tutoriales en linea</a></li>
    </ul>
</li>
