<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/beritas*') ? 'active' : '' }}" href="/dashboard/beritas">
                    <span data-feather="file-text"></span>
                    Artikel
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/categories') ? 'active' : '' }}" aria-current="page" href="/dashboard/categories">
                    <span data-feather="file-text"></span>
                    Kategori
                </a>
            </li>
        </ul>
    </div>
</nav>
