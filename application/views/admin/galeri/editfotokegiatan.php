<!-- Begin Page Content -->
<div class="container-fluid text-dark">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin/kegiatan'); ?>"><?= $subtitle; ?></a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit <?= $subtitle; ?></li>
        </ol>
    </nav>
    <!-- menampilkan pesan error -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <?= $this->session->flashdata('message'); ?>
            <div class="card shadow">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary text-lg">Edit <?= $subtitle; ?></h6>
                </div>
                <div class="card-body">
                    <?= form_open_multipart('admin/editFotoKegiatan/' . $foto->id_item); ?>
                    <div class="form-group col-md-8">
                        <label>Nama Kegiatan</label>
                        <br>
                        <select name="id_kegiatan" id="id_kegiatan" class="form-control">
                            <option value="">--- Pilih Nama Kegiatan ---</option>
                            <?php foreach ($kegiatan as $k) { ?>
                                <?php if ($k->id_kegiatan == $foto->id_kegiatan) : ?>
                                    <option value="<?= $k->id_kegiatan; ?>" selected="selected"><?= $k->nama_kegiatan . ' | Pokja ' . $k->nama_pokja; ?></option>
                                <?php else : ?>
                                    <option value="<?= $k->id_kegiatan; ?>"><?= $k->nama_kegiatan . ' | Pokja ' . $k->nama_pokja; ?></option>
                                <?php endif; ?>
                            <?php } ?>
                        </select>
                        <?= form_error('id_kegiatan', '<small class="text-danger" >', '</small>'); ?>
                    </div>
                    <div class="form-group col-lg-4 col-md-6">
                        <label>Gambar</label>
                        <br>
                        <img src="<?= base_url('assets/img/admin/fotokegiatan/' . $foto->foto); ?>" class="mb-2" style="max-width: 330px; max-height:220px" alt="">
                        <input type="file" name="foto" id="foto" class="form-control " placeholder="Masukkan foto kegiatan.."> <span style="color: brown; font-size:13px">*sebaiknya orientasi foto landscape</span>
                    </div>


                    <div class="form-group ml-3 mt-2">
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