<?php
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

            $this->session->set_userdata('uid', $return->ud_id);
            $this->session->set_userdata('user', $return->ud_full_name);
            $this->session->set_userdata('name', $return->ud_username);
            $this->session->set_userdata('role', $return->ud_role);

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
        } else {
            $this->session->set_tempdata('error', 'Wrong username or password entered.', 3);
            redirect(base_url());
        }
    }

    public function create_user_account()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $full_name = $this->input->post('full_name');
        $contact_number = $this->input->post('contact_number');
        $street_1 = $this->input->post('street_1');
        $street_2 = $this->input->post('street_2');
        $postcode = $this->input->post('postcode');
        $city = $this->input->post('city');
        $state = $this->input->post('state');

        $return = $this->LoginModel->create_user_account_model($username, $password, $full_name, $contact_number, $street_1, $street_2, $postcode, $city, $state);

        if ($return !== false) {

            $this->session->set_userdata('userid', encrypt_it($return->ud_id));
            $this->session->set_userdata('username', encrypt_it($return->ud_usr));
            $this->session->set_userdata('role', encrypt_it($return->ud_role));

            $return = $this->LoginModel->login_role_model($this->session->userdata('userid'), $this->session->userdata('role'));

            $this->session->set_userdata('customerid', encrypt_it($return->cd_id));

            $this->session->set_tempdata('notice', 'Welcome ' . decrypt_it($this->session->userdata('userid')) . '! Start adding a computer repair request now.', 3);

            echo json_encode(true);
        } else {
            $this->session->set_tempdata('error', 'Error creating user account, try again later.', 3);
            echo json_encode(false);
        }
    }

    public function create_staff_account()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $type = $this->input->post('type');
        $plat_num = $this->input->post('plat_num');
        $full_name = $this->input->post('full_name');
        $contact_number = $this->input->post('contact_number');
        $email = $this->input->post('email');
        $this->session->set_tempdata('notice', 'Thank you for joining us! Please wait, your account is under approval.', 30);
        echo json_encode($this->LoginModel->create_staff_account_model($username, $password, $type, $plat_num, $full_name, $contact_number, $email));
    }

    public function check_username()
    {
        $username = $this->input->post('username');
        echo json_encode($this->LoginModel->check_username_model($username));
    }

    public function logout()
    {
        $session_data = array(
            'uid',
            'user',
            'name',
            'role'
        );

        $this->session->set_tempdata('notice', 'You have logout successfully.', 3);
        $this->session->unset_userdata($session_data);
        
        redirect(base_url());
    }
}
