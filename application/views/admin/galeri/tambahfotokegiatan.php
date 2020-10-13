<!-- Begin Page Content -->
<div class="container-fluid text-dark">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin/foto_kegiatan'); ?>"><?= $subtitle; ?></a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah <?= $subtitle; ?></li>
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
                    <h6 class="m-0 font-weight-bold text-primary">Tambah <?= $subtitle; ?></h6>
                </div>
                <div class="card-body">

                    <?= form_open_multipart('admin/addFotoKegiatan'); ?>
                    <div class="form-group col-md-8">
                        <label>Nama Kegiatan</label>
                        <br>
                        <select name="id_kegiatan" id="id_kegiatan" class="form-control">
                            <option value="" selected="selected">--- Pilih Nama Kegiatan ---</option>
                            <?php foreach ($kegiatan as $k) { ?>
                                <option value="<?= $k->id_kegiatan; ?>"><?= $k->nama_kegiatan . ' | Pokja ' . $k->nama_pokja ?></option>
                            <?php } ?>
                        </select>
                        <?= form_error('id_kegiatan', '<small class="text-danger" >', '</small>'); ?>
                    </div>
                    <div class="form-group col-lg-4 col-md-6">
                        <label>Gambar</label>
                        <input type="file" name="foto" id="foto" class="form-control " placeholder="Masukkan foto kegiatan.." required> <span style="color: brown; font-size:13px">*format gambar gif / jpg / png / jpeg</span>
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