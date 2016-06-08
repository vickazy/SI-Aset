<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ambilnotifuser extends CI_Controller {

	
	public function index()
	{
		$this->load->model('model_persetujuan');
		
		$usulan=$this->model_persetujuan->belumDisetujui()->result();
		
				
		$data =['usulan'=>$usulan];
		
		echo json_encode($data);	
		
	}
}
//&nbsp; > &nbsp;