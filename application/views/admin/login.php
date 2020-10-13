<!-- <body class="bg-gradient-light"> -->

<body style="background-color: #0779B4">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-6 col-md-8 col-sm-12">

                <div class="card o-hidden border-0 shadow-lg my-5">
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
                                        <h1 class="h4 text-gray-900 mb-3" style="font-family: 'Alata', sans-serif;">Admin TPPKK Kabupaten Wonogiri</h1>
                                    </div>
                                    <form class="user" action="<?= base_url('admin'); ?>" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Masukkan Username..." autofocus required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukkan Password..." required>
                                        </div>
                                        <!-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                                            </div>
                                        </div> -->
                                        <button type="submit" class="btn col-lg-3 col-md-3 col-sm-3 col-xs-3" style="display:block; margin-left:auto; margin-right:auto; background-color:#0779B4; color:azure">
                                            Login
                                        </button>
                                        <!-- <hr> -->
                                        <!-- <div class="text-center">
                                            <a class="small" href="">Forgot Password?</a>
                                        </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>