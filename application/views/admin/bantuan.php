<!-- Begin Page Content -->
<div class="container-fluid text-dark">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"> <?= $subtitle; ?></li>
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
                    <h6 class="m-0 font-weight-bold text-primary"> <?= $subtitle; ?></h6>
                </div>
                <div class="card-body">
                    <h5 style="color: black">Halo, Admin Website Tim Penggerak PKK Kabupaten Wonogiri !</h5>
                    <!-- <hr>
                    <div style="color: black">
                        <p>
                            Pada bagian Kelola Galeri, admin harus membuat pokja terlebih dahulu, kemudian membuat kegiatan, lalu di dalam kegiatan tersebut dapat diisi banyak foto sesuai dengan kegiatan dan bidang pokja.
                        </p>
                        <p>Jika ingin menghapus kegiatan, pastikan tidak ada nama kegiatan (yang akan dihapus) di dalam foto kegiatan.</p>
                        <p>Begitupun dengan Pokja, pastikan sebelum menghapus Pokja, tidak ada nama pokja (yang akan dihapus) di bagian Kegiatan.</p>
                    </div> -->
                    <hr>
                    <p style="color: black">Jika ada pertanyaan terkait dengan website TPPKK Wonogiri. Silakan hubungi developer, melalui kontak di bawah ini: <br>
                        <ul style="color: black">
                            <li>
                                E-mail : wahyuak@student.undip.ac.id
                            </li>
                            <li>
                                WhatsApp : 082279179227
                            </li>
                        </ul>
                    </p>
                    <!-- <p style="color: black">Terimakasih <i class="far fa-smile-beam"></i>. Apabila ada salah kata mohon dimaafkan <i class="far fa-smile-beam"></i></p> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Card Body -->