<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }
    
	// Insert order date with customer id in "commande" table in database.
	public function insert_order($data)
	{
		$this->db->insert('commande', $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;
	}
	
	// Insert ordered product detail in "detail_commande" table in database.
	public function insert_order_detail($data)
	{
		$this->db->insert('detail_commande', $data);
	}
}
