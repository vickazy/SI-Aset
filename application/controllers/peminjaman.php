<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

	
	public function index()
	{
		$isi['content'] = 'admin/tampil_data_peminjaman';
		$isi['judul'] = 'Peminjaman Aset';
		$isi['sub_judul'] = '';
		$tipe = $this->session->userdata('tipe');
		$this->load->model('model_peminjaman');
		
		if($tipe == "mahasiswa" || $tipe == "dosen" || $tipe == "unit")
		{
			$isi['data'] = $this->model_peminjaman->lihatpeminjaman();

		}
		else
		{
			$isi['data'] = $this->model_peminjaman->prosespeminjaman();
		}
		$this->model_squrity->getsqurity();
		$this->load->view('tampilan_home', $isi);
	}
	public function aset_pinjam()
	{
		$isi['content'] = 'admin/tampilan_aset_boleh_pinjam';
		$isi['judul'] = 'Peminjaman Aset';
		$isi['sub_judul'] = '';
		
		$this->model_squrity->getsqurity();
		$this->load->view('tampilan_home', $isi);
	}
	
	public function bayar_sanksi()
	{
		$this->model_squrity->getsqurity();
		$this->load->model('model_peminjaman');

		
		$isi['content'] = 'admin/tampil_detail_peminjaman';
		$isi['judul'] = 'Pengembalian Aset';
		$isi['sub_judul'] = '> Pembayaran Sanksi ';
		$key =$this->uri->segment(3);
		
		$isi['data'] = $this->model_peminjaman->berdasarkanId($key);

       	$this->load->view('tampilan_home', $isi);

	}
	
	public function ubah_status(){
		$this->model_squrity->getsqurity();
		$this->load->model('model_peminjaman');

		$key =$this->uri->segment(3);
		
		$this->model_peminjaman->ubah_status($key);
		redirect('peminjaman');
    }
    public function sanksi(){
    	$this->model_squrity->getsqurity();
		$this->load->model('model_peminjaman');
		
		$key =$this->uri->segment(3);

		$telat=1000;
		$denda['denda'] =$this->input->post('sanksi')*$telat;
		$data['sanksi'] = $this->input->post('sanksi')*$telat;
		$data['id_pinjam'] = $key;
		$denda['lunas'] = 1;

		$this->model_peminjaman->denda($denda, $key);
		$this->model_peminjaman->sanksi($data);
		redirect('peminjaman');

    }
	public function tambah_aset_pinjam()
	{

		$this->model_squrity->getsqurity();
		$this->load->model('model_peminjaman');
		
			$key=$this->input->post('i');
		    $data['i']=$this->input->post('i');
			
			$data['id_peminjam'] = $this->session->userdata('id');

			//$key = $this->uri->segment(3);
			
			$this->model_peminjaman->insertdata($data);
			$this->model_peminjaman->updatecek($key);
          	$this->session->set_flashdata('info', 'Aset Dapat Diambil Di jurusan!');

           	
		redirect('peminjaman');

	}

	public function konfirm($key)
	{
		$this->model_squrity->getsqurity();
		$this->load->model('model_peminjaman');

		$key =$this->uri->segment(3);
		$dataupdate = $this->model_peminjaman->konfirm($key);
		redirect('daftar_aset');
	}
	
	
}
//&nbsp; > &nbsp;