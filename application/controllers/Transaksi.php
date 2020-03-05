<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model("ModelPembayaran");
		if(!$this->session->userdata('nisn')){
            redirect('Auth');
        }
	}

    public function index()
	{
		$result['nama'] = $this->session->userdata('nama');
		$nisn = $this->session->userdata('nisn');
		$result['history'] = $this->ModelPembayaran->findPembayaranByNisn($nisn);
		$this->load->view('transaksi_page',$result);
	}
}