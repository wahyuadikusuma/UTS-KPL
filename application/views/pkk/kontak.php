<div id="header" class="mx-auto my-auto">
    <div class="fadeInDown">
        <h1>Kontak</h1>
        <p>Tim Penggerak PKK Kabupaten Wonogiri</p>
    </div>
</div>

<div class="container mt-3">
    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
            <div class="flash-pesan" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
        </div>
    </div>
    <div class="row fadeInUp justify-content-between">
        <!-- <div class="col-lg-5 col-md-5 ml-2 mr-2 mb-3 card shadow justify-content-center"> -->
        <div class="col-lg-6 col-md-6 col-sm-12 ">
            <div class="card shadow ml-1 mr-1 mb-3 ">
                <div class="card-header bg-dark text-light">
                    <h5 style="font-family: 'Raleway', sans-serif;">Informasi Kontak</h5>
                </div>
                <div class="card-body">
                    <p style="font-family: 'Raleway', sans-serif;">
                        <font color='#0093DC'><i class="fas fa-map-marked-alt mr-3"></i>Jl. Kabupaten Nomor 5 Wonogiri, Jawa Tengah</font>
                    </p>
                    <p style="font-family: 'Raleway', sans-serif;">
                        <font color='#0093DC'>
                            <i class="fas fa-phone-alt mr-3"></i>0273 - 321002
                        </font>
                    </p>
                    <a href="https://gmail.com" style="font-family: 'Raleway', sans-serif;">
                        <font color='#0093DC'>
                            <i class="fas fa-envelope mr-3"></i>tppkkwonogiri@gmail.com
                        </font>
                    </a>
                    <p></p>
                    <a href="http://tp.pkk.wonogirikab.go.id/" style="font-family: 'Raleway', sans-serif;">
                        <font color='#0093DC'>
                            <i class="fas fa-globe-americas mr-3"></i>tp.pkk.wonogirikab.go.id
                        </font>
                    </a>
                    <p></p>
                    <div class="row">
                        <div class="col-lg-12 text-center kontak">
                            <p style="font-family: 'Open Sans', sans-serif;">Ikuti kami :</p>
                        </div>
                    </div>
                    <div class="row logo text-center">
                        <div class="col-lg-12 ">
                            <a href="#">
                                <font color='blue'>
                                    <i class="fab fa-lg fa-instagram"></i>
                                </font>
                            </a>
                            <a href="https://twitter.com/TPPKK_Wonogiri">
                                <font color='#03A9F4'>
                                    <i class="fab fa-lg fa-twitter"></i>
                                </font>
                            </a>
                            <a href="#" class="facebook">
                                <font color='blue'>
                                    <i class="fab fa-lg fa-facebook"></i>
                                </font>
                            </a>
                        </div>
                        <!-- <div class="col-lg-4 col-md-3 col-sm-4 col-xs-3">
                        </div>
                        <div class="col-lg-4 col-md-3 col-sm-4 col-xs-3">
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- <h5 style="font-family: 'Raleway', sans-serif; color:black; font-weight:550; margin-bottom:-15px">Informasi Kontak</h5>
            <hr width="152px" color="black" align="left"> -->
        <div class="col-lg-6 col-md-6 mb-3">
            <div class="card shadow ml-1 mr-1">
                <div class="card-header bg-dark text-light">
                    <h5 style="font-family: 'Raleway', sans-serif; font-weight:light;">Kirim Pesan ke TPPKK Kab. Wonogiri</h5>
                </div>
                <!-- <hr width="335px" color="black" align="left"> -->
                <div class="card-body">
                    <form action="<?= base_url('kontak/kirimPesan'); ?>" method="POST">
                        <div class="form-group">
                            <input type="name" name="nama" class="form-control col-lg-8 col-md-10 col-sm-8" id="nama" value="<?= set_value('nama'); ?>" placeholder="Nama *" required>
                            <?= form_error('name', '<small class="text-danger" >', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control col-lg-8 col-md-10 col-sm-8" id="email" value="<?= set_value('email'); ?>" placeholder="Email *" required>
                            <?= form_error('email', '<small class="text-danger" >', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control col-lg-8 col-md-10 col-sm-8 col-xs-6" name="telepon" id="telepon" placeholder="Telepon *" required>
                            <?= form_error('telepon', '<small class="text-danger pl-2" >', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <textarea type="text" name="pesan" class="form-control col-lg-9 col-md-12 col-sm-9" id="pesan" rows="3" placeholder="Pesan *" required><?= set_value('pesan'); ?></textarea>
                            <!-- <?= form_error('pesan', '<small class="text-danger" >', '</small>'); ?> -->
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <!-- <a href="<?= base_url('about/kirimPesan'); ?>" class="btn btn-primary mb-3">Submit</a> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 ">
            <div class="card ml-1 mr-1 mb-3 shadow justify-content-center">
                <div class="card-header bg-dark text-light">
                    <h5 style="font-family: 'Raleway', sans-serif; font-weight:550;">Lokasi Kami</h5>
                </div>
                <div class="card-body">
                    <!-- <hr width="115px" color="black" align="left"> -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d988.189762082921!2d110.92477882916931!3d-7.815310670999842!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwNDgnNTUuMSJTIDExMMKwNTUnMzEuMiJF!5e0!3m2!1sid!2sid!4v1578384142974!5m2!1sid!2sid" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </div>
</div>