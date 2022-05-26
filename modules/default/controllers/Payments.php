<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
  }

  function index() {
    $this->load->model("Payments_model", "model");
    $payments = $this->model->getPaymentList();
    $this->load->view("payments/list", ["payments" => $payments]);
  }

}
