
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-cart-shopping"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Test Item 3
                            </h3>
                            <p class="text-sm">Dummy Description</p>
                        </div>
                        <div>
                            <a href="javascript:void(0)" class="">
                                <i class="fas fa-trash text-danger"></i>
                            </a>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Test Item 2
                            </h3>
                            <p class="text-sm">Dummy Description</p>
                        </div>
                        <div>
                            <a href="javascript:void(0)" class="">
                                <i class="fas fa-trash text-danger"></i>
                            </a>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <div class="media">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Test Item 1
                                </h3>
                                <p class="text-sm">Dummy Description</p>
                            </div>
                            <div>
                                <a href="javascript:void(0)" class="">
                                    <i class="fas fa-trash text-danger"></i>
                                </a>
                            </div>
                        </div>
                    </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('cart.create') }}" class="dropdown-item dropdown-footer">Go to Checkout Page</a>
            </div>
        </li>
    </ul>
</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header text-uppercase">Products</li>
                <li class="nav-item">
                    <a href="{{ route('product.index') }}" class="nav-link {{ Route::is('product.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>List</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('product.form') }}" class="nav-link {{ Route::is('product.form') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Create</p>
                    </a>
                </li>
                <li class="nav-header"></li>
                <li class="nav-item">
                    <a href="{{ route('videos') }}" class="nav-link {{ Route::is('videos') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-video"></i>
                        <p>Videos</p>
                    </a>
                </li>
                <li class="nav-header"></li>
                <li class="nav-item">
                    <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>Logout</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>