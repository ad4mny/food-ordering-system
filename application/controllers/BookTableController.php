<?php

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

}
