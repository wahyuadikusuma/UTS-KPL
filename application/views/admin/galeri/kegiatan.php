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
                <div class="flash-kegiatan" data-flashdata="<?= $this->session->flashdata('kegiatan'); ?>"></div>

                <!-- Card Header -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Kelola <?= $subtitle; ?></h6>
                    <a href="<?= base_url('admin/addKegiatan'); ?>" class="btn btn-sm btn-primary"><i class="fas fa-plus mr-2"></i>Tambah <?= $subtitle; ?></a>
                </div>
                <!-- <?= base_url('admin/exportPesan'); ?> -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table-kegiatan">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">No.</th>
                                    <th scope="col">Nama Pokja</th>
                                    <th scope="col">Nama Kegiatan</th>
                                    <th scope="col">Gambar</th>
                                    <!-- <th scope="col">Teks 2</th> -->
                                    <th scope="col" width="15%" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <?php if (!$kegiatan) : ?>
                                    <tr>
                                        <td colspan="5">
                                            <div class="text-center">
                                                Tidak ada data
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <?php $i = 1;
                                foreach ($kegiatan as $row) { ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $row->nama_pokja; ?></td>
                                        <td><?= $row->nama_kegiatan; ?></td>
                                        <td><img src="<?= base_url('assets/img/admin/kegiatan/' . $row->gambar); ?> " style="max-width: 150px" alt=""></td>
                                        <td class="justify-content-between">
                                            <a href="<?= base_url('admin/editKegiatan/' . $row->id_kegiatan); ?>" class="btn btn-warning btn-sm"><i class="far fa-edit"></i> Edit</a>
                                            <a href="<?= base_url('admin/deleteKegiatan/' . $row->id_kegiatan); ?>" class="btn btn-danger btn-sm text-light hapus-kegiatan"><i class="far fa-trash-alt"></i> Hapus</a>
                                        </td>
                                    </tr>
                                <?php $i++;
                                } ?> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
        </div>
    </div>