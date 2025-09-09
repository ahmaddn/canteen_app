<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li><a href="{{ route('dashboard') }}" class="" aria-expanded="false">
                    <i class="fas fa-home"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li><a href="{{ route('categories.index') }}" class="" aria-expanded="false">
                    <i class="fa fa-folder"></i>
                    <span class="nav-text">Categories</span>
                </a>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-shopping-bag"></i>
                    <span class="nav-text">Products</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('products.index') }}">Index</a></li>
                    <li><a href="{{ route('products.add') }}">Add</a></li>
                </ul>
            </li>
            <li><a href="{{ route('orders.index') }}" class="" aria-expanded="false">
                    <i class="fas fa-cart-arrow-down"></i>
                    <span class="nav-text">Orders</span>
                </a>
            </li>
        </ul>
        <div class="copyright">
            <p><strong>Labantik</strong> © 2025 All Rights Reserved</p>
            <p class="fs-12">Made with <span class="heart"></span> by Najmy Ahmad</p>
        </div>
    </div>
</div>
