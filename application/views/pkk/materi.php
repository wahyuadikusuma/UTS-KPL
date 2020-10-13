<div id="header" class="mx-auto my-auto">
    <div class="fadeInDown">
        <h1>Materi</h1>
        <p>Tim Penggerak PKK Kabupaten Wonogiri</p>
    </div>
</div>
<div class="container">

    <div class="row">
        <?php date_default_timezone_set("Asia/Jakarta"); ?>

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">

            <div class="card shadow mt-3 mb-4">

                <!-- Card Header -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <div class="col-lg-6">
                        <h6 class="m-0 font-weight-light text-dark text-lg"><i class="far fa-calendar-alt"></i> <?= hari_ini() . date('d ') . bulan_ini() . date(' Y, G:i'); ?></h6>
                    </div>
                </div>
                <div class="card-body">
                    <!-- <h5 class="text-center">Materi Tim Penggerak PKK Kabupaten Wonogiri</h5> -->
                    <div class="table-responsive">
                        <table class="table" id="tablemateri">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">No.</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Nama File</th>
                                    <th scope="col" class="text-center">Size</th>
                                    <th scope="col" width="13%" class="text-center">Diunduh</th>
                                    <th scope="col" width="15%">Tanggal</th>
                                    <th scope="col" width="15%" class="text-center">Aksi</th>
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

<?php
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