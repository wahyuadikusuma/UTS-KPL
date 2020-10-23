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

    public function kegiatan($id_pokja)
    {
        $data['title'] = 'TPPKK Wonogiri';
        $data['popular'] = $this->Artikel_model->getArtikelPopular();
        $data['kegiatan'] = $this->Galeri_model->getKegiatanByIdPokja($id_pokja);
        $data['judul'] = $this->Galeri_model->getKegiatanById($id_pokja);
        $data['pokja'] = $this->Galeri_model->getPokjaById($id_pokja);

        //untuk menghapus session searching
        $this->session->set_userdata('keyword', null);

        $this->load->view('templates/header', $data);
        $this->load->view('pkk/kegiatan');
        $this->load->view('templates/footer', $data);
    }

    public function foto_kegiatan($id_kegiatan)
    {
        $data['title'] = 'TPPKK Wonogiri';
        $data['popular'] = $this->Artikel_model->getArtikelPopular();
        // $data['kegiatan'] = $this->Galeri_model->getKegiatanByIdPokja($id);
        $data['judul'] = $this->Galeri_model->getKegiatanById($id_kegiatan);
        $data['pokja'] = $this->Galeri_model->getPokjaById($id_kegiatan);
        $data['foto_kegiatan'] = $this->Galeri_model->getFotoKegiatanByIdKegiatan($id_kegiatan);
        //untuk menghapus session searching
        $this->session->set_userdata('keyword', null);

        $this->load->view('templates/header', $data);
        $this->load->view('pkk/foto_kegiatan');
        $this->load->view('templates/footer', $data);
    }
}
