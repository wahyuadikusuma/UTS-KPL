<div id="header" class="mx-auto my-auto">
    <div class="fadeInDown">
        <h1>Galeri</h1>
        <p>Tim Penggerak PKK Kabupaten Wonogiri</p>
    </div>
</div>

<style>
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
            <li class="breadcrumb-item active" aria-current="page"><i class="far fa-fw fa-images"></i><?= ' / Galeri'; ?></li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <?php $i = 1;
        foreach ($pokja as $p) : ?>
            <div class="col-lg-4 col-md-6 mb-3 fadeInUp">
                <div class="card mb-3">
                    <div class="imgBx">
                        <a href="<?= base_url('galeri/kegiatan/' . $p->id_pokja) ?>">
                            <img src="<?= base_url('assets/img/admin/pokja/' . $p->logo); ?>" alt="images">
                        </a>
                    </div>
                    <div class="details">
                        <h2><?= $p->nama_pokja ?><br><span>Pokja <?= $i++; ?></span></h2>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<div class="color shadow-lg mb-4 pt-3 mt-3">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h6 style="font-family: 'Quicksand', cursive; font-size:25px; margin-bottom:-10px">Artikel Terpopuler</h6>
            <hr color="black" width="200px">
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
                        <p><?= date('d F Y, G:i', $row->tanggal); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>