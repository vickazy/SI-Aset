<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function index()
	{
		$this->load->view('tampilan_login');
	}
	public function getlogin ()
	{
		$id = $this->input->post('id');
		$pass = $this->input->post('password');
		$this->load->model('model_login');
		$this->model_login->getlogin($id, $pass);
	}
}
