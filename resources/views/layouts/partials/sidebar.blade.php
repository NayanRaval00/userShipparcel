<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="" class="sidebar-logo">
            <img src="{{asset('assets/media/logos/shiparcel_logo.png')}}" alt="site logo" class="light-logo">
            <img src="{{asset('assets/media/logos/shiparcel_logo.png')}}" alt="site logo" class="dark-logo">
            <img src="{{asset('assets/media/logos/shiparcel_logo.png')}}" alt="site logo" class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href=""><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> AI</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-menu-group-title">Application</li>
            <li>
                <a href="{{route('create-warehouse')}}">
                    <iconify-icon icon="mage:email" class="menu-icon"></iconify-icon>
                    <span>Create Warehouse</span>
                </a>
            </li>
            <li>
                <a href="{{route('create-order')}}">
                    <iconify-icon icon="mage:email" class="menu-icon"></iconify-icon>
                    <span>Create Order</span>
                </a>
            </li>
        </ul>
    </div>
</aside>