<?php

class Artikel_model extends CI_model
{


    // start datatables
    var $column_order = array(null, 'judul', 'isi_artikel', 'views', 'tanggal', 'gambar'); //set column field database for datatable orderable
    var $column_search = array('judul', 'isi_artikel'); //set column field database for datatable searchable
    var $order = array('tanggal' => 'desc'); // default order

    public function _get_datatables_query()
    {
        $this->db->select('*');
        $this->db->from('artikel');
        $index = 0;
        foreach ($this->column_search as $item) { // loop column
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($index === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $index) //last loop
                    $this->db->group_end(); //close bracket
            }
            $index++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    public function get_datatables()
    {
        $this->_get_datatables_query();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all()
    {
        $this->db->from('artikel');
        return $this->db->count_all_results();
    }
    // end datatables

    public function getAllArtikel()
    {
        $this->db->select('*');
        $this->db->from('artikel');
        return $this->db->get()->result();
    }

    public function get12Artikel()
    {
        $this->db->select('judul, views');
        $this->db->from('artikel');
        $this->db->limit(12, 0);
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get()->result();
    }


    public function sumViewersAllArtikel()
    {
        $this->db->select_sum('views');
        $query = $this->db->get('artikel')->row();
        return $query->views;
    }

    public function getArtikel($limit, $start, $keyword)
    {
        $this->db->select('artikel.*, akun.name as penulis');
        $this->db->from('artikel');
        $this->db->join('akun', 'artikel.id_penulis = akun.id_user');
        // return $this->db->get($limit, $start)->result();
        if ($keyword) {
            $this->db->like('artikel.judul', $keyword);
            $this->db->or_like('artikel.isi_artikel', $keyword);
        }
        $this->db->order_by('artikel.tanggal', 'DESC');
        $this->db->limit($limit, $start);
        return $this->db->get()->result();
    }

    public function countAllArtikel()
    {
        return $this->db->get('artikel')->num_rows();
    }
    public function getArtikelTerbaru() //berdasar tanggal
    {
        $this->db->select('artikel.*, akun.name as penulis');
        $this->db->from('artikel');
        $this->db->join('akun', 'artikel.id_penulis = akun.id_user');
        $this->db->order_by('artikel.tanggal', 'DESC');
        $this->db->limit(6);
        return $this->db->get()->result();
    }

    public function addArtikel($data)
    {
        $this->db->insert('artikel', $data);
    }

    public function editArtikel($id_artikel, $judul, $isi_artikel)
    {
        $this->db->set('judul', $judul);
        $this->db->set('isi_artikel', $isi_artikel);
        $this->db->where('id_artikel', $id_artikel);
        return $this->db->update('artikel');
    }
    public function getGambarLama($id_gambar)
    {
        $this->db->select('gambar');
        $this->db->where('id_artikel', $id_gambar);
        return $this->db->get('artikel')->result();
    }
    public function deleteArtikel($id_artikel)
    {
        $this->db->where('id_artikel', $id_artikel);
        return $this->db->delete('artikel');
    }

    public function getArtikelById($id_artikel)
    {
        $this->db->select('artikel.*, akun.name as penulis');
        $this->db->from('artikel');
        $this->db->join('akun', 'artikel.id_penulis = akun.id_user');
        $this->db->where('artikel.id_artikel', $id_artikel);
        return $this->db->get()->row();
    }

    public function getArtikelPopular()
    {
        $this->db->select('artikel.*, akun.name as penulis');
        $this->db->from('artikel');
        $this->db->join('akun', 'artikel.id_penulis = akun.id_user');
        $this->db->order_by('artikel.views', 'DESC');
        $this->db->limit(5);
        return $this->db->get()->result();
    }

    // public function getUser($username)
    // {
    //     $this->db->select('name');
    //     $this->db->from('akun');
    //     return $this->db->get()->result_array();
    // }
}
