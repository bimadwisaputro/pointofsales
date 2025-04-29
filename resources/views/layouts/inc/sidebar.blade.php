<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed sidebarleft" id="dashboard" parentid="0" href="/dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->


        {{-- <li class="nav-item">
            <a class="nav-link collapsed" id="masters" data-bs-target="#masters-nav" data-bs-toggle="collapse"
                href="#">
                <i class="bi bi-menu-button-wide"></i><span>Masters</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="masters-nav" class="nav-content collapse " data-bs-parent="#masters-nav">

            </ul>
        </li>  --}}
        @if (array_intersect(['Kasir'], session('session_roles', [])))
            <li class="nav-heading">Quicklink</li>
            <li class="nav-item">
                <a class="nav-link collapsed sidebarleft" id="kasir" parentid="0" target="_blank" href="/kasir">
                    <i class="bi bi-calculator"></i>
                    <span>Kasir</span>
                </a>
            </li>
            <li class="nav-heading"></li>
        @endif


        @if (array_intersect(['Kasir', 'Administrator'], session('session_roles', [])))

            <li class="nav-heading">Masters</li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#masters-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Master Data</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="masters-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    @if (array_intersect(['Administrator'], session('session_roles', [])))
                        <li>
                            <a href="/roles" id="roles" parentid="masters" class="sidebarleft">
                                <i class="bi bi-circle"></i><span>Level</span>
                            </a>
                        </li>
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
                    @endif
                    @if (array_intersect(['Kasir', 'Administrator'], session('session_roles', [])))
                        <li>
                            <a href="/product" id="product" parentid="masters" class="sidebarleft">
                                <i class="bi bi-circle"></i><span>Product</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li><!-- End Components Nav -->
        @endif
        @if (array_intersect(['Kasir'], session('session_roles', [])))
            <li class="nav-heading">Pos</li>
            <li class="nav-item">
                <a class="nav-link collapsed" id="poss" data-bs-target="#poss-nav" data-bs-toggle="collapse"
                    href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Pos Manage</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="poss-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('pos.create') }}" id="poscreate" parentid="poss" class="sidebarleft"
                            target="_blank">
                            <i class="bi bi-circle"></i><span>Pos Create (Kasir)</span>
                        </a>
                    </li>
                    <li>
                        <a href="/pos" id="pos" parentid="poss" class="sidebarleft">
                            <i class="bi bi-circle"></i><span>Pos Sale</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->
        @endif
        @if (in_array('Pimpinan', session('session_roles', [])))
            <li class="nav-heading">Reports</li>
            <li class="nav-item">
                <a class="nav-link collapsed" id="reports" data-bs-target="#reports-nav" data-bs-toggle="collapse"
                    href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="reports-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/laporan-penjualan" id="laporan-penjualan" parentid="reports" class="sidebarleft">
                            <i class="bi bi-circle"></i><span>Laporan Penjualan</span>
                        </a>
                    </li>
                    <li>
                        <a href="/laporan-stokbarang" id="laporan-stokbarang" parentid="reports" class="sidebarleft">
                            <i class="bi bi-circle"></i><span>Stok Barang</span>
                        </a>
                    </li>
                    <li>
                        <a href="/laporan-summary" id="laporan-summary" parentid="reports" class="sidebarleft">
                            <i class="bi bi-circle"></i><span>Summary Penjualan</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->
        @endif
    </ul>

</aside><!-- End Sidebar-->
