<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->load->view("payments/add");
  }

  public function create()
  {
    $params = [
      "amount" => $this->input->post("amount"), // Bu amount $.post()-dakı data-dan gəlir.
      "type" => $this->input->post("type") // Bu amount $.post()-dakı data-dan gəlir.
    ];

    $this->load->model("payments/Add_model", "model");
    $result = $this->model->addPayment($params);

    return json_response($result);
  }
}
