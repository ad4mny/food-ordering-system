<?php

class ProfileModel extends CI_Model
{
    public function getProfileModel()
    {
        $this->db->select('*');
        $this->db->from('user_data');
        $this->db->where('ud_id', $_SESSION['uid']);
        return $this->db->get()->row_array();
    }

    public function getOrderHistoryModel()
    {
        $this->db->select('*');
        $this->db->from('order_data');
        $this->db->join('catalog_data', 'cd_id = od_cd_id');
        $this->db->where('od_ud_id', $_SESSION['uid']);
        $this->db->where('od_status', 'Completed');
        return $this->db->get()->result_array();
    }
}
