<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('M_admin','M_admin');
        $this->load->model("Pelanggan_m");
         $this->load->model("User_m");
        $this->load->library('form_validation');
        if ($this->session->userdata('status')!='login') {
			redirect('Login_user');
		} 
	}
	 
	public function index()
	{

		$this->load->view('user/tes2', $data);

		
	}

}


