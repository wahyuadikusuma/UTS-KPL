<?php

class Slider_model extends CI_model
{
    public function getSlider()
    {
        return $this->db->get('slider')->result();
    }

    public function getSliderById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('slider')->row();
    }

    public function editSlider($id, $teks1, $teks2)
    {
        $this->db->set('teks1', $teks1);
        $this->db->set('teks2', $teks2);
        $this->db->where('id', $id);
        return $this->db->update('slider');
    }

    public function countAllSlider()
    {
        return $this->db->get('slider')->num_rows();
    }

    public function createSlider($data)
    {
        $this->db->insert('slider', $data);
    }

    public function deleteSlider($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('slider');
    }

    public function addSlider($data)
    {
        $this->db->insert('slider', $data);
    }
}
