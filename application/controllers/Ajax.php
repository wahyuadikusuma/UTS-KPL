<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Ajax extends CI_Controller
{
    public function index()
    {
        $username = $this->session->userdata('username');
        $this->db->select('name, username, email, image');
        $data = $this->db->get_where('akun', ['username' => $username])->row_array();

        $data['title'] = 'TPPKK Wonogiri - Admin';
        $data['subtitle'] = 'Artikel';
        $data['artikel'] = $this->Artikel_model->getAllArtikel();

        $this->load->view('admin/templates/admin_header', $data);
        $this->load->view('admin/templates/admin_sidebar');
        $this->load->view('admin/templates/admin_topbar', $data);
        $this->load->view('admin/artikel');
        $this->load->view('admin/templates/admin_footer');
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

    function get_ajax_artikel()
    {
        $list = $this->Artikel_model->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = word_limiter($item->judul, 10, ' ...');
            $row[] = word_limiter($item->isi_artikel, 20, '...');
            $row[] = $item->views . ' kali';
            date_default_timezone_set("Asia/Jakarta");
            $row[] = $this->tgl_indo(date('Y G:i -m-d', $item->tanggal));
            $row[] = $item->gambar != null ? '<img src="' . base_url('assets/img/admin/artikel/' . $item->gambar) . '" class="img" style="width:100px">' : null;
            // add html for action
            $row[] = '<a href="' . base_url('admin/editArtikel/' . $item->id_artikel) . '" class="btn btn-warning btn-sm d-block mb-1"><i class="far fa-edit"></i> Edit</a>
            <a href="' . base_url('admin/deleteArtikel/' . $item->id_artikel) . '" class="btn btn-danger btn-sm text-light d-block hapus-artikel" onclick="return confirm(\'Yakin hapus artikel ini?\')"><i class="far fa-trash-alt"></i> Hapus</a>';

            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Artikel_model->count_all(),
            "recordsFiltered" => $this->Artikel_model->count_filtered(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }
    //  '<a href="' . base_url('item/edit/' . $item->item_id) . '" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Update</a>
    //        <a href="' . site_url('item/del/' . $item->item_id) . '" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>';

    function get_ajax_pesan()
    {
        $list = $this->Pesan_model->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $item->nama;
            $row[] = $item->email;
            $row[] = $item->telepon;
            $row[] = $item->pesan;
            date_default_timezone_set("Asia/Jakarta");
            $row[] = $this->tgl_indo(date('Y G:i -m-d', $item->tanggal));
            // add html for action
            $row[] = '<a href="' . base_url('admin/hapusPesan/' . $item->id_pesan) . '" class="btn btn-danger btn-sm text-light text-center hapus-pesan"  onclick="return confirm(\'Yakin hapus data?\')">  <i class="far fa-trash-alt"></i> Hapus</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Pesan_model->count_all(),
            "recordsFiltered" => $this->Pesan_model->count_filtered(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }

    function get_ajax_fotokegiatan()
    {
        $list = $this->Galeri_model->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $item->nama_pokja;
            $row[] = $item->nama_kegiatan;
            $row[] =  $item->foto != null ? '<img src="' . base_url('assets/img/admin/fotokegiatan/' . $item->foto) . '" class="img" style="width:100px">' : null;
            // $row[] = $this->tgl_indo(date('Y-m-d', $item->tanggal));
            // add html for action
            $row[] = '<div class="text-center"><a href="' . base_url('admin/editFotoKegiatan/' . $item->id_item) . '" class="btn btn-warning btn-sm"><i class="far fa-edit"></i> Edit</a>
            <a href="' . base_url('admin/deleteFotoKegiatan/' . $item->id_item) . '" class="btn btn-danger btn-sm text-light hapus-artikel" onclick="return confirm(\'Yakin hapus foto kegiatan ini?\')"><i class="far fa-trash-alt"></i> Hapus</a></div>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Galeri_model->count_all(),
            "recordsFiltered" => $this->Galeri_model->count_filtered(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }

    function get_ajax_kegiatan()
    {
        $this->load->model('Kegiatan_model');
        $list = $this->Kegiatan_model->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $item->nama_pokja;
            $row[] = $item->nama_kegiatan;
            $row[] =  $item->gambar != null ? '<img src="' . base_url('assets/img/admin/kegiatan/' . $item->gambar) . '" class="img" style="width:100px">' : null;
            // $row[] = $this->tgl_indo(date('Y-m-d', $item->tanggal));
            // add html for action
            $row[] = '<div class="text-center"><a href="' . base_url('admin/editKegiatan/' . $item->id_kegiatan) . '" class="btn btn-warning btn-sm d-block mb-1"><i class="far fa-edit"></i> Edit</a>
            <a href="' . base_url('admin/deleteKegiatan/' . $item->id_kegiatan) . '" class="btn btn-danger btn-sm text-light d-block hapus-artikel" onclick="return confirm(\'Yakin hapus data kegiatan ini?\')"><i class="far fa-trash-alt"></i> Hapus</a></div>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Kegiatan_model->count_all(),
            "recordsFiltered" => $this->Kegiatan_model->count_filtered(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
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
            $row[] = '<a href="' . base_url('admin/editMateri/' . $item->id_materi) . '" class="btn btn-warning btn-sm text-center d-block mb-1"><i class="far fa-edit"></i> Edit</a>
            <a href="' . base_url('admin/deleteMateri/' . $item->id_materi) . '" class="btn btn-danger btn-sm text-light text-center d-block mb-1 hapus-materi" onclick="return confirm(\'Yakin hapus Materi ini?\')"><i class="far fa-trash-alt"></i> Hapus</a>';
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
}
