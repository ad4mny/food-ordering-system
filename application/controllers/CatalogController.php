<?php
header("Access-Control-Allow-Origin: *");

class CatalogController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CatalogModel');
    }

    public function index()
    {
        $data['menus'] = $this->getAllMenu();
        $this->load->view('templates/headers.php');
        $this->load->view('templates/navigations.php');
        $this->load->view('CatalogInterface.php', $data);
        $this->load->view('templates/modals.php');
        $this->load->view('templates/footers.php');
    }

    public function getAllMenu()
    {
        return $this->CatalogModel->getAllMenuModel();
    }

    public function addOrder($catalog_id)
    {
        if (!isset($_SESSION['order'][$catalog_id])) {
            $_SESSION['order'][$catalog_id] = [];
        } else {
            $_SESSION['order'][$catalog_id] += 1;
        }
        redirect(base_url() . 'catalog');
    }

    // API Module
    public function getAllMenuAPI()
    {
        echo json_encode($this->CatalogModel->getAllMenuModel());
        exit;
    }

}
