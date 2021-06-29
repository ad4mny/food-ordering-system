<?php

class CatalogController extends CI_Model
{
    public function getAllMenu()
    {
        $this->db->select('*');
        $this->db->from('catalog_data');
        $this->db->join('user_data', 'ud_id = cd_ud_id');
        return $this->db->get()->result_array();
    }
}
