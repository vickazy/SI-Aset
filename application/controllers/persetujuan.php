<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persetujuan extends CI_Controller {

	
	public function index()
	{
		$isi['content'] = 'persetujuan/tampil_data_usulan';
		$isi['judul'] = 'Pengajuan Aset';
		$isi['sub_judul'] = '';
		$this->load->model('model_persetujuan');
		$tipe = $this->session->userdata('tipe');
		if($tipe == "mahasiswa" || $tipe == "dosen" || $tipe == "unit")
		{
			$isi['data'] = $this->model_persetujuan->lihatpersetujuan();

		}
		else{
			$isi['data'] = $this->model_persetujuan->belumDisetujui();
				}
		$this->model_squrity->getsqurity();
		$this->load->view('tampilan_home', $isi);
	}
	public function detil()
	{
		$isi['content'] = 'persetujuan/tampil_data_detil';
		$isi['judul'] = 'Pengajuan Aset';
		$isi['sub_judul'] = ' > Detil Pengajuan Aset';
		$this->load->model('model_persetujuan');
		$tipe = $this->session->userdata('tipe');
		$key =$this->uri->segment(3);
		$isi['data'] = $this->model_persetujuan->berdasarkanId($key);
        $dataupdate = $this->model_persetujuan->sudahDisetujui($key);
		$this->model_squrity->getsqurity();
		$this->load->view('tampilan_home', $isi);

	}
	public function setujui()
	{
		$this->model_squrity->getsqurity();
		$this->load->model('model_persetujuan');
		
		$key =$this->uri->segment(3);
		$dataupdate = $this->model_persetujuan->setujui($key);
		redirect('persetujuan');		
	}
	public function tolak()
	{
		$this->model_squrity->getsqurity();
		$this->load->model('model_persetujuan');
		
		$key =$this->uri->segment(3);
		$dataupdate = $this->model_persetujuan->tolak($key);
		redirect('persetujuan');		
	}
	public function lihat_persetujuan()
	{
		$this->model_squrity->getsqurity();
		$this->load->model('model_persetujuan');
		//$this->load->model('model_peminjaman');
		$key =$this->uri->segment(3);
		$dataupdate = $this->model_persetujuan->sudahDisetujui($key);
		//$dataupdate1 = $this->model_peminjaman->sudahDisetujui($key);
		
		redirect('persetujuan');	
		
	}
	
	
}
