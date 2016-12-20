<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="{{ Request::is('home') ? 'active' : '' }}">
                <a href="{{ url('/home') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
            </li>
            <li class="{{ Request::is('layanans') ? 'active' : '' }}">
                <a href="{{ url('/layanans') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Layanan</span></a>
            </li>
            <li class="{{ Request::is('images') ? 'active' : '' }}">
                <a href="{{ url('/images') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Image</span></a>
            </li>
            <li class="{{ Request::is('service_hours') ? 'active' : '' }}">
                <a href="{{ url('/service_hours') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Service Hours</span></a>
            </li>
        </ul>
    </div>
</nav>