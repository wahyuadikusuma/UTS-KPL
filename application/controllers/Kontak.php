<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'TPPKK Wonogiri';
        //untuk menghapus session searching
        $this->session->set_userdata('keyword', null);
        $this->load->view('templates/header', $data);
        $this->load->view('pkk/kontak', $data);
        $this->load->view('templates/footer', $data);
    }

    public function kirimPesan()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim|numeric');
        // $this->form_validation->set_rules('pesan', 'text', 'required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'TPPKK WONOGIRI';
            $this->load->view('templates/header', $data);
            $this->load->view('pkk/kontak', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $pesan = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'telepon' => $this->input->post('telepon'),
                'pesan' => $this->input->post('pesan'),
                'tanggal' => time()
            ];
            // $this->db->insert('pesan', $pesan);
            // echo var_dump($pesan);
            // die;
            $this->Pesan_model->simpanPesan($pesan);
            $this->session->set_flashdata('pesan', 'dikirimkan ke TPPKK Kab. Wonogiri');
            $this->session->set_flashdata('message', '<div class="alert alert-primary col-lg-6" role="alert">Pesan berhasil dikirim.</div>');

            redirect('kontak');
        }
    }
}
