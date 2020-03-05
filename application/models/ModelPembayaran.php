<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPembayaran extends CI_Model{
    public function createPembayaran($data){
        return $this->db->insert('pembayaran',$data);
    }
    public function findPembayaranAll(){
        $query = "SELECT id_pembayaran,nisn,tgl_bayar,jumlah_bayar,petugas.nama_petugas FROM `pembayaran` join petugas on petugas.id_petugas = pembayaran.id_petugas";
        return  $this->db->query($query)->result(); 
    }
    public function findPembayaranByTahun($tahun){
        $query = "SELECT id_pembayaran,nisn,tgl_bayar,jumlah_bayar,petugas.nama_petugas 
        FROM `pembayaran` join petugas on petugas.id_petugas = pembayaran.id_petugas where tahun_dibayar='".$tahun."'";
        return  $this->db->query($query)->result(); 
    }
    public function findPembayaranByNisn($nisn){
        $query = "SELECT id_pembayaran,nisn,tgl_bayar,jumlah_bayar,petugas.nama_petugas 
        FROM `pembayaran` join petugas on petugas.id_petugas = pembayaran.id_petugas where nisn='".$nisn."'";
        return  $this->db->query($query)->result(); 
    }
}
?>