<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transfer extends CI_Controller {

	
	public function index()
	{
		$this->model_squrity->getsqurity();
		$this->load->model('model_transfer_aset');
		$isi['content'] = 'transfer/tampilan_transfer';
		$isi['judul'] = ' Transfer Aset ';
		$isi['sub_judul'] = '';
		
		
		$this->load->view('tampilan_home', $isi);
	}
	public function transfer_aset()
	{
		$isi['content'] = 'transfer/tampilan_transfer_aset';
		$isi['judul'] = ' Transfer Aset ';
		$isi['sub_judul'] = ' > Transfer Aset User';
		//$isi['data'] = $this->
		$this->model_squrity->getsqurity();
		$this->load->view('tampilan_home', $isi);
	}
	public function tambah_transfer()
	{

		$this->model_squrity->getsqurity();
		$this->load->model('model_transfer_aset');

			$data['i']=$this->input->post('kode_aset');
			$data['status_transfer'] = 0;
			$data['id_pengirim'] = $tipe= $this->session->userdata('id');
			$data['id_penerima'] = $this->input->post('id_penerima');

			$this->model_transfer_aset->inputdata($data);
          	$this->session->set_flashdata('info', 'Berhasil Tersimpan!');

          	redirect('transfer/transfer_aset');

	}
	public function delete()
	{
		$this->model_squrity->getsqurity();
		$this->load->model('model_transfer_aset');
		
		$key = $this->uri->segment(3);
		$this->db->where('id_perpindahan',$key);
		$query = $this->db->get('perpindahan');
		if($query->num_rows()>0)
		{
			$this->model_transfer_aset->delete($key);
			$this->session->set_flashdata('info', 'Data Berhasil Dihapus!');
		
		
		}
		redirect ('transfer');
	}
	public function terima()
	{
		$this->model_squrity->getsqurity();
		$this->load->model('model_transfer_aset');
		$key = $this->uri->segment(3);
		$this->db->where('id_perpindahan',$key);
		$query = $this->db->get('perpindahan');
		if($query->num_rows()>0)
		{
			$this->model_transfer_aset->terima($key);
			$this->session->set_flashdata('info', 'perpindahan aset diterima!');
		
		
		}
		redirect ('transfer');

	}

	public function tolak()
	{
		$this->model_squrity->getsqurity();
		$this->load->model('model_transfer_aset');
		$key = $this->uri->segment(3);
		$this->db->where('id_perpindahan',$key);
		$query = $this->db->get('perpindahan');
		if($query->num_rows()>0)
		{
			$this->model_transfer_aset->tolak($key);
			$this->session->set_flashdata('info', 'perpindahan aset ditolak!');
		
		
		}
		redirect ('transfer');


	}
	
}
//&nbsp; > &nbsp;