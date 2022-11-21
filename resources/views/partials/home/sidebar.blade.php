<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Speed Control</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    @foreach ($menus as $menu)
        @if ($menu['sub_menus'] == null)
        <li class="nav-item {{ $menu['active'] ? 'active' : '' }} ">
            <a class="nav-link" href={{ $menu['path'] }}>
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>{{ $menu['name'] }}</span></a>
        </li>
        @else
        <li class="nav-item {{ $menu['active'] ? 'active' : '' }}">
            <a class="nav-link {{ $menu['active'] ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#master"
                aria-expanded="true" aria-controls="master">
                <i class="fas fa-fw fa-cog"></i>
                <span>{{ $menu['name'] }}</span>
            </a>
            <div id="master" class="collapse {{ $menu['active'] ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Data {{ $menu['name'] }}</h6>
                    @foreach ($menu['sub_menus'] as $sub_menu)
                        <a class="collapse-item {{ $sub_menu['active'] ? 'active' : '' }}" href="{{ $sub_menu['path'] }}">{{ $sub_menu['name'] }}</a>
                    @endforeach

                </div>
            </div>
        </li>
        @endif
    @endforeach


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->
