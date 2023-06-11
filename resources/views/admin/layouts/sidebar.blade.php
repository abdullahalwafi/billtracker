<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{ url('/admin') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="20">
            </span>
        </a>

        <a href="{{ url('/admin') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="20">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ url('/admin') }}">
                        <i class="uil-home-alt"></i><span class="badge rounded-pill bg-primary float-end">01</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="menu-title">Master Data</li>

                <li>
                    <a href="{{ url('/admin/categories') }}" class="waves-effect">
                        <i class="uil-calender"></i>
                        <span>Categories</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/admin/products') }}" class=" waves-effect">
                        <i class="uil-shopping-basket"></i>
                        <span>Products</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/admin/clients') }}" class="waves-effect">
                        <i class="uil-users-alt"></i>
                        <span>Clients</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/orders') }}" class="waves-effect">
                        <i class="uil-shop"></i>
                        <span>Orders</span>
                    </a>
                </li>
                <li class="menu-title">System Management</li>
                <li>
                    <a href="{{ url('/admin/gateway') }}" class="waves-effect">
                        <i class="uil-whatsapp"></i>
                        <span>Gateway</span>
                    </a>
                </li>
                <li>
                    <a class="right-bar-toggle waves-effect">
                        <i class="uil-cog"></i>
                        <span class="text-left">Setting</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/users') }}" class="waves-effect">
                        <i class="uil-user-circle"></i>
                        <span>Users</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
<div class="main-content">
