<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>

                <li>
                    <a href="{{url('/home')}}" class="waves-effect">
                        <i class="ti-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{url('/calendar')}}" class=" waves-effect">
                        <i class="ti-calendar"></i>
                        <span>Calendar</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-package"></i>
                        <span>Products</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{url('/products')}}">All products</a></li>
                        <li><a href="{{url('/add_product')}}">Add product</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{url('/users')}}" class=" waves-effect">
                        <i class="ti-user"></i>
                        <span>Users</span>
                    </a>
                </li>

                <li>
                    <a href="{{url('/contact')}}" class=" waves-effect">
                        <i class="ti-email"></i>
                        <span>Email</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>