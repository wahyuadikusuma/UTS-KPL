<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    // public function index()
    // {
    //     $data['title'] = 'TPPKK Wonogiri';
    //     $this->load->view('templates/header', $data);
    //     $this->load->view('pkk/profil', $data);
    //     $this->load->view('templates/footer', $data);
    // }

    public function visimisi()
    {
        $data['title'] = 'TPPKK Wonogiri';
        $this->load->view('templates/header', $data);
        $this->load->view('pkk/visimisi', $data);
        $this->load->view('templates/footer', $data);
    }

    public function struktur()
    {
        $data['title'] = 'TPPKK Wonogiri';
        $this->load->view('templates/header', $data);
        $this->load->view('pkk/struktur', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tentang()
    {
        $data['title'] = 'TPPKK Wonogiri';
        $this->load->view('templates/header', $data);
        $this->load->view('pkk/tentang', $data);
        $this->load->view('templates/footer', $data);
    }

    public function programUnggulan()
    {
        $data['title'] = 'TPPKK Wonogiri';
        $this->load->view('templates/header', $data);
        $this->load->view('pkk/programunggulan', $data);
        $this->load->view('templates/footer', $data);
    }
}
