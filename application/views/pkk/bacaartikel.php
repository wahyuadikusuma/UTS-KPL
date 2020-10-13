<?php date_default_timezone_set("Asia/Jakarta"); ?>

<div class="card shadow-sm">
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

<div class="container shadow" style="background-color: #fff">
    <div class="row">
        <div class="col-lg-12 ml-4">
            <div class="text-dark judulartikel pt-2">
                <h1>
                    <?= $artikel->judul; ?>
                </h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 ml-4">
            <p>
                <i class="far fa-calendar-alt"></i> <?= date('d/m/Y', $artikel->tanggal); ?> <span class="ml-2"><i class="far fa-user mr-1"></i><?= $artikel->penulis; ?> </span> <span class="ml-2"><i class="far fa-eye mr-1"></i><?php $views = $artikel->views;
                                                                                                                                                                                                                                    echo $views + 1; ?> kali dibaca</span> <span class="ml-2" style="font-style: italic"><i class="far fa-clock-o mr-1"></i><?= waktu_baca($artikel->isi_artikel); ?></span>
            </p>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-12 ml-2 isiartikel">
            <figure>
                <img src="<?= base_url('assets/img/admin/artikel/' . $artikel->gambar) ?>" style="display: block; max-width: 100%;height: auto; padding-right:30px;padding-left: 15px; " alt="">
            </figure>
            <p><?= $this->typography->auto_typography($artikel->isi_artikel); ?></p>
        </div>
    </div>
</div>

<div class="color shadow-lg mb-4 pt-3">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h6 style="font-family: 'Quicksand', cursive; font-size:25px; margin-bottom:-10px">Artikel Terpopuler</h6>
            <hr color="black" width="170px">
        </div>
    </div>
    <!-- owl carousel -->
    <div class="ml-4 mr-4">
        <div class="owl-carousel owl-theme">
            <?php foreach ($popular as $row) : ?>
                <div class="item">
                    <img src="<?= base_url('assets/img/admin/artikel/' . $row->gambar); ?>" style="max-width: 450px; max-height:230px">
                    <div class="text-center pt-1">
                        <a href="<?= base_url('artikel/readArtikel/' . $row->id_artikel) ?>" class="btn btn-sm" style="font-family: 'Montserrat', sans-serif;"><?= word_limiter($row->judul, 5); ?></a>
                        <p><?= tgl_indo(date('Y G:i -m-d', $row->tanggal)); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>




<?php
function waktu_baca($isi)
{
    $jumlah_kata = str_word_count($isi);
    $per_menit = 250;
    $waktu_baca = $jumlah_kata / $per_menit;
    return number_format($waktu_baca,  1) . " Menit waktu baca";
}


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