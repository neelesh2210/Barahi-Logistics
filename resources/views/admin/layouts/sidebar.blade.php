<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <img src="{{asset('admins/assets/images/web5.png')}}" alt="" height="30">
        <!-- <img src="{{ asset('admins/assets/images/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <!-- <span class="brand-text font-weight-light">{{env('APP_NAME')}}</span> -->
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
                <li class="nav-item">
                    <a href="{{route('admin.orders.index')}}" class="nav-link @if(Route::currentRouteName() == 'admin.orders.index' || Route::currentRouteName() == 'admin.orders.show') active @endif">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>
                            Orders
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.order.comment')}}" class="nav-link @if(Route::currentRouteName() == 'admin.order.comment') active @endif">
                        <i class="nav-icon fas fa-comment"></i>
                        <p>
                            Comments
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.payment.index')}}" class="nav-link @if(Route::currentRouteName() == 'admin.payment.index') active @endif">
                        <i class="nav-icon fas fa-money-bill-wave"></i>
                        <p>
                            Payments
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin-notices.index')}}" class="nav-link @if(Route::currentRouteName() == 'admin-notices.index' || Route::currentRouteName() == 'admin-notices.create' || Route::currentRouteName() == 'admin-notices.edit') active @endif">
                        <i class="nav-icon fas fa-scroll"></i>
                        <p>
                            Notices
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.ticket.index')}}" class="nav-link @if(Route::currentRouteName() == 'admin.ticket.index') active @endif">
                        <i class="nav-icon fas fa-ticket-alt"></i>
                        <p>
                            Tickets
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('delivery-boys.index')}}" class="nav-link @if(Route::currentRouteName() == 'delivery-boys.index') active @endif">
                        <i class="nav-icon fas fa-biking"></i>
                        <p>
                            Delivery Boys
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.assign-order.index')}}" class="nav-link @if(Route::currentRouteName() == 'admin.assign-order.index') active @endif">
                        <i class="nav-icon fas fa-truck-loading"></i>
                        <p>
                            Assign Order
                        </p>
                    </a>
                </li>
                <li class="nav-item @if (Route::currentRouteName() == 'admin.today.details') menu-is-opening menu-open @endif">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Analysis
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.today.details')}}"
                                class="nav-link @if (Route::currentRouteName() == 'admin.today.details') active @endif">
                                <i class="nav-icon far fa-circle"></i>
                                <p>Today Details</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
