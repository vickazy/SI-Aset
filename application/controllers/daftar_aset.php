<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_aset extends CI_Controller {

	
	public function index()
	{
		$isi['content'] = 'daftar_aset/tampilan_daftar_aset';
		$isi['judul'] = 'Daftar Aset';
		$isi['sub_judul'] = ''; 
		$tipe = $this->session->userdata('tipe');
		if($tipe == "mahasiswa" || $tipe == "dosen" || $tipe == "unit")
		{
			$this->load->model('model_peminjaman');
			$isi['data'] = $this->model_peminjaman->data_pinjam();
		}
		else{
			$isi['data'] = $this->db->get('data_aset');
				}
		
		$this->model_squrity->getsqurity();
		$this->load->view('tampilan_home', $isi);

			}
	public function pencatatan()
	{
		$isi['content'] = 'admin/tampilan_pencatatan';
		$isi['judul'] = 'Daftar Aset';
		$isi['sub_judul'] = '> Pencatatan Aset';
		$isi['id_jenis'] = '';
		$isi['id_usul'] = '';
		$isi['kondisi'] = '';
		$isi['id_user'] = '';
		$this->model_squrity->getsqurity();

		$this->load->view('tampilan_home', $isi);
	}
	public function edit()
	{
		
		$this->model_squrity->getsqurity();
		$this->load->model('model_tambah_aset');

		$isi['content'] = 'admin/tampilan_pencatatan_edit';
		$isi['judul'] = 'Daftar Aset';
		$isi['sub_judul'] = '> Pencatatan Aset';
				
		$key = $this->uri->segment(3);
		$this->db->where('i',$key);
		$query = $this->db->get('data_aset');
		if($query->num_rows()>0)
		{
			foreach ($query -> result() as $row) 
			{


				$data['id_jenis'] = $row->id_jenis;
				$data['id_usul'] = $row->id_usul;
				$data['kondisi'] = $row->kondisi;
				$data['id_users'] = $row->id_users;
				
			}
		}
		$this->model_tambah_aset->getupdate($key,$data);
		//$this->session->set_flashdata('info', 'Data Berhasil Diubah');
		
		$this->load->view('tampilan_home', $isi);

	}
	public function cetakdata()
	{
		$this->model_squrity->getsqurity();
		
		$this->load->view('daftar_aset/tampilan_cetak');

		}
	public function tambah_data()
	{
		$this->model_squrity->getsqurity();
		$this->load->model('model_tambah_aset');

		//$i=0;
		//$jumlah=$this->input->post('jumlah');
        $usul=$this->input->post('id_usul');
        $jenis=$this->input->post('id_jenis');
        
		$this->db->select_max('kode', 'kode' );
		$this->db->where('id_jenis',$jenis);
        $result=$this->db->get('data_aset')->row();
        $hitung= $result->kode;
        
      
       //while($i<$jumlah)
         // {

          	$hitung++;
            $data['kode'] = $hitung;
            $data['id_jenis']=$this->input->post('id_jenis');
			$data['id_usul'] = $this->input->post('id_usul');
			$data['kondisi'] = $this->input->post('kondisi');
			$data['id_users'] = $this->input->post('id_users');
			$data['status'] = $this->input->post('status');

			 //$this->model_tambah_aset->terpakai($usul);
           // $i++;
          // } 
			//$this->db->where('id_usul', $usul);
			//return $this->db->update('pengusulan', ['terpakai'=>1]);
			$key = $this->uri->segment(3);
		
			
			/*$query = $this->model_tambah_aset->getdata($key);
			if($query->num_rows()>0)
			{
			$this->model_tambah_aset->getupdate($key,$data);
			$this->session->set_flashdata('info', 'Data Berhasil Diubah');
		
			}
			else
			{ */
				$this->model_tambah_aset->inputdata($data);
          		 $this->session->set_flashdata('info', 'Berhasil Tersimpan!');

           	//}
			
		
		redirect ('daftar_aset');
	}

	public function edit_data($key)
	{
		$this->model_squrity->getsqurity();
		$this->load->model('model_tambah_aset');
		
		$isi['content'] = 'admin/tampilan_pencatatan_edit';
		$isi['judul'] = 'Daftar Aset';
		$isi['sub_judul'] = '> Pencatatan Aset';
		$key = $this->uri->segment(3);
		$isi['data'] = $this->model_tambah_aset->getdata($key);
		$this->load->view('tampilan_home', $isi);

		
		
				$data['id_jenis'] = $this->input->post('id_jenis');
				$data['id_usul'] = $this->input->post('id_usul');
				$data['kondisi'] = $this->input->post('kondisi');
				$data['id_users'] = $this->input->post('id_users');
			
		$dataupdate= $this->model_tambah_aset->getupdate($key,$data);
		
		//$this->session->set_flashdata('info', 'Data Berhasil Diubah');

		redirect('daftar_aset');
		
		
	}
	public function delete()
	{
		$this->model_squrity->getsqurity();
		$this->load->model('model_tambah_aset');
		
		$key = $this->uri->segment(3);
		$this->db->where('i',$key);
		$query = $this->db->get('data_aset');
		if($query->num_rows()>0)
		{
			$this->model_tambah_aset->delete($key);
			$this->session->set_flashdata('info', 'Data Berhasil Dihapus!');
		
		
		}
		redirect ('daftar_aset');
	}

	
}
		
//$data['kode_aset'] = $this->input->post('kode_aset');
	
//&nbsp; > &nbsp;