<!-- Begin Page Content -->
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $subtitle; ?></li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <!-- <h1 class="h3 text-gray-800"><?= $subtitle; ?></h1> -->
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <?= $this->session->flashdata('message'); ?>

            <div class="card shadow mb-4">
                <div class="flash-materi" data-flashdata="<?= $this->session->flashdata('materi'); ?>"></div>

                <!-- Card Header -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Kelola <?= $subtitle; ?></h6>
                    <a href="<?= base_url('admin/addMateri'); ?>" class="btn btn-sm btn-primary"><i class="fas fa-plus mr-2"></i>Tambah <?= $subtitle; ?></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table-materi">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">No.</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Nama File</th>
                                    <th scope="col" class="text-center">Size</th>
                                    <th scope="col" width="13%" class="text-center">Diunduh</th>
                                    <th scope="col" width="15%">Tanggal</th>
                                    <th scope="col" width="15%" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
        </div>
    </div>