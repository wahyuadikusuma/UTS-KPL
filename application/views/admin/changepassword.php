<!-- <body class="bg-gradient-light"> -->

<body style="background-color: #0779B4">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12">

                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="mb-2">
                                        <?= $this->session->flashdata('message'); ?>
                                        <img src="<?= base_url('assets/img/logo/logopkk.png') ?>" alt="" style="width: 100px; display:block; margin-left:auto; margin-right:auto;">
                                    </div>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-3" style="font-family: 'Alata', sans-serif;">Ganti Password Admin</h1>
                                    </div>
                                    <form class="user" method="POST" action="<?= base_url('admin/changePassword'); ?>">
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="passwordlama" name="passwordlama" placeholder="Masukkan password lama..">
                                            <?= form_error('passwordlama', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Masukkan password baru..">
                                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Konfirmasi password baru..">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Simpan Perubahan
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>