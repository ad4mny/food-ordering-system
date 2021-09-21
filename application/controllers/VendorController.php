<?php
header("Access-Control-Allow-Origin: *");

class VendorController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('VendorModel');
        $this->load->library('upload');
    }

    public function index($page = 'orders', $catalog_id = null)
    {
        $this->load->view('templates/vendor/headers.php');
        $this->load->view('templates/vendor/navigations.php');

        if ($page === 'update') {

            $data['updates'] = $this->getCatalogByID($catalog_id);
            $this->load->view('vendor/UpdateCatalogInterface.php', $data);
        } else  if ($page === 'catalogs') {

            $data['catalogs'] = $this->getAllCatalog();
            $this->load->view('vendor/CatalogInterface.php', $data);
        } else {

            $data['orders'] = $this->getAllActiveOrder();
            $this->load->view('vendor/OrderInterface.php', $data);
        }

        $this->load->view('templates/vendor/footers.php');
    }

    public function getAllActiveOrder()
    {
        return $this->VendorModel->getAllActiveOrderModel();
    }

    public function getAllCatalog()
    {
        return $this->VendorModel->getAllCatalogModel();
    }

    public function getCatalogByID($catalog_id)
    {
        return $this->VendorModel->getCatalogByIDModel($catalog_id);
    }

    public function setOrderReady($order_id)
    {
        if ($this->VendorModel->setOrderReadyModel($order_id) !== false) {
            $this->session->set_tempdata('notice', 'The selected order has been mark ready succesfully.', 1);
            redirect(base_url() . 'vendor/orders');
        } else {
            $this->session->set_tempdata('error', 'Failed to mark ready the selected order.', 1);
            redirect(base_url() . 'vendor/orders');
        }
    }

    public function setOrderDelete($order_id)
    {
        if ($this->VendorModel->setOrderDeleteModel($order_id) !== false) {
            $this->session->set_tempdata('notice', 'The selected order has been deleted and cancelled succesfully.', 1);
            redirect(base_url() . 'vendor/orders');
        } else {
            $this->session->set_tempdata('error', 'Failed to delete and cancel the selected order.', 1);
            redirect(base_url() . 'vendor/orders');
        }
    }

    public function setNewMenu()
    {
        if ($this->VendorModel->setNewMenuModel() > 0) {
            $this->session->set_tempdata('notice', 'New menu has been added, please update the menu details accordingly.', 1);
            redirect(base_url() . 'vendor/catalogs');
        } else {
            $this->session->set_tempdata('error', 'Failed to add new menu.', 1);
            redirect(base_url() . 'vendor/catalogs');
        }
    }


    public function setCatalogUpdate()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $desc = $this->input->post('desc');
        $price = $this->input->post('price');

        $config['upload_path'] = './assets/catalog';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size']     = '0';

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('img')) {

            if (!empty($_FILES['img']['name'])) {

                $this->session->set_tempdata('error', $this->upload->display_errors('', ''), 1);
                redirect(base_url() . 'vendor/catalogs');
            } else {

                if ($this->VendorModel->setCatalogUpdateModel($id, $name, $desc, $price, NULL) !== false) {

                    $this->session->set_tempdata('notice', 'Your catalog has been updated succesfully.', 1);
                    redirect(base_url() . 'vendor/catalogs');
                } else {

                    $this->session->set_tempdata('error', 'Failed to update your catalog.', 1);
                    redirect(base_url() . 'vendor/catalogs');
                }
            }
        } else {

            $img = $this->upload->data('file_name');

            if ($this->VendorModel->setCatalogUpdateModel($id, $name, $desc, $price, $img) !== false) {

                $this->session->set_tempdata('notice', 'Your catalog has been updated succesfully.', 1);
                redirect(base_url() . 'vendor/catalogs');
            } else {

                $this->session->set_tempdata('error', 'Failed to update your catalog.', 1);
                redirect(base_url() . 'vendor/catalogs');
            }
        }
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
