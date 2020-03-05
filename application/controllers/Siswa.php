<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->load->library('form_validation');
		$this->load->helper(array('url'));	
		$this->load->model("ModelSiswa");	
		$this->load->model("ModelKelas");	
		$this->load->model("ModelSPP");	
		if(!$this->session->userdata('level')){
            redirect('Auth');
        }
	}

    public function index()
	{
		// get all data siswa
		$result['siswa'] =  $this->ModelSiswa->findSiswaAll();
		$result['kelas'] =  $this->ModelKelas->findKelasAll();
		$result['level'] = $this->session->userdata('level');
		$result['nama'] = $this->session->userdata('nama');
		$this->load->view('siswa_page',$result);
	}

	public function tambahSiswa(){
		$nama =  $this->input->post('nama');
		$alamat =  $this->input->post('alamat');
		$nomorTelepon =  $this->input->post('telepon');
		$kelas =  $this->input->post('kelas');
		$countSiswa = $this->ModelSiswa->getMaxNISNSiswa()[0]->nisn;
		$countSiswa = substr($countSiswa,-1,1) + 1;
		$spp = $this->ModelSPP->findSPPByTahun(date("Y"));
		$spp = $spp[0]->id_spp;
		$nisn = strval(date("Y")).'2'.strval($countSiswa);
		$nis = strval(date("Y")).strval($kelas).strval($countSiswa);
		$data = array(
			'nisn' => $nisn,
			'nis' => $nis,
			'nama' => $nama,
			'alamat' => $alamat,
			'no_telp' => $nomorTelepon,
			'password' => 123456,
			'id_kelas' => $kelas,
			'id_spp' => $spp,
		);
		$result = $this->ModelSiswa->createSiswa($data);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Dibuat</div>');     
		redirect('Siswa');
	}

	public function ubahDataSiswa($id){
		$nama =  $this->input->post('nama');
		$alamat =  $this->input->post('alamat');
		$nomorTelepon =  $this->input->post('telepon');
		$kelas =  $this->input->post('kelas');
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'no_telp' => $nomorTelepon,
			'id_kelas' => $kelas,
		);
		print_r($data);
		$result = $this->ModelSiswa->updateSiswaById($id,$data);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');     
		redirect('Siswa');
	}
	public function hapusDataSiswa($id){
		$result = $this->ModelSiswa->deleteSiswaById($id);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil dihapus</div>');     
		redirect('Siswa');
	}

}