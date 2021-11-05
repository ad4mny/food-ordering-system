<?php

class VendorModel extends CI_Model
{
    public function getDashboardAnalyticModel()
    {
        $data = [];

        $this->db->select('COUNT(*) as value');
        $this->db->from('order_data');
        $this->db->join('payment_data', 'pd_od_id = od_id');
        $this->db->join('catalog_data', 'cd_id = od_cd_id');
        $this->db->where('catalog_data.cd_ud_id', $_SESSION['uid']);
        $this->db->where('pd_status', 'Paid');
        $data['paid'] = $this->db->get()->row_array();

        $this->db->select('COUNT(*) as value');
        $this->db->from('order_data');
        $this->db->join('catalog_data', 'cd_id = od_cd_id');
        $this->db->where('catalog_data.cd_ud_id', $_SESSION['uid']);
        $this->db->where('od_status', 'Completed');
        $data['complete'] = $this->db->get()->row_array();

        $this->db->select('COUNT(*) as value');
        $this->db->from('order_data');
        $this->db->join('catalog_data', 'cd_id = od_cd_id');
        $this->db->where('catalog_data.cd_ud_id', $_SESSION['uid']);
        $this->db->where('od_status', 'Preparing');
        $data['pending'] = $this->db->get()->row_array();

        $this->db->select('COUNT(*) as value');
        $this->db->from('order_data');
        $this->db->join('catalog_data', 'cd_id = od_cd_id');
        $this->db->where('catalog_data.cd_ud_id', $_SESSION['uid']);
        $data['total'] = $this->db->get()->row_array();

        $this->db->select('SUM(pd_amount) as value');
        $this->db->from('payment_data');
        $this->db->join('order_data', 'od_id = pd_od_id');
        $this->db->join('catalog_data', 'cd_id = od_cd_id');
        $this->db->where('catalog_data.cd_ud_id', $_SESSION['uid']);
        $data['invoice'] = $this->db->get()->row_array();

        $this->db->select('COUNT(*) as value');
        $this->db->from('catalog_data');
        $this->db->where('cd_ud_id', $_SESSION['uid']);
        $data['menu'] = $this->db->get()->row_array();

        return $data;
    }

    public function getAllActiveOrderModel()
    {
        $this->db->select('*');
        $this->db->from('order_data');
        $this->db->join('catalog_data', 'cd_id = od_cd_id');
        $this->db->join('user_data', 'ud_id = cd_ud_id');
        $this->db->where('catalog_data.cd_ud_id', $_SESSION['uid']);
        $this->db->where('od_status !=', 'Paid');
        $this->db->order_by('od_status', 'DESC');

        return $this->db->get()->result_array();
    }

    public function getAllCatalogModel()
    {
        $this->db->select('*');
        $this->db->from('catalog_data');
        $this->db->where('cd_ud_id', $_SESSION['uid']);

        return $this->db->get()->result_array();
    }

    public function getCatalogByIDModel($catalog_id)
    {
        $this->db->select('*');
        $this->db->from('catalog_data');
        $this->db->where('cd_id', $catalog_id);
        $this->db->where('cd_ud_id', $_SESSION['uid']);

        return $this->db->get()->result_array();
    }

    public function setOrderReadyModel($order_id)
    {
        $data = array(
            'od_status' => 'Completed',
            'od_log' => date('H:i:s Y-m-d')
        );

        $this->db->where('od_id', $order_id);
        return $this->db->update('order_data', $data);
    }

    public function setOrderPaidModel($order_id)
    {
        $data = array(
            'od_status' => 'Paid',
            'od_log' => date('H:i:s Y-m-d')
        );

        $this->db->where('od_id', $order_id);
        return $this->db->update('order_data', $data);
    }

    public function setOrderDeleteModel($order_id)
    {
        $this->db->where('od_id', $order_id);
        return $this->db->delete('order_data');
    }

    public function setNewMenuModel()
    {
        $data = array(
            'cd_ud_id' => $_SESSION['uid'],
            'cd_name' => 'New Menu',
            'cd_desc' => 'Waiting for vendor to update the catalog information.',
            'cd_log' => date('H:i:s Y-m-d')
        );

        return $this->db->insert('catalog_data', $data);
    }

    public function setCatalogUpdateModel($catalog_id, $name, $desc, $price, $img = NULL)
    {
        if ($img !== NULL) {

            $data = array(
                'cd_name' => $name,
                'cd_desc' => $desc,
                'cd_price' => $price,
                'cd_img' => $img,
                'cd_log' => date('H:i:s Y-m-d')
            );
        } else {

            $data = array(
                'cd_name' => $name,
                'cd_desc' => $desc,
                'cd_price' => $price,
                'cd_log' => date('H:i:s Y-m-d')
            );
        }

        $this->db->where('cd_ud_id', $_SESSION['uid']);
        $this->db->where('cd_id', $catalog_id);
        return $this->db->update('catalog_data', $data);
    }

    public function setCatalogDeleteModel($catalog_id)
    {
        $this->db->select('*');
        $this->db->from('catalog_data');
        $this->db->where('cd_id', $catalog_id);
        $this->db->where('cd_ud_id', $_SESSION['uid']);

        $data = $this->db->get()->row_array();

        if ($data['cd_img'] !== NULL) {
            unlink(base_url() . 'assets/catalog/' . $data['cd_img']);
        }

        $this->db->where('cd_id', $catalog_id);
        $this->db->where('cd_ud_id', $_SESSION['uid']);
        return $this->db->delete('catalog_data');
    }
}
