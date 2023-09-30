<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <h1>Admin Panel</h1>
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/dashboard*') ? 'active bg-dark text-white' : '' }}"
                            href="{{ url('/admin') }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/product') ? 'active bg-dark text-white' : '' }}"
                            href="{{ route('product.index') }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Products</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/category*') ? 'active bg-dark text-white' : '' }}"
                            href="{{ route('category.index') }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Category</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/brand*') ? 'active bg-dark text-white' : '' }}"
                            href="{{ route('brand.index') }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Brand</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/color*') ? 'active bg-dark text-white' : '' }}"
                            href="{{ route('color.index') }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Color</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/supplier*') ? 'active bg-dark text-white' : '' }}"
                            href="{{ route('supplier.index') }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Supplier</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/product-add-transaction*') ? 'active bg-dark text-white' : '' }}"
                            href="{{ url('/admin/product-add-transaction') }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Product Transaction</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/order*') ? 'active bg-dark text-white' : '' }}"
                            href="{{ url('/admin/order') }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Order List</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/income') ? 'active bg-dark text-white' : '' }}"
                            href="{{ route('income.index') }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">ဝင်ငွေ</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/outcome*') ? 'active bg-dark text-white' : '' }}"
                            href="{{ route('outcome.index') }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">ထွက်ငွေ</span>
                        </a>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="my-3">
                <!-- Heading -->

                <!-- Navigation -->

            </div>
        </div>
    </div>
</nav>
