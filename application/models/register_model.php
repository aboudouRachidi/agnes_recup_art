<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {

    function __construct(){
    	
        parent::__construct();
        
    }
	public function new_register($data)
	{
		$this->db->insert('client',$data);
	}
	
	function check_id($email)
	{
		$this->db->select_max('id_client');
		$Query = $this->db->get('client');
		
		$row = $Query->row_array();

		$this->session->set_userdata(
				'auth',
				array(
						'id'   => $row['id_client'],
						'email' => $email,
						'logged'=>true
				)
				);
		return true;
	}
}
