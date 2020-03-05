<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->load->library('form_validation');
		$this->load->helper(array('url'));
		$this->load->model("ModelPetugas");
		if(!$this->session->userdata('level')){
            redirect('Auth');
        }
	}

    public function index()
	{
		// validasi form
		$this->form_validation->set_rules('username','username','is_unique[petugas.username]',[
			"is_unique"=>'Username Sudah ada',
		]);
		$this->form_validation->set_rules('namaPetugas','namaPetugas','is_unique[petugas.nama_petugas]',[
			"is_unique"=>'Nama pengguna Sudah ada',
		]);
		// get all data petugas
		$result['petugas'] =  $this->ModelPetugas->findPetugasAll();
		$result['level'] = $this->session->userdata('level');
		$result['nama'] = $this->session->userdata('nama');
		if(!$this->form_validation->run()){            
            $this->load->view('petugas_page',$result);  
        }else{
			$this->tambahDataPetugas();     
        }		
	}

	private function tambahDataPetugas()
	{
		$username = $this->input->post('username');
		$namaPetugas = $this->input->post('namaPetugas');
		$level = $this->input->post('level');
		$data= array (
			'username'=>$username,
			'nama_petugas'=>$namaPetugas,
			'level'=>$level,
			'password'=>123456,
		);
		$result = $this->ModelPetugas->createPetugas($data);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
		redirect('Petugas');

	}

	public function ubahDataPetugas($id){
		$level = $this->input->post('level');
		$data = array(
			'level' => $level,
		);
		$result = $this->ModelPetugas->updatePetugasById($id,$data);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');     
		redirect('Petugas');
	}
	public function hapusDataPetugas($id){
		$result = $this->ModelPetugas->deletePetugasById($id);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil dihapus</div>');     
		redirect('Petugas');
	}
}