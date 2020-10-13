<!-- Begin Page Content -->
<div class="container-fluid text-dark">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin/materi'); ?>"><?= $subtitle; ?></a></li>
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
                    <?= form_open_multipart('admin/editMateri/' . $file->id_materi); ?>
                    <div class="form-group col-md-12">
                        <label>Judul Materi</label>
                        <input type="text" name="judul" id="judul" class="form-control col-lg-4" value="<?= $file->judul; ?>" required placeholder="Masukkan judul materi..*">
                        <?= form_error('judul', '<small class="text-danger" >', '</small>'); ?>
                    </div>
                    <div class="form-group col-lg-6 col-md-6">
                        <label>File</label>
                        <input type="file" name="file" id="file" placeholder="Masukkan file.." value="<?= $file->nama_file ?>"> <span style="color: brown; font-size:13px"><br>*format file pdf / doc / docx / xls / xlsx / ppt / pptx / txt</span>
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