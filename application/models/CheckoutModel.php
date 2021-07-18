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
        $this->db->join('user_data', 'ud_id = cd_ud_id');
        $this->db->where_in('cd_id', $data);

        return $this->db->get()->result_array();
    }

    public function getAllActiveOrdersModel()
    {
        $this->db->select('*');
        $this->db->from('order_data');
        $this->db->join('catalog_data', 'cd_id = od_cd_id');
        $this->db->join('user_data', 'ud_id = cd_ud_id');
        $this->db->where('od_ud_id', $_SESSION['uid']);
        $this->db->where('od_status', 'Preparing');

        return $this->db->get()->result_array();
    }

    public function addNewOrderModel()
    {

        $this->db->select('*');
        $this->db->from('order_data');
        $this->db->where('od_ud_id', $_SESSION['uid']);
        $this->db->where('od_status', 'Preparing');

        if ($this->db->get()->num_rows() > 0) {
            return 0;
        } else {
            $data = [];

            foreach ($_SESSION['order'] as $key => $value) {

                $order_array = array(
                    'od_ud_id' => $_SESSION['uid'],
                    'od_cd_id' => $key,
                    'od_quantity' => $value,
                    'od_status' => 'Preparing',
                    'od_log' => date('H:i:s Y-m-d')
                );

                array_push($data, $order_array);
            }

            return $this->db->insert_batch('order_data', $data);
        }
    }
}
