<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
                <div class="sidebar-brand-icon">
                    <img src="<?= base_url('assets/img/logo/logopkk.png') ?>" alt="" style="width: 50px">
                </div>
                <div class="sidebar-brand-text mx-3">TPPKK WNG</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                My Profile
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item <?php echo $this->uri->segment(2) == 'profil' ? 'active border-left-warning bg-gray-900 text-dark mt-1 mb-1' : '' ?>">
                <a class="nav-link " href="<?= base_url('admin/profil'); ?>">
                    <img class="img-profile rounded-circle mr-1" src="<?= base_url('assets/img/admin/avatar/') . $image; ?>">
                    <span><?= $name; ?></span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Overall
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php echo $this->uri->segment(2) == 'dashboard' ? 'active border-left-warning bg-gray-900 text-dark mt-1 mb-1' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/dashboard'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Beranda
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item <?php echo $this->uri->segment(2) == 'slider' | $this->uri->segment(2) == 'editSlider' | $this->uri->segment(2) == 'addSlider' ? 'active border-left-warning bg-gray-900 text-dark mt-1 mb-1' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/slider'); ?>">
                    <i class="fas fa-fw fa-images"></i>
                    <span>Slider</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Kelola Informasi
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item <?php echo $this->uri->segment(2) == 'artikel' | $this->uri->segment(2) == 'addArtikel' | $this->uri->segment(2) == 'editArtikel' ? 'active border-left-warning bg-gray-900 text-dark mt-1 mb-1' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/artikel'); ?>">
                    <i class="fas fa-file-alt"></i>
                    <span>Artikel</span></a>
            </li>

            <li class="nav-item <?php echo $this->uri->segment(2) == 'materi' | $this->uri->segment(2) == 'addMateri' | $this->uri->segment(2) == 'editMateri' ? 'active border-left-warning bg-gray-900 text-dark mt-1 mb-1' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/materi'); ?>">
                    <i class="far fa-file"></i>
                    <span>Materi</span></a>
            </li>


            <!-- Nav Item - Charts -->
            <li class="nav-item <?php echo $this->uri->segment(2) == 'pesan' ? 'active border-left-warning bg-gray-900 text-dark mt-1 mb-1' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/pesan'); ?>">
                    <i class="far fa-comment-alt"></i>
                    <span>Pesan Masyarakat</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Kelola Galeri
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item <?php echo $this->uri->segment(2) == 'pokja' | $this->uri->segment(2) == 'addPokja' | $this->uri->segment(2) == 'editPokja' ? 'active border-left-warning bg-gray-900 text-dark mt-1 mb-1' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/pokja'); ?>">
                    <i class="fas fa-users"></i>
                    <span>Pokja</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item <?php echo $this->uri->segment(2) == 'kegiatan' | $this->uri->segment(2) == 'addKegiatan' | $this->uri->segment(2) == 'editKegiatan' ? 'active border-left-warning bg-gray-900 text-dark mt-1 mb-1' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/kegiatan'); ?>">
                    <i class="far fa-fw fa-calendar-alt"></i>
                    <span>Kegiatan</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item <?php echo $this->uri->segment(2) == 'foto_kegiatan' | $this->uri->segment(2) == 'editFotoKegiatan' | $this->uri->segment(2) == 'addFotoKegiatan' ? 'active border-left-warning bg-gray-900 text-dark mt-1 mb-1' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/foto_kegiatan'); ?>">
                    <i class="far fa-fw fa-images"></i>
                    <span>Foto Kegiatan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Heading -->
            <div class="sidebar-heading">
                Bantuan
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item <?php echo $this->uri->segment(2) == 'bantuan' ? 'active border-left-warning bg-gray-900 text-dark mt-1 mb-1' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/bantuan'); ?>">
                    <i class="far fa-question-circle"></i>
                    <span>Bantuan</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->