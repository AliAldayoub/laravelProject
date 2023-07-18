<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Dashboard</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="/">main Dashboard</a> </li>
                        </ul>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Components </li>

                    <!-- menu item todo-->
                    <li>
                        <a href="/users/create"><i class="ti-menu-alt"></i><span class="right-nav-text">Create User</span> </a>
                    </li>
                    <!-- menu item todo-->
                    <li>
                        <a href="/doctors"><i class="ti-menu-alt"></i><span class="right-nav-text">show Doctors</span> </a>
                    </li>
                    <!-- menu item todo-->
                    <li>
                        <a href="/doctors/create"><i class="ti-menu-alt"></i><span class="right-nav-text">Add Doctor</span> </a>
                    </li>
                    <!-- menu item todo-->
                    <li>
                        <a href="{{ route('reservations.create') }}"><i class="ti-menu-alt"></i><span class="right-nav-text">Add reservation</span> </a>
                    </li>
                    <!-- menu item todo-->
                    <li>
                        <a href="{{ route('user.reservations') }}"><i class="ti-menu-alt"></i><span class="right-nav-text">User Reservations</span> </a>
                    </li>
                    <!-- menu item todo-->
                    <li>
                        <a href="{{ route('doctor.getRreservations') }}"><i class="ti-menu-alt"></i><span class="right-nav-text">Doctors reservations</span> </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
