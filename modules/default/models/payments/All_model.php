<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();

  }

  public function getPaymentList() {
    $payments_query = $this->db->select("*")->from("payments")->where("deleted_at", null)->order_by("operation_date", "desc")->get();

    if (!$payments_query->num_rows()) {
      return rest_response(
        Status_codes::HTTP_NO_CONTENT,
        "No data found"
      );
    }

    $payments = $payments_query->result_array();

    return rest_response(
      Status_codes::HTTP_OK,
      "Success",
      $payments
    );
  }

}
