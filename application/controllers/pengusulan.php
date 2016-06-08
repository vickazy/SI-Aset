<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengusulan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(['form','url']);
	}
	public function index()
	{
		$isi['content'] = 'pengusulan/tampil_form_pengusulan';
		$isi['judul'] = 'Form Pengajuan Aset';
		$isi['sub_judul'] = '';
		$this->model_squrity->getsqurity();
		$this->load->view('tampilan_home', $isi);
	}  
	public function usulan()
	{
		$this->model_squrity->getsqurity();
		$data['id_user'] = $tipe= $this->session->userdata('id');
		$data['nama_barang'] = $this->input->post('nama_barang');
		$data['harga_pasaran'] = $this->input->post('harga_pasaran');
		$data['jumlah_barang'] = $this->input->post('jumlah_barang');
		$data['total_biaya'] = $this->input->post('total_biaya');
		$data['spesifikasi'] = $this->input->post('spesifikasi');
		$data['merk'] = $this->input->post('merk');
		$data['keterangan'] = $this->input->post('keterangan');
		$data['status'] = 0;
		$data['ceknotif'] = 0;


		$filedata['upload_path']='./file/';
		$filedata['allowed_types']='jpg|png|jpeg';
		$filedata['max_size']='2048';
		//return "<pre>".var_dump($filedata)."</pre>";

		$this->load->library('upload',$filedata);
		if(!$this->upload->do_upload('gambar'))
		{
			//redirect('pengusulan/gagal');
			return var_dump($this->upload->display_errors());
		}
		else{
		//return var_dump($this->upload);
		$this->load->model('model_usulan');
		$data['gambar']=$this->upload->file_name;
		$this->model_usulan->getinsert($data);
		$this->session->set_flashdata('info', 'Pengajuan Terkirim!');
		
		redirect ('pengusulan');

		}


	}
	
	
}
