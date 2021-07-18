<?php

class ProfileController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProfileModel');
    }

    public function index($page = 'profile')
    {
        $data['profiles'] = $this->getProfile();
        $data['histories'] = $this->getOrderHistory();
        $this->load->view('templates/headers.php');
        $this->load->view('templates/navigations.php');

        if ($page === 'update') {
            $this->load->view('UpdateProfileInterface.php', $data);
        } else {
            $this->load->view('ProfileInterface.php', $data);
        }

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

    public function setProfileUpdate()
    {
        $username = $this->input->post('username');
        $name = $this->input->post('name');
        $contact = $this->input->post('contact');

        if ($this->ProfileModel->setProfileUpdateModel($username, $name, $contact) === true) {

            $this->session->set_tempdata('notice', 'Your profile updated successfully.', 1);
            redirect(base_url() . 'profile');
        } else {

            $this->session->set_tempdata('error', 'Failed to update your profile.', 1);
            redirect(base_url() . 'profile');
        }
    }
}
