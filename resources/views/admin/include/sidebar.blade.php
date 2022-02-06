<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    {{-- <a href="{{route('admin.home')}}" class="brands-link"> --}}
        {{-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
        {{-- <span class="brand-text font-weight-light">Control Panel</span> --}}

    {{-- </a> --}}
    <div class="user-panel mt-3 pb-3 mb-3 d-flex brand-link">
        <div class="image">
            <img src="{{asset('uploads/users/' . Auth::user()->profile->image)}}" class="img-circle border border-dark elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block brand-link">{{auth()->user()->name}}</a>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../../index.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../index2.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v3</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}

                <li class="nav-header">{{ trans('site.menu') }}</li>

                <!-- Home -->
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.home')}}">
                        <i class="mdi mdi-view-dashboard nav-icon" aria-hidden="true"></i>
                        <p>{{ trans('site.home') }}</p>
                    </a>
                </li>

                <!-- Users -->
                <li class="nav-item">
                    <a class="nav-link" href="{{route('users.index')}}">
                        <i class="mdi mdi-account-supervisor nav-icon" aria-hidden="true"></i>
                        <p>{{ trans('site.users') }}</p>
                    </a>
                </li>

                <!-- Stations -->
                <li class="nav-item">
                    <a class="nav-link" href="{{route('stations.index')}}">
                        <i class="mdi mdi-office-building-marker nav-icon" aria-hidden="true"></i>
                        <p>{{ trans('site.stations') }}</p>
                    </a>
                </li>

                <!-- Trains -->
                <li class="nav-item">
                    <a class="nav-link" href="{{route('trains.index')}}">
                        <i class="mdi mdi-train" aria-hidden="true"></i>
                        <p>{{ trans('site.trains') }}</p>
                    </a>
                </li>

                <!-- Classes / Types -->
                <li class="nav-item">
                    <a class="nav-link" href="{{route('classes.index')}}">
                        <i class="mdi mdi-book-variant nav-icon" aria-hidden="true"></i>
                        <p>{{ trans('site.classes') }}</p>
                    </a>
                </li>

                <!-- Tickets -->
                <li class="nav-item">
                    <a class="nav-link" href="">
                        <i class="mdi mdi-ticket nav-icon" aria-hidden="true"></i>
                        <p>{{ trans('site.tickets') }}</p>
                    </a>
                </li>

                <!-- Messages -->
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact.index')}}">
                        <i class="mdi mdi-inbox-multiple nav-icon" aria-hidden="true"></i>
                        <p>{{ trans('site.messages') }}</p>
                    </a>
                </li>

                <!-- Setting -->
                <li class="nav-item">
                    <a class="nav-link" href="{{route('setting.edit', ['id' => $setting->id])}}">
                        <i class="mdi mdi-cogs nav-icon" aria-hidden="true"></i>
                        <p>{{ trans('site.system_settings') }}</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->

        <nav class="nav-logout">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Logout -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-logout nav-icon" aria-hidden="true"></i>
                        <p>{{ trans('site.logout') }}</p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

            </ul>
        </nav>

    </div>
    <!-- /.sidebar -->
</aside>
