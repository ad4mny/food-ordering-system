<?php

class AdminController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AdminModel');
        
        if (!isset($_SESSION['uid'])) {
            redirect(base_url());
        }
    }

    public function index($page = 'dashboard')
    {
        $this->load->view('templates/admin/headers.php');
        $this->load->view('templates/admin/navigations.php');

        if ($page === 'catalog') {
            $data['catalogs'] = $this->getAllCatalog();
            $this->load->view('admin/ViewAllCatalogInterface.php', $data);
        } else  if ($page === 'approve') {
            $data['approves'] = $this->getAllVendor();
            $this->load->view('admin/ApproveVendorInterface.php', $data);
        } else if ($page === 'table') {
            $data['tables'] = $this->getAllTable();
            $this->load->view('admin/AddTableInterface.php', $data);
        } else {
            $data['dashboards'] = $this->getDashboardAnalytic();
            $this->load->view('admin/DashboardInterface.php', $data);
        }

        $this->load->view('templates/admin/footers.php');
    }

    public function getDashboardAnalytic()
    {
        return $this->VendorModel->getDashboardAnalyticModel();
    }

    public function getAllCatalog()
    {
        return $this->VendorModel->getAllCatalogModel();
    }

    public function getAllVendor()
    {
        return $this->VendorModel->getAllVendorModel();
    }    
    
    public function getAllTable()
    {
        return $this->VendorModel->getAllTableModel();
    }

    public function setCatalogDelete($catalog_id)
    {
        if ($this->VendorModel->setCatalogDeleteModel($catalog_id) !== false) {
            $this->session->set_tempdata('notice', 'Your catalog has been deleted succesfully.', 1);
            redirect(base_url() . 'vendor/catalogs');
        } else {
            $this->session->set_tempdata('error', 'Failed to delete your catalog.', 1);
            redirect(base_url() . 'vendor/catalogs');
        }
    }
}
