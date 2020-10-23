<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'TPPKK Wonogiri';

        if ($this->input->get('submit')) {
            $data['keyword'] = $this->input->get('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        // config
        $this->db->like('judul', $data['keyword']);
        $this->db->from('artikel');

        $config['base_url'] = 'https://localhost/TPPKK-Wonogiri/artikel/index';
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 6;

        //initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['artikel'] = $this->Artikel_model->getArtikel($config['per_page'], $data['start'], $data['keyword']);


        $this->load->view('templates/header', $data);
        $this->load->view('pkk/artikel', $data);
        $this->load->view('templates/footer', $data);
    }

    public function readArtikel($id_artikel)
    {
        $data['title'] = 'TPPKK Wonogiri';

        $data['artikel'] = $this->Artikel_model->getArtikelById($id_artikel);

        //increment jumlah view artikel
        $this->db->set('views', 'views+1', false);
        $this->db->where('id_artikel', $id_artikel);
        $this->db->update('artikel');

        //get artikel popular
        $data['popular'] = $this->Artikel_model->getArtikelPopular();

        $this->load->view('templates/header', $data);
        $this->load->view('pkk/bacaartikel', $data);
        $this->load->view('templates/footer', $data);
    }
}
