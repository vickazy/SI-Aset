<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
		$isi['content'] = 'tampilan_content';//nama File content
		$isi['judul'] = 'Home';
		$isi['sub_judul'] = '';
		$this->load->model('model_persetujuan');
		$isi['pending']=count($this->model_persetujuan->belumDisetujui()->result());
		//return var_dump($this->model_persetujuan->belumDisetujui());
		$this->model_squrity->getsqurity();
		$this->load->view('tampilan_home', $isi);
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
//&nbsp; > &nbsp;