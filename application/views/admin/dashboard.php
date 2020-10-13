<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="<?= base_url('admin/bantuan') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> <i class="far fa-question-circle"></i> Bantuan</a>
    </div>

    <?= $this->session->flashdata('message'); ?>
    <!-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> -->

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Publikasi Artikel</div>
                            <div class="h5 mb-0 font-weight-bold">
                                <a href="<?= base_url('admin/artikel'); ?>" style="color: gray" class="btn btn-sm btn-primary stretched-link text-light mt-2">
                                    <?= $artikel['jumlahartikel']; ?> Artikel
                                </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pesan Masyarakat</div>
                            <div class="h5 mb-0 font-weight-bold">
                                <a href="<?= base_url('admin/pesan'); ?>" style="color: gray" class="btn btn-sm btn-primary stretched-link text-light mt-2">
                                    <?= $pesan['jumlahpesanmasuk']; ?> Pesan
                                </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pembaca Artikel</div>
                            <div class="h5 mb-0 font-weight-bold">
                                <div style="color: gray" class="stretched-link text-dark mt-2">
                                    <?= $total['jumlahviewers']; ?> Pembaca
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Slider</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $slider['jumlahslider']; ?> </div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <?php
                                        $jumlah = $slider['jumlahslider'];
                                        $total = $jumlah * 20;
                                        ?>
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?= $total . '%'; ?>" aria-valuenow="50" aria-valuemin="1" aria-valuemax="5"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Grafik Pembaca Artikel</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">

                    <!-- untuk menampilkan grafik pembaca artikel -->
                    <div id="grafik"></div>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
$judul = array();
$viewers = array();
foreach ($grafik as $data) {
    $judul[] = word_limiter($data->judul, 7, '...');
    $viewers[] = (float) $data->views;
}

?>

<script src="<?= base_url('assets/js/highchart/accessibility.js') ?>"></script>
<script src="<?= base_url('assets/js/highchart/exporting.js') ?>"></script>
<script src="<?= base_url('assets/js/highchart/export-data.js') ?>"></script>
<script src="<?= base_url('assets/js/highchart/highcharts.js') ?>"></script>

<script>
    Highcharts.chart('grafik', {
        chart: {
            type: 'area'
        },
        title: {
            text: 'Grafik Pembaca Artikel TP-PKK Kabupaten Wonogiri'
        },
        subtitle: {
            text: '12 Artikel Terbaru'
        },
        xAxis: {
            categories: <?= json_encode($judul) ?>,
            tickmarkPlacement: 'on',
            title: {
                enabled: false
            }
        },
        yAxis: {
            title: {
                text: 'Dibaca'
            },
            labels: {
                formatter: function() {
                    return this.value;
                }
            }
        },
        tooltip: {
            split: true,
            valueSuffix: ''
        },
        plotOptions: {
            area: {
                stacking: 'normal',
                lineColor: '#666666',
                lineWidth: 1,
                marker: {
                    lineWidth: 1,
                    lineColor: '#666666'
                }
            }
        },
        series: [{
            name: 'Dibaca',
            data: <?= json_encode($viewers) ?>
        }]
    });
</script>