<?php

class CheckoutController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CheckoutModel');
    }

    public function index()
    {
        $data['baskets'] = $this->getAllBasketItemDetails();
        $data['orders'] = $this->getAllActiveOrders();
        $this->load->view('templates/headers.php');
        $this->load->view('templates/navigations.php');
        $this->load->view('CheckoutInterface.php', $data);
        $this->load->view('templates/modals.php');
        $this->load->view('templates/footers.php');
    }

    public function getAllBasketItemDetails()
    {
        if (!isset($_SESSION['order'])) {
            return false;
        } else {
            return $this->CheckoutModel->getAllBasketItemDetailsModel();
        }
    }

    public function getAllActiveOrders()
    {
        if (!isset($_SESSION['uid'])) {
            return false;
        } else {
            return $this->CheckoutModel->getAllActiveOrdersModel();
        }
    }

    public function addBasketItemQuantity($catalog_id)
    {
        if (!isset($_SESSION['order'])) {
            $_SESSION['order'][$catalog_id] = 1;
        } else {
            $_SESSION['order'][$catalog_id] += 1;
        }

        redirect(base_url() . 'checkout');
    }

    public function removeBasketItemQuantity($catalog_id)
    {
        if (isset($_SESSION['order'][$catalog_id])) {
            if ($_SESSION['order'][$catalog_id] > 1) {
                $_SESSION['order'][$catalog_id] -= 1;
            } else {
                unset($_SESSION['order'][$catalog_id]);

                if (empty($_SESSION['order'])) {
                    unset($_SESSION['order']);
                }
            }
        }

        redirect(base_url() . 'checkout');
    }

    public function checkoutBasket()
    {
        if (isset($_SESSION['uid'])) {

            $return = $this->CheckoutModel->addNewOrderModel();

            unset($_SESSION['order']);

            if ($return === 0) {
                $this->session->set_tempdata('error', 'Please wait while your active order completed before adding a new one.', 1);
            } else if ($return > 0) {
                $this->session->set_tempdata('notice', 'Order has been place! Please await while we preparing your order.', 1);
            } else {
                $this->session->set_tempdata('error', 'Error creating your order, please try again.', 1);
            }

            redirect(base_url() . 'checkout');
        } else {
            $this->session->set_tempdata('error', 'Please login to place an order!', 1);
            redirect(base_url() . 'checkout');
        }
    }
}
