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

                <li><a href="{{ route('installations.index') }}"><i class="feather icon-users"></i><span class="menu-item" data-i18n="View">Customer</span></a>
                </li>

                <li><a href="{{ route('issues.index') }}"><i class="feather icon-file"></i><span class="menu-item" data-i18n="View">Ticket</span></a>
                </li>

                <li><a href="{{ route('referred.index') }}"><i class="feather icon-send"></i><span class="menu-item" data-i18n="View">Referred</span></a>
                </li>

                <!-- <li class=" nav-item"><a href="#"><i class="feather icon-check-square"></i><span class="menu-title" data-i18n="User">Ticket</span></a>
                    <ul class="menu-content">
                        <li><a href="{{ route('issues.index') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Open">Open</span></a>
                        </li>
                        <li><a href="{{ route('assign-issues.index') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Assign">Assign</span></a>
                        </li>
                        <li><a href=""><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Close">Close</span></a>
                        </li>
                        <li><a href=""><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Super Close">Super Close</span></a>
                        </li>
                    </ul>
                </li> -->
                
            </ul>
        </div>
    </div>