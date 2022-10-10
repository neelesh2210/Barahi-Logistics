<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('admins/assets/images/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{env('APP_NAME')}}</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admins/assets/images/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::guard('admin')->user()->name}}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link @if(Route::currentRouteName() == 'admin.dashboard') active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('vendors.index')}}" class="nav-link @if(Route::currentRouteName() == 'vendors.index' || Route::currentRouteName() == 'vendors.create' || Route::currentRouteName() == 'vendors.edit') active @endif">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                            Vendors
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('destination-with-charges.index')}}" class="nav-link @if(Route::currentRouteName() == 'destination-with-charges.index') active @endif">
                        <i class="nav-icon fas fa-map-marker-alt"></i>
                        <p>
                            Destination With Charge
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{route('branches.index')}}" class="nav-link @if(Route::currentRouteName() == 'branches.index') active @endif">
                        <i class="nav-icon fas fa-code-branch"></i>
                        <p>
                            Branch
                        </p>
                    </a>
                </li> --}}
            </ul>
        </nav>
    </div>
</aside>
