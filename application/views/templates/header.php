<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- bootstrap4 -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/owlcarousel/dist/assets/owl.carousel.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/owlcarousel/dist/assets/owl.theme.default.min.css'); ?>">
    <link href="<?= base_url(); ?>assets/fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/mystyle.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/my.scss">
    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Quicksand|Raleway&display=swap" rel="stylesheet">
    <title><?= $title; ?> </title>
    <link href='<?= base_url('assets/img/logo/logopkk.png') ?>' rel='shortcut icon'>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatables/lib/css/dataTables.bootstrap4.min.css') ?>" />
</head>

<body>
    <!-- developed with <3 by Wahyu Adi Kusuma -->

    <nav class="navbar sticky-top bg-light navbar-expand-lg navbar-light shadow">
        <div class="container">
            <img src="<?= base_url('assets/img/logo/logopkk.png') ?>" alt="" class="mb-1" style="width: 50px">
            <a class="navbar-brand ml-2" href="<?= base_url('beranda/index') ?>" style="font-family: 'Quicksand', sans-serif;">TPPKK Wonogiri</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ">
                        <a class="nav-link mr-1 pl-2 mb-1 <?= $this->uri->segment(1) == 'beranda' || $this->uri->segment(1) == '' ? 'active' : '' ?>" href="<?= base_url('beranda'); ?>">Beranda <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown mr-1 ">
                        <a class="nav-link dropdown-toggle pl-2 mb-1 <?= $this->uri->segment(1) == 'profil' ? 'active' : '' ?>" href="<?= base_url('profil'); ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profil
                        </a>
                        <div class="dropdown-menu pl-1 pr-1 mb-1" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item <?= $this->uri->segment(2) == 'tentang' ? 'active' : '' ?>" href="<?= base_url('profil/tentang'); ?>">Tentang</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item <?= $this->uri->segment(2) == 'visimisi' ? 'active' : '' ?>" href="<?= base_url('profil/visimisi'); ?>">Visi Misi</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item <?= $this->uri->segment(2) == 'struktur' ? 'active' : '' ?>" href="<?= base_url('profil/struktur'); ?>">Struktur</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item <?= $this->uri->segment(2) == 'programUnggulan' ? 'active' : '' ?>" href="<?= base_url('profil/programUnggulan'); ?>">Program Unggulan</a>
                        </div>
                    </li>
                    <li class="nav-item mr-1">
                        <a class="nav-link pl-2 mb-1 <?= $this->uri->segment(1) == 'proker' ? 'active' : '' ?>" href="<?= base_url('proker'); ?>">Program Kerja</a>
                    </li>
                    <li class="nav-item dropdown mr-1">
                        <a class="nav-link dropdown-toggle pl-2 mb-1 <?= $this->uri->segment(1) == 'artikel' | $this->uri->segment(1) == 'materi' ? 'active' : '' ?>" href="<?= base_url('artikel'); ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Informasi
                        </a>
                        <div class="dropdown-menu pl-1 pr-1 mb-1" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item <?= $this->uri->segment(1) == 'artikel' ? 'active' : '' ?>" href="<?= base_url('artikel'); ?>">Artikel</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item <?= $this->uri->segment(1) == 'materi' ? 'active' : '' ?>" href="<?= base_url('materi'); ?>">Materi</a>
                        </div>
                    </li>
                    <li class="nav-item mr-1">
                        <a class="nav-link pl-2 mb-1 <?= $this->uri->segment(1) == 'galeri' ? 'active' : '' ?>" href="<?= base_url('galeri'); ?>">Galeri</a>
                    </li>
                    <li class="nav-item mr-1">
                        <a class="nav-link pl-2 mb-1 <?= $this->uri->segment(1) == 'kontak' ? 'active' : '' ?>" href="<?= base_url('kontak'); ?>">Kontak</a>
                    </li>
            </div>
        </div>
    </nav>