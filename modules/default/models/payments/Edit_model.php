<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function getPayment($id)
  {
    $payment_query = $this->db->select("*")->from("payments")->where("id", $id)->get();
    $payment = $payment_query->row_array();

    if (!$payment_query->num_rows()) {
      return rest_response(
        Status_codes::HTTP_NO_CONTENT,
        "No data found"
      );
    }

    return rest_response(
      Status_codes::HTTP_OK,
      "Success",
      $payment
    );
  }

  public function updatePayment($id, $params)
  {
    $this->db->where("id", $id)->update("payments", $params);

    return rest_response(
      Status_codes::HTTP_OK,
      "Success"
    );
  }

  public function deletePayment($params)
  {
    $this->db->where("id", $params["id"])->update('payments', ["deleted_at" => $params["deleted_at"]]);

    return rest_response(
      Status_codes::HTTP_OK,
      "Success"
    );
  }
}
