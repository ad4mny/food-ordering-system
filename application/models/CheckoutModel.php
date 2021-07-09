<?php

class CheckoutModel extends CI_Model
{
    public function getAllBasketItemDetailsModel()
    {
        $data = [];

        foreach ($_SESSION['order'] as $key => $value) {
            array_push($data, $key);
        }

        $this->db->select('*');
        $this->db->from('catalog_data');
        $this->db->where_in('cd_id', $data);

        return $this->db->get()->result_array();
    }
}
