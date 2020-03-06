<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->load->library('form_validation');
		$this->load->helper(array('url'));
		$this->load->model("ModelKelas");
		if(!$this->session->userdata('level')){
            redirect('Auth');
        }
	}

    public function index()
	{
		// validasi form
		$this->form_validation->set_rules('kelas','kelas','is_unique[Kelas.nama_kelas]',[
			"is_unique"=>'Nama Kelas Sudah ada',
		]);
		// get all data Kelas
		$result['kelas'] =  $this->ModelKelas->findKelasAll();
		$result['level'] = $this->session->userdata('level');
		$result['nama'] = $this->session->userdata('nama');
		if(!$this->form_validation->run()){            
            $this->load->view('kelas_page',$result);  
        }else{
			$this->tambahDataKelas();     
        }
	}

	public function tambahDataKelas() 
	{
		$kelas = $this->input->post('kelas');
		$keterampilan = $this->input->post('keterampilan');		
		$data = array(
			'nama_kelas' => $kelas,
            'kompetensi_keahlian'=> $keterampilan,
		);
		$result = $this->ModelKelas->createKelas($data);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
		redirect('Kelas');
	}

	public function ubahDataKelas($id){
		// validasi form
		$this->form_validation->set_rules('kelas','kelas','is_unique[Kelas.nama_kelas]',[
			"is_unique"=>'Nama Kelas Sudah ada',
		]);
		if(!$this->form_validation->run()){            
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Nama Kelas Sudah Digunakan</div>'); 
			redirect('Kelas');
        }else{
			$kelas = $this->input->post('kelas');
			$keterampilan = $this->input->post('keterampilan');		
			$data = array(
				'nama_kelas' => $kelas,
				'kompetensi_keahlian'=> $keterampilan,
			);
			$result = $this->ModelKelas->updateKelasById($id,$data);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');     
			redirect('Kelas');
        }
	}
	public function hapusDataKelas($id){
		$result = $this->ModelKelas->deleteKelasById($id);
		if($result['code'] != 0){
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data tidak bisa dihapus
			silahkan hapus terlebih dahulu data siswa</div>');     
		} else{
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil dihapus</div>');     
		}
		redirect('Kelas');
	}
}