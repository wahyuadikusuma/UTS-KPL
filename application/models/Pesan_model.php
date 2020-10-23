<?php

class Pesan_model extends CI_model
{
    // start datatables
    var $column_order = array(null, 'nama', 'email', 'telepon', 'pesan', 'tanggal'); //set column field database for datatable orderable
    var $column_search = array('nama', 'email', 'telepon', 'pesan'); //set column field database for datatable searchable
    var $order = array('tanggal' => 'desc'); // default order

    public function _get_datatables_query()
    {
        $this->db->select('*');
        $this->db->from('pesan');
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
        $this->db->from('pesan');
        return $this->db->count_all_results();
    }
    // end datatables

    public function simpanPesan($pesan)
    {
        $this->db->insert('pesan', $pesan);
    }

    public function getPesan($limit, $start)
    {
        $this->db->select('*');
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get('pesan', $limit, $start)->result();
    }

    public function getAllPesan()
    {
        return $this->db->get('pesan')->result();
    }

    public function hapusPesan($id_pesan)
    {
        $this->db->where('id_pesan', $id_pesan);
        return $this->db->delete('pesan');
    }

    public function countAllPesan()
    {
        return $this->db->get('pesan')->num_rows();
    }
}
