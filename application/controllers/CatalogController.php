<?php

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
        $this->load->view('templates/footers.php');
    }

    public function getAllMenu()
    {
        return $this->CatalogModel->getAllMenu();
    }
}
