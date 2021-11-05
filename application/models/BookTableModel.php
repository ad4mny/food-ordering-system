<?php

class BookTableModel extends CI_Model
{
    public function getAllAvailableTableModel()
    {
        $this->db->select('*');
        $this->db->from('table_data');
        return $this->db->get()->result_array();
    }

    public function setTableBookingModel($table_id)
    {
        $data = array(
            'td_ud_id' => $_SESSION['uid'],
            'td_status' => 0,
            'td_log' => date('H:i:s Y-m-d')
        );
        
        $this->db->where('td_id', $table_id);
        return $this->db->update('table_data', $data);
    }

    public function removeTableBookingModel($table_id)
    {
        $data = array(
            'td_ud_id' => NULL,
            'td_status' => 1,
            'td_log' => NULL
        );
        
        $this->db->where('td_id', $table_id);
        return $this->db->update('table_data', $data);
    }
}
