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
    public function findPembayaranByBulan($bulan){
        $query = "SELECT id_pembayaran,tgl_bayar,pembayaran.nisn,siswa.nama,siswa.nis,kelas.nama_kelas from pembayaran JOIN siswa on pembayaran.nisn = siswa.nisn JOIN kelas on siswa.id_kelas = kelas.id_kelas
         where bulan_dibayar='".$bulan."'";
        return  $this->db->query($query)->result(); 
    }
    public function findPembayaranByNisn($nisn){
        $query = "SELECT id_pembayaran,nisn,tgl_bayar,jumlah_bayar,petugas.nama_petugas 
        FROM `pembayaran` join petugas on petugas.id_petugas = pembayaran.id_petugas where nisn='".$nisn."'";
        return  $this->db->query($query)->result(); 
    }
}
?>