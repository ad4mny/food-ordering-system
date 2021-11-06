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
        } else  if ($page === 'vendor') {
            $data['vendors'] = $this->getAllVendor();
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
        return $this->AdminModel->getDashboardAnalyticModel();
    }

    public function getAllCatalog()
    {
        return $this->AdminModel->getAllCatalogModel();
    }

    public function getAllVendor()
    {
        return $this->AdminModel->getAllVendorModel();
    }    
    
    public function getAllTable()
    {
        return $this->AdminModel->getAllTableModel();
    }

    public function setVendorApprove($vendor_id)
    {
        if ($this->AdminModel->setVendorApproveModel($vendor_id) !== false) {
            $this->session->set_tempdata('notice', 'Vendor has been approved succesfully.', 1);
            redirect(base_url() . 'admin/approve');
        } else {
            $this->session->set_tempdata('error', 'Failed to approve the vendor.', 1);
            redirect(base_url() . 'admin/approve');
        }
    }

    public function setVendorDelete($vendor_id)
    {
        if ($this->AdminModel->setVendorDeleteModel($vendor_id) !== false) {
            $this->session->set_tempdata('notice', 'Vendor has been remove succesfully.', 1);
            redirect(base_url() . 'admin/approve');
        } else {
            $this->session->set_tempdata('error', 'Failed to remove the vendor.', 1);
            redirect(base_url() . 'admin/approve');
        }
    }

    public function setCatalogDelete($catalog_id)
    {
        if ($this->AdminModel->setCatalogDeleteModel($catalog_id) !== false) {
            $this->session->set_tempdata('notice', 'Your catalog has been deleted succesfully.', 1);
            redirect(base_url() . 'vendor/catalogs');
        } else {
            $this->session->set_tempdata('error', 'Failed to delete your catalog.', 1);
            redirect(base_url() . 'vendor/catalogs');
        }
    }
}
