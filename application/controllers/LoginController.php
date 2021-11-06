<?php
header("Access-Control-Allow-Origin: *");

class LoginController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel');
    }

    public function loginAuth()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $return = $this->LoginModel->loginAuthModel($username, $password);

        if ($return !== false) {
            if ($return['ud_status'] !== 1) {
                $this->session->set_tempdata('notice', 'Your vendor account is in pending approval, please wait a while we validate your vendor registration information.', 1);
                redirect(base_url());
            } else {

                $this->session->set_userdata('uid', $return['ud_id']);
                $this->session->set_userdata('user', $return['ud_username']);
                $this->session->set_userdata('name', $return['ud_full_name']);
                $this->session->set_userdata('role', $return['ud_role']);

                switch ($this->session->userdata('role')) {
                    case 2:
                        redirect(base_url() . 'admin/dashboard');
                        break;
                    case 1:
                        redirect(base_url() . 'vendor/orders');
                        break;
                    default:
                        redirect(base_url());
                        break;
                }
            }
        } else {
            $this->session->set_tempdata('error', 'Wrong username or password entered.', 1);
            redirect(base_url());
        }
    }

    public function createUserAccount()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $confirm_password = $this->input->post('confirm_password');
        $name = $this->input->post('name');
        $contact = $this->input->post('contact');
        $role = $this->input->post('role');

        if ($this->checkUsername($username) !== NULL) {

            $this->session->set_tempdata('error', 'Username unavailable, register again.', 1);
            redirect(base_url());
        } else if ($confirm_password !== $password) {

            $this->session->set_tempdata('error', 'Password mismatch, register again.', 1);
            redirect(base_url());
        } else {

            $password = md5($confirm_password);

            $return = $this->LoginModel->createUserAccountModel($username, $password, $name, $contact, $role);

            if ($return !== false) {
                if ($return['ud_status'] !== 1) {
                    $this->session->set_tempdata('notice', 'Your vendor account is in pending approval, please wait a while we validate your vendor registration information.', 1);
                    redirect(base_url());
                } else {
                    $this->session->set_userdata('uid', $return['ud_id']);
                    $this->session->set_userdata('user', $return['ud_username']);
                    $this->session->set_userdata('name', $return['ud_full_name']);
                    $this->session->set_userdata('role', $return['ud_role']);

                    switch ($this->session->userdata('role')) {
                        case 2:
                            redirect(base_url() . 'admin/dashboard');
                            break;
                        case 1:
                            redirect(base_url() . 'vendor/dashboard');
                            break;
                        default:
                            redirect(base_url());
                            break;
                    }
                }
            } else {
                $this->session->set_tempdata('error', 'Wrong username or password entered.', 1);
                redirect(base_url());
            }
        }
    }

    public function checkUsername($username)
    {
        return $this->LoginModel->checkUsernameModel($username);
    }

    public function logout()
    {
        $session_data = array(
            'uid',
            'user',
            'name',
            'role'
        );

        $this->session->set_tempdata('notice', 'You have logout successfully.', 1);
        $this->session->unset_userdata($session_data);

        redirect(base_url());
    }

    // API Module
    public function loginAuthAPI()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $return = $this->LoginModel->loginAuthModel($username, $password);

        if ($return !== false) {
            echo json_encode($return);
            exit;
        } else {
            echo json_encode(false);
            exit;
        }
    }

    public function createUserAccountAPI()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $name = $this->input->post('name');
        $contact = $this->input->post('contact');
        $role = $this->input->post('role');

        if ($this->checkUsername($username) !== NULL) {

            echo json_encode('Username unavailable, register again.');
            exit;
        } else {

            $return = $this->LoginModel->createUserAccountModel($username, md5($password), $name, $contact, $role);

            if ($return !== false) {
                echo json_encode($return);
                exit;
            } else {
                echo json_encode(false);
                exit;
            }
        }
    }
}
