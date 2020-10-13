<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <!-- <ol class="carousel-indicators">
        <?php $i = 0;
        foreach ($gambar as $count) : ?>
            <?php if ($i = 0) : ?>
                <li data-target="#carouselExampleCaptions" data-slide-to="<?= $i++ ?>" class="active"></li>
            <?php else : ?>
                <li data-target="#carouselExampleCaptions" data-slide-to="<?= $i++ ?>"></li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ol> -->
    <div class="carousel-inner">
        <?php $i = 1;
        foreach ($gambar as $g) : ?>

            <?php if ($i == 1) : ?>
                <div class="carousel-item active">
                    <img src="<?= base_url('assets/img/admin/slider/' . $g->gambar); ?>" style="height:85vh; background-size:cover; position:relative" class="d-block w-100" alt="...">
                    <div class="carousel-caption text-center ml-auto mr-auto fadeInDown beranda-caption">
                        <h5><?= $g->teks1; ?></h5>
                        <p><?= $g->teks2; ?></p>
                    </div>
                </div>
                <?php $i++; ?>

            <?php else : ?>
                <div class="carousel-item">
                    <img src="<?= base_url('assets/img/admin/slider/' . $g->gambar); ?>" style="height:85vh; background-size:cover; position:relative;" class="d-block w-100" alt="...">
                    <div class="carousel-caption fadeInDown beranda-caption d-md-block">
                        <h5><?= $g->teks1; ?></h5>
                        <p><?= $g->teks2; ?></p>
                    </div>
                </div>
                <?php $i++; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<div class="container fadeInDown animated">
    <div class="row mb-4">
        <div class="col-lg-4">
            <img src="<?= base_url('assets/img/struktur/ketua.png'); ?>" alt="" style="display:block; margin-left:auto; margin-right:auto; width: 200px">
            <h6 style="text-align: center; margin-bottom:-10px">drh. Verawati Joko Sutopo, M.Sc </h6>
            <hr color="black" width="250px">
            <p style="text-align: center; margin-top:-15px">Ketua Tim Penggerak PKK Kabupaten Wonogiri</p>
        </div>
        <div class="col-lg-8 pl-5 mx-auto my-auto" id="sambutan">
            <h6 style="font-size: 18px; line-height:1.4; text-align:left">Sambutan
                <br> Ketua Tim Penggerak PKK Kabupaten Wonogiri</h6>

            <h6 style="font-size: 18px">Assalamu’alaikum Wr. Wb. </h6>
            <p style="text-align:justify;font-size:16px; padding-right:35px; line-height: 1.9;">Salam Sejahtera Bagi Kita Semua. Puji syukur, dalam rangka mempublikasikan informasi dan dokumentasi kegiatan PKK Kabupaten Wonogiri, dihadirkan portal pkk.wonogirikab.go.id Dengan hadirnya portal ini diharapkan bisa menjadi media informasi dan publikasi untuk memenuhi kebutuhan informasi masyarakat.</p>
            <h6 style="font-size: 18px">Wassalamu’alaikum Wr. Wb</h6>
        </div>
    </div>
</div>

<div class="color shadow-lg mb-4 pt-4">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h6 style="font-family: 'Quicksand', cursive; font-size:25px; margin-bottom:-10px">Artikel Terbaru</h6>
            <hr color="black" width="170px">
        </div>
    </div>
    <!-- owl carousel -->
    <div class="ml-3 mr-5">
        <div class="owl-carousel owl-theme ml-3 mr-3">
            <?php if ($artikel) {
                foreach ($artikel as $row) : ?>
                    <div class="item">
                        <img src="<?= base_url('assets/img/admin/artikel/' . $row->gambar); ?>" style="max-width: 450px; max-height:230px">
                        <div class="text-center pt-1">
                            <a href="<?= base_url('artikel/readArtikel/' . $row->id_artikel) ?>" class="btn btn-sm" style="font-family: 'Montserrat', sans-serif;"><?= word_limiter($row->judul, 5); ?></a>

                            <?php date_default_timezone_set("Asia/Jakarta"); ?>
                            <p><?= tgl_indo(date('Y G:i -m-d', $row->tanggal)); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php } else { ?>
                Artikel masih kosong.
            <?php } ?>
        </div>
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