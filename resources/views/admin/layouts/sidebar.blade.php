<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">{{ $settings->site_name }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">{{ $settings->site_name }}</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown {{ setActive(['admin.dashboard']) }}">
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>

            <li class="menu-header">Ecommerce</li>

            <li
                class="dropdown {{ setActive(['admin.category.*', 'admin.sub-category.*', 'admin.child-category.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-list"></i>
                    <span>Manage Categories</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.category.*']) }}"><a class="nav-link"
                            href="{{ route('admin.category.index') }}">Category</a></li>
                    <li class="{{ setActive(['admin.sub-category.*']) }}"><a class="nav-link"
                            href="{{ route('admin.sub-category.index') }}">Sub Category</a></li>
                    <li class="{{ setActive(['admin.child-category.*']) }}"><a class="nav-link"
                            href="{{ route('admin.child-category.index') }}">Child Category</a></li>
                </ul>
            </li>

            <li
                class="dropdown {{ setActive(['admin.brand.*', 'admin.products.*', 'admin.products-image-gallery.*', 'admin.products-variant.*', 'admin.products-variant-item.*', 'admin.seller-products.*', 'admin.seller-pending-products.*', 'admin.reviews.index']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-box"></i>
                    <span>Manage Products</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.brand.*']) }}"><a class="nav-link"
                            href="{{ route('admin.brand.index') }}">Brands</a></li>
                    <li
                        class="{{ setActive(['admin.products.*', 'admin.products-image-gallery.*', 'admin.products-variant.*', 'admin.products-variant-item.*']) }}">
                        <a class="nav-link" href="{{ route('admin.products.index') }}">Product</a>
                    </li>
                    <li class="{{ setActive(['admin.seller-products.*']) }}"><a class="nav-link"
                            href="{{ route('admin.seller-products.index') }}">Seller Products</a></li>
                    <li class="{{ setActive(['admin.seller-pending-products.*']) }}"><a class="nav-link"
                            href="{{ route('admin.seller-pending-products.index') }}">Seller Pending Products</a></li>

                    <li class="{{ setActive(['admin.reviews.index']) }}"><a class="nav-link"
                            href="{{ route('admin.reviews.index') }}">Product Reviews</a></li>
                </ul>
            </li>

            <li
                class="dropdown {{ setActive(['admin.order.*', 'admin.pending-orders', 'admin.processed-orders', 'admin.dropped-off-orders', 'admin.shipped-orders', 'admin.out-for-delivery-orders', 'admin.delivered-orders', 'admin.canceled-orders']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cart-plus"></i>
                    <span>Manage Orders</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.order.*']) }}"><a class="nav-link"
                            href="{{ route('admin.order.index') }}">All Orders</a></li>
                    <li class="{{ setActive(['admin.pending-orders']) }}"><a class="nav-link"
                            href="{{ route('admin.pending-orders') }}">All Pending Orders</a></li>
                    <li class="{{ setActive(['admin.processed-orders']) }}"><a class="nav-link"
                            href="{{ route('admin.processed-orders') }}">All Processed Orders</a></li>
                    <li class="{{ setActive(['admin.dropped-off-orders']) }}"><a class="nav-link"
                            href="{{ route('admin.dropped-off-orders') }}">All Dropped Off Orders</a></li>

                    <li class="{{ setActive(['admin.shipped-orders']) }}"><a class="nav-link"
                            href="{{ route('admin.shipped-orders') }}">All Shipped Orders</a></li>
                    <li class="{{ setActive(['admin.out-for-delivery-orders']) }}"><a class="nav-link"
                            href="{{ route('admin.out-for-delivery-orders') }}">All Out For Delivery Orders</a></li>
                    <li class="{{ setActive(['admin.delivered-orders']) }}"><a class="nav-link"
                            href="{{ route('admin.delivered-orders') }}">All Delivered Orders</a></li>
                    <li class="{{ setActive(['admin.canceled-orders']) }}"><a class="nav-link"
                            href="{{ route('admin.canceled-orders') }}">All Canceled Orders</a></li>
                </ul>
            </li>

            <li class="{{ setActive(['admin.transaction.*']) }}"><a class="nav-link"
                    href="{{ route('admin.transaction') }}"><i class="fas fa-money-bill-alt"></i>
                    <span>Transactions</span></a>
            </li>



            <li
                class="dropdown {{ setActive(['admin.vendor-profile.*', 'admin.flash-sale.*', 'admin.coupons.*', 'admin.shipping-rule.*', 'admin.payment-settings.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-store"></i>
                    <span>Ecommerce</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.flash-sale.*']) }}"><a class="nav-link"
                            href="{{ route('admin.flash-sale.index') }}">Flash Sale</a></li>
                    <li class="{{ setActive(['admin.coupons.*']) }}"><a class="nav-link"
                            href="{{ route('admin.coupons.index') }}">Coupons</a></li>

                    <li class="{{ setActive(['admin.shipping-rule.*']) }}"><a class="nav-link"
                            href="{{ route('admin.shipping-rule.index') }}">Shipping Rule</a></li>

                    <li class="{{ setActive(['admin.vendor-profile.*']) }}"><a class="nav-link"
                            href="{{ route('admin.vendor-profile.index') }}">Vendero Profile</a></li>

                    <li class="{{ setActive(['admin.payment-settings.*']) }}"><a class="nav-link"
                            href="{{ route('admin.payment-settings.index') }}">Payment Settings</a></li>
                </ul>
            </li>

            <li class="dropdown {{ setActive(['admin.withdraw-method.*', 'admin.withdraw.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-wallet"></i>
                    <span>Withdraw Payments</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.withdraw-method.*']) }}"><a class="nav-link"
                            href="{{ route('admin.withdraw-method.index') }}">Withdraw Method</a></li>

                    <li class="{{ setActive(['admin.withdraw.*']) }}"><a class="nav-link"
                            href="{{ route('admin.withdraw.index') }}">Withdraw List</a></li>
                </ul>
            </li>

            <li
                class="dropdown {{ setActive(['admin.slider.*', 'admin.home-page-setting', 'admin.vendor-condition.index', 'admin.about.index', 'admin.terms-and-condition.index']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cog"></i>
                    <span>Manage Website</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.slider.*']) }}"><a class="nav-link"
                            href="{{ route('admin.slider.index') }}">Slider</a></li>
                    <li class="{{ setActive(['admin.home-page-setting']) }}"><a class="nav-link"
                            href="{{ route('admin.home-page-setting') }}">Home Page Setting</a></li>
                    <li class="{{ setActive(['admin.vendor-condition.index']) }}"><a class="nav-link"
                            href="{{ route('admin.vendor-condition.index') }}">Vendor Condition</a></li>
                    <li class="{{ setActive(['admin.about.index']) }}"><a class="nav-link"
                            href="{{ route('admin.about.index') }}">About Page</a></li>

                    <li class="{{ setActive(['admin.terms-and-condition.index']) }}"><a class="nav-link"
                            href="{{ route('admin.terms-and-condition.index') }}">Terms Page</a></li>
                </ul>
            </li>

            <li class="{{ setActive(['admin.advertisement.index']) }}"><a class="nav-link"
                    href="{{ route('admin.advertisement.index') }}"><i class="fas fa-ad"></i>
                    <span>Advertisement</span></a>
            </li>

            <li class="dropdown {{ setActive(['admin.blog-category.*', 'admin.blog.*', 'admin.blog-comments.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fab fa-blogger"></i>
                    <span>Manage Blog</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.blog-category.*']) }}"><a class="nav-link"
                            href="{{ route('admin.blog-category.index') }}">Categories</a></li>
                    <li class="{{ setActive(['admin.blog.*']) }}"><a class="nav-link"
                            href="{{ route('admin.blog.index') }}">Blog</a></li>
                    <li class="{{ setActive(['admin.blog-comments.*']) }}"><a class="nav-link"
                            href="{{ route('admin.blog-comments.index') }}">Blog Comment</a></li>
                </ul>
            </li>

            <li class="{{ setActive(['admin.messages.index']) }}"><a class="nav-link"
                    href="{{ route('admin.messages.index') }}"><i class="fas fa-comment"></i>
                    <span>Messages</span></a>
            </li>

            <li class="menu-header">Setting & More</li>

            <li
                class="dropdown {{ setActive(['admin.footer-info.index', 'admin.footer-socials.*', 'admin.footer-grid-two.*', 'admin.footer-grid-three.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-th-large"></i>
                    <span>Footer</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.footer-info.index']) }}"><a class="nav-link"
                            href="{{ route('admin.footer-info.index') }}">Footer Info</a></li>
                    <li class="{{ setActive(['admin.footer-socials.*']) }}"><a class="nav-link"
                            href="{{ route('admin.footer-socials.index') }}">Footer Social</a></li>

                    <li class="{{ setActive(['admin.footer-grid-two.*']) }}"><a class="nav-link"
                            href="{{ route('admin.footer-grid-two.index') }}">Footer Grid Two</a></li>
                    <li class="{{ setActive(['admin.footer-grid-three.*']) }}"><a class="nav-link"
                            href="{{ route('admin.footer-grid-three.index') }}">Footer Grid Three</a></li>
                </ul>
            </li>


            <li
                class="dropdown {{ setActive(['admin.vendor-request.index', 'admin.customer.index', 'admin.vendor-list.index', 'admin.admin-list.index', 'admin.manage-user.index']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i>
                    <span>Users</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.customer.index']) }}"><a class="nav-link"
                            href="{{ route('admin.customer.index') }}">Customers</a></li>
                    <li class="{{ setActive(['admin.vendor-list.index']) }}"><a class="nav-link"
                            href="{{ route('admin.vendor-list.index') }}">Vendors</a></li>
                    <li class="{{ setActive(['admin.vendor-request.index']) }}"><a class="nav-link"
                            href="{{ route('admin.vendor-request.index') }}">Pending Vendors</a></li>
                    <li class="{{ setActive(['admin.admin-list.index']) }}"><a class="nav-link"
                            href="{{ route('admin.admin-list.index') }}">Admin List</a></li>
                    <li class="{{ setActive(['admin.manage-user.index']) }}"><a class="nav-link"
                            href="{{ route('admin.manage-user.index') }}">Manage User</a></li>
                </ul>
            </li>


            <li class="{{ setActive(['admin.subscribers.index']) }}"><a class="nav-link"
                    href="{{ route('admin.subscribers.index') }}"><i class="fas fa-user"></i>
                    <span>Subscribe</span></a>
            </li>

            <li class="{{ setActive(['admin.settings.*']) }}"><a class="nav-link"
                    href="{{ route('admin.settings.index') }}"><i class="fas fa-wrench"></i>
                    <span>Settings</span></a>
            </li>

        </ul>
    </aside>
</div>
