<!-- Messages: style can be found in dropdown.less-->
<li class="dropdown messages-menu">
<!-- Menu toggle button -->
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-envelope-o"></i>
    <span class="label label-success">1</span>
</a>
<ul class="dropdown-menu">
    <li class="header">Tiene 1 mensaje nuevo</li>
    <li>
        <!-- inner menu: contains the messages -->
        <ul class="menu">
            <li><!-- start message -->
                <a href="#">
                    <div class="pull-left">
                        <!-- User Image -->
                        <img src="{{ asset('lte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                    </div>
                    <!-- Message title and timestamp -->
                    <h4>
                        Diego Maidana
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                    </h4>
                    <!-- The message -->
                    <p>Atenderemos su inquietud a la brevedad</p>
                </a>
            </li>
            <!-- end message -->
        </ul>
        <!-- /.menu -->
    </li>
    <li class="footer"><a href="#">See All Messages</a></li>
</ul>
</li>
<!-- /.messages-menu -->
