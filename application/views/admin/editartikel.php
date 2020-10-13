<!-- Begin Page Content -->
<div class="container-fluid text-dark">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin/artikel'); ?>">Artikel</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Artikel</li>
        </ol>
    </nav>
    <!-- Page Heading -->
    <!-- <h1 class="h3 text-gray-800"><?= $subtitle; ?></h1> -->
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <?= $this->session->flashdata('message'); ?>
            <div class="card shadow">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit <?= $subtitle; ?></h6>
                </div>
                <div class="card-body">
                    <?= form_open_multipart('admin/editArtikel/' . $artikel->id_artikel); ?>
                    <div class="form-group">
                        <label>Penulis</label>
                        <input type="text" name="penulis" id="penulis" class="form-control col-lg-4" value="<?= $artikel->penulis ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Judul Artikel</label>
                        <input type="text" name="judul" id="judul" class="form-control col-lg-8" value="<?= $artikel->judul ?>" placeholder="Masukkan judul artikel.. *" required>
                        <?= form_error('judul', '<small class="text-danger" >', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Isi Artikel</label>
                        <textarea type="text" name="isi_artikel" class="form-control col-lg-10 col-md-12 col-sm-9" id="isi_artikel" rows="5" placeholder="Masukkan isi artikel.. *" required><?= $artikel->isi_artikel ?></textarea>
                    </div>

                    <img src="<?= base_url('assets/img/admin/artikel/' . $artikel->gambar); ?>" class="mb-2" style="max-width: 330px; max-height:220px" alt="">
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" name="gambar" id="gambar" class="form-control col-lg-4" placeholder="Masukkan judul artikel.."> <span style="color: brown; font-size:13px">*sebaiknya foto berorientasi landscape </br> *format gambar gif/jpg/png/jpeg'</span>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                        </div>

                    </div>

                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="far fa-paper-plane"></i> Save
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                    </div>

                    <?= form_close(); ?>
                </div>
            </div>
            <!-- Card Body -->
        </div>
    </div>