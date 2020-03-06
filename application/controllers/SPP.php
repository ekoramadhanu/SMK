<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SPP extends CI_Controller {

    public function __construct()
	{
		parent::__construct();		
		$this->load->library('form_validation');
		$this->load->helper(array('url'));
		$this->load->model("ModelSPP");
		if(!$this->session->userdata('level')){
            redirect('Auth');
        }
	}
	public function index()
	{
		// validasi form
		$this->form_validation->set_rules('tahun','tahun','is_unique[spp.tahun]',[
			"is_unique"=>'Tahun Sudah ada',
		]);
		// get all data petugas
		$result['spp'] =  $this->ModelSPP->findSPPAll();
		$result['level'] = $this->session->userdata('level');
		$result['nama'] = $this->session->userdata('nama');
		if(!$this->form_validation->run()){            
            $this->load->view('spp_page',$result);  
        }else{
			$this->tambahDataSPP();     
        }		
	}

	private function tambahDataSPP()
	{
		$tahun = $this->input->post('tahun');
		$nominal = $this->input->post('nominal');
		$data= array (
			'tahun'=>$tahun,
			'nominal'=>$nominal,
		);
		$result = $this->ModelSPP->createSPP($data);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
		redirect('SPP');

	}

	public function ubahDataSPP($id){
		$tahun = $this->input->post('tahun');
		$nominal = $this->input->post('nominal');
		$data = array(
			'tahun' => $tahun,
			'nominal' => $nominal,
		);
		$result = $this->ModelSPP->updateSPPById($id,$data);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');     
		redirect('SPP');
	}
	public function hapusDataSPP($id){
		$result = $this->ModelSPP->deleteSPPById($id);
		if($result['code'] != 0){
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data tidak bisa dihapus 
			silahkan hapus data siswa terlebih dahulu</div>');     
		} else {
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil dihapus</div>');     
		}
		redirect('SPP');
	}
}