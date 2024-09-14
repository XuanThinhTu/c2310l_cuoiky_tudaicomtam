<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.car.index') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Tứ đại cơm tấm</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('admin.car.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.car.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Orders to the sidebar menu -->
    <li class="nav-item {{ request()->routeIs('admin.orders') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.orders') }}">
            <i class="fas fa-fw fa-box"></i>
            <span>Orders</span>
            @if ($pendingOrdersCount > 0)
                <span class="badge badge-danger">{{ $pendingOrdersCount }}</span>
            @endif
        </a>
    </li>






</ul>
