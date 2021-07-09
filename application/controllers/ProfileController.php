<?php

class ProfileController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProfileModel');
    }

    public function index()
    {
        $data['profiles'] = $this->getProfile();
        $data['histories'] = $this->getOrderHistory();
        $this->load->view('templates/headers.php');
        $this->load->view('templates/navigations.php');
        $this->load->view('ProfileInterface.php', $data);
        $this->load->view('templates/footers.php');
    }

    public function getProfile()
    {
        return $this->ProfileModel->getProfileModel();
    }

    public function getOrderHistory()
    {
        return $this->ProfileModel->getOrderHistoryModel();
    }

}
