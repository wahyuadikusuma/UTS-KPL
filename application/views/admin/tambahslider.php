<!-- Begin Page Content -->
<div class="container-fluid text-dark">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin/slider'); ?>"><?= $subtitle; ?></a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah <?= $subtitle; ?></li>
        </ol>
    </nav>
    <?= $this->session->flashdata('message'); ?>

    <!-- Page Heading -->
    <!-- <h1 class="h3 text-gray-800"><?= $subtitle; ?></h1> -->
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah <?= $subtitle; ?></h6>
                </div>
                <div class="card-body">
                    <?= form_open_multipart('admin/addSlider'); ?>
                    <label>Contoh :</label>
                    <br>
                    <img src="<?= base_url('assets/img/admin/help/slider_help.png') ?>" alt="" style="width: 550px">

                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <div class="form-group mt-2">
                        <label>Teks 1</label>
                        <input type="text" name="teks1" id="teks1" class="form-control col-lg-8" value="<?= set_value('teks1'); ?>" placeholder="Masukkan judul slider.. *" required>
                        <?= form_error('teks1', '<small class="text-danger" >', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Teks 2</label>
                        <input type="text" name="teks2" id="teks2" class="form-control col-lg-8" value="<?= set_value('teks2'); ?>" placeholder="Masukkan judul slider 2.. *" required>
                        <?= form_error('teks2', '<small class="text-danger" >', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" name="gambar" id="gambar" class="form-control col-lg-4" placeholder="Masukkan judul artikel.." required> <span style="color: brown; font-size:13px">*sebaiknya orientasi foto landscape</span>
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