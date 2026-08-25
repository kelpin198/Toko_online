<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-store"></i>
                </div>
                <div class="sidebar-brand-text mx-3">TOKO ONLINE</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('dasboard'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                KATEGORI
            </div>

            <!-- Nav Item - ELEKTRONIK -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('kategori/elektronik'); ?>">
                    <i class="fas fa-fw fa-laptop"></i>
                    <span>ELEKTRONIK</span></a>
            </li>
            <!-- Nav Item - PAKAIAN PRIA -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('kategori/pakaian_pria'); ?>">
                    <i class="fas fa-fw fa-tshirt"></i>
                    <span>PAKAIAN PRIA</span></a>
            </li>
            <!-- Nav Item - PAKAIAN WANITA -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('kategori/pakaian_wanita'); ?>">
                    <i class="fas fa-fw fa-tshirt"></i>
                    <span>PAKAIAN WANITA</span></a>
            </li>
            <!-- Nav Item - PAKAIAN ANAK-ANAK -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('kategori/pakaian_anak_anak'); ?>">
                    <i class="fas fa-fw fa-tshirt"></i>
                    <span>PAKAIAN ANAK-ANAK</span></a>
            </li>
            
             <!-- Nav Item - PERALATAN OLAHRAGA -->
             <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('kategori/peralatan_olahraga'); ?>">
                    <i class="fas fa-fw fa-futbol"></i>
                    <span>PERALATAN OLAHRAGA</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="<?php echo base_url('assets/img/undraw_rocket.svg'); ?>" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto align-items-center">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none align-items-center">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <li class="nav-item align-items-center">
                            <?php $keranjang = 'Keranjang belanja: '.$this->cart->total_items().' items'; ?>
                            <?php echo anchor('dasboard/detail_keranjang', $keranjang, array('class' => 'nav-link')); ?>
                        </li>
                        <li class="nav-item d-none d-sm-flex align-items-center">
                            <div class="topbar-divider"></div>
                        </li>
                        <?php if($this->session->userdata('username')) { ?>
                        <li class="nav-item align-items-center">
                            <span class="nav-link py-0">Selamat datang <?php echo $this->session->userdata('username'); ?></span>
                        </li>
                        <li class="nav-item align-items-center">
                            <?php echo anchor('auth/logout', 'Logout', array('class' => 'nav-link py-0')); ?>
                        </li>
                        <?php } else { ?>
                        <li class="nav-item align-items-center">
                            <?php echo anchor('auth/login', 'Login', array('class' => 'nav-link py-0')); ?>
                        </li>
                        <?php } ?>
                    </ul>
                </nav>
                <!-- End of Topbar -->