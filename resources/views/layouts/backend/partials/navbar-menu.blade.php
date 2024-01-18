<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        @if(\Request::user('admin')->hasPermission('app.dashboard'))
        <a href="{{ route('app.dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('images/Klaudio-Fashion-Logo-White.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('images/Klaudio-Fashion-Logo-White.png') }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('app.dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('images/Klaudio-Fashion-Logo-White.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('images/Klaudio-Fashion-Logo-White.png') }}" alt="" width="80%">
            </span>
        </a>
        @endif
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                @if(\Request::user('admin')->hasPermission('app.dashboard'))
                {{-- Dashboard module --}}
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('app.dashboard') }}" role="button"
                        aria-expanded="false">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Paneli</span>
                    </a>
                </li>
                @endif
                @if(\Request::user('admin')->hasPermission('app.pos.index'))
                {{-- POS System module --}}
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-pages-line"></i> <span data-key="t-dashboards">Sistemi POS</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('app.pos.index') }}" class="nav-link" data-key="t-ecommerce"> Menaxho POS </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif
                @if(\Request::user('admin')->hasPermission('app.product.index'))
                {{-- Product module --}}
                <li class="menu-title"><span data-key="t-menu">Ecommerce</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarProduct" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarProduct">
                        <i class="ri-product-hunt-fill"></i> <span data-key="t-dashboards">Produktet</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarProduct">
                        <ul class="nav nav-sm flex-column">
                            @if(\Request::user('admin')->hasPermission('app.product.create'))
                            <li class="nav-item">
                                <a href="{{ route('app.product.create') }}" class="nav-link" data-key="t-ecommerce">Shto
                                    Produkt</a>
                            </li>
                            @endif
                            <li class="nav-item">
                                <a href="{{ route('app.product.index') }}" class="nav-link" data-key="t-ecommerce">Lista
                                    e Produkteve</a>
                            </li>
                            @if(\Request::user('admin')->hasPermission('app.categories.index'))
                            <li class="nav-item">
                                <a href="{{ route('categories.index') }}" class="nav-link"
                                    data-key="t-ecommerce">Kategoritë</a>
                            </li>
                            @endif
                            @if(\Request::user('admin')->hasPermission('app.attributes.index'))
                            <li class="nav-item">
                                <a href="{{ route('attributes.index') }}" class="nav-link"
                                    data-key="t-ecommerce">Atributet</a>
                            </li>
                            @endif
                            @if(\Request::user('admin')->hasPermission('app.size-guides.index'))
                            <li class="nav-item">
                                <a href="{{ route('size-guides.index') }}" class="nav-link"
                                    data-key="t-ecommerce">Guida e përmasave</a>
                            </li>
                            @endif
                            @if(\Request::user('admin')->hasPermission('app.filter-attributes.index'))
                            <li class="nav-item">
                                <a href="{{ route('filter-attributes.index') }}" class="nav-link"
                                    data-key="t-ecommerce">Detajet</a>
                            </li>
                            @endif
                            @if(\Request::user('admin')->hasPermission('app.collections.index'))
                            <li class="nav-item">
                                <a href="{{ route('collections.index') }}" class="nav-link"
                                    data-key="t-ecommerce">Koleksione Produktesh</a>
                            </li>
                            @endif
                            @if(\Request::user('admin')->hasPermission('app.tags.index'))
                            <li class="nav-item">
                                <a href="{{ route('tags.index') }}" class="nav-link" data-key="t-ecommerce">Etiketa e Produktit</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif
                @if(\Request::user('admin')->hasPermission('app.orders.index'))
                {{-- Order module --}}
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarOrder" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarOrder">
                        <i class="ri-stack-line"></i> <span data-key="t-dashboards">Porositë</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarOrder">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('app.orders.index') }}" class="nav-link" data-key="t-ecommerce">Lista e Porosive</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('app.order-statuses.index') }}" class="nav-link" data-key="t-ecommerce">Statusi i Porosisë</a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif
                @if(\Request::user('admin')->hasPermission('app.customers.index'))
                {{-- Customer module --}}
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarCustomer" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarCustomer">
                        <i class="ri-stack-line"></i> <span data-key="t-dashboards">Klientët</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarCustomer">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('customers.index') }}" class="nav-link" data-key="t-ecommerce">Klientët CMS</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('customers.web') }}" class="nav-link" data-key="t-ecommerce">Klientët WEB</a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif
                {{-- Marketing module --}}
                <li class="menu-title"><span data-key="t-menu">Marketingu</span></li>
                @if(\Request::user('admin')->hasPermission('app.flash-sale.index'))
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('flash-sale.index') }}" role="button"
                        aria-expanded="false">
                        <i class="ri-dropbox-line"></i> <span data-key="t-dashboards">Flash Sale</span>
                    </a>
                </li>
                @endif
                @if(\Request::user('admin')->hasPermission('app.coupons.index'))
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('coupons.index') }}" role="button" aria-expanded="false">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Kuponat</span>
                    </a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#" role="button" aria-expanded="false">
                        <i class="ri-newspaper-line "></i> <span data-key="t-dashboards">Newsletter</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#" role="button" aria-expanded="false">
                        <i class="ri-team-fill"></i> <span data-key="t-dashboards">Subscribers</span>
                    </a>
                </li>
                @if(\Request::user('admin')->hasPermission('app.sliders.index'))
                {{-- Banner module --}}
                <li class="menu-title"><span data-key="t-menu">Website Setup</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('banners.index') }}" role="button"
                        aria-expanded="false">
                        <i class="ri-gallery-fill"></i> <span data-key="t-dashboards">Banerat & Sliders</span>
                    </a>
                </li>
                @endif
                @if(\Request::user('admin')->hasPermission('app.countries.index'))
                {{-- Setting module --}}
                <li class="menu-title"><span data-key="t-menu">Konfigurimet</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarShipping" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarShipping">
                        <i class="ri-e-bike-line"></i> <span data-key="t-dashboards">Shipping</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarShipping">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('countries.index') }}" class="nav-link"
                                    data-key="t-ecommerce">Shipping Countries</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('cities.index') }}" class="nav-link"
                                    data-key="t-ecommerce">Shipping Cities</a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif
                @if(\Request::user('admin')->hasPermission('app.admins.index'))
                {{-- Staff module --}}
                <li class="menu-title"><span data-key="t-menu">Sistemi i Perdoruesit</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarStaff" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarStaff">
                        <i class="ri-account-circle-line"></i><span data-key="t-dashboards">Stafi</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarStaff">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('app.admins.index') }}" class="nav-link" data-key="t-ecommerce">Lista e Stafit</a>
                            </li>
                            @if(\Request::user('admin')->hasPermission('app.roles.index'))
                            <li class="nav-item">
                                <a href="{{ route('roles.index') }}" class="nav-link" data-key="t-ecommerce">Rolet & Lejet</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif
            </ul>
        </div>
    </div>

    <div class="sidebar-background"></div>
</div>
