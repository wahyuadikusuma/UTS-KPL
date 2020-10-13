<!-- Begin Page Content -->
<div class="container-fluid text-dark">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin/kegiatan'); ?>"><?= $subtitle; ?></a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit <?= $subtitle; ?></li>
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
                    <?= form_open_multipart('admin/editKegiatan/' . $kegiatan->id_kegiatan); ?>
                    <div class="form-group col-md-8">
                        <label>Nama Kegiatan</label>
                        <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control" value="<?= $kegiatan->nama_kegiatan ?>" placeholder="Masukkan Nama Pokja.. *" required>
                        <?= form_error('nama_kegiatan', '<small class="text-danger" >', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-8">
                        <label>Nama Pokja</label>
                        <br>
                        <select name="id_pokja" id="id_pokja" class="form-control">
                            <option value="">--- Pilih Nama Pokja ---</option>
                            <?php foreach ($pokja as $p) { ?>
                                <?php if ($p->id_pokja == $kegiatan->id_pokja) : ?>
                                    <option value="<?= $p->id_pokja; ?>" selected="selected"><?= $p->nama_pokja; ?></option>
                                <?php else : ?>
                                    <option value="<?= $p->id_pokja; ?>"><?= $p->nama_pokja; ?></option>
                                <?php endif; ?>
                            <?php } ?>
                        </select>
                        <?= form_error('id_pokja', '<small class="text-danger" >', '</small>'); ?>
                    </div>
                    <div class="form-group col-lg-4 col-md-6">
                        <label>Gambar</label>
                        <br>
                        <img src="<?= base_url('assets/img/admin/kegiatan/' . $kegiatan->gambar); ?>" class="mb-2" style="max-width: 330px; max-height:220px" alt="">
                        <input type="file" name="gambar" id="gambar" class="form-control " placeholder="Masukkan gambar kegiatan.."> <span style="color: brown; font-size:13px">*sebaiknya orientasi foto potrait</span>
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