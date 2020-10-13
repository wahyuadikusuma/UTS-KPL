<div id="header" class="mx-auto my-auto">
    <h1>Foto Kegiatan</h1>
    <?php if ($judul) : ?>
        <p> <?= $judul->nama_kegiatan; ?></p>
    <?php else : ?>
        <p>Tim Penggerak PKK Kabupaten Wonogiri</p>
    <?php endif; ?>
</div>
<style>
    body {
        background-color: lightblue;
    }
</style>
<div class=" container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <!-- <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard</a></li> -->
            <li class="breadcrumb-item" aria-current="page"><i class="far fa-fw fa-images"></i></a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('galeri'); ?>"><?= 'Galeri'; ?></a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('galeri/kegiatan/' . $judul->id_pokja); ?>"><?= 'Kegiatan'; ?></a></li>
            <li class="breadcrumb-item active" aria-current="page">Foto Kegiatan</li>
        </ol>
    </nav>
    <div class="row">
        <?php if (!$foto_kegiatan) : ?>
            <div class="alert alert-danger ml-3" role="alert">
                Mohon maaf, foto kegiatan <strong> <?= $judul->nama_kegiatan ?></strong> masih kosong :)
            </div>
        <?php endif; ?>
        <?php foreach ($foto_kegiatan as $fk) : ?>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <a href="<?= base_url('assets/img/admin/fotokegiatan/' . $fk->foto) ?>" target="_blank">
                        <img src="<?= base_url('assets/img/admin/fotokegiatan/' . $fk->foto) ?>" alt="" class="card-img-top" style="max-height: 220px; ">
                    </a>
                    <div class="card-body">
                        <!-- <h5 class="card-title">develop by wahyu adi kusuma</h5> -->
                        <?php date_default_timezone_set("Asia/Jakarta"); ?>
                        <!-- <p class="card-text"><?= tgl_indo(date('Y G:i -m-d', $fk->tanggal)); ?></p> -->
                        <p class="card-text"><small class="text-muted">Diupload pada <?= tgl_indo(date('Y G:i -m-d', $fk->tanggal)); ?></small></p>
                        <a href="<?= base_url('admin/downloadFotoKegiatan/' . $fk->id_item) ?>" class="btn btn-outline-success btn-sm"><i class="fas fa-download mr-2"></i>Download</a>
                        <!-- <a href="" class="btn btn-outline-danger btn-sm"><i class="far fa-heart mr-2"></i>Save</a> -->
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tahun
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tanggal

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}
?>