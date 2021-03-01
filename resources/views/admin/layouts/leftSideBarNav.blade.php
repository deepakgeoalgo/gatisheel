    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                        <div class="brand">
                            <img src="{{ asset('app-assets/images/logo/logo-info.png')}}" width="35" height="24">
                        </div>
                        <h2 class="brand-text mb-0">Gatisheel</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item active"><a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
                </li>

                <li class="navigation-header"><span>Modules</span>
                </li>               
                <li class="nav-item"><a href="{{ route('technicians.index') }}"><i class="feather icon-users"></i><span class="menu-title" data-i18n="Team">Technician/Dealer</span></a>
                </li>

                <li><a href="{{ route('machines.index') }}"><i class="feather icon-info"></i><span class="menu-item" data-i18n="View">Machine</span></a>
                </li>

                <li><a href="{{ route('installations.index') }}"><i class="feather icon-settings"></i><span class="menu-item" data-i18n="View">Installation</span></a>
                </li>

                <li><a href="{{ route('issues.index') }}"><i class="feather icon-file"></i><span class="menu-item" data-i18n="View">Create Issue</span></a>
                </li>

                <li class="nav-item"><a href="javascript:void(0)"><i class="feather icon-link"></i><span class="menu-title" data-i18n="Team">Assign Issue</span></a>
                </li>

                <li class="nav-item"><a href="{{ route('customers.index') }}"><i class="feather icon-users"></i><span class="menu-title" data-i18n="Team">Customers</span></a>
                </li>      
                
                <li class=" navigation-header"><span>Support</span>
                </li>
                <li class=" nav-item"><a href="javascript:void(0)"><i class="feather icon-folder"></i><span class="menu-title" data-i18n="Documentation">Documentation</span></a>
                </li>
                <li class=" nav-item"><a href="javascript:void(0)"><i class="feather icon-life-buoy"></i><span class="menu-title" data-i18n="Raise Support">Raise Support</span></a>
                </li>

            </ul>
        </div>
    </div>