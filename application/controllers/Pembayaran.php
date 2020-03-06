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
		$data = $this->ModelPembayaran->createPembayaran($data);
		$result['siswa'] =$this->ModelSiswa->findSiswaByNISN($nisn);
		$this->load->view('cetak_pembayaran',$result); 

	}

	public function cetak(){
		$bulan = $this->input->post('bulan');
		$result['rekap'] = $this->ModelPembayaran->findPembayaranByBulan($bulan);
		switch ($bulan) {
			case "01":
				$result['bulan'] = 'Januari';
				break;
			case "02":
				$result['bulan'] = 'Februari';
				break;
			case "03":
				$result['bulan'] = 'Maret';
				break;
			case "04":
				$result['bulan'] = 'April';
				break;
			case "05":
				$result['bulan'] = 'Mei';
				break;
			case "06":
				$result['bulan'] = 'Juni';
				break;
			case "07":
				$result['bulan'] = 'Juli';
				break;
			case "08":
				$result['bulan'] = 'Agustus';
				break;
			case "09":
				$result['bulan'] = 'September';
				break;
			case "10":
				$result['bulan'] = 'Oktober';
				break;
			case "11":
				$result['bulan'] = 'November';
				break;
			case "12":
				$result['bulan'] = 'Desember';
				break;
		}
		$this->load->view('laporan',$result);  
	}
}