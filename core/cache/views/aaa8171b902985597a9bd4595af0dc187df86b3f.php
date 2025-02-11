<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="<?php echo e(url('dashboard')); ?>" class="sidebar-logo">
            <img src="<?php echo e(assets('assets/images/l-light.png')); ?>" alt="site logo" class="light-logo" style="width:97px;margin:auto;">
            <img src="<?php echo e(assets('assets/images/l-dark.png')); ?>" alt="site logo" class="dark-logo" style="width:97px;margin:auto;">
            <img src="<?php echo e(assets('assets/images/logo-icon.png')); ?>" alt="site logo" class="logo-icon" style="width:20px;margin:auto;"
                data-light="<?php echo e(assets('assets/images/logo-icon-2.png')); ?>" 
                data-dark="<?php echo e(assets('assets/images/logo-icon.png')); ?>">
        </a>
    </div>
    <div class="sidebar-menu-area open">
        <ul class="sidebar-menu show" id="sidebar-menu">
            <li>
                <a href="<?php echo e(url('dashboard')); ?>">
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
                        <a href="<?php echo e(url('dashboard/admin/show')); ?>"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Show</a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('dashboard/admin/create')); ?>"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Create</a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('dashboard/admin/reports')); ?>"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Reports</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>