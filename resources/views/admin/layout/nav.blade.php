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
                        <a class="nav-link active" href="examples/dashboard.html">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('product.index') }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Products</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('category.index') }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Category</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('brand.index') }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Brand</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('color.index') }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Color</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('supplier.index') }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Supplier</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/admin/product-add-transaction') }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Product Transaction</span>
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
