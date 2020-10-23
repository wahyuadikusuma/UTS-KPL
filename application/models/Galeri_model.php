<?php

class Galeri_model extends CI_model
{
    // start datatables untuk admin/foto kegiatan
    var $column_order = array(null, 'nama_pokja', 'nama_kegiatan'); //set column field database for datatable orderable
    var $column_search = array('nama_pokja', 'nama_kegiatan'); //set column field database for datatable searchable
    var $order = array('nama_pokja' => 'asc'); // default order

    public function _get_datatables_query()
    {
        $this->db->select('kegiatan.*, pokja.nama_pokja, foto_kegiatan.*');
        $this->db->from('kegiatan');
        $this->db->join('foto_kegiatan', 'foto_kegiatan.id_kegiatan=kegiatan.id_kegiatan');
        $this->db->join('pokja', 'pokja.id_pokja=kegiatan.id_pokja');
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
        $this->db->from('foto_kegiatan');
        return $this->db->count_all_results();
    }
    // end datatables



    // --------- POKJA ----------
    public function getPokja()
    {
        return $this->db->get('pokja')->result();
    }

    public function getPokjaById($id_pokja)
    {
        $this->db->where('id_pokja', $id_pokja);
        return $this->db->get('pokja')->row();
    }

    public function addPokja($data)
    {
        $this->db->insert('pokja', $data);
    }

    public function editPokja($id_pokja, $nama)
    {
        $this->db->set('nama_pokja', $nama);
        $this->db->where('id_pokja', $id_pokja);
        return $this->db->update('pokja');
    }

    public function deletePokja($id_pokja)
    {
        $this->db->where('id_pokja', $id_pokja);
        $this->db->delete('pokja');
    }

    // -------- KEGIATAN ---------
    public function getKegiatan()
    {
        $this->db->select('*');
        $this->db->from('kegiatan');
        $this->db->join('pokja', 'pokja.id_pokja=kegiatan.id_pokja');
        $this->db->order_by('nama_kegiatan', 'ASC');
        return $this->db->get()->result();
    }

    public function getAllKegiatan()
    {
        return $this->db->get('kegiatan')->result();
    }

    //menampilkan di edit kegiatan & di view galeri ketika memilih kegiatan
    public function getKegiatanById($id_kegiatan)
    {
        $this->db->select('*');
        $this->db->from('kegiatan');
        $this->db->join('pokja', 'pokja.id_pokja=kegiatan.id_pokja');
        $this->db->where('kegiatan.id_kegiatan', $id_kegiatan);
        return $this->db->get()->row();
    }

    //ini untuk menampilkan di view galeri (bukan admin)
    public function getKegiatanByIdPokja($id_kegiatan)
    {
        $this->db->select('*');
        $this->db->from('kegiatan');
        $this->db->join('pokja', 'pokja.id_pokja=kegiatan.id_pokja');
        $this->db->where('pokja.id_pokja', $id_kegiatan);
        return $this->db->get()->result();
    }

    public function addKegiatan($data)
    {
        $this->db->insert('kegiatan', $data);
    }

    public function editKegiatan($id_kegiatan, $id_pokja, $nama_kegiatan)
    {
        $this->db->set('id_pokja', $id_pokja);
        $this->db->set('nama_kegiatan', $nama_kegiatan);
        $this->db->where('id_kegiatan', $id_kegiatan);
        $this->db->update('kegiatan');
    }

    public function deleteKegiatan($id_kegiatan)
    {
        $this->db->where('id_kegiatan', $id_kegiatan);
        $this->db->delete('kegiatan');
    }

    // =============    FOTO PER KEGIATAN    ==============

    public function getAllFotoKegiatan()
    {
        $this->db->select('kegiatan.*, pokja.nama_pokja, foto_kegiatan.*');
        $this->db->from('kegiatan');
        $this->db->join('foto_kegiatan', 'foto_kegiatan.id_kegiatan=kegiatan.id_kegiatan');
        $this->db->join('pokja', 'pokja.id_pokja=kegiatan.id_pokja');
        $this->db->order_by('kegiatan.nama_kegiatan', 'ASC');
        return $this->db->get()->result();
    }

    public function getFotoKegiatanById($id_kegiatan)
    {
        $this->db->select('*');
        $this->db->from('foto_kegiatan');
        $this->db->where('id_item', $id_kegiatan);
        return $this->db->get()->row();
    }

    public function getFotoKegiatanByIdKegiatan($id_kegiatan)
    {
        $this->db->select('*');
        $this->db->from('kegiatan');
        $this->db->join('foto_kegiatan', 'foto_kegiatan.id_kegiatan = kegiatan.id_kegiatan');
        $this->db->where('foto_kegiatan.id_kegiatan', $id_kegiatan);
        return $this->db->get()->result();
    }

    public function addFotoKegiatan($data)
    {
        $this->db->insert('foto_kegiatan', $data);
    }

    public function editFotoKegiatan($id, $id_kegiatan)
    {
        $this->db->set('id_kegiatan', $id_kegiatan);
        $this->db->where('id_item', $id);
        $this->db->update('foto_kegiatan');
    }

    public function deleteFotoKegiatan($id_kegiatan)
    {
        $this->db->where('id_item', $id_kegiatan);
        $this->db->delete('foto_kegiatan');
    }


    // ===========================    GALERI    ===================================== // 

    public function getGaleri()
    {
        return $this->db->get('galeri')->result();
    }

    public function getGaleriById($idgaleri)
    {
        $this->db->where('id', $idgaleri);
        return $this->db->get('galeri')->row();
    }

    public function editGaleri($idgaleri, $teks1, $teks2)
    {
        $this->db->set('teks1', $teks1);
        $this->db->set('teks2', $teks2);
        $this->db->where('id', $idgaleri);
        return $this->db->update('galeri');
    }

    public function countAllGaleri()
    {
        return $this->db->get('galeri')->num_rows();
    }

    public function createGaleri($data)
    {
        $this->db->insert('galeri', $data);
    }

    public function deleteGaleri($idgaleri)
    {
        $this->db->where('id', $idgaleri);
        return $this->db->delete('galeri');
    }

    public function addGaleri($data)
    {
        $this->db->insert('galeri', $data);
    }
}
