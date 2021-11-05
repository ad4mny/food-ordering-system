<?php
header("Access-Control-Allow-Origin: *");

class BookTableController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BookTableModel');
    }

    public function index()
    {
        $data['tables'] = $this->getAllAvailableTable();
        $this->load->view('templates/headers.php');
        $this->load->view('templates/navigations.php');
        $this->load->view('BookTableInterface.php', $data);
        $this->load->view('templates/modals.php');
        $this->load->view('templates/footers.php');
    }

    public function getAllAvailableTable()
    {
        return $this->BookTableModel->getAllAvailableTableModel();
    }

    public function setTableBooking($table_id)
    {
        if (!isset($_SESSION['uid'])) {
            $this->session->set_tempdata('error', 'Failed to book your requested tables, please login first.', 1);
            redirect(base_url() . 'table');
        } else {
            if ($this->BookTableModel->setTableBookingModel($table_id) === true) {
                $this->session->set_tempdata('notice', 'Your table has been booked successfully.', 1);
                redirect(base_url() . 'table');
            } else {
                $this->session->set_tempdata('error', 'Failed to book your requested tables.', 1);
                redirect(base_url() . 'table');
            }
        }
    }

    public function removeTableBooking($table_id)
    {
        if (!isset($_SESSION['uid'])) {
            $this->session->set_tempdata('error', 'Failed to remove your booked tables, please login first.', 1);
            redirect(base_url() . 'table');
        } else {
            if ($this->BookTableModel->removeTableBookingModel($table_id) === true) {
                $this->session->set_tempdata('notice', 'Your table has been removed successfully.', 1);
                redirect(base_url() . 'table');
            } else {
                $this->session->set_tempdata('error', 'Failed to remove your booked tables.', 1);
                redirect(base_url() . 'table');
            }
        }
    }
}
