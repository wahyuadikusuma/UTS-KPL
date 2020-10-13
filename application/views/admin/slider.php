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
                <div class="flash-slider" data-flashdata="<?= $this->session->flashdata('slider'); ?>"></div>

                <!-- Card Header -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Kelola <?= $subtitle; ?></h6>
                    <a href="<?= base_url('admin/addSlider'); ?>" class="btn btn-sm btn-primary"><i class="fas fa-plus mr-2"></i>Tambah <?= $subtitle; ?></a>
                </div>
                <!-- <?= base_url('admin/exportPesan'); ?> -->
                <div class="card-body">
                    <div class="table-responsive table-bordered">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">No.</th>
                                    <th scope="col">Teks 1</th>
                                    <th scope="col">Teks 2</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col" class="text-center" width="17%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!$slider) : ?>
                                    <tr>
                                        <td colspan="5">
                                            <div class="text-center">
                                                Tidak ada data
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <?php $i = 1;
                                foreach ($slider as $row) { ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $row->teks1; ?></td>
                                        <td><?= $row->teks2; ?></td>
                                        <td><img src="<?= base_url('assets/img/admin/slider/' . $row->gambar); ?> " style="max-width: 150px" alt=""></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('admin/editSlider/' . $row->id); ?>" class="btn btn-warning btn-sm"><i class="far fa-edit"></i> Edit</a>
                                            <a href="<?= base_url('admin/deleteSlider/' . $row->id); ?>" class="btn btn-danger btn-sm text-light hapus-slider"><i class="far fa-trash-alt"></i> Hapus</a>
                                        </td>
                                    </tr>
                                <?php $i++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
        </div>
    </div>