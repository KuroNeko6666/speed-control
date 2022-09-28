<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ $active == 'dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="/home">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ str_contains($active, 'component') ? 'active' : '' }}">
        <a class="nav-link {{ str_contains($active, 'component') ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse {{ str_contains($active, 'component') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item {{ $active == 'component-button' ? 'active' : '' }}" href="/component/button">Buttons</a>
                <a class="collapse-item {{ $active == 'component-card' ? 'active' : '' }}" href="/component/card">Cards</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{ str_contains($active, 'utilities') ? 'active' : '' }}">
        <a class="nav-link {{ str_contains($active, 'utilities') ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse {{ str_contains($active, 'utilities') ? 'show' : '' }}" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item {{ $active == 'utilities-color' ? 'active' : '' }}" href="/utilities/color">Colors</a>
                <a class="collapse-item {{ $active == 'utilities-border' ? 'active' : '' }}" href="/utilities/border">Borders</a>
                <a class="collapse-item {{ $active == 'utilities-animation' ? 'active' : '' }}" href="/utilities/animation">Animations</a>
                <a class="collapse-item {{ $active == 'utilities-other' ? 'active' : '' }}" href="/utilities/other">Other</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ str_contains($active, 'pages') ? 'active' : '' }}">
        <a class="nav-link {{ str_contains($active, 'pages') ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse {{ str_contains($active, 'pages') ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item {{ $active == 'pages-login' ? 'active' : '' }}" href="/pages/login">Login</a>
                <a class="collapse-item {{ $active == 'pages-register' ? 'active' : '' }}" href="/pages/register">Register</a>
                <a class="collapse-item {{ $active == 'pages-forgot' ? 'active' : '' }}" href="/pages/forgot">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item {{ $active == 'pages-404' ? 'active' : '' }}" href="/pages/404">404 Page</a>
                <a class="collapse-item {{ $active == 'pages-blank' ? 'active' : '' }}" href="/pages/blank">Blank Page</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item {{ $active == 'charts' ? 'active' : '' }}">
        <a class="nav-link" href="/chart">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item {{ $active == 'tables' ? 'active' : '' }}">
        <a class="nav-link" href="/table">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->