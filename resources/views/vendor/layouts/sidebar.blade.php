<div class="leftside-menu">
    <a href="index.html" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{asset('vendors/assets/images/web5.png')}}" alt="" height="30">
            <!-- <h2>{{env('APP_NAME')}}</h2> -->
        </span>
        <span class="logo-sm">
            {{-- <img src="{{asset('vendors/assets/images/web5.png')}}" alt="" height="16"> --}}
            {{'Barahi'}}
        </span>
    </a>
    <a href="index.html" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="{{asset('vendors/assets/images/logo-dark.png')}}" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="{{asset('vendors/assets/images/logo_sm_dark.png')}}" alt="" height="16">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <ul class="side-nav">
            <!-- <li class="side-nav-title side-nav-item">Navigation</li> -->
            <li class="side-nav-item">
                <a href="{{route('vendor.dashboard')}}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboard </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{route('orders.index')}}" class="side-nav-link">
                    <i class="uil-dropbox"></i>
                    <span> Orders </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{route('vendor.order.comment')}}" class="side-nav-link">
                    <i class="uil-comment"></i>
                    <span> Comments </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{route('vendor.payment.index')}}" class="side-nav-link">
                    <i class="uil-money-bill"></i>
                    <span> Payments </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{route('customers.index')}}" class="side-nav-link">
                    <i class="uil-users-alt"></i>
                    <span> Customers </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{route('vendor.notices.index')}}" class="side-nav-link">
                    <i class="uil-notes"></i>
                    <span> Notices </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{route('vendor.ticket.index')}}" class="side-nav-link">
                    <i class="uil-ticket"></i>
                    <span> Ticket </span>
                </a>
            </li>
        </ul>
    </div>
</div>
