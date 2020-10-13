<!-- <div id="header" class="mx-auto my-auto">
    <h1>Artikel</h1>
    <p>Tim Penggerak PKK Kabupaten Wonogiri</p>
</div> -->
<!-- style="display:block; margin-left:auto; margin-right:auto;" -->
<?php date_default_timezone_set("Asia/Jakarta"); ?>

<div class="card shadow-sm mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <div class="col-lg-6">
            <h6 class="m-0 font-weight-light text-dark text-lg"><i class="far fa-calendar-alt"></i> <?= hari_ini() . date('d ') . bulan_ini() . date(' Y, G:i'); ?></h6>
        </div>
        <div class="col-lg-3 active-cyan-4">
            <!-- Search form -->
            <form action="<?= base_url('artikel') ?>" method="get">
                <div class="input-group">
                    <input class="form-control" type="text" name="keyword" id="keyword" placeholder="Cari artikel.." aria-label="Search" autofocus>
                    <div class="input-group-append">
                        <input class="btn btn-primary" type="submit" name="submit">
                    </div> 
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Back to top button -->
<a id="button"></a>

<div class="container">
    <div class="row">
        <?php if (!$artikel) { ?>
            <div class="col-lg-8 mb-3">
                <div class="alert alert-danger d-md-block" role="alert">
                    Artikel tidak ada!
                    <span style="color: blue">
                        Klik tombol kirim untuk refresh.
                    </span>
                </div>
            </div>
        <?php } ?>
        <?php foreach ($artikel as $row) : ?>
            <div class="[ col-lg-4 ]">
                <div class="[ info-card ]">
                    <img style="width: 100%; max-height:200px" src="<?= base_url('assets/img/admin/artikel/' . $row->gambar); ?>" />
                    <div class="[ info-card-details ] animate">
                        <div class="[ info-card-header ]">
                            <h1> <?= word_limiter($row->judul, 5); ?> </h1>
                            <h3> <?= tgl_indo(date('Y, G:i -m-d ', $row->tanggal)); ?> </h3>
                            <!-- <p class="card-text pl-2" style="margin-bottom: -2px"><small class="text-muted"><?= tgl_indo(date('Y, G:i -m-d ', $row->tanggal)); ?></small></p> -->

                        </div>
                        <div class="[ info-card-detail ]">
                            <!-- Description -->
                            <p><?= word_limiter($row->isi_artikel, 12); ?></p>
                            <a href="<?= base_url('artikel/readArtikel/' . $row->id_artikel); ?>" class="btn btn-sm btn-primary">Baca selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?= $this->pagination->create_links(); ?>
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

function hari_ini()
{
    $hari = date("D");

    switch ($hari) {
        case 'Sun':
            $hari_ini = "Minggu";
            break;

        case 'Mon':
            $hari_ini = "Senin";
            break;

        case 'Tue':
            $hari_ini = "Selasa";
            break;

        case 'Wed':
            $hari_ini = "Rabu";
            break;

        case 'Thu':
            $hari_ini = "Kamis";
            break;

        case 'Fri':
            $hari_ini = "Jumat";
            break;

        case 'Sat':
            $hari_ini = "Sabtu";
            break;

        default:
            $hari_ini = "Tidak di ketahui";
            break;
    }

    return $hari_ini . ", ";
}

function bulan_ini()
{
    $bulan = date('m');

    switch ($bulan) {
        case '01':
            $bulan_ini = "Januari";
            break;

        case '02':
            $bulan_ini = "Februari";
            break;

        case '03':
            $bulan_ini = "Maret";
            break;

        case '04':
            $bulan_ini = "April";
            break;

        case '05':
            $bulan_ini = "Mei";
            break;

        case '06':
            $bulan_ini = "Juni";
            break;

        case '07':
            $bulan_ini = "Juli";
            break;

        case '08':
            $bulan_ini = "Agustus";
            break;

        case '09':
            $bulan_ini = "September";
            break;

        case '10':
            $bulan_ini = "Oktober";
            break;

        case '11':
            $bulan_ini = "November";
            break;

        case '12':
            $bulan_ini = "Desember";
            break;

        default:
            $bulan_ini = "Tidak di ketahui";
            break;
    }

    return $bulan_ini;
}
?>