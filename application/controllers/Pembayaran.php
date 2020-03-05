<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model("ModelSiswa");
		$this->load->model("ModelPembayaran");
		if(!$this->session->userdata('level')){
            redirect('Auth');
        }
	}

    public function index()
	{ 
		$result['level'] = $this->session->userdata('level');
		$result['nama'] = $this->session->userdata('nama');
		$result['pembayaran'] = $this->ModelPembayaran->findPembayaranAll();
        $this->load->view('entry_pembayaran_page',$result);  
	}

	public function detailSiswa(){
		$nisn = $this->input->post('nisn');
		$result['level'] = $this->session->userdata('level');
		$result['nama'] = $this->session->userdata('nama');
		$result['siswa'] = $this->ModelSiswa->findSiswaByNISN($nisn);
		$this->load->view('detail_pembayaran',$result);  
	}

	public function bayar($nisn){
		$idPetugas= $this->session->userdata('id');
		$siswa = $this->ModelSiswa->findSiswaByNISN($nisn);
		$data = array(
			'id_petugas' => $idPetugas,
			'nisn' => $nisn,
			'tgl_bayar'=> date("Y/m/d"),
			'bulan_dibayar' =>date('m'),
			'tahun_dibayar' => date('Y'),
			'jumlah_bayar' => $siswa[0]->nominal,
			'id_spp' => $siswa[0]->id_spp,
		);
		$result = $this->ModelPembayaran->createPembayaran($data);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Dibuat</div>');     
		redirect('Pembayaran');
	}

	public function cetak(){
		$result['tahun'] = $this->input->post('tahun');
		$result['rekap'] = $this->ModelPembayaran->findPembayaranByTahun($result['tahun']);
		$this->load->view('laporan',$result);  
	}
}