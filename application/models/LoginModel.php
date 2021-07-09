<?php
class LoginModel extends CI_Model
{
    public function loginAuthModel($username, $password)
    {
        $this->db->select('*');
        $this->db->from('user_data');
        $this->db->where('ud_username', $username);
        $this->db->where('ud_password', $password);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->row();

            $data = array(
                'ud_log' => date('Y-m-d H:i:s')
            );

            $this->db->where('ud_id', $result->ud_id);
            $this->db->update('user_data', $data);

            return $result;
        } else {
            return false;
        }
    }

    public function checkUsernameModel($username)
    {
        $this->db->select('*');
        $this->db->from('user_data');
        $this->db->where('ud_usr', $username);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function registerUserModel($username, $password, $full_name, $contact_number, $street_1, $street_2, $postcode, $city, $state)
    {
        // create new user data
        $data = array(
            'ud_usr' =>  $username,
            'ud_pwd' =>  $password,
            'ud_role' => 0,
            'ud_log' => date('Y-m-d H:i:s '),
            'ud_created' => date('Y-m-d H:i:s ')
        );

        // insert user data
        $this->db->insert('user_data', $data);

        // get new inserted user data
        $this->db->select('ud_id');
        $this->db->from('user_data');
        $this->db->where('ud_usr', $username);
        $this->db->where('ud_pwd', $password);

        // get user id 
        $result = $this->db->get()->row();

        // create new customer data
        $data = array(
            'cd_ud_id' => $result->ud_id,
            'cd_full_name' => $full_name,
            'cd_phone' => $contact_number,
            'cd_street_1' => $street_1,
            'cd_street_2' => $street_2,
            'cd_postcode' => $postcode,
            'cd_city' => $city,
            'cd_state' => $state,
        );

        // insert customer data 
        $this->db->insert('customer_data', $data);

        return $this->loginAuthModel($username, $password);
    }

    public function registerVendorModel($username, $password, $type, $plat_num, $full_name, $contact_number, $email)
    {
        // create new user data
        $data = array(
            'ud_usr' => $username,
            'ud_pwd' => $password,
            'ud_role' => $type,
            'ud_email' => $email,
            'ud_log' => date('Y-m-d H:i:s '),
            'ud_created' => date('Y-m-d H:i:s ')
        );

        // insert user data
        $this->db->insert('user_data', $data);

        // get new inserted user data
        $this->db->select('*');
        $this->db->from('user_data');
        $this->db->where('ud_usr', $username);
        $this->db->where('ud_pwd', $password);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            $result = $query->row();
            $email = $result->ud_email;

            if ($type == 2) {
                $data = array(
                    'sd_ud_id' => $result->ud_id,
                    'sd_full_name' => $full_name,
                    'sd_phone' => $contact_number
                );

                return $this->db->insert('staff_data', $data);
            } else {
                $data = array(
                    'rd_ud_id' => $result->ud_id,
                    'rd_full_name' => $full_name,
                    'rd_phone' => $contact_number,
                    'rd_plat_num' => $plat_num
                );

                return $this->db->insert('runner_data', $data);
            }
        } else {
            return false;
        }
    }
}
