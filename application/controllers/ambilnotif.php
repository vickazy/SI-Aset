<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ambilnotif extends CI_Controller {

	
	public function index()
	{
		$this->load->model('model_persetujuan');
		$this->load->model('model_transfer_aset');
		
		$usulan=$this->model_persetujuan->belumDisetujui()->result();
		$transfer = $this->model_transfer_aset->belumDisetujui()->result();
		
		$data =['usulan'=>$usulan, 'transfer' => $transfer];/*,'peminjaman'=>$peminjaman ,'persetujuan'=>$persetujuan]*/;		
		
		echo json_encode($data);	
		
	}
}
//&nbsp; > &nbsp;