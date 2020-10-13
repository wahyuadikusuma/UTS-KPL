<!-- Begin Page Content -->
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Artikel</li>
        </ol>
    </nav>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('message'); ?>
            <div class="flash-artikel" data-flashdata="<?= $this->session->flashdata('artikel'); ?>"></div>
        </div>
    </div>

    <!-- Back to top button -->
    <a id="button"></a>

    <div class="row">
        <div class="col-xl-12 col-lg-12">

            <div class="card mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Kelola <?= $subtitle; ?></h6>
                    <a href="<?= base_url('admin/addArtikel'); ?>" class="btn btn-sm btn-primary"><i class="fas fa-plus mr-2"></i>Posting Artikel</a>
                </div>
                <div class="card-body">
                    <div class="active-cyan-4">
                        <!-- Search form -->
                        <form action="<?= base_url('admin/artikel') ?>" method="get">
                            <div class="input-group mb-3">
                                <input class="form-control col-lg-4" type="text" name="keyword" id="keyword" placeholder="Cari artikel.." aria-label="Search" autofocus>
                                <div class="input-group-append">
                                    <input class="btn btn-primary" type="submit" name="submit">
                                </div>
                            </div>
                        </form>
                        <p> Total : <?= $total_rows; ?> </p>
                    </div>
                    <div class="table-responsive table-bordered">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">No.</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Isi Artikel</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Dibaca</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!$artikel) : ?>
                                    <tr>
                                        <td colspan="7">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-3"></div>
                                                    <div class="alert alert-danger col-lg-6 text-center" role="alert">
                                                        Artikel tidak ada!
                                                        <span style="color: blue">
                                                            Klik tombol kirim untuk refresh.
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <?php foreach ($artikel as $row) : ?>
                                    <tr>
                                        <th scope="row"><?= ++$start; ?></th>
                                        <td><?= $row->judul; ?></td>
                                        <td><?= word_limiter(($this->typography->auto_typography($row->isi_artikel)), 20); ?></td>
                                        <td><img src="<?= base_url('assets/img/admin/artikel/' . $row->gambar); ?>" alt="<?= base_url('assets/img/admin/artikel/senam.jpeg'); ?>" style="width: 100px"></td>
                                        <?php date_default_timezone_set("Asia/Jakarta"); ?>
                                        <td><?= $row->views; ?> kali</td>
                                        <td><?= date('d-m-Y, G:i', $row->tanggal); ?></td>
                                        <td class="justify-content-center">
                                            <a href="<?= base_url('admin/editArtikel/' . $row->id_artikel); ?>" class="btn btn-warning btn-sm d-block mb-1"><i class="far fa-edit"></i> Edit</a>
                                            <a href="<?= base_url('admin/deleteArtikel/' . $row->id_artikel); ?>" class="btn btn-danger btn-sm text-light d-block hapus-artikel"><i class="far fa-trash-alt"></i> Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?= $this->pagination->create_links(); ?>
            </div>
            <!-- Card Body -->
        </div>
    </div>
</div>