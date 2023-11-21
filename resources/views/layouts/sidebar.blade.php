<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="dashboard" class="text-nowrap logo-img">
                <img src="{{ asset('storage/files/Logo sipgama.png') }}" width="200" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>

                @can('AdPimBen')
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="dashboard_admin" aria-expanded="false">
                            <span>
                                <i class="ti ti-layout-dashboard"></i>
                            </span>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>
                @endcan

                @can('warga')
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="dashboard_warga" aria-expanded="false">
                            <span>
                                <i class="ti ti-layout-dashboard"></i>
                            </span>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>
                @endcan

                @can('AdPimBen')
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Data Master</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="./register" aria-expanded="false">
                            <span>
                                <i class="ti ti-users"></i>
                            </span>
                            <span class="hide-menu">Data Warga</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="rumah" aria-expanded="false">
                            <span>
                                <i class="ti ti-home"></i>
                            </span>
                            <span class="hide-menu">Data Rumah</span>
                        </a>
                    </li>
                @endcan

                @can('AdBen')
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="tipe_rumah" aria-expanded="false">
                            <span>
                                <i class="ti ti-home-hand"></i>
                            </span>
                            <span class="hide-menu">Data Tipe Rumah</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="metode_pembayaran" aria-expanded="false">
                            <span>
                                <i class="ti ti-cash"></i>
                            </span>
                            <span class="hide-menu">Metode Pembayaran</span>
                        </a>
                    </li>
                @endcan

                @can('AdPimBen')
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Inventaris</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="inventaris" aria-expanded="false">
                            <span>
                                <i class="ti ti-hammer"></i>
                            </span>
                            <span class="hide-menu">Data Inventaris</span>
                        </a>
                    </li>
                @endcan

                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Surat</span>
                </li>

                @can('warga')
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="permohonan" aria-expanded="false">
                            <span>
                                <i class="ti ti-inbox"></i>
                            </span>
                            <span class="hide-menu">Permohonan Surat</span>
                        </a>
                    </li>
                @endcan

                @can('AdPimBen')
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="surat" aria-expanded="false">
                            <span>
                                <i class="ti ti-mail"></i>
                            </span>
                            <span class="hide-menu">Daftar Permohonan Surat</span>
                        </a>
                    </li>
                @endcan

                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Pembayaran</span>
                </li>

                @can('AdPimBen')
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="daftar_iuran" aria-expanded="false">
                            <span>
                                <i class="ti ti-cash"></i>
                            </span>
                            <span class="hide-menu">Daftar Iuran</span>
                        </a>
                    </li>
                @endcan

                @can('warga')
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="pembayaran" aria-expanded="false">
                            <span>
                                <i class="ti ti-cash"></i>
                            </span>
                            <span class="hide-menu">Pembayaran Iuran</span>
                        </a>
                    </li>
                @endcan

                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Laporan Keuangan</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="pengeluaran" aria-expanded="false">
                        <span>
                            <i class="ti ti-businessplan"></i>
                        </span>
                        <span class="hide-menu">Pengeluaran</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="rekapitulasi" aria-expanded="false">
                        <span>
                            <i class="ti ti-chart-line"></i>
                        </span>
                        <span class="hide-menu">Rekapitulasi Keuangan</span>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->

@include('layouts.footer')
