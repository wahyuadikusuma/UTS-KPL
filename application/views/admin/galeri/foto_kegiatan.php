<!-- Begin Page Content -->
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $subtitle; ?></li>
        </ol>
    </nav>

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <?= $this->session->flashdata('message'); ?>
            <!-- <?= $this->session->flashdata('foto_kegiatan'); ?> -->

            <div class="card shadow mb-4">
                <div class="flash-fotokegiatan" data-flashdata="<?= $this->session->flashdata('foto_kegiatan'); ?>"></div>

                <!-- Card Header -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Kelola <?= $subtitle; ?></h6>
                    <a href="<?= base_url('admin/addFotoKegiatan'); ?>" class="btn btn-sm btn-primary"><i class="fas fa-plus mr-2"></i>Tambah <?= $subtitle; ?></a>
                </div>
                <!-- <?= base_url('admin/exportPesan'); ?> -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table-fotokegiatan">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">No.</th>
                                    <th scope="col" width="30%">Nama Pokja</th>
                                    <th scope="col">Nama Kegiatan</th>
                                    <th scope="col">Foto</th>
                                    <!-- <th scope="col">Teks 2</th> -->
                                    <th scope="col" width="16%" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
        </div>
    </div>