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

    if (isset($result["code"]) && $result["code"] === Status_codes::HTTP_OK) {
      foreach ($result["data"] as $key => $item) {
        $result["data"][$key]["operation_date"] = date("Y-m-d h a", strtotime($item["operation_date"]));
      }

      $result["data"] = array_reverse($result["data"]);

      $balance = 0;
      foreach ($result["data"] as $key => $item) {
        if ($result["data"][$key]["type"] === "entry") {
          $balance += (float)$result["data"][$key]["amount"];
          $result["data"][$key]["balance"] = $balance;
        }
        else {
          $balance -= (float)$result["data"][$key]["amount"];
          $result["data"][$key]["balance"] = $balance;
        }
      }

      $result["data"] = array_reverse($result["data"]);
    }

    return json_response($result);
  }

}
