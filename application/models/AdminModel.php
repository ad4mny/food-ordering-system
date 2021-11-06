<?php

class AdminModel extends CI_Model
{

    public function getDashboardAnalyticModel()
    {
        return;
    }

    public function getAllCatalogModel()
    {
        $this->db->select('*');
        $this->db->from('catalog_data');
        return $this->db->get()->result_array();
    }

    public function getAllVendorModel()
    {
        $this->db->select('*');
        $this->db->from('user_data');
        $this->db->where('ud_role', 1);
        return $this->db->get()->result_array();
    }

    public function getAllTableModel()
    {
        $this->db->select('*');
        $this->db->from('catalog_data');
        return $this->db->get()->result_array();
    }

    public function setCatalogDeleteModel($catalog_id)
    {
        return 0;
    }
}
