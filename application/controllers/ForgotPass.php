<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ForgotPass extends CI_Controller {

    function __construct(){
        parent::__construct();
    }
	public function index()
	{
		$data['blogs'] = $this->blog_model->getAll_blogs();
		$data['categories'] = $this->products_model->getAll_categories();
		$data['materiaux'] = $this->products_model->getAll_materiau();
		$this->load->view('includes/header');
		$this->load->view('includes/menu',$data);
		$this->load->view('forgotPass',$data);
		$this->load->view('includes/footer');
	}
}
