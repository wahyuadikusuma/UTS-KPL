<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materi extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'TPPKK Wonogiri';

        $this->load->view('templates/header', $data);
        $this->load->view('pkk/materi', $data);
        $this->load->view('templates/footer', $data);
    }

    public function downloadMateri($id_materi)
    {
        $this->load->helper('download');
        $fileinfo = $this->Materi_model->getMateriById($id_materi);
        // var_dump($fileinfo);
        // die;
        if ($fileinfo) {
            $this->db->set('jumlah_unduh', 'jumlah_unduh+1', false);
            $this->db->where('id_materi', $id_materi);
            $this->db->update('materi');
            $file = 'assets/file/materi/' . $fileinfo->nama_file;
            force_download($file, NULL);
            redirect('materi');
        } else {
            echo 'File tidak ditemukan';
        }
    }

    function get_ajax_materi()
    {
        $this->load->model('Materi_model');
        $list = $this->Materi_model->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $item->judul;
            $row[] = $item->nama_file;
            $row[] = round((($item->file_size) / 1000000), 3) . ' Mb';
            $row[] = '<div class="text-center">'  . $item->jumlah_unduh . ' kali</div>';
            // $row[] =  $item->nama_file != null ? base_url('assets/materi/file' . $item->nama_file)  : null;
            date_default_timezone_set("Asia/Jakarta");
            $row[] = $this->tgl_indo(date('Y G:i -m-d', $item->tanggal));
            // add html for action
            $row[] = '<a href="' . base_url('materi/downloadMateri/' . $item->id_materi) . '" class="btn btn-success btn-sm text-center d-block mb-1"><i class="fas fa-download"></i> Download</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Materi_model->count_all(),
            "recordsFiltered" => $this->Materi_model->count_filtered(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }

    public function tgl_indo($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tahun
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tanggal

        return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
    }
}
