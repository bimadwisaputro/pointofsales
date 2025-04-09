<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed sidebarleft" id="dashboard" parentid="0" href="/dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-heading">Masters</li>
        <li class="nav-item">
            <a class="nav-link collapsed" id="masters" data-bs-target="#masters-nav" data-bs-toggle="collapse"
                href="#">
                <i class="bi bi-menu-button-wide"></i><span>Masters</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="masters-nav" class="nav-content collapse " data-bs-parent="#masters-nav">
                <li>
                    <a href="/categories" id="categories" parentid="masters" class="sidebarleft">
                        <i class="bi bi-circle"></i><span>Categories</span>
                    </a>
                </li>
                <li>
                    <a href="/users" id="users" parentid="masters" class="sidebarleft">
                        <i class="bi bi-circle"></i><span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="/product" id="product" parentid="masters" class="sidebarleft">
                        <i class="bi bi-circle"></i><span>Product</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-heading">Pos</li>
        <li class="nav-item">
            <a class="nav-link collapsed" id="poss" data-bs-target="#poss-nav" data-bs-toggle="collapse"
                href="#">
                <i class="bi bi-menu-button-wide"></i><span>Pos Manage</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="poss-nav" class="nav-content collapse " data-bs-parent="#poss-nav">
                <li>
                    <a href="{{ route('pos.create') }}" id="poscreate" parentid="poss" class="sidebarleft">
                        <i class="bi bi-circle"></i><span>Pos Create</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pos.index') }}" id="pos" parentid="poss" class="sidebarleft">
                        <i class="bi bi-circle"></i><span>Pos Sale</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->
    </ul>

</aside><!-- End Sidebar-->
