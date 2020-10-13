<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'TPPKK Wonogiri';
        $data['gambar'] = $this->Slider_model->getSlider();
        $data['artikel'] = $this->Artikel_model->getArtikelTerbaru();

        $this->load->view('templates/header', $data);
        $this->load->view('pkk/beranda', $data);
        $this->load->view('templates/footer', $data);
    }
}
