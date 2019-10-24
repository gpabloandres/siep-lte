<header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a href="/" class="navbar-brand"><b>SIEP</b>TDF</a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    @include('core.header.menu')
                </ul>
            </div>
            <!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    @include('core.header.toolbar')
                </ul>
            </div>
            <!-- /.navbar-custom-menu -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</header>

<nav class="bg-navy" id="header_search" style="display:none;">
    <div class="container">
        <ul class="nav navbar-nav">
            <li>
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="header_search" class="form-control" placeholder="Puede buscar por nombre, legajo, o dni (Alumnos, Familiares)" autocomplete="off">
                        <span class="input-group-btn">
                        <button type="submit" class="btn btn-flat">
                              <i class="fa fa-search"></i>
                        </button>
                        </span>
                    </div>
                </form>
            </li>
        </ul>
    </div>
    <!-- /.container-fluid -->
</nav>

@section('endjs')
    <script>
        function toggleHeaderSearch() {
            $('#header_search').toggle();
        }
    </script>
@append
