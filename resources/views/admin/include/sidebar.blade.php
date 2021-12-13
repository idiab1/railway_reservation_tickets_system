<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.home')}}" class="brand-link">
        {{-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
        <span class="brand-text font-weight-light">Control Panel</span>
    </a>

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

                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.home')}}">
                        <i class="mdi mdi-view-dashboard nav-icon" aria-hidden="true"></i>
                        <p>{{ trans('site.home') }}</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('users.index')}}">
                        <i class="mdi mdi-account-supervisor nav-icon" aria-hidden="true"></i>
                        <p>{{ trans('site.users') }}</p>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact.index')}}">
                        <i class="mdi mdi-inbox-multiple nav-icon" aria-hidden="true"></i>
                        <p>{{ trans('site.messages') }}</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        <!-- Sidebar user -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('uploads/users/' . Auth::user()->profile->image)}}" class="img-circle border border-dark elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Setting -->
                <li class="nav-item">
                    <a class="nav-link" href="{{route('setting.edit', ['id' => $setting->id])}}">
                        <i class="mdi mdi-cogs nav-icon" aria-hidden="true"></i>
                        <p>{{ trans('site.setting') }}</p>
                    </a>
                </li>
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
