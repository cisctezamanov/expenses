<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function getPaymentList() {
    $payments_query = $this->db->select("*")->from("payments")->where("deleted_at", null)->get();
    $payments = $payments_query->result_array();
    return $payments;
  }
}
