<!-- Begin Page Content -->
<div class="container-fluid text-dark">
    <!-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin/artikel'); ?>">Artikel</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Artikel</li>
        </ol>
    </nav> -->
    <!-- Page Heading -->
    <!-- <h1 class="h3 text-gray-800"><?= $subtitle; ?></h1> -->
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <?= $this->session->flashdata('message'); ?>
            <div class="card shadow">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Profil</h6>
                </div>
                <div class="card-body">
                    <?= form_open_multipart('admin/editProfil'); ?>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" id="name" class="form-control col-lg-8" value="<?= $name ?>" placeholder="Masukkan nama.. *" required>
                        <?= form_error('name', '<small class="text-danger" >', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" id="username" class="form-control col-lg-8" value="<?= $username ?>" placeholder="Masukkan username.. *" required>
                        <?= form_error('username', '<small class="text-danger" >', '</small>'); ?>
                    </div>

                    <img src="<?= base_url('assets/img/admin/avatar/' . $image); ?>" class="mb-2" style="max-width: 330px; max-height:220px" alt="">
                    <div class="form-group">
                        <label>Foto Profil</label>
                        <input type="file" name="image" id="image" class="form-control col-lg-4"> <span style="color: brown; font-size:13px">*sebaiknya orientasi foto landscape</span>
                    </div>
                    <!-- <div class="row">
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-4">
                        </div>

                    </div> -->

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