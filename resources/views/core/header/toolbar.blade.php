<li>
    <a href="javascript:toggleHeaderSearch()">
        <i class="fa fa-search"></i>
    </a>
</li>


@include('core.header.toolbar.mensajes')
@include('core.header.toolbar.tareas')
@include('core.header.toolbar.notificaciones')

@user
    @include('core.header.toolbar.user')
@enduser
