<div id="header" class="mx-auto my-auto">
    <h1>Kegiatan Pokja</h1>
    <?php if ($pokja) : ?>
        <p> <?= $pokja->nama_pokja; ?></p>
    <?php else : ?>
        <p>Tim Penggerak PKK Kabupaten Wonogiri</p>
    <?php endif; ?>
</div>

<style>
    /* .box {
        width: 1200px;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        grid-gap: 15px;
        margin: 0 auto;
        margin-bottom: 40px
    } */
    body {
        background-color: lightblue;
    }

    .card {
        position: relative;
        width: 300px;
        height: 350px;
        background: #fff;
        margin: 0 auto;
        border-radius: 4px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, .2);
    }

    .card:before,
    .card:after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 4px;
        background: #fff;
        transition: 0.5s;
        z-index: -1;
    }

    .card:hover:before {
        transform: rotate(20deg);
        box-shadow: 0 2px 20px rgba(0, 0, 0, .2);
    }

    .card:hover:after {
        transform: rotate(10deg);
        box-shadow: 0 2px 20px rgba(0, 0, 0, .2);
    }

    .card .imgBx {
        position: absolute;
        top: 10px;
        left: 10px;
        bottom: 10px;
        right: 10px;
        background: #222;
        transition: 0.5s;
        z-index: 1;
    }

    .card:hover .imgBx {
        bottom: 80px;
    }

    .card .imgBx img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .card .details {
        position: absolute;
        left: 10px;
        right: 10px;
        bottom: 10px;
        height: 60px;
        text-align: center;
    }

    .card .details h2 {
        margin: 0;
        padding: 0;
        font-weight: 600;
        font-size: 18px;
        color: #777;
        text-transform: uppercase;
    }

    .card .details h2 span {
        font-weight: 500;
        font-size: 14px;
        color: #f38695;
        display: block;
        margin-top: 5px;
    }
</style>

<div class=" container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <!-- <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard</a></li> -->
            <li class="breadcrumb-item" aria-current="page"><i class="far fa-fw fa-images"></i></a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('galeri'); ?>"><?= 'Galeri'; ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= 'Kegiatan'; ?></li>
        </ol>
    </nav>
    <div class="row">
        <?php foreach ($kegiatan as $k) : ?>
            <div class="col-lg-4 col-md-6 mb-3">
                <div class="card">
                    <div class="imgBx">
                        <a href="<?= base_url('galeri/foto_kegiatan/' . $k->id_kegiatan) ?>">
                            <img src="<?= base_url('assets/img/admin/kegiatan/' . $k->gambar); ?>" alt="images">
                        </a>
                    </div>
                    <div class="details">
                        <h2><?= $k->nama_kegiatan ?></h2>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <?php if (!$kegiatan) : ?>
            <div class="alert alert-danger ml-3" role="alert">
                Mohon maaf, kegiatan pokja <strong> <?= $pokja->nama_pokja; ?></strong> masih kosong :)
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- owl carousel -->
<!-- <div class="color shadow-lg mb-4 pt-3 mt-3">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h6 style="font-family: 'Kaushan Script', cursive; font-size:25px; margin-bottom:-10px">Artikel Terpopuler</h6>
            <hr color="black" width="170px">
        </div>
    </div>
    <div class="ml-4 mr-4">
        <div class="owl-carousel owl-theme">
            <?php foreach ($popular as $row) : ?>
                <div class="item">
                    <img src="<?= base_url('assets/img/admin/artikel/' . $row->gambar); ?>" style="max-width: 450px; max-height:230px">
                    <div class="text-center pt-1">
                        <a href="<?= base_url('artikel/readArtikel/' . $row->id_artikel) ?>" style="font-family: 'Montserrat', sans-serif;"><?= word_limiter($row->judul, 5); ?></a>
                        <p><?= date('d F Y, G:i', $row->tanggal); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div> -->


<!-- <div class="container">
    <div class="row baris2">
        <div class="col-lg-8">
            <div class="pkk mt-1 mb-1 pt-2 pl-2 pr-2">
                <p>cek</p>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mt-1 mb-1 bg-light outline-dark" style="width: 18rem;">
                <div class="card-header text-light bg-danger">
                    Artikel Terbaru
                </div>
                <?php foreach ($berita as $row) { ?>
                    <div class="card">
                        <?= date('d F Y, G:i', $row->tanggal); ?></h5>
                        <?php date_default_timezone_set("Asia/Jakarta"); ?>
                        <p class="card-text pl-2" style="margin-bottom: -2px"><small class="text-muted"><?= date('d F Y, G:i', $row->tanggal); ?></small></p>
                        <p class="card-text text-dark pl-2 pb-2"><a href=""><?php echo $row->pesan; ?></a></p>
                    </div>
                <?php } ?>
            </div>
            <div>
                <?php date_default_timezone_set('Asia/Jakarta');
                echo date('d-m-Y H:i:s', time());  ?>
            </div>
        </div>
    </div>
</div> -->