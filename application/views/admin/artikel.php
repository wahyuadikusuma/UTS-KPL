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
            <!-- <?= $this->session->flashdata('message'); ?> -->
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
                    <a href="<?= base_url('admin/addArtikel'); ?>" class="btn btn-sm btn-primary"><i class="fas fa-plus mr-2"></i>Tambah Artikel</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table-artikel">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">No.</th>
                                    <th scope="col" width="20%">Judul</th>
                                    <th scope="col" width="25%">Isi Artikel</th>
                                    <th scope="col">Dibaca</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col" class="text-center" width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
        </div>
    </div>
</div>