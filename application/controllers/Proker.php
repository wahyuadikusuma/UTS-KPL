<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proker extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'TPPKK Wonogiri';
        //untuk menghapus session searching
        $this->session->set_userdata('keyword', null);

        $this->load->view('templates/header', $data);
        $this->load->view('pkk/proker', $data);
        $this->load->view('templates/footer', $data);
    }
}
