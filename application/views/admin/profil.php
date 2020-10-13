<!-- <body class="bg-gradient-light"> -->

<body style="background-color: #0779B4">

    <div class="container">

        <!-- Outer Row -->
        <!-- Page Heading -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profil Admin</li>
            </ol>
        </nav>
        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-6 col-lg-8 col-md-8">
                <?= $this->session->flashdata('profil'); ?>
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row">
                        <h6 class="m-0 font-weight-bold text-primary">Profil Admin</h6>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-4">
                                <img src="<?= base_url('assets/img/admin/avatar/' . $image); ?>" alt="" style="height: 90px; width:90px; display:block; margin-left:auto; margin-right:auto">
                            </div>
                            <div class="col-lg-8">
                                <h5 class="card-title pt-2" style="margin-bottom: 0px"><?= $name; ?></h5>
                                <hr class="sidebar-divider d-block ml-auto mr-auto">
                                <p class="card-text">username : <?= $username; ?></p>
                                <!-- <p class="card-text">email <span style="text-indent: 10px"> :</span> <?= $email; ?></p> -->
                                <a href="<?= base_url('admin/editProfil') ?>" class="btn btn-sm btn-user btn-primary btn-block ml-auto mr-auto mt-2 col-lg-4 col-md-4 col-sm-3 col-xs-3" style=" margin-left:auto; margin-right:auto">Edit Profil</a>
                            </div>
                        </div>
                        <div class="row">

                        </div>
                    </div>
                </div>
                <!-- Card Body -->
            </div>
        </div>


        <div class="row">


        </div>





        <!-- <div class="container justify-content-center text-dark ml-3">
    <div class="card col-md-4 col-lg-4 col-sm-4 col-xs-4 mb-3" style="max-width: 540px; max-height: 300px">
        <div class="row no-gutters">
            <div class="col-md-8 col-lg-4">
                <img src="https://images.unsplash.com/photo-1519455953755-af066f52f1a6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80" style="height: 150px; max-width:290px" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $name; ?></h5>
                    <p class="card-text">username : <?= $username; ?></p>
                    <p class="card-text">email : <?= $email; ?></p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
    </div>
</div> -->
        <!-- style="border:1px solid gray; border-radius:10px; padding-top:5px" -->