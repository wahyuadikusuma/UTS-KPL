<!-- Begin Page Content -->
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pesan Masyarakat</li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <!-- <?= $this->session->flashdata('message'); ?> -->

            <div class="card shadow mb-4">

                <div class="flash-pesan" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>

                <!-- Card Header -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Kelola <?= $subtitle; ?></h6>
                    <a href="<?= base_url('admin/printAllPesan'); ?>" class="btn btn-sm btn-success"><i class="fas fa-fw mr-1 fa-file"></i>Print Pesan Masyarakat</a>
                </div>
                <!-- <?= base_url('admin/exportPesan'); ?> -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table-pesan">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">No.</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Telepon</th>
                                    <th scope="col" width="20%">Pesan</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col" width="10%" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- ini akan diisi oleh datatable pesan -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
        </div>
    </div>