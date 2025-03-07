<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="{{ url('dashboard') }}" class="sidebar-logo">
            <img src="{{ assets('assets/images/l-light.png') }}" alt="site logo" class="light-logo" style="width:120px;margin:auto;">
            <img src="{{ assets('assets/images/l-dark.png') }}" alt="site logo" class="dark-logo" style="width:120px;margin:auto;">
            <img src="{{ assets('assets/images/logo-icon.png') }}" alt="site logo" class="logo-icon" style="width:20px;margin:0 13px;"
                data-light="{{ assets('assets/images/logo-icon-2.png') }}" 
                data-dark="{{ assets('assets/images/logo-icon.png') }}">
        </a>
    </div>
    <div class="sidebar-menu-area open">
        <ul class="sidebar-menu show" id="sidebar-menu">
            <li>
                <a href="{{ url('dashboard') }}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-menu-group-title">Application</li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:user-check-broken" class="menu-icon"></iconify-icon>
                    <span>Admins</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ url('dashboard/admin/show') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Show</a>
                    </li>
                    <li>
                        <a href="{{ url('dashboard/admin/create') }}"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Create</a>
                    </li>
                    <li>
                        <a href="{{ url('dashboard/admin/reports') }}"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Reports</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>