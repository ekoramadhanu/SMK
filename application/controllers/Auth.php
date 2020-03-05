<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->load->model("ModelSiswa");	
		$this->load->model("ModelPetugas");
	}

    public function index()
	{
		$this->load->view('login_page');
	}

	public function login(){
		$username = $this->input->post('nama');
		$password = $this->input->post('password');
		$admin = $this->ModelPetugas->login($username,$password);
		$user = $this->ModelSiswa->login($username,$password);
		if($admin && !$user){
			$data= array(
				'id' =>$admin[0]->id_petugas,
				'level' =>$admin[0]->level,
				'nama'=>$admin[0]->nama_petugas,
			);
			$this->session->set_userdata($data);  
			if($admin[0]->level == "admin"){
				redirect('Kelas');
			} else if($admin[0]->level == "petugas"){
				redirect('Pembayaran');
			}
		} else if(!$admin && $user){
			$data= array(
				'nisn' =>$user[0]->nisn,
				'nama'=>$user[0]->nama,
			);
			$this->session->set_userdata($data);
			redirect('Transaksi');
		}
	}

	public function logout(){
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('nama');
		redirect('Auth');
	}
}