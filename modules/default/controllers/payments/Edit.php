<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("payments/Edit_model", "model");
  }

  public function getPayment($id)
  {
    $payment = $this->model->getPayment($id);
    $this->load->view("payments/edit", ["payment" => isset($payment["data"]) ? $payment["data"] : []]);
  }

  public function action($id) {
    $params = [
      "amount" => $this->custom_input->put("amount"),
      "type" => $this->custom_input->put("type")
    ];

    $result = $this->model->updatePayment($id, $params);
    return json_response($result);
  }

  public function delete($id) {
    $deleted_at = date('Y-m-d h:i:s a', time());

    $params = [
      'id' => $id,
      'deleted_at' => $deleted_at,
    ];

    $result = $this->model->deletePayment($params);
    return json_response($result);
  }

}
