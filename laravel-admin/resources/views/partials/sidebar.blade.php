<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-text mx-3">Laravel Admin</div>
    </a>
    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard"><i class="fas fa-fw fa-home"></i><span>Home</span></a>
    </li>
    <li class="nav-item {{ request()->is('product') ? 'active' : '' }}">
        <a class="nav-link" href="/product"><i class="fas fa-fw fa-box"></i><span>Product</span></a>
    </li>
    <li class="nav-item {{ request()->is('service') ? 'active' : '' }}">
        <a class="nav-link" href="/service"><i class="fas fa-fw fa-cogs"></i><span>Service</span></a>
    </li>
    <li class="nav-item {{ request()->is('contact') ? 'active' : '' }}">
        <a class="nav-link" href="/contact"><i class="fas fa-fw fa-envelope"></i><span>Contact</span></a>
    </li>
    <li class="nav-item {{ request()->is('about') ? 'active' : '' }}">
        <a class="nav-link" href="/about"><i class="fas fa-fw fa-info-circle"></i><span>About</span></a>
    </li>
</ul>