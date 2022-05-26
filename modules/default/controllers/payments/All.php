<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("payments/All_model", "model");
  }

  function index() {
    $this->load->view("payments/list");
  }

  function live() {
    $result = $this->model->getPaymentList();
    return json_response($result);
  }

}
