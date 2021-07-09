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
        redirect(base_url() . 'checkout');
    }
}
