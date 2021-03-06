<!-- Begin Page Content -->
<div class="container-fluid text-dark">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin/pokja'); ?>"><?= $subtitle; ?></a></li>
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
                    <?= form_open_multipart('admin/addPokja'); ?>
                    <div class="form-group">
                        <label>Nama Pokja</label>
                        <input type="text" name="nama_pokja" id="nama_pokja" class="form-control col-lg-8" value="<?= set_value('nama_pokja'); ?>" placeholder="Masukkan Nama Pokja.. *" required>
                        <?= form_error('teks1', '<small class="text-danger" >', '</small>'); ?>
                    </div>
                    <!-- <div class="form-group">
                        <label>Teks 2</label>
                        <input type="text" name="teks2" id="teks2" class="form-control col-lg-8" value="<?= set_value('teks2'); ?>" placeholder="Masukkan judul artikel.. *" required>
                        <?= form_error('teks2', '<small class="text-danger" >', '</small>'); ?>
                    </div> -->
                    <div class="form-group">
                        <label>Logo</label>
                        <input type="file" name="logo" id="logo" class="form-control col-lg-4" placeholder="Masukkan logo pokja.." required> <span style="color: brown; font-size:13px">*format gambar gif / jpg / png / jpeg</span>
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
        </div>
    </div>
    <!-- Card Body -->