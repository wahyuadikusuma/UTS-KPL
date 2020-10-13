<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'TPPKK Wonogiri';
        $data['popular'] = $this->Artikel_model->getArtikelPopular();
        $data['pokja'] = $this->Galeri_model->getPokja();
        //untuk menghapus session searching
        $this->session->set_userdata('keyword', null);

        $this->load->view('templates/header', $data);
        $this->load->view('pkk/galeri');
        $this->load->view('templates/footer', $data);
    }

    public function kegiatan($id)
    {
        $data['title'] = 'TPPKK Wonogiri';
        $data['popular'] = $this->Artikel_model->getArtikelPopular();
        $data['kegiatan'] = $this->Galeri_model->getKegiatanByIdPokja($id);
        $data['judul'] = $this->Galeri_model->getKegiatanById($id);
        $data['pokja'] = $this->Galeri_model->getPokjaById($id);

        //untuk menghapus session searching
        $this->session->set_userdata('keyword', null);

        $this->load->view('templates/header', $data);
        $this->load->view('pkk/kegiatan');
        $this->load->view('templates/footer', $data);
    }

    public function foto_kegiatan($id)
    {
        $data['title'] = 'TPPKK Wonogiri';
        $data['popular'] = $this->Artikel_model->getArtikelPopular();
        // $data['kegiatan'] = $this->Galeri_model->getKegiatanByIdPokja($id);
        $data['judul'] = $this->Galeri_model->getKegiatanById($id);
        $data['pokja'] = $this->Galeri_model->getPokjaById($id);
        $data['foto_kegiatan'] = $this->Galeri_model->getFotoKegiatanByIdKegiatan($id);
        //untuk menghapus session searching
        $this->session->set_userdata('keyword', null);

        $this->load->view('templates/header', $data);
        $this->load->view('pkk/foto_kegiatan');
        $this->load->view('templates/footer', $data);
    }
}
