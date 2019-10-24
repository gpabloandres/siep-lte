@php
    $user = session()->get('user')
@endphp

<!-- User Account Menu -->
<li class="dropdown user user-menu">
<!-- Menu Toggle Button -->
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <!-- The user image in the navbar-->
    <img src="{{ asset('lte/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
    <!-- hidden-xs hides the username on small devices so only the image appears. -->
    <span class="hidden-xs">{{ strtoupper($user['username']) }}</span>
</a>
<ul class="dropdown-menu">
    <!-- The user image in the menu -->
    <li class="user-header">
        <img src="{{ asset('lte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

        <p>
            {{ strtoupper($user['username']) }} - {{ $user['role'] }}
            <small>{{ $user['puesto'] }}</small>
        </p>
    </li>
    <!-- Menu Body -->
    <li class="user-body">
        <div class="row">
            <div class="col-xs-12 text-center">
                <a href="#">{{ $user['centro']['nombre'] }}</a>
            </div>
        </div>
        <!-- /.row -->
    </li>
    <!-- Menu Footer-->
    <li class="user-footer">
        <div class="pull-right">
            <a href="{{ route('logout') }}" class="btn btn-default btn-flat">Cerrar sesion</a>
        </div>
    </li>
</ul>
</li>
