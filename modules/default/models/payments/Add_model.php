<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function addPayment($params)
  {
    $this->db->insert("payments", $params);

    return rest_response(
      Status_codes::HTTP_CREATED,
      "Payment was added successfully."
    );
  }
}
