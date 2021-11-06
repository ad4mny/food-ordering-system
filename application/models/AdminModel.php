<?php

class AdminModel extends CI_Model
{

    public function getDashboardAnalyticModel()
    {
        $data = [];
        $this->db->select('COUNT(*) as value');
        $this->db->from('user_data');
        $this->db->where('ud_role', 1);
        $data['vendor'] = $this->db->get()->row_array();

        $this->db->select('COUNT(*) as value');
        $this->db->from('order_data');
        $this->db->join('payment_data', 'pd_od_id = od_id');
        $this->db->where('pd_status', 'Paid');
        $data['paid'] = $this->db->get()->row_array();

        $this->db->select('COUNT(*) as value');
        $this->db->from('order_data');
        $this->db->where('od_status', 'Completed');
        $data['complete'] = $this->db->get()->row_array();

        $this->db->select('COUNT(*) as value');
        $this->db->from('order_data');
        $this->db->where('od_status', 'Preparing');
        $data['pending'] = $this->db->get()->row_array();

        $this->db->select('COUNT(*) as value');
        $this->db->from('order_data');
        $data['total'] = $this->db->get()->row_array();

        $this->db->select('SUM(pd_amount) as value');
        $this->db->from('payment_data');
        $data['invoice'] = $this->db->get()->row_array();

        $this->db->select('COUNT(*) as value');
        $this->db->from('catalog_data');
        $data['menu'] = $this->db->get()->row_array();

        return $data;
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
        $this->db->order_by('ud_status');
        return $this->db->get()->result_array();
    }

    public function getAllTableModel()
    {
        $this->db->select('*');
        $this->db->from('table_data');
        return $this->db->get()->result_array();
    }

    public function setVendorApproveModel($vendor_id)
    {
        $data = array(
            'ud_status' => 1
        );

        $this->db->where('ud_id', $vendor_id);
        return $this->db->update('user_data', $data);
    }

    public function setVendorDeleteModel($vendor_id)
    {
        $this->db->where('ud_id', $vendor_id);
        return $this->db->delete('user_data');
    }

    public function setCatalogDeleteModel($catalog_id)
    {
        return 0;
    }
}
