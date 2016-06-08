<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_squrity extends CI_model {

	public function getsqurity()
	{
		$id = $this->session->userdata('id');
		if (empty($id))
		{
			$this->session->sess_destroy();
			redirect('login');
		}
		

		
	}
	
}
